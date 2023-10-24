<div>
    <div class="mt-8">
         <!--Link to show the movie -->
        <a href="{{route('movies.show', $movie['id'])}}">
        <img src={{$movie['poster_path']}} alt="popular movie">    
        </a>

        <!-- Movies resume-->
        <div class="mt-2">
            <!--Link to show the movie -->
            <a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{$movie['title']}}</a>
            <div class="flex items-center text-gray-400 text-sm mt-1" > 
                <svg class="fill-current text-orange-400 w-4" viewBox="0 0 24 24">
                    <path d="m19.448,23.309l-7.467-5.488-7.467,5.488,2.864-8.863L-.082,8.992h9.214L11.981.114l2.849,8.878h9.214l-7.46,5.453,2.864,8.863Zm-7.467-7.971l3.658,2.689-1.403-4.344,3.683-2.691h-4.548l-1.39-4.331v8.677Z">
                </svg>
                <span class="ml-1">{{$movie['vote_average']}} </span>
                <span>&ensp;|&ensp;</span>
                <span>{{$movie['release_date']}}</span>
            </div>
            <div class="text-gray-400 text-sm">
               {{$movie['genres'] }}
            </div>

        </div>

        
    </div>
</div>