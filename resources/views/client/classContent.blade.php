@extends('layouts.client.main')
@section('client')
  @php
  $date = date_create($data->jadwal);
  @endphp
  <div class="container md:pt-36 pt-24 pb-6">
    <div class="flex flex-wrap">
      <h2 class="w-full text-center text-3xl font-semibold">Class</h2>
      <h2 class="w-full text-center text-2xl font-semibold">Welcome to Your Class</h2>
      <div class=" my-4 w-full">
        <div class="md:w-2/3 shadow-lg p-3 rounded border w-full mx-auto">
          <p class="text-lg font-semibold text-center my-2">Informasi Kelas</p>
          <p class="text-lg font-semibold">{{ $data->pertemuan }}</p>
          <p class="text-slate-500 font-semibold">Materi</p>
          <p class="">{{ $data->materi }}</p>
          @if ($data->youtube)
            <p class="text-slate-500 font-semibold my-4">Video Youtube</p>
            <div class="w-max mx-auto">
              {!! OEmbed::get($data->youtube)->html(['width' => 400]) !!}
            </div>
          @endif
          @if ($data->dokumen)
            <p class="text-slate-500 font-semibold my-4">Dokumen</p>
            <a href="{{ asset('uploads/pdf/' . $data->dokumen) }}" class="text-blue-600">{{ $data->dokumen }}</a>
          @endif
          <p class="text-slate-500 font-semibold my-4">Jadwal Kelas</p>
          <p>{{ date_format($date, 'H:i') }} WIB</p>
          <p>{{ date_format($date, 'l, j F Y') }}</p>
          <div class="w-full flex justify-center my-4">
            <a href="https:/{{ $data->link }}" target="_blank" class="p-2 bg-sky-800 rounded text-white"
              rel="noopener noreferrer">Masuk
              Kelas</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
