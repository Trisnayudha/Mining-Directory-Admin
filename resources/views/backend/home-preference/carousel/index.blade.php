@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <!-- Table with stripped rows -->
                    <div class="mt-2 d-flex justify-content-end">
                        <a href="{{ route('carousels.create') }}" class="btn btn-success"><i class="bi bi-plus"></i> Add</a>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>
                                    image
                                </th>
                                <th>
                                    link
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carousel as $key)
                                <tr>
                                    <td><img src="{{ $key->image }}" alt="" class="img-fluid"
                                            style="width: 100px; height: auto;"></td>

                                    <td>{{ $key->link }}</td>
                                    <td>
                                        <div>
                                            <form action="{{ route('carousels.destroy', $key->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                            <a href="{{ route('carousels.edit', $key->id) }}" class="btn btn-secondary"><i
                                                    class="bi bi-pencil-square"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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
