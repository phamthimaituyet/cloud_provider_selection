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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    @if (session('alert'))
        <div style=" color: green;
                    font-size: 18px;
                    padding: 15px;">
            <i class="fa fa-check" aria-hidden="true"></i> <b>{{ session('alert') }}</b>
        </div>
    @endif
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin: 10px;">
        <a href="{{ route('products.create') }}" style="color: white;"><i class="fa fa-plus" aria-hidden="true"></i> Add product</a>
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
                            <th style="8%;">
                                Certificate
                            </th>
                            <th style="width: 20%">
                                Category
                            </th>
                            <th style="width: 12%">
                                Address
                            </th>
                            <th style="width: 19%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                <p>{{ $product->name }}</p>
                            </td>
                            <td>
                                <p>{{ $product->certificate }}</p>
                            </td>
                            <td>
                                <p>{{ $product->category->name }}</p>
                            </td>
                            <td>
                                <p>{{ $product->vendor->name }}</p>
                            </td>
                            <td>
                                <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('products.edit', ['id' => $product->id]) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"
                                    data-id="{{ $product->id }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

    <!-- modal  -->
    <div class="modal fade" id="deleteModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('products.delete') }}" method="post">
                    @csrf
                    <input id="idProductDelete" type="hidden" name="id" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <p>Are you sure to delete?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        const buttons = document.querySelectorAll('.btn.btn-danger.btn-sm');
        buttons.forEach(button => {
            button.onclick = function() {
                const input = document.querySelector('#idProductDelete');
                input.value = button.getAttribute('data-id');
            }
        });
    </script>
@endsection
