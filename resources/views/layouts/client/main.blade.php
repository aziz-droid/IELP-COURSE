@extends('layouts.main')
@section('content')
    <nav class="py-4 bg-[#02669A] w-full">
        <div class="container md:flex md:items-center md:justify-between">
            <div class="flex justify-between items-center">
                <a href="#" class="flex items-center gap-1">
                    <img src="assets/img/logo.png" class="w-12" alt="">
                    <span class="text-amber-400 font-bold">IELP COURSE</span>
                </a>

                <div class="flex items-center px-4 md:hidden">
                    <button type="button" id="hamburger">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                </div>
            </div>
            <ul class="md:flex md:flex-row md:gap-10 hidden nav ml-3 md:ml-0 text-white">
                <li class="my-4">
                    <a href="">About</a>
                </li>
                <li class="my-4">
                    <a href="">Training</a>
                </li>
                <li class="my-4">
                    <a href="">Pricing</a>
                </li>
                <li class="my-4">
                    <a href="">Contact</a>
                </li>
            </ul>
            <button class="py-1 px-3 bg-slate-200 my-2 hidden md:block nav ml-3 md:ml-0 rounded"
                type="button">Login/Register</button>
        </div>
    </nav>
    @yield('client')
@endsection
