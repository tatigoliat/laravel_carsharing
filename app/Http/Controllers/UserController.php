<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(3);
        return view('users.index', compact('users'));
    }

    public function show($id)
	{
    	return "Mostrando detalles del Usuario: {$id}";

        $users=User::find($id);
        return  view('user.show',compact('users'));
    }

    public function create()
    {
    	return 'Crear nuevo usuario';
    }

    public function edit($id)
    {
        //
        $user=User::find($id);
        return view('user.edit',compact('user'));
    }
 
    public function update(Request $request, $id)    {
        //
        // $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required', 'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required', 'precio'=>'required']);
 
        // libro::find($id)->update($request->all());
        // return redirect()->route('libro.index')->with('success','Registro actualizado satisfactoriamente');
 
    }
}
