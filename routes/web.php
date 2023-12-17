<?php

use App\Http\Controllers\ArticleController;
use App\Jobs\TestingQueue;
use Illuminate\Support\Facades\Route;

use const App\Jobs\TestingQueue;

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
//    (new TestingQueue())->handle();
    foreach (range(1, 100) as $i) {
        TestingQueue::dispatch();
    }
    \App\Jobs\ProcessPayment::dispatch()->onQueue('payments');
    return view('home');
});
Route::resource('articles', ArticleController::class);
