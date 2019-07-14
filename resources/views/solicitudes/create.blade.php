@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></strong>Uno de nuestros condutores Tomara tu solicitud: </div>

                    <div class="panel-body">
                        <form method="POST" action="{{ route('solicitudes.store') }}" name="formsolicitudes" role="form">
                            {{ csrf_field() }}
                            <input id="pasajero_id" type="hidden"  class="form-control" name="pasajero_id" value="{{ Auth::user()->id}}">
                            <div class="form-group{{ $errors->has('destino') ? ' has-error' : '' }}">
                                <label for="destino" class="col-md-4 control-label">Destino </label>

                                <div class="col-md-6">
                                    <input id="destino" type="text" class="form-control" name="destino" value="{{ old('destino') }}" required autofocus>
                                    @if ($errors->has('destino'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('destino') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('distancia') ? ' has-error' : '' }}">
                                <label for="distancia" class="col-md-4 control-label">Distancia Estimada</label>
    
                                <div class="col-md-6">
                                    <input id="distancia" type="text" class="form-control" readonly name="distancia" required>
    
                                     @if ($errors->has('distancia'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('distancia') }}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tiempo_viaje') ? ' has-error' : '' }}">
                                <label for="tiempo_viaje" class="col-md-4 control-label">Tiempo de Viaje</label>
    
                                <div class="col-md-6">
                                    <input id="tiempo_viaje" type="text" class="form-control" name="tiempo_viaje" readonly value="{{ old('tiempo_viaje') }}" required onkeypress= "return soloNumeros(event);">
    
                                        @if ($errors->has('tiempo_viaje'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tiempo_viaje') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Register
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#destino").change(function(){
            var rand_distancia = Math.floor((99-9)*Math.random()) + 1;
            var rand_tiempo_viaje = (rand_distancia) / 60;
            var flotante = parseFloat(rand_tiempo_viaje);
            
            var resultado = Math.round(flotante*100)/100;
            $("#distancia").val(rand_distancia+' km a 60 Kms/hora (Referencial)');
            $("#tiempo_viaje").val(resultado+' H');
        });


    });
    function soloNumeros(e)
    {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
        return /\d/.test(String.fromCharCode(keynum));
    }


</script>