@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Vendor', 'title_2' => 'Master'])
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
                    <h6>Form Add Vendor</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('vendors.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Vendor Code </label>
                                    <input type="text" value="NEW" class="form-control" name="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Vendor Name <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" autocomplete="off" required
                                        name="name" id="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="acc_code">Account Code </label>
                                            <input type="text" value="2.01.01.01"
                                                class="form-control @error('acc_code') is-invalid @enderror" name="acc_code"
                                                id="acc_code">
                                            @error('acc_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="acc_desc">Account Description </label>
                                            <input type="text" value="UTANG USAHA PIHAK KETIGA"
                                                class="form-control @error('acc_desc') is-invalid @enderror" name="acc_desc"
                                                id="acc_desc">
                                            @error('acc_desc')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vendor_type_id">Type </label>
                                            <select class="type-select" name="vendor_type_id">
                                                <option></option>
                                            </select>

                                            @error('vendor_type_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="type_desc"> </label>
                                            <input type="text" value="{{ old('type_desc') }}" disabled
                                                class="form-control" name="type_desc" id="type_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="customer_id">Contra Customer Code </label>
                                            <select class="customer-select" name="customer_id">
                                                <option></option>
                                            </select>

                                            @error('customer_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="customer_desc"> </label>
                                            <input type="text" value="{{ old('customer_desc') }}" disabled
                                                class="form-control" name="customer_desc" id="customer_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="currency_id">Currency <span style="color: red;">*</span></label>
                                            <select class="currency-select" required name="currency_id">
                                                <option value="1">IDR</option>
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
                                            <input type="text" value="INDONESIA RUPIAH" disabled class="form-control"
                                                name="currency_desc" id="currency_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="payment_term_id">Payment Term Code <span
                                                    style="color: red;">*</span></label>
                                            <select class="term-select" required name="payment_term_id">
                                                <option></option>
                                            </select>

                                            @error('payment_term_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="term_desc"> </label>
                                            <input type="text" value="{{ old('term_desc') }}" disabled
                                                class="form-control" name="term_desc" id="term_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vat_code_id">VAT Code </label>
                                            <select class="vat-select" name="vat_code_id">
                                                <option></option>
                                            </select>

                                            @error('vat_code_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="vat_desc"> </label>
                                            <input type="text" value="{{ old('vat_desc') }}" disabled
                                                class="form-control" name="vat_desc" id="vat_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="local_name">Local Name </label>
                                    <input type="text" value="{{ old('local_name') }}"
                                        class="form-control @error('local_name') is-invalid @enderror" name="local_name"
                                        id="local_name">
                                    @error('local_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                                <div class="form-group">
                                    <label for="telex">Telex </label>
                                    <input type="text" value="{{ old('telex') }}"
                                        class="form-control @error('telex') is-invalid @enderror" name="telex"
                                        id="telex">
                                    @error('telex')
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
                                    <label for="address_3"> </label>
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
                                    <label for="address_4"> </label>
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
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postal_code">Postal Code </label>
                                            <input type="text" value="{{ old('postal_code') }}"
                                                class="form-control @error('postal_code') is-invalid @enderror"
                                                name="postal_code" id="postal_code">
                                            @error('postal_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="province">State/Province </label>
                                            <input type="text" value="{{ old('province') }}"
                                                class="form-control @error('province') is-invalid @enderror"
                                                name="province" id="province">
                                            @error('province')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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
                                <div class="form-group">
                                    <label for="place">Place </label>
                                    <input type="text" value="{{ old('place') }}" class="form-control"
                                        name="place" id="place">
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


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('vendors.index') }}" class="btn btn-danger">Back</a>
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

            $("input[data-type='currency0']").on({
                keyup: function() {
                    // skip for arrow keys
                    if (event.which >= 37 && event.which <= 40) return;
                    // format number
                    $(this).val(function(index, value) {
                        return value
                            .replace(/\D/g, "")
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    });
                },
            });

            $("input[data-type='currency3']").on({
                keyup: function() {
                    formatCurrency3($(this));
                },
                blur: function() {
                    formatCurrency3($(this), "blur");
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
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('.term-select').select2({
                placeholder: 'Search payment term',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.payterm') }}',
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
                    cache: true
                }
            });

            $('.vat-select').select2({
                placeholder: 'Search vat code',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.vat') }}',
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
                    cache: true
                }
            });

            $('.type-select').select2({
                placeholder: 'Search vendor type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.ventype') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type}`,
                                    id: item.id,
                                    custom_attribute: item.type_name
                                }
                            })
                        };
                    },
                    cache: true
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
                    cache: true
                }
            });

            $('.customer-select').select2({
                placeholder: 'Search customer',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.customer') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.id,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $(".customer-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=customer_desc]").val(desc);
            });

            $(".currency-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=currency_desc]").val(desc);
            });

            $(".type-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=type_desc]").val(desc);
            });

            $(".term-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=term_desc]").val(desc);
            });

            $(".vat-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=vat_desc]").val(desc);
            });

            $(".city-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=city_desc]").val(desc);
            });

            $(".country-select").change(function(e) {
                e.preventDefault();
                let idd_name = $(this).select2('data')[0].idd_name;
                let country_name = $(this).select2('data')[0].country_name;

                $("input[name=country_desc]").val(country_name);
                $("input[name=telp_idd]").val(idd_name);
                $("input[name=fax_idd]").val(idd_name);
            });

        });
    </script>
@endsection
