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

Use App\Http\Controllers\EventController;

Route::get('/', 
    [EventController::class, 'index']
);

Route::get('/events/create', 
    [EventController::class, 'create']
);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/produtos', function () {

    $search = request('search');

    $vars = [
        'search' => $search
    ];

    return view('products', $vars);
});

Route::get('/produtos_teste/{id?}', function ($id = 0) {
    
    $vars = [
        'id' => $id
    ];

    return view('product', $vars);
});
