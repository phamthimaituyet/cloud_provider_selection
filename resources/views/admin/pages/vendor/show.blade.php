@extends('admin.layouts.index', ['vendor' => 'active'])

@section('title','Vendor')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Vendors</h1>
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
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="color: red; font-size: 20px;font-weight: 700;">{{ $vendor->name }}</h3>
            </div>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="post">
                                <h3 style="color: #0D6EFD;">Description</h3>
                                <p>{{ $vendor->description }}</p>
                            </div>
                            <div class="post clearfix">
                                <h3 style="color: #0D6EFD;">Information</h3>
                                <h4>Phone</h4>
                                <p>{{ isset($vendor->phone) ? $vendor->phone : 'No information' }}</p>
                                <h4>Year</h4>
                                <p>{{ isset($vendor->year) ? $vendor->year : 'No information' }}</p>
                                <h4>Link home page</h4>
                                <a href="{{ $vendor->link }}">{{ $vendor->link }}</a>
                                <h4>Link iso</h4>
                                <a href="{{ $vendor->link_iso }}">{{ $vendor->link_iso }}</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
