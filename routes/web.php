<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
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

/*

// Fallback Routes 
Route::fallback(function () {
    return '404';
    // return view('errors.404');
});

*/

// Controller define in route
// Route::get('test', [TestController::class, 'index']);




// -----------------------------------------------------------------------------

// Route::resource('/category', CategoryController::class)->only(['index', 'create']);
// Route::resource('/category', CategoryController::class)->except(['destroy']);

Route::resource('/category', CategoryController::class);

// use App\Models\Product;
// use App\Models\User;
// use App\Scopes\ViewScope;

// Route::get('test/factory', function () {
//     return Product::get();
// });

// scopes route define test perpose
Route::get('/scope', function () {
    // return Product::get()->count();

    // Removing Global Scopes Use class -------//
    // jokhon amader model er shob data dorkar probe tokhon ai "withoutGlobalScope" Method ta use korbo.
    // return Product::withoutGlobalScope(ViewScope::class)->get()->count(); // scope jodi onek gulo thake tile Array er modde scope er name gulo pass kore dibo.

    
    // Removing Global Scopes Use Static function -------//
    // jokhon amader model er shob data dorkar probe tokhon ai "withoutGlobalScope" Method ta use korbo.
    // return Product::withoutGlobalScope('lessThenFifty')->get()->count(); // scope jodi onek gulo thake tile Array er modde scope er name gulo pass kore dibo.


    // Utilizing A Local Scope------------//
    // return Product::LowesAmount()->get()->count();
    // return Product::HightAmount()->get()->count();
    // return Product::HightAmount()->LowesAmount()->get()->count(); // Mehod Chaining o korte pari. onek gulo scope ak sate use korte pari.
    // return Product::LowesAmount()->orWhere->HightAmount()->get()->count(); // 


    // Utilizing Dynamic Scopes--------------//
    // return Product::lowesPrice(40)->get()->count();
    // return Product::Status(1)->get()->count();


});

    // Relationships----------------//

    Route::get('one-to-one', function () {

        # with()
        # without()
        # withOnly()
        # has()
        # whereHas()
            # whereNotNull()
            # whereNull()
            # where() Custom Condition er jonno
        # doesntHave()
        # whereDoesntHave() // Custom Condition er jonno 


        // Eger load --------//
        // Multiple value hole array r bole dibo.
        // $users = User::with('profile')->get(); 

        // Without Egger Load----------//
        // Jeta jeta Egger load kora lagben nae bole dibo.
        // $users = User::without('profile', 'category')->get();

        // With Only Egger Load----------//
        // Shudu jeta lage seta bole dibo.
        // $users = User::withOnly('profile')->get();

        // has ----------//
        // jader profile data ache shudu tader user gulo show kore.
        // $users = User::with('profile')->has('profile')->get();

        // WhereHas ----------//
        // Custom Condition use kora jay.
        // jader profile data ache shudu tader user gulo show kore.

        // $users = User::with('profile')->whereHas('profile', function($query){
        //     $query->whereNotNull('post_code'); // whereNotNull
        // })->get();

        // $users = User::with('profile')->whereHas('profile', function($query){
        //     $query->whereNull('post_code'); // whereNull
        // })->get();

        // $users = User::with('profile')->whereHas('profile', function($query){
        //     // $query->where('view', '<', 50); 
        //     $query->whereEmail('biplob@mail.com'); // Model er property nonusare use kor jay
        // })->get();


        // Profile er data na pele jate error na ase. se jonno bladeTemplate e ata use korbo - {{ optional($user->profile)->view }} or {{ $user->profile->view ?? '' }}
        // Model o bole dite pari. je khane relationship ta define korbo. - return $this->hasOne(profile::class, 'user_id', 'id')->withDefault(); 

        // jader profile nei tader gulo show korbe.
        // $users = User::with('profile')->doesntHave('profile')->get(); 

        // whereDoesntHave() Condition use kore
        // $users = User::with('profile')->whereDoesntHave('profile', function($query){
        //     $query->where('name', 'like', '%biplob%');
        // })->get();
        
        // Method 'profile()' use korle query bilder er instant dei, ja diye data create kora jay.
        // $users = User::find(2)->profile()->create([
        //     'phone' => 8218728,
        //     'address' => 'india',
        //     'view' => 400,
        //     'post_code' => '505'
        // ]); 


        // $users = User::with('profile')->get(); 
        // return view('relationship.index', compact('users'));
    });


    // HasMany Relationship or One to Many

    Route::get('one-to-many', function () {

        // Eeager Loading
        // return $users = User::with('posts')->get();

        // lazy loading
        // $users = User::get();
        // return $users->load('posts');

        // $users = User::whereHas('posts')->get();
        // $users = User::whereDoesntHave('posts')->get();


        // BelongsTo------//
        // Invers Relation use kore data get. post er user ke seta find korche.

        // return $post = Post::find(10)->user;
        // return $post = Post::find(10)->user->email;

        // Relationship use kore data insurt---------//
        // $user = User::find(5)->posts()->create([
        //     'title' => 'Laravel',
        //     'view' => 100
        // ]);

       
        // latestOfMany 
        // return User::find(5)->latestPost;

        // oldestOfMany
        // return User::find(5)->oldestPost;

        // OfMany
        // return User::find(5)->lowPostView;

        


    });
