
<h1>{{ $modo }} perfil</h1>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul class="d-block">
        @foreach( $errors->all() as $error)
            <li style="list-style: none"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" 
                aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    

@endif


<div class="form-group">
    <label for="fotoPerfil">Foto de Perfil</label>
    @if(isset($perfil->fotoPerfil))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$perfil->fotoPerfil }}" width="100" alt="">
    @endif
    <input class="form-control" type="file" name="fotoPerfil" id="fotoPerfil">
</div>

<div class="form-group">
    <label for="fotoLicencia">Foto de Licencia</label>
    @if(isset($perfil->fotoLicencia))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$perfil->fotoLicencia }}" width="100" alt="">
    @endif
    <input class="form-control" type="file" name="fotoLicencia" id="fotoLicencia">
</div>

<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input class="form-control" type="text" name="Nombre" value="{{isset($perfil->Nombre)?$perfil->Nombre:old('Nombre')}}" id="Nombre">
</div>

<div class="form-group">
    <label for="Apellido">Apellido</label>
    <input class="form-control" type="text" name="Apellido" value="{{isset($perfil->Apellido)?$perfil->Apellido:old('Apellido')}}" id="Apellido">
</div>

<div class="form-group">
    <label for="Cedula">Cedula</label>
    <input class="form-control" type="number" name="Cedula" value="{{isset($perfil->Cedula)?$perfil->Cedula:old('Cedula')}}" id="Cedula">
</div>

<div class="form-group">
    <label for="fechaNacimiento">Fecha de Nacimiento</label>
    <input class="form-control" type="date" name="fechaNacimiento" value="{{isset($perfil->fechaNacimiento)?$perfil->fechaNacimiento:old('fechaNacimiento')}}" id="fechaNacimiento"> 
</div>

<div class="form-group">
    <label for="numeroLicencia">Numero de Licencia</label>
    <input class="form-control" type="number" name="numeroLicencia" value="{{isset($perfil->numeroLicencia)?$perfil->numeroLicencia:old('numeroLicencia')}}" id="numeroLicencia">
</div>

<div class="form-group">
    <label for="fechaVencimiento">Fecha de Vencimiento</label>
    <input class="form-control" type="date" name="fechaVencimiento" value="{{isset($perfil->fechaVencimiento)?$perfil->fechaVencimiento:old('fechaVencimiento')}}" id="fechaVencimiento">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">
<a class="btn btn-primary" href="{{ url('perfil/')}}">Regresar</a>
