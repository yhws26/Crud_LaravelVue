@extends('adminlte::page')

@section('title', 'Alquiler de Vehiculos')

@section('content')
<div class="container">


{{-- CRUD | Editar --}}
<form action=" {{url('/perfil/'.$perfil->id)}} " method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('perfil.form',['modo'=>'Editar'])

</form>

</div>
@endsection



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop