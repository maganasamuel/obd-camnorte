@props(['active'])

@php
  $classes =
      $active ?? false
          ? 'relative inline-block text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 dark:text-white'
          : 'inline-block text-black hover:text-gray-600 dark:text-white dark:hover:text-neutral-300';
@endphp

<div>
  <a {{ $attributes->merge(['class' => $classes]) }}
    {{ $active ?? false ? 'aria-current="page"' : '' }}>{{ $slot }}</a>
</div>
