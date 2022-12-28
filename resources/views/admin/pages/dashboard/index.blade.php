<?php $array = [$users->count(), $products->count(), $categories->count(), $criterias->count()] ?>

@extends('admin.layouts.index', ['dashboard' => 'active'])

@section('title','Dashboard')

@section('content_header')
    @if (session('alert'))
        <div style=" color: green;
                    font-size: 18px;
                    padding: 15px;">
            <i class="fa fa-check" aria-hidden="true"></i> <b>{{ session('alert') }}</b>
        </div>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="card-body">
        <table class="table table-condensed table-striped table-hover">
            <thead>
                <tr>
                    <th class="shrink model-name" style=" width: 25%;">
                        Model name
                    </th>
                    <th class="shrink last-created" style=" width: 20%;">
                        Last created
                    </th>
                    <th class="records" style=" width: 40%;">
                        Records
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd link active_storage_attachment_links">
                    <td>
                        <span class="show">
                            <a href="{{ route('users.index') }}">User</a>
                        </span>
                    </td>
                    <td>
                        {{ $users->first()->created_at }}
                    </td>
                    <td>
                        <div class="progress" style="margin-bottom:0px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                role="progressbar" style="width: <?= getPercent($users->count(), $array) ?>%">
                                {{ $users->count() }}
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="odd link active_storage_attachment_links">
                    <td>
                        <span class="show">
                            <a href="{{ route('categories.index') }}">Category</a>
                        </span>
                    </td>
                    <td>
                        {{ $categories->first()->created_at }}
                    </td>
                    <td>
                        <div class="progress" style="margin-bottom:0px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                role="progressbar" style="width: <?= getPercent($categories->count(), $array) ?>%">
                                {{ $categories->count() }}
                            </div>
                        </div>
                    </td>

                </tr>
                <tr class="odd link active_storage_attachment_links">
                    <td>
                        <span class="show">
                            <a href="{{ route('products.index') }}">Products</a>
                        </span>
                    </td>
                    <td>
                        {{ $products->first()->created_at }}
                    </td>
                    <td>
                        <div class="progress" style="margin-bottom:0px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: <?= getPercent($products->count(), $array) ?>%">
                                {{ $products->count() }}
                            </div>
                        </div>
                    </td>

                </tr>
                <tr class="odd link active_storage_attachment_links">
                    <td>
                        <span class="show">
                            <a href="{{route('criteria')}}">Criterias</a>
                        </span>
                    </td>
                    <td>
                        {{$products->first()->created_at}}
                    </td>
                    <td>
                        <div class="progress" style="margin-bottom:0px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
                                style="width: <?= getPercent($criterias->count(), $array) ?>%">
                                {{$criterias->count()}}
                            </div>
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
