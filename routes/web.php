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
// font end routes

Route::get('/','FrontEndController@offres');
Route::get('/apropos', 'FrontEndController@apropos');
Route::get('/offres', 'FrontEndController@offres');
Route::get('/formations','FrontEndController@formations');
Route::get('/offresbyentreprise/{id}','FrontEndController@coutoffresbyentreprise')->name('countoffre');

// end front end routes
// Admin routes  
Route::group(['prefix' => 'admin'  ], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
Route::group(['prefix' => 'admin' , 'middleware' => 'admin' ], function () {
  /* les routes ajoutée -- lists of contents */ 
  Route::get('/dashboard/','AdminController@dashboard')->name('dashboard');
  Route::get('/dashboard/tags','AdminController@tags')->name('tags');
  Route::get('/dashboard/locations','AdminController@locations')->name('locations');
  Route::get('/dashboard/typescontrats','AdminController@typescontrats')->name('typescontrats');
  Route::get('/dashboard/categories','AdminController@categories')->name('categories');
  Route::get('/dashboard/admins','AdminController@admins')->name('admins');
  Route::get('/dashboard/entreprises','AdminController@entreprises')->name('entreprises');
  Route::get('/dashboard/candidats','AdminController@candidats')->name('candidats');
  /* les routes d'ajout */ 
  Route::get('/dashboard/tags/add','AdminController@addtags')->name('addtags');
  Route::post('/dashboard/tags/save','AdminController@savetags')->name('savetags');
  Route::get('/dashboard/locations/add','AdminController@addlocations')->name('addlocations');
  Route::post('/dashboard/locations/save','AdminController@savelocations')->name('savelocations');
  Route::get('/dashboard/typescontrats/add','AdminController@addtypescontrats')->name('addtypescontrats');
  Route::post('/dashboard/typescontrats/save','AdminController@savetypescontrats')->name('savetypescontrats');
  Route::get('/dashboard/categories/add','AdminController@addcategories')->name('addcategories');
  Route::post('/dashboard/categories/save','AdminController@savecategories')->name('savecategories');
  Route::get('/dashboard/admins/add','AdminController@addadmins')->name('addadmins');
  Route::post('/dashboard/admins/save','AdminController@saveadmins')->name('saveadmins');
  // les routes de suppression 
  Route::get('/dashboard/tags/delete/{id}','AdminController@deletetags')->name('deletetags');
  Route::get('/dashboard/locations/delete/{id}','AdminController@deletelocations')->name('deletelocations');
  Route::get('/dashboard/typescontrats/delete/{id}','AdminController@deletetypescontrats')->name('deletetypescontrats');
  Route::get('/dashboard/categories/delete/{id}','AdminController@deletecategories')->name('deletecategories');
  Route::get('/dashboard/admin/delete/{id}','AdminController@deleteadmins')->name('deleteadmins');
  Route::get('/dashboard/entreprise/delete/{id}','AdminController@deleteentreprises')->name('deleteentreprises');
  Route::get('/dashboard/candidat/delete/{id}','AdminController@deletecandidat')->name('deletecandidat');
  /* settings */  
  Route::get('/dashboard/settings', 'AdminController@settings')->name('settings');
  Route::post('dashboard/SaveSettings', 'AdminController@SaveSettings')->name('SaveSettings');
  
});
// end Admin routes






// Entreprises routes
Route::group(['prefix' => 'entreprise'], function () {
  Route::get('/login', 'EntrepriseAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EntrepriseAuth\LoginController@login');
  Route::post('/logout', 'EntrepriseAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'EntrepriseAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'EntrepriseAuth\RegisterController@register');

  Route::post('/password/email', 'EntrepriseAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'EntrepriseAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EntrepriseAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'EntrepriseAuth\ResetPasswordController@showResetForm');
  // routes added
   });
Route::group(['prefix' => 'entreprise' , 'middleware' => 'entreprise' ], function () {
  Route::group(['prefix' => 'offres'], function(){
    Route::get('/add', 'EntrepriseOffresController@formaddoffre');
    Route::post('/add', 'EntrepriseOffresController@addoffre');
    Route::get('/list', 'EntrepriseOffresController@listOffres')->name('offres.list');
    Route::get('/list/{id}', 'EntrepriseOffresController@listOffres')->name('offre.show');
    Route::get('/delete/{id}', 'EntrepriseOffresController@deleteOffre')->name('offre.delete'); 
    Route::get('/update/{id}', 'EntrepriseOffresController@updateOffre')->name('offre.update');; 
    Route::post('/saveupdate/{id}', 'EntrepriseOffresController@commitupdateoffre')->name('offre.saveupdate'); 
  });
  Route::group(['prefix' => 'formation'], function(){
    Route::get('/add', 'EntrepriseFormationsController@getAjoutForm');
    Route::post('/add', 'EntrepriseFormationsController@ajoutFormation');
    Route::get('/list', 'EntrepriseFormationsController@listOffres')->name('formation.list');
    Route::get('/list/{id}', 'EntrepriseFormationsController@listOffres')->name('formation.show');
    Route::get('/delete/{id}','EntrepriseFormationsController@deleteFormation')->name('formation.delete'); 
    Route::get('/update/{id}', 'EntrepriseFormationsController@getupdateForm')->name('formation.update');; 
    Route::post('/saveupdate/{id}', 'EntrepriseFormationsController@commitupdateFormation')->name('formation.saveupdate'); 
  }); 
  Route::get('/settings', 'EntrepriseSettingController@settings');
  Route::post('/SaveSettings', 'EntrepriseSettingController@SaveSettings');

});
// end entreprises routes
// user routes
Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'UserAuth\RegisterController@register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});
// user routes