<?php

use App\Events\AdminRegisterEvent;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return "This is form admin route";
});



// Multiple Authenticatin----------------------//

Route::prefix('admin')->name('admin.')->group(function () {

    // Register----------//
    Route::get('register', function () {
        return view('admin.register');
    })->name('register')->middleware('guest:admin');

    Route::post('register', function (Request $request) {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:admins,email'],
            'password' => ['required'],
            'con_password' => ['required'],
        ]);

        $password = $request->password;
        $con_password = $request->con_password;

        if($password === $con_password){
            $admin = Admin::create($request->only('name', 'email', 'password'));

            // Custom Event use kore Email Varification kortechi 
            event(new AdminRegisterEvent($admin));

            $request->session()->regenerate();
            Auth::guard('admin')->login($admin);
            return redirect()->intended('admin/dashboard');
 
        }else{
            return back()->withErrors([
                'con_password' => 'Password Miss Match',
            ]);
        
        }

    })->name('register');

    // Logout------//
    Route::post('/logout', function (Request $request) {

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('admin/login');
    

    })->name('logout');

    // Login-----------//
    Route::get('login', function () {
        return view('admin.login');
    })->name('login')->middleware('guest:admin');

    Route::post('login', function (Request $request) {

        // $credentials = $request->validate([
        //     'email' => ['required', 'email', 'exists:admins,email'],
        //     'password' => ['required'],
        // ]);

        // if($request->remember) {
        //     $credentials['remember'] = true;
        // }

        // if (Auth::attempt($credentials, $request->remember)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('admin/dashboard');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);


        $request->validate([
            'email' => ['required', 'exists:admins,email'],
            'password' => ['required']
        ]);

        if(Auth::guard('admin')->attempt($request->only('email', 'password'))){

            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'password' => 'The Password is Not Match',
        ]);
    });

    // Dashboard-------//
    Route::get('/dashboard', function () {
       return view('admin.dashboard'); 
    })->name('dashboard')->middleware(['auth:admin', 'custom_verify']);


    // Email Verification---------//

    Route::get('/email/verify', function () {
        return view('admin.verify-email');
    })->middleware('auth:admin')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
    
        return redirect('admin/dashboard');
    })->middleware(['auth:admin', 'signed'])->name('verification.verify');


    // Resending The Verification Email-------------//

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth:admin', 'throttle:6,1'])->name('verification.send');



    // Reset Password-------------------------------------//

    Route::get('/forgot-password', function () {
        return view('admin.forgot-password');
    })->middleware('guest:admin')->name('password.request');


    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email|exists:admins,email']);
    
        $status = Password::broker('admins')->sendResetLink( // Cusotm Password reset er somoy Broker ta bole dite hobe.
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    })->middleware('guest:admin')->name('password.email');


    Route::get('/reset-password/{token}', function ($token) {
        return view('admin.reset-password', ['token' => $token]);
    })->middleware('guest:admin')->name('password.reset');


    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::broker('admins')->reset( // Cusotm Password reset er somoy Broker ta bole dite hobe.
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    // 'password' => Hash::make($password)
                    'password' => $password
                ])->setRememberToken(Str::random(60));
    
                $user->save();

                // Password Reset howar por user ke mail korte chaile.
                // event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    })->middleware('guest:admin')->name('password.update');
    
});