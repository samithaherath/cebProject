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

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

/*Route::get('/', function () {
    return view('frontend/pages/index');
});*/
Route::get('wel', function () {
    return view('frontend/pages/wel');
});

Route::get('myevents', function () {
    return view('user/pages/my_events');
});
Route::get('/', 'HomefrontController@index')->name('webfront');

Route::get('/about', function () {
    return view('frontend/pages/aboutus');
});

Route::get('/about', function () {
    return view('frontend/pages/aboutus');
});

Route::get('/contactinfo', function () {
    return view('frontend/pages/contact-information');
});

/*Route::get('/contact', function () {
    return view('frontend/pages/contact');
});*/

Route::get('/downloads', function () {
    return view('frontend/pages/downloads');
});
Route::get('/contact', 'ContactfrontController@index')->name('contactfront.show');
Route::post('/contact', 'ContactfrontController@store')->name('contactfront.send');
Route::get('/ourstaff', 'StafffrontController@index')->name('stafffront');
Route::get('/ourstaff/fetch_data', 'StafffrontController@fetch_data')->name('stafffrontdata');

/*Route::get('/ourstaff', function () {
    return view('frontend/pages/team');
});*/

Route::post('/search',function(){
   $q = Input::get('q');
   

   if ($q!=""){
   	$member = DB::select("select * from users where employee_id =? or name = ? ",[$q,$q]);

   	if(count($member)>0){
   		return view('frontend/pages/search')->withDetails($member)->withQuery($q);


   }
   	}
   	return view('frontend/pages/no_result');
});

Route::get('/sendbirthdaywish', 'BirthdayMessageController@sendBirthdaymessage')->name('birthdaywish');

Route::get('/ournews', 'NewsfrontController@index')->name('news');
Route::get('ournews/{id}','NewsfrontController@show')->name('newsfront.show');
Route::get('/ournews/fetch_data', 'NewsfrontController@fetch_data')->name('newsfrontdata');
Route::get('/ourevents', 'EventfrontController@index')->name('events');
Route::get('ourevents/{id}','EventfrontController@show')->name('eventfront.show');
Route::get('/ourevents/fetch_data', 'EventfrontController@fetch_data')->name('eventfrontdata');

//Route::get('/dashboard/admin','AdminController@index')->name('adminhome');
//Route::get('/dashboard/user','HomeController@index')->name('userhome');



//Route::get('/adminlogin','SessionController@create')->name('adminlogin');
//Route::get('/adminsignup','RegisterController@create');


//Route::post('/adminsignup','RegisterController@store');

//Route::get('/adminlogout','SessionController@destroy');

//Route::post('/adminlogin','SessionController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mymessages/{id}', 'HomeController@showmessages')->name('mymessages');
Route::get('/mygroups/{id}', 'HomeController@mygroups')->name('mygroups');
Route::get('user/editprofile','HomeController@showeditprofile')->name('user.editprofile');
Route::post('user/editprofile','HomeController@saveprofile')->name('user.editprofile');
Route::get('user/changepassword','HomeController@changepasswordform')->name('user.changepassword');
Route::post('user/changepassword','HomeController@savechangepassword')->name('user.changepassword');
Route::get('user/profile','HomeController@viewprofile')->name('user.profile'); 

Route::get('admin/editprofile','AdminController@showeditprofile')->name('admin.editprofile');
Route::post('admin/editprofile','AdminController@saveprofile')->name('admin.editprofile');
Route::get('admin/changepassword','AdminController@changepasswordform')->name('admin.changepassword');
Route::post('admin/changepassword','AdminController@savechangepassword')->name('admin.changepassword');
Route::get('admin/profile','AdminController@viewprofile')->name('admin.profile'); 
Route::get('admin/home','AdminController@index')->name('admin.home'); 
Route::get('admin/editor','EditorController@index'); 
Route::get('admin/test','EditorController@test');

//Membership section routes 
Route::delete('deleteall','MembershipController@deleteAll');
Route::delete('restoreall','MembershipController@restoreall');
Route::delete('recycleAll','MembershipController@recycleAll');
Route::get('admin/deletedmembers','MembershipController@showTrash')->name('member.deletedmembers'); 
Route::get('admin/members','MembershipController@index')->name('member.members'); 
Route::get('admin/members/add','MembershipController@create')->name('member.add');
Route::post('admin/members/add','MembershipController@store')->name('member.add'); 
Route::get('admin/members/edit','MembershipController@edit')->name('member.edit');
Route::get('admin/members/restore/{id}','MembershipController@restore')->name('member.restore');
Route::get('admin/members/recycle/{id}','MembershipController@recycle')->name('member.recycle');
Route::get('admin/members/profile/{id}','MembershipController@show')->name('member.show');
Route::post('admin/members/edit/{id}','MembershipController@update')->name('member.edit'); 
Route::resource('members','MembershipController');

//staff section routes 
Route::delete('deleteallstaff','StaffController@deleteAll');
Route::delete('restoreallstaff','StaffController@restoreall');
Route::delete('recycleAllstaff','StaffController@recycleAll');
Route::get('admin/deletedstaff','StaffController@showTrash')->name('staff.deletedstaff'); 
Route::get('admin/staff','StaffController@index')->name('staff.staffmembers'); 
Route::get('admin/staff/add','StaffController@create')->name('staff.add');
Route::post('admin/staff/add','StaffController@store')->name('staff.add'); 
Route::get('admin/staff/edit','StaffController@edit')->name('staff.edit');
Route::get('admin/staff/restore/{id}','StaffController@restore')->name('staff.restore');
Route::get('admin/staff/recycle/{id}','StaffController@recycle')->name('staff.recycle');
Route::post('admin/staff/edit/{id}','StaffController@update')->name('staffs.update'); 
Route::resource('staff','StaffController');

//transfer section
Route::get('admin/transfer/pending','TransferController@index')->name('transfer.index');
Route::get('admin/transfer/transfered','TransferController@view')->name('transfer.view');


//events section routes
Route::delete('restoreallevents','EventController@restoreall');
Route::delete('recycleAllevents','EventController@recycleAll');
Route::delete('deleteallevents','EventController@deleteAll');
Route::get('admin/deletedevents','EventController@showTrash')->name('event.deletedevents'); 
Route::get('admin/events','EventController@index')->name('event.events'); 
Route::get('admin/events/add','EventController@create')->name('event.add');
Route::post('admin/events/add','EventController@store')->name('event.add');
Route::get('admin/events/restore/{id}','EventController@restore')->name('event.restore');
Route::get('admin/events/recycle/{id}','EventController@recycle')->name('event.recycle');
Route::post('admin/events/show/{id}','EventController@show')->name('event.show');
Route::get('admin/events/edit','EventController@edit')->name('event.edit');
Route::post('admin/events/edit/{id}','EventController@update')->name('event.edit'); 
Route::get('admin/events/profile/{id}','EventController@show')->name('event.show');
Route::resource('events','EventController');


//news  section routes
Route::delete('restoreallnews','NewsController@restoreall');
Route::delete('recycleAllnews','NewsController@recycleAll');
Route::delete('deleteallnews','NewsController@deleteAll');
Route::get('admin/deletednews','NewsController@showTrash')->name('news.deletednews'); 
Route::get('admin/news','NewsController@index')->name('news.newses'); 
Route::get('admin/news/add','NewsController@create')->name('news.add');
Route::post('admin/news/add','NewsController@store')->name('news.add');
Route::post('admin/news/show/{id}','NewsController@show')->name('news.show');
Route::get('admin/news/edit','NewsController@edit')->name('news.edit');
Route::get('admin/news/restore/{id}','NewsController@restore')->name('news.restore');
Route::get('admin/news/recycle/{id}','NewsController@recycle')->name('news.recycle');
//Route::post('news/edit/{id}','NewsController@update')->name('news.edit'); 
Route::post('admin/news/edit/{id}','NewsController@update')->name('news.newsupdate'); 
Route::get('admin/news/profile/{id}','NewsController@show')->name('news.show');
Route::resource('news','NewsController');


//Workplace section routes 
Route::delete('deleteallworkplace','WorkplaceController@deleteAll');
Route::get('admin/workplaces','WorkplaceController@index')->name('workplace.workplaces'); 
Route::get('admin/workplaces/add','WorkplaceController@create')->name('workplace.add');
Route::post('admin/workplaces/add','WorkplaceController@store')->name('workplace.add'); 
Route::get('admin/workplaces/edit','WorkplaceController@edit')->name('workplace.edit');
//Route::get('admin/workplaces/profile/{id}','WorkplaceController@show')->name('workplace.show');
Route::post('admin/workplaces/edit/{id}','WorkplaceController@update')->name('workplace.edit'); 
Route::resource('workplaces','WorkplaceController');


//Designation section routes 
Route::delete('deletealldesignation','DesignationsController@deleteAll');
Route::get('admin/designations','DesignationsController@index')->name('designation.designations'); 
Route::get('admin/designations/add','DesignationsController@create')->name('designation.add');
Route::post('admin/designations/add','DesignationsController@store')->name('designation.add'); 
Route::get('admin/designations/edit','DesignationsController@edit')->name('designation.edit');
//Route::get('admin/workplaces/profile/{id}','WorkplaceController@show')->name('workplace.show');
Route::post('admin/designations/edit/{id}','DesignationsController@update')->name('designation.edit'); 
Route::resource('designations','DesignationsController');

//Group section routes 

Route::delete('restoreallgroups','GroupsController@restoreall');
Route::delete('recycleAllgroups','GroupsController@recycleAll');
Route::delete('deleteallgroups','GroupsController@deleteAll');
Route::get('admin/deletedgroups','GroupsController@showTrash')->name('groups.deletedgroups'); 
Route::get('admin/groups','GroupsController@index')->name('group.groups'); 
Route::get('admin/groups/add','GroupsController@create')->name('group.add');
Route::post('admin/groups/add','GroupsController@store')->name('group.add'); 
Route::get('admin/groups/edit','GroupsController@edit')->name('group.edit');
Route::get('admin/groups/restore/{id}','GroupsController@restore')->name('group.restore');
Route::get('admin/groups/recycle/{id}','GroupsController@recycle')->name('group.recycle');
Route::get('admin/groups/profile/{id}','GroupsController@show')->name('group.show');
Route::post('admin/groups/profile/addmember','GroupsController@savememberingroup')->name('group.addmemberingroup');
Route::post('admin/groups/edit/{id}','GroupsController@update')->name('group.edit'); 
Route::post('admin/groups/destroymember/','GroupsController@destroymember')->name('group.destroymember'); 
Route::post('admin/groups/destroymembers/','GroupsController@deleteAllmembers')->name('group.deleteallmembers'); 
Route::get('admin/groups/addmember/','GroupsController@showaddmemberform')->name('group.addmember'); 
Route::post('admin/groups/addmember/','GroupsController@savemember')->name('group.addmember'); 
Route::get('admin/searchmembergroup', ['as'=>'searchmembergroup','uses'=>'SmsController@searchResponse']);
Route::resource('groups','GroupsController');


//Message section routes 
//Route::delete('deleteall','SmsController@deleteAll');
Route::get('admin/messages','SmsController@index')->name('message.messages'); 
Route::get('admin/messages/singlesend','SmsController@createsinglemessage')->name('message.singlesend');
Route::post('admin/messages/singlesend','SmsController@storesinglemessage')->name('message.singlesend');
Route::get('admin/messages/sendall','SmsController@createmultiplemessage')->name('message.multiplesend');
Route::post('admin/messages/sendall','SmsController@storesmultiplemessage')->name('message.multiplesend');
Route::get('admin/messages/sendgroupmessage','SmsController@creategroupmessage')->name('message.groupsend');
Route::post('admin/messages/sendgroupmessage','SmsController@storesgroupmessage')->name('message.groupsend');
Route::get('admin/messages/sendmessageusers','SmsController@createmultiplemessageusers')->name('message.multiplesendusers');
Route::post('admin/messages/sendmessageusers','SmsController@storesmultiplemessageusers')->name('message.multiplesendusers');
//Route::post('admin/messages/send','SmsController@store')->name('message.send'); 
//Route::get('admin/messages/edit','SmsController@edit')->name('message.edit');
//Route::get('admin/messages/profile/{id}','SmsController@show')->name('message.show');
//Route::post('admin/messages/edit/{id}','SmsController@update')->name('message.edit'); 
//Route::get('admin/messages/addmember/','SmsController@showaddmemberform')->name('message.addmember'); 
//Route::post('admin/messages/addmember/','SmsController@savemember')->name('message.addmember'); 
Route::get('admin/searchmember', ['as'=>'searchmember','uses'=>'SmsController@searchResponse']);
Route::resource('messages','SmsController');









Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::get('admin/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('admin/login', 'Admin\LoginController@login');
Route::post('admin/register', 'Admin\RegisterController@register')->name('admin.register');
//Route::post('admin', 'Admin\LoginController@logout');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
//Route::post('register','Admin\RegisterController@register');
//Route::get('register','Admin\RegisterController@showRegistrationForm');


