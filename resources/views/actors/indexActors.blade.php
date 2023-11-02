@extends('layouts.main')

@section('content')
    
    <div class="container mx-auto px-4 pt-16">
        <div class="popular_actors">
            <h2 class="uppercase tracking-wider text-orange-400">Actores populares</h2>
            <!-- DIV Popular actors>-->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularActors as $actor)
                <!-- Using a component to show the actors-->
                    <x-actors-card :actor="$actor"/>
                    
                @endforeach
                
            </div>    

        
        </div>

        <div class="page-load-status my-8">
            <div class="flex justify-center">
                <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <!--<p class="infinite-scroll-error">Error</p>-->
        </div>

        
    </div>
@endsection

<!-- Infinite scroll script -->
@section('scripts')

<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script>
    let elem = document.querySelector('.grid');
    let infScroll = new InfiniteScroll( elem, {
    // options
    path: '/actors/page/@{{#}}',
    append: '.actor',
    status: 'page-load-status',
    });

    // element argument can be a selector string
    //   for an individual element
  
</script>
@endsection

