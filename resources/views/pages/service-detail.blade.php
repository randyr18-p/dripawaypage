@extends('layouts.app')

@section('title', $service['title'])

@section('content')

    <x-dynamic-component :component="'services.'.$service['id']" :service="$service" />

    <x-booking-section />
@endsection
