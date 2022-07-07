@extends('admin.layouts.index', ['product' => 'active'])

@section('title','Product')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="color: red; 
                                    font-size: 20px;
                                    font-weight: 700;">{{$product->name}}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">

            <div>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Estimated budget</span>
                                <span class="info-box-number text-center text-muted mb-0">2300</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Total amount spent</span>
                                <span class="info-box-number text-center text-muted mb-0">2000</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Estimated project duration</span>
                                <span class="info-box-number text-center text-muted mb-0">20 <span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="post">
                            <h3 style="color: #0D6EFD;">Description</h3>
                            <p>{{$product->description}}</p>
                        </div>

                        <div class="post clearfix">
                            <h3 style="color: #0D6EFD;">Support</h3>
                            <p>{{$product->support}}</p>
                        </div>

                        <!-- <div class="post">
                            <h3 style="color: #0D6EFD;">Support</h3>
                            <p>{{$product->support}}</p>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection