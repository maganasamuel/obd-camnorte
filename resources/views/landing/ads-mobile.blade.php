<?php
use App\Models\Ad;

$ads = Ad::active()->effective()->orderBy('order')->limit(1)->get();
?>

@if ($ads->count())
  <div class="lg:hidden">
    <div
      class="relative py-6 overflow-hidden border-b border-gray-200 md:py-10 dark:border-neutral-700 before:absolute before:top-0 before:start-0 before:z-10 before:w-20 before:h-full before:bg-gradient-to-r before:from-white before:to-transparent after:absolute after:top-0 after:end-0 after:w-20 after:h-full after:bg-gradient-to-l after:from-white after:to-transparent dark:before:from-neutral-900 dark:after:from-neutral-900">
      <div x-data="{ logosWidth: 0, logosWrapperWidth: 0 }"
        x-init="$nextTick(() => {
            logosWidth = $refs.logos.clientWidth;
        
            logosWrapperWidth = $refs.logosWrapper.clientWidth;
        
            console.log({ logosWidth, logosWrapperWidth });
        
            if (logosWidth < logosWrapperWidth) {
                return;
            }
        
            let ul = $refs.logos;
            ul.insertAdjacentHTML('afterend', ul.outerHTML);
            ul.nextSibling.setAttribute('aria-hidden', 'true');
        });"
        x-ref="logosWrapper"
        x-bind:class="{
            'w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]': true,
            'justify-center': logosWidth < logosWrapperWidth,
        }">
        <ul x-ref="logos"
          x-bind:class="{
              'flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none': true,
              'animate-loop-scroll-left': logosWidth >= logosWrapperWidth,
          }"
          style="animation-duration: {{ $ads->count() * 3 }}s;">
          @foreach ($ads as $ad)
            <li>
              <img src="{{ $ad->getFirstMediaUrl('ads', 'thumb') }}"
                alt="{{ $ad->name }}"
                class="object-contain object-center h-[90px] w-[160px] rounded-lg border border-gray-200 dark:border-neutral-700 shadow p-1" />
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endif
