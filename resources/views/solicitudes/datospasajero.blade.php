@extends('layouts.app')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="text-primary">
						<h1>{{ Auth::user()->name }}</h1>
						<h2>Datos de mi Pasajero</h2>
					</div>
            		@if($valor == 1)
            		<div>
            			<h4>No tiene solicitudes hechas</h4>
            		</div>
            		<div class="pull-right">
            		    <div class="btn-group">
            		        <a class="btn btn-success pull-right" href="{{ url('/solicitudes/create/'.Auth::user()->id.'') }}" role="button">Solicitar un Auto</a>
            		    </div>
            		</div>
            		@endif

            		@if($valor != 1)
            		@if(!($solicitudes->isEmpty()))
					<table class="table table-bordered" id="MyTable">
					<thead>
						<tr>
							<th class="text-center">Pasajero</th>
							<th class="text-center">Movil</th>
							<th class="text-center">Destino</th>
							<th class="text-center">Tiempo de Recogida</th>
							<th class="text-center">Estatus</th>
					  	</tr>
					</thead>
					<tbody>
						
					   		@foreach($solicitudes as $solicitud)
					   		<tr>
								<td class="text-center">{{$nombre_pasajero}}</td>
					   			<td class="text-center">{{$movil_pasajero}}</td>
								<td class="text-center">{{$solicitud->distancia}}</td>
								<td class="text-center">{{$solicitud->tiempo_viaje}}</td>
								<td class="text-center">
								@if ($solicitud->estatus == '4')
								Viaje Completado
								@endif
								@if ($solicitud->estatus == '3')
								<a href="{{ url('/solicitudes/completarviaje/'.$solicitud->id.'') }}">Completar Viaje
										<a href="{{ url('/solicitudes/cancelarviaje/'.$solicitud->id.'') }}">Cancelar Viaje
								@endif
								@if ($solicitud->estatus == '2')
								Viaje Cancelado
								@endif
								</td>
							</tr>
					   		@endforeach
					   	
					</tbody>
          			</table> 
          		@endif
            @endif
        </div>
      </div>
    </div>
	</section>
 </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#destino").change(function(){
            var rand_distancia = Math.floor((91-4)*Math.random()) + 1;
            var rand_tiempo_viaje = rand_distancia * 7;
            $("#distancia").val(rand_distancia+' km');
            $("#tiempo_viaje").val(rand_tiempo_viaje+' min');
        });
    });
</script>
