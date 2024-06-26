@extends('layouts.session')
@section('title', 'Registro')

@section('content')
    <form method="post" action="{{route('registro')}}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-center pb-2">
            <h3 class="mr-3"><strong>Portal de prestamos</strong></h3>
            <img src="img/logo-transparente.png" width="40px" height="40px" alt="">
        </div>
        <h2 class="text-center">Formulario de registro</h2>
        <div class="d-flex">
            <div class="form-group pb-2 mr-4"><input class="form-control" required name="name" type="text"
                                                     placeholder="Nombre">
            </div>
            <div class="form-group pb-2"><input class="form-control" required name="lastname" type="text"
                                                placeholder="Apellido">
            </div>
        </div>
        <div class="d-flex">
            <div class="form-group pb-2 mr-4"><input class="form-control" required name="phone" type="text"
                                                     placeholder="Teléfono">
            </div>
            <div class="form-group pb-2"><input class="form-control" required name="birthDate" type="date">
            </div>
        </div>
        <div class="d-flex col-xl-12 p-0">
            <div class="form-group pb-2 mr-4 col-xl-6 px-0">
                <select name="departamentoId" id="departamentoId"
                        class="selectpicker input_textual form-control"
                        data-live-search="true">
                    <option value="" selected disabled>Departamento
                    </option>
                    @foreach($departamentos as $departamento)
                        <option
                            value="{{$departamento->id}}">{{$departamento->nombre}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group pb-2 col-xl-5 px-0">
                <input class="form-control" required name="carnet" type="text"
                                                              placeholder="Carnet">
            </div>
        </div>
        <div class="d-flex col-xl-12 px-0 pb-4">
            <select name="carreraId" id="carreraId"
                    class="selectpicker input_textual form-control"
                    data-live-search="true">
                <option value="" selected disabled>Departamento
                </option>
                @foreach($carreras as $carrera)
                    <option
                        value="{{$carrera->id}}">{{$carrera->nombre}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group pb-2"><input class="form-control" required name="email" type="email"
                                            placeholder="Correo electrónico">
        </div>
        <div class="d-flex pb-2">
            <div class="form-group pl-0 mr-4"><input class="form-control" type="password" required name="password"
                                                     placeholder="Contraseña">
            </div>
            <div class="form-group pr-0"><input class="form-control" type="password" required
                                                name="password_confirmation" placeholder="Repetir contraseña">
            </div>
        </div>
        <div class="form-group pb-2">
            <p class="text-center mb-2">Foto de perfil</p>
            <input class="form-control" required name="image" type="file">
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-primario text-white" type="submit">Registrarse
            </button>
        </div>
        <p class="text-center">¿Ya tienes una cuenta? <a href="{{route('login')}}" class="color-secundario ">Inicia
                sesión.</a></p>
    </form>
@endsection
