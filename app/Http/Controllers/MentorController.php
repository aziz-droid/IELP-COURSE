<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MentorController extends Controller
{
    public function index()
    {
        return view('admin.mentor', ['data' => Mentor::all()]);
    }
    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'foto' => 'required|mimes:png,jpg|max:2048',
            'name' => 'required',
            'biodata' => 'required'
        ]);
        if ($validated->fails()) {
            return redirect('/admin/mentor')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        $fileName = time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('assets/uploads/mentor'), $fileName);
        $req = $request->all();
        $req['foto'] = $fileName;
        Mentor::create($req);
        return redirect('/admin/mentor')
            ->with('success', 'Data berhasil ditambah');
    }
    public function getById(Mentor $mentor)
    {
        return response()->json($mentor);
    }
    public function update(Mentor $mentor, Request $request)
    {
        $validated = Validator::make($request->all(), [
            'foto' => 'mimes:png,jpg|max:2048',
            'name' => 'required',
            'biodata' => 'required'
        ]);
        if ($validated->fails()) {
            return redirect('/admin/mentor')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        $req = $request->all();
        if ($request->hasFile('foto')) {
            $imagePath = public_path('assets/uploads/mentor/' . $mentor->foto);
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $fileName = time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('assets/uploads/mentor'), $fileName);
                $req['foto'] = $fileName;
            }
        }

        $mentor->update($req);
        return redirect('/admin/mentor')
            ->with('warning', 'Data berhasil diubah');
    }
    public function delete(Mentor $mentor)
    {
        $imagePath = public_path('assets/uploads/mentor/' . $mentor->foto);
        if (File::exists($imagePath)) {
            unlink($imagePath);
        }
        $mentor->delete();
        return redirect('/admin/mentor')->with('warning', 'Data berhasil dihapus');
    }
}
