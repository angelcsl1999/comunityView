@extends('layouts.main')

@section('content')

<div class="mt-4 sm:10pl md:pl-30 lg:pl-40 mb-4">
    <a href="{{route('topic.create')}}" > 
        <button  id="card-button" 
            class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
            Crear una discusion
        </button>
    </a>
</div>   


<div class="container mx-auto px-4 pt-16 text-white">
    <div class="">
        <div class="col-md-8 ">
            <h2 class="uppercase tracking-wider text-orange-400">Ultimos temas de discusion</h2>
             
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">         

                @foreach($topics as $topic)
                    <div class="mt-2">
                        <a href="{{route('topic.detail',$topic["topic_id"]) }}">
                        
                        <div class=" text-white text-center font-medium text-2xl mt-1  dark:bg-gray-700 rounded-md" > 
                            <label for="topic_subject" class="block font-medium text-sm text-gray-100">{{$topic['topic_category_name']}}</label>
                            <br>
                            <p>{{ $topic['topic_subject'] }}</p>
                        </div>    
                        </a>
                    </div>
                @endforeach
            </div>  
            
        <br>
        </div>
    </div>   
    
</div> 

@endsection



          

               