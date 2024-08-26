<?php
use function Livewire\Volt\layout;

layout('layouts.main');
?>

<div id="scrollspy-main"
  x-data
  x-init="() => {
      var hash = location.hash;
  
      {{-- if (hash) {
          location.href = hash;
      } --}}
  
      {{-- document.querySelector(hash).scrollIntoView();
  
      console.log(document.querySelector(hash)); --}}
  
      {{-- window.dispatchEvent(new CustomEvent('scroll')); --}}
  }">
  @include('landing.hero')

  {{-- @include('landing.slider') --}}

  {{-- @include('landing.clients') --}}

  {{-- @include('landing.works') --}}

  {{-- @include('landing.testimonials') --}}

  @include('landing.contacts')
</div>
