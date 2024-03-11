<?php
//kita menggunakan providers, agar kta tdk memanggil berulang kali seperti category_navbar, categories
namespace App\Providers;

use App\Models\Config;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // import view
use Illuminate\Database\Eloquent\Builder; // import builder

class SideWidgetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     * tambahkan juga config.app
     */
    public function boot(): void
    {
        // view harus import class
        View::composer('front.layout.side-widget', function ($view) {

            // $category = Category::whereHas('Articles', function (Builder $query) {
            //     $query->where('status', 1);
            // })->withCount(['Articles' => function ($query) {
            //     $query->where('status', 1);
            // }])->latest()->get();]

            $category = Category::withCount(['Articles' => function (Builder $query) {
                $query->where('status', 1);
            }])->take(6)->latest()->get();

            $view->with('categories', $category);
        });

        // popular post di side widget
        View::composer('front.layout.side-widget', function ($view) {
            $post = Article::orderBy('view', 'desc')->whereStatus(1)->take(3)->get();
            $view->with('popular_posts', $post);


            // utk adsense widget  whreIn itu utk ngcek array jd kita hanya perlu where saja
            // $config = Config::where('name', 'ads_widget')->pluck('value', 'name');
            // $view->with('config', $config);
            $configKeys = ['ads_widget'];
            $config = Config::whereIn('name', $configKeys)->pluck('value', 'name');
            $view->with('config', $config);
        });

        // category_navbar
        View::composer('front.layout.navbar', function ($view) {
            $category_navbar = Category::latest()->take(3)->get();

            $view->with('category_navbar', $category_navbar);
        });
    }
}
