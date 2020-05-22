@extends('layouts.app')

@section('title', 'Publicistas')

@section('content')

<h1 class="text-center">Mis articulos</h1>

@include('partials.session-status')

@auth
    <a class="btn btn-success mt-3 mb-3" href="{{route('paper.create')}}">Subir Articulo</a>
@endauth

@include('paper._listTable')

@endsection
