<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest; // utk mnghubngkan ArticleRequest validasi
use App\Http\Requests\UpdateArticleRequest; // utk menghubungkan UpdateArticleRequest
use App\Models\Article;
use App\Models\Category; //utk mnghubungkan model category utk mendapatkan id dan name
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // utk mnghubungkan dan menghapus storage File Lama
use Illuminate\Support\Str; // utk slug
use Yajra\DataTables\Facades\DataTables;  // otomatis ke import ketika kita panggil DataTables yg fcasdes

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // karna yajra itu ajax maka,
        // jika ada request ajax maka tampilkan data article
        if (request()->ajax()) {
            $article = Article::with('Category')->latest()->get(); //masuk ke datatable serverside

            return DataTables::of($article) // lali keluarkan isi $acrtilce
                // karna pake server side kita harus konfig lagi utk relasi database karna kalau tidak dia 0
                ->addIndexColumn() // utk No di datatable
                ->addColumn('category_id', function ($article) {
                    return $article->Category->name;
                })
                ->addColumn('status', function ($article) {
                    if ($article->status == 0) {
                        return '<span class="badge bg-danger">Private</span>';
                    } else {
                        return '<span class="badge bg-success">Published</span>';
                    }
                })
                ->addColumn('button', function ($article) { // button di dpt dari mana? dia dpt dari columns data jadi harus sama yg ada index
                    // karna di yajra udh di kasih tr td maka kita tinggal isinyanya saja
                    // kalo htmlnya di dlm php(return) itu di akalin dgn tdk menggunakan url{{  }}, tp lansgung saja
                    return '
                        <div class="text-center">
                            <a href="article/' . $article->id . '" class="btn btn-success">Detail</a>
                            <a href="article/' . $article->id . '/edit" class="btn btn-warning">Edit</a>
                            <a href="#" onClick="deleteArticle(this)" data-id="' . $article->id . '" class="btn btn-danger">Delete</a>
                        </div>';
                    // yg detail a href dia otomatis ke show karna dia tdk punya method tp dia punya parameter id
                    // yg edit tambahkan edit agar beda dgn detail
                    // this utk mengambil data-id artinya onclick="deleteArticle(berdsarkan id)"
                    // arahkan ke Controller article/ yg mempunayai paramter id
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }

        return view('back.article.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ini folder dan file
        return view('back.article.create', [
            'categories' => Category::get(), //fungsi ini unutk mengambil di pilih kategori di select create
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    //kita jadi tdk perlu Request
    public function store(ArticleRequest $request) // ArticleRequest utk menghubungkan validasi yg sdh kta buat
    {
        // utk mnggambil smua validasi yg sdh kita atur di ArticleRequest
        $data = $request->validated(); //ini sbenrya tdk ada juga bisa

        $file = $request->file('img'); // name input :utk mngmbil smua identitas
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); // utk mndptkan extension gmbr yg kta masukan
        $file->storeAs('public/backk/' . $fileName); // diletakan di folder Storage/app/publick/back isinya : 234234.jpg
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['desc'] = $request->desc;

        $data['img'] = $fileName; // yg akan masuk ke database
        // knp kita tdk config addColumn di index? kareana userid ini tampilnya di show, dia tdk pakai yajra tables
        $data['user_id'] = auth()->user()->id; // ketika kita tambah artikel otomatis field terisi otomatis dari user yg masuk
        $data['slug'] = Str::slug($data['title']);
        $data['status'] = $request->status;
        $data['publish_date'] = $request->publish_date;

        Article::create($data); // //tambah data

        return redirect(url('article'))->with('success', 'Data Article Behasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) // utk detail
    {
        // ini folder dan file
        return view('back.article.show', [
            // ini namanya eager load agar menghindari kesalahan n + one
            'article' => Article::with(['User', 'Category'])->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // ini folder dan file
        return view('back.article.update', [
            'article' => Article::find($id), // ambil article berdasarkan id
            'categories' => Category::get(), //fungsi ini unutk mengambil di pilih kategori di select create
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        // utk mnggambil smua validasi yg sdh kita atur di ArticleRequest
        $data = $request->validated();

        if ($request->hasFile('img')) { // jika user ganti gambar
            $file = $request->file('img'); // name input :utk mngmbil smua identitas
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); // utk mndptkan extension gmbr yg kta masukan
            $file->storeAs('public/backk/' . $fileName); // diletakan di Storage/publick/back isinya : 234234.jpg

            //Hapus File Lama
            // Storagenya harus di hibungkan yg use Illuminate\Support\Facades\Storage
            Storage::delete('public/back/' . $request->oldImg); // arahkan pathnya yg di storage bkn yg di public

            $data['img'] = $fileName; // yg akan masuk ke database
        } else { //kalo tdk updload gambar baru field imgnya ttp pake yg lama
            $data['img'] = $request->oldImg;
        }


        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['desc'] = $request->desc;
        $data['slug'] = Str::slug($data['title']);
        // // knp kita tdk config addColumn di index? kareana userid ini tampilnya di show, dia tdk pakai yajra tables
        $data['user_id'] = auth()->user()->id; // ketika kita tambah artikel otomatis field terisi otomatis dari user yg masuk
        $data['status'] = $request->status;
        $data['publish_date'] = $request->publish_date;

        Article::find($id)->update($data); // //tambah data

        return redirect('article')->with('success', 'Data Article Behasil Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // cari data article berdasarkan id
        // ini ikutin cara novi
        $data = Article::find($id);
        Storage::delete('public/backk/' . $data->img); // arahkan pathnya yg di storage bkn yg di public
        // File::delete('media/' . $data->desc);
        $data->delete();

        return response()->json([
            'message' => 'Data Article Berhasil Dihapus'
        ]);

        // return redirect(url('article'))->with('success', 'Data Article Behasil Dihapus');
    }

    // utk ckeditor
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalName();
            $fileName = uniqid() . '_' . '.' . $extension;
            $request->file('upload')->move(public_path('media'), $fileName);
            // $request->file('upload')->move(public_path('media'), $fileName);

            // $file = $request->file('upload');
            // $fileName = pathinfo($file, PATHINFO_FILENAME);
            // $fileName = uniqid() . '_' . '.' . $file->getClientOriginalExtension();
            // $request->file('upload')->move(public_path('public/media'), $fileName);
            // $file->storeAs('public/media/' . $fileName);


            // $url = asset('media/' . $fileName);
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
