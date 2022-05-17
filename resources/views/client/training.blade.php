@extends('layouts.client.main')
@section('client')
    <div class="container pt-24 md:pt-36 pb-6">
        <div class="flex flex-wrap">
            <img src="{{ asset('img/plane1.jpg') }}" alt="" class="w-full">
            <div class="w-full md:w-1/2 my-4 px-2 md:order-2">
                <img src="{{ asset('img/image-training.png') }}" alt="" class="w-full border">
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
        <hr class="border-black my-4">
        <div class="flex flex-wrap">
            <div class="w-full flex items-center gap-3 my-4">
                <img src="{{ asset('img/icons/monitor.png') }}" alt="" class="w-10">
                <h2 class="text-[#02669A] font-semibold text-2xl">Resources</h2>
            </div>
            <div class="w-full flex flex-wrap my-4 md:justify-between">
                <img src="{{ asset('img/mentors/mentor.jpg') }}" alt="" class="w-full md:w-1/4">
                <p class="w-full my-2 md:w-2/4 md:order-first">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Laborum,
                    blanditiis,
                    autem libero voluptas modi sit nam deleniti soluta distinctio repellendus itaque natus illo eligendi
                    odio veniam sequi quo. Laudantium delectus nemo eligendi earum quis, voluptates officia voluptas fuga
                    incidunt vel, nesciunt officiis culpa esse cumque repudiandae ad repellat, dignissimos necessitatibus
                    sit itaque reiciendis pariatur aliquam. Vero, nam modi. Minus debitis sunt autem, ea itaque nesciunt
                    veritatis consequatur nam rem iste. Mollitia repellendus autem magni, voluptas dolorum in, explicabo
                    corrupti nemo praesentium ducimus facere ipsam quas quisquam earum debitis? Illo dolore maiores optio
                    cumque suscipit sed praesentium .</p>
            </div>
            <div class="w-full flex flex-wrap my-4 md:justify-between">
                <img src="{{ asset('img/mentors/mentor.jpg') }}" alt="" class="w-full md:w-1/4">
                <p class="w-full my-2 md:w-2/4 md:order-first">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Laborum,
                    blanditiis,
                    autem libero voluptas modi sit nam deleniti soluta distinctio repellendus itaque natus illo eligendi
                    odio veniam sequi quo. Laudantium delectus nemo eligendi earum quis, voluptates officia voluptas fuga
                    incidunt vel, nesciunt officiis culpa esse cumque repudiandae ad repellat, dignissimos necessitatibus
                    sit itaque reiciendis pariatur aliquam. Vero, nam modi. Minus debitis sunt autem, ea itaque nesciunt
                    veritatis consequatur nam rem iste. Mollitia repellendus autem magni, voluptas dolorum in, explicabo
                    corrupti nemo praesentium ducimus facere ipsam quas quisquam earum debitis? Illo dolore maiores optio
                    cumque suscipit sed praesentium .</p>
            </div>
        </div>
    </div>
@endsection
