@extends('layouts.main')
@section('content')
    <nav class="w-full md:bg-[#02669A] fixed">
        <div class="md:container w-full md:flex md:items-center py-4 px-4 md:px-0 md:justify-between bg-[#02669A]">
            <div class="flex justify-between items-center lg:w-1/3 md:1/5">
                <a href="#" class="flex items-center gap-1">
                    <img src="{{ asset('img/logo.png') }}" class="w-12" alt="">
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
            <div id="nav"
                class="lg:w-2/3 md:w-4/5 md:flex md:justify-between items-center z-[-2] md:z-auto md:static absolute bg-[#02669A] w-full left-0 md:pl-0 pl-4 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
                <ul class="md:flex md:flex-row md:gap-10 ml-3 md:ml-0 text-white">
                    <li class="my-4 hover:text-slate-300 transition ease-in">
                        <a href="./">About</a>
                    </li>
                    <li class="my-4 hover:text-slate-300 transition ease-in">
                        <a href="/training">Training</a>
                    </li>
                    <li class="my-4 hover:text-slate-300 transition ease-in">
                        <a href="/pricing">Pricing</a>
                    </li>
                    <li class="my-4 hover:text-slate-300 transition ease-in">
                        <a href="/contact">Contact</a>
                    </li>
                    <li class="my-4 hover:text-slate-300 transition ease-in">
                        <a href="">Admin Page</a>
                    </li>
                </ul>
                <button class="py-1 px-3 bg-slate-200 my-2 ml-3 md:ml-0 rounded hover:bg-slate-300 transition ease-in"
                    type="button"><a href="/login">Login/Register</a></button>
                {{-- <div class="">
                    <div class="flex items-center cursor-pointer my-4 relative" id="profile">
                        <img src="{{ asset('img/icons/user.png') }}" alt="" class="w-8">
                        <p class="ml-2 text-white">Abdul Kodir&nbsp; <i class="fas fa-angle-down"></i></p>
                    </div>
                    <div class="text-white absolute top-full pb-3 px-14 md:pl-10 w-full md:w-max left-0 md:left-auto bg-[#02669A]  hidden"
                        id="dropdown">
                        <a href="/class" class="block hover:text-slate-400 my-2">Class</a>
                        <a href="" class="block hover:text-slate-400 my-2">Logout</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </nav>
    @yield('client')
@endsection
