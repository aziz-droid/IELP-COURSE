<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class PesertaClassController extends Controller
{
    public function index()
    {
        return view('client.class', ['data' => Classroom::orderBy('id', 'asc')->get()]);
    }
    public function getSingle(Classroom $classroom)
    {
        return view('client.classContent', ['data' => $classroom]);
    }
}
