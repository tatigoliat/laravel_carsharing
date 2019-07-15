<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Carrera;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(3);
        return view('users.index', compact($users));
        
    }

    public function show($id)
	{
        $users=User::find($id);
        return  view('users.show')->with('users',$users);
    }

    public function ver($id)
    {

        $users=User::find($id)->get();
        return view('users.ver')->with('users',$users);
    }

    public function create()
    {
    	return 'Crear nuevo usuario';
    }

    public function edit($id)
    {
        $users=User::find($id);
        $carreras=Carrera::all();
        return view('users.edit')
        ->with('users',$users)
        ->with('carreras',$carreras);
        
    }
 
    public function update(Request $request, $id)    {
        $this->validate($request,[ 'telefono'=>'required', 'perfil'=>'required']);
        User::find($id)->update($request->all());
        return redirect()->route('users.index')->with('success','Registro actualizado satisfactoriamente'); 
    }
}
