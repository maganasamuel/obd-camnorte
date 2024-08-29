<?php

use App\Models\Ad;
use App\Models\City;

$cities = City::provinced()->get();

$ads = Ad::active()->effective()->orderBy('order')->get();
?>

<div id="home"
  class="space-y-4">
  <div class="relative mx-4 overflow-hidden lg:mx-6 rounded-2xl"
    style="background: linear-gradient(60deg, #61dc57 0%, #61dc57 30%, #b4eb58 0%);">
    <img src="{{ Vite::image('cover.png') }}"
      class="absolute inset-0 object-cover object-center w-full h-full opacity-10" />
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-24">
      <div class="text-center">
        <div class="relative inline-block">
          <h1 class="font-sans text-4xl font-bold text-gray-800 break-all sm:text-6xl dark:text-neutral-200 text-balance drop-shadow-md">
            {{ config('app.name') }}
          </h1>
          <div class="absolute top-0 hidden translate-x-20 -translate-y-12 md:block end-0">
            <svg class="w-16 h-auto text-orange-500"
              width="121"
              height="135"
              viewBox="0 0 121 135"
              fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164"
                stroke="currentColor"
                stroke-width="10"
                stroke-linecap="round" />
              <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5"
                stroke="currentColor"
                stroke-width="10"
                stroke-linecap="round" />
              <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874"
                stroke="currentColor"
                stroke-width="10"
                stroke-linecap="round" />
            </svg>
          </div>
          <div class="absolute bottom-0 hidden -translate-x-32 translate-y-10 md:block start-0">
            <svg class="w-40 h-auto text-cyan-500"
              width="347"
              height="188"
              viewBox="0 0 347 188"
              fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426"
                stroke="currentColor"
                stroke-width="7"
                stroke-linecap="round" />
            </svg>
          </div>
        </div>
        <p class="mt-3 text-gray-600 dark:text-neutral-400 drop-shadow-md">
          {{ config('app.description') }}
        </p>
        <div class="relative mt-10 sm:mt-20 text-balance">
          @foreach ($cities as $city)
            <a class="inline-flex items-center px-4 py-3 m-1 text-sm font-medium text-gray-800 uppercase bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
              href="#">
              {{ $city->name }}
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  @includeWhen($ads->count(), 'landing.ads')
</div>
