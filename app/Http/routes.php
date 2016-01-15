<?php

/*
|-------------------------------------------------------------------------------
| Api Routes
|-------------------------------------------------------------------------------
*/

Route::get('/api/pages', 'Api\PagesController@getAll');
// Route::get('/api/emails/sendContactMail', 'Api\EmailsController@sendContactMail');

/*
|-------------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------------
*/

// Route::group(['middleware' => ['web']], function () {
//   //
// });

Route::get('/{path}', 'WebController@showPage')->where('path', '.*');

