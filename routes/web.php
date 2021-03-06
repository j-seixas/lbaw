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

Route::get('/', 'EventController@showList');

// API

Route::post('api/event/{id}/attendance', 'EventMemberController@editStatus');
Route::post('api/event/{id}/comment', 'EventController@addComment');
Route::post('api/comment/like', 'EventController@like');
Route::get('api/country', 'CountryController@list');

// Authentication

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Profile

Route::get('profile/{id}', 'ProfileController@show');
Route::post('profile/{id}', 'ProfileController@edit');
Route::delete('profile/{id}', 'ProfileController@delete');

// MyEvents

Route::get('myevents', 'MyEventsController@showMyEvents');

// Notifications

Route::get('notifications', 'NotificationsController@showNotifications');

// Events

Route::get('event', 'EventController@showCreateForm');
Route::post('event', 'EventController@create');
Route::get('event/{id}', 'EventController@show')->name('event');
Route::delete('event/{id}', 'EventController@delete');
Route::get('event/{id}/edit', 'EventController@showEditForm');
Route::post('event/{id}', 'EventController@edit');

// Search

Route::get('search', 'SearchController@search');

// Static pages

Route::get('faq', 'StaticPagesController@showFAQ');
Route::get('contacts', 'StaticPagesController@showContacts');
Route::get('about', 'StaticPagesController@showAbout');
Route::get('privacy', 'StaticPagesController@showPrivacy');
Route::get('team', 'StaticPagesController@showTeam');
Route::get('terms', 'StaticPagesController@showTerms');
