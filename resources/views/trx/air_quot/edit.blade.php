@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', [
        'title' => 'Air Freight Quotation',
        'title_2' => 'Transaction',
    ])
    <div class="row mt-1 px-1">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }}</strong>
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4 ">
                <div class="card-header pb-0">
                    <h6>Form Edit Air Freight Quotation</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <form action="{{ route('air_quot.update', $aq->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="container-fluid">
                            <div class="row mt-3">
                                <div class="col-md-12">

                                    <div class="tabset">
                                        <!-- Tab 1 -->
                                        <input type="radio" name="tabset" id="tab1" aria-controls="corres" checked>
                                        <label for="tab1">Correspondence</label>
                                        <!-- Tab 2 -->
                                        <input type="radio" name="tabset" id="tab2" aria-controls="fch">
                                        <label for="tab2">Freight Charge</label>
                                        <!-- Tab 3 -->
                                        <input type="radio" name="tabset" id="tab3" aria-controls="lch">
                                        <label for="tab3">Local Charge</label>

                                        <div class="tab-panels col-md-12">
                                            <section id="corres" class="tab-panel">
                                                @include('trx.air_quot.corres_edit')
                                            </section>
                                            <section id="fch" class="tab-panel">
                                                @include('trx.air_quot.fch_edit')
                                            </section>
                                            <section id="lch" class="tab-panel">
                                                @include('trx.air_quot.lch_edit')
                                            </section>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-12">
                                    <a href="{{ route('air_quot.index') }}" class="btn btn-danger btn-back">Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
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
        let maxFields = MAX_FIELD;

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('form').bind('submit', function() {
                $(this).find(':input').prop('disabled', false);
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
                            .replace(/\B(?=(\d{3})+(?!\d))/g, "");
                    });
                },
            });

            $("input[data-type='currency4']").on({
                keyup: function() {
                    formatCurrency4($(this));
                },
                blur: function() {
                    formatCurrency4($(this), "blur");
                }
            });

            $("input[data-type='currency_amt']").on({
                keyup: function() {
                    formatCurrencyAmt($(this));
                },
                blur: function() {
                    formatCurrencyAmt($(this), "blur");
                }
            });
        });

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

        function formatCurrency4(input, blur) {
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
                    right_side += "0000";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 4);

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
                if (input_val.length > 10) {
                    input_val += ".0000";
                }

                if (blur === "blur") {
                    input_val += ".0000";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

        function formatCurrencyAmt(input, blur) {
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
                if (input_val.length > 10) {
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
    </script>
@endsection
