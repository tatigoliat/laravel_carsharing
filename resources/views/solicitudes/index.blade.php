@extends('layouts.app')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="text-primary">
						<h1>{{ Auth::user()->name }}</h1>
						<h2>Pedidos en Espera</h2>

					</div>
            		@if($solicitudes->isEmpty())
            		<div>
            			<h4>No hay Solicitudes de Viajes.</h4>
            		</div>

            		<div class="btn-group">
		              <a class="btn btn-success pull-right" href="{{ url('/solicitudes/datospasajero/'.Auth::user()->pasajero_id.'') }}" role="button">Pasajero Mas reciente</a>
		            </div>
            		@endif

            		@if(!($solicitudes->isEmpty()))
					<table class="table table-bordered" id="MyTable">
					<thead>
						<tr>
							<th class="text-center">Destino <i class="fas fa-globe-europe"></i></th>
							<th class="text-center">Distancia de Viaje  <i class="fa fa-car"></i></th>
							<th class="text-center">Tiempo de Viaje</th>
							<th class="text-center">Acciones</th>
					  	</tr>
					</thead>
					<tbody>
						<tr>
					   		@foreach($solicitudes as $solicitud)
					   			<td class="text-center">{{$solicitud->destino}}</td>
								<td class="text-center">{{$solicitud->distancia}}</td>
								<td class="text-center">{{$solicitud->tiempo_viaje}}</td>
								@if ($solicitud->conductor_id == "")
									<td class="text-center"><a href="{{ url('/solicitudes/tomarviaje/'.$solicitud->id.'') }}">Tomar este viaje</td>
								@endif
								@if ($solicitud->conductor_id != "")
									<td class="text-center"><a href="{{ url('/solicitudes/edit/'.$solicitud->id.'') }}">{{$solicitud->conductor_id}}</td>
								@endif
					   		@endforeach
					   	</tr>
					</tbody>
          			</table> 
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
