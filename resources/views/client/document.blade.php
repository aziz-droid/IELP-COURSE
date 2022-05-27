@extends('layouts.client.main')
@section('client')
    <div class="container md:pt-36 pt-24 pb-6">
        <div class="flex flex-wrap">
            <div class="w-full md:h-96 hidden md:block bg-center bg-no-repeat bg-cover"
                style="background-image: url('{{ asset('img/airplane.jpg') }}')"></div>
            <img src="{{ asset('img/airplane.jpg') }}" alt="" class="w-full md:hidden">
            <h2 class="w-full text-center text-2xl font-semibold my-4">Document</h2>
            <div class="w-full my-4">
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, fuga cupiditate?
                    Illum accusantium
                    assumenda ab cupiditate reprehenderit veniam magnam eum, reiciendis quam necessitatibus? Vitae.</p>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-4">
                    @foreach ($data as $d)
                        <div class="p-3 shadow-lg rounded border my-4 w-full">
                            <p class="text-lg font-semibold">{{ $d->nama }}</p>
                            <p class="text-slate-500 font-semibold">{{ $d->file }}</p>
                            <div class="w-full flex justify-center my-4">
                                <a href="{{ asset('uploads/pdf/' . $d->file) }}" target="_blank" rel="noopener noreferrer"
                                    class="p-2 bg-sky-800 rounded text-white">Download</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
