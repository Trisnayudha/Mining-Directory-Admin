@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form</h5>
                    <!-- Vertical Form -->
                    <form class="row g-3" method="POST" action="{{ route('project-types.update', $category->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="name" class="form-label">Project Type Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $category->name }}">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Close</a>
                        </div>
                    </form><!-- Vertical Form -->
                </div>
            </div>
        </div>
    @endsection

    @push('breadcrumbs')
        <div class="pagetitle">
            <h1>Category Edit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Category</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
    @endpush

    @push('top')
    @endpush

    @push('bottom')
    @endpush
