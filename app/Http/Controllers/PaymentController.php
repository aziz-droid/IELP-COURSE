<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index()
    {
        $data = User::where('verified', 'Belum Verifikasi')->where('role', 'peserta')->get();
        return view('admin.paymentbelum', ['data' => $data]);
    }
    public function verifUpdate(User $user)
    {
        $user->update(['verified' => 'Sudah Verifikasi']);
        return redirect('/admin/verif/belum')->with('success', 'Peserta sudah diverifikasi');
    }
    public function unverifUpdate(User $user)
    {
        $user->update(['verified' => 'Belum Verifikasi']);
        return redirect('/admin/verif/sudah')->with('success', 'Peserta batal diverifikasi');
    }
    public function sudahVerif()
    {
        $data = User::where('verified', 'Sudah Verifikasi')->where('role', 'peserta')->get();
        return view('admin.paymentsudah', ['data' => $data]);
    }
    public function buktiPost(Request $request, User $user)
    {
        $validated = Validator::make($request->all(), [
            'foto' => 'required|mimes:png,jpg|max:2048',
        ]);
        if ($validated->fails()) {
            return redirect('/payment')->withErrors($validated)->withInput()->with('error', 'Terjadi kesalahan memasukkan data');
        }
        $fileName = time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('assets/uploads'), $fileName);
        $user->payment->update(['foto' => $fileName]);
        return redirect('/')
            ->with('success', 'Bukti berhasil dikirim, tunggu informasi selanjutnya');
    }
    public function buktiShow()
    {
        return view('client.payment');
    }
}
