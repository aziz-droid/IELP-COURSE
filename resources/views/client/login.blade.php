@extends('layouts.main')
@section('content')
    <div class="h-screen w-screen flex justify-center items-center bg-no-repeat bg-cover bg-center"
        style="background-image: url('{{ asset('img/bg.jpg') }}')">
        <div class="w-full p-3 md:h-2/3 h-4/5 md:w-2/5 2xl:w-1/4 lg:w-2/5">
            <div class="w-full h-full flex flex-col">
                <div class="w-full">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="w-40 mx-auto">
                </div>
                <h2 class="text-center text-[#02669A] text-2xl font-semibold">IELP COURSE</h2>
                <div class="w-full h-full mt-4 overflow-auto ">
                    <form action="" class="bg-[#02669A] p-3 rounded">
                        <label for="email" class="block text-white">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full rounded py-1 px-2 mb-2">
                        <label for="password" class="block text-white">Password</label>
                        <input type="password" id="password" name="password" class="w-full rounded py-1 px-2">
                        <div class="w-full flex justify-center">
                            <button type="submit" name="submit"
                                class="py-2 px-3 bg-blue-900 text-white rounded my-3">Login</button>
                        </div>
                        <p class="text-white text-center">Don't have any account? <a href="/register"
                                class="underline">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
