@extends('template.main')
@section('title','Listado de Vehiculos')

@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script src="{{ asset('js/vehiculo.listado.js') }}"></script>
@endsection
@section('styles')
<link href="css/vehiculo.listado.css" rel="stylesheet">
@endsection


@section('contenido')
  <div class="section no-pad-bot">

    <div class="container">
      <div class="row">
        <div class="col s12">
          <a class="btn-floating btn-medium waves-effect waves-light red" href="/vehiculo/create" title="Agregar Nuevo Vehículo"><i class="material-icons">add</i></a>
          <p class=""></p>
          <div class="card">
            <table id="table-custom-elements" class="row-border" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th><i class="small material-icons">menu</i></th>
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
  </div>
  <input type="hidden" id="__data" value="{{$data}}" />

@endsection
