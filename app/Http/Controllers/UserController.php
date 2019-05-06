<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	$users = [
    		'Joel',
    		'Alicia',
    		'Tati',
    		'Maria'
    	];
    	return view('users', [
    		'users' => $users
    	]);
    }

    public function show($id)
	{
    	return "Mostrando detalles del Usuario: {$id}";
    }

    public function create()
    {
    	return 'Crear nuevo usuario';
    }
}
