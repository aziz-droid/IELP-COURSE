@extends('layouts.client.main')
@section('client')
  <div class="container md:pt-36 pt-24 pb-6">
    <div class="flex flex-wrap">
      <img src="{{ asset('img/airplane.jpg') }}" alt="" class="w-full">
      <h2 class="w-full text-center text-2xl font-semibold my-4">Videos</h2>
      @foreach ($data as $d)
        <div class="w-full my-4">
          <div class="md:w-2/3 w-full rounded mx-auto border-2 flex justify-center">{!! OEmbed::get($d->link)->html(['width' => 700]) !!}</div>
          <h2 class="font-semibold text-center">{{ $d->judul }}</h2>
        </div>
      @endforeach
    </div>
  </div>
@endsection
