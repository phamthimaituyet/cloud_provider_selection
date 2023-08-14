@extends('admin.layouts.index', ['criteria' => 'active'])

@section('title','Criterias')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Criterias</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Criterias</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
<section class="content" style="padding: 30px;">
    <form action="{{ route('criterias.store') }}" method="post">
        @csrf
        <input type="hidden" name="id" />
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Criteria</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="prod_name">
                        <label for="inputName">Criteria Name</label>
                        <input type="text" name="name" id="inputName" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea id="inputDescription" name="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <div class="prod_name">
                        <label for="inputName">Weight</label>
                        <input type="number" step="0.01" name="weight" id="inputWeight" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label>Factor Name</label>
                    <select class="form-control select2" name="parent_id" style="width: 100%;">
                        <option value=""></option>
                        @foreach ($factors as $factor )
                        <option value="{{ $factor->id }}">{{ $factor->name }}</option>
                        @endforeach
                    </select>
                </div>
            <!-- /.card-body -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Add Criteria" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
@endsection
