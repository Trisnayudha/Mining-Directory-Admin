@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <form action="{{ route('privacy-policies.update', $privacy->id) }}" method="POST">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <!-- Table with stripped rows -->
                        <h5 class="card-title">Privacy</h5>

                        <div class="col-12">
                            <div class="quill-editor-full" id="term">
                                {!! $privacy->content !!}
                            </div>
                            <input type="hidden" name="content_privacy" id="content_privacy">
                        </div>
                        <h5 class="card-title">Term</h5>

                        <div class="col-12">
                            <div class="quill-editor-default" id="privacy">
                                {!! $term->content !!}
                            </div>
                            <input type="hidden" name="content_term" id="content_term">
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submmit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection

@push('breadcumbs')
    <div class="pagetitle">
        <h1>Privacy & Term</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Privacy & Term</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endpush

@push('top')
@endpush

@push('bottom')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi Quill editor (asumsi Quill sudah diinisialisasi di tempat lain)
            var quillPrivacy = new Quill('#term', {
                theme: 'snow'
            });

            var quillTerm = new Quill('#privacy', {
                theme: 'snow'
            });

            // Tangkap event submit pada form
            document.querySelector('form').onsubmit = function() {
                // Ambil konten dari Quill editor dan masukkan ke dalam input hidden
                document.querySelector('#content_privacy').value = quillPrivacy.root.innerHTML;
                document.querySelector('#content_term').value = quillTerm.root.innerHTML;
            };
        });
    </script>
@endpush
