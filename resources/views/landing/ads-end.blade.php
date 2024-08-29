<?php
use App\Models\Ad;

$ads = Ad::active()->effective()->orderBy('order')->get()->split(2)[1];
?>

<div class="hidden lg:block"
  x-data
  x-ref="logosWrapper">
  <div class="h-full max-h-full overflow-hidden">
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
