@extends('layouts.client.main')
@section('client')
  <div class="container pt-32 md:pt-36 pb-6">
    <div class="flex flex-wrap">
      <div class="w-full md:h-96 hidden md:block bg-center bg-no-repeat bg-cover"
        style="background-image: url('{{ asset('img/plane.jpg') }}')"></div>
      <img src="{{ asset('img/plane.jpg') }}" alt="" class="w-full md:hidden">
      <div class="w-full md:w-1/2 my-4 px-2">
        <div class="flex items-center gap-2">
          <div>
            <img src="{{ asset('img/icons/chat.png') }}" alt="" class="w-24">
          </div>
          <span class="ml-1">
            <span class="text-2xl block">70% of incidents / accidents</span>
            <span class="block"> ARE CAUSED BY
              LANGUAGE PROBLEMS</span>
          </span>
        </div>
        ICAO standards now demand all of unit Air
        Traffic Service such as Air Traffic Controller and Air Communication Officer providing services to
        international flights must have a minimum level of English. This level of English is known as ICAO
        Operational Level 4. <a href="{{ asset('uploads/icaodescriptors.pdf') }}" class="text-blue-600">here</a>
      </div>
      <div class="w-full md:w-1/2 my-4 px-2">
        <div class="flex items-center gap-2">
          <div>
            <img src="{{ asset('img/icons/flexibility.png') }}" alt="" class="w-24">
          </div>
          <span class="ml-1">
            <span class="text-2xl block">Flexibility</span>
            <span class="block">STUDY WHEN AND WHERE YOU WANT</span>
          </span>
        </div>
        The busy and changing work patterns of pilots and controllers mean that traditional classroom-based courses
        are mostly impractical and ineffective. Independent study programmes offer greater flexibility and
        advantages so that learners can study at their own pace and when and where they want
      </div>
    </div>
    <hr class="border-black my-4">
    <div class="flex flex-wrap">
      <h1 class="text-3xl text-[#02669A] font-bold w-full text-center my-4">What is IELP Course</h1>
      <div class="w-full px-3 my-4 lg:w-1/2 2xl:w-1/3">
        <div class="rounded-xl shadow-lg mb-10 overflow-hidden">
          <img src="{{ asset('img/learning.jpg') }}" alt="" class="w-full">
          <div class="py-4 px-4">
            <h2 class="text-xl text-[#02669A] font-semibold text-center mb-2">Assesment / Training</h2>
            <p>Climb Level 4 is an internet-based, English language assessment and training solution. Climb
              Level 4 is designed to enable ATCOs and pilots to meet the ICAO language proficiency
              requirements through independent study.</p>
          </div>
        </div>
      </div>
      <div class="w-full px-3 my-4 lg:w-1/2 2xl:w-1/3">
        <div class="rounded-xl shadow-lg mb-10 overflow-hidden">
          <img src="{{ asset('img/baca-buku.jpg') }}" alt="" class="w-full">
          <div class="py-4 px-4">
            <h2 class="text-xl text-[#02669A] font-semibold text-center mb-2">SPEECH RECOGNITION</h2>
            <p>Using the latest techniques in Speech Recognition technology Climb Level 4 covers all 6 of the
              language skills required to achieve ICAO level 4 and above :
            <ul class="list-disc list-inside">
              <li>Pronunciation</li>
              <li>Vocabulary</li>
              <li>Grammar</li>
              <li>Comprehension</li>
              <li>Fluency</li>
              <li>Interactions</li>
            </ul>
            </p>
          </div>
        </div>
      </div>
      <div class="w-full px-3 my-4 lg:w-1/2 2xl:w-1/3">
        <div class="rounded-xl shadow-lg mb-10 overflow-hidden">
          <img src="{{ asset('img/laptop.jpg') }}" alt="" class="w-full">
          <div class="py-4 px-4">
            <h2 class="text-xl text-[#02669A] font-semibold text-center mb-2">100% Aviation English</h2>
            <p>All the exercises and reference materials in this course are aviation-related.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
