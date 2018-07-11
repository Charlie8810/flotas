<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(App\Vehiculo $vehiculo)
    {
        $mntDisponibles = App\MantencionDisponible::all();

        return view('configuracion.index', ['vehiculo'=>$vehiculo, 'mntDisponibles'=>$mntDisponibles]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroyMantencionProgramada($id)
      {
          App\MantencionProgramada::destroy($id);
          return ['respuesta'=>true, 'estado'=>'OK','mensaje'=>'Mantencion Programada Eliminada Exitosamente'];
      }

      /**
       * Display the specified resource.
       *
       * @param  App\Vehiculo $vehiculo
       * @param  App\MantencionProgramada $mantencion
       * @return \Illuminate\Http\Response
       */
      public function showMantencionProgramada(App\Vehiculo $vehiculo, App\MantencionProgramada $mantencion)
      {
          return $mantencion;
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
        public function createMantencionProgramada(App\Vehiculo $vehiculo)
        {
            $mntDisponibles = App\MantencionDisponible::all();
            return view('configuracion.mantencion-programada', ['vehiculo'=>$vehiculo, 'mantencionProgramada'=>null, 'mantecionesDisponibles'=>$mntDisponibles]);
        }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  App\Vehiculo $vehiculo
       * @param  App\MantencionProgramada $mantencion
       * @return \Illuminate\Http\Response
       */
      public function editMantencionProgramada(App\Vehiculo $vehiculo, App\MantencionProgramada $mantencion)
      {
          $mntDisponibles = App\MantencionDisponible::all();
          //var_dump($mantencion); die;
          return view('configuracion.mantencion-programada', ['vehiculo'=>$vehiculo, 'mantencionProgramada'=>$mantencion, 'mantecionesDisponibles'=>$mntDisponibles]);
      }


      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function storeMantencionProgramada(Request $request, App\Vehiculo $vehiculo)
      {


          $mantencion = new App\MantencionProgramada;
          $mantencion->idMantencionDisponible = $request->input('idMantencionDisponible');
          $mantencion->idVehiculo = $vehiculo->id;
          $mantencion->tipoProgramacion = $request->input('esKilometraje', 'off') == 'on' ? 'kilometraje' : 'fecha';
          $mantencion->fechaInicial = $request->input('fechaInicial');
          $mantencion->kilometrajeInicial = $request->input('kilometrajeInicial');
          $mantencion->tipoLapso = $request->input('tipoLapso');
          $mantencion->periodoMantencion = $request->input('periodoMantencion');

          $mantencion->save();

          return ['respuesta'=>true, 'estado'=>'OK','mensaje'=>'Datos Guardados con Exito'];
      }


      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function updateMantencionProgramada(Request $request, App\Vehiculo $vehiculo, $id)
      {
          $mantencion = App\MantencionProgramada::find($id);
          $mantencion->idMantencionDisponible = $request->input('idMantencionDisponible');
          $mantencion->idVehiculo = $vehiculo->id;
          $mantencion->tipoProgramacion = $request->input('esKilometraje', 'off') == 'on' ? 'kilometraje' : 'fecha';
          $mantencion->fechaInicial = $request->input('fechaInicial');
          $mantencion->kilometrajeInicial = $request->input('kilometrajeInicial');
          $mantencion->tipoLapso = $request->input('tipoLapso');
          $mantencion->periodoMantencion = $request->input('periodoMantencion');

          $mantencion->save();

          return ['respuesta'=>true, 'estado'=>'OK','mensaje'=>'Datos Modificados con Exito'];
      }


      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          //
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
