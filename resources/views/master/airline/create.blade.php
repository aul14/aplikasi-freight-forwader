@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Airline', 'title_2' => 'Master'])
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
                    <h6>Form Add Airline</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('airline.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Airline Code <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('code') }}"
                                        class="form-control @error('code') is-invalid @enderror" autofocus
                                        autocomplete="off" required name="code" id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="airline_id">Airline ID <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('airline_id') }}"
                                        class="form-control @error('airline_id') is-invalid @enderror" autofocus
                                        autocomplete="off" required name="airline_id" id="airline_id">
                                    @error('airline_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Airline Name <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" autocomplete="off" required
                                        name="name" id="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bisnis_party_id">Business Party Code </label>
                                    <select class="bisnis_party-select" name="bisnis_party_id">
                                        <option></option>
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
                                                <input class="form-check-input" type="checkbox" @checked(old('is_vendor') == '1')
                                                    value="1" id="is_vendor" name="is_vendor">
                                                <label class="custom-control-label" for="is_vendor">
                                                    Is Vendor ?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vendor_code">Vendor Code </label>
                                            <input type="text" value="{{ old('vendor_code') }}" readonly
                                                class="form-control" name="vendor_code" id="vendor_code">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="vendor_acc_code">Vendor Account Code
                                            </label>
                                            <input type="text" value="{{ old('vendor_acc_code') }}" class="form-control"
                                                name="vendor_acc_code" id="vendor_acc_code">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="text" value="{{ old('email') }}"
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
                                    <input type="text" value="{{ old('web_site') }}"
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
                                    <input type="text" value="{{ old('contact') }}"
                                        class="form-control @error('contact') is-invalid @enderror" name="contact"
                                        id="contact">
                                    @error('contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="comission">Comission Percentage </label>
                                    <input type="text" value="{{ old('comission') }}" data-type='currency3'
                                        class="form-control @error('comission') is-invalid @enderror" autocomplete="off"
                                        name="comission" id="comission">
                                    @error('comission')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="left_margin">Left Margin </label>
                                    <input type="text" value="{{ old('left_margin') }}" data-type='currency'
                                        class="form-control @error('left_margin') is-invalid @enderror" autocomplete="off"
                                        name="left_margin" id="left_margin">
                                    @error('left_margin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="top_margin">Top Margin </label>
                                    <input type="text" value="{{ old('top_margin') }}" data-type='currency'
                                        class="form-control @error('top_margin') is-invalid @enderror" autocomplete="off"
                                        name="top_margin" id="top_margin">
                                    @error('top_margin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image_airline">Airline Image </label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input class="form-control @error('image_airline') is-invalid @enderror"
                                        type="file" id="image_airline" name="image_airline"
                                        onchange="previewImage()">
                                    @error('image_airline')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address_1">Address </label>
                                    <input type="text" value="{{ old('address_1') }}"
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
                                    <input type="text" value="{{ old('address_2') }}"
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
                                    <input type="text" value="{{ old('address_3') }}"
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
                                    <input type="text" value="{{ old('address_4') }}"
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
                                                <option></option>
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
                                            <input type="text" value="{{ old('city_desc') }}" disabled
                                                class="form-control" name="city_desc" id="city_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country_id">Country </label>
                                            <select class="country-select" name="country_id">
                                                <option></option>
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
                                            <input type="text" value="{{ old('country_desc') }}" disabled
                                                class="form-control" name="country_desc" id="country_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telp_idd">Telephone </label>
                                            <input type="text" name="telp_idd" readonly class="form-control">

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
                                            <input type="text" value="{{ old('telp') }}" class="form-control"
                                                name="telp" id="telp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fax_idd">Fax </label>
                                            <input type="text" name="fax_idd" readonly class="form-control">

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
                                            <input type="text" value="{{ old('fax') }}" class="form-control"
                                                name="fax" id="fax">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="terminal">Terminal </label>
                                    <input type="text" value="{{ old('terminal') }}"
                                        class="form-control @error('terminal') is-invalid @enderror" name="terminal"
                                        id="terminal">
                                    @error('terminal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="analysis_code">Analysis Code </label>
                                    <input type="text" value="{{ old('analysis_code') }}"
                                        class="form-control @error('analysis_code') is-invalid @enderror"
                                        name="analysis_code" id="analysis_code">
                                    @error('analysis_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="neutral">Neutral AWB ?</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="neutral" @checked(old('neutral') == 'yes') value="yes"
                                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                                            data-offstyle="danger">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ccn">CCN ?</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="ccn" @checked(old('ccn') == 'yes') value="yes"
                                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                                            data-offstyle="danger">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('airline.index') }}" class="btn btn-danger">Back</a>
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
        function previewImage() {
            const image = document.querySelector('#image_airline');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(ofREvent) {
                imgPreview.src = ofREvent.target.result;
            }
        }

        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }

        function formatNumberRight(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, "")
        }

        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();



            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;
                // console.log(input_val.length);

                // final formatting
                if (input_val.length > 13) {
                    input_val += ".00";
                }

                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

        function formatCurrency3(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();



            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumberRight(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "000";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 3);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;
                // console.log(input_val.length);

                // final formatting
                if (input_val.length >= 3) {
                    input_val += ".000";
                }

                if (blur === "blur") {
                    input_val += ".000";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("input[type=text]").keyup(function() {
                $(this).val($(this).val().toUpperCase());
            });

            $("input[data-type='currency']").on({
                keyup: function() {
                    formatCurrency($(this));
                },
                blur: function() {
                    formatCurrency($(this), "blur");
                }
            });

            $("input[data-type='currency3']").on({
                keyup: function() {
                    formatCurrency3($(this));
                },
                blur: function() {
                    formatCurrency3($(this), "blur");
                }
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
                    cache: true
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
                    cache: true
                }
            });
            $(".country-select").change(function(e) {
                e.preventDefault();
                let idd_name = $(this).select2('data')[0].idd_name;
                let country_name = $(this).select2('data')[0].country_name;

                $("input[name=country_desc]").val(country_name);
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
                    cache: true
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
