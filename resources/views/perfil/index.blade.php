@extends('layouts.app')

@section('content')

<div class="container">

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
</svg>

@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
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