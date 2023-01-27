@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Charge Code', 'title_2' => 'Master'])
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
                    <h6>Form Add Charge Code</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('charge_code.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="item_code">Item Code <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('item_code') }}"
                                        class="form-control @error('item_code') is-invalid @enderror" autofocus
                                        autocomplete="off" required name="item_code" id="item_code">
                                    @error('item_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="item_description">Item Description </label>
                                    <input type="text" value="{{ old('item_description') }}"
                                        class="form-control @error('item_description') is-invalid @enderror"
                                        name="item_description" id="item_description">
                                    @error('item_description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="split_by_method">Split By Method </label>
                                    <select name="split_by_method" id="split_by_method" class="form-control chosen-select">
                                        <option value="">Select an option</option>
                                        <option value="J - Job" @selected(old('split_by_method') == 'J - Job')>J - Job</option>
                                        <option value="C - Charge Weight" @selected(old('split_by_method') == 'C - Charge Weight')>C - Charge Weight
                                        </option>
                                        <option value="V - Volume" @selected(old('split_by_method') == 'V - Volume')>V - Volume</option>
                                        <option value="W - Gross Weight" @selected(old('split_by_method') == 'W - Gross Weight')>W - Gross Weight
                                        </option>
                                    </select>
                                    @error('split_by_method')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="charge_unit">Charge Unit </label>
                                    <select name="charge_unit" id="charge_unit" class="form-control chosen-select">
                                        <option value="">Select an option</option>
                                        <option value="20FT CONTAINER" @selected(old('charge_unit') == '20FT CONTAINER')>20FT CONTAINER</option>
                                        <option value="40FT CONTAINER" @selected(old('charge_unit') == '40FT CONTAINER')>40FT CONTAINER
                                        </option>
                                        <option value="45FT CONTAINER" @selected(old('charge_unit') == '45FT CONTAINER')>45FT CONTAINER
                                        </option>
                                        <option value="TOTAL CONTAINER" @selected(old('charge_unit') == 'TOTAL CONTAINER')>TOTAL CONTAINER
                                        </option>
                                        <option value="REV TON/CHARGE WEIGHT" @selected(old('charge_unit') == 'REV TON/CHARGE WEIGHT')>REV TON/CHARGE
                                            WEIGHT
                                        </option>
                                        <option value="REV TON RND UP" @selected(old('charge_unit') == 'REV TON RND UP')>REV TON RND UP
                                        </option>
                                        <option value="SHIPMENT" @selected(old('charge_unit') == 'SHIPMENT')>SHIPMENT</option>
                                        <option value="HOUSE" @selected(old('charge_unit') == 'HOUSE')>HOUSE</option>
                                        <option value="SUBHOUSE B/L" @selected(old('charge_unit') == 'SUBHOUSE B/L')>SUBHOUSE B/L</option>
                                        <option value="VOLUME" @selected(old('charge_unit') == 'VOLUME')>VOLUME</option>
                                        <option value="WEIGHT" @selected(old('charge_unit') == 'WEIGHT')>WEIGHT</option>
                                        <option value="PCS" @selected(old('charge_unit') == 'PCS')>PCS</option>
                                        <option value="CCFEE" @selected(old('charge_unit') == 'CCFEE')>CCFEE</option>
                                        <option value="BLOCK OF 4 M3" @selected(old('charge_unit') == 'BLOCK OF 4 M3')>BLOCK OF 4 M3</option>
                                        <option value="BLOCK OF 3 M3" @selected(old('charge_unit') == 'BLOCK OF 3 M3')>BLOCK OF 3 M3</option>
                                        <option value="INVOICE CHARGE WEIGHT" @selected(old('charge_unit') == 'INVOICE CHARGE WEIGHT')>INVOICE CHARGE
                                            WEIGHT
                                        </option>
                                    </select>
                                    @error('charge_unit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cost_center_code">Cost Center Code </label>
                                    <input type="text" value="{{ old('cost_center_code') }}"
                                        class="form-control @error('cost_center_code') is-invalid @enderror"
                                        name="cost_center_code" id="cost_center_code">
                                    @error('cost_center_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sales_cost">Sales/Cost </label>
                                    <select name="sales_cost" id="sales_cost"
                                        class="form-control chosen-select @error('sales_cost') is-invalid @enderror">
                                        <option value="">Select an Option</option>
                                        <option value="S - Sales" @selected(old('sales_cost') == 'S - Sales')>S - Sales</option>
                                        <option value="C - Cost" @selected(old('sales_cost') == 'C - Cost')>C - Cost</option>
                                    </select>
                                    @error('sales_cost')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="site_code">Site Code </label>
                                    <input type="text" value="{{ old('site_code') }}"
                                        class="form-control @error('site_code') is-invalid @enderror" name="site_code"
                                        id="site_code">
                                    @error('site_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="recoverable">Recoverable </label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="recoverable" @checked(old('recoverable') == 'yes')
                                            value="yes" data-toggle="toggle" data-on="Yes" data-off="No"
                                            data-onstyle="primary" data-offstyle="danger">
                                        @error('recoverable')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lock">Lock </label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="lock" @checked(old('lock') == 'yes')
                                            value="yes" data-toggle="toggle" data-on="Yes" data-off="No"
                                            data-onstyle="primary" data-offstyle="danger">
                                        @error('lock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="dept_code">Department Code </label>
                                            <input type="text" value="{{ old('dept_code') }}"
                                                class="form-control @error('dept_code') is-invalid @enderror"
                                                name="dept_code" id="dept_code">
                                            @error('dept_code')
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
                                            <label for="sales_acc_code">Sales Account Code </label>
                                            <input type="text" value="{{ old('sales_acc_code') }}"
                                                class="form-control @error('sales_acc_code') is-invalid @enderror"
                                                name="sales_acc_code" id="sales_acc_code">
                                            @error('sales_acc_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cost_acc_code">Cost Account Code </label>
                                            <input type="text" value="{{ old('cost_acc_code') }}"
                                                class="form-control @error('cost_acc_code') is-invalid @enderror"
                                                name="cost_acc_code" id="cost_acc_code">
                                            @error('cost_acc_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="currency_id">Currency </label>
                                            <select class="currency-select" name="currency_id">
                                                <option></option>
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
                                            <input type="text" value="{{ old('currency_desc') }}" disabled
                                                class="form-control" name="currency_desc" id="currency_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="uom_id">Unit Of Measurement </label>
                                            <select class="uom-select" name="uom_id">
                                                <option></option>
                                            </select>

                                            @error('uom_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="uom_desc"> </label>
                                            <input type="text" value="{{ old('uom_desc') }}" disabled
                                                class="form-control" name="uom_desc" id="uom_desc">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="wt_code_id">WHT Code </label>
                                            <select class="wt-select" name="wt_code_id">
                                                <option></option>
                                            </select>

                                            @error('wt_code_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wt_code_desc"> </label>
                                            <input type="text" value="{{ old('wt_code_desc') }}" readonly
                                                class="form-control" name="wt_code_desc" id="wt_code_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cost_percent">Cost Percent (%) </label>
                                            <input type="text" value="{{ old('cost_percent') }}" data-type='currency'
                                                autocomplete="off"
                                                class="form-control @error('cost_percent') is-invalid @enderror"
                                                name="cost_percent" id="cost_percent">
                                            @error('cost_percent')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="cost_ammount">Cost Ammount </label>
                                            <input type="text" value="{{ old('cost_ammount') }}" data-type='currency'
                                                autocomplete="off"
                                                class="form-control @error('cost_ammount') is-invalid @enderror"
                                                name="cost_ammount" id="cost_ammount">
                                            @error('cost_ammount')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vat_code_id">Code </label>
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
                                            <label for="vat_code_desc"> </label>
                                            <input type="text" value="{{ old('vat_code_desc') }}" disabled
                                                class="form-control" name="vat_code_desc" id="vat_code_desc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cost_code">Cost Code </label>
                                            <select class="costvat-select" name="cost_code">
                                                <option></option>
                                            </select>

                                            @error('cost_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="cost_code_desc"> </label>
                                            <input type="text" value="{{ old('cost_code_desc') }}" readonly
                                                class="form-control" name="cost_code_desc" id="cost_code_desc">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="overflow:auto;">
                                <table id="table-condition" class="table table-bordered table-sm table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center th-action" style="min-width: 120px;"> Action </th>
                                            <th class="text-center" style="min-width: 200px;"> Module </th>
                                            <th class="text-center" style="min-width: 200px;"> Job Type </th>
                                            <th class="text-center" style="min-width: 200px;"> Sales Acc Code </th>
                                            <th class="text-center" style="min-width: 200px;"> Cost Acc Code </th>
                                            <th class="text-center" style="min-width: 200px;"> Adv Acc Code </th>
                                        </tr>
                                    </thead>

                                    <tbody id="tbody-condition">
                                        <tr class="dynamic-field" id="dynamic-field-1">
                                            <td class="text-center">
                                                <button type="button" onclick="addNewField(this)" id="add-button"
                                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm"><i
                                                        class="fa fa-plus fa-fw"></i>
                                                </button>
                                                <button type="button" onclick="removeLastField(this)" id="remove-button"
                                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1"><i
                                                        class="fa fa-minus fa-fw"></i>
                                                </button>

                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="module[]" id="module-detail-select-1"
                                                        class="module-detail-select">
                                                        <option value="">Search</option>

                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="job_type[]" id="job-select-1" class="job-select">
                                                        <option value="">Search</option>

                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        name="sales_acc_code_detail[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        name="cost_acc_code_detail[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        name="adv_acc_code[]">
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-12">
                                <a href="{{ route('charge_code.index') }}" class="btn btn-danger">Back</a>
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
                count = totalFields() + Math.floor(Math.random() * 999) + 1;;
                field = $("#dynamic-field-1").clone();
                field.attr("id", "dynamic-field-" + count);
                field.find('.module-detail-select').attr("id", "module-detail-select-" + count).select2({
                    placeholder: 'Search module',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('charge.job') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.module_code}`,
                                        id: item.module_code,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.find('.job-select').attr("id", "job-select-" + count).select2({
                    placeholder: 'Search job type',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('charge.job') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.type} | ${item.description}`,
                                        id: item.type,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.children("label").text("Field " + count);
                field.find("input").val("");
                field.find(".select2-container").remove();
                field.find(".select2-container").empty();
                $(className + ":last").after($(field));

                $(`#module-detail-select-1`).select2({
                    placeholder: 'Search module',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('charge.job') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.module_code}`,
                                        id: item.module_code,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#job-select-1`).select2({
                    placeholder: 'Search job type',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('charge.job') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.type} | ${item.description}`,
                                        id: item.type,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#job-select-${count}`).select2({
                    placeholder: 'Search job type',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('charge.job') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.type} | ${item.description}`,
                                        id: item.type,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                $(`#module-detail-select-${count}`).select2({
                    placeholder: 'Search module',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('charge.job') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.module_code}`,
                                        id: item.module_code,
                                    }
                                })
                            };
                        },
                        cache: false
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
            if ($('#tbody-condition tr').length > 1) {
                $(obj).closest('tr').remove();
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

            $(`#module-detail-select-1`).select2({
                placeholder: 'Search module',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('charge.job') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.module_code}`,
                                    id: item.module_code,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(`#job-select-1`).select2({
                placeholder: 'Search job type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('charge.job') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type} | ${item.description}`,
                                    id: item.type,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(`.module-detail-select`).select2({
                placeholder: 'Search module',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('charge.job') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.module_code}`,
                                    id: item.module_code,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(`.job-select`).select2({
                placeholder: 'Search job type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('charge.job') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type} | ${item.description}`,
                                    id: item.type,
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

            $('.uom-select').select2({
                placeholder: 'Search uom',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('charge.uom') }}',
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

            $('.wt-select').select2({
                placeholder: 'Search wht code',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('charge.wht') }}',
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

            $('.module-select').select2({
                placeholder: 'Search job type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('charge.job') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.module_code}`,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.vat-select').select2({
                placeholder: 'Search code',
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
                    cache: false
                }
            });

            $('.costvat-select').select2({
                placeholder: 'Search cost code',
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
                                    id: item.code,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.cic-select').select2({
                placeholder: 'Search consolidation item code',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('charge.item') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.item_code}`,
                                    id: item.item_code,
                                    custom_attribute: item.item_description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".currency-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=currency_desc]").val(desc);
            });

            $(".uom-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=uom_desc]").val(desc);
            });

            $(".wt-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=wt_code_desc]").val(desc);
            });

            $(".vat-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=vat_code_desc]").val(desc);
            });

            $(".costvat-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=cost_code_desc]").val(desc);
            });

            $(".cic-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=consolidation_item_desc]").val(desc);
            });

        });
    </script>
@endsection
