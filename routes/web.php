<?php
Route::get('/sitemap.xml', 'SitemapController@getSitemap' );

Auth::routes();

Crud::routes();

Pages::routes();