<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // search
        $keyword = request()->keyword;

        if ($keyword) {
            $articles = Article::with('Category')
                ->whereStatus(1)
                ->where('title', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(9);
        } else {
            $articles = Article::with(['User', 'Category'])->where('status', 1)->latest()->paginate(9);
        }
        return view('front.article.index', [
            'articles' => $articles,
            'keyword' => $keyword,
            // 'categories' => Category::latest()->get(), // udh kita bikin di service
            // 'category_navbar' => Category::latest()->take(3)->get(), // udh kita bikin di service
        ]);
    }
    public function show($slug)
    {
        $article =  Article::with(['User', 'Category'])->whereSlug($slug)->firstOrFail(); //firstOrFils berguna utk ketika di url tdk sesuai itu deafultnya muncul debug, harusnya muncur notfoound
        $article->increment('view'); // utk view bertambah
        return view('front.article.show', [
            // ambil data berdsarakan slug yg masuk dn ambil 1 baris saja
            'article' => $article,
            // 'categories' => Category::latest()->get(), // udh kita bikin di service
            // 'category_navbar' => Category::latest()->take(3)->get(), // udh kita bikin di service
        ]);
    }
}
