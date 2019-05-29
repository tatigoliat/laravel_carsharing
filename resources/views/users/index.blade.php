@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="text-primary">
            <h1>{{ Auth::user()->name }}</h1>
          </div>
          <div class="pull-left">
            <p>Esta registrado como <strong>{{ Auth::user()->perfil }}</strong>
          </div>
          
          <div class="pull-right">
            <div class="btn-group">
              <a class="btn btn-success pull-right" href="{{ url('/users/edit/'.Auth::user()->id.'') }}" role="button">Editar Perfil</a>
            </div>
          </div>

          <table class="table table-bordered" id="MyTable">
            <thead>
              <tr>
                  <th class="text-center">Correo</th>
                  <th class="text-center">Telefono</th>
                  <th class="text-center">Carrera</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <td class="text-center">{{ Auth::user()->email }}</td>
                  <td class="text-center">{{ Auth::user()->telefono }}</td>
                  <td class="text-center">{{ Auth::user()->carrera_id }}</td>
                  </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
