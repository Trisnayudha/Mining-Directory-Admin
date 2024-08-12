@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form</h5>
                    <!-- Vertical Form -->
                    <form class="row g-3" method="POST"
                        action="{{ route('popular-categories.update', $popularCategories->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="name" class="form-label">Category Name</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Default</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $popularCategories->category_id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('popular-categories.index') }}" class="btn btn-secondary">Close</a>
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
