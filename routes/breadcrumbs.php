<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('ГЛАВНАЯ', url('/'));
});

// Home > Tours
Breadcrumbs::register('tours', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('ТУРЫ', url('/tury'));
});

// Home > Tours > Tour
Breadcrumbs::register('tour', function($breadcrumbs, $page) {
    $breadcrumbs->parent('tours');
    $breadcrumbs->push($page->title, url('/tury' . strtoupper($page->slug)));
});

// Home > Excursions
Breadcrumbs::register('excursions', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('ЭКСКУРСИИ', url('/ekskursii'));
});

// Home > Excursions > Excursion
Breadcrumbs::register('excursion', function($breadcrumbs, $page) {
    $breadcrumbs->parent('excursions');
    $breadcrumbs->push($page->title, url('/excursion' . strtoupper($page->slug)));
});