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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin: 10px;">
    <a href="{{route('product.new')}}" style="color: white;"><i class="fa fa-plus" aria-hidden="true"></i> Add product</a>
</button>

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Products</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 40%">
                            Products Name
                        </th>
                        <th style="width: 20%">
                            Category
                        </th>
                        <th style="width: 12%">
                            Address
                        </th>
                        <th style="width: 8%">
                            Price
                        </th>
                        <th style="width: 17%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product){ ?>
                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <p>{{$product->name}}</p>
                        </td>
                        <td>
                            <p>{{$product->category_id}}</p>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection