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
    $breadcrumbs->push(mb_strtoupper($page->title), url('/tury' . $page->slug));
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
    $breadcrumbs->push(mb_strtoupper($page->title), url('/excursion' . $page->slug));
});

// Home > Blogs
Breadcrumbs::register('blogs', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('БЛОГ', url('/posts'));
});

// Home > Blogs > blog
Breadcrumbs::register('blog', function($breadcrumbs, $page) {
    $breadcrumbs->parent('blogs');
    $breadcrumbs->push(mb_strtoupper($page->title), url('/posts' . $page->slug));
});