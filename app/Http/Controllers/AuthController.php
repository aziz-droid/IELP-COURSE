<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('client.register');
    }
    public function registerPost(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|email:rfc,dns',
            'name' => 'required',
            'password' => 'required|min:8',
            'address' => 'required',
            'noHp' => 'required|numeric',
            'profesi' => 'required',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'peserta';
        try {
            $createdUser = User::create($validated);
            Payment::create([
                'user_id' => $createdUser['id'],
                'expired' => Carbon::today()->addDays(7)->toDateString()
            ]);
            Auth::login($createdUser);
            return redirect()->intended('/payment');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function loginForm()
    {
        return view('client.login');
    }
    public function loginPost(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email:dns",
            "password" => "required",
        ]);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            if (
                Auth::user()->role == "admin"
            ) {
                return redirect()->intended("/admin/dashboard");
            }
            return redirect()->intended("/payment");
        }
        return back()->with("error", "Login gagal!");
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }
}
