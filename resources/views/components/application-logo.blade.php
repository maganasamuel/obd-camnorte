<a class="inline-flex items-center space-x-2 text-xl font-semibold rounded-xl focus:outline-none focus:opacity-80"
  href="{{ route('index') }}"
  aria-label="{{ config('app.name') }}">
  <img src="{{ Vite::image('logo.png') }}"
    class="object-contain object-center h-20 rounded-full shadow w-28" />
  <div class="text-black dark:text-white">{{ config('app.name') }}</div>
</a>
