<?php

use App\Models\Social;

$socials = Social::orderBy('order')->get();
?>

<footer class="mt-auto border-t border-gray-200 md:border-t-0 dark:border-neutral-700">
  <div class="w-full px-4 py-10 mx-auto max-w-7xl md:pt-0 sm:px-6 lg:px-8">
    <div class="grid items-center grid-cols-1 gap-5 md:grid-cols-3">
      <div class="text-center md:text-start">
        <div class="flex items-center space-x-2">
          <img src="{{ Vite::image('logo.png') }}"
            class="object-contain object-center h-12 rounded-full" />
          <div class="text-black dark:text-white">{{ config('app.name') }}</div>
        </div>
      </div>

      <div class="text-sm text-center text-black gap-x-2 dark:text-white">
        Copyright &copy; {{ now()->format('Y') }}
      </div>

      @if ($socials->count())
        <div class="space-x-2 text-center md:text-end">
          @foreach ($socials as $social)
            <a class="inline-flex items-center justify-center text-sm font-semibold text-black border border-transparent rounded-full size-8 gap-x-2 hover:text-gray-600 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:text-neutral-400"
              href="{{ $social->url }}"
              target="_blank">
              @svg($social->icon, 'h-6 w-6 shrink-0')
            </a>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</footer>
