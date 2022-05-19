@extends('layouts.main')
@section('content')
    <div class="h-screen w-screen flex justify-center items-center bg-no-repeat bg-cover bg-center"
        style="background-image: url('{{ asset('img/bg.jpg') }}')">
        <div class="w-full p-3 md:h-2/3 h-4/5 md:container lg:w-4/5 xl:w-3/5">
            <div class="w-full h-full flex flex-col">
                <div class="w-full">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="w-40 mx-auto">
                </div>
                <h2 class="text-center text-[#02669A] text-2xl font-semibold">IELP COURSE</h2>
                <div class="w-full h-full mt-4 overflow-auto ">
                    <form action="" class="bg-[#02669A] p-3 rounded flex flex-wrap">
                        <div class="w-full md:w-1/2 md:pr-2">
                            <label for="email" class="block text-white">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full rounded py-1 px-2 mb-2">
                        </div>
                        <div class="w-full md:w-1/2 md:pl-2">
                            <label for="password" class="block text-white">Password</label>
                            <input type="password" id="password" name="password" class="w-full rounded py-1 px-2 mb-2">
                        </div>
                        <div class="w-full">
                            <label for="nama" class="block text-white">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="w-full rounded py-1 px-2 mb-2">
                        </div>
                        <div class="w-full">
                            <label for="alamat" class="block text-white">Address</label>
                            <input type="text" id="alamat" name="alamat" class="w-full rounded py-1 px-2 mb-2">
                        </div>
                        <div class="w-full md:w-1/2 md:pr-2">
                            <label for="profesi" class="block text-white">Profesi</label>
                            <select name="profesi" id="profesi" class="w-full rounded py-1 px-2 mb-2">
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Pelajar">Pelajar</option>
                                <option value="pekerja">pekerja</option>
                            </select>
                        </div>
                        <div class="w-full md:w-1/2 md:pl-2">
                            <label for="telp" class="block text-white">No. Telp</label>
                            <input type="text" id="telp" name="telp" class="w-full rounded py-1 px-2 mb-2">
                        </div>
                        <div class="w-full flex justify-center">
                            <button type="submit" name="submit"
                                class="py-2 px-3 bg-blue-900 text-white rounded my-3">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
