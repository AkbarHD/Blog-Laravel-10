<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        return view('back.config.index', [
            'config' => Config::paginate(7),
        ]);
    }

    public function update(Request $request, string $id)
    {
        // dd($request);
        // dd($request->all()); // ini lbh akurat
        $data = $request->validate([
            'name'  => 'required|min:3',
            'value' => 'required|min:3'
        ]);

        $data['name']  = $request->name;
        $data['value']  = $request->value;

        Config::find($id)->update($data);
        return back()->with('success', 'Data Config has been updated');
    }
}
