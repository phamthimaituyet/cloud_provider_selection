@extends('admin.layouts.index', ['user' => 'active'])

@section('title','user')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                {{ $err }}
                <br>
            @endforeach
        </div>
    @endif
    @if (session('alert'))
        <div style=" color: green;
                    font-size: 18px;
                    padding: 15px;">
            <i class="fa fa-check" aria-hidden="true"></i> <b>{{ session('alert') }}</b>
        </div>
    @endif
    <section class="content" style="padding: 30px;">
        <form action="{{ route('users.update',  ['id' => $user->id]) }}" method="post">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Edit</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" id="inputName" class="form-control" value="{{ $user->name }}" name="name"/>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" id="inputEmail" class="form-control" value="{{ $user->email }}" name="email" disabled />
                </div>
                <div class="form-group">
                    <label for="inputRole">Role</label>
                    <select class="form-control custom-select" name="role">
                    <option <?= $user->role == 1 ? 'selected' : ''; ?> value="1">Admin</option> 
                    <option <?= $user->role == 2 ? 'selected' : ''; ?> value="2">User</option>
                    </select>
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
    </section>
@endsection
