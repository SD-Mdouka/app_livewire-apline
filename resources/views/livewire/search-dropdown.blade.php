 <div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
     <div class="absolute top-0">
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
             style="right: -22px;top: 7px;position: absolute;" viewBox="0 0 16 16">
             <path
                 d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
         </svg>
     </div>
     <input wire:model.debounce.500ms="search" type="text"
         class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:shadow-outline"
         placeholder="Search (Press '/' to focus)" x-ref="search" @keydown.window="
            if(event.KeyCode == 191)
            {
                event.preventDefault();
                $refs.search.focus();
            }
         " @focus="isOpen = true" @keydown="isOpen = true" @keydown.escape.window="isOpen = false"
         @keydown.shift.tab="isOpen = false">
     <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
     @if (strlen($search) >= 2)
         <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4" x-show.transition.opacity="isOpen">
             @if ($searchResults->count() > 0)
                 <ul>
                     @foreach ($searchResults as $result)
                         <li class="border-b border-gray-700">
                             <a href="{{ route('movies.show', $result['id']) }}"
                                 class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150"
                                 @if ($loop->last) @keydown.tab="isOpen = false" @endif>

                                 @if ($result['poster_path'])
                                     <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}"
                                         alt="poster" class="w-8">
                                 @else
                                     <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                 @endif
                                 <span class="ml-4">{{ $result['title'] }}</span>
                             </a>
                         </li>
                     @endforeach

                 </ul>
             @else
                 <div class="px-3 py-3">No results for "{{ $search }}"</div>
             @endif
         </div>
     @endif

 </div>
