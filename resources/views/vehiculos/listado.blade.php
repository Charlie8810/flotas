@extends('template.main')
@section('title','Listado de Vehiculos')

@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script src="{{ asset('js/vehiculo.listado.js') }}"></script>
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.css"/>
<link href="css/vehiculo.listado.css" rel="stylesheet">
@endsection

@section('botonera')
<div class="nav-content">
  <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" href="/vehiculo/create" title="Agregar Nuevo Vehículo" style="position:fixed; top:5%;">
    <i class="material-icons fixed">add</i>
  </a>
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
                  <th>Patente</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Año</th>
                  <th>Kilometraje</th>
                  <th>Dueño</th>
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

@endsection
