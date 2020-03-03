<?php

Route::group(['namespace' => 'Devsheet\Spreadsheet\Http\Controllers', 'middleware' => ['web']], function(){
    Route::get('sheet', 'SheetController@index')->name('sheet');
    Route::post('import', 'SheetController@store')->name('import');
    //Route::post('contact', 'ContactFormController@sendMail')->name('contact');
});


?>