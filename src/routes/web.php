<?php

use App\Http\Livewire\AdminTicket\AdminShowTicketController;
use App\Http\Livewire\Ticket\ShowTicketController;
use App\Http\Livewire\Ticket\TicketController;
use App\Http\Livewire\AdminTicket\AdminTicketController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(
	[
		'middleware' => ['auth'],
	],
	function ()
    {
        Route::get('/home', TicketController::class)->name('home');
        Route::get('/ticket/{id}', ShowTicketController::class)->name('ticket');
    }
);


/////////////////////admin
Route::prefix('admin')->name('admin.')->group(function ()
    {
        Route::get('/home', AdminTicketController::class)->name('home');
        Route::get('/ticket/{id}', AdminShowTicketController::class)->name('ticket');
    }
);
