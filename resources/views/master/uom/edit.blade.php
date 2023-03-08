@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Unit Of Measurement', 'title_2' => 'Master'])
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
                    <h6>Form Edit Unit Of Measurement</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('uom.update', $uom->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Uom Code <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('code', $uom->code) }}"
                                        class="form-control @error('code') is-invalid @enderror" readonly name="code"
                                        id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Uom Description <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('description', $uom->description) }}"
                                        class="form-control @error('description') is-invalid @enderror" required
                                        name="description" id="description">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Uom Type </label>
                                    <select name="type" id="type" class="form-control chosen-select">
                                        <option value="">Select an option</option>
                                        <option value="QUANTITY" @selected(old('type', $uom->type) == 'QUANTITY')>QUANTITY</option>
                                        <option value="VOLUME" @selected(old('type', $uom->type) == 'VOLUME')>VOLUME</option>
                                        <option value="WEIGHT" @selected(old('type', $uom->type) == 'WEIGHT')>WEIGHT</option>
                                        <option value="OTHERS" @selected(old('type', $uom->type) == 'OTHERS')>OTHERS</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="conversion_factor">Conversion Factor </label>
                                    <input type="text" value="{{ old('conversion_factor', $conversion_factor) }}"
                                        autocomplete="off" data-type='currency6'
                                        class="form-control @error('conversion_factor') is-invalid @enderror"
                                        name="conversion_factor" id="conversion_factor">
                                    @error('conversion_factor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('uom.index') }}" class="btn btn-danger btn-back">Back</a>
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

        function formatCurrency6(input, blur) {
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
                    right_side += "000000";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 6);

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
                if (input_val.length > 9) {
                    input_val += ".000000";
                }

                if (blur === "blur") {
                    input_val += ".000000";
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

            $("input[data-type='currency6']").on({
                keyup: function() {
                    formatCurrency6($(this));
                },
                blur: function() {
                    formatCurrency6($(this), "blur");
                }
            });
        });
    </script>
@endsection
