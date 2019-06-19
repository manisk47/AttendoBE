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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about')->name('about');


Route::resource('teachers','TeachersController');
Route::resource('students','StudentsController');
Route::resource('courses','CoursesController');
Route::resource('sessions','SessionsController');

Route::post('/teachers/{id}/courses', 'TeachersController@storeCourse')->name('storeCourse');
Route::get('/teachers/{id}/removeCourse/{course}', 'TeachersController@removeCourse')->name('removeCourse');

Route::post('/courses/{id}/teachers', 'CoursesController@storeTeacher')->name('storeTeacher');
Route::get('/courses/{id}/removeTeacher/{teacher}', 'CoursesController@removeTeacher')->name('removeTeacher');