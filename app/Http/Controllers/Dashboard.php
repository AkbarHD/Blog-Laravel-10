<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return view('back.dashboard.index', [
            'total_articles' => Article::count(),
            'total_categories' => Category::count(),
            // Category dpt dari model
            // cari article relasikan Category, berdasarkan status yg 1 (publis), ambil yg terbaru, tampilkan hanya 5 article, ambil
            'latest_article' => Article::with('Category')->whereStatus(1)->latest()->take(5)->get(),
            // cari article relasikan Category, berdasarkan status yg 1 (publis), ambil view terbanyak menjadi no 1, tampilkan hanya 5 article, ambil
            'popular_article' => Article::with('Category')->whereStatus(1)->orderBy('view', 'desc')->take(5)->get(),
        ]);
    }
}
