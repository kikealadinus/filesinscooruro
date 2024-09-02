@extends('layouts.admin')

@section('content_header')
    <h1><i class="fas fa-users-cog"></i> ROLES Y PERMISOS</h1>
@endsection

@section('content')
<div class="card">
    {{-- <div class="card-header">
        <p>{{ $role->name }}</p>
    </div> --}}
    <div class="card-body">
        <div class="card">
            <div class="card-header">
                <h3>LISTA DE PERMISOS</h3>
            </div>
        </div>
        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="name{{$role->id}}" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input id="name{{$role->id}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $role->name) }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="container">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="select-all">
                            <label class="form-check-label" for="select-all">
                                <h5>Seleccionar Todos Los Permisos</h5>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($permisos->chunk(ceil(count($permisos) / 4)) as $chunk)
                        <div class="col-md-3 column-divider">
                            @foreach ($chunk as $permiso)
                                <div class="form-check">
                                    <input class="form-check-input permiso-checkbox" type="checkbox" name="permisos[]"
                                        value="{{ $permiso->id }}" id="permiso{{ $permiso->id }}"
                                        {{ $role->hasPermissionTo($permiso->id) ? 'checked' : '' }}>
                                    <b><label class="form-check-label" for="permiso{{ $permiso->id }}">
                                            {{ $permiso->name }}
                                        </label></b>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 mr-3"><i class="fas fa-people-arrows"></i> Asignar
                Permisos</button>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-dark mt-3">
                <i class="fas fa-reply"></i> Regresar
            </a>
        </form>
    </div>
</div>
@endsection

@section('css')
    
@endsection

@section('js')
<script>
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.querySelectorAll('.permiso-checkbox');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    };
</script>
@endsection