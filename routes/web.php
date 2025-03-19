<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\ManageAuth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarrierController;
use App\Http\Controllers\SecureControllerr;
use App\Http\Controllers\UserControllerr;
use App\Http\Controllers\newAdverController;
use App\Http\Controllers\AdvertisementController;

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

Route::middleware('web')->group(function () {
    // Other routes...

    Route::get('/login', 'Auth\AuthenticatedSessionController@create')->name('login');
    // Additional authentication routes...

    // Carrier routes...
//    Route::get('/carrierUserProfile', 'CarrierController@showUserProfile');
});


Route::get('/admin', function () {
    return view('admin');

})->name('admin');

Route::get('/adminProfile', function () {
    $user = session('user');

    return view('adminProfile', ['user'=>$user]);
})->name('adminProfile');

Route::get('admin', [ShipperController::class, 'index']);

Route::get('/conformation', [VehicleController::class, 'conformation'])->name('conformation');

Route::get('manageAdvertisement', [newAdverController::class, 'show']);

Route::get('/', [AdvertisementController::class, 'show']);


Route::get('/manageShipper', function () {
    return view('manageShipper');
});


//login and register
Route::get('/login', [ManageAuth::class, 'index'])->name('login');
Route::post('/postLogin', [ManageAuth::class, 'postLogin'])->name('login.post');


Route::get('/registration', [ManageAuth::class, 'registration'])->name('registration');
Route::post('/registration', [ManageAuth::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [ManageAuth::class, 'logout'])->name('logout');

Route::get('/profile', function () {
    $user = session('user');

    return view('profile', ['user'=>$user]);
})->name('userProfile');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

// //homepage
Route::get('/', function () {
    return view('homepage');
})->name("homepage");

Route::get('/', function () {
    $advertisements = [];
    return view('homepage', ['show' => $advertisements]);
});


Route::get('/shipper', function () {
    return view('shipper');
});


Route::get('/Checkout', function () {
    return view('Checkout');
});


Route::get('/conformation', function () {
    return view('conformation');
});




//carrier
Route::get('/carrier', [CarrierController::class, 'show'])->name("carrier");

Route::post('/accept-job', [CarrierController::class, 'acceptJob'])->name('accept.job');

Route::post('/update-order-status', [CarrierController::class, 'updateStatus'])->name('update.order.status');

Route::get('/carrierDashboard', function () {
    return view('carrierDashboard');
});
Route::get('carrierDashboard', [CarrierController::class, 'index']);

Route::post('/carrierUserProfile', [CarrierController::class, 'updatePassword'])->name('update.password');

Route::get('/carrierUserProfile', [CarrierController::class, 'showUserProfile']);


Route::get('/carrierJobAcceptance', [CarrierController::class, 'showJob']);

Route::get('/carrierViewJob/{orderID}', function () {
    return view('carrierViewJob');
});
Route::get('/carrierViewJob/{orderID}', [OrderController::class, 'viewJobDetails']);


//shipper
Route::resource('shippers', ShipperController::class);
Route::get('/shipper', [ShipperController::class, 'homeIndex']);
Route::post('/upload', [ShipperController::class, 'upload']);

Route::get('/test-database-connection', function () {
    try {
        DB::connection()->getPdo();
        return 'Database connection is successful!';
    } catch (\Exception $e) {
        return 'Database connection error: ' . $e->getMessage();
    }
});

Route::get('/advertisements/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
Route::post('/advertisements', [AdvertisementController::class, 'store'])->name('advertisements.store');
Route::delete('/advertisements/{id}', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');

Route::middleware(['checkAccess'])->group(function () {
    Route::get('/securePage', [SecureControllerr::class, 'securePage']);
});

require __DIR__ . '/auth.php';

