<?php

use App\Http\Controllers\Frontend\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

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
    return view('frontend.index');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact-us', function () {
    return view('frontend.contact-us');
});
Route::get('/about-us', function () {
    return view('frontend.about-us');
});
Route::get('/categories', function () {
    return view('frontend.contact-us');
});

Route::get('/category-list/{cat_slug}/{sub_cat_slug}', [CategoryController::class, 'getItemByCategory']);
// Route::get('/category/{cat_slug}', 'UserController@productByParentCat');
// Route::get('/category/{location?}/{cat_slug}', 'UserController@productByCat');
// Route::get('/category/{location?}/{cat_slug}/{sub_cat_slug}', 'UserController@productByCat');



/** ADMIN ALL ROUTES */

Route::redirect('/admin', 'admin/dashboard');
Route::get('/admin-login', 'Admin\Auth\LoginController@showLoginForm');
Route::post('/admin-login', 'Admin\Auth\LoginController@doLogin');

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    //Admin Dashboard
    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin-dashboard');
    //Admin Logout
    Route::get('admin-logout', 'Admin\Auth\LoginController@logout')->name('logout');
    //Permissions
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    //Roles
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    //Admins Users
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');

    // Change Admins Users Password Routes...
    Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
    Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

    //Category
    Route::resource('category', 'Admin\CategoryController');
    //CMS  management
    Route::group(['prefix' => 'cms'], function () {
        Route::get('about-us', 'Admin\CmsController@aboutUs')->name('about-us');
        Route::get('privacy-policy', 'Admin\CmsController@privacyPolicy')->name('privacy-policy');
        Route::get('terms-and-condition', 'Admin\CmsController@termsAndCondition')->name('terms-and-condition');
        Route::get('faqs', 'Admin\CmsController@faqs')->name('faqs');
        Route::get('add-faqs', 'Admin\CmsController@addFaq')->name('faqs.create');
        Route::get('edit-faqs/{faqs}', 'Admin\CmsController@editFaq')->name('faqs.edit');
    });
});

Route::group(['middleware' => ['auth:seller'], 'prefix' => 'seller', 'as' => 'seller.'], function () {
    //seller route here
});

Route::get('clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return 'All config & cache Cleared.';
});

Route::get('migrate', function () {
    Artisan::call('migrate');
    return 'Table migration done.';
});

Route::get('seed', function () {
    Artisan::call('db:seed');
    return 'Table seeder done.';
});
