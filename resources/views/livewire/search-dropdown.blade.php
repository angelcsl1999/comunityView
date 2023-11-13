<div class="relative mt-2 md:mt-0 ">
                        
        <input wire:model.debounce.500ms="search" 
            type="text" 
            class="bg-gray-600 rounded-full w-64 px-4 pl-8 py1 focus:outline-none focus:shadow-outline" 
            placeholder="Buscar"
            x-ref="search"
            @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus = "isOpen = true"
        @keydown ="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false">
        <!--SVG de buscar en imagenes -->
        <div class="absolute top-0">
            <svg class="fill-white current w-4 text-gray-500 mt-2 ml-2 mb-2" viewBox="0 0 24 24" > <path class="heroicon-ui" d="M23.707,22.293l-5.969-5.969a10.016,10.016,0,1,0-1.414,1.414l5.969,5.969a1,1,0,0,0,1.414-1.414ZM10,18a8,8,0,1,1,8-8A8.009,8.009,0,0,1,10,18Z"/></svg>
        </div>

        <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

        @if(strlen($search)>1)
            <div class="absolute bg-gray-600  text-sm rounded  w-64 mt-4">
            @if (count($searchResults) > 0)
                
            
                <ul>   
                @foreach ($searchResults as $result)
                    <li class="border-b border-gray-700">
                        <a
                            href="{{ route('movies.show', $result['id']) }}" class="block hover:bg-gray-700 px-4 py-4 flex items-center transition ease-in-out duration-150"
                            @if ($loop->last) @keydown.tab="isOpen = false" @endif
                        >
                        @if ($result['poster_path'])
                            <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                        @else
                            <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                        @endif
                        <span class="ml-4">{{ $result['title'] }}</span>
                    </a>
                    </li>
                @endforeach
                
                </ul>
                @else
                    <div class="px-3 py-3">
                        Sin resultados para {{ $search}}
                    </div>
                @endif
            </div>
        @endif    
</div>

