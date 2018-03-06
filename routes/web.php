<?php

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

Route::get('/test',function(){
	return App\PrivateMessage::where('id',1)->first();
});

Route::get('/mail',function(){
	return new App\Mail\EmailVerification('good');
});

Route::get('/verifye-mail/{token}','Auth\RegisterController@verify');

//Route::get('get-private-messages-notifications','PrivateMessageController@getNotifications');
// Route::post('get-private-messages','PrivateMessageController@getMessages');
// Route::post('get-private-message','PrivateMessageController@getMessageById');
// Route::post('get-private-messages-sent','PrivateMessageController@getMessagesSent');
// Route::post('sent-private-message','PrivateMessageController@getSentMessages');

Route::get('send/message',function(){
	$job = (new App\Jobs\SendMailJob)->delay(\Carbon\Carbon::now()->addSeconds(3));
	dispatch($job);
	return "Done Send Message";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
