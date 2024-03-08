<?php

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

Route::view('/', 'pages.index')->name('index');
Route::view('/home', 'pages.index')->name('home');

Route::get('/customers', \App\Livewire\Indexes\CustomersIndex::class)->name('index-customers');
Route::get('/providers', \App\Livewire\Indexes\ProvidersIndex::class)->name('index-providers');
Route::get('/operators', \App\Livewire\Indexes\OperatorsIndex::class)->name('index-operators');
Route::get('/terminals', \App\Livewire\Indexes\TerminalsIndex::class)->name('index-terminals');
Route::get('/lines', \App\Livewire\Indexes\LinesIndex::class)->name('index-lines');
Route::get('/shipments', \App\Livewire\Indexes\ShipmentsIndex::class)->name('index-shipments');
Route::get('/ships', \App\Livewire\Indexes\ShipsIndex::class)->name('index-ships');
Route::get('/bills', \App\Livewire\Indexes\BillsIndex::class)->name('index-bills');
Route::get('/bookings', \App\Livewire\Indexes\BookingsIndex::class)->name('index-bookings');
Route::get('/imports', \App\Livewire\Indexes\ImportsIndex::class)->name('index-imports');
