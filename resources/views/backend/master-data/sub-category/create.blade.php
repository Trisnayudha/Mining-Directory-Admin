@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form</h5>
                    <!-- Vertical Form -->
                    <form class="row g-3" method="post" action="{{ route('sub-categories.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="Category Main" class="form-label">Category Main</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Default</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- Vertical Form -->
                </div>
            </div>
        </div>
    @endsection

    @push('breadcumbs')
        <div class="pagetitle">
            <h1>Sub Category Create</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Sub Category</li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
    @endpush

    @push('top')
    @endpush

    @push('bottom')
    @endpush
