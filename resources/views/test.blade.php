@extends('admin.layouts.index')

@section('title','test')

@include('menu', ['test' => 'active'])

@section('content')
    <p>This is my body content.</p>
@endsection