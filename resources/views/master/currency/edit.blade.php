@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Currency', 'title_2' => 'Master'])
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
                    <h6>Form Edit Currency</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('currency.update', $currency->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Currency Code <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('code', $currency->code) }}"
                                        class="form-control @error('code') is-invalid @enderror" readonly name="code"
                                        id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Currency Description <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('description', $currency->description) }}"
                                        class="form-control @error('description') is-invalid @enderror" autocomplete="off"
                                        required name="description" id="description">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="large_name">Large Currency Name</label>
                                    <input type="text" name="large_name" id="large_name"
                                        value="{{ old('large_name', $currency->large_name) }}"
                                        class="form-control @error('large_name') is-invalid @enderror">
                                    @error('large_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="small_name">Small Currency Name</label>
                                    <input type="text" name="small_name" id="small_name"
                                        value="{{ old('small_name', $currency->small_name) }}"
                                        class="form-control @error('small_name') is-invalid @enderror">
                                    @error('small_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="markup_percent">Markup Percent (%)</label>
                                    <input type="text" name="markup_percent" id="markup_percent" data-type='currency'
                                        value="{{ old('markup_percent', $markup_percent) }}" autocomplete="off"
                                        class="form-control @error('markup_percent') is-invalid @enderror">
                                    @error('markup_percent')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="variance_percent">Variance Percent</label>
                                    <input type="text" name="variance_percent" id="variance_percent"
                                        value="{{ old('variance_percent', $variance_percent) }}" data-type='currency3'
                                        autocomplete="off"
                                        class="form-control @error('variance_percent') is-invalid @enderror">
                                    @error('variance_percent')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if (count($detail_cr) > 0)
                            @foreach ($detail_cr as $item)
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
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <input type="text" autocomplete="off"
                                                                value="{{ $item->date != null ? date('d/m/Y', strtotime($item->date)) : '' }}"
                                                                class="form-control date-picker" name="date[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Curr Rate</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ number_format($item->curr_rate, 2, '.', ',') }}"
                                                                data-type='currency' autocomplete="off"
                                                                name="curr_rate[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <label>Remark</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->remark }}" autocomplete="off"
                                                                name="remark[]">
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
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="text" autocomplete="off"
                                                            class="form-control date-picker" name="date[]">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Curr Rate</label>
                                                        <input type="text" class="form-control" data-type='currency'
                                                            autocomplete="off" name="curr_rate[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label>Remark</label>
                                                        <input type="text" class="form-control" autocomplete="off"
                                                            name="remark[]">
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
                                <a href="{{ route('currency.index') }}" class="btn btn-danger btn-back">Back</a>
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
                count = totalFields() + Math.floor(Math.random() * 999) + 1;
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

                $("input[data-type='currency']").on({
                    keyup: function() {
                        formatCurrency($(this));
                    },
                    blur: function() {
                        formatCurrency($(this), "blur");
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
                if (input_val.length > 12) {
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
        });
    </script>
@endsection
