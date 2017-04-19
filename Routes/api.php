<?php

Route::group(['prefix' => 'v1'], function () {
    Route::group(['middleware' => 'permission:news_cat'], function () {
        Route::post('news/category/sort', 'Backend\NewsCategoryController@sortCategory');
        Route::resource('news/category', 'Backend\NewsCategoryController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
    });
    Route::group(['middleware' => 'permission:news'], function () {
        Route::resource('news', 'Backend\NewsController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
    });
});