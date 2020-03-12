@extends('layouts.app', ['title' => __('Proyectos')])

@section('content')
    @include('users.partials.header', ['title' => __('Agregar Proyecto')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Proyectos') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('proyectos.index') }}" class="btn btn-sm btn-primary">{{ __('Regresar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('proyectos.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Información') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nombre_proyecto') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nombre_proyecto">{{ __('Nombre') }}</label>
                                    <input type="text" name="nombre_proyecto" id="input-nombre_proyecto" class="form-control form-control-alternative{{ $errors->has('nombre_proyecto') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" value="{{ old('nombre_proyecto') }}" required autofocus>

                                    @if ($errors->has('nombre_proyecto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombre_proyecto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('tipo_proyecto') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tipo_proyecto">{{ __('Tipo Proyecto') }}</label>
                                        
                                    <select type="text" name="tipo_proyecto" id="input-tipo_proyecto" class="form-control form-control-alternative{{ $errors->has('tipo_proyecto') ? ' is-invalid' : '' }}" placeholder="{{ __('tipo proyecto') }}" value="{{ old('tipo_proyecto') }}"required>
                                        <option value="Residenciales">Residenciales</option>
                                        <option value="Edificacion vertical">Edificacion vertical</option> 
                                        <option value=" Industriales"> Industriales</option> 
                                        <option value="Especiales">Especiales</option> 
                                        <option value="Urbanos">Urbanos</option>        
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('ubicacion') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-ubicacion">{{ __('Ubicacion') }}</label>
                                    <input type="text" name="ubicacion" id="input-ubicacion" class="form-control form-control-alternative{{ $errors->has('ubicacion') ? ' is-invalid' : '' }}" placeholder="{{ __('ubicacion') }}" value="{{ old('ubicacion') }}" maxlength="20" required autofocus>

                                    @if ($errors->has('ubicacion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ubicacion') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-estado">{{ __('Estado') }}</label>
                                        
                                    <select type="text" name="estado" id="input-estado" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('estado') }}" value="{{ old('estado') }}"required>
                                        <option value="En espera">En espera</option> 
                                        <option value="En proceso">En proceso</option>
                                        <option value="Completado">Completado</option>    
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('fecha_inicio') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-fecha_inicio">{{ __('Fecha Inicio') }}</label>
                                    <input type="date" name="fecha_inicio" id="input-fecha_inicio" class="form-control form-control-alternative{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" placeholder="{{ __('fecha_inicio') }}" value="{{ old('fecha_inicio') }}" autofocus>

                                    @if ($errors->has('fecha_inicio'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('fecha_fin') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-fecha_fin">{{ __('Fecha Fin') }}</label>
                                    <input type="date" name="fecha_fin" id="input-fecha_fin" class="form-control form-control-alternative{{ $errors->has('fecha_fin') ? ' is-invalid' : '' }}" placeholder="{{ __('fecha_fin') }}" value="{{ old('fecha_fin') }}" autofocus>

                                    @if ($errors->has('fecha_fin'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fecha_fin') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('fk_id_lider') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-fk_id_lider">{{ __('Lider Proyecto') }}</label>
                                        
                                    <select type="text" name="fk_id_lider" id="input-fk_id_lider" class="form-control form-control-alternative{{ $errors->has('fk_id_lider') ? ' is-invalid' : '' }}" placeholder="{{ __('fk_id_lider') }}" value="{{ old('fk_id_lider') }}"required>
                                    @foreach ($info as $i)
                                        <option value="{{$i->id}}">{{$i->nombre." ".$i->apellidos}}</option>   
                                    @endforeach

                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('fk_id_cliente') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-fk_id_cliente">{{ __('Clientes') }}</label>
                                        
                                    <select type="text" name="fk_id_cliente" id="input-fk_id_cliente" class="form-control form-control-alternative{{ $errors->has('fk_id_cliente') ? ' is-invalid' : '' }}" placeholder="{{ __('fk_id_cliente') }}" value="{{ old('fk_id_cliente') }}"required>
                                    @foreach ($clientes as $c)
                                        <option value="{{$c->id}}">{{$c->nombre_cliente}}</option>   
                                    @endforeach

                                    </select>
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