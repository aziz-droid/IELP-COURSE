<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PriceController extends Controller
{
    public function index()
    {
        return view('admin.prices', [
            'data' => Price::all(),
            'desc' => Description::find(1)
        ]);
    }
    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'pelajaran' => 'required',
            'jamT' => 'required',
            'jamP' => 'required',
        ]);
        if ($validated->fails()) {
            return redirect('/admin/prices')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        Price::create($request->all());
        return redirect('/admin/prices')->with('success', 'Data berhasil dimasukkan');
    }
    public function getById($id)
    {
        return response()->json(Price::find($id));
    }
    public function update(Price $price, Request $request)
    {
        $validated = Validator::make($request->all(), [
            'pelajaran' => 'required',
            'jamT' => 'required',
            'jamP' => 'required',
        ]);
        if ($validated->fails()) {
            return redirect('/admin/prices')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        $price->update($request->all());
        return redirect('/admin/prices')->with('warning', 'Data berhasil diubah');
    }
    public function delete(Price $price)
    {
        $price->delete();
        return redirect('/admin/prices')->with('warning', 'Data berhasil dihapus');
    }
    public function getDesc()
    {
        return response()->json(Description::all());
    }
    public function updateDesc(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'deskripsi' => 'required',
            'dateMulai' => 'required',
            'dateAkhir' => 'required',
        ]);
        if ($validated->fails()) {
            return redirect('/admin/prices')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        Description::find(1)->update($request->all());
        return redirect('/admin/prices')->with('warning', 'Data berhasil diubah');
    }
}
