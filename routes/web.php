<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

// Auth::routes();
// ---------------------------Authentication Routes--------------------------------
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/admin', 'LoginAdminController@index')->name('admin')->middleware('admin');
Route::get('/editorial', 'LoginEditorialController@index')->name('editorial')->middleware('editorial');
Route::get('/reviewer', 'LoginReviewerController@index')->name('reviewer')->middleware('reviewer');
Route::get('/author', 'LoginAuthorController@index')->name('author')->middleware('author');

Route::get('/home', 'HomeController@index')->name('home');

//------------------------Front--------------------------------
Route::get('/archive/data', 'FrontController@archive')->name('archive.front');
Route::get('/currentissue/data', 'FrontController@currentissue')->name('currentissue.front');
Route::get('/contact/data', 'FrontController@contact')->name('contact.front');
Route::get('/authorguidelines/front', 'FrontController@authorguidelines')->name('authorguidelines.front');
Route::get('/editorialboard/data', 'FrontController@editorialboard')->name('editorialboard.front');
Route::get('/conferences/data', 'FrontController@conferencess')->name('conferences.front');
Route::get('/reviewprocess/data', 'FrontController@reviewprocess')->name('reviewprocess.front');
Route::get('/welcome/first', 'FrontController@welcome')->name('welcome.front');

Route::resource('/view/contact', 'ContactController');


// Route::resource('/contact/data', 'ContactController');


//------------------------Admin--------------------------------
Route::resource('/admin/affiliation', 'AffiliationController');
Route::resource('/admin/author', 'AuthorController');
Route::resource('/admin/editorial', 'EditorialController');
Route::resource('/admin/reviewer', 'ReviewerController');
Route::resource('/admin/current-issue', 'IssueController');
Route::resource('/admin/archive', 'ArchiveController');
Route::resource('/admin/submission', 'SubmissionController');
Route::resource('/admin/category/position', 'JabatanController');
Route::resource('/admin/category/role', 'RoleController');
Route::resource('/admin/user', 'UserController');

Route::resource('/admin/mobil','MobilController');

Route::get('/admin/download/current-issue/{id}', 'IssueController@getDownload')->name('download-current-issue');
Route::get('/admin/download/archive/{id}', 'ArchiveController@getDownload')->name('download-archive');
Route::get('/admin/download/submission/{id}', 'SubmissionController@getDownload')->name('download-submission');

Route::get('/author/submissions/publish/{id}', 'SubmissionController@publish')->name('submission.publish');
Route::post('/author/submission/publish/', 'SubmissionController@storePublish')->name('submission.storepublish');

Route::get('/admin/author/report/print', 'AuthorController@report')->name('author.report');
Route::get('/admin/affiliation/report/print', 'AffiliationController@report')->name('affiliation.report');
Route::get('/admin/editorial/report/print', 'EditorialController@report')->name('editorial.report');
Route::get('/admin/reviewer/report/print', 'ReviewerController@report')->name('reviewer.report');
Route::get('/admin/archive/report/print', 'ArchiveController@report')->name('archive.report');
Route::get('/admin/issue/report/print', 'IssueController@report')->name('issue.report');
Route::get('/admin/submission/report/print/all', 'SubmissionController@report')->name('submission.report');
Route::get('/admin/review/report/print', 'SubmissionController@reportReview')->name('review.report');
Route::get('/admin/contact/report/print', 'ContactController@report')->name('contact.report');

Route::get('/admin/author/report-perdata/{id}', 'AuthorController@reportPerdata')->name('author.report.perdata');
Route::get('/admin/editorial/report-perdata/{id}', 'EditorialController@reportPerdata')->name('editorial.report.perdata');
Route::get('/admin/reviewer/report-perdata/{id}', 'ReviewerController@reportPerdata')->name('reviewer.report.perdata');
Route::get('/admin/affiliation/report-perdata/{id}', 'AffiliationController@reportPerdata')->name('affiliation.report.perdata');
Route::get('/admin/archive/report-perdata/{id}', 'ArchiveController@reportPerdata')->name('archive.report.perdata');
Route::get('/admin/issue/report-perdata/{id}', 'IssueController@reportPerdata')->name('issue.report.perdata');
Route::get('/admin/submission/report-perdata/{id}', 'SubmissionController@reportPerdata')->name('submission.report.perdata');

Route::get('/archive/data', 'ArchiveController@archive')->name('archive.front');

Route::get('/admin/affiliation/search/data','AffiliationController@cari')->name('search.affiliation');
Route::get('/admin/author/search/data','AuthorController@cari')->name('search.author');
Route::get('/admin/archive/search/data','ArchiveController@cari')->name('search.archive');
Route::get('/admin/editorial/search/data','EditorialController@cari')->name('search.editorial');
Route::get('/admin/issue/search/data','IssueController@cari')->name('search.issue');
Route::get('/admin/reviewer/search/data','ReviewerController@cari')->name('search.reviewer');
Route::get('/admin/submission/search/data','SubmissionnController@cari')->name('search.submission');
Route::get('/admin/user/search/data','UserController@cari')->name('search.user');

Route::get('/admin/archive-cetak-form', 'ArchiveController@cetakForm')->name('cetak-form');
Route::get('/admin/archive/cetak-filter/{tglawal}/{tglakhir}', 'ArchiveController@cetakFilterPertanggal')->name('cetak-filter');

Route::get('/admin/issue/cetak-form', 'IssueController@cetakForm')->name('issue.cetak-form');
Route::get('/admin/issue/cetak-filter/{tglawal}/{tglakhir}', 'IssueController@cetakFilterPertanggal')->name('issue-cetak-filter');

Route::get('/admin/submission-cetak-form', 'SubmissionController@cetakForm')->name('submission.cetak-form');
Route::get('/admin/submission/cetak-filter/{tglawal}/{tglakhir}', 'SubmissionController@cetakFilterPertanggal')->name('submission-cetak-filter');

Route::get('/admin/submission/schedule/view', 'SubmissionController@schedule')->name('schedule');
//------------------------Editorial---------------------------
Route::get('/editorial/author', 'AuthorController@indexEditorial')->name('editorial.author');
Route::get('/editorial/author/show/{id}', 'AuthorController@showEditorial')->name('editorial.author.show');

Route::get('/editorial/affiliation', 'AffiliationController@indexEditorial')->name('editorial.affiliation');
Route::get('/editorial/affiliation/show/{id}', 'AffiliationController@showEditorial')->name('editorial.affiliation.show');

Route::get('/editorial/editorial', 'EditorialController@indexEditorial')->name('editorial.editorial');
Route::get('/editorial/editorial/show/{id}', 'EditorialController@showEditorial')->name('editorial.editorial.show');

Route::get('/editorial/reviewer', 'ReviewerController@indexEditorial')->name('editorial.reviewer');
Route::get('/editorial/reviewer/show/{id}', 'ReviewerController@showEditorial')->name('editorial.reviewer.show');

Route::get('/editorial/archive', 'ArchiveController@indexEditorial')->name('editorial.archive');
Route::get('/editorial/archive/show/{id}', 'ArchiveController@showEditorial')->name('editorial.archive.show');

Route::get('/editorial/current-issue', 'IssueController@indexEditorial')->name('editorial.issue');
Route::get('/editorial/current-issue/show/{id}', 'IssueController@showEditorial')->name('editorial.issue.show');

Route::get('/editorial/submission', 'SubmissionController@indexEditorial')->name('editorial.submission');
Route::get('/editorial/submission/show/{id}', 'SubmissionController@showEditorial')->name('editorial.submission.show');
Route::get('/editorial/submission/edit/{id}', 'SubmissionController@editEditorial')->name('editorial.submission.edit');
Route::patch('/editorial/submission/edit/{id}', 'SubmissionController@updateEditorial')->name('editorial.submission.update');

Route::get('/editorial/download/current-issue/{id}', 'IssueController@getDownloadEditorial')->name('editorial-download-issue');
Route::get('/editorial/download/archive/{id}', 'ArchiveController@getDownloadEditorial')->name('editorial.download-archive');
Route::get('/editorial/download/submission/{id}', 'SubmissionController@getDownloadEditorial')->name('editorial.download-submission');


Route::get('/editorial/author/report/print', 'AuthorController@report')->name('editorial.author.report');
Route::get('/editorial/affiliation/report/print', 'AffiliationController@report')->name('editorial.affiliation.report');
Route::get('/editorial/editorial/report/print', 'EditorialController@report')->name('editorial.editorial.report');
Route::get('/editorial/reviewer/report/print', 'ReviewerController@report')->name('editorial.reviewer.report');
Route::get('/editorial/archive/report/print', 'ArchiveController@report')->name('editorial.archive.report');
Route::get('/editorial/issue/report/print', 'IssueController@report')->name('editorial.issue.report');
Route::get('/editorial/submission/report/print/all', 'SubmissionController@report')->name('editorial.submission.report');
Route::get('/editorial/review/report/print', 'SubmissionController@reportReview')->name('editorial.review.report');

Route::get('/editorial/author/report-perdata/{id}', 'AuthorController@reportPerdata')->name('editorial.author.report.perdata');
Route::get('/editorial/editorial/report-perdata/{id}', 'EditorialController@reportPerdata')->name('editorial.editorial.report.perdata');
Route::get('/editorial/reviewer/report-perdata/{id}', 'ReviewerController@reportPerdata')->name('editorial.reviewer.report.perdata');
Route::get('/editorial/affiliation/report-perdata/{id}', 'AffiliationController@reportPerdata')->name('editorial.affiliation.report.perdata');
Route::get('/editorial/archive/report-perdata/{id}', 'ArchiveController@reportPerdata')->name('editorial.archive.report.perdata');
Route::get('/editorial/issue/report-perdata/{id}', 'IssueController@reportPerdata')->name('editorial.issue.report.perdata');
Route::get('/editorial/submission/report-perdata/{id}', 'SubmissionController@reportPerdata')->name('editorial.submission.report.perdata');

Route::get('/editorial/affiliation/search','AffiliationController@cariEditorial')->name('editorial.search.affiliation');
Route::get('/editorial/author/search','AuthorController@cariEditorial')->name('editorial.search.author');
Route::get('/editorial/archive/search','ArchiveController@cariEditorial')->name('editorial.search.archive');
Route::get('/editorial/editorial/search','EditorialController@cariEditorial')->name('editorial.search.editorial');
Route::get('/editorial/issue/search','IssueController@cariEditorial')->name('editorial.search.issue');
Route::get('/editorial/reviewer/search','ReviewerController@cariEditorial')->name('editorial.search.reviewer');
Route::get('/editorial/submission/search','SubmissionController@cariEditorial')->name('editorial.search.submission');
Route::get('/editorial/user/search','UsernController@cariEditorial')->name('editorial.search.user');

Route::get('/editorial/archive-cetak-form', 'ArchiveController@cetakFormEditorial')->name('editorial.cetak-form');
Route::get('/editorial/archive/cetak-filter/{tglawal}/{tglakhir}', 'ArchiveController@cetakFilterPertanggalEditorial')->name('editorial-cetak-filter');

Route::get('/editorial/issue/cetak-form', 'IssueController@cetakFormEditorial')->name('editorial.issue.cetak-form');
Route::get('/editorial/issue/cetak-filter/{tglawal}/{tglakhir}', 'IssueController@cetakFilterPertanggalEditorial')->name('editorial-issue-cetak-filter');

Route::get('/editorial/submission-cetak-form', 'SubmissionController@cetakFormEditorial')->name('editorial.submission.cetak-form');
Route::get('/editorial/submission/cetak-filter/{tglawal}/{tglakhir}', 'SubmissionController@cetakFilterPertanggalEditorial')->name('editorial-submission-cetak-filter');


//------------------------Reviewer----------------------------
Route::get('/reviewer/submission', 'SubmissionController@indexReviewer')->name('reviewer.submission');
Route::get('/reviewer/submission/show/{id}', 'SubmissionController@showReviewer')->name('reviewer.submission.show');
Route::get('/reviewer/submission/edit/{id}', 'SubmissionController@editReviewer')->name('reviewer.submission.edit');
Route::patch('/reviewer/submission/edit/{id}', 'SubmissionController@updateReviewer')->name('reviewer.submission.update');

Route::get('/reviewer/download/submission/{id}', 'SubmissionController@getDownloadReviewer')->name('reviewer.download-submission');


//------------------------Author------------------------------

Route::middleware(['auth'])->group(function () {
Route::get('/author/submission', 'SubmissionController@indexAuthor')->name('author.submission');
Route::get('/author/submissions/create/', 'SubmissionController@createAuthor')->name('author.submission.create');
Route::post('/author/submission/create/', 'SubmissionController@storeAuthor')->name('author.submission.store');
Route::get('/author/submission/show/{id}', 'SubmissionController@showAuthor')->name('author.submission.show');
Route::get('/author/submission/edit/{id}', 'SubmissionController@editAuthor')->name('author.submission.edit');
Route::patch('/author/submission/edit/{id}', 'SubmissionController@updateAuthor')->name('author.submission.update');
Route::get('/author/profile/{id}', 'AuthorController@editAuthor')->name('author-profile');
   

});

Route::get('/author/download/submission/{id}', 'SubmissionController@getDownloadAuthor')->name('author.download-submission');
Route::get('author/submission/print/loa/{id}', 'SubmissionController@loaPrint')->name('author.download.loa');