<?php
use App\Models\Ad;

$ads = Ad::active()->effective()->orderBy('order')->get()->split(2)[0];
?>

<div class="hidden lg:block shrink-0"
  x-data
  x-ref="logosWrapper">
  <div
    class="relative overflow-hidden pe-4 before:absolute before:top-0 before:start-0 before:z-10 before:h-10 before:w-full before:bg-gradient-to-b before:from-white before:to-transparent after:absolute after:top-0 after:end-0 after:h-10 after:w-full after:bg-gradient-to-t after:from-white after:to-transparent dark:before:from-neutral-900 dark:after:from-neutral-900">
    <div>
      <ul class="grid grid-cols-2 gap-4"
        x-ref="logos">
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
