<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        return view('admin.mentor', ['data' => Mentor::all()]);
    }
}
