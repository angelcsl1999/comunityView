@extends('layouts.main')


@section('content')
    <div class="sm:flex flex-col md:justify-center items-center">
            
        @if($monthly)
            <div class="px-4 relative w-full md:w-6/12">
                        <div class="bg-white mb-6 text-center shadow-lg rounded-lg relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg">
                            <div class="bg-transparent first:rounded-t px-5 py-3 border-b border-blueGray-200">
                                <h6 class="font-bold my-2">Mensual</h6>
                            </div>
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-5xl mt-0 mb-0 font-bold">{{$monthly->price}} €</div>
                                <span>al mes</span>
                                <ul class="mt-6 mb-0 list-none">
                                <li class="py-1 text-blueGray-500">
                                    Acceso al contenido premium
                                </li>
                                <br>
                                </ul>
                            </div>
                            <div class="mt-4 py-6 bg-transparent bg-transparent rounded-b px-4 py-3 border-t border-blueGray-200">
                                <a href="{{url(route('subscriptions.checkout', $monthly->plan_id))}}" > 
                                    <button  id="card-button" 
                                        class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        Suscribirme
                                    </button>
                    
                    </div>
                </div>
            </div>
        @endif    
               
        @if($yearly)
            <div class="px-4 relative w-full md:w-6/12">
                            <div class="bg-white mb-6 text-center shadow-lg rounded-lg relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg">
                            <div class="bg-transparent first:rounded-t px-5 py-3 border-b border-blueGray-200">
                                <h6 class="font-bold my-2">Anual</h6>
                            </div>
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-5xl mt-0 mb-0 font-bold">{{$yearly->price}} €</div>
                                <span> por año </span>
                                <ul class="mt-6 mb-0 list-none">
                                <li class="py-1 text-blueGray-500">Acceso al contenido premium</li>
                                <li class="py-1 text-blueGray-500">¡Dos meses gratis!</li>
                                </ul>
                            </div>
                            <div class="mt-4 py-6 bg-transparent bg-transparent rounded-b px-4 py-3 border-t border-blueGray-200">
                                <a href="{{url(route('subscriptions.checkout', $yearly->plan_id))}}" > 
                                <button  id="card-button" 
                                    class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                    Suscribirme
                                </button>
            </div>
        @endif
    </div>
                
    
@endsection