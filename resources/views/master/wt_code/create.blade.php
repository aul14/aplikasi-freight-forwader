@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'W/T Code', 'title_2' => 'Master'])
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
                    <h6>Form Add W/T Code</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('wt_code.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">With Hold Tax Code <span style="color: red;">*</span></label>
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
                                    <label for="description">Tax Description </label>
                                    <input type="text" value="{{ old('description') }}"
                                        class="form-control @error('description') is-invalid @enderror" autocomplete="off"
                                        name="description" id="description">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tax_rate">Tax Rate</label>
                                    <input type="text" value="{{ old('tax_rate') }}"
                                        class="form-control @error('tax_rate') is-invalid @enderror" data-type="currency3"
                                        autocomplete="off" name="tax_rate" id="tax_rate">
                                    @error('tax_rate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vendor_type_id">Vendor Type </label>
                                    <select name="vendor_type_id" class="vendor_type">
                                        <option value="">Search</option>

                                    </select>
                                    @error('vendor_type_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="wht_c_acc_code">WHT Corporate Account Code </label>
                                    <input type="text" value="{{ old('wht_c_acc_code') }}"
                                        class="form-control @error('wht_c_acc_code') is-invalid @enderror"
                                        autocomplete="off" name="wht_c_acc_code" id="wht_c_acc_code">
                                    @error('wht_c_acc_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="wht_p_acc_code">WHT Personal Account Code </label>
                                    <input type="text" value="{{ old('wht_p_acc_code') }}"
                                        class="form-control @error('wht_p_acc_code') is-invalid @enderror"
                                        autocomplete="off" name="wht_p_acc_code" id="wht_p_acc_code">
                                    @error('wht_p_acc_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('wt_code.index') }}" class="btn btn-danger">Back</a>
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

                // console.log();

                // final formatting
                if (input_val.length >= 7) {
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

            $("input[data-type='currency3']").on({
                keyup: function() {
                    formatCurrency3($(this));
                },
                blur: function() {
                    formatCurrency3($(this), "blur");
                }
            });

            $(`.vendor_type`).select2({
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
                                    text: `${item.type} | ${item.type_name}`,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

        });
    </script>
@endsection
