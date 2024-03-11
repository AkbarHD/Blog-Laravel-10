<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // karna users ini pake modal jadi ajaib bisa ngambil data sesuai dgn id tnpa harus mendefinisikan Auth::find($id)

        if (auth()->user()->role == 1) { // jika user yg login rolenya 1 maka tampilkan semua data
            $users = User::get();
        } else {
            $users = User::whereId(auth()->user()->id)->get(); //agar bisa di foreceh di indexnya maka bkn pke find() tp whereId
        }


        return view('back.user.index', [
            'users' => $users,
        ]);
    }

    public function store(UserRequest $request)
    {
        // dd($request->all());

        $data =  $request->validated();

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return back()->with('success', 'User has been created');
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        // dd($request->all());

        $data =  $request->validated();

        if ($data['password'] != '') { // jika input tdk kosong (artinya dia ada isinya) maka, lakukan update password
            $data['password'] = bcrypt($data['password']);
            User::find($id)->update($data);
        } else { // jika tdk ada
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }


        return back()->with('success', 'User has been updated');
    }

    public function destroy(string $id)
    {
        User::find($id)->delete();

        return back()->with('success', 'User Has Been Deleted');
    }
}
