@extends('layouts.app', ['title' => __('Proveedores')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Proveedores') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('proveedores.create')}}" class="btn btn-sm btn-primary">{{ __('Nuevo Proveedor') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Nombre') }}</th>
                                    <th scope="col">{{ __('Telefono') }}</th>
                                    <th scope="col">{{ __('Representante') }}</th>
                                    <th scope="col">{{ __('Domicilio') }}</th>
                                    <th scope="col">{{ __('Correo') }}</th>
                                    <th scope="col">{{ __('Creado') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedor)
                                    <tr>
                                        <td>{{ $proveedor->nombre }}</td>
                                        <td>{{ $proveedor->telefono }}</td>
                                        <td>{{ $proveedor->representante }}</td>
                                        <td>{{ $proveedor->domicilio}}</td>
                                        <td>{{ $proveedor->correo}}</td>
                                        <td>{{ $proveedor->created_at->format('d/m/Y')}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                    <form action="{{ route('proveedores.destroy', $proveedor->id ) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                            
                                                        <a class="dropdown-item" href="{{ route('proveedores.edit', $proveedor->id) }}">{{ __('Editar') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("¿Estás seguro que deseas borrarlo?") }}') ? this.parentElement.submit() : ''">
                                                        {{ __('Borrar') }}
                                                        </button>
                                                    </form>    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection