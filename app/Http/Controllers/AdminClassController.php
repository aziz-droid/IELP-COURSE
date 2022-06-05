<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
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
        $arrValidated = [
            'pertemuan' => 'required',
            'materi' => 'required',
            'jadwal' => 'required',
            'link' => 'required'
        ];
        if ($request->hasFile("dokumen")) {
            $arrValidated['dokumen'] = 'mimes:pdf|max:2048';
        }
        if (!empty($request->youtube)) {
            $arrValidated['youtube'] = 'url';
        }
        $validated = Validator::make($request->all(), $arrValidated);
        if ($validated->fails()) {
            return redirect('/admin/class')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        $req = $request->all();
        if ($request->hasFile("dokumen")) {
            $fileName = $request->dokumen->getClientOriginalName() . '_' . time() . '.' . $request->dokumen->extension();
            $request->dokumen->move(public_path('assets/uploads/pdf'), $fileName);
            $req['dokumen'] = $fileName;
        }
        Classroom::create($req);
        return redirect('/admin/class')->with('success', 'Data berhasil ditambahkan');
    }
    public function getById($id)
    {
        return response()->json(Classroom::find($id));
    }
    public function update(Classroom $classroom, Request $request)
    {

        $arrValidated = [
            'pertemuan' => 'required',
            'materi' => 'required',
            'jadwal' => 'required',
            'link' => 'required'
        ];
        if ($request->hasFile("dokumen")) {
            $arrValidated['dokumen'] = 'mimes:pdf|max:2048';
        }
        if (!empty($request->youtube)) {
            $arrValidated['youtube'] = 'url';
        }
        $validated = Validator::make($request->all(), $arrValidated);
        if ($validated->fails()) {
            return redirect('/admin/class')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        $req = $request->all();
        if ($request->hasFile("dokumen")) {
            $filePath = public_path('assets/uploads/pdf/' . $classroom->dokumen);
            if (File::exists($filePath)) {
                unlink($filePath);
                $fileName = $request->dokumen->getClientOriginalName() . '_' . time() . '.' . $request->dokumen->extension();
                $request->dokumen->move(public_path('assets/uploads/pdf'), $fileName);
                $req['dokumen'] = $fileName;
            }
        }
        $classroom->update($req);
        return redirect('/admin/class')->with('warning', 'Data berhasil diubah');
    }
    public function delete(Classroom $classroom)
    {
        try {
            //code...
            $filePath = public_path('assets/uploads/pdf/' . $classroom->dokumen);
            if (File::exists($filePath)) {
                unlink($filePath);
            }
            $classroom->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/admin/class')->with('error', 'Terjadi kesalahan menghapus data');
        }
        return redirect('/admin/class')->with('warning', 'Data berhasil dihapus');
    }
}
