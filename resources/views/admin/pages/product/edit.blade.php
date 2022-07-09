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
@if (session('thongbao'))
<div class="alert alert-success">
    {{session('thongbao')}}
</div>
@endif
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
            <form action="{{route('product.new.post', ['id' => $product->id])}}" method="post">
                @csrf
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea id="inputDescription" class="form-control" rows="10" name="description">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputSupport">Support</label>
                            <textarea id="inputSupport" class="form-control" rows="10" name="description">{{$product->support}}</textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Edit user" class="btn btn-success float-right">
                    </div>
                </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection