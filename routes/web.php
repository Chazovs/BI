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

Route::get('/',  ['as' => 'auth.login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::get('/home',  'HomeController@index');
Route::get('/registerCompany', 'HomeController@registerCompany')->name('registerCompany');
Route::POST('/registerCompany/push', 'HomeController@pushRegisterCompany');
Route::get('/company/{id}/edit', 'IndexController@editCompany')->name('editCompany');
Route::get('/company/{id}/dot/{dotId}', 'CompanyController@dotIndex')->name('dotIndex');
Route::get('/profile/{id}/edit/', 'HomeController@editProfile')->name('editProfile');//отдает страницу редактирования профайла
Route::POST('/profile/{userId}/edit/push', 'HomeController@pushEditProfile')->name('profileEditPush');//вносит новые данные о пользователе в БД
Route::get('/profile/{id}', 'HomeController@profile')->name('profile');
Route::get('/profile/{id}/alltasks/', 'HomeController@allTasks')->name('allTasks');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/company/{id}/tree', 'HomeController@tree')->name('tree'); //показывает карту точек компании

//недостаточно прав
Route::get('/error', function (){return view("error");})->name('error');

//роуты на контроллер администратора компании
Route::get('/company/{id}/user/request', 'CompanyAdminController@userRequest')->name('userRequest'); //показывает запросы на добавление
Route::POST('/company/{id}/accept/user/request','CompanyAdminController@acceptUserRequest');//принимает запрос на участие в команде компании


//роуты для аякс и пост запросов из js файлов. в основном из main.js
Route::POST('/taskContent','AjaxController@taskContent');//получает содержимое задачи
Route::POST('/edit/Task','AjaxController@editTask');//редактирует задачу
Route::POST('/get/responsibles','AjaxController@getCompanyUsers');//отдает ответственного
Route::POST('/push/task/new','AjaxController@pushNewTask');//постит новую задачу в текущую точку
Route::POST('/delete/task','AjaxController@deleteTask');//Удаляет задачу
Route::POST('/get/responsibles/and/dots','AjaxController@getCompanyUsersAndDots');// контроллер возвращает два селектора: пользователи компании и список всех точек
Route::POST('/push/dot/new','AjaxController@pushNewDotFromIndex');//Создает новую точку с главной
Route::POST('/push/idea/new','AjaxController@pushNewIdea');//Создает новую идею для разработчиков
Route::POST('/change/task/status','AjaxController@changeTaskStatus');//Создает новую идею для разработчиков
Route::POST('/push/chart/new','AjaxController@pushChartNew');//Создает новый график
Route::POST('/add/chart/to/dot','AjaxController@addСhartToDot');//закрепляет график за точкой
Route::POST('/add/data/to/chart','AjaxController@addDataToChart');//добавляет данные к графику
Route::POST('/add/new/user/request/to/company','AjaxController@addNewUserRequestToCompany');//Отправляет новый запрос от пользователя на добавление в компанию
Route::POST('/company/invitation', 'AjaxController@companyInvitation'); //Отправляет пользователю приглашение в компанию
Route::POST('/company/invitation/accept', 'AjaxController@companyInvitationAccept'); //принимает приглашение от компании
Route::POST('/get/idea/body', 'AjaxController@getIdeaBody'); //отдает информацию для модального окна

//роут из дерева точек jQuery.jHTree.js
Route::POST('/push/dot/new/parent','AjaxController@pushDotNewParent');//меняет родителя точки

Auth::routes();

Route::get('/companies/my', 'HomeController@index')->name('home');
Route::get('/companies/{companyId}/idea', 'HomeController@idea')->name('idea');//показывает все идеи, предложенные для конкретной компании
Route::get('/companies/all', 'HomeController@all')->name('allCompanies');//все компании, зареганные на Bi
Route::get('/companies/{id}', 'CompanyController@companyHome')->name('companyHome');
Route::get('/users/all', 'HomeController@usersAll')->name('usersAll');// показывает всех пользователей, зарегистрированных на портале
Route::get('/my/companies/invitation', 'HomeController@myCompaniesInvitation')->name('myInvitation');// показывает пользователю все компании, которые его пригласили
Route::get('/company/{companyId}/users', 'HomeController@companyUsers')->name('companyUsers');//показываем всех сотрудников компании
