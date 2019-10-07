<?php


Route::resource('/library-classification', 'Okotieno\\LMS\\Controllers\\LibraryClassificationController');
Route::resource('/library-books', 'Okotieno\\LMS\\Controllers\\LibraryBookController');

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::resource('/api/library-book-tag', 'Okotieno\\LMS\\Controllers\\LibraryBookTagController');
    Route::resource('/api/library-book-author', 'Okotieno\\LMS\\Controllers\\LibraryBookAuthorController');
    Route::resource('/api/library-book-publisher', 'Okotieno\\LMS\\Controllers\\LibraryBookPublisherController');

    Route::get('/api/library-books/filter', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookController@filter');
    Route::get('api/library-books/tags/all', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookTagController@all');
    Route::get('api/library-books/tags/filter', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookTagController@filter');
    Route::get('/api/library-books/all', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookController@getAll');
    Route::get('/api/library-books/issued/all', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookController@getAllIssuedBooks');
    Route::get('/api/library-books/authors/all', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookAuthorController@all');
    Route::get('/api/library-books/authors/filter', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookAuthorController@filter');
    Route::get('/api/library-books/publishers/all', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookPublisherController@all');
    Route::get('/api/library-books/publishers/filter', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookPublisherController@filter');
    Route::get('/api/library-books/my-account', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookController@getMyAccount');
    Route::resource('/api/library-books', 'Okotieno\\LMS\\Controllers\\LibraryBookController');
    Route::get('/api/library-classes', 'Okotieno\\LMS\\Controllers\\Api\\LibraryBookController@getClasses');
    Route::resource('/api/library-book/issue', 'Okotieno\\LMS\\Controllers\\LibraryBookIssueController');
    Route::resource('/api/library-book/return', 'Okotieno\\LMS\\Controllers\\LibraryBookReturnController');
    Route::resource('/api/library-book/{libraryBook}/library-book-items', 'Okotieno\\LMS\\Controllers\\LibraryBookItemController');

});
