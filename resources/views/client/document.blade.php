@extends('layouts.client.main')
@section('client')
    <div class="container md:pt-36 pt-24 pb-6">
        <div class="flex flex-wrap">
            <img src="{{ asset('img/airplane.jpg') }}" alt="" class="w-full">
            <h2 class="w-full text-center text-2xl font-semibold my-4">Document</h2>
            <div class="w-full my-4">
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, fuga cupiditate?
                    Illum accusantium
                    assumenda ab cupiditate reprehenderit veniam magnam eum, reiciendis quam necessitatibus? Vitae.</p>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-4">
                    <div class="p-3 shadow-lg rounded border my-4 w-full">
                        <p class="text-lg font-semibold">Document 1</p>
                        <p class="text-slate-500 font-semibold">Pertemuan ke-6</p>
                        <p>12.00 WIB</p>
                        <p>Sabtu, 12 September 2022</p>
                        <div class="w-full flex justify-center my-4">
                            <a href="" class="p-2 bg-sky-800 rounded text-white">Download</a>
                        </div>
                    </div>
                    <div class="p-3 shadow-lg rounded border my-4 w-full">
                        <p class="text-lg font-semibold">Document 1</p>
                        <p class="text-slate-500 font-semibold">Pertemuan ke-6</p>
                        <p>12.00 WIB</p>
                        <p>Sabtu, 12 September 2022</p>
                        <div class="w-full flex justify-center my-4">
                            <a href="" class="p-2 bg-sky-800 rounded text-white">Download</a>
                        </div>
                    </div>
                    <div class="p-3 shadow-lg rounded border my-4 w-full">
                        <p class="text-lg font-semibold">Document 1</p>
                        <p class="text-slate-500 font-semibold">Pertemuan ke-6</p>
                        <p>12.00 WIB</p>
                        <p>Sabtu, 12 September 2022</p>
                        <div class="w-full flex justify-center my-4">
                            <a href="" class="p-2 bg-sky-800 rounded text-white">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
