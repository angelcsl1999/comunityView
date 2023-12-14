@extends('layouts.main')

@section('content')
<div class="sm:flex flex-col  items-center ml-4 mr-4">
    <div class="row justify-content-center mb-6 text-center relative flex flex-col min-w-0 break-words w-full mb-6 max-w-screen-sm">
        <div class="col-md-8 pt-4">
            <h2 class="mt-2 mb-2 text-orange-400">{{ $topic->topic_subject }}</h2>

                @foreach($posts as $post)
                    <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                           <span class="text-sm font-semibold text-white dark:text-white">{{$post['post_by']}}</span>
                        </div>
                        <p class="text-sm font-normal py-2.5 text-white dark:text-white">{{ $post['post_content'] }}</p>
                     </div>
                     <br>

                @endforeach

           

            

                <form method="POST" action="{{ route('reply.save') }}">

                    {{ csrf_field() }}

                    <input type="hidden" class="form-control" id="topic_id" name="topic_id" value="{{ $topic->_id }}">

                    <label for="post_message"></label>

                    <div class="form-group">

                        <textarea rows="5" cols="60" class="form-control text-white dark:bg-gray-700" id="post_message" name="post_message"></textarea>

                    </div>

                    <div class="form-group mt-2">

                        <button style="cursor:pointer" type="submit" class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        >Responder</button>

                    </div>

                </form>
           
        </div>
    </div>
</div>


@endsection
