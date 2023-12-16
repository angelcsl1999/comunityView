@extends('layouts.main')

@section('content')



<div class="container py-12  md:ml-4 mr-4  md:justify-center">
    <div class="flex justify-normal md:row justify-content-center max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="col-md-8 p-4 sm:p-8  bg-white shadow sm:rounded-lg">
            <div class="card ">
                <div class="card-header">{{ __('Nuevo video') }}</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    @csrf

                    <div class="form-group mb-4 mt-2">
                        <div>
                            <label class="flex-1">Titulo</label> 
                        </div>
                        <div>
                        <input type="text" name="title" placeholder="Título">
                        </div>
                    </div>

                    <div class="form-group mb-4 mt-2">
                        <div>
                            <label class="flex-1">Video</label> 
                        </div>
                        <div>
                            <input type="file" name="video" accept="video/*">
                        </div>
                    </div>



                    <div class="form-group mb-4 mt-2">
                        <div>
                            <label class="flex-1">Portada</label> 
                        </div>
                        <div>
                            <input type="file" name="image" accept="image/*">
                        </div>
                    </div>
                    
                    <div class="form-group mb-4 mt-2">
                        <div>
                            <label class="flex-1">Descripción</label> 
                        </div>
                        <div>
                            <textarea name="description" placeholder="Descripción"></textarea>
                        </div>
                    </div>
                    
                     
                
               
                </div>
                <button type="submit" 
                class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    Subir Video
                </button>
            </form>
        </div>
    </div>
@endsection