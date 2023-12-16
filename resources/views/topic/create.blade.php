@extends('layouts.main')

@section('content')


<div class="sm:flex flex-col md:justify-center items-center ml-4 mr-4">
    <div class="px-4 relative w-full md:w-6/12 ">
        <div class="bg-white break-words w-full mb-6 rounded-lg">

            <h2 class="mt-4 ml-4">Crea una nueva discusión</h2>

            <form method="POST" action="{{ route('topic.save') }}" class="ml-4" >

                {{ csrf_field() }}

                <div class="form-group mb-4">
                    <x-input-label for="topic_cat" :value="__('Categoría')" class="mt-2"/>
                    <select name="topic_cat">            

                        <option value="">Seleciona una categoría</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->_id }}">{{ $category->cat_name }}</option>
                        @endforeach

                    </select>
                   
                </div>

                <div class="form-group mb-4">
                    <x-input-label for="topic_subject" :value="__('Tema')" />
                    <input type="text" class="form-control" id="topic_subject" name="topic_subject">
                </div>

                

                <div class="form-group mb-4">
                    <x-input-label for="topic_message" :value="__('Primer Mensaje')" />
                    <input type="text" class="form-control" id="topic_message" name="topic_message">
                </div>

                <div class="form-group">
                    <button style="cursor:pointer" type="submit" 
                        class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        Submit</button>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{var_dump($errors->all())}}
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

            </form>
        </div>
    </div>
</div>
@endsection