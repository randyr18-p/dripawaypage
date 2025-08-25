@extends('layouts.app')

@section('title', $service['title'])

@section('content')

    <x-services.{{$service['id']}} :service="$service" />

    <x-booking-section />
@endsection
