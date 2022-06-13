<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DokumenController extends Controller
{
    public function index()
    {
        return view('admin.dokumen', ['data' => Document::all()]);
    }
    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama' => 'required',
            'file' => 'required|mimes:pdf|max:4096'
        ]);
        if ($validated->fails()) {
            return redirect('/admin/dokumen')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $request->file->move(public_path('assets/uploads/pdf'), $fileName);
        $req = $request->all();
        $req['file'] = $fileName;
        Document::create($req);
        return redirect('/admin/dokumen')->with('success', 'Data berhasil ditamambahkan');
    }
    public function getById(Document $document)
    {
        return response()->json($document);
    }
    public function update(Request $request, Document $document)
    {
        $opt = [];
        if ($request->hasFile('file')) {
            $opt['file'] = 'max:4096|mimes:pdf';
        }
        $opt['nama'] = 'required';
        $validated = Validator::make($request->all(), $opt);
        if ($validated->fails()) {
            return redirect('/admin/dokumen')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        $req = $request->all();
        if ($request->hasFile('file')) {
            $filePath = public_path('assets/uploads/pdf/' . $document->file);
            if (File::exists($filePath)) {
                unlink($filePath);
                $fileName = time() . '_' . $request->file->getClientOriginalName();
                $request->file->move(public_path('assets/uploads/pdf'), $fileName);
                $req['file'] = $fileName;
            }
        }
        $document->update($req);
        return redirect('/admin/dokumen')->with('warning', 'Data berhasil diubah');
    }
    public function delete(Document $document)
    {
        $filePath = public_path('assets/uploads/pdf/' . $document->file);
        if (File::exists($filePath)) {
            unlink($filePath);
        }
        $document->delete();
        return redirect('/admin/dokumen')->with('warning', 'Data berhasil dihapus');
    }
    public function pesertaIndex()
    {
        return view('client.document', ['data' => Document::all()]);
    }
}
