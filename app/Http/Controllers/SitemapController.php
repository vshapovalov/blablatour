<?php

namespace App\Http\Controllers;

use App\Excursion;
use App\Post;
use App\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SitemapController extends Controller
{


    function getSitemap(){

        debugbar()->disable();
//        always
//        hourly
//        daily
//        weekly
//        monthly
//        yearly
//        never

        //monthly
        $posts = Post::all();

        //mk
        $tours = Tour::all();

        //online
        $excursions = Excursion::all();

        page_route('root');

        $items = collect();

        $items = $items->merge($posts->map(function($item,$key){
           return [
               'loc' => page_route('post', ['slug' => $item->slug]),
               'lastmod' => $item->updated_at->tz('GMT')->toAtomString(),
               'changefreq' => 'monthly',
               'priority' => 1
           ];
        }));

        $items = $items->merge($tours->map(function($item,$key){
            return [
	            'loc' => page_route('tour', ['slug' => $item->slug]),
                'lastmod' => $item->updated_at->tz('GMT')->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => 1
            ];
        }));

        $items = $items->merge($excursions->map(function($item,$key){
            return [
	            'loc' => page_route('excursion', ['slug' => $item->slug]),
                'lastmod' => $item->updated_at->tz('GMT')->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => 1
            ];
        }));

        return view('sitemap.xml', [ 'items' => $items]);
    }
}
