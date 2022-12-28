@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Company Profile', 'title_2' => 'Settings'])
    <div class="row mt-1 px-1">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }}</strong>
                    <button type="button" class="btn btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Form Company Profile</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value="{{ $company->id }}">
                        <input type="hidden" name="oldImage" value="{{ $company->image_company }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image_company">Company Logo </label>
                                    @if ($company->image_company)
                                        <img class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px"
                                            src="{{ asset("storage/{$company->image_company}") }}">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    <input class="form-control @error('image_company') is-invalid @enderror" type="file"
                                        id="image_company" name="image_company" onchange="previewImage()">
                                    @error('image_company')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name </label>
                                    <input type="text" value="{{ old('name', $company->name) }}" autocomplete="off"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        id="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="branch_name">Branch Name </label>
                                    <input type="text" value="{{ old('branch_name', $company->branch_name) }}"
                                        class="form-control @error('branch_name') is-invalid @enderror" name="branch_name"
                                        id="branch_name">
                                    @error('branch_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site">Site </label>
                                    <input type="text" value="{{ old('site', Cache::get('db-connection')) }}" readonly
                                        class="form-control @error('site') is-invalid @enderror" name="site"
                                        id="site">
                                    @error('site')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Type </label>
                                    <select name="type" id="type" class="select22">
                                        <option value=""></option>
                                        @foreach ($comp_detail as $item)
                                            <option value="{{ $item->type }}" data-address="{{ $item->address }}"
                                                data-city="{{ $item->city_id }}"
                                                data-city_code="{{ !empty($item->city->code) ? $item->city->code : '' }}"
                                                data-city_name="{{ !empty($item->city->name) ? $item->city->name : '' }}"
                                                data-country="{{ $item->country_id }}"
                                                data-country_code="{{ !empty($item->country->code) ? $item->country->code : '' }}"
                                                data-country_name="{{ !empty($item->country->name) ? $item->country->name : '' }}"
                                                data-country_idd="{{ !empty($item->country->idd) ? $item->country->idd : '' }}"
                                                data-telp="{{ $item->telp }}" data-fax="{{ $item->fax }}"
                                                data-contact="{{ $item->contact }}" data-email="{{ $item->email }}"
                                                data-postal_code="{{ $item->postal_code }}" @selected($item->id == 1)>
                                                {{ $item->type }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address </label>
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control">
                                        {{ old('address', rtrim($comp_detail[0]->address)) }}
                                    </textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city_id">City </label>
                                            <select class="city-select" name="city_id">
                                                <option value="{{ $comp_detail[0]->city_id }}">
                                                    {{ !empty($comp_detail[0]->city_id) ? $comp_detail[0]->city->code : '' }}
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
                                                value="{{ old('city_desc', !empty($comp_detail[0]->city_id) ? $comp_detail[0]->city->name : '') }}"
                                                disabled class="form-control city-test" name="city_desc" id="city_desc">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country_id">Country </label>
                                            <select class="country-select" name="country_id">
                                                <option value="{{ $comp_detail[0]->country_id }}">
                                                    {{ !empty($comp_detail[0]->country_id) ? $comp_detail[0]->country->code : '' }}
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
                                                value="{{ old('country_desc', !empty($comp_detail[0]->country_id) ? $comp_detail[0]->country->name : '') }}"
                                                disabled class="form-control" name="country_desc" id="country_desc">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telp_idd">Telephone </label>
                                            <input type="text" name="telp_idd"
                                                value="{{ !empty($comp_detail[0]->country_id) ? $comp_detail[0]->country->idd : '' }}"
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
                                            <input type="text" value="{{ old('telp', $comp_detail[0]->telp) }}"
                                                class="form-control" name="telp" id="telp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fax_idd">Fax </label>
                                            <input type="text" name="fax_idd"
                                                value="{{ !empty($comp_detail[0]->country_id) ? $comp_detail[0]->country->idd : '' }}"
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
                                            <input type="text" value="{{ old('fax', $comp_detail[0]->fax) }}"
                                                class="form-control" name="fax" id="fax">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postal_code">Postal Code </label>
                                    <input type="text" value="{{ old('postal_code', $comp_detail[0]->postal_code) }}"
                                        class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"
                                        id="postal_code">
                                    @error('postal_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">Contact </label>
                                    <input type="text" value="{{ old('contact', $comp_detail[0]->contact) }}"
                                        class="form-control @error('contact') is-invalid @enderror" name="contact"
                                        id="contact">
                                    @error('contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="text" value="{{ old('email', $comp_detail[0]->email) }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        id="email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="web_site">Web Site </label>
                                    <input type="text" name="web_site"
                                        value="{{ old('web_site', $company->web_site) }}" class="form-control">

                                    @error('web_site')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="regis_no">Registration No </label>
                                    <input type="text" name="regis_no"
                                        value="{{ old('regis_no', $company->regis_no) }}" class="form-control">

                                    @error('regis_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="iata_agent_code">IATA Agent Code </label>
                                    <input type="text" name="iata_agent_code"
                                        value="{{ old('iata_agent_code', $company->iata_agent_code) }}"
                                        class="form-control">

                                    @error('iata_agent_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vat_regis_no">VAT Registration No </label>
                                    <input type="text" name="vat_regis_no"
                                        value="{{ old('vat_regis_no', $company->vat_regis_no) }}" class="form-control">

                                    @error('vat_regis_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="currency_id">Currency Code </label>
                                            <select class="currency-select" name="currency_id">
                                                <option value="{{ $company->currency_id }}">
                                                    {{ !empty($company->currency_id) ? $company->currency->code : '' }}
                                                </option>
                                            </select>

                                            @error('currency_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="currency_desc"> </label>
                                            <input type="text"
                                                value="{{ old('currency_desc', !empty($company->currency_id) ? $company->currency->description : '') }}"
                                                readonly class="form-control" name="currency_desc" id="currency_desc">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @permission('edit-company')
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('company') }}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        @endpermission()
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

            $('textarea[name=address]').html($('textarea[name=address]').html().trim());


            $(`.select22`).select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
            });


            $(`.city-select`).select2({
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
                                    country_code: item.country.code,
                                    city_name: item.name
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

            $('.currency-select').select2({
                placeholder: 'Search currency',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.currency') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.id,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(`.currency-select`).on("select2:select", function(e) {
                e.preventDefault();
                let curr_desc = $(this).select2('data')[0].custom_attribute;

                $("input[name=currency_desc]").val(curr_desc);
            });

            $(`.city-select`).on("select2:select", function(e) {
                e.preventDefault();
                let city_name = $(this).select2('data')[0].city_name;

                $("input[name=city_desc]").val(city_name);
            });

            $(`.country-select`).on("select2:select", function(e) {
                e.preventDefault();
                let idd_name = $(this).select2('data')[0].idd_name;
                let country_name = $(this).select2('data')[0].country_name;

                $("input[name=country_desc]").val(country_name);
                $("input[name=telp_idd]").val(idd_name);
                $("input[name=fax_idd]").val(idd_name);
            });

            $(`.select22`).on("select2:select", function(e) {
                e.preventDefault();
                let address = $(this).find(":selected").data('address');
                let postal_code = $(this).find(":selected").data('postal_code');
                let telp = $(this).find(":selected").data('telp');
                let fax = $(this).find(":selected").data('fax');
                let contact = $(this).find(":selected").data('contact');
                let email = $(this).find(":selected").data('email');

                let city_code = $(this).find(":selected").data('city_code');
                let city_desc = $(this).find(":selected").data('city_name');
                let city = $(this).find(":selected").data('city');
                let newCityOption = $("<option selected='selected'></option>").val(city).text(city_code)

                let country_code = $(this).find(":selected").data('country_code');
                let country_desc = $(this).find(":selected").data('country_name');
                let country_idd = $(this).find(":selected").data('country_idd');
                let country = $(this).find(":selected").data('country');
                let newCountryOption = $("<option selected='selected'></option>").val(country).text(
                    country_code)

                $("textarea[name=address]").val(address);
                $("input[name=postal_code]").val(postal_code);
                $("input[name=city_desc]").val(city_desc);
                $("input[name=country_desc]").val(country_desc);
                $("input[name=telp_idd]").val(country_idd);
                $("input[name=fax_idd]").val(country_idd);
                $("input[name=telp]").val(telp);
                $("input[name=fax]").val(fax);
                $("input[name=contact]").val(contact);
                $("input[name=email]").val(email);

                $(".city-select").append(newCityOption).trigger('change');
                $(".country-select").append(newCountryOption).trigger('change');
            });
        });

        function previewImage() {
            const image = document.querySelector('#image_company');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(ofREvent) {
                imgPreview.src = ofREvent.target.result;
            }
        }
    </script>
@endsection
