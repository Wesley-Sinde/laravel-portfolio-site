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

Route::get('/', 'MainController@index')->name('root');
Route::get('/about', 'MainController@about')->name('about');


Auth::routes();
Route::get('/profile', 'ProfileController@index')->middleware('auth')->name('profile.show');
Route::post('/profile/save', 'ProfileController@save')->middleware('auth')->name('profile.save');
Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::get('/project', 'ProjectController@index')->name('project.index');
Route::get('/project/new', 'ProjectController@new')->middleware('auth')->name('project.new');
Route::post('/project/save', 'ProjectController@save')->middleware('auth')->name('project.save');
Route::get('/project/{id}/show', 'ProjectController@show')->name('project.show');
Route::get('/project/{id}/edit', 'ProjectController@edit')->middleware('auth')->name('project.edit');
Route::patch('/project/{id}/update', 'ProjectController@update')->middleware('auth')->name('project.update');
Route::get('/project/{id}/delete', 'ProjectController@confirm_delete')->middleware('auth')->name('project.confirmdelete');
Route::delete('/project/{id}/delete', 'ProjectController@delete')->middleware('auth')->name('project.delete');

Route::get('/skill/new', 'SkillsController@new')->middleware('auth')->name('skill.new');
Route::post('/skill/save', 'SkillsController@save')->middleware('auth')->name('skill.save');


