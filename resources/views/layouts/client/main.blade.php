@extends('layouts.main')
@section('content')
    <nav class="w-full md:bg-[#02669A] fixed">
        <div class="md:container w-full md:flex md:items-center py-2 px-4 md:px-0 justify-between bg-[#02669A]">
            <div class="flex justify-between items-center">
                <a href="#" class="flex items-center gap-1">
                    <img src="{{ asset('img/logo.png') }}" class="lg:w-[100px] w-16" alt="">
                    <span class="text-amber-400 font-bold lg:text-3xl">IELP COURSE</span>
                </a>

                <div class="flex items-center px-4 md:hidden">
                    <button type="button" id="hamburger">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                </div>
            </div>
            <ul class="md:flex md:flex-row md:gap-10 text-white lg:text-lg hidden">
                <li class="hover:text-slate-300 transition ease-in">
                    <a href="./">About</a>
                </li>
                <li class="hover:text-slate-300 transition ease-in">
                    <a href="/training">Training</a>
                </li>
                <li class="hover:text-slate-300 transition ease-in">
                    <a href="/pricing">Pricing</a>
                </li>
                <li class="hover:text-slate-300 transition ease-in">
                    <a href="/contact">Contact</a>
                </li>
                <li class="hover:text-slate-300 transition ease-in">
                    <a href="/admin/dashboard">Admin Page</a>
                </li>
            </ul>
            <div class="hidden md:block">
                <div class="flex items-center cursor-pointer my-4 relative" id="profile">
                    <img src="{{ asset('img/icons/user.png') }}" alt="" class="w-8">
                    <p class="ml-2 text-white">Abdul Kodir&nbsp; <i class="fas fa-angle-down"></i></p>
                </div>
                <div class="text-white absolute top-full pb-3 px-14 md:pl-10 w-full md:w-max left-0 md:left-auto bg-[#02669A]  hidden"
                    id="dropdown">
                    <a href="/class" class="block hover:text-slate-400 my-2">Class</a>
                    <a href="" class="block hover:text-slate-400 my-2">Logout</a>
                </div>
            </div>
            {{-- <button
                class="py-1 px-3 bg-slate-200 my-2 ml-3 hidden md:block md:ml-0 rounded hover:bg-slate-300 transition ease-in"
                type="button"><a href="/login">Login/Register</a></button> --}}
        </div>
        <div id="nav"
            class="absolute z-[-1] opacity-0 top-[-400px] w-full transition-all ease-in duration-500 left-0 pl-6 py-3 bg-[#02669A]">
            <ul class="flex flex-col gap-10 text-white text-lg md:hidden">
                <li class="hover:text-slate-300 transition ease-in">
                    <a href="./">About</a>
                </li>
                <li class="hover:text-slate-300 transition ease-in">
                    <a href="/training">Training</a>
                </li>
                <li class="hover:text-slate-300 transition ease-in">
                    <a href="/pricing">Pricing</a>
                </li>
                <li class="hover:text-slate-300 transition ease-in">
                    <a href="/contact">Contact</a>
                </li>
                <li class="hover:text-slate-300 transition ease-in">
                    <a href="/admin/dashboard">Admin Page</a>
                </li>
                {{-- <li>
                    <button class="py-1 px-3 bg-slate-200 rounded text-black hover:bg-slate-300 transition ease-in"
                        type="button"><a href="/login">Login/Register</a></button>
                </li> --}}
                <li class="md:hidden">
                    <div class="">
                        <div class="flex items-center cursor-pointer my-4 relative" id="profile">
                            <img src="{{ asset('img/icons/user.png') }}" alt="" class="w-8">
                            <p class="ml-2 text-white">Abdul Kodir&nbsp; <i class="fas fa-angle-down"></i></p>
                        </div>
                        <div class="text-white absolute top-full pb-3 px-14 md:pl-10 w-full md:w-max left-0 md:left-auto bg-[#02669A]  hidden"
                            id="dropdown">
                            <a href="/class" class="block hover:text-slate-400 my-2">Class</a>
                            <a href="" class="block hover:text-slate-400 my-2">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @yield('client')
@endsection
