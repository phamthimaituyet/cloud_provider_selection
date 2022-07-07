@extends('admin.layouts.index', ['category' => 'active'])

@section('title','Category')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
@if (session('thongbao'))
<div style=" color: green;
            font-size: 18px;
            padding: 15px;">
    <i class="fa fa-check" aria-hidden="true"></i> <b>{{session('thongbao')}}</b>
</div>
@endif
<button type="button" class="btn btn-primary" style="margin: 10px;" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-plus" aria-hidden="true"></i> Add catergory
</button>
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Categories</h3>
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
                        <th style="width: 5%">
                            ID
                        </th>
                        <th style="width: 50%">
                            Category Name
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category){ ?>
                    <tr>
                        <td>
                            {{$category->id}}
                        </td>
                        <td>
                            <a href="{{route('category.view', ['id' => $category->id])}}"> {{$category->name}} </a>
                        </td>
                        <td>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal"
                                data-id="{{$category->id}}" data-name="{{$category->name}}" >
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"
                                data-id="{{$category->id}}">
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

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="max-width: 700px;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('category.new.post')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName">Name category</label>
                        <input type="text" id="inputName" class="form-control" name="name" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('category.edit')}}" method="post">
                @csrf
                <input id="idCategoryEdit" type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editName">Name category</label>
                        <input type="text" id="editName" class="form-control" name="name"
                            value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('category.delete')}}" method="post">
                @csrf
                <input id="idCategoryDelete" type="hidden" name="id" value="">
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
const button1 = document.querySelectorAll('.btn.btn-danger.btn-sm');
const button2 = document.querySelectorAll('.btn.btn-info.btn-sm');
button1.forEach(button => {
    button.onclick = function() {
        const input = document.querySelector('#idCategoryDelete');
        input.value = button.getAttribute('data-id');
    }
})

button2.forEach(button => {
    button.onclick = function() {
        const input = document.querySelector('#idCategoryEdit');
        const editName = document.querySelector('#editName');
        editName.value = button.getAttribute('data-name');
        input.value = button.getAttribute('data-id');
    }
})
</script>
@endsection