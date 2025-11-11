<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LaboratoryController;

Route::get('/', fn() => redirect()->route('items.index'));

Route::resource('items', ItemController::class);
Route::resource('laboratories', LaboratoryController::class);




// kfjkdsfkdsfhksdhfd