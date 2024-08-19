@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form</h5>
                    <form class="row g-3" method="post" action="{{ route('companies-address.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="slug" value="{{ $slug }}">
                        <div class="col-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="col-4">
                            <label for="Type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option>Default</option>
                                <option value="headquarter">Headquarter</option>
                                <option value="branch">Branch</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" id="country" class="form-control">
                                <option value="">Select Country</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="province" class="form-label">Province</label>
                            <select name="province" id="province" class="form-control">
                                <option value="">Select Province</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="city" class="form-label">City</label>
                            <select name="city" id="city" class="form-control">
                                <option value="">Select City</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="postal_code" class="form-label">Postal code</label>
                            <input type="text" class="form-control" name="postal_code">
                        </div>
                        <div class="col-6">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="col-6">
                            <label for="phone" class="form-label"> Phone </label>
                            <div class="input-group">
                                <select class="" name="prefix_phone_company" id="prefix_phone_company">
                                    <option value="+62">+62</option>
                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                </select>
                                <input type="text" class="form-control" name="phone_company" id="phone_company">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('bottom')
    <script>
        $(document).ready(function() {
            // Load countries saat halaman dimuat
            loadCountries();

            $('#country').change(function() {
                var countryId = $(this).find(':selected').data('id');
                if (countryId) {
                    loadProvinces(countryId);
                } else {
                    // Kosongkan state dan city jika country tidak dipilih
                    $('#province').html('<option value="">Select Province</option>');
                    $('#city').html('<option value="">Select City</option>');
                }
            });

            $('#province').change(function() {
                var provinceId = $(this).find(':selected').data('id');
                var countryId = $('#country').find(':selected').data('id');
                if (provinceId) {
                    loadCities(countryId, provinceId);
                } else {
                    // Kosongkan city jika province tidak dipilih
                    $('#city').html('<option value="">Select City</option>');
                }
            });

            function loadCountries() {
                $.ajax({
                    url: 'https://mining.indonesiaminer.com/countries',
                    method: 'GET',
                    success: function(response) {
                        var options = '<option value="">Select Country</option>';
                        $.each(response.data, function(index, country) {
                            options += '<option value="' + country.name + '" data-id="' +
                                country.id + '">' + country.name +
                                '</option>';
                        });
                        $('#country').html(options);
                    }
                });
            }

            function loadProvinces(countryId) {
                $.ajax({
                    url: 'https://mining.indonesiaminer.com/countries/' + countryId + '/states',
                    method: 'GET',
                    success: function(response) {
                        var options = '<option value="">Select Province</option>';
                        $.each(response.data, function(index, state) {
                            options += '<option value="' + state.name + '" data-id="' + state
                                .id + '">' + state.name +
                                '</option>';
                        });
                        $('#province').html(options);
                    }
                });
            }

            function loadCities(countryId, provinceId) {
                $.ajax({
                    url: 'https://mining.indonesiaminer.com/countries/' + countryId + '/states/' +
                        provinceId + '/cities',
                    method: 'GET',
                    success: function(response) {
                        var options = '<option value="">Select City</option>';
                        $.each(response.data, function(index, city) {
                            options += '<option value="' + city.name + '" data-id="' + city.id +
                                '">' + city.name +
                                '</option>';
                        });
                        $('#city').html(options);
                    }
                });
            }
        });
    </script>
@endpush
