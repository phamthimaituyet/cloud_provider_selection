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
                        <th>
                            ID
                        </th>
                        <th>
                            Vendor Name
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($vendors as $vendor){ ?>
                    <tr>
                        <td>
                            {{$vendor->id}}
                        </td>
                        <td>
                            {{$vendor->name}}
                        </td>
                        <td>
                            {{$vendor->address}}
                        </td>
                        <td>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>
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