@extends('layouts.app')

@section('content')
<div class="container">


{{-- CRUD | Crear --}}
<form action=" {{url('/perfil')}} " method="post" enctype="multipart/form-data">
    @csrf
    @include('perfil.form',['modo'=>'Crear'])
    
</form>

</div>
@endsection