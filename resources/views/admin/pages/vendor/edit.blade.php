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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Vendors</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
<section class="content" style="padding: 30px;">
    <form action="{{ route('vendors.update') }}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $vendor->id }}" />
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Vendor</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="prod_name">
                        <label for="inputName">Vendor Name</label>
                        <input type="text" name="name" id="inputName" class="form-control" value="{{ $vendor->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="prod_name">
                        <label for="inputName">Address</label>
                        <input type="text" name="address" id="inputAddress" class="form-control" value="{{ $vendor->address }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Vendor Description</label>
                    <textarea id="inputDescription" name="description" class="form-control" rows="4">{{ $vendor->description }}</textarea>
                </div>
                <div class="form-group">
                    <div class="prod_name">
                        <label for="inputCertificate">Link iso</label>
                        <input type="text" name="link_iso" id="inputLinkIso" class="form-control" value="{{ $vendor->link_iso }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="prod_name">
                        <label for="inputCertificate">Link home page</label>
                        <input type="text" name="link" id="inputLinkHome" class="form-control" value="{{ $vendor->link }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="prod_name">
                        <label for="inputImage">Add Image</label>
                        <input type="file" name="image" id="inputImage" class="form-control border-0">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Edit Vendor" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
@endsection
