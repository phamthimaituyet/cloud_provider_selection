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
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->nameRole($user->role)}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <a href="{{route('user.view', ['id' => $user->id])}}" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{route('user.edit', ['id' => $user->id])}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"
                        data-id="{{$user->id}}">
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

<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('user.delete')}}" method="post">
                @csrf
                <input id="idUser" type="hidden" name="id" value="">
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
            const input = document.querySelector('#idUser');
            input.value = button.getAttribute('data-id');
        }
    })
</script>
@endsection