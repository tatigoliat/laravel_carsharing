@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Perfil de Usuario</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="#" class="btn btn-info" >Editar Perfil</a>
            </div>
          </div>
          
{{ Auth::user()->name }}
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
