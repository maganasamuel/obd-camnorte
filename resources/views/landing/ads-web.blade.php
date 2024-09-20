<div @class(['relative hidden shrink-0', 'lg:block' => $ads->count() >= 2])>
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
    <div x-data
      x-ref="logosWrapper">
      <div @class([
          'relative overflow-hidden before:absolute before:top-0 before:start-0 before:z-10 before:h-10 before:w-full before:bg-gradient-to-b before:from-white before:to-transparent after:absolute after:top-0 after:end-0 after:h-10 after:w-full after:bg-gradient-to-t after:from-white after:to-transparent dark:before:from-neutral-900 dark:after:from-neutral-900',
      ])>
        <div>
          <ul @class([
              'grid gap-4',
              'grid-cols-1' => $adsWeb[$position]->count() <= 1,
              'grid-cols-2' => $adsWeb[$position]->count() >= 2,
          ])
            x-ref="logos">
            @foreach ($adsWeb[$position] as $ad)
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
  </div>
</div>
