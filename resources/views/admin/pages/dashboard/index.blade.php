<?php $array = [$users->count(), $products->count(), $categories->count(), $criterias->count()] ?>

@extends('admin.layouts.index', ['dashboard' => 'active'])

@section('title','Dashboard')

@section('content_header')
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
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $products->count() }}</h3>
              <p>New Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('products.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $categories->count() }}</h3>
              <p>New Category</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $users->count() }}</h3>
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $criterias->count() }}</h3>
              <p>Criterias</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('criterias.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
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
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
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
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
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
                            <a href="{{ route('criterias.index') }}">Criterias</a>
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
</div>
@endsection
