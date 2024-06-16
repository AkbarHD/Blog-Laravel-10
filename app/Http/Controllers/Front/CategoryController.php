<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    public function index($slugCategory)
    {
        // dd($slugCategory);

        return view('front.category.index', [
            // sbnya g pake with(category) jg bisa tp lbh baik pake saja agar terhindar dari error ss
            // articles ini hanya menampilkan, cateogry yg pencet dari side widget
            'articles' => Article::with(['User', 'Category'])->whereHas('Category', function ($q) use ($slugCategory) { // tampilkan artcile berdasarkan slug category yg kita click
                $q->where('slug', $slugCategory);
            })->latest()->paginate(9),
            // ini logika gw, kalo pake ini, ketika kita click category educaiton, maka yg tampil semua category... bukan category education, harusnya category education aja
            // 'articles' => Article::with('Category')->latest()->paginate(9),
            'category' => $slugCategory,
            // 'categories' => Category::latest()->get(), // udh kita bikin di service
            // 'category_navbar' => Category::latest()->take(3)->get(), // udh kita bikin di service
        ]);
    }


    public function allCategory()
    {
        // dd($slugCategory);
        $category = Category::withCount([
            'Articles' => function (Builder $query) {
                $query->where('status', 1);
            }
        ])->latest()->get();
        // return view('front.category.all-category', [
        //     'category' => $category,
        // ]);
        return view('front.category.all-category', compact(['category']));
    }
}
