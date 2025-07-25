<?php

use App\Http\Controllers\HomeController;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/emirhan-ornek', function () {

    $users = User::all();
    $customers = Customer::all();

    return view('emirhan-ornek.icsayfa', compact('users', 'customers'));
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware("auth")->name('home');


Route::get('/hakkimizda', function () {
    return view('new.hakkimizda');
});


//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);

//Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
//    route::get('/tested','test')->name('test');
//    route::get('/detail','detail')->name('detail');
//});


Route::prefix('admin')->middleware("auth")->group(function () {
    Route::get('/test', [HomeController::class, 'test'])->middleware("auth")->name('test');
    Route::get('/detail', [HomeController::class, 'detail'])->middleware("auth")->name('detail');
    Route::get('/customers', [\App\Http\Controllers\CustomersController::class, 'index'])->middleware("auth")->name('customers.index');
    Route::get('/customers/add', [\App\Http\Controllers\CustomersController::class, 'create'])->middleware("auth")->name('customers.create');
    Route::post('/customers/add', [\App\Http\Controllers\CustomersController::class, 'store'])->middleware("auth")->name('customers.store');
    Route::get('/customers/{id}', [\App\Http\Controllers\CustomersController::class, 'edit'])->middleware("auth")->name('customers.edit');
    Route::post('/customers/{id}', [\App\Http\Controllers\CustomersController::class, 'update'])->middleware("auth")->name('customers.update');
    Route::get('/customers/sil/{id}', [\App\Http\Controllers\CustomersController::class, 'delete'])->middleware("auth")->name('customers.delete');

    Route::get('/accounts', [\App\Http\Controllers\AccountController::class, 'List'])->middleware("auth")->name('accounts.List');
    Route::Post('/accounts/add', [\App\Http\Controllers\AccountController::class, 'Store'])->middleware("auth")->name('accounts.Name');
    Route::get('/accounts/add', [\App\Http\Controllers\AccountController::class, 'Name'])->middleware("auth")->name('accounts.Create');
    Route::get('/accounts/delete/{id}', [\App\Http\Controllers\AccountController::class, 'delete'])->middleware("auth")->name('accounts.Delete');
    Route::get('/accounts/{id}', [\App\Http\Controllers\AccountController::class, 'edit'])->middleware("auth")->name('accounts.Edit');
    Route::post('/accounts/{id}', [\App\Http\Controllers\AccountController::class, 'update'])->middleware("auth")->name('accounts.Update');
});




Route::group(["prefix"=>"duty"],function () {
    Route::get("/New", [\App\Http\Controllers\DutyController::class, 'form'])->middleware("auth")->name('Duty.create');
    Route::post("/New", [\App\Http\Controllers\DutyController::class, 'store'])->middleware("auth")->name('Duty.store');
    Route::get("/edit/{id}",[\App\Http\Controllers\DutyController::class,"form"])->middleware("auth")->name('Duty.edit');
    Route::get("/MyDuty", [\App\Http\Controllers\DutyController::class, 'MyDutyList'])->middleware("auth")->name('Duty.MyDutys');
    Route::get("/delete/{id}",[\App\Http\Controllers\DutyController::class,"delete"])->middleware("auth")->name('Duty.delete');

    Route::get("/{id}",[\App\Http\Controllers\DutyController::class,"view"])->middleware("auth")->name('Duty.view');



});


Route::post('/duty/update-checkbox', [\App\Http\Controllers\DutyController::class, 'updateCheckbox'])->name('duty.updateCheckbox')->middleware("auth");

Route::get('/dashboard', function () {
    return view('dashboard');
});

Auth::routes();

