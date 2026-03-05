<?php

use Illuminate\Support\Facades\Route;
use App\Models\Profile;
use App\Models\Product;
use App\Models\Article;
use App\Models\Portfolio;
use App\Models\WebSetting;
use App\Models\Schedule;

Route::get('/', function () {
    $profile = Profile::first();
    $setting = WebSetting::first();
    
    $products = Product::latest()->take(4)->get();
    $articles = Article::where('is_published', true)->latest()->take(3)->get();
    $portfolios = Portfolio::latest()->take(8)->get(); 
    $schedules = Schedule::orderBy('id', 'asc')->get(); 
    
    $totalProducts = Product::count();
    $totalArticles = Article::where('is_published', true)->count();
    $totalPortfolios = Portfolio::count();
    
    return view('welcome', compact(
        'profile', 'setting', 'products', 'articles', 'portfolios', 
        'schedules', 'totalProducts', 'totalArticles', 'totalPortfolios'
    )); 
});

// ROUTE DETAIL PRODUK
Route::get('/store/{id}', function ($id) {
    $product = Product::findOrFail($id);
    $profile = Profile::first();
    $setting = WebSetting::first();
    return view('products.show', compact('product', 'profile', 'setting'));
})->name('product.show'); 

// ROUTE DETAIL ARTIKEL/BLOG (INI YANG BIKIN ERROR TADI!)
Route::get('/blog/{slug}', function ($slug) {
    $article = Article::where('slug', $slug)->firstOrFail();
    $profile = Profile::first();
    $setting = WebSetting::first();
    return view('articles.show', compact('article', 'profile', 'setting'));
})->name('article.show');