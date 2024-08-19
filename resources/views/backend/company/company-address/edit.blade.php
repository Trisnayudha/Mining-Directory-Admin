@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Address</h5>
                    <form class="row g-3" method="post" action="{{ route('companies-address.update', $data->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="slug" value="{{ $data->slug }}">
                        <div class="col-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $data->address }}">
                        </div>
                        <div class="col-4">
                            <label for="Type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="headquarter" {{ $data->type == 'headquarter' ? 'selected' : '' }}>Headquarter
                                </option>
                                <option value="branch" {{ $data->type == 'branch' ? 'selected' : '' }}>Branch</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="country">Country</label>
                            <select name="country" id="country" class="form-control">
                                <!-- Negara akan dimuat oleh jQuery -->
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="province">Province</label>
                            <select name="province" id="province" class="form-control">
                                <!-- Provinsi akan dimuat oleh jQuery -->
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="city">City</label>
                            <select name="city" id="city" class="form-control">
                                <!-- Kota akan dimuat oleh jQuery -->
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="postal_code" class="form-label">Postal code</label>
                            <input type="text" class="form-control" name="postal_code" value="{{ $data->postal_code }}">
                        </div>
                        <div class="col-6">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $data->email }}">
                        </div>
                        <div class="col-6">
                            <label for="phone" class="form-label"> Phone </label>
                            <div class="input-group">
                                <select class="" name="prefix_phone_company" id="prefix_phone_company">
                                    <option value="+62" {{ $data->prefix_phone_company == '+62' ? 'selected' : '' }}>+62
                                    </option>
                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                </select>
                                <input type="text" class="form-control" name="phone_company" id="phone_company"
                                    value="{{ $data->phone_company }}">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ redirect()->back() }}" class="btn btn-secondary">Cancel</a>
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
            loadCountries("{{ $data->country }}");

            $('#country').change(function() {
                var countryId = $(this).find(':selected').data('id');
                if (countryId) {
                    loadProvinces(countryId, null);
                } else {
                    $('#province').html('<option value="">Select Province</option>');
                    $('#city').html('<option value="">Select City</option>');
                }
            });

            $('#province').change(function() {
                var provinceId = $(this).find(':selected').data('id');
                var countryId = $('#country').find(':selected').data('id');
                if (provinceId) {
                    loadCities(countryId, provinceId, null);
                } else {
                    $('#city').html('<option value="">Select City</option>');
                }
            });

            function loadCountries(selectedCountry) {
                $.ajax({
                    url: 'https://mining.indonesiaminer.com/countries',
                    method: 'GET',
                    success: function(response) {
                        var options = '<option value="">Select Country</option>';
                        $.each(response.data, function(index, country) {
                            var selected = (country.name === selectedCountry) ? 'selected' : '';
                            options += '<option value="' + country.name + '" data-id="' +
                                country.id + '" ' + selected + '>' +
                                country.name + '</option>';
                        });
                        $('#country').html(options);

                        if (selectedCountry) {
                            var countryId = $('#country').find(':selected').data('id');
                            loadProvinces(countryId, "{{ $data->province }}");
                        }
                    }
                });
            }

            function loadProvinces(countryId, selectedProvince) {
                $.ajax({
                    url: 'https://mining.indonesiaminer.com/countries/' + countryId + '/states',
                    method: 'GET',
                    success: function(response) {
                        var options = '<option value="">Select Province</option>';
                        $.each(response.data, function(index, state) {
                            var selected = (state.name === selectedProvince) ? 'selected' : '';
                            options += '<option value="' + state.name + '" data-id="' + state
                                .id + '" ' + selected + '>' +
                                state.name + '</option>';
                        });
                        $('#province').html(options);

                        if (selectedProvince) {
                            var provinceId = $('#province').find(':selected').data('id');
                            loadCities(countryId, provinceId, "{{ $data->city }}");
                        }
                    }
                });
            }

            function loadCities(countryId, provinceId, selectedCity) {
                $.ajax({
                    url: 'https://mining.indonesiaminer.com/countries/' + countryId + '/states/' +
                        provinceId + '/cities',
                    method: 'GET',
                    success: function(response) {
                        var options = '<option value="">Select City</option>';
                        $.each(response.data, function(index, city) {
                            var selected = (city.name === selectedCity) ? 'selected' : '';
                            options += '<option value="' + city.name + '" data-id="' + city.id +
                                '" ' + selected + '>' +
                                city.name + '</option>';
                        });
                        $('#city').html(options);
                    }
                });
            }
        });
    </script>
@endpush
