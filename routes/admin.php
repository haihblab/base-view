<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin-web'], function () {
    Route::get('/', 'Web\Admin\AdminHomeController@index')->name('admin.index');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'Web\Admin\AdminCategoryController@index')->name('admin.category.index');
        Route::get('create', 'Web\Admin\AdminCategoryController@create')->name('admin.category.create');
    });
});