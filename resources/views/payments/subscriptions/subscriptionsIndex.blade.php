@extends('layouts.main')

<?php use Carbon\Carbon; ?>

@section('content')
<div class="sm:flex flex-col md:justify-center items-center ml-4 mr-4">
    <div class="row justify-content-center bg-white mb-6 text-center shadow-lg rounded-lg relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg max-w-screen-sm">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-body shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
                    @if (session('alert-success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert-success') }}
                        </div>
                    @endif

                    @if (count($subscriptions) > 0)
                    <h4><b>Tu suscripción</b></h4>
                    <table class="w-full table-fixed">
                        <thead>
                          <tr class="bg-gray-100">
                            <th scope="col" class="w-1/4 py-4 px-6 text-left text-gray-600 uppercase">Precio</th>
                            <th scope="col" class="w-1/4 py-4 px-6 text-left text-gray-600 uppercase">Fecha</th>
                            <th scope="col" class="w-1/4 py-4 px-6 text-left text-gray-600 uppercase">Fecha Fin</th>
                            <th scope="col" class="w-1/4 py-4 px-6 text-left text-gray-600 uppercase">Cancelar</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $subscription->plan->price }}</td>
                                    <td>{{ Carbon::parse($subscription->created_at)->format('d M, Y') }}</td>
                                    <td>{{ Carbon::parse($subscription->ends_at)->format('d M, Y') }}</td>
                                    <td>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            @if ($subscription->ends_at == null)
                                                <input type="checkbox" id="switcher"  checked
                                                    class="sr-only peer"
                                                    checked value="{{ $subscription->name }}">
                                            @else
                                                <input type="checkbox" id="switcher"  class="sr-only peer"
                                                    value="{{ $subscription->name }}">
                                            @endif
                                            <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-2 peer-focus:ring-grey-100 dark:peer-focus:ring-grey-100 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange-500"></div>
                                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                    @else
                    <h4>Usted no está suscrito a ningun plan</h4>
                    @endif


                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#switcher').click(function() {
            var subscriptionName = $('#switcher').val();
            if($(this).is(':checked')){
                $.ajax({
                    url:'{{ route("subscriptions.resume") }}',
                    data: { subscriptionName },
                    type:"GET",
                    success:function( response )
                    {

                    },
                    error: function(response)
                    {
                    }
                });
            }
            else {
                $.ajax({
                    url:'{{ route("subscriptions.cancel") }}',
                    data: { subscriptionName },
                    type:"GET",
                    success:function( response )
                    {
                        console.log(response)
                    },
                    error: function(response)
                    {
                    }
                });
            }
        });
    });
</script>
@endsection