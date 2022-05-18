@extends('layouts.client.main')
@section('client')
    <div class="container md:pt-36 pt-24 pb-6">
        <div class="flex flex-wrap">
            <h2 class="w-full text-center text-3xl font-semibold">Class</h2>
            <h2 class="w-full text-center text-2xl font-semibold">Welcome to Your Class</h2>
            <div class="w-full my-4">
                <div class="md:w-2/3 w-full rounded mx-auto py-56 border-2"></div>
            </div>
            <div class=" my-4 w-full">
                <div class="md:w-2/3 shadow-lg p-3 rounded border w-full mx-auto">
                    <p class="text-lg font-semibold text-center my-2">Informasi Kelas</p>
                    <p class="text-lg font-semibold">Listening</p>
                    <p class="text-slate-500 font-semibold">Pertemuan ke-6</p>
                    <p>12.00 WIB</p>
                    <p>Sabtu, 12 September 2022</p>
                    <div class="w-full flex justify-center my-4">
                        <a href="" class="p-2 bg-sky-800 rounded text-white">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
