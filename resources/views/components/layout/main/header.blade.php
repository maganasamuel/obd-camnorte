<header class="sticky top-0 z-50 flex flex-wrap w-full pb-3 bg-white dark:bg-neutral-900 md:justify-start md:flex-nowrap pt-7">
  <nav class="relative flex flex-wrap items-center w-full px-4 mx-auto max-w-7xl md:grid md:grid-cols-12 basis-full md:px-8"
    aria-label="Global">
    <div class="md:col-span-3">
      <x-application-logo />
    </div>

    <!-- Button Group -->
    <div class="flex items-center py-1 gap-x-2 ms-auto md:ps-6 md:order-3 md:col-span-3">
      <x-theme-switcher />

      <div class="md:hidden">
        <button type="button"
          class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700"
          data-hs-collapse="#navbar-collapse-with-animation"
          aria-controls="navbar-collapse-with-animation"
          aria-label="Toggle navigation">
          <svg class="flex-shrink-0 hs-collapse-open:hidden size-4"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round">
            <line x1="3"
              x2="21"
              y1="6"
              y2="6" />
            <line x1="3"
              x2="21"
              y1="12"
              y2="12" />
            <line x1="3"
              x2="21"
              y1="18"
              y2="18" />
          </svg>
          <svg class="flex-shrink-0 hidden hs-collapse-open:block size-4"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
          </svg>
        </button>
      </div>
    </div>
    <!-- End Button Group -->

    <!-- Collapse -->
    <div id="navbar-collapse-with-animation"
      class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow md:block md:w-auto md:basis-auto md:order-2 md:col-span-6">
      <div class="flex flex-col mt-5 gap-y-4 gap-x-0 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0">
        <x-topbar-link :active="request()->routeIs('index')"
          href="{{ route('index') }}">Home</x-topbar-link>
        <x-topbar-link href="{{ route('index') }}#contact-us">Contact Us</x-topbar-link>
      </div>
    </div>
    <!-- End Collapse -->
  </nav>
</header>
