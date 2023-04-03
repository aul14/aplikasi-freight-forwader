@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Sea Export Job', 'title_2' => 'Transaction'])
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
                    <h6>Form Add Sea Export Job</h6>
                </div>
                <form action="{{ route('sea_ex_job.update', $sj->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tabset">
                                    <!-- Tab 1 -->
                                    <input type="radio" name="tabset" id="tab1" aria-controls="b_l" checked>
                                    <label for="tab1">B/L Info</label>
                                    <!-- Tab 2 -->
                                    <input type="radio" name="tabset" id="tab2" aria-controls="s_i">
                                    <label for="tab2">Shipment Info</label>
                                    <!-- Tab 3 -->
                                    <input type="radio" name="tabset" id="tab3" aria-controls="v_d">
                                    <label for="tab3">Vessel Details</label>
                                    <!-- Tab 4 -->
                                    <input type="radio" name="tabset" id="tab4" aria-controls="c_i">
                                    <label for="tab4">Cargo Info</label>
                                    <!-- Tab 5 -->
                                    <input type="radio" name="tabset" id="tab5" aria-controls="e_i">
                                    <label for="tab5">Extra Info</label>
                                    <!-- Tab 6 -->
                                    <input type="radio" name="tabset" id="tab6" aria-controls="j_c">
                                    <label for="tab6">Job Costing</label>

                                    <div class="tab-panels col-md-12">
                                        <section id="b_l" class="tab-panel">
                                            @include('trx.sea_ex_job.bl_edit', ['jm' => $sj->jm])
                                        </section>

                                        <section id="s_i" class="tab-panel">
                                            @include('trx.sea_ex_job.si_edit', ['sd1' => $sj->s_d1])
                                        </section>

                                        <section id="v_d" class="tab-panel">
                                            @include('trx.sea_ex_job.vd_edit', ['sd2' => $sj->s_d2])
                                        </section>

                                        <section id="c_i" class="tab-panel">
                                            @include('trx.sea_ex_job.ci_edit', ['sd3' => $sj->s_d3])
                                        </section>

                                        <section id="e_i" class="tab-panel">
                                            @include('trx.sea_ex_job.ei_edit', ['sd4' => $sj->s_d4])
                                        </section>

                                        <section id="j_c" class="tab-panel">
                                            @include('trx.sea_ex_job.jc_edit', ['sd5' => $sj->s_d5])
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('sea_ex_job.index') }}" class="btn btn-danger btn-back">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                </form>
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

            $('.select-2').select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
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
