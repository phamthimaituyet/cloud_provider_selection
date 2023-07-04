@extends('admin.layouts.index', ['vendor' => 'active'])

@section('title','Vendor')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Vendor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Vendor</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin: 10px;">
    <a href="{{ route('vendors.create') }}" style="color: white;"><i class="fa fa-plus" aria-hidden="true"></i> Add Vendor</a>
</button>
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Vendors</h3>
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
                        <th>ID</th>
                        <th>Vendor Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendors as $vendor)
                    <tr>
                        <td>{{ $vendor->id }}</td>
                        <td>{{ $vendor->name }}</td>
                        <td>{{ $vendor->address }}</td>
                        <td>{{ $vendor->phone}}</td>
                        <td>
                            <a href="{{ route('vendors.show', ['id' => $vendor->id])}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> View
                            </a>
                            <a href="{{ route('vendors.edit', ['id' => $vendor->id])}}" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt"></i>Edit
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{ $vendor->id }}">
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
    <!-- modal  -->
    <div class="modal fade" id="deleteModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Vendor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('vendors.delete') }}" method="post">
                    @csrf
                    <input id="idProductDelete" type="hidden" name="id" value="{{ $vendor->id }}">
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

</section>
@endsection
