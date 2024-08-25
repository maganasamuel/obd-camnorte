<?php

use App\Models\Contact;
use function Livewire\Volt\{layout, title, state, mount};

layout('layouts.main');

state(['contacts']);

mount(function () {
    $this->contacts = Contact::orderBy('order')->get();
});
?>

<div>
  @include('landing.slider')

  @include('landing.clients')

  @include('landing.works')

  @include('landing.testimonials')

  @include('landing.contacts')
</div>
