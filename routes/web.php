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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    
    ], 
    function() {
  
Route::get('/','WelcomeController@index')->name('welcome');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/modify',function(){ return view('modify') ; });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Article
Route::get('/blog','BlogController@index')->name('blog.index');
Route::post('/adArticle','ArticleController@store')->name('article.store');
Route::get('/Article/{articles}','ArticleController@show')->name('article.show');
Route::patch('/article/{article}','ArticleController@update')->name('article.update');
Route::get('/Article/{articles}/delete','ArticleController@delete')->name('article.delete');
Route::get('/Article/{articles}/modify','ArticleController@modify')->name('article.modify');

// project
Route::get('/project','ProjectController@index')->name('project');
Route::post('/adProject','ProjectController@store')->name('project.store');
Route::get('/Project/{projects}','ProjectController@show')->name('project.show');
Route::patch('/Project/{project}','ProjectController@update')->name('project.update');
Route::get('/Project/{projects}/delete','ProjectController@delete')->name('project.delete');
Route::get('/Project/{projects}/modify','ProjectController@modify')->name('project.modify');


//formation
Route::get('/formation','FormationController@index')->name('formation.index');
Route::post('/adFormation','FormationController@store')->name('formation.store');
Route::get('/Formation/{formations}','FormationController@show')->name('formation.show');
Route::patch('/Formation/{formations}','FormationController@update')->name('formation.update');
Route::get('/Formation/{formations}/delete','FormationController@delete')->name('formation.delete');
Route::get('/Formation/{formations}/modify','FormationController@modify')->name('formation.modify');

//Temoignage
Route::post('/Temoignage','TemoignageController@store')->name('temoignage.store');
Route::patch('/temoignage/{temoignage}','TemoignageController@update')->name('temoignage.update');
Route::get('/Temoignage/{temoignages}/delete','TemoignageController@delete')->name('temoignage.delete');
Route::get('/Temoignage/{temoignages}/modify','TemoignageController@modify')->name('temoignage.modify');

//Service
Route::get('/service','ServiceController@index')->name('service.index');
Route::post('/service','ServiceController@store')->name('service.store');
Route::patch('/service/{service}','ServiceController@update')->name('service.update');
Route::get('/Service/{services}/modify','ServiceController@modify')->name('service.modify');
Route::get('/Service/{services}/delete','ServiceController@delete')->name('service.delete');

Route::get('/admin','AdminController@show')->name('admin');
Route::post('/contacter','ContactController@store')->name('contact.store');

//newsletter
Route::post('/newsletter','NewsletterController@store')->name('newsletter');

//demande
Route::post('/stage','DemandeController@stage')->name('demandeStage');
Route::post('/formation','DemandeController@formation')->name('demandeFormation');
Route::get('/form-formation','DemandeController@indexF')->name('form-formation');
Route::get('/form-stage','DemandeController@indexS')->name('form-stage');

// Route::get('/form-formation', function(){
//     return view('form.form-formation');
// })->name('form-formation'); 

// Route::get('/form-stage', function(){
//     return view('form.form-stage');
// })->name('form-stage');


//slide
Route::post('/slide','SlideController@store')->name('slide.store');
Route::patch('/slide/{slides}','SlideController@update')->name('slide.update');
Route::get('/slide/{slides}/modify','SlideController@modify')->name('slide.modify');
Route::get('/slide/{slides}/delete','SlideController@delete')->name('slide.delete');


//formation video
Route::post('/FormationVideo','FormationVideoController@store')->name('formationVideo.store');
Route::get('/FormationVideo/{formationVideo}/modify','FormationVideoController@modify')->name('formationVideo.modify');
Route::get('/FormationVideo/{formationVideo}/delete','FormationVideoController@delete')->name('formationVideo.delete');
Route::patch('/FormationVideo/{formationVideo}','FormationVideoController@update')->name('formationVideo.update');


//formation video details
Route::post('/FormationVideoDetails','FormationVideoDetailsController@store')->name('formationVideoDetails.store');
Route::get('/FormationVideoDetails/{formationVideoDetails}/modify','FormationVideoDetailsController@modify')->name('formationVideoDetail.modify');
Route::get('/FormationVideoDetails/{formationVideoDetails}/delete','FormationVideoDetailsController@delete')->name('formationVideoDetail.delete');
Route::patch('/FormationVideoDetails/{formationVideoDetails}','FormationVideoDetailsController@update')->name('formationVideoDetail.update');
Route::get('/PasswordVideo/{formationVideo}','FormationVideoController@index1')->name('PasswordVideo');
Route::post('/PasswordVideo/{formationVideo}','FormationVideoController@store1')->name('video.store');
Route::get('/Video/{formationVideoDetails}','FormationVideoDetailsController@SeeVideo')->name('SeeVideo');



// categorie
Route::post('/adCategorie','CategorieProjectController@store')->name('categorie.store');
Route::get('/categorie/{categories}','CategorieProjectController@show')->name('categorie.show');
Route::get('/Categorie/{categories}/delete','CategorieProjectController@delete')->name('categorie.delete');
	
});