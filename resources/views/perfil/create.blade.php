@extends('adminlte::page')

@section('title', 'Alquiler de Vehiculos')

@section('content')

<div class="container">

{{-- CRUD | Crear --}}
<form action=" {{url('/perfil')}} " method="post" enctype="multipart/form-data">
    @csrf
    @include('perfil.form',['modo'=>'Crear'])
    
</form>

</div>
@endsection



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop