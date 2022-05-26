@extends('layouts.client.main')
@section('client')
    <div class="container md:pt-36 pt-24 pb-6">
        <div class="flex flex-wrap">
            <div class="w-full md:h-96 hidden md:block bg-center bg-no-repeat bg-cover"
                style="background-image: url('{{ asset('img/airplane.jpg') }}')"></div>
            <img src="{{ asset('img/airplane.jpg') }}" alt="" class="w-full md:hidden">
            <div class="w-full my-4 md:w-1/2">
                <div class="flex items-center">
                    <img src="{{ asset('img/icons/prices.png') }}" alt="" class="w-10">
                    <p class="text-2xl text-amber-600 font-semibold ml-4">Payment</p>
                </div>
                <div class="my-4">
                    <p class="font-bold">BRI-ANWAR</p>
                    <p>901 12417 1241 12414 8</p>
                </div>
            </div>
            <div class="w-full my-4 md:w-1/2 p-5 border border-amber-500 rounded">
                <h3 class="text-center font-semibold">Kirim Bukti Transfer</h3>
                <form action="/payment/{{ Auth::user()->id }}" class="my-4" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="foto" id="foto" class="w-full border py-1 px-2 border-sky-600">
                    @error('foto')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                    <div class="flex my-4 justify-center">
                        <button class="p-2 rounded text-white bg-blue-600" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        @if (Session::has('error'))
            var errorToast = '{{ session('error') }}'
        @endif
    </script>
@endsection
