@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></strong>Edita tu Auto: </div>


                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('automoviles.update', $automoviles->id) }}"  role="form">
                            {{ csrf_field() }}
                            
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group{{ $errors->has('modelo') ? ' has-error' : '' }}">
                                <label for="modelo" class="col-md-4 control-label">Modelo </label>

                                <div class="col-md-6">
                                    <input id="modelo" type="text" class="form-control" name="modelo" value="{{ $automoviles->modelo }}" required autofocus>

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
                                    <input id="placa" type="text" class="form-control" name="placa" value="{{ $automoviles->placa }}" required>
    
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
                                    <input id="plazas" type="text" class="form-control" name="plazas" value="{{ $automoviles->plazas }}"   required onkeypress= "return soloNumeros(event);">
    
                                    @if ($errors->has('plazas'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('plazas') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" value="Actualizar" class="btn btn-success">
                                   Actualizar
                                </button>
                                <a href="{{ url('/automoviles/miauto/'.Auth::user()->id.'') }}" class="btn btn-info btn-primary" >Atrás</a>
                            </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function soloNumeros(e)
    {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
        return /\d/.test(String.fromCharCode(keynum));
    }
</script>