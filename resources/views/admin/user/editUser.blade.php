<!-- Modal Editar-->
<div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}"><i class="fas fa-user"></i> Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <h4 class="card-title d-flex align-items-center">Imagen de Usuario:
                                    <small class="ml-auto align-self-end">
                                        <span class="font-weight-light" style="align-items: right;">Seleccione nueva imagen</span>
                                    </small>
                                </h4>
                                <input type="file" name="image" id="image" class="dropify" 
                                       data-default-file="{{ asset('storage/' . $user->image) }}">
                            </div>
                        </div>

                        <div class="col-md-6">                     
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name }}" required autocomplete="name" autofocus>
        
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>
        
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}" required autocomplete="email">
        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
        
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">
        
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
        
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-check-double"></i>
                            ACtualizar
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fas fa-fw fa-ban"></i> 
                                Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>