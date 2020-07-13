<?php

use App\models\SubCategory;
use App\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Symfony\Component\Console\Input\Input as InputInput;

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


Auth::routes();

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::any('recover', 'HomeController@recover');


Route::get('/about', function() {
    return view('pages.about');
})->name('about');

Route::get('/termos-e-condicoes', 'HomeController@termos')->name('termos');
Route::get('/contact', function() {
    return view('pages.contact');
})->name('contact');

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@index')->middleware('auth');
Route::get('/profile', 'UserController@profile')->name('profile')->middleware('auth');
Route::get('/profile/edit', 'UserController@edit')->name('edit-profile')->middleware('auth');
Route::post('/profile/edit', 'UserController@update')->name('update-profile')->middleware('auth');

Route::post('/profile/change-password', 'UserController@changePassword')->name('password_update');

Route::get('/profile/photo', 'UserController@photoEdit')->name('edit-profile-photo');
Route::post('/profile/photo', 'UserController@updatePhoto')->name('update-profile-photo');


// Admin Group&NameSpace
Route::group(['prefix' => 'admin/', 'middleware' => ['auth', 'admin', 'verified']], function(){
    
    Route::get('/', 'AdminController@index');
    Route::any('/config', 'AdminController@config');

    Route::get('/users', function() {
        return view('admin.users.index');
    });

    Route::get('/user/delete/{user}', 'UserController@destroy');

    Route::get('/toadmin/{user}', 'UserController@changeToAdmin');
    Route::get('/active-toggle/{user}', 'UserController@activeToggle');

});

// Admin Group&NameSpace
// Route::group(['prefix' => 'todos/', 'middleware' => ['auth', 'verified']], function(){
    
//     Route::get('/', 'TodoController@index')->name('todos.index');
//     Route::get('/create', 'TodoController@create')->name('todos.create');
//     Route::post('/store', 'TodoController@store')->name('todos.store');
//     Route::get('/edit/{todo}', 'TodoController@edit')->name('todos.edit');
//     Route::patch('/{todo}', 'TodoController@update')->name('todos.update');
//     Route::get('/delete/{todo}', 'TodoController@destroy')->name('todos.destroy');
//     Route::put('/complete/{todo}', 'TodoController@complete')->name('todo.complete');
//     Route::delete('/incomplete/{todo}', 'TodoController@incomplete')->name('todo.incomplete');

// });

Route::middleware('auth')->group(function() {
    Route::resource('/todos', 'TodoController');
    Route::put('/complete/{todo}', 'TodoController@complete')->name('todo.complete');
    Route::delete('/incomplete/{todo}', 'TodoController@incomplete')->name('todo.incomplete'); 
    Route::get('/delete/{todo}', 'TodoController@destroy')->name('todo.destroy');   
});

Route::get('/account_confirm', 'HomeController@account_confirm');
Route::any('/mail_resend', 'HomeController@resend_verification');
Route::post('/user/register', 'HomeController@register');

Route::post('/upload', 'UserController@uploadAvatar');
Route::get('help', function () {
    echo 'help';
})->name('help');
