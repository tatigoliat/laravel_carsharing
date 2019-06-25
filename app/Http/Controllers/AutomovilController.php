<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Automovil;

class AutomovilController extends Controller
{
    public function miauto($user_id)
    {
        $automoviles = Automovil::where('user_id', $user_id)->get();
        return view('automoviles.miauto')->with('automoviles',$automoviles);
    }

    public function show($id)
    {
        $automoviles=Automovil::all();
        return view('automoviles.miauto')->with('automoviles',$automoviles);
    }

    public function create()
    {
    	return view('automoviles.create');
    }

    public function store()
    {
    	$this->validate($request,[ 'placa'=>'required', 'modelo'=>'required', 'plazas'=>'required']);

        Automovil::create($request->all());
        return redirect()->route('automoviles.automoviles')->with('success','Registro creado satisfactoriamente');
    }

    
}
