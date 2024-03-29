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
                                        font-weight: 700;">{{ $product->name }}</h3>

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
                <form action="{{ route('products.update', ['id' => $product->id]) }}" enctype="multipart/form-data" method="post">
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
                                <label for="inputName">Product Name</label>
                                <input type="text" name="name" id="inputName" class="form-control" value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea id="inputDescription" class="form-control" rows="10"
                                    name="description">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="prod_certificate" id="prod_certificate">
                                    <label for="inputCertificate">Certificate</label>
                                    @if (is_array($product->certificate)) 
                                        @foreach ($product->certificate as $value)
                                            <input type="text" name="certificate[]" id="inputCertificate" class="form-control mb-3" value="{{ $value }}">
                                        @endforeach
                                    @else
                                        <input type="text" name="certificate[]" id="inputCertificate" class="form-control mb-3" value="">
                                    @endif
                                </div>
                                <span class="add-certificate-icon price-icon"><i class="fas fa-plus"></i>Add</span>
                                <span class="remove-certificate-icon price-icon"><i class="fas fa-minus"></i>Remove</span>
                            </div>
                            <div class="form-group">
                                <label for="inputSupport">Support</label>
                                <textarea id="inputSupport" class="form-control" rows="10"
                                    name="support">{{ $product->support }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="parent-price">
                                    @foreach ($prices as $price)
                                    <div class="price" id="price">
                                        <input type="hidden" name="price_id[]" value="{{ $price->id }}" />
                                        <div class="prod_price">
                                            <label for="inputType">Type</label>
                                            <input name="type[]" id="inputType" class="form-control" value="{{ $price->type }}">
                                        </div>
                                        <div class="prod_price">
                                            <label for="inputPrice">Price</label>
                                            <input type="number" name="price[]" id="inputPrice" class="form-control" value="{{ $price->price }}" placeholder>
                                        </div>
                                    </div>
                                    @endforeach                             
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" name="category_id" style="width: 100%;">
                                    @foreach ($categories as $category )
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Vendor</label>
                                <select class="form-control select2" name="vendor_id" style="width: 100%;">
                                    @foreach ($vendors as $vendor )
                                    <option value="{{ $vendor->id }}" {{ $vendor->id == $product->vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="prod_name">
                                    <label for="inputImage">Add Image</label>
                                    <input type="file" name="image" id="inputImage" class="form-control border-0" value="{{ $product->img_url }}">
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Edit product" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

@section('script')
    <script src="/assets/js/admin/product.js"></script>
@endsection
