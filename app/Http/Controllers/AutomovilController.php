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

    public function store(Request $request)
    {
    	$this->validate($request,['placa'=>'required', 'modelo'=>'required', 'plazas'=>'required']);
        Automovil::create([
            'user_id'   =>  $request['user_id'],
            'placa'     =>  $request['placa'],
            'modelo'    =>  $request['modelo'],
            'plazas'    =>  $request['plazas'],
        ]);
        return redirect()->route('/automoviles/miauto', $request['user_id'])->with('success','Registro creado satisfactoriamente');
    }

    public function edit($id){
        $automoviles=Automovil::find($id);
        return view('automoviles.edit')->with('automoviles',$automoviles);
    }

   public function update(Request $request, $id){
        $user_id =  $request['user_id'];
        $this->validate($request,['placa'=>'required', 'modelo'=>'required', 'plazas'=>'required']);

        Automovil::find($id)->update($request->all());
        $user_id = Automovil::find($id);
        return redirect()->route('/automoviles/miauto', $user_id->user_id)->with('success','Registro creado satisfactoriamente');
    }
    
}
