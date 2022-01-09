<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




////////////All routes on admin login and signUp////////////////
Route::post('AdminSign','AdminSignController@AdminSign');
Route::post('AdminLogin','AdminSignController@Login');

//////////////////All routes on Add member////////////////////////////
Route::post('add_Member','DdMemberController@addMember');
//Route::get('view_Members/{club_name}','DdMemberController@viewMembers');
Route::get('view_Members','DdMemberController@viewMembers');
Route::get('view_By','DdMemberController@View_By');
Route::post('Update_member','DdMemberController@updateMember');
Route::post('delete','DdMemberController@delete');

///////////////All routes on Announcement///////////////////////////////
Route::post('Add_Announce','AnnouncementController@addAnnouncement');
Route::post('Add_Announce','AnnouncementController@addAnnouncement');
Route::get('View_Announce','AnnouncementController@viewAnnouncement');
Route::get('View_Title','AnnouncementController@View_By_Title');
Route::post('Update_Message','AnnouncementController@updateMessage');
Route::post('delete_Message','AnnouncementController@delete');


/////////////////////All routes on course materials/////////////////////
Route::get('course_contents', 'CourseMaterialController@view_contents');


