@extends('layouts.admin')

@section('content_header')
    <h1><i class="fas fa-users"></i> LISTA DE LOS USUARIOS</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    {{-- <h3 class="card-title"><b>Usuarios Registrados</b></h3> --}}
                    <div class="card-tools">
                        @can('admin.user.create')
                            @include('admin.user.createUser')
                        @endcan
                    </div>
                </div>
                <div class="card-body" style="display: block;">

                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Img</th>
                                <th>Nombre del Usuario</th>
                                <th>E-mail</th>
                                <th>Roles</th>
                                <th style="text-align: center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 0; ?>
                            @foreach ($users as $user)
                            <tr>
                                <td><?php echo $contador = $contador + 1; ?></td>
                                <td>
                                    @if ($user->image && Storage::disk('public')->exists($user->image))
                                        <img src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}'s image" class="img-thumbnail rounded-circle" style="width: 40px; height: 40px;">
                                    @else
                                        <img src="{{ Storage::url('usuario_imagen/user_default.png') }}" alt="Default Image" class="img-thumbnail rounded-circle" style="width: 40px; height: 40px;">
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{!! $user->email !!}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        
                                        @can('admin.asignar.edit')
                                            <a href="{{route('admin.asignar.edit', $user)}}" class="btn btn-warning btn-sm mr-2"
                                                data-toggle="tooltip" data-placement="bottom" title="Asignar Rol">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endcan
                                        
                                        @can('admin.user.edit')
                                            <a href="#editUserModal{{$user->id}}" data-toggle="modal">
                                                <button type="button" class="btn btn-success btn-sm mr-2" data-toggle="tooltip"     data-placement="bottom" title="Editar Usuario">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                            </a> 
                                            @include('admin.user.editUser')
                                        @endcan
                                        
                                        @can('admin.user.destroy')
                                            <form style="display: inline" action="{{ route('admin.asignar.destroy', $user->id) }}"
                                                method="POST" class="formEliminar">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-danger btn-sm btn-delete" data-toggle="tooltip"
                                                    data-placement="bottom" data-original-title="Elimiar Usuario">
                                                    <i class="fas fa-trash-alt"></i>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach((button) => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('form');

                    Swal.fire({
                        title: '¿Estás seguro de eliminar?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminarlo!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    
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
    </script>
@endsection