@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form class="row g-3" method="post" action="{{ route('companies.update', $company->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <!-- Vertical Form -->
                        <div class="row g-3">

                            <h5 class="card-title">Information</h5>
                            <div class="col-6">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                    value="{{ $company->company_name }}">
                            </div>
                            <div class="col-6">
                                <label for="company_category" class="form-label">Company Categories</label>
                                <input type="text" class="form-control" id="company_category" name="company_category"
                                    value="{{ $company->company_category }}">
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">Email Login</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $company->email }}">
                            </div>
                            <div class="col-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <h5 class="card-title">URL and Social Media</h5>
                            <div class="col-4">
                                <label for="email">Email Company</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2"><i
                                            class="bx bx-mail-send"></i></span>
                                    <input type="text" class="form-control" name="email_company" id="email_company"
                                        value="{{ $company->email_company }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="email">URL</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2"><i
                                            class="bx bx-globe"></i></span>
                                    <input type="text" class="form-control" name="website" id="website"
                                        value="{{ $company->website }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="phone">Phone Number</label>
                                <div class="input-group">
                                    <select class="" name="prefix_phone_company" id="prefix_phone_company">
                                        <option value="+62"
                                            {{ $company->prefix_phone_company == '+62' ? 'selected' : '' }}>+62</option>
                                        <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                    </select>
                                    <input type="text" class="form-control" name="phone_company" id="phone_company"
                                        value="{{ $company->phone_company }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="email">Facebook</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2"><i
                                            class="bx bxl-facebook"></i></span>
                                    <input type="text" class="form-control" name="facebook" id="facebook"
                                        value="{{ $company->facebook }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="email">Linkedin</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2"><i
                                            class="bx bxl-linkedin"></i></span>
                                    <input type="text" class="form-control" name="linkedin" id="linkedin"
                                        value="{{ $company->linkedin }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="email">Instagram</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2"><i
                                            class="bx bxl-instagram"></i></span>
                                    <input type="text" class="form-control" name="instagram" id="instagram"
                                        value="{{ $company->instagram }}">
                                </div>
                            </div>
                            <h5 class="card-title">Company Description</h5>
                            <div class="col-12">
                                <label for="">Video URL</label>
                                <input type="text" class="form-control" name="video" id="video"
                                    value="{{ $company->video }}">
                            </div>
                            <div class="col-12">
                                <div class="quill-editor-full" id="editor">
                                    {!! $company->description !!}
                                </div>
                                <input type="hidden" name="description" id="description">
                            </div>
                            <h5 class="card-title mt-5">Value Proposition</h5>
                            <div class="col-12">
                                <label for="">Value 1</label>
                                <input type="text" class="form-control" name="value_1" id="value_1"
                                    value="{{ $company->value_1 }}">
                            </div>
                            <div class="col-12">
                                <label for="">Value 2</label>
                                <input type="text" class="form-control" name="value_2" id="value_2"
                                    value="{{ $company->value_2 }}">
                            </div>
                            <div class="col-12">
                                <label for="">Value 3</label>
                                <input type="text" class="form-control" name="value_3" id="value_3"
                                    value="{{ $company->value_3 }}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form><!-- Vertical Form -->
        </div>
    </div>
@endsection

@push('breadcrumbs')
    <div class="pagetitle">
        <h1>Company Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Company</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endpush

@push('top')
@endpush

@push('bottom')
    <script>
        document.querySelector('form').addEventListener('submit', function() {
            var quillEditor = document.querySelector('.quill-editor-full').children[0].innerHTML;
            document.querySelector('#description').value = quillEditor;
        });
    </script>
@endpush
