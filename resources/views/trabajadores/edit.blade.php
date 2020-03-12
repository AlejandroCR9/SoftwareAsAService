@extends('layouts.app', ['title' => __('Trabajador')])

@section('content')
    @include('users.partials.header', ['title' => __('Editar Tabajador')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Trabajadores') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('trabajadores.index') }}" class="btn btn-sm btn-primary">{{ __('Regresar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('trabajadores.update', $trabajador, $trabajador->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Información') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nombre">{{ __('Nombre') }}</label>
                                    <input type="text" name="nombre" id="input-nombre" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" value="{{ old('nombre', $trabajador->nombre) }}" required autofocus>

                                    @if ($errors->has('nombre'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('apellidos') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-apellidos">{{ __('Apellidos') }}</label>
                                    <input type="text" name="apellidos" id="input-apellidos" class="form-control form-control-alternative{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellidos') }}" value="{{ old('apellidos',$trabajador->apellidos) }}" required autofocus>

                                    @if ($errors->has('apellidos'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('apellidos') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-telefono">{{ __('Telefono') }}</label>
                                    <input type="text" name="telefono" id="input-telefono" class="form-control form-control-alternative{{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefono') }}" value="{{ old('telefono',$trabajador->telefono) }}" required autofocus>

                                    @if ($errors->has('telefono'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('domicilio') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-domicilio">{{ __('Domicilo') }}</label>
                                    <input type="text" name="domicilio" id="input-domicilio" class="form-control form-control-alternative{{ $errors->has('domicilio') ? ' is-invalid' : '' }}" placeholder="{{ __('Domicilio') }}" value="{{ old('domicilio',$trabajador->domicilio) }}" required autofocus>

                                    @if ($errors->has('domicilio'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('domicilio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                               
                                <div class="form-group{{ $errors->has('puesto') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-puesto">{{ __('Puesto') }}</label>
                                    <input type="text" name="puesto" id="input-puesto" class="form-control form-control-alternative{{ $errors->has('puesto') ? ' is-invalid' : '' }}" placeholder="{{ __('Puesto') }}" value="{{ old('puesto',$trabajador->puesto) }}" required autofocus>

                                    @if ($errors->has('puesto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('puesto') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection