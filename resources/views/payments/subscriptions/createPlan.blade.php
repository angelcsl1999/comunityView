@extends('layouts.main')


@section('content')
  <div class="container py-12">
      <div class="row justify-content-center max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          <div class="col-md-8 p-4 sm:p-8  bg-white shadow sm:rounded-lg">
              <div class="card ">
                  <div class="card-header">{{ __('Nuevo plan') }}</div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif


                      <form method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-3" action="{{ route('plans.store') }}">
                          @csrf
                          <div class="form-group mb-4 mt-2">
                            <div>
                              <label class="flex-1">Nombre del plan</label> 
                            </div>
                            <div>
                              <input class="flex-1" type="text" name="name" class="form-control" placeholder="Nombre"><br>
                            </div>
                          </div>
                            <div class="form-group mb-4 mt-2">
                              <div>
                                <label>Precio</label>
                              </div>
                              <div>
                                <input type="number" name="amount" class="form-control" placeholder="Introduzca Cantidad" min="0">
                              </div>
                            </div>
                            <div class="form-group mb-4 mt-2">
                              <div>
                                <label>Moneda</label>
                              </div>
                              <div>
                                <input type="text" name="currency" class="form-control" placeholder="Introduzca moneda">
                              </div>
                            </div>
                            <div class="form-group mb-4 mt-2">
                              <div>
                                <label>Intervalo de pago</label>
                              </div>
                              <div>
                                <input type="number" name="interval_count" class="form-control" placeholder="Intervalo" min="1">
                              </div>
                            </div>
                          <div class="form-group">
                            <div>
                              <label>Período de facturación</label>
                            </div>
                            <div>
                              <select name="billing_period" class="form-control">
                                <option disabled selected>período de facturación</option>
                                <option value="week">Semanal</option>
                                <option value="month">Mensual</option>
                                <option value="year">Anual</option>
                              </select>
                            </div>
                          </div><br>
                          <button type="submit" 
                            class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                              Guardar </button>
                        </form>


                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection