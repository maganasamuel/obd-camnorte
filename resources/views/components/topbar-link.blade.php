@props(['active'])

@php
  $classes = 'inline-block text-black hover:text-gray-600 dark:text-white dark:hover:text-neutral-300';

  /* $activeClass = 'relative inline-block text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 dark:text-white'; */

  $activeClasses =
      'relative before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400';
@endphp

<div>
  <a {{ $attributes->merge(['class' => $classes . ' ' . $activeClasses]) }}
    {{ $active ?? false ? 'aria-current="page"' : '' }}>{{ $slot }}</a>
</div>
