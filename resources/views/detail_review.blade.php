@extends('layout.master')
@include('admin.layouts.head_index')
@include('admin.layouts.link_script')

@section('title', 'Review detail')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">

@section('content')
    <div class="details">
        @include('components.prod_detail.prod_head')
        @if (session('alert'))  
        <div class="alert alert-success" role="alert">  
            {{ session('alert') }}
        </div>  
        @endif
        @if (session('error'))   
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <div class="container mt-5">
            <h2 class="mb-3">
                Perform a detailed assessment of the cloud service 
                <i class="bi bi-emoji-heart-eyes"></i>
            </h2>
            <p class="fst-italic">
                Please perform an assessment of the quality level of the cloud service. There are 5 rating levels: 1: very poor - 2: poor - 3: Normal - 4: Good - 5: Very good<br/>
            </p>
            <p class="fst-italic">
                Your answer will be very important to make the system more complete. Thank you very much for taking the time to rate the service in detail.
            </p>
            <p class="fst-italic text-danger fw-bolder mb-4">
                * All items are required.
            </p>
            <form action="{{ route('postDetailReview', ['id' => $product->id]) }}" method="post">
                @csrf
                <ul class="nav nav-pills nav-sidebar flex-column container" data-widget="treeview" role="menu" data-accordion="false">
                    @foreach ($criterias as $criteria )
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <p class="fs-5 fst-italic">
                                    {{ $criteria->name }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <div class="nav nav-treeview ms-5" style="display: none;">
                                <table class="table table-borderless">
                                    <thead>
                                      <tr>
                                        <th scope="col" class="col-md-2"></th>
                                        <th scope="col" class="col-md-2 text-center">1</th>
                                        <th scope="col" class="col-md-2 text-center">2</th>
                                        <th scope="col" class="col-md-2 text-center">3</th>
                                        <th scope="col" class="col-md-2 text-center">4</th>
                                        <th scope="col" class="col-md-2 text-center">5</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php $childs = in_array($criteria->name, ['Cost', 'Capability']) ? [$criteria] : $criteria->children ?>
                                        @foreach ($childs as $child)
                                            <?php 
                                                $product_criteria = $product->product_criterias()->where('criteria_id', $child->id)->first();
                                                $default_value = $product_criteria ? $product_criteria->value : 0;
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    {{ $child->name }} <i class="text-danger">*</i>
                                                </th>
                                                @for ($i = 1; $i <= 5; $i++)
                                                <td class="text-center">
                                                    <input type="radio" value="{{ $i }}" {{ $default_value == $i ? 'checked' : '' }} name="{{ __('criteria_id_' . $child->id) }}" required />
                                                </td>
                                                @endfor
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
            </form>
        </div>
    </div>
@endsection
