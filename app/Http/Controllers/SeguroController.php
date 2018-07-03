<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App;

class SeguroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(App\Vehiculo $vehiculo)
    {
        $segurosVehiculo =  App\Seguro::where('idVehiculo',$vehiculo->id)->get();
        /*$i = 0;
        foreach ($segurosVehiculo as $seguro) {
          $seguro->detalle = App\SeguroDetalle::where('idSeguro',$seguro->id)->get();
          $segurosVehiculo[$i] = $seguro;
          $i++;
        }*/
        //var_dump(json_encode($segurosVehiculo)); die;
        $titulo = "Seguros de vehículo " . $vehiculo->marca. ' '. $vehiculo->modelo. ' ' . $vehiculo->anio . ' ' .$vehiculo->patente;
        return view('seguros.index',['data'=>json_encode($segurosVehiculo), 'vehiculo'=>$vehiculo , 'titulo'=>$titulo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(App\Vehiculo $vehiculo)
    {
        $segurosViewModel = [];
        //Listar Proveedores
        $segurosViewModel['proveedores'] = App\Proveedor::all();
        $segurosViewModel['vehiculo'] = $vehiculo;
        $segurosViewModel['detPagos'] = null;
        $segurosViewModel['detpjson'] = '';
        $titulo = 'Nuevo Seguro para ' . $vehiculo->patente;
        return view('seguros.detalle',['data'=>null, 'vm'=>$segurosViewModel, 'titulo'=>$titulo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, App\Vehiculo $vehiculo)
    {
        $iniCobertura = Carbon::createFromFormat('d/m/Y', $request->input('inicioCobertura'))->toDateString();
        $venCobertura = Carbon::createFromFormat('d/m/Y', $request->input('vencimientoCobertura'))->toDateString();
        $fecPrimeraCuota = Carbon::createFromFormat('d/m/Y', $request->input('fechaPrimeraCuota'))->toDateString();
        $seguro = new App\Seguro;
        $seguro->idVehiculo = $vehiculo->id;
        $seguro->idProveedor = $request->input('idProveedor');
        $seguro->numeroPoliza = $request->input('numeroPoliza');
        $seguro->inicioCobertura = $iniCobertura;
        $seguro->vencimientoCobertura = $venCobertura;
        $seguro->observaciones = $request->input('observaciones');
        $seguro->tipoMoneda = $request->input('tipoMoneda');
        $seguro->valorTotal = $request->input('valorTotal');
        $seguro->deducible = $request->input('deducible');
        $seguro->numeroCuotas = $request->input('numeroCuotas');
        $seguro->fechaPrimeraCuota = $fecPrimeraCuota;
        $seguro->montoCuota = $request->input('montoCuota');
        $seguro->save();

        $detalleCuotas = json_decode($request->input('detalleCuota'));

        foreach ($detalleCuotas as $injector) {
            if($injector != null){

                $venCuota = Carbon::createFromFormat('d/m/Y', $injector->vencimientoCuota)->toDateString();
                $detalleSeguro = new App\SeguroDetalle;
                $detalleSeguro->idSeguro = $seguro->id;
                $detalleSeguro->numeroCuota = $injector->numeroCuota;
                $detalleSeguro->montoCuota = $injector->montoCuota;
                $detalleSeguro->vencimientoCuota = $venCuota;
                $detalleSeguro->estaPagada = $injector->estaPagada;
                $detalleSeguro->observaciones = '-';
                $detalleSeguro->save();
            }
        }

        return ['respuesta'=>true, 'estado'=>'OK','mensaje'=>'Seguro para '.$vehiculo->patente.' Insertado exitosamente!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(App\Vehiculo $vehiculo, App\Seguro $seguro)
    {
      $segurosViewModel = [];
      $segurosViewModel['proveedores'] = App\Proveedor::all();
      $segurosViewModel['vehiculo'] = $vehiculo;
      $segurosViewModel['detPagos'] = App\SeguroDetalle::where('idSeguro', $seguro->id)->get();
      $segurosViewModel['detpjson'] = json_encode($segurosViewModel['detPagos']);
      $titulo = 'Detalle Seguro para ' . $vehiculo->patente;
      return view('seguros.detalle',['data'=>$seguro, 'vm'=>$segurosViewModel, 'titulo'=>$titulo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, App\Vehiculo $vehiculo, $id)
    {
        $iniCobertura = Carbon::createFromFormat('d/m/Y', $request->input('inicioCobertura'))->toDateString();
        $venCobertura = Carbon::createFromFormat('d/m/Y', $request->input('vencimientoCobertura'))->toDateString();
        $fecPrimeraCuota = Carbon::createFromFormat('d/m/Y', $request->input('fechaPrimeraCuota'))->toDateString();

        $seguro = App\Seguro::find($id);
        $seguro->idVehiculo = $vehiculo->id;
        $seguro->idProveedor = $request->input('idProveedor');
        $seguro->numeroPoliza = $request->input('numeroPoliza');
        $seguro->inicioCobertura = $iniCobertura;
        $seguro->vencimientoCobertura = $venCobertura;
        $seguro->observaciones = $request->input('observaciones');
        $seguro->tipoMoneda = $request->input('tipoMoneda');
        $seguro->valorTotal = $request->input('valorTotal');
        $seguro->deducible = $request->input('deducible');
        $seguro->numeroCuotas = $request->input('numeroCuotas');
        $seguro->fechaPrimeraCuota = $fecPrimeraCuota;
        $seguro->montoCuota = $request->input('montoCuota');
        $seguro->save();

        $detalleCuotas = json_decode($request->input('detalleCuota'));

        foreach ($detalleCuotas as $injector) {
            if($injector != null){
                $venCuota = Carbon::createFromFormat('d/m/Y', $injector->vencimientoCuota)->toDateString();
                try {
                  $detalleSeguro = App\SeguroDetalle::find($injector->id);
                  $detalleSeguro->idSeguro = $seguro->id;
                  $detalleSeguro->numeroCuota = $injector->numeroCuota;
                  $detalleSeguro->montoCuota = $injector->montoCuota;
                  $detalleSeguro->vencimientoCuota = $venCuota;
                  $detalleSeguro->estaPagada = $injector->estaPagada ? 1: 0;
                  $detalleSeguro->observaciones = '-';
                  $detalleSeguro->save();
                } catch (\Exception $e) {
                  $detalleSeguro = new App\SeguroDetalle;
                  $detalleSeguro->idSeguro = $seguro->id;
                  $detalleSeguro->numeroCuota = $injector->numeroCuota;
                  $detalleSeguro->montoCuota = $injector->montoCuota;
                  $detalleSeguro->vencimientoCuota = $venCuota;
                  $detalleSeguro->estaPagada = $injector->estaPagada ? 1: 0;
                  $detalleSeguro->observaciones = '-';
                  $detalleSeguro->save();
                }


            }
        }

        return ['respuesta'=>true, 'estado'=>'OK','mensaje'=>'Seguro para '.$vehiculo->patente.' Actualizado exitosamente!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
