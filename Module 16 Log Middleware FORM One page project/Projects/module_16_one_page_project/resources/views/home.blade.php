@extends('layouts.app')
@section('title', 'Home Page Utsab') {{-- Define the title for this page --}}

@section('content')
@include('components.hero',['demo_content'=>"Dost Hi I Am Utsab"])
@include('components.howWeDo')
@include('components.pricing')
@include('components.team')
@include('components.newslatter')
@endsection
