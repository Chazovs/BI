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

Route::get('/', 'IndexController@index');
Route::get('/registerCompany', 'HomeController@registerCompany')->name('registerCompany');
Route::POST('/registerCompany/push', 'HomeController@pushRegisterCompany');
Route::get('/company/{id}/edit', 'IndexController@editCompany')->name('editCompany');
Route::get('/company/{id}/dot/{dotId}', 'CompanyController@dotIndex')->name('dotIndex');
Route::get('/profile/{id}/edit/', 'HomeController@editProfile')->name('editProfile');
Route::get('/profile/{id}', 'HomeController@profile')->name('profile');
Route::get('/profile/{id}/alltasks/', 'HomeController@allTasks')->name('allTasks');
Route::get('/about', 'HomeController@about')->name('about');

//роуты для аякс запросов
Route::POST('/taskContent','AjaxController@taskContent');//получает содержимое задачи
Route::POST('/edit/Task','AjaxController@editTask');//редактирует задачу
Route::POST('/get/responsibles','AjaxController@getCompanyUsers');//отдает ответственного
Route::POST('/push/task/new','AjaxController@pushNewTask');//постит новую задачу в текущую точку
Route::POST('/delete/task','AjaxController@deleteTask');//Удаляет задачу
Route::POST('/get/responsibles/and/dots','AjaxController@getCompanyUsersAndDots');// контроллер возвращает два селектора: пользователи компании и список всех точек

Auth::routes();

Route::get('/companies/my', 'HomeController@index')->name('home');
Route::get('/companies/{id}/idea', 'HomeController@idea')->name('idea');
Route::get('/companies/all', 'HomeController@all')->name('allCompanies');
Route::get('/companies/{id}', 'CompanyController@companyHome')->name('companyHome');

