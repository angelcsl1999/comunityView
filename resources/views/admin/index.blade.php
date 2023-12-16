@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16 text-white">
    <div class="">
            
        <div class="grid grid-cols-1 sm:grid-cols-2 ">         
                
            
            <div class="col-md-8 mt-2">      

                <h2 class="uppercase tracking-wider text-orange-400 mb-2">Videos y contenido premium</h2>

                    <a href="{{route('videos.create')}}" > 
                            <button  id="card-button" 
                                class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                            Crear video
                            </button>
                    </a>   
                    
                    <a href="{{route('admin.adminVideos')}}" > 
                        <button  id="card-button" 
                            class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        Administrar videos
                        </button>
                    </a>  
                    
                    <br>
            </div>  
            
            <br>
            </div>
            <div class="col-md-8 ">
                <h2 class="uppercase tracking-wider text-orange-400 mb-2 mt-4">Categorias y foros</h2>
                
                <a href="" > 
                    <button  id="card-button" 
                        class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    Crear categoria
                    </button>
                </a>   
            <br>
            </div>

            <div class="col-md-8 ">
                <h2 class="uppercase tracking-wider text-orange-400 mb-2 mt-4">Pagos</h2>
                
                <a href="{{route('subscriptions.createPlan')}}" > 
                    <button  id="card-button" 
                        class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    Crear plan de pago
                    </button>
                </a>   

                <a href="{{route('payments.singleCharge.index')}}" > 
                    <button  id="card-button" 
                        class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    Pago unico
                    </button>
                </a>  
            <br>
            </div>

        </div>
    </div>    
</div> 
@endsection