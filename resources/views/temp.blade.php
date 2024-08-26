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
  <div id="scrollspy-scrollable-parent-2"
    class="max-h-[400px] overflow-y-auto">
    <div class="grid grid-cols-5">
      <div class="col-span-2">
        <h2 class="text-xl font-medium dark:text-white">Navbar</h2>

        <ul class="sticky top-0"
          data-hs-scrollspy="#scrollspy-2"
          data-hs-scrollspy-scrollable-parent="#scrollspy-scrollable-parent-2">
          <li data-hs-scrollspy-group="">
            <a href="#item-1"
              class="block py-0.5 text-sm font-medium leading-6 text-gray-700 hover:text-gray-900 focus:outline-none focus:text-blue-600 dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-blue-500 hs-scrollspy-active:text-blue-600 dark:hs-scrollspy-active:text-blue-500 active">Item
              1</a>
            <ul>
              <li class="ms-4">
                <a href="#item-1-1"
                  class="group flex items-center gap-x-2 py-0.5 text-sm text-gray-700 leading-6 hover:text-gray-800 focus:outline-none focus:text-blue-600 dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-blue-500 hs-scrollspy-active:text-blue-600 dark:hs-scrollspy-active:text-blue-500">
                  <svg class="shrink-0 size-4"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                  </svg>
                  Item 1-1
                </a>
              </li>
              <li class="ms-4">
                <a href="#item-1-2"
                  class="group flex items-center gap-x-2 py-0.5 text-sm text-gray-700 leading-6 hover:text-gray-800 focus:outline-none focus:text-blue-600 dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-blue-500 hs-scrollspy-active:text-blue-600 dark:hs-scrollspy-active:text-blue-500">
                  <svg class="shrink-0 size-4"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                  </svg>
                  Item 1-2
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#item-2"
              class="block py-0.5 text-sm font-medium leading-6 text-gray-700 hover:text-gray-900 focus:outline-none focus:text-blue-600 dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-blue-500 hs-scrollspy-active:text-blue-600 dark:hs-scrollspy-active:text-blue-500">Item
              2</a>
          </li>
          <li data-hs-scrollspy-group="">
            <a href="#item-3"
              class="block py-0.5 text-sm font-medium leading-6 text-gray-700 hover:text-gray-900 focus:outline-none focus:text-blue-600 dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-blue-500 hs-scrollspy-active:text-blue-600 dark:hs-scrollspy-active:text-blue-500">Item
              3</a>
            <ul>
              <li class="ms-4">
                <a href="#item-3-1"
                  class="group flex items-center gap-x-2 py-0.5 text-sm text-gray-700 leading-6 hover:text-gray-800 focus:outline-none focus:text-blue-600 dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-blue-500 hs-scrollspy-active:text-blue-600 dark:hs-scrollspy-active:text-blue-500">
                  <svg class="shrink-0 size-4"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                  </svg>
                  Item 3-1
                </a>
              </li>
              <li class="ms-4">
                <a href="#item-3-2"
                  class="group flex items-center gap-x-2 py-0.5 text-sm text-gray-700 leading-6 hover:text-gray-800 focus:outline-none focus:text-blue-600 dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-blue-500 hs-scrollspy-active:text-blue-600 dark:hs-scrollspy-active:text-blue-500">
                  <svg class="shrink-0 size-4"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                  </svg>
                  Item 3-2
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>

      <div class="col-span-3">
        <div id="scrollspy-2"
          class="space-y-4">
          <div id="item-1">
            <h3 class="text-lg font-semibold dark:text-white">Item 1</h3>
            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-neutral-400">This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is
              highlighted. It's repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
          </div>

          <div id="item-1-1">
            <h3 class="text-lg font-semibold dark:text-white">Item 1-1</h3>
            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-neutral-400">This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is
              highlighted. It's repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
          </div>

          <div id="item-1-2">
            <h3 class="text-lg font-semibold dark:text-white">Item 1-2</h3>
            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-neutral-400">This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is
              highlighted. It's repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
          </div>

          <div id="item-2">
            <h3 class="text-lg font-semibold dark:text-white">Item 2</h3>
            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-neutral-400">This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is
              highlighted. It's repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
          </div>

          <div id="item-3">
            <h3 class="text-lg font-semibold dark:text-white">Item 3</h3>
            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-neutral-400">This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is
              highlighted. It's repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
          </div>

          <div id="item-3-1">
            <h3 class="text-lg font-semibold dark:text-white">Item 3-1</h3>
            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-neutral-400">This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is
              highlighted. It's repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
          </div>

          <div id="item-3-2">
            <h3 class="text-lg font-semibold dark:text-white">Item 3-2</h3>
            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-neutral-400">This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is
              highlighted. It's repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
