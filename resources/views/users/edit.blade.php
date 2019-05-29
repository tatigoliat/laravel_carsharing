@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">

        	<div class="text-primary">
            <h1>{{ Auth::user()->name }}</h1>
         </div>
         <div class="pull-left">
         	<p>Esta registrado como <strong>{{ Auth::user()->perfil }}</strong></p>
         </div>

         @if (count($errors) > 0)
         <div class="alert alert-danger">
         	<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">{{$users->name}}</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('users.update',$users->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="email" id="email" class="form-control input-sm" placeholder="email" value="{{$users->email}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="perfil" id="perfil" class="form-control input-sm" placeholder="perfil" value="{{$users->perfil}}">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="carrera" id="carrera" class="form-control input-sm" placeholder="carrera" value="{{$users->carrera_id}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="telefono" value="{{$users->telefono}}">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('users.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
							</div>
						</form>
					</div>
				</div>
			</div>
	        	
        </div>
      </div>
   </div>
</div>
@endsection