<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Solicitar;
use App\User;

class SolicitarController extends Controller
{
    public function missolicitudes($pasajero_id)
    {	//Muestra la solicitud activa que tiene hecha un pasajero
        $solicitudes = Solicitar::where('pasajero_id', $pasajero_id)
                                ->orderBy('id', 'asc')
                                ->get();
        $tengoviajes = Solicitar::where([
                        ['pasajero_id', $pasajero_id],
                        ['estatus', '=', '1'],
                    ])->get();
                                
        $tengoviajes2 = Solicitar::where([
                        ['pasajero_id', $pasajero_id],
                        ['estatus', '=', '3'],
                    ])->get();

        $estatusviaje = 2;
        foreach ($tengoviajes as $tengoviaje)
        {
            if($tengoviaje->estatus == 1){
                $estatusviaje = 1; 
            }  

        }

        foreach ($tengoviajes2 as $tengoviaje2)
        {
            if($tengoviaje2->estatus == 3){
                $estatusviaje = 1; 
            }  

        }
        return view('solicitudes.missolicitudes')
                ->with('solicitudes',$solicitudes)
                ->with('tengoviaje', $estatusviaje);
    }

    public function show($id)
    {
        $solicitudes = Solicitar::where('pasajero_id', $pasajero_id)->get();
        return view('solicitudes.index', compact($solicitudes));
    }

    public function create($id)
    {
    	//CRea una solicitud de auto nueva
    	return view('solicitudes.create');
    }
    
    public function colasolicitudes($id)
    {
    	//Muestra las solicitudes realizadas a los conductores.
    	return view('solicitudes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,['destino'=>'required']);
        Solicitar::create([
            'pasajero_id'   =>  $request['pasajero_id'],
            'destino'   =>  $request['destino'],
            'distancia'   =>  $request['distancia'],
            'tiempo_viaje'   =>  $request['tiempo_viaje'],
            'estatus'   =>  1,
        ]);
        return redirect()->route('/solicitudes/missolicitudes', $request['pasajero_id'])->with('success','Registro creado satisfactoriamente');
    }

    public function index(){
        $solicitudes = Solicitar::where('conductor_id', '=', null )->get();

        return view('solicitudes.index')->with('solicitudes',$solicitudes);
    }

    public function tomarviaje($id){
       
        Solicitar::find($id)->update([
            'conductor_id' => Auth::user()->id,
            'estatus' => '3',
        ]);

        $id_pasajero = Solicitar::find($id);
        $conductor = Auth::user()->id;
        User::find($conductor)->update([
            'pasajero_id' => $id_pasajero->id,
        ]);

        $misviajes = Solicitar::find($id);
        return redirect()->route('/solicitudes/datospasajero', $misviajes )->with('success','Registro creado satisfactoriamente');
    }

    public function datospasajero($id){        
        $existe = Solicitar::find($id);
        if($existe == null){
            $solicitudes = null;
            $valor = 1;
            return view('solicitudes.datospasajero')->with('valor', $valor);
        }

        else{
                $solicitudes = Solicitar::find($id)->get();
                $id_pasajero = Solicitar::find($id);
                $pasajero=User::find($id_pasajero->pasajero_id);
                $nombre_pasajero = $pasajero->name;
                $movil_pasajero = $pasajero->telefono;
                return view('solicitudes.datospasajero')
                        ->with('valor',2)
                        ->with('solicitudes',$solicitudes)
                        ->with('nombre_pasajero', $nombre_pasajero)
                        ->with('movil_pasajero', $movil_pasajero);
            }
    }

    public function cancelarsolicitud($id){
        Solicitar::find($id)->update(['estatus' => '2']);
        $id_pasajero = Solicitar::find($id);

        return redirect()->route('/solicitudes/missolicitudes', $id_pasajero->pasajero_id )->with('success','Registro creado satisfactoriamente');
    }


    public function completarviaje($id){
        Solicitar::find($id)->update(['estatus' => '4']);
        return redirect()->route('/solicitudes/datospasajero', $id )->with('success','Registro creado satisfactoriamente');
    }


    public function cancelarviaje($id){
        Solicitar::find($id)->update(['estatus' => '2']);
        $id_pasajero = Solicitar::find($id);

        return redirect()->route('/solicitudes/datospasajero', $id )->with('success','Registro creado satisfactoriamente');
    }


   

}
