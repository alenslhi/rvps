<?php

use Illuminate\Support\Facades\Route;
use App\Models\Profile;
use App\Models\Product;
use App\Models\Article;
use App\Models\Portfolio;
use App\Models\WebSetting; // 1. Pastikan model ini di-import

Route::get('/', function () {
    // Ambil data dari database
    $profile = Profile::first();
    $setting = WebSetting::first(); // 2. Pastikan variabel ini didefinisikan
    
    $products = Product::latest()->take(4)->get();
    $articles = Article::where('is_published', true)->latest()->take(3)->get();
    $portfolios = Portfolio::latest()->take(5)->get(); 
    
    // Hitung total data untuk statistik
    $totalProducts = Product::count();
    $totalArticles = Article::where('is_published', true)->count();
    $totalPortfolios = Portfolio::count();
    
    // 3. Masukkan 'setting' ke dalam compact() di bawah ini
    return view('welcome', compact(
        'profile', 
        'setting', 
        'products', 
        'articles', 
        'portfolios', 
        'totalProducts', 
        'totalArticles', 
        'totalPortfolios'
    )); 
});