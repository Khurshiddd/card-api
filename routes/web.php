<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    view('welcome');
});

Route::get('test-sql/{id}', function ($id) {

    $data = \DB::table('users as u')
        ->join('profile as p', 'u.id', '=', 'p.user_id')
        ->select('u.name', 'u.email', 'p.photo', 'p.bio', 'p.birth_date')->get();
    return view('test', ['data'=>$data]);

});
