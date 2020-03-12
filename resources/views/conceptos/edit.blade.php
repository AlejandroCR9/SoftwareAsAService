@extends('layouts.app', ['title' => __('Conceptos')])

@section('content')
    @include('users.partials.header', ['title' => __('Editar Conceptos')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Conceptos') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('conceptos.index') }}" class="btn btn-sm btn-primary">{{ __('Regresar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('conceptos.update',  $concepto->id) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Información') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-descripcion">{{ __('Descripcion') }}</label>
                                    <input type="text" name="descripcion" id="input-descripcion" class="form-control form-control-alternative{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripcion') }}" value="{{ old('descripcion', $concepto->descripcion) }}" required autofocus>

                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('unidad') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tipo_proyecto">{{ __('Unidad') }}</label>
                                    <input type="text" name="unidad" id="input-unidad" class="form-control form-control-alternative{{ $errors->has('unidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Unidad (Kg,Pza)') }}" value="{{ old('unidad', $concepto->unidad) }}" required autofocus>

                                    @if ($errors->has('unidad'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('unidad') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-cantidad">{{ __('Cantidad') }}</label>
                                    <input type="number" name="cantidad" id="input-cantidad" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Cantidad') }}" value="{{ old('cantidad', $concepto->cantidad) }}" max="200000" required autofocus>

                                    @if ($errors->has('cantidad'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cantidad') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('pu') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-pu">{{ __('Precio Unitario') }}</label>
                                    <input type="number" name="pu" id="input-pu" class="form-control form-control-alternative{{ $errors->has('pu') ? ' is-invalid' : '' }}" placeholder="{{ __('Precio Unitario') }}" value="{{ old('pu', $concepto->pu) }}" max="200000" required autofocus>

                                    @if ($errors->has('pu'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pu') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('area') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-area">{{ __('Area') }}</label>
                                    <input type="text" name="area" id="input-area" class="form-control form-control-alternative{{ $errors->has('area') ? ' is-invalid' : '' }}" placeholder="{{ __('Area') }}" value="{{ old('area',$concepto->area) }}" autofocus>

                                    @if ($errors->has('area'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('area') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('fk_id_proyecto') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-fk_id_proyecto">{{ __('Nombre Proyecto') }}</label>
                                        
                                    <select type="text" name="fk_id_proyecto" id="input-fk_id_proyecto" class="form-control form-control-alternative{{ $errors->has('fk_id_proyecto') ? ' is-invalid' : '' }}" placeholder="{{ __('fk_id_proyecto') }}" value="{{ old('fk_id_proyecto') }}"required>
                                    @foreach ($proyectos as $i)
                                      
                                            <option value="{{$i->id}}">{{$i->nombre_proyecto}}</option>
                                      
                                    @endforeach

                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('estado_conceptos') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-estado">{{ __('Estado') }}</label>
                                    <input type="text" name="estado_conceptos" id="input-estado_conceptos" class="form-control form-control-alternative{{ $errors->has('estado_conceptos') ? ' is-invalid' : '' }}" placeholder="{{ __('estado_conceptos') }}" value="{{ old('estado_conceptos',$concepto->estado_conceptos) }}" autofocus>

                                    @if ($errors->has('estado_conceptos'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('estado_conceptos') }}</strong>
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