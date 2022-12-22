@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Payment Term', 'title_2' => 'Master'])
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
                    <h6>Form Edit Payment Term</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pay_term.update', $pay_term->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Payment Term Code <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('code', $pay_term->code) }}" readonly
                                        class="form-control @error('code') is-invalid @enderror" autofocus
                                        autocomplete="off" required name="code" id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Payment Term Description <span
                                            style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('description', $pay_term->description) }}"
                                        class="form-control @error('description') is-invalid @enderror" autocomplete="off"
                                        required name="description" id="description">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="net_days">Net Days <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('net_days', $net_days) }}" data-type='currency0'
                                        maxlength="6" class="form-control @error('net_days') is-invalid @enderror"
                                        autocomplete="off" required name="net_days" id="net_days">
                                    @error('net_days')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="net_date">Net Date ?</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="net_date" @checked(old('net_date', $pay_term->net_date) == 'yes') value="yes"
                                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                                            data-offstyle="danger">
                                        @error('net_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="shipment_date_flag">Shipment Date Flag</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="shipment_date_flag" @checked(old('shipment_date_flag', $pay_term->shipment_date_flag) == 'yes')
                                            value="yes" data-toggle="toggle" data-on="Yes" data-off="No"
                                            data-onstyle="primary" data-offstyle="danger">
                                        @error('shipment_date_flag')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount_days">Discount Days </label>
                                    <input type="text" value="{{ old('discount_days', $discount_days) }}"
                                        data-type='currency0' maxlength="6"
                                        class="form-control @error('discount_days') is-invalid @enderror" autocomplete="off"
                                        name="discount_days" id="discount_days">
                                    @error('discount_days')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="discount_date">Discount Date ?</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="discount_date" @checked(old('discount_date', $pay_term->discount_date) == 'yes')
                                            value="yes" data-toggle="toggle" data-on="Yes" data-off="No"
                                            data-onstyle="primary" data-offstyle="danger">
                                        @error('discount_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="discount_percent">Discount Percentage </label>
                                    <input type="text" value="{{ old('discount_percent', $discount_percent) }}"
                                        data-type='currency3'
                                        class="form-control @error('discount_percent') is-invalid @enderror"
                                        autocomplete="off" name="discount_percent" id="discount_percent">
                                    @error('discount_percent')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="service_charge_min">Service Charge Min Amount </label>
                                    <input type="text" value="{{ old('service_charge_min', $service_charge_min) }}"
                                        data-type='currency'
                                        class="form-control @error('service_charge_min') is-invalid @enderror"
                                        autocomplete="off" name="service_charge_min" id="service_charge_min">
                                    @error('service_charge_min')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="service_charge_percent">Service Charge Percent </label>
                                    <input type="text"
                                        value="{{ old('service_charge_percent', $service_charge_percent) }}"
                                        data-type='currency3'
                                        class="form-control @error('service_charge_percent') is-invalid @enderror"
                                        autocomplete="off" name="service_charge_percent" id="service_charge_percent">
                                    @error('service_charge_percent')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('pay_term.index') }}" class="btn btn-danger">Back</a>
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

        });
    </script>
@endsection
