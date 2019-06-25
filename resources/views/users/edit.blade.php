@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Editando Perfil</h1>
				<h2 class="panel-title">{{$users->email}}</h2>
			</div>
			<div class="panel-body">

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

								
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('users.update',$users->id) }}"  role="form">
							{{ csrf_field() }}

							<input name="_method" type="hidden" value="PATCH">

							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                               <input type="text" name="email" id="name" class="form-control input-sm" placeholder="name" value="{{$users->name}}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="col-md-4 control-label">Telefono</label>

                            <div class="col-md-6">
                                <input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="telefono" value="{{$users->telefono}}" required>

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}">
                            <label for="perfil" class="col-md-4 control-label">Tipo</label>
                            <div class="col-md-6">
                                <select id="perfil" type="text" class="form-control" name="perfil" required>
                                    <option value="Conductor"> {{$users->perfil}}</option>
                                    @if (($users->perfil) == "Conductor")
                                    <option value='Pasajero'>Pasajero</option>
                                    @endif
                                    @if ($users->perfil == "Pasajero")
                                    <option value= 'Conductor'>Conductor</option>
                                    @endif
                                </select>
                                @if ($errors->has('perfil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('perfil') }}</strong>
                                    </span>
                                @endif
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