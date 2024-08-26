<?php

use App\Models\City;
use App\Models\Contact;
use function Livewire\Volt\{layout, title, state, mount};

layout('layouts.main');

state(['cities', 'contacts']);

mount(function () {
    $this->cities = City::provinced()->get();

    $this->contacts = Contact::orderBy('order')->get();
});
?>

<div>
  @include('landing.hero')

  {{-- @include('landing.slider') --}}

  {{-- @include('landing.clients') --}}

  {{-- @include('landing.works') --}}

  {{-- @include('landing.testimonials') --}}

  @include('landing.contacts')
</div>
