@extends('layouts.app', ['title' => __('Historial de Cambios')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Historial de Cambios') }}</h3>
                            </div>
                            <!--<div class="col-4 text-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-primary">{{ __('Nuevo Cliente') }}</a>
                            </div>-->
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
                                    <th scope="col">{{ __('Nombre Usuario') }}</th>
                                    <th scope="col">{{ __('Acción') }}</th>
                                    <th scope="col">{{ __('Lugar Afectado') }}</th>
                                    <th scope="col">{{ __('Hecho') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hist as $h)
                                    <tr>
                                        <td>{{ $h->name }}</td>
                                        <td>{{ $h->accion}}</td>
                                        <td>{{ $h->lugar}}</td>
                                        <td>{{ $h->created_at->format('d/m/Y')}}</td>
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