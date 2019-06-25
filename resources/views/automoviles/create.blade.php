@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registra tu Auto</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('automovil.create') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('modelo') ? ' has-error' : '' }}">
                            <label for="modelo" class="col-md-4 control-label">Modelo </label>

                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control" name="modelo" value="{{ old('modelo') }}" required autofocus>

                                @if ($errors->has('modelo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modelo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('placa') ? ' has-error' : '' }}">
                            <label for="placa" class="col-md-4 control-label">Placa</label>

                            <div class="col-md-6">
                                <input id="placa" type="text" class="form-control" name="placa" value="{{ old('placa') }}" required>

                                @if ($errors->has('placa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('placa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('plazas') ? ' has-error' : '' }}">
                            <label for="plazas" class="col-md-4 control-label">Plazas Disponibles</label>

                            <div class="col-md-6">
                                <input id="plazas" type="text" class="form-control" name="plazas" value="{{ old('plazas') }}" required>

                                @if ($errors->has('plazas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plazas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
