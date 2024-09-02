@extends('layouts.admin')

@section('content_header')
<h1><i class="fas fa-user-lock"></i> LISTA DE PERMISOS</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="card-tools">
                        @can('admin.permisos.create')
                            <button type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#registroModal">
                                <i class="fas fa-fw fa-user"></i> Nuevo Permiso
                            </button>
                        @endcan
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre del Permiso</th>
                                <th>Descripción</th>
                                <th style="text-align: center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 0; ?>
                            @foreach ($permisos as $permiso)
                                <tr>
                                    <td><?php echo $contador = $contador + 1; ?></td>
                                    <td>{{ $permiso->name }}</td>
                                    <td>{{ $permiso->description }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('admin.permisos.edit')
                                            <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" 
                                                    data-target="#editModal{{$permiso->id}}" data-tooltip="tooltip" 
                                                    data-placement="bottom" title="Editar Permiso">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            @endcan
                                            
                                            @can('admin.permisos.destroy')
                                                <form action="{{route('admin.permisos.destroy', $permiso->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit"
                                                        onclick="return confirm('¿Esta seguro de eliminar este registro?')"
                                                        class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" data-original-title="Elimiar Usuario"><i class="fas fa-trash-restore-alt"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Registro Nuevo Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.permisos.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" style="resize: none;" rows="3" maxlength="1000">{{ old('description') }}</textarea>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-check-double"></i>
                                Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fas fa-fw fa-ban"></i> Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ( $permisos as $permiso)
    <!-- Modal de Edición -->
    <div class="modal fade" id="editModal{{$permiso->id}}" tabindex="-1" aria-labelledby="editModalLabel{{$permiso->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{$permiso->id}}"><i class="fas fa-edit"></i> Editar Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.permisos.update', $permiso->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name{{$permiso->id}}" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name{{$permiso->id}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $permiso->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description{{$permiso->id}}" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description{{$permiso->id}}" name="description" style="resize: none;" rows="3" maxlength="1000">{{ old('description', $permiso->description) }}</textarea>
                                
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-check-double"></i> Actualizar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-ban"></i> Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('css')
    <!-- JQuery -->
    <script src="{{ asset('/plugins/jquery/jquery.js') }}"></script>
    <!-- datetables-->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- dropify -->
    <link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.min.css') }}">
    <!-- sweetlaert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('js')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- dropify -->
    <script src="{{ asset('dropify/dist/js/dropify.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>

    @if ($message = Session::get('mensaje'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ $message }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if ($error = Session::get('error'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "{{ $error }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
                    "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [{
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons: [{
                            text: 'Copiar',
                            extend: 'copy',
                        }, {
                            extend: 'pdf'
                        }, {
                            extend: 'csv'
                        }, {
                            extend: 'excel'
                        }, {
                            text: 'Imprimir',
                            extend: 'print'
                        }]
                    },
                    {
                        extend: 'colvis',
                        text: 'Visor de columnas',
                        collectionLayout: 'fixed three-column'
                    }
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        
        
        $('[data-toggle="modal"]').on('click', function() {
            console.log('Abriendo modal:', $(this).data('target'));
        });
    </script>
@endsection