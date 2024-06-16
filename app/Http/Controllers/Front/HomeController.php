<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home.index', [
            // hanya mengambil data categeory terbaru(descending) dan ngambil 1 saja
            'latest_post' => Article::with(['User', 'Category'])->whereStatus(1)->latest()->first(), // ini buat yg gambar besar
            // ambil semua data article mulai dri yg terbar
            'article' => Article::with(['User', 'Category'])->where('status', 1)->latest()->simplePaginate(4),
            // 'categories'  => Category::latest()->get(),
            // 'categories' => Category::withCount([
            //     'Articles' => function (Builder $query) {
            //         $query->where('status', 1);
            //     }
            // ])->take(6)->latest()->get(),
            // 'category_navbar' => Category::latest()->take(3)->get(), // udh kita bikin di service
        ]);
    }

    public function about()
    {
        return view('front.home.about', [
            // 'categories' => Category::latest()->get(),
            // 'category_navbar' => Category::latest()->take(3)->get(), // udh kita bikin di service
        ]);
    }
}
