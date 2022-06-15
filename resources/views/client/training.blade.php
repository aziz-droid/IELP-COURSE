@extends('layouts.client.main')
@section('client')
  <div class="container pt-24 md:pt-36 pb-6">
    <div class="flex flex-wrap">
      <div class="w-full md:h-96 hidden md:block bg-center bg-no-repeat bg-cover"
        style="background-image: url('{{ asset('img/plane1.jpg') }}')"></div>
      <img src="{{ asset('img/plane1.jpg') }}" alt="" class="w-full md:hidden">
      <div class="w-full md:w-1/2 my-4 px-2 md:order-2">
        <img src="{{ asset('img/assesment.jpg') }}" alt="" class="w-full border">
      </div>
      <div class="w-full md:w-1/2 my-4 px-2 md:order-1">
        <div class="flex items-center gap-2">
          <div class="">
            <img src="{{ asset('img/icons/check-list.png') }}" alt="" class="w-14">
          </div>
          <span>
            <span class="text-2xl block text-amber-600 font-bold">Training</span>
            <span class="block text-[#02669A] font-semibold">Assesment</span>
          </span>
        </div>
        <p class="mt-2">Before the training program starts the user is required to take an initial
          assessment. Another
          version of the test is also taken at the end of the program to measure overall progress. The
          assessment takes place face-to-face via zoom media with the teacher. The results are presented as %
          as well as the overall ICAO value.</p>
      </div>
      <div class="w-full md:w-1/2 my-4 px-2 md:order-3">
        <img src="{{ asset('img/image-training2.jpg') }}" alt="" class="w-full border">
      </div>
      <div class="w-full md:w-1/2 my-4 px-2 md:order-4">
        <div class="text-[#02669A] font-semibold">
          Training Content
        </div>
        <p class="mt-2">There is a wide range of interactive exercises: text-based exercises, image-based
          exercises, audio-based exercises and of course, speech-based exercises. All exercises are set in an
          aviation context and include:
        <ul class="list-disc list-inside">
          <li>pilot-controller messages</li>
          <li>meteorological reports</li>
          <li>ATIS information</li>
          <li>other authentic materials</li>
        </ul>
        </p>
      </div>
    </div>
  </div>
@endsection
