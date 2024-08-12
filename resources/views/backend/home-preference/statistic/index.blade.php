@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <!-- Table with stripped rows -->
                    <form class="row g-3 mt-3" method="Post" action="{{ route('statistics.update', $statistic->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="data_1" class="form-label">Data 1</label>
                            <input type="text" class="form-control" id="data_1" name="data_1"
                                value="{{ $statistic->data_1 }}">
                        </div>
                        <div class="col-12">
                            <label for="data_2" class="form-label">Data 2</label>
                            <input type="text" class="form-control" id="data_2" name="data_2"
                                value="{{ $statistic->data_2 }}">
                        </div>
                        <div class="col-12">
                            <label for="data_3" class="form-label">Data 3</label>
                            <input type="text" class="form-control" id="data_3" name="data_3"
                                value="{{ $statistic->data_3 }}">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- Vertical Form -->
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
@endsection

@push('breadcumbs')
    <div class="pagetitle">
        <h1>Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endpush

@push('top')
@endpush

@push('bottom')
@endpush
