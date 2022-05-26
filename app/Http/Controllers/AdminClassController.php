<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminClassController extends Controller
{
    public function index()
    {
        $data = Classroom::all();
        return view('admin.class', ['data' => $data]);
    }
    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'pertemuan' => 'required',
            'materi' => 'required',
            'jadwal' => 'required',
            'link' => 'required'
        ]);
        if ($validated->fails()) {
            return redirect('/admin/class')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }

        Classroom::create($request->all());
        return redirect('/admin/class')->with('success', 'Data berhasil ditambahkan');
    }
    public function getById($id)
    {
        return response()->json(Classroom::find($id));
    }
    public function update(Classroom $classroom, Request $request)
    {
        $validated = Validator::make($request->all(), [
            'pertemuan' => 'required',
            'materi' => 'required',
            'jadwal' => 'required',
            'link' => 'required'
        ]);
        if ($validated->fails()) {
            return redirect('/admin/class')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        $classroom->update($request->all());
        return redirect('/admin/class')->with('warning', 'Data berhasil diubah');
    }
    public function delete(Classroom $classroom)
    {
        $classroom->delete();
        return redirect('/admin/class')->with('warning', 'Data berhasil dihapus');
    }
}
