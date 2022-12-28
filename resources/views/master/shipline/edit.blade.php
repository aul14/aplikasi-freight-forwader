@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Shipping Line', 'title_2' => 'Master'])
    <div class="row mt-1 px-1">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }}</strong>
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Form Edit Shipping Line</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('shipline.update', $shipline->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Shipping Line Code <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('code', $shipline->code) }}"
                                        class="form-control @error('code') is-invalid @enderror" autocomplete="off" readonly
                                        name="code" id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Shipping Line Name <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('name', $shipline->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" autocomplete="off"
                                        autofocus required name="name" id="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bisnis_party_id">Business Party Code </label>
                                    <select class="bisnis_party-select" name="bisnis_party_id">
                                        <option value="{{ $shipline->bisnis_party_id }}">
                                            {{ $shipline->bisnis_party_id != null ? $shipline->bisnis_party->code : '' }}
                                        </option>
                                    </select>

                                    @error('bisnis_party_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="is_vendor">&nbsp; </label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" @checked(old('is_vendor', $shipline->is_vendor) == '1')
                                                    value="1" id="is_vendor" name="is_vendor"
                                                    @disabled($shipline->is_vendor == '1')>
                                                <label class="custom-control-label" for="is_vendor">
                                                    Is Vendor ?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vendor_code">Vendor Code </label>
                                            <input type="text" value="{{ old('vendor_code', $shipline->vendor_code) }}"
                                                readonly class="form-control" name="vendor_code" id="vendor_code">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="vendor_acc_code">Vendor Account Code
                                            </label>
                                            <input type="text"
                                                value="{{ old('vendor_acc_code', $shipline->vendor_acc_code) }}"
                                                class="form-control" name="vendor_acc_code" id="vendor_acc_code">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="text" value="{{ old('email', $shipline->email) }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        id="email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="web_site">Website </label>
                                    <input type="text" value="{{ old('web_site', $shipline->web_site) }}"
                                        class="form-control @error('web_site') is-invalid @enderror" name="web_site"
                                        id="web_site">
                                    @error('web_site')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact </label>
                                    <input type="text" value="{{ old('contact', $shipline->contact) }}"
                                        class="form-control @error('contact') is-invalid @enderror" name="contact"
                                        id="contact">
                                    @error('contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cr_no">Cr No </label>
                                    <input type="text" value="{{ old('cr_no', $shipline->cr_no) }}"
                                        class="form-control @error('cr_no') is-invalid @enderror" name="cr_no"
                                        id="cr_no">
                                    @error('cr_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address_1">Address </label>
                                    <input type="text" value="{{ old('address_1', $shipline->address_1) }}"
                                        class="form-control @error('address_1') is-invalid @enderror" name="address_1"
                                        id="address_1">
                                    @error('address_1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address_2">&nbsp; </label>
                                    <input type="text" value="{{ old('address_2', $shipline->address_2) }}"
                                        class="form-control @error('address_2') is-invalid @enderror" name="address_2"
                                        id="address_2">
                                    @error('address_2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address_3">&nbsp; </label>
                                    <input type="text" value="{{ old('address_3', $shipline->address_3) }}"
                                        class="form-control @error('address_3') is-invalid @enderror" name="address_3"
                                        id="address_3">
                                    @error('address_3')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address_4">&nbsp; </label>
                                    <input type="text" value="{{ old('address_4', $shipline->address_4) }}"
                                        class="form-control @error('address_4') is-invalid @enderror" name="address_4"
                                        id="address_4">
                                    @error('address_4')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city_id">City </label>
                                            <select class="city-select" name="city_id">
                                                <option value="{{ $shipline->city_id }}">
                                                    {{ $shipline->city_id != null ? $shipline->city->code : '' }}
                                                </option>
                                            </select>

                                            @error('city_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="city_desc"> </label>
                                            <input type="text"
                                                value="{{ old('city_desc', $shipline->city_id != null ? $shipline->city->name : '') }}"
                                                disabled class="form-control" name="city_desc" id="city_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country_id">Country </label>
                                            <select class="country-select" name="country_id">
                                                <option value="{{ $shipline->country_id }}">
                                                    {{ $shipline->country_id != null ? $shipline->country->code : '' }}
                                                </option>
                                            </select>

                                            @error('country_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="country_desc"> </label>
                                            <input type="text"
                                                value="{{ old('country_desc', $shipline->country_id != null ? $shipline->country->name : '') }}"
                                                disabled class="form-control" name="country_desc" id="country_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telp_idd">Telephone </label>
                                            <input type="text" name="telp_idd"
                                                value="{{ $shipline->country_id != null ? $shipline->country->idd : '' }}"
                                                readonly class="form-control">

                                            @error('telp_idd')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="telp"> &nbsp;</label>
                                            <input type="text" value="{{ old('telp', $shipline->telp) }}"
                                                class="form-control" name="telp" id="telp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fax_idd">Fax </label>
                                            <input type="text" name="fax_idd"
                                                value="{{ $shipline->country_id != null ? $shipline->country->idd : '' }}"
                                                readonly class="form-control">

                                            @error('fax_idd')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="fax"> &nbsp;</label>
                                            <input type="text" value="{{ old('fax', $shipline->fax) }}"
                                                class="form-control" name="fax" id="fax">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="analysis_code">Analysis Code </label>
                                    <input type="text" value="{{ old('analysis_code', $shipline->analysis_code) }}"
                                        class="form-control @error('analysis_code') is-invalid @enderror"
                                        name="analysis_code" id="analysis_code">
                                    @error('analysis_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('shipline.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("input[type=text]").keyup(function() {
                $(this).val($(this).val().toUpperCase());
            });

            $('.bisnis_party-select').select2({
                placeholder: 'Search business party',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.bisnis.party') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.country-select').select2({
                placeholder: 'Search country',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.country') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.id,
                                    idd_name: item.idd,
                                    country_name: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });
            $(".country-select").change(function(e) {
                e.preventDefault();
                let idd_name = $(this).select2('data')[0].idd_name;
                let country_name = $(this).select2('data')[0].country_name;

                $("input[name=country_desc]").val(country_name);
                $("input[name=telp_idd]").val(idd_name);
                $("input[name=fax_idd]").val(idd_name);
            });

            $('.city-select').select2({
                placeholder: 'Search city',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.city') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.id,
                                    custom_attribute: item.name,
                                    country_id: item.country.id,
                                    country_code: item.country.code,
                                    country_name: item.country.name,
                                    country_idd: item.country.idd,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".city-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                let country_id = $(this).select2('data')[0].country_id;
                let country_code = $(this).select2('data')[0].country_code;
                let country_name = $(this).select2('data')[0].country_name;
                let country_idd = $(this).select2('data')[0].country_idd;

                let dataCountry = {
                    id: country_id,
                    text: country_code
                };

                let newOptionCountry = new Option(dataCountry.text, dataCountry.id, true, true);
                $('.country-select').append(newOptionCountry).trigger('change');

                $("input[name=city_desc]").val(desc);
                $("input[name=country_desc]").val(country_name);
                $("input[name=telp_idd]").val(country_idd);
                $("input[name=fax_idd]").val(country_idd);
            });

        });
    </script>
@endsection
