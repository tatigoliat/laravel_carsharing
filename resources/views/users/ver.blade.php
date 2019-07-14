@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="text-primary">
            <h1>{{ Auth::user()->name }}</h1>
            <h4>Los datos de tu Conductor son</h4>
          </div>
          <table class="table table-bordered" id="MyTable">
            <thead>
              <tr>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Telefono</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($users as $user)
                  <td class="text-center">{{$user->name}}</td>
                  <td class="text-center">{{$user->telefono}}</td>
                @endforeach
                  </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
