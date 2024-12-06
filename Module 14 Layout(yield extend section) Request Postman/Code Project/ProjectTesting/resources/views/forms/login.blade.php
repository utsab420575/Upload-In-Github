@extends('layouts.app')
@section('title','Login Page')
@section('content')
    <form action="{{route('login-submit')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="email" name="email" id="email">
        <label for="password" >Password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Submit</button>
    </form>
@endsection

@section('extra-footer-content')
<p>Contact us: support@example.com</p>
@endsection
