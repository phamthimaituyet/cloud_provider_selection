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
<section class="content" style="padding: 30px;">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Product</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="head" style="display: flex;">
                    <div class="prod_name" style="width: 70%; padding-right: 10px;">
                        <label for="inputName">Product Name</label>
                        <input type="text" id="inputName" class="form-control">
                    </div>
                    <div class="prod_price" style="width: 30%;">
                        <label for="inputName">Price</label>
                        <input type="text" id="inputName" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputDescription">Product Description</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="inputDescription">Product Support</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" style="width: 100%;">
                    @foreach ($categories as $category )
                        <option selected="selected">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputStatus">Vendor</label>
                <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
    </div>
</section>
@endsection