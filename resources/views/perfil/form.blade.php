
<h1>{{ $modo }} perfil</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach( $errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    

@endif


<div class="form-group">
    <label for="fotoPerfil">Foto de Perfil</label>
    @if(isset($perfil->fotoPerfil))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$perfil->fotoPerfil }}" width="100" alt="">
    @endif
    <br>
    <input class="form-control" type="file" name="fotoPerfil" id="fotoPerfil">
    <br>
</div>

<div class="form-group">
    <label for="fotoLicencia">Foto de Licencia</label>
    @if(isset($perfil->fotoLicencia))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$perfil->fotoLicencia }}" width="100" alt="">
    @endif
    <br>
    <input class="form-control" type="file" name="fotoLicencia" id="fotoLicencia">
    <br>
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
    <br>
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
