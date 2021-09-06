<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*

Route::match(['get', 'post'], '/match', function () {
    return "Array te jei method gulo thakbe tar je kono akta match korle response show korbe";
});

Route::any('any', function () {
    return "get post push patch delete jeta akta match korle resposne show korbe";
});



// Dependency Injection
Route::get('dependency', function (Request $request) {
    
});



// Redirect Routes
Route::redirect('/redireted', '/home');



// View Routes
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);



// Route Parameters
Route::get('/params/{id}', function ($id) {
    return 'Params :' . $id;
});



// Many parameters pass in route 
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Post Id :' . $postId . "<br>" . 'Comment Id :' . $commentId; 
});



// Optional Parameters
Route::get('/user/{name?}', function ($name = null) {
    return $name;
});

Route::get('/user/{name?}', function ($name = 'John') {
    return $name;
});



// Regular Expression Constraints
Route::get('/user/{name}', function ($name) {
    //
})->where('name', '[A-Za-z]+');

Route::get('/user/{id}', function ($id) {
    //
})->where('id', '[0-9]+');

Route::get('/user/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);




// Name Route
Route::get('/user/profile', function () {
    //
})->name('profile');



// Route Groups Middleware
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });

    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});



// Route Group with prefix and prefix name and middleware. ak shte use kora jay. chaile alada alada use korte pari.
Route::prefix('admin')->name('admin.')->middleware('web')->group(function () {

    Route::get('index', function ($id) {
       return "This is index page"; 
    })->name('index');

    Route::get('shiow', function ($id) {
        return "This is show page"; 
    })->name('show');

    Route::get('edit', function ($id) {
        return "This is edit page"; 
    })->name('edit');

});




// Subdomain Routing
Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});



// Route Model Binding
use App\Models\User;

Route::get('/users/{user}', function (User $user) {
    return $user->email;
});




// Controller define in route
use App\Http\Controllers\UserController;

Route::get('/users/{user}', [UserController::class, 'show']);



// Soft Deleted Models
Route::get('/users/{user}', function (User $user) {
    return $user->email;
})->withTrashed();



// Customizing The Key
// By defult key hosche Id. chile seta customize kore je kono coloumn er value use korte pari.
Route::get('/posts/{post:slug}', function (User $user) {
    return $user;
});

*/


// Fallback Routes 
Route::fallback(function () {
    return '404';
    // return view('errors.404');
});