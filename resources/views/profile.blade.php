@extends('layout.master')

@section('title', 'Cloud Services')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    @if($user->avatar)
                        <img class="rounded-circle mt-5" width="150px" src={{ asset($user->avatar) }}>
                    @else
                        <img class="rounded-circle mt-5" width="150px" src="{{ asset('storage/images/profile.jpg') }}">
                    @endif
                    <p class="fs-3 mt-3">{{ $user->name }}</p>
                    <p class="text-black-50 mt-2">{{ $user->email }}</p>
                    <span></span>
                </div>
            </div>
            <div class="col-md-9 border-right py-5 mb-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item me-0" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                        <h5>Information</h5>
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <h5>Settings</h5>
                    </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <h3 class="border-bottom pb-2 mb-0">Profile</h3>
                            <div class="d-flex text-muted pt-3">
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100 fs-5">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Full Name</strong>
                                    </div>
                                    <span class="d-block">{{ $user->name }}</span>
                                </div>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100 fs-5">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Date of birth</strong>
                                    </div>
                                    @if($user->date)
                                        <span class="d-block">{{ $user->date }}</span>
                                    @else
                                        <span class="d-block"></span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3">
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100 fs-5">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Email</strong>
                                    </div>
                                    <span class="d-block">{{ $user->name }}</span>
                                </div>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100 fs-5">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Phone Number</strong>
                                    </div>
                                    @if($user->phone)
                                        <span class="d-block">{{ $user->phone }}</span>
                                    @else
                                        <span class="d-block"></span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3">
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100 fs-5">
                                    <div class="d-flex">
                                        <strong class="text-gray-dark me-3">Projects: </strong>
                                        <a href="{{ route('myProject.show') }}">View project</a>
                                    </div>
                                </div>
                            </div>
                            <small class="d-block text-end mt-5"></small>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <form class="text-muted" action="{{ route('editProfile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">
                                        <strong class="text-gray-dark">Name</strong>
                                    </label>
                                    <div class="col-sm-10 mb-3">
                                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">
                                        <strong class="text-gray-dark">Email</strong>
                                    </label>
                                    <div class="col-sm-10 mb-3">
                                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPhone" class="col-sm-2 col-form-label">
                                        <strong class="text-gray-dark">Phone Number</strong>
                                    </label>
                                    <div class="col-sm-10 mb-3">
                                        <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Phone Number" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="formDate" class="col-sm-2 col-form-label">
                                        <strong>Date</strong>
                                    </label>
                                    <div class="input-group col-sm-10 mb-3" style="width: 83%;">
                                        <i class="bi bi-calendar-date input-group-text"></i>
                                        <input type="date" class="datepicker_input form-control" id="formDate" name="date" placeholder="Date" required aria-label="Date input 3 (using aria-label)" value="{{ $user->date }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="formPass" class="col-sm-2 col-form-label">
                                        <strong>Password</strong>
                                    </label>
                                    <div class="col-sm-10 mb-3">
                                        <input type="password" class="form-control" id="inputPass" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="formConfPass" class="col-sm-2 col-form-label">
                                        <strong>Confirm Pass</strong>
                                    </label>
                                    <div class="col-sm-10 mb-3">
                                        <input type="password" class="form-control" id="formConfPass" name="confirm" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="formFile" class="col-sm-2 col-form-label">
                                        <strong class="text-gray-dark">Avatar</strong>
                                    </label>
                                    <div class="col-sm-10 mb-3">
                                        <input class="form-control" type="file" id="formFile" name="avatar">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
