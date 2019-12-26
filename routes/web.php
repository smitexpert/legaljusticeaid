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

use App\Site;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomePageController@index');

Route::get('/logout', function () {
    abort(403);
});

view()->composer('*', function ($view) {
  $siteOptions = Site::where('slug', 'mysite')->limit(1)->first();
  $view->with('SiteOptions', $siteOptions);
});



Route::group(['middleware' => 'adminRoute'], function(){
  Route::get("/admin/user", "UserController@index");
  Route::get("/admin/user/add", "UserController@add");
  Route::post("/admin/user/add", "UserController@addNew");
  Route::get("/admin/user/terminate/{id}", "UserController@terminate");
  Route::get("/admin/user/edit/{id}", "UserController@edit");
  Route::post("/admin/user/edit", "UserController@update");
  Route::get("/admin/user/restore/{id}", "UserController@restore");
  Route::get("/admin/user/delete/{id}", "UserController@delete");
  Route::get("/admin/site", "SiteController@index");
  Route::post("/admin/site", "SiteController@add");
  Route::get("/admin/site/logo", "SiteController@logo");
  Route::post("/admin/site/logo/header", "SiteController@headerLogo");
  Route::post("/admin/site/logo/footer", "SiteController@footerLogo");
});

Route::group(['middleware' => 'managerRoute'], function () {
  Route::get("/admin/courts", "CourtController@index");
  Route::post("/admin/courts", "CourtController@add");
  Route::get("/admin/courts/delete/{id}", "CourtController@delete");
  Route::get("/admin/courts/restore/{id}", "CourtController@restore");
  Route::get("/admin/courts/remove/{id}", "CourtController@remove");
  Route::get("/admin/courts/edit/{id}", "CourtController@edit");
  Route::post("/admin/courts/update", "CourtController@update");
  Route::get("/admin/specialization", "SpecializationController@index");
  Route::post("/admin/specialization", "SpecializationController@add");
  Route::get("/admin/specialization/delete/{id}", "SpecializationController@delete");
  Route::get("/admin/specialization/restore/{id}", "SpecializationController@restore");
  Route::get("/admin/specialization/remove/{id}", "SpecializationController@remove");
  Route::get("/admin/specialization/edit/{id}", "SpecializationController@edit");
  Route::post("/admin/specialization/edit", "SpecializationController@update");
  Route::get("/admin/practicearea", "PracticeAreaController@index");
  Route::post("/admin/practicearea", "PracticeAreaController@add");
  Route::get("/admin/practicearea/delete/{id}", "PracticeAreaController@delete");
  Route::get("/admin/practicearea/restore/{id}", "PracticeAreaController@restore");
  Route::get("/admin/practicearea/remove/{id}", "PracticeAreaController@remove");
  Route::get("/admin/practicearea/edit/{id}", "PracticeAreaController@edit");
  Route::post("/admin/practicearea/edit", "PracticeAreaController@update");
  Route::get('/admin/lawyers', "LawyerController@index");
  Route::get('/admin/lawyers/add', "LawyerController@add");
  Route::post('/admin/lawyers/add', "LawyerController@insert");
  Route::get('/admin/lawyers/delete/{id}', "LawyerController@delete");
  Route::get('/admin/lawyers/trush', "LawyerController@trush");
  Route::get('/admin/lawyers/remove/{id}', "LawyerController@remove");
  Route::get('/admin/lawyers/restore/{id}', "LawyerController@restore");
  Route::get('/admin/lawyers/view/{id}', "LawyerController@view");
  Route::get('/admin/lawyers/edit/{id}', "LawyerController@edit");
  Route::post('/admin/lawyers/edit/{id}', "LawyerController@update");
  Route::get('/admin/lawyers/property/{id}', "LawyerPropertyController@index");
  Route::post('/admin/lawyers/property/{id}', "LawyerPropertyController@update");
  Route::post('/admin/lawyers/property/{id}', "LawyerPropertyController@update");
  
  Route::get('/admin/all/blogs', 'LegalBlogController@allPost');
  Route::get('/admin/all/trush/blogs', 'LegalBlogController@allTrush');

});


Route::group(['middleware' => 'authorRoute'], function(){
  Route::prefix('/admin/services')->namespace('Backend')->group(function(){
    Route::get('/', 'LegalServiceController@index');
    Route::get('/new', 'LegalServiceController@addNew');
    Route::post('/new', 'LegalServiceController@store');
    Route::get('/{id}/edit', 'LegalServiceController@edit');
    Route::put('/{id}', 'LegalServiceController@update');
    Route::delete('/{id}', 'LegalServiceController@destroy');
    Route::get('/trash', 'LegalServiceController@trash');
    Route::delete('/trash/{id}', 'LegalServiceController@delete');
    Route::get('/trash/{id}/restore', 'LegalServiceController@restore');
  });

  Route::prefix('/admin/categories/services')->namespace('Backend')->group(function(){
    Route::get('/', 'ServiceCategoriesController@index');
    Route::post('/', 'ServiceCategoriesController@store');
    Route::get('/{id}/edit', 'ServiceCategoriesController@edit');
    Route::put('/{id}/edit', 'ServiceCategoriesController@update');
    Route::delete('/{id}', 'ServiceCategoriesController@remove');
    Route::get('/trash', 'ServiceCategoriesController@trash');
    Route::delete('/trash/{id}', 'ServiceCategoriesController@destory');
    Route::get('/trash/{id}/restore', 'ServiceCategoriesController@restore');
  });

  Route::get('/admin/blogs', 'LegalBlogController@index');
  Route::get('/admin/add/blogs', 'LegalBlogController@add');
  Route::get('/admin/blogs/categories', 'LegalBlogController@categories');
  Route::post('/admin/blogs/categories', 'LegalBlogController@addCategories');
  Route::get('/admin/blogs/categories/remove/{id}', 'LegalBlogController@removeCategory');
  Route::get('/admin/blogs/categories/trush', 'LegalBlogController@categoryTrush');
  Route::get('/admin/blogs/categories/restore/{id}', 'LegalBlogController@categoryRestore');
  Route::get('/admin/blogs/categories/delete/{id}', 'LegalBlogController@categoryDelete');
  Route::get('/admin/blogs/categories/edit/{id}', 'LegalBlogController@categoryEdit');
  Route::post('/admin/blogs/categories/edit/{id}', 'LegalBlogController@categoryUpdate');
  Route::get('/admin/blogs/remove/{id}', 'LegalBlogController@postRemove');
  Route::get('/admin/blogs/edit/{id}', 'LegalBlogController@postEdit');
  Route::post('/admin/blogs/edit/{id}', 'LegalBlogController@postUpdate');
  Route::post('/admin/add/blogs', 'LegalBlogController@addPost');
  Route::get('/admin/trush/blogs', 'LegalBlogController@trush');
  Route::get('/admin/blogs/trush/delete/{id}', 'LegalBlogController@trushDelete');
  Route::get('/admin/blogs/trush/restore/{id}', 'LegalBlogController@trushRestore');
});

Route::group(['middleware' => 'moderatorRoute'], function(){
  Route::get('/admin/ratings', 'ModerationController@ratings');
  Route::get('/admin/ratings/remove/{id}', 'ModerationController@remove');
  Route::get('/admin/ratings/view/{id}', 'ModerationController@view');
  Route::get('/admin/ratings/trush', 'ModerationController@trush');
  Route::get('/admin/ratings/delete/{id}', 'ModerationController@delete');
  Route::get('/admin/ratings/restore/{id}', 'ModerationController@restore');
  Route::get('/admin/ratings/approve/{id}', 'ModerationController@approve');
  Route::get('/admin/ratings/disapprove/{id}', 'ModerationController@disapprove');

  Route::get('/admin/moderations/questions', 'QuestionsModerationController@index');
  Route::get('/admin/moderations/questions/disapprove/{id}', 'QuestionsModerationController@disapprove');
  Route::get('/admin/moderations/questions/approve/{id}', 'QuestionsModerationController@approve');
  Route::get('/admin/moderations/questions/remove/{id}', 'QuestionsModerationController@remove');
  Route::get('/admin/moderations/questions/restore/{id}', 'QuestionsModerationController@restore');
  Route::get('/admin/moderations/questions/delete/{id}', 'QuestionsModerationController@delete');
  Route::get('/admin/moderations/questions/trush', 'QuestionsModerationController@trush');
  Route::get('/admin/moderations/questions/view/{id}', 'QuestionsModerationController@view');
  
  Route::get('/admin/moderations/answers', 'AnswerModerationController@index');
  Route::get('/admin/moderations/answers/remove/{id}', 'AnswerModerationController@remove')->name('admin.answer.remove');
  Route::get('/admin/moderations/answers/restore/{id}', 'AnswerModerationController@restore')->name('admin.answer.restore');
  Route::get('/admin/moderations/answers/trush/', 'AnswerModerationController@trush');
  
  Route::get('/admin/moderations/comments', 'CommentController@index');
  Route::get('/admin/moderations/comments/approve/{id}', 'CommentController@approve');
  Route::get('/admin/moderations/comments/remove/{id}', 'CommentController@remove');
  
  Route::get('/admin/moderations/comments/trush', 'CommentController@trush');
  
  Route::get('/admin/moderations/comments/restore/{id}', 'CommentController@restore');
  
  Route::get('/admin/moderations/comments/delete/{id}', 'CommentController@delete');
  
  Route::get('/admin/moderations/comments/all', 'CommentController@all');
  
  Route::get('/admin/moderations/comments/post/{id}', 'CommentController@postComments');

  Route::post('/notification/read', 'NotificationReadController@read')->name('notification.read');
});

Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function(){
  Route::get("/admin/dashboard", "AdminController@index");
  Route::get("/dashboard", "AdminController@index");
  Route::get("/admin", "AdminController@index");
  Route::get('/me', "UserDashboardController@index");
  Route::post('/lawyers/{slug}', "LawyerViewController@postFeedback");
  Route::post('blog/comment/{id}', "BlogCommentController@addComment");
  Route::post('/new/advices', 'AdviceAddController@addNew');
  Route::get('/new/advices', 'AdviceAddController@index');
  Route::post('/advice/{id}', 'AdviceAddController@addAdvice');
});


Route::get('/lawyers', "LawyerViewController@index");
Route::get('/lawyers/{slug}', "LawyerViewController@view");
Route::get('/lawyers/practice-areas/{slug}', "LawyerViewController@practiceAreas");
Route::get('/lawyers/specializations/{slug}', "LawyerViewController@specializations");
Route::get('/lawyers/courts/{slug}', "LawyerViewController@courts");

Route::get('/blogs', "BlogViewController@index");
Route::get('/blogs/{slug}', "BlogViewController@singleView");
Route::get("/blogs/category/{slug}", "BlogViewController@categoryView");

Route::get('/advices', 'AdviceViewController@index');

Route::get('/advice/{slug}', 'AdviceViewController@single')->name('advice.single');
Route::post('/advice/mark/{slug}', 'AdviceAddController@markAnswer');

Route::prefix('/advice/category')->group(function(){
  Route::get('/{slug}', 'AdviceCategoryController@index');
});

Route::prefix('/services')->namespace('Frontend')->group(function(){
  Route::get('/', 'ServiceController@index');
  Route::get('/{slug}', 'ServiceController@single');
});