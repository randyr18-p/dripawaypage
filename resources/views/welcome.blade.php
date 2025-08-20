<!-- Archivo: resources/views/welcome.blade.php -->

@extends('layouts.app')

<!-- Definimos el título específico para la página de bienvenida.
     Esto reemplazará el valor por defecto en la plantilla principal. -->
@section('title', 'DripAway')

@section('content')

    @include('pages.home', ['faqsHome' => $faqsHome])

@endsection
