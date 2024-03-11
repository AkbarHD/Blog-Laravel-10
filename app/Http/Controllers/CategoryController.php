<?php

namespace App\Http\Controllers;

use App\Models\Category; // ini otomatis
use Illuminate\Http\Request;
use Illuminate\Support\Str;  // utk bisa menggunakan Str

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.category.index', [
            //            bisa peke orderby / latest jg bisa (dia mngmbil descending) 
            'categories' => Category::latest()->get(), // ketika mengetikan ini otomatis dia use otomastis modelsnya
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|min:3'
        ]);

        // Str Harus di import dl, click kanan aja Str nya lalu import namespace
        // cara ini lbh efektif 
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($data['name']); // data slug ini otomatis dapat dari name

        // dari pada ini
        // $data = [
        //     'slug' => Str::slug($data['name']),
        // ];

        //fungsi create data
        Category::create($data);

        return back()->with('success', 'Data Berhasil Ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data =  $request->validate([
            'name' => 'required|min:3'
        ]);

        // Str Harus di import dl, click kanan aja Str nya lalu import namespace
        // cara ini lbh efektif 
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($data['name']); // data slug ini otomatis dapat dari nane

        // dari pada ini
        // $data = [
        //     'slug' => Str::slug($data['name']),
        // ];

        //fungsi create data
        Category::find($id)->update($data);

        return back()->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // cukup idnya saja yg di hapus
        Category::find($id)->delete();

        return back()->with('delete', 'Data Berhasil Di Delete');
    }
}
