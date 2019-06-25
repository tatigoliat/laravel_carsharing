@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="text-primary">
            <h1>{{ Auth::user()->name }}</h1>
            <h2>Mi auto</h2>
          </div>
          
            @if($automoviles->isEmpty())
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-success pull-right" href="{{ url('/automoviles/create/'.Auth::user()->id.'') }}" role="button">Agregar Auto</a>
                </div>
            </div>
            @endif
           
           @if(!($automoviles->isEmpty()))
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-success pull-right" href="{{ url('/automoviles/create/'.Auth::user()->id.'') }}" role="button">Editar Auto</a>
                </div>
            </div>
            <table class="table table-bordered" id="MyTable">
            <thead>
              <tr>
                  <th class="text-center">Modelo</th>
                  <th class="text-center">Placa</th>
                  <th class="text-center">Plazas Disponibles</th>
                  <th class="text-center">Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($automoviles as $automovil)
                  <td class="text-center">{{$automovil->modelo}}</td>
                  <td class="text-center">{{$automovil->placa}}</td>
                  <td class="text-center">{{$automovil->plazas}}</td>
                  <td class="text-center">Activo/Inactivo</td>
                  @endforeach
                  </tr>
            </tbody>
          </table>
            @endif
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
