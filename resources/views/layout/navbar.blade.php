<nav class="bg-white border-b px-2 py-2 mx-2 border-gray-200 shadow-sm rounded-md" x-data="{ open: false }">
  <ul class="flex items-center text-sm font-medium text-gray-800">
    <li class="relative mx-1">
      <a class="block px-2 py-1 text-gray-800 hover:text-gray-600 transition-colors rounded no-underline" href="{{route('ogolne.start')}}">Start</a>
    </li>
    <li class="relative mx-1">
      <a class="block px-2 py-1 text-gray-800 hover:text-gray-600 transition-colors rounded" href="{{route('ogolne.kontakt')}}">Kontakt</a>
    </li>
    <li class="relative mx-1">
      <a class="block px-2 py-1 text-gray-800 hover:text-gray-600 transition-colors rounded" href="{{route('ogolne.onas')}}">O nas</a>
    </li>
@auth
    <!-- Dropdown -->
    <li class="relative px-2">
      <button @click="open = !open" class="hover:text-blue-600 focus:outline-none">
        Posty
      </button>
      <ul
        x-show="open"
        @click.away="open = false"
        x-transition
        class="absolute left-0 mt-2 bg-white border border-gray-200 shadow-lg rounded-md list-none p-0 m-0 overflow-hidden w-max min-w-full max-w-[min(100vw-2rem,32rem)] "
      >
        <li class="relative mx-1">
      <a class="block w-full px-3 py-2 text-gray-800 hover:bg-gray-50 " href="{{route('post.index')}}">Lista&nbsp;postów</a>
        </li>
        <li class="relative mx-1">
      <a class="block w-full px-3 py-2 text-gray-800 hover:bg-gray-50" href="{{route('post.create')}}">Dodaj&nbsp;posta</a>
        </li>
      </ul>
    </li>
@endauth
  </ul>
</nav>
