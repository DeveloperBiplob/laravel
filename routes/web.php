<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;
use App\Models\Country;
use App\Models\Machanic;
use App\Models\Post;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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


    // Has one Through ---//

    Route::get('has-one-through', function () {
        // $machanics = Machanic::with('car.owner')->get(); // car class er under e owner akta method ti '.' use kore eager load kortechi.
        $machanics = Machanic::with('car', 'owner')->get();
        return view('relationship.has-one-through', compact('machanics'));
    });



    // Has Many Through ---//

    Route::get('has-many-through', function () {
        // $countries = Country::with('cities.shops')->get();
        $countries = Country::with('cities', 'shops')->get();
        return view('relationship.has-many-through', compact('countries'));
    });


    // Many to Many / BelongToMany ------//

    Route::get('many-to-many', function () {

        // Attaching---//
        // Pevot table e data insert kore.
        // User er under e skills add kore.
        // return $user = User::find(1)->skills()->attach(1);

        // Pivot table e data inser in Extra Column---//
        // Single Data Insert--
        // return $user = User::find(1)->skills()->attach(2, ['view'=> 50]);

        // Pivot table e data inser in Extra Column---//
        // Multiple Data Insert--
        // return $user = User::find(2)->skills()->attach(
        //     [
        //         3 => ['view' =>80],
        //         4 => ['view' =>90],
        //     ]
        // );

        // Detaching-----// Means Delete
        // Delete Single
        // return User::find(1)->skills()->detach(2);

        // Delete Multiples
        // return User::find(2)->skills()->detach([3,4]);

        // Synching----//
        // Atetime Insert And Delete kore.
        // Array er modder jei value gulo dataBase e ache oi vaue gulo ke rahke.
        // R jei value gulo dataBase e ache kinto array te nei sei gulo delete kore, r noton gulo Insert kore.
        // return User::find(2)->skills()->sync([1,2,3,4]);

        // Sync use koere Extra column e value Insert---
        // return User::find(2)->skills()->sync(
        //     [
        //         1 => ['view' => 50],
        //         2 => ['view' => 60],
        //         3,
        //         4 => ['view' => 80],
        //     ]
        // );


        // Toggle ------//
        // Array te jei gulo thakbe tader modde jei gulo database er sathe match korbe oi gulo delete kore. baki gulo Inset kore.
        // return User::find(2)->skills()->toggle([1,2,3]);
        // return User::find(2)->skills()->toggle([1,2,3,5]);


        // Fatch Data -----//
        // shob gulo user dische---
        // $users = User::with('skills')->get();

        // Jader Skills ache tader dische--
        // $users = User::with('skills')->has('skills')->get();
        
        // Pivot table er data pawar jono, just view file pivot key word dile hobe. like - {{ $skill->pivot->view }} 
        // R jodi key customize kore onno kocho dei ta hole oita diye access korte hobe. like - {{ $skill->my_pivot->view }} 




        // Inverse relationship--------//
        // Skills thek Users er data Facth----

        $skills = Skill::with('users')->get();




        // return view('relationship.many-to-many', compact('users'));
        return view('relationship.many-to-many', compact('skills'));
    });




    // View Share --------------------------------------//
    // Route::get('view', function () {
    //     return view('viewComponent.index');
    // });



    // View Compser --------------------------------------//
    // Route::get('view', function () {
    //     return view('viewComponent.index');
    // });



    // Custom Blade Directive ----------//
    Route::get('route/{id}/{name}', function () {
        return "This value is come to Custom Blade Directive";
    })->name('customRoute');

    Route::get('view', function () {
        $users = User::get();
        return view('viewComponent.index', compact('users'));
    });




    // Custom Authentication-----------------------------------//
    // Middleware Guest use korle authenticate chara access korte parbe. and auhenticate thakle gest e access korte parbena.
    // Middleware Auth use korle authneticate na thake access korte parbe na. and auhenticate na thakle Auth e access korte parbena.

    Route::get('/login', function(){
        return view('auth.login');
    })->name('login')->middleware('guest');

    Route::post('/login', function (Request $request) {

        // $credentials = $request->validate([
        //     'email' => ['required', 'email', 'exists:users,email'],
        //     'password' => ['required'],
        // ]);

        // if($request->remember) {
        //     $credentials['remember'] = true;
        // }

        // if (Auth::attempt($credentials, $request->remember)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('dashboard');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);


        $request->validate([
            'email' => ['required', 'exists:users,email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'password' => 'The Password is Not Match',
        ]);

    })->name('login')->middleware('guest');


    Route::get('/register', fn() => view('auth.register'))->name('register')->middleware('guest');

    Route::post('/register', function (Request $request) {
        // return $request->all();
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'password' => ['required'],
            'con_password' => ['required'],
        ]);

        $password = $request->password;
        $con_password = $request->con_password;

        if($password === $con_password){
            $user = User::create($request->only('name', 'email', 'password'));

            $request->session()->regenerate();
            Auth::guard('web')->login($user); // login method ta akta instance nei
            return redirect()->intended('dashboard');

        }else{
            return back()->withErrors([
                'con_password' => 'Password Miss Match',
            ]);
        
        }

    })->name('register')->middleware('guest');

    Route::get('/dashboard', fn() => view('auth.dashboard'))->name('dashboard')->middleware('auth');

    Route::post('/logout', function (Request $request) {

        Auth::guard('web')->logout();
        return redirect()->intended('login');

    })->name('logout');