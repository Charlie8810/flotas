@extends('template.main')
@if($data == null)
  @section('title',$titulo)
@else
  @section('title','Detalle Seguro')
@endif
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('js/seguro.detalle.js') }}"></script>
@endsection
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('css/select2-materialize.css') }}" rel="stylesheet">
<link href="{{ asset('css/seguro.detalle.css') }}" rel="stylesheet">
@endsection

@section('metas')
<meta name="id-vehiculo" content="{{$vm['vehiculo']->id}}">
@endsection

@section('botonera')
<div class="nav-content">
  <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" id="btn-store" title="Guardar Seguro" style="position:fixed; top:5%;">
    <i class="material-icons fixed">save</i>
  </a>
  <a class="btn-floating btn-large halfway-fab waves-effect waves-light yellow" href="/vehiculo/{{$vm['vehiculo']->id}}/seguro" title="Volver a Listado" style="position:fixed; top:5%; right:85px;">
    <i class="material-icons fixed">arrow_back</i>
  </a>
</div>
@endsection


@section('contenido')
  <div class="section no-pad-bot">
  <div class="row">
    <div class="col s12">
        <div class="row">
            <form class="col s12" id="formSeguro" name="formSeguro" action="/vehiculo/{{$vm['vehiculo']->id}}/seguro{{($data == null) ? '':'/'.$data->id}}" method="{{$data==null ? 'post' : 'put'}}">
              @csrf
              @method('PUT')
              <ul class="collapsible expandable">
               <li class="active">
                 <div class="collapsible-header"><i class="material-icons">chevron_right</i>Movimiento y Cobertura</div>
                 <div class="collapsible-body">
                   <div class="row">
                      <div class="input-field col s12 m6 select-especial">
                           <select id="proveedor" name="idProveedor" class="validate" required>
                             <option disabled selected placeholder>Selecciona Proveedor...</option>
                             @foreach($vm['proveedores'] as $proveedor)
                             <option value="{{$proveedor->id}}" selected="{{($data != null && $data->idProveedor == $proveedor->id) ? 'selected' : ''}}">{{$proveedor->rut}} {{$proveedor->nombre}}</option>
                             @endforeach
                           </select>
                           <label>Proveedor</label>
                     </div>
                     <div class="input-field col s12 m6">
                        <input id="numeroPoliza" name="numeroPoliza" type="text" class="validate" value="{{($data != null) ? $data->numeroPoliza : ''}}" required>
                        <label for="numeroPoliza">Número Poliza</label>
                     </div>
                   </div>
                   <div class="row">
                   <div class="input-field col s12 m6">
                      <input id="inicioCobertura" name="inicioCobertura" type="text" class="validate datepicker" value="{{($data != null) ? $data->inicioCobertura->format('d/m/Y')  : ''}}" required>
                      <label for="inicioCobertura">Inicio Cobertura</label>
                   </div>

                   <div class="input-field col s12 m6">
                      <input id="vencimientoCobertura" name="vencimientoCobertura" type="text" class="validate datepicker" value="{{($data != null) ? $data->vencimientoCobertura->format('d/m/Y')  : ''}}" required>
                      <label for="vencimientoCobertura">Vencimiento Cobertura</label>
                   </div>
                 </div>
                 <div class="row">
                   <div class="input-field col s12 m12">
                     <textarea id="observaciones" name="observaciones" class="materialize-textarea">{{($data != null) ? $data->observaciones : ''}}</textarea>
                     <label for="observaciones">Observaciones</label>
                   </div>
                 </div>
                 </div>
               </li>
               <li class="active">
                 <div class="collapsible-header"><i class="material-icons">chevron_right</i>Valores</div>
                 <div class="collapsible-body">
                   <div class="row">
                     <div class="input-field col s12 m4">
                      <select id="tipoMoneda" name="tipoMoneda" class="validate" required>
                        <option value="" disabled selected>Selecciona</option>
                        <option value="UF" selected="{{$data->tipoMoneda == 'UF' ? 'selected':''}}">UF</option>
                        <option value="Pesos" selected="{{$data->tipoMoneda == 'Pesos' ? 'selected':''}}">Pesos</option>
                      </select>
                      <label>Tipo Moneda</label>
                    </div>
                    <div class="input-field col s12 m4">
                       <input id="valorTotal" name="valorTotal" type="text" class="validate" value="{{($data != null) ? $data->valorTotal  : ''}}" required>
                       <label for="valorTotal">Valor Total</label>
                    </div>
                    <div class="input-field col s12 m4">
                       <input id="deducible" name="deducible" type="text" class="validate" value="{{($data != null) ? $data->deducible  : ''}}" required>
                       <label for="deducible">Deducible</label>
                    </div>

                    <div class="input-field col s12 m4">
                       <input id="numeroCuotas" name="numeroCuotas" type="text" class="validate" value="{{($data != null) ? $data->numeroCuotas  : ''}}" required>
                       <label for="numeroCuotas">Número de Cuotas</label>
                    </div>
                    <div class="input-field col s12 m4">
                       <input id="fechaPrimeraCuota" name="fechaPrimeraCuota" type="text" class="validate datepicker" value="{{($data != null) ? $data->fechaPrimeraCuota->format('d/m/Y')  : ''}}" required>
                       <label for="fechaPrimeraCuota">Fecha Primera Cuota</label>
                    </div>

                    <div class="input-field col s12 m2">
                       <input id="montoCuota" name="montoCuota" type="text" class="validate" value="{{($data != null) ? $data->montoCuota  : ''}}" required>
                       <label for="montoCuota">Monto Cuota</label>
                    </div>

                    <div class="input-field col s12 m2">
                       <a class="waves-effect waves-light btn-small blue" id="doCalcular">Calcular</a>
                    </div>

                   </div>
                   <div class="row">
                     <table class="striped responsive-table">
                        <thead>
                          <tr>
                              <th>Nro. Cuota</th>
                              <th>Monto</th>
                              <th>Vence</th>
                              <th>Pagada</th>
                          </tr>
                        </thead>

                        <tbody id="detalle_cuotas">
                        </tbody>
                      </table>
                   </div>
                 </div>
               </li>

             </ul>
              <input type="hidden" id="detalleJSON" value="{{$vm['detpjson']}}" />
              <input type="hidden" id="_nc" value="{{$data->numeroCuotas}}" />
            </form>
        </div>
        </div>
      </div>
  </div>
@endsection
