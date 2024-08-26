<!DOCTYPE html>
<html lang="{{ str(app()->getLocale())->replace('_', '-')->value() }}">

<head>
  <meta charset="utf-8">
  <meta name="robots"
    content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <link rel="canonical"
    href="{{ config('app.url') }}">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (config('app.description'))
    <meta name="description"
      content="{{ config('app.description') }}">
  @endif

  <meta name="csrf-token"
    content="{{ csrf_token() }}">

  <title>{{ $title ?? config('app.name') }}</title>

  <link rel="shortcut icon"
    href="{{ Vite::image('favicon.png') }}">

  @vite(['resources/css/font.css'])

  <script>
    const html = document.querySelector('html');
    const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
    const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

    if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
    else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
    else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
    else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
  </script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-neutral-900">
  <x-layout.main.header />
  <main id="content"
    class="pt-4">
    {{ $slot }}
  </main>
  <x-layout.main.footer />
</body>

</html>
