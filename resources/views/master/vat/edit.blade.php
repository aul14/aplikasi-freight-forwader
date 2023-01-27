@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'VAT Code', 'title_2' => 'Master'])
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
                    <h6>Form Edit VAT Code</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('vat_code.update', $vat_code->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="code">VAT Code <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('code', $vat_code->code) }}"
                                        class="form-control @error('code') is-invalid @enderror" readonly name="code"
                                        id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type">VAT Type</label>
                                    <select name="type" id="type"
                                        class="form-control chosen-select @error('type') is-invalid @enderror">
                                        <option value="">Select an Option</option>
                                        <option value="ZER" @selected(old('type', $vat_code->type) == 'ZER')>ZER</option>
                                        <option value="STD" @selected(old('type', $vat_code->type) == 'STD')>STD</option>
                                        <option value="EXM" @selected(old('type', $vat_code->type) == 'EXM')>EXM</option>
                                        <option value="OUT" @selected(old('type', $vat_code->type) == 'OUT')>OUT</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sales_cost">Sales/Cost</label>
                                    <select name="sales_cost" id="sales_cost"
                                        class="form-control chosen-select @error('sales_cost') is-invalid @enderror">
                                        <option value="">Select an Option</option>
                                        <option value="S - Sales" @selected(old('sales_cost', $vat_code->sales_cost) == 'S - Sales')>S - Sales</option>
                                        <option value="C - Cost" @selected(old('sales_cost', $vat_code->sales_cost) == 'C - Cost')>C - Cost</option>
                                    </select>
                                    @error('sales_cost')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inclusice">Inclusive</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="inclusice" @checked(old('inclusice', $vat_code->inclusice) == 'yes') value="yes"
                                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                                            data-offstyle="danger">
                                        @error('inclusice')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="description">VAT Description </label>
                                    <input type="text" value="{{ old('description', $vat_code->description) }}"
                                        class="form-control @error('description') is-invalid @enderror" autocomplete="off"
                                        name="description" id="description">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input_ta_code">Input Tax Account Code</label>
                                            <input type="text" name="input_ta_code" id="input_ta_code"
                                                value="{{ old('input_ta_code', $vat_code->input_ta_code) }}"
                                                autocomplete="off"
                                                class="form-control @error('input_ta_code') is-invalid @enderror">
                                            @error('input_ta_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="output_ta_code">Output Tax Account Code</label>
                                            <input type="text" name="output_ta_code" id="output_ta_code"
                                                value="{{ old('output_ta_code', $vat_code->output_ta_code) }}"
                                                autocomplete="off"
                                                class="form-control @error('output_ta_code') is-invalid @enderror">
                                            @error('output_ta_code')
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
                                            <label for="paid_in_ta_code">Paid In Tax Account Code</label>
                                            <input type="text" name="paid_in_ta_code" id="paid_in_ta_code"
                                                value="{{ old('paid_in_ta_code', $vat_code->paid_in_ta_code) }}"
                                                autocomplete="off"
                                                class="form-control @error('paid_in_ta_code') is-invalid @enderror">
                                            @error('paid_in_ta_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paid_out_ta_code">Paid Out Tax Account Code</label>
                                            <input type="text" name="paid_out_ta_code" id="paid_out_ta_code"
                                                value="{{ old('paid_out_ta_code', $vat_code->paid_out_ta_code) }}"
                                                autocomplete="off"
                                                class="form-control @error('paid_out_ta_code') is-invalid @enderror">
                                            @error('paid_out_ta_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                        @if (count($detail_vat) > 0)
                            @foreach ($detail_vat as $key => $item)
                                <div class="row dynamic-field" id="dynamic-field-{{ $key + 1 }}">
                                    <div class="col md-12">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <div class="clearfix">
                                                            <button type="button" onclick="return addNewField(this)"
                                                                id="add-button"
                                                                class="btn btn-xs btn-primary float-left text-uppercase shadow-sm"><i
                                                                    class="fa fa-plus fa-fw"></i>
                                                            </button>
                                                            <button type="button" onclick="return removeLastField(this)"
                                                                id="remove-button"
                                                                class="btn btn-xs btn-danger float-left text-uppercase ml-1"><i
                                                                    class="fa fa-minus fa-fw"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <input type="text" autocomplete="off"
                                                                value="{{ $item->date != null ? date('d/m/Y', strtotime($item->date)) : '' }}"
                                                                class="form-control date-picker" name="date[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label>VAT Rate</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ number_format($item->vat_rate, 3, '.', ',') }}"
                                                                data-type='currency63' autocomplete="off"
                                                                name="vat_rate_detail[]" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row dynamic-field" id="dynamic-field-1">
                                <div class="col md-12">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="clearfix">
                                                        <button type="button" onclick="return addNewField(this)"
                                                            id="add-button"
                                                            class="btn btn-xs btn-primary float-left text-uppercase shadow-sm"><i
                                                                class="fa fa-plus fa-fw"></i>
                                                        </button>
                                                        <button type="button" onclick="return removeLastField(this)"
                                                            id="remove-button"
                                                            class="btn btn-xs btn-danger float-left text-uppercase ml-1"><i
                                                                class="fa fa-minus fa-fw"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="text" autocomplete="off"
                                                            class="form-control date-picker" name="date[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label>VAT Rate</label>
                                                        <input type="text" class="form-control" data-type='currency63'
                                                            autocomplete="off" name="vat_rate_detail[]" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('vat_code.index') }}" class="btn btn-danger">Back</a>
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
        let buttonAdd = $("#add-button");
        let buttonRemove = $("#remove-button");
        let className = ".dynamic-field";
        let count = 0;
        let field = "";
        let maxFields = MAX_FIELD;

        function totalFields() {
            return $(className).length;
        }

        function addNewField(obj) {
            if (totalFields() < maxFields) {
                count = totalFields() + 1;
                field = $("#dynamic-field-1").clone();
                field.attr("id", "dynamic-field-" + count);
                field.children("label").text("Field " + count);
                field.find("input").val("");
                field.find(".select2-container").empty();
                $(className + ":last").after($(field));

                $('.date-picker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true,
                    todayHighlight: true
                });

                $("input[data-type='currency63']").on({
                    keyup: function() {
                        formatCurrency63($(this));
                    },
                    blur: function() {
                        formatCurrency63($(this), "blur");
                    }
                });

                $("input[type=text]").keyup(function() {
                    $(this).val($(this).val().toUpperCase());
                });
            } else {
                alert(`Maximum ${maxFields} line`);
            }
        }

        function removeLastField(obj) {
            if (totalFields() > 1) {
                $(obj).closest(className).remove();
            } else {
                alert("Minimum 1 line");
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


        function formatCurrency33(input, blur) {
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
                if (input_val.length > 3) {
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

        function formatCurrency63(input, blur) {
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
                if (input_val.length > 6) {
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


            $("input[data-type='currency33']").on({
                keyup: function() {
                    formatCurrency33($(this));
                },
                blur: function() {
                    formatCurrency33($(this), "blur");
                }
            });

            $("input[data-type='currency63']").on({
                keyup: function() {
                    formatCurrency63($(this));
                },
                blur: function() {
                    formatCurrency63($(this), "blur");
                }
            });
        });
    </script>
@endsection
