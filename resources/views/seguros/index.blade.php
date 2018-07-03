@extends('template.main')
@section('title',$titulo)

@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script src="{{ asset('js/seguro.index.js') }}"></script>
@endsection
@section('styles')
<link href="{{ asset('css/seguro.index.css') }}" rel="stylesheet" />
@endsection
@section('botonera')
<div class="nav-content">
  <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" href="/vehiculo/{{$vehiculo->id}}/seguro/create" title="Agregar Nuevo Vehículo" style="position:fixed; top:5%;">
    <i class="material-icons fixed">add</i>
  </a>
  <a class="btn-floating btn-large halfway-fab waves-effect waves-light yellow" href="/vehiculo" title="Volver a Listado" style="position:fixed; top:5%; right:85px;">
    <i class="material-icons fixed">arrow_back</i>
  </a>
</div>
@endsection


@section('contenido')
  <div class="section no-pad-bot">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <table id="table-custom-elements" class="row-border" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Acciones</th>
                  <th>Numero Poliza</th>
                  <th>Inicio Cobertura</th>
                  <th>Vencimiento Cobertura</th>
                  <th>Valor Total</th>
                  <th>Monto Cuota</th>
                  <th>Numero de Cuotas</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
  <input type="hidden" id="__data" value="{{$data}}" />
  <input type="hidden" id="__idVehiculo" value="{{$vehiculo->id}}" />

@endsection
