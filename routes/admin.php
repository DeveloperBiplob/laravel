<?php

use App\Events\AdminRegisterEvent;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

    
});