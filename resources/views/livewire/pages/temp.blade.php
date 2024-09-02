<?php
use function Livewire\Volt\{layout, state, mount};
use App\Models\Ad;

layout('layouts.main');

state(['ads']);

mount(function () {
    $this->ads = Ad::active()->effective()->orderBy('order')->limit(6)->get();
});
?>

<div class="relative min-h-screen">
  <div class="max-w-5xl mx-auto">
    <div x-data=""
      x-init="$nextTick(() => {
          let ul = $refs.logos;
          ul.insertAdjacentHTML('afterend', ul.outerHTML);
          ul.nextSibling.setAttribute('aria-hidden', 'true');
      });"
      class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
      <ul x-ref="logos"
        @class([
            'flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none',
            'animate-infinite-scroll' => true,
        ])
        style="animation-duration: {{ $ads->count() * 2 }}s;">
        @foreach ($ads as $ad)
          <li>
            <img src="{{ $ad->getFirstMediaUrl('ads', 'thumb') }}"
              alt="{{ $ad->name }}"
              class="object-contain object-center h-[90px] w-[160px] rounded-lg border border-gray-200 dark:border-neutral-700 shadow p-1">
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
