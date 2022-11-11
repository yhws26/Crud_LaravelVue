@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<a href="{{ url('perfil/create')}}" class="btn btn-success">Registrar nuevo perfil</a>
<br/>
<br/>
{{-- CRUD | Mostrar --}}
<table class="table table-light">

    <thead class="thread-light">
        <tr>
            <th>#</th>
            <th>Foto de Perfil</th>
            <th>Foto de Licencia</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Fecha de Nacimiento</th>
            <th>Numero de Licencia</th>
            <th>Fecha de Vencimiento</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach( $perfil as $usuario )
        <tr>
            <td> {{ $usuario->id }} </td>

            <td> 
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$usuario->fotoPerfil }}" width="100" alt="">
            </td>

            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$usuario->fotoLicencia }}" width="100" alt="">
            </td>

            <td> {{ $usuario->Nombre }} </td>
            <td> {{ $usuario->Apellido }} </td>
            <td> {{ $usuario->Cedula }} </td>
            <td> {{ $usuario->fechaNacimiento }} </td>
            <td> {{ $usuario->numeroLicencia }} </td>
            <td> {{ $usuario->fechaVencimiento }} </td>
            <td> 
            
            {{-- CRUD | Editar --}}
            <a href="{{ url('/perfil/'.$usuario->id.'/edit') }}" class="btn btn-warning">
                Editar
            </a>    
                
            | 

            {{-- CRUD | Borrar --}}
            <form action="{{ url('/perfil/'.$usuario->id ) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick="return confirm('Quieres borrar?')" 
                value="Borrar">
            
            </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{!! $perfil->links() !!}
</div>
@endsection