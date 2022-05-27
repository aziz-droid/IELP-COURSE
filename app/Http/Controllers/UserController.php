<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function admin()
    {
        return view('admin.admin', ['data' => User::where('role', 'admin')->get()]);
    }
    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'email' => 'required|unique:users|email:rfc,dns',
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'noHp' => 'required|numeric',
        ]);
        if ($validated->fails()) {
            return redirect('/admin/admin')->withErrors($validated)->withInput()->with("error", "Terjadi kesalahan memasukkan data");
        }
        $req = $request->all();
        $req['password'] = Hash::make($req['password']);
        $req['role'] = 'admin';
        $req['profesi'] = '-';
        $req['address'] = '-';
        try {
            User::create($req);
            return redirect()->intended('/admin/admin')->with("success", "Data berhasil ditambahkan");
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function getById(User $user)
    {
        return response()->json($user);
    }
    public function update(Request $request, User $user)
    {
        $validated = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns',
            'name' => 'required',
            'password' => 'confirmed',
            'noHp' => 'required|numeric',
        ]);
        if ($validated->fails()) {
            return redirect('/admin/admin')->withErrors($validated)->withInput()->with("error", "Terjadi kesalahan memasukkan data");
        }
        $req = $request->all();
        if ($request->has("password")) {
            $req['password'] = Hash::make($req['password']);
        }
        $user->update($req);
        return redirect('/admin/admin')->with('warning', 'Data berhasil diubah');
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect('/admin/admin')->with('warning', 'Data berhasil dihapus');
    }
    public function user()
    {
        return view('admin.users', ['data' => User::where('role', 'peserta')->get()]);
    }
    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect('/admin/users')->with('warning', 'Data berhasil dihapus');
    }
}
