<?php

use App\Http\Controllers\BuyDataController;
use App\Http\Controllers\DataPlansController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonnifyController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UsersController;
use App\Models\ReservedAccount;

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

Route::get('/', function () {
   
    if(auth()->check()){
        if(Auth::user()->user_type == 'regular'){
            return redirect()->route('regular.home');
        }
        if(Auth::user()->user_type == 'regular'){
            return redirect()->route('regular.home');
        }
    }
   
    return view('auth.login');
});


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'regular']], function () {
    Route::get('/user/home', [HomeController::class, 'regular'])->name('regular.home');
});
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
});


Route::post('/get-transfers',  [MonnifyController::class, 'getTransfers']);

Route::post('/webhook',  [MonnifyController::class, 'getTransfers']);

Route::get('/add_money', function(){
    $query = ReservedAccount::where('customer_email', auth()->user()->email)->first();

    if ($query) {
        $accounts = json_decode($query->accounts, true);
    } else {
        $accounts = [];
    }
    return view('pages.add_money',compact('accounts'));
})->name('add_money');



Route::group(['prefix' => 'data_plans', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/index', [DataPlansController::class, 'index'])->name('data_plans.index');
    Route::post('/store', [DataPlansController::class, 'store'])->name('data_plans.store');
    Route::get('/edit/{id}', [DataPlansController::class, 'edit'])->name('stock.edit');
    Route::get('/copy/{id}', [DataPlansController::class, 'copyIndex'])->name('inventory.copy');
    Route::post('/update/{id}', [DataPlansController::class, 'update'])->name('stock.update');
    Route::post('/copy', [DataPlansController::class, 'copyStore'])->name('stock.copy');
    Route::post('/delete', [DataPlansController::class, 'delete'])->name('stock.delete');
    Route::post('/fetch-stocks', [DataPlansController::class, 'fetchStocks'])->name('fetch-stocks');
    Route::post('/search-stocks', [DataPlansController::class, 'Search'])->name('search-stocks');

});
Route::group(['prefix' => 'contacts', 'middleware' => ['auth', 'regular']], function () {
    Route::post('/store', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/index', [ContactController::class, 'index'])->name('contacts.index');
    Route::post('/update', [ContactController::class, 'update'])->name('contacts.update');
    Route::post('/delete', [ContactController::class, 'delete'])->name('contacts.destroy');
});



Route::group(['middleware' => ['auth', 'regular']], function () {

    Route::post('/fetch-data-plans', [DataPlansController::class, 'fetchPlans'])->name('fetch-data-plans');
    Route::post('/buy-data-plans', [BuyDataController::class, 'buyData'])->name('buy-data-plans');

    Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');


});


Route::group(['prefix' => 'settings', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/monnify_api_key', [SettingsController::class, 'monnifyKeys'])->name('monnify_api_key');
    Route::post('/monnify_api_key', [SettingsController::class, 'saveMonnify']);

    Route::get('/charges', [SettingsController::class, 'charges'])->name('charges');
    Route::post('/charges', [SettingsController::class, 'saveCharges']);


    Route::get('/pop_up_notification', [SettingsController::class, 'popup'])->name('pop_up_notification');
    Route::post('/pop_up_notification', [SettingsController::class, 'savePopup']);


});

Route::group(['prefix' => 'users', 'middleware' => ['auth', 'admin']], function () {
   
    Route::get('/regular', [UsersController::class, 'regular'])->name('regular.index');
    Route::get('/admins', [UsersController::class, 'admins'])->name('admins.index');
    Route::post('/manual-funding', [UsersController::class, 'manualFunding'])->name('manual-funding');
    Route::post('/change-password', [UsersController::class, 'changePassword'])->name('change-password');
    Route::delete('/{id}',  [UsersController::class, 'destroy'])->name('users.destroy');

    Route::post('/admin/submit',  [UsersController::class, 'storeAdmin'])->name('admin.store');


});