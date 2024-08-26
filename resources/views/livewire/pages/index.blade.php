<?php
use function Livewire\Volt\layout;

layout('layouts.main');
?>

<div>
  @include('landing.hero')

  {{-- @include('landing.slider') --}}

  {{-- @include('landing.clients') --}}

  {{-- @include('landing.works') --}}

  {{-- @include('landing.testimonials') --}}

  @include('landing.contacts')
</div>
