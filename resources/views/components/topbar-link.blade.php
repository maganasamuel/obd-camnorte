@php
  $classes = 'inline-block text-black hover:text-gray-600 dark:text-white dark:hover:text-neutral-300';
@endphp

<li>
  <a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
</li>
