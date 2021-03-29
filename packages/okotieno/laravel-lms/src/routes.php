<?php


use Okotieno\LMS\Controllers\Api\LibraryBookController;
use Okotieno\LMS\Controllers\LibraryBookAuthorController;
use Okotieno\LMS\Controllers\LibraryBookIssueController;
use Okotieno\LMS\Controllers\LibraryBookItemController;
use Okotieno\LMS\Controllers\LibraryBookPublisherController;
use Okotieno\LMS\Controllers\LibraryBookReturnController;
use Okotieno\LMS\Controllers\LibraryBookTagController;
use Okotieno\LMS\Controllers\LibraryBookTagController as ApiLibraryBookTagController;
use Okotieno\LMS\Controllers\LibraryClassificationClassController;
use Okotieno\LMS\Controllers\LibraryClassificationController;
use Okotieno\LMS\Controllers\Api\LibraryBookController as ApiLibraryBookController;
use Okotieno\LMS\Controllers\Api\LibraryBookAuthorController as ApiLibraryBookAuthorController;
use Okotieno\LMS\Controllers\Api\LibraryBookPublisherController as ApiLibraryBookPublisherController;

Route::resource('/library-classification', LibraryClassificationController::class);
//Route::resource('/library-books',LibraryBookController::class);

Route::middleware(['auth:api', 'bindings'])->group(function () {

  Route::resource('/api/library-books/classifications', LibraryClassificationController::class);
  Route::resource('/api/library-books/classifications/{libraryClassification}/classes', LibraryClassificationClassController::class);

  Route::resource('/api/library-book-tag', LibraryBookTagController::class);
  Route::resource('/api/library-book-author', LibraryBookAuthorController::class);
  Route::resource('/api/library-book-publisher', LibraryBookPublisherController::class);

  Route::get('/api/library-books/filter', [LibraryBookController::class, 'filter']);
  Route::get('api/library-books/tags/all', [ApiLibraryBookTagController::class, 'all']);
  Route::get('api/library-books/tags/filter', [ApiLibraryBookTagController::class . 'filter']);
  Route::get('/api/library-books/all', [ApiLibraryBookController::class, 'getAll']);
  Route::get('/api/library-books/issued/all', [ApiLibraryBookController::class, 'getAllIssuedBooks']);
  Route::get('/api/library-books/authors/all', [ApiLibraryBookAuthorController::class, 'all']);
  Route::get('/api/library-books/authors/filter', [ApiLibraryBookAuthorController::class, 'filter']);
  Route::get('/api/library-books/publishers/all', [ApiLibraryBookPublisherController::class, 'all']);
  Route::get('/api/library-books/publishers/filter', [ApiLibraryBookPublisherController::class, 'filter']);
  Route::get('/api/library-books/my-account', [ApiLibraryBookController::class, 'getMyAccount']);
  Route::resource('/api/library-books', LibraryBookController::class);
  Route::get('/api/library-classes', [ApiLibraryBookController::class, 'getClasses']);
  Route::resource('/api/library-book/issue', LibraryBookIssueController::class);
  Route::resource('/api/library-book/return', LibraryBookReturnController::class);
  Route::resource('/api/library-book/{libraryBook}/library-book-items', LibraryBookItemController::class);

});
