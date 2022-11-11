@extends('adminlte::page')

@section('title', 'Alquiler de Vehiculos')

@section('content')
<body>
    <div id="app">

        <example-component />

    </div>

    @vite('resources/js/app.js')
</body>
@stop




@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop