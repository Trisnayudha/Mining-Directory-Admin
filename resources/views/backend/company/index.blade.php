@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="mt-2 d-flex justify-content-end align-items-center">
                        <div class="header p-2" style="box-shadow: none; height: 50px;">
                            <form class="search-form d-flex align-items-center" method="GET"
                                action="{{ route('companies.index') }}">
                                <input type="text" name="query" placeholder="Search" title="Enter search keyword"
                                    value="{{ request()->query('query') }}">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                        <a href="{{ route('companies.create') }}" class="btn btn-success m-1"><i class="bi bi-plus"></i>
                            Add</a>
                        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal"
                            data-bs-target="#verticalycentered">
                            Import data
                        </button>
                    </div>
                    <div class="row mt-3">
                        @foreach ($companies as $item)
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-image-wrapper">
                                        <img src="{{ $item->image ?? asset('default-company.png') }}"
                                            class="card-img-top img-fluid" alt="{{ $item->company_name }}">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->company_name }}</h5>
                                        <p style="font-size:10px;"><small>Registered:
                                                {{ $item->created_at->format('d M Y H:i') }}</small></p>
                                        <div>
                                            <a href="{{ route('companies.edit', $item->id) }}"
                                                class="btn btn-outline-warning btn-sm m-1">Edit</a>
                                            <form action="{{ route('companies.destroy', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-outline-danger btn-sm m-1">Delete</button>
                                            </form>
                                            <a href="" class="btn btn-outline-info btn-sm m-1">Address</a>
                                            <a href="{{ route('companies-address.index', $item->slug) }}"
                                                class="btn btn-outline-info btn-sm ml-1 m-1">Representative</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $companies->appends(request()->input())->links('template.pagination-custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumbs')
    <div class="pagetitle">
        <h1>Company</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Company</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endpush

@push('top')
    <style>
        .card-image-wrapper {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 150px;
            /* Adjust height as needed */
            margin: 10px auto;
            padding: 0 10px;
        }

        .card-img-top {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            /* Ensure the image fits within the container */
        }
    </style>
@endpush

@push('bottom')
    <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <p> Sebelum Import Data Company, Pastikan anda sudah menggunakan template import company yang sesuai
                            dengan ketentuan
                        </p>
                        <button type="button" class="btn btn-info btn-sm mt-2"><i class="bi bi-folder"></i> Download
                            Template</button>
                    </div>
                    <form action="{{ route('companies.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" id="file" class="form-control mt-2" accept=".xls,.xlsx"
                            required>
                        <select name="category_id" id="category_id" class="form-control mt-2" required>
                            <option value="">Please Choose</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary mt-2">Upload</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div><!-- End Vertically centered Modal-->
@endpush
