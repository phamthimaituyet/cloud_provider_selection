@extends('layout.master')
@include('admin.layouts.head_index')
@include('admin.layouts.link_script')

@section('title', 'Service selection support')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">

@section('content')
    <main>
        @include('components.home.head_main')
    </main>
    <div class="container mt-5">
        <h3>Please select the criteria you are interested in when choosing a supplier. We will assist you with service providers that fit those criteria.</h3>
        <form>
            @csrf
            <ul class="nav nav-pills nav-sidebar flex-column container" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($criterias as $criteria )
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <p class="fs-5 fst-italic mt-4">
                                {{ $criteria->name }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <div class="nav nav-treeview ms-5" style="display: none;">
                            <?php $childs = in_array($criteria->name, ['Cost', 'Capability']) ? [$criteria] : $criteria->children ?>
                            @foreach ($childs as $child)
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" name="{{ __('value_' . $child->id) }}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">{{ $child->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
    </div>
@endsection
