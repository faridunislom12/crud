<?php

use App\Http\Controllers\BidController;
use Inertia\Inertia;
use App\Models\Crude;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CrudeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WarehouseController;

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




Route::middleware('auth')->group(function () {

    Route::post(
        '/orders/completed/{order}',
        [OrderController::class, 'completed']
    )->name('orders.completed');


    Route::get('logout', function () {
        Auth::logout();
        return redirect('/login');
    });


    Route::get('/dashboard', function () {
        return Inertia::render('Index');
    });

    Route::post('/upload-files', [CrudeController::class, 'uploadFiles'])->name('upload-files');

    Route::resources([
        '/dashboard/users'        => UserController::class,
        '/dashboard/units'        => UnitController::class,
        '/dashboard/categories'   => CategoryController::class,
        '/dashboard/crudes'       => CrudeController::class,
        '/dashboard/statuses'     => StatusController::class,
        '/dashboard/products'     => ProductController::class,
        '/dashboard/warehouses'   => WarehouseController::class,
        '/dashboard/orders'       => OrderController::class,
        '/dashboard/roles'       => RoleController::class,
        '/dashboard/partners'       => PartnerController::class,
        '/dashboard/sliders'       => SliderController::class,
        '/dashboard/posts'       => PostController::class,
    ]);
    Route::get('dashboard/get-bids', [BidController::class, 'index'])->name('get-bids');

    // Route::resource('/roles', \App\Http\Controllers\RoleController::class)->name('*', 'roles');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/repairs', [HomeController::class, 'repairs'])->name('repairs');
Route::post('/repairs', [HomeController::class, 'repairsBid'])->name('repairs-save');
Route::post('/partner-bid', [HomeController::class, 'partnerBid'])->name('partner-bid-save');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/mass-media', [HomeController::class, 'massMedia'])->name('mass-media');

Route::get('/test', function () {
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->name('dashboard');
