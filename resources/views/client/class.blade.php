@extends('layouts.client.main')
@section('client')
    @php
    $i = count($data);
    @endphp
    <div class="container md:pt-36 pt-24 pb-6">
        <h2 class="w-full text-3xl text-center font-semibold">Class</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-4">
            @foreach ($data as $d)
                @php
                    $date = date_create($d->jadwal);
                @endphp
                <div
                    class="p-3 shadow-lg rounded border-2 border-black my-4 w-full @if (date('Y-m-d') > date_format($date, 'Y-m-d')) bg-slate-400 @endif">
                    <p class="text-lg font-semibold">{{ $d->pertemuan }}</p>
                    <p class="text-slate-500 font-semibold">Pertemuan ke-{{ $i-- }}</p>
                    <p>{{ date_format($date, 'H:i') }} WIB</p>
                    <p>{{ date_format($date, 'l, j F Y') }}</p>
                    <div class="w-full flex justify-center my-4">
                        <a href="/class/content/{{ $d->id }}" class="p-2 bg-sky-800 rounded text-white">Masuk</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
