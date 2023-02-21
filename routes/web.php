<?php

use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth'])->group(function() {

    // Route::get('/', function () {
    //     return view('home')->name('index');
    // });

    Route::get('/logout', function () {
        return view('logout')->name('logout');
    });
    
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');

});

Route::middleware(['guest'])->group(function() {

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('index');
    Route::get('/sdc/portal', function() {
        $url = 'https://dapp.sdc.cx/images/';
        $name = 'action';
        $data = [ [ 'url' => $url . 'T-POT.png', 'name' => 'TPOT Dashboard' ], [ 'url' => $url . 'KROT.png', 'name' => 'KROT Robot Trader' ], 
                  [ 'url' => $url . 'BRACS.png', 'name' => 'BRACS Education' ], [ 'url' => $url . 'GETS.png', 'name' => 'GETS Token Store' ] ];
        return view('sdc-portal', compact('data'));
    })->name('sdc_portal');
});
