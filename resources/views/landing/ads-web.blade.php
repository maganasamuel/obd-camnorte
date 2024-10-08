<div @class(['relative hidden shrink-0', 'lg:block' => $ads->count() >= 2])
  x-data="{ logosHeight: 0, logosWrapperHeight: 0, 'position': '{{ ['left' => 'afterend', 'right' => 'beforebegin'][$position] }}' }"
  x-init="$nextTick(() => {
      logosHeight = $refs.logos.clientHeight;
  
      logosWrapperHeight = $refs.logosWrapper.clientHeight;
  
      if (logosHeight < logosWrapperHeight) {
          return;
      }
  
      let ul = $refs.logos;
  
      ul.insertAdjacentHTML(position, ul.outerHTML);
  
      try {
          ul.nextSibling.setAttribute('aria-hidden', 'true');
      } catch (error) {}
  
  });"
  x-ref="logosWrapper"
  x-bind:class="{
      'before:absolute before:top-0 before:start-0 before:z-10 before:h-11 before:w-full before:bg-gradient-to-b before:from-white before:to-transparent after:absolute after:bottom-0 after:start-0 after:h-11 after:w-full after:bg-gradient-to-t after:from-white after:to-transparent dark:before:from-neutral-900 dark:after:from-neutral-900 [mask-image:_linear-gradient(to_bottom,transparent_0,_black_96px,_black_calc(100%-96px),transparent_100%)]': logosHeight >=
          logosWrapperHeight
  }">
  <div @class([
      'grid gap-4',
      'grid-cols-1' => $adsWeb[$position]->count() <= 1,
      'grid-cols-2' => $adsWeb[$position]->count() >= 2,
  ])>
    <div class="w-[160px] h-4 bg-teal-500 invisible"></div>

    @if ($adsWeb[$position]->count() >= 2)
      <div class="w-[160px] h-4 bg-teal-500 invisible"></div>
    @endif
  </div>
  <div @class([
      'absolute top-0',
      'left-0' => $position == 'left',
      'right-0' => $position == 'right',
  ])>
    <div class="space-y-4">
      <ul @class([
          'grid gap-4',
          'grid-cols-1' => $adsWeb[$position]->count() <= 1,
          'grid-cols-2' => $adsWeb[$position]->count() >= 2,
      ])
        x-bind:class="{ '{{ ['left' => 'animate-loop-scroll-up', 'right' => 'animate-loop-scroll-down'][$position] }}': logosHeight >= logosWrapperHeight }"
        style="animation-duration: {{ $adsWeb[$position]->count() * 3 }}s;"
        x-ref="logos">
        @foreach ($adsWeb[$position] as $ad)
          <li>
            <img src="{{ $ad->getFirstMediaUrl('ads', 'thumb') }}"
              alt="{{ $ad->name }}"
              class="object-contain object-center h-[90px] w-[160px] rounded-lg dark:border-neutral-700 shadow" />
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
