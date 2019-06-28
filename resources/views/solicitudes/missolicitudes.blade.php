@extends('layouts.app')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="text-primary">
						<h1>{{ Auth::user()->name }}</h1>
						<h2>Mis Pedidos</h2>

					</div>
            		@if($solicitudes->isEmpty())
            		<div>
            			<h4>No tiene solicitudes hechas</h4>
            		</div>
            		<div class="pull-right">
            		    <div class="btn-group">
            		        <a class="btn btn-success pull-right" href="{{ url('/solicitudes/create/'.Auth::user()->id.'') }}" role="button">Solicitar un Auto</a>
            		    </div>
            		</div>
            		@endif

            		@if(!($solicitudes->isEmpty()))
					<table class="table table-bordered" id="MyTable">
					<thead>
						<tr>
							<th class="text-center">Destino</th>
							<th class="text-center">Distancia</th>
							<th class="text-center">Tiempo de Viaje</th>
							<th class="text-center">Conductor</th>
					  	</tr>
					</thead>
					<tbody>
						<tr>
					   		@foreach($solicitudes as $solicitud)
								
					   			<td class="text-center">{{$solicitud->destino}}</td>
								<td class="text-center">{{$solicitud->distancia}}</td>
								<td class="text-center">{{$solicitud->tiempo_viaje}}</td>
								@if ($solicitud->conductor_id == "")
									<td class="text-center"> Sin Conductor</td>
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
