<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index()
    {
        return view('admin.videos', ['data' => Video::all()]);
    }
    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'judul' => 'required',
            'link' => 'required',
        ]);
        if ($validated->fails()) {
            return redirect('/admin/videos')->witheErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        Video::create($request->all());
        return redirect('/admin/videos')->with('success', 'Data berhasil dimasukkan');
    }
    public function getById($id)
    {
        return response()->json(Video::find($id));
    }
    public function update(Video $video, Request $request)
    {
        $validated = Validator::make($request->all(), [
            'judul' => 'required',
            'link' => 'required',
        ]);
        if ($validated->fails()) {
            return redirect('/admin/videos')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        $video->update($request->all());
        return redirect('/admin/videos')->with('warning', 'Data berhasil diubah');
    }
    public function delete(Video $video)
    {
        $video->delete();
        return redirect('/admin/videos')->with('warning', 'Data berhasil dihapus');
    }
}
