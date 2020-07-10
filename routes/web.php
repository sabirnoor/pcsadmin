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

Route::get('/', 'HomeController@index');

//Route::get('/', function () {

//    return view('welcome');

//});



Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');



Route::match(['get', 'post'],'/events', array('uses' => 'StaticController@events'));

Route::match(['get', 'post'],'/newspaper', array('uses' => 'StaticController@newspaper'));

Route::match(['get', 'post'],'/aboutus', array('uses' => 'StaticController@aboutus'));

Route::match(['get', 'post'],'/ourmotto', array('uses' => 'StaticController@ourmotto'));

Route::match(['get', 'post'],'/director_desk', array('uses' => 'StaticController@director_desk'));

Route::match(['get', 'post'],'/academics', array('uses' => 'StaticController@academics'));

Route::match(['get', 'post'],'/contact_us', array('uses' => 'StaticController@contact_us'));

Route::match(['get', 'post'],'/syllabus/{id?}', array('uses' => 'StaticController@syllabus'));

Route::match(['get', 'post'],'/syllabusDelete/{id?}', array('uses' => 'StaticController@syllabusDelete'));

Route::match(['get', 'post'],'/noticeboardDelete/{id?}', array('uses' => 'StaticController@noticeboardDelete'));

Route::match(['get', 'post'],'/newseventsDelete/{id?}', array('uses' => 'StaticController@newseventsDelete'));

Route::match(['get', 'post'],'/uploadflashDelete/{id?}', array('uses' => 'StaticController@uploadflashDelete'));

Route::match(['get', 'post'],'/uploadflash/{id?}', array('uses' => 'StaticController@uploadflash'));

Route::match(['get', 'post'],'/noticeboard/{id?}', array('uses' => 'StaticController@noticeboard'));

Route::match(['get', 'post'],'/importExcel/{id?}', array('uses' => 'StaticController@importExcel'));

Route::match(['get', 'post'],'/birthday/{id?}', array('uses' => 'StaticController@birthday'));

Route::match(['get', 'post'],'/newsevents/{id?}', array('uses' => 'StaticController@newsevents'));





Route::match(['get', 'post'],'/gallery/{id?}', array('uses' => 'StaticController@gallery'));

Route::match(['get', 'post'],'/gallerycategory/{id?}', array('uses' => 'HomeController@gallerycategory'));

Route::match(['get', 'post'],'/deletegallcat/{id?}', array('uses' => 'HomeController@deletegallcat'));

Route::match(['get', 'post'],'/deletegalleryimage/{id?}', array('uses' => 'HomeController@deletegalleryimage'));

Route::match(['get', 'post'],'/birthdayDelete/{id?}', array('uses' => 'StaticController@birthdayDelete'));



Route::match(['get', 'post'],'/profile', array('uses' => 'HomeController@profile'));



Route::match(['get', 'post'],'/feedback/{id?}', array('uses' => 'HomeController@feedback'));

Route::match(['get', 'post'],'/feedbacklist/{id?}', array('uses' => 'HomeController@feedbacklist'));

Route::match(['get', 'post'],'/deletefeedback/{id?}', array('uses' => 'HomeController@deletefeedback'));



Route::match(['get', 'post'],'/studentmaster/{id?}', array('uses' => 'HomeController@studentmaster'));

Route::match(['get', 'post'],'/deletestudentmaster/{id?}', array('uses' => 'HomeController@deletestudentmaster'));



Route::match(['get', 'post'],'/sendsms', array('uses' => 'HomeController@sendsms'));
Route::match(['get', 'post'],'/sendinvitation', array('uses' => 'HomeController@sendinvitation'));


Route::match(['get', 'post'],'/quiz/{id?}', array('uses' => 'HomeController@quiz'));
Route::match(['get', 'post'],'/quizlist/{id?}', array('uses' => 'HomeController@quizlist'));
Route::match(['get', 'post'],'/deletequiz/{id?}', array('uses' => 'HomeController@deletequiz'));
Route::match(['get', 'post'],'/archivequiz/{id?}', array('uses' => 'HomeController@archivequiz'));


Route::match(['get', 'post'],'/question/{id?}', array('uses' => 'HomeController@question'));
Route::match(['get', 'post'],'/questionlist/{id?}', array('uses' => 'HomeController@questionlist'));
Route::match(['get', 'post'],'/deletequestion/{id?}', array('uses' => 'HomeController@deletequestion'));

Route::match(['get', 'post'],'/result/{id?}', array('uses' => 'HomeController@result'));
Route::match(['get', 'post'],'/resultlist/{id?}', array('uses' => 'HomeController@resultlist'));
Route::match(['get', 'post'],'/deleteresult/{id?}', array('uses' => 'HomeController@deleteresult'));

Route::match(['get', 'post'],'/invitation/{id?}', array('uses' => 'HomeController@invitation'));
Route::match(['get', 'post'],'/deleteinvitation/{id?}', array('uses' => 'HomeController@deleteinvitation'));

Route::match(['get', 'post'],'/get-filtered-students', array('uses' => 'HomeController@getfilteredstudents'));