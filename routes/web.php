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

Route::get('/', function(){
  /*  $config['center']='Air Canada Center,Toronto';
    $config['zoom']='14';
    $config['map_height']='500px';
    $config['_scrollwheel']='false';

    GMaps::initialize($config);
    $map = GMaps::create_map();
    return view('pages.home')->with('map',$map);*/
    return view('pages.home');
    
   
    });
    Route::get('/videocall',function()
    {
      return view('pages.video');

    });

    Route::group(['middleware'=>['auth','admin']],function()
    {
      Route::get('/dashboard', 'DashboardController@index');
      Route::get('/address','addressController@index');
      Route::resource('address','addressController');
      Route::get('/create','addressController@create');
      Route::get('/update','addressController@edit');
      Route::get('/updated','addressController@update');
      Route::get('/createTour','virtualTourController@create')->name('previewTour');
      Route::post('/ajax_upload/action', 'virtualTourController@action')->name('ajaxupload.action');
      Route::post('/tour', 'virtualTourController@store')->name('tour');
      Route::post('/tourUpdate', 'virtualTourController@update')->name('tourUpdate');
      

    });

Auth::routes();


Route::get('/visitSite','virtualTourController@visitSite');
//Route::post('/sendMail', 'MailController@mail')->name('sendMail');
Route::post('sendbasicemail','MailController@basic_email');
Route::get('/chat','ChatController@index')->middleware('auth')->name('chat.index');
Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');
Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');
Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');
Route::post('/getHostel', 'DashboardController@hostel')->name('getHostel')->middleware('auth');
Route::get('/{hostelName}','DashboardController@showHostel');
Route::get('/visitVirtually/{userID}','DashboardController@visitVirtually')->name('visitVirtually/{userID}');
Route::post('/startChat', 'FriendController@store')->name('startChat');
Route::post('/GiveReview','DashboardController@Review')->name('GiveReview');