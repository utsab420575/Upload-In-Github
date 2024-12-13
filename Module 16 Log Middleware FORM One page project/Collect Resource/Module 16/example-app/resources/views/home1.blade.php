@extends('layout.app')

@section('content')
<h1>HOME PAGE 1</h1>
@include('components.NavBar')
@include('components.Hero')

@include('components.loop')


@include('components.List')
@include('components.Footer')
@endsection

