<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\Dashboard;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ------------ utk halaman awal  -----------------
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [ContactController::class, 'index']);
// ilmu baru ternyata route itu ga harus sama jg bisa utk good url

// detail aricle front
Route::get('/p/{slug}', [FrontArticleController::class, 'show']);
Route::get('/articles', [FrontArticleController::class, 'index']);
Route::post('/article/search', [FrontArticleController::class, 'index'])->name('search'); // mantepp pake ini jadi 

// Category
Route::get('/category/{slug}', [FrontCategoryController::class, 'index']);
Route::get('/all-Category', [FrontCategoryController::class, 'allCategory']);


// utk kemanan jika admin blm login
Route::middleware('auth')->group(function () {

    // Route::get('/dashboard', [Dashboard::class, 'index']);
    // dashboard perbaruan tambahin DashboardCONTROLLER
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // ------------ utk halaman awal  -----------------

    // category
    Route::resource('/categories', CategoryController::class)->only([
        // only itu mem-filter agar kita tidak bnyk makan controller tdk ke pake sprti : edit, show, create, karna pake modal
        'index', 'store', 'update', 'destroy'
    ])->middleware('UserAccess:1'); // cara bacanya : yg boleh akses menu categories hanya role yg bernilai 1(superadmin)
    //UserAccess dpt dari folder kernel yg middlewarealiases

    // article
    Route::resource('/article', ArticleController::class);

    // users
    Route::resource('/users', UserController::class);

    // config
    Route::resource('/config', ConfigController::class)->only([
        'index', 'update'
    ]);


    // ck editor gagal
    // Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['guest']], function () {
    //     \UniSharp\LaravelFilemanager\Lfm::routes();
    // });

    // ck editor benar tp masi ada mslh sdikit
    Route::post('/upload', [ArticleController::class, 'upload'])->name('ckeditor.upload');
});


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
