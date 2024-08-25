<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.main')] class extends Component {};
?>

<div>
  @include('landing.slider')

  @include('landing.clients')

  @include('landing.works')

  @include('landing.testimonials')

  @include('landing.contacts')
</div>
