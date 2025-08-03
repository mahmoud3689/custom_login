@extends('layout')
@section('title','home page')
@section('content')
@auth
{{auth()->user()->name}}
@endauth
@endsection