<?php

use App\Notifications\Announcement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

C:\Users\USER\phpproj\dap>php artisan tinker

 $admin=new App\Admin
 $admin->name="Test Admin"
 $admin->email="tipusultan50@gmail.com"
 $admin->password=Hash::make('testpassword')
 $admin->save()
 exit


 $admin=new App\Admin
 $admin->name="Abdullah Mehedi"
 $admin->email="md.abdullah.mehedi@gmail.com"
 $admin->password=Hash::make('testpassword')
 $admin->save()
 exit




*/

Route::get('/', function () {
    return view('test');
});

Route::post('/', function (Request $request) {
    //dd($request->question);
    DB::table('ticket')->insert(array('question'=>$request->question, 'email'=>$request->email));
    $users = \App\Admin::all();
    $data=$request;
    foreach($users as $user){
        $user->notify(new \App\Notifications\newticket($data));
    }
    return redirect('/');
});
Route::get('/unsubscribe/{token}',function ($token){
    $user=DB::table('newstellers')->where('token',$token)->delete();
    //$user->delete();
    return view('deleted');
});
//Route::get('/test', function () { return view('test');});
Route::post('/test', function (Request $request) {

    DB::table('newstellers')->insert(array('email'=>$request->email,'token'=>\Illuminate\Support\Str::random(16)));
    //DB::table('newsteller')->insert('email'=>$request->email);
});

Auth::routes();
Route::prefix('home')->group(function(){
Route::get('/', 'HomeController@index')->name('home');
Route::patch('/', 'HomeController@edit');
Route::post('/', 'HomeController@post');
Route::get('/qa', 'HomeController@answers');
});

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::post('/', 'AdminController@package');
    Route::delete('/', 'AdminController@destroysingle');
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::get('status/{id}','AdminController@status')->name('status');
    Route::get('/announcement', 'AdminController@announcement');
    Route::post('/announcement', 'AdminController@storeannouncement');
    Route::post('/announcement/new', 'AdminController@news');
    Route::get('/question', 'AdminController@question');
    Route::get('/question/{id}', 'AdminController@questionsingle');
    Route::post('/question', 'AdminController@answer');
    Route::get('/static', 'AdminController@statics');
    Route::delete('/static', 'AdminController@deletealldeactivated');
    Route::get('/{id}', 'AdminController@user');
    Route::get('/ticket', 'AdminController@ticket');

});



