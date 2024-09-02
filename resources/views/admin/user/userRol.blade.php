@extends('layouts.admin')

@section('content_header')
    <h1><i class="fas fa-user-shield"></i> USUARIOS Y ROLES <i class="fas fa-user-tag"></i></h1>
@endsection

@section('content')
<div class="container mt-2">
    <div class="form-container">
        <div class="header-label">Nombre del Usuario:</div>
        <form>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group text-center">
                        {{-- <label for="nombre">Usuario:</label> --}}
                        <input type="text" class="form-control form-control-centered" value="{{ $user->name }}"
                            readonly>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <h3>LISTA DE PERMISOS</h3>
        <hr>
        <form action="{{ route('admin.asignar.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="row">
                    @foreach ($roles->chunk(ceil(count($roles) / 4)) as $chunk)
                        <div class="col-md-3 column-divider">
                            @foreach ($chunk as $role)
                                <div class="form-check">
                                    <input class="form-check-input role-checkbox" type="checkbox" name="roles[]"
                                        value="{{ $role->id }}" id="role{{ $role->id }}"
                                        {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role{{ $role->id }}">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mr-3"><i class="fas fa-user-tag"></i> Asignar
                Roles</button>
            <a href="{{ route('admin.asignar.index') }}" class="btn btn-dark mt-3"><i class="fas fa-arrow-left"></i>
                Regresar</a>
        </form>
    </div>
</div>
@endsection