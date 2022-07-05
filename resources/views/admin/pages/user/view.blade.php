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
<div class="fieldset">
    <h4>
        Basic info
    </h4>
    <div class="list-group">
        <div class="list-group-item border-0 string_type email_field">
            <div class="card">
                <h5 class="card-header bg-light">
                    Email
                </h5>
                <div class="card-body">
                    {{$user->email}}
                </div>
            </div>
        </div>
        <div class="list-group-item border-0 string_type name_field">
            <div class="card">
                <h5 class="card-header bg-light">
                    Name
                </h5>
                <div class="card-body">
                    Tuyết
                </div>
            </div>
        </div>
        <!-- <div class="list-group-item border-0 string_type birth_field">
            <div class="card">
                <h5 class="card-header bg-light">
                    Birth
                </h5>
                <div class="card-body">
                    2022-05-11
                </div>
            </div>
        </div>
        <div class="list-group-item border-0 boolean_type status_field">
            <div class="card">
                <h5 class="card-header bg-light">
                    Status
                </h5>
                <div class="card-body">
                    <span class="label label-success"><span class="fas fa-check"></span></span>
                </div>
            </div>
        </div>
        <div class="list-group-item border-0 has_many_association_type posts_field">
            <div class="card">
                <h5 class="card-header bg-light">
                    Posts
                </h5>
                <div class="card-body">
                    -
                </div>
            </div>
        </div>
        <div class="list-group-item border-0 has_many_association_type likes_field">
            <div class="card">
                <h5 class="card-header bg-light">
                    Likes
                </h5>
                <div class="card-body">
                    -
                </div>
            </div>
        </div>
        <div class="list-group-item border-0 has_many_association_type group_members_field">
            <div class="card">
                <h5 class="card-header bg-light">
                    Group members
                </h5>
                <div class="card-body">
                    <a href="/admin/group_member/3">GroupMember #3</a> and <a href="/admin/group_member/17">GroupMember
                        #17</a>
                </div>
            </div>
        </div> -->

    </div>

</div>
@endsection