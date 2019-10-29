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
    // return '<a href="/student">Addept</a>';
    return view('index');
});

// Student
Route::resource('student', 'StudentController');
Route::get('/student/delete/{id}','StudentController@delete');

//Classroom
Route::resource('classroom', 'ClassroomController');
// Route::get('/addstudent','StudentController@index')->name('addstudent');
// Route::post('/addstudent','StudentController@c')->name('addstudent');