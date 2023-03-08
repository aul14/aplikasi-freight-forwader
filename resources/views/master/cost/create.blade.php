@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Cost Table', 'title_2' => 'Master'])
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
                    <h6>Form Add Cost Table</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('cost_table.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Cost Table No <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" readonly
                                        value="NEW" name="code" id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Cost Table Description </label>
                                    <input type="text" value="{{ old('description') }}" autocomplete="off" autofocus
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        id="description">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="job_type_id">Job Type </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select name="job_type_id"
                                                class="job-type @error('job_type_id') is-invalid @enderror">
                                                <option value="">Search</option>
                                            </select>
                                            @error('job_type_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="effective_date">Effective Date <span
                                                    style="color: red;">*</span></label>
                                            <input type="text" value="{{ old('effective_date', date('d/m/Y')) }}"
                                                autocomplete="off"
                                                class="form-control @error('effective_date') is-invalid @enderror date-picker"
                                                name="effective_date" id="effective_date">
                                            @error('effective_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exp_date">Expiry Date </label>
                                            <input type="text" value="{{ old('exp_date', date('31/12/9999')) }}"
                                                autocomplete="off"
                                                class="form-control @error('exp_date') is-invalid @enderror date-picker"
                                                name="exp_date" id="exp_date">
                                            @error('exp_date')
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
                                            <label for="via_port_code">Via Port </label>
                                            <select class="viaport-select" name="via_port_code">
                                                <option value=""></option>
                                            </select>

                                            @error('via_port_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="via_port_name"> </label>
                                            <input type="text" value="{{ old('via_port_name') }}" readonly
                                                class="form-control" name="via_port_name" id="via_port_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="second_port_code">Second Via Port </label>
                                            <select class="secondport-select" name="second_port_code">
                                                <option value=""></option>
                                            </select>

                                            @error('second_port_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="second_port_name"> </label>
                                            <input type="text" value="{{ old('second_port_name') }}" readonly
                                                class="form-control" name="second_port_name" id="second_port_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="valid_flag">Valid Flag </label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="valid_flag" @checked(old('valid_flag') == 'yes')
                                            value="yes" data-toggle="toggle" data-on="Yes" data-off="No"
                                            data-onstyle="primary" data-offstyle="danger">
                                        @error('valid_flag')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bisnis_party_id">Vendor Code </label>
                                            <select class="vendor-select" name="bisnis_party_id">
                                                <option value=""></option>
                                            </select>

                                            @error('bisnis_party_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="bisnis_party_name"> </label>
                                            <input type="text" value="{{ old('bisnis_party_name') }}" readonly
                                                class="form-control" name="bisnis_party_name" id="bisnis_party_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="port_loading_code">Port Of Loading </label>
                                            <select class="portloading-select" name="port_loading_code">
                                                <option value=""></option>
                                            </select>

                                            @error('port_loading_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="port_loading_name"> </label>
                                            <input type="text" value="{{ old('port_loading_name') }}" readonly
                                                class="form-control" name="port_loading_name" id="port_loading_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="port_discharge_code">Port Of Discharge </label>
                                            <select class="portdischarge-select" name="port_discharge_code">
                                                <option value=""></option>
                                            </select>

                                            @error('port_discharge_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="port_discharge_name"> </label>
                                            <input type="text" value="{{ old('port_discharge_name') }}" readonly
                                                class="form-control" name="port_discharge_name" id="port_discharge_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city_id">Destination </label>
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
                                <div class="form-group">
                                    <label for="note">Note </label>
                                    <textarea name="note" id="note" cols="30" rows="4"
                                        class="form-control @error('note') is-invalid @enderror">{{ old('note') }}</textarea>
                                    @error('note')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="standard_flag">Standard Charge Flag </label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="standard_flag" @checked(old('standard_flag') == 'yes')
                                            value="yes" data-toggle="toggle" data-on="Yes" data-off="No"
                                            data-onstyle="primary" data-offstyle="danger">
                                        @error('standard_flag')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                                            <th class="text-center" style="min-width: 200px;"> Item Code </th>
                                            <th class="text-center" style="min-width: 200px;"> Description </th>
                                            <th class="text-center" style="min-width: 200px;"> Qty </th>
                                            <th class="text-center" style="min-width: 200px;"> Cargo </th>
                                            <th class="text-center" style="min-width: 200px;"> DG </th>
                                            <th class="text-center" style="min-width: 200px;"> UOM </th>
                                            <th class="text-center" style="min-width: 200px;"> Charge </th>
                                            <th class="text-center" style="min-width: 200px;"> Vat </th>
                                            <th class="text-center" style="min-width: 200px;"> P/C </th>
                                            <th class="text-center" style="min-width: 200px;"> Charge Unit </th>
                                            <th class="text-center" style="min-width: 200px;"> Container </th>
                                            <th class="text-center" style="min-width: 200px;"> Rate </th>
                                            <th class="text-center" style="min-width: 200px;"> Currency </th>
                                            <th class="text-center" style="min-width: 200px;"> Min Amount </th>
                                            <th class="text-center" style="min-width: 200px;"> Amount </th>

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
                                                    <select name="charge_code_id[]" id="charge-code-select-1"
                                                        class="charge-code-select">
                                                        <option value="">Search</option>

                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control charge_desc" disabled
                                                        id="charge_desc_1">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control qty-input" id="qty-input-1"
                                                        autocomplete="off" data-type='currency4' name="qty[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="cargo[]" id="cargo-select-1" class="cargo-select">
                                                        <option value="">Search</option>
                                                        <option value="FCL">FCL</option>
                                                        <option value="LCL">LCL</option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="dg[]" id="dg-select-1" class="dg-select">
                                                        <option value="">Search</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="uom_id[]" id="uom-select-1" class="uom-select">
                                                        <option value="">Search</option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="chg[]" id="chg-select-1" class="chg-select">
                                                        <option value="">Search</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="vat_code_id[]" id="vat-select-1" class="vat-select">
                                                        <option value="">Search</option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="p_c[]" id="pc-select-1" class="pc-select">
                                                        <option value="">Search</option>
                                                        <option value="P">P</option>
                                                        <option value="C">C</option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="chg_unit[]" id="chgunit-select-1"
                                                        class="chgunit-select">
                                                        <option value="">Search</option>
                                                        <option value="CONTAINER">CONTAINER</option>
                                                        <option value="REV TON">REV TON</option>
                                                        <option value="SHIPMENT">SHIPMENT</option>
                                                        <option value="HOUSE">HOUSE</option>
                                                        <option value="VOLUME">VOLUME</option>
                                                        <option value="WEIGHT">WEIGHT</option>
                                                        <option value="PCS">PCS</option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="container_id[]" id="container-select-1"
                                                        class="container-select">
                                                        <option value="">Search</option>
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="rate[]" id="rate-select-1" class="rate-select">
                                                        <option value="">Search</option>
                                                        <option value="Break Point">Break Point</option>
                                                        <option value="Std Rate">Std Rate</option>
                                                        <option value="Flat Amount">Flat Amount</option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="currency_id[]" id="currency-select-1"
                                                        class="currency-select">
                                                        <option value="">Search</option>
                                                    </select>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        data-type='currency' name="min_amt[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        data-type='currency_amt' name="amt[]">
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-12">
                                <a href="{{ route('cost_table.index') }}" class="btn btn-danger btn-back">Back</a>
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
        let charge_code = ".charge-code-select";
        let charge_desc = ".charge_desc";
        let chgunit = ".chgunit-select";
        let pc = ".pc-select";
        let chg = ".chg-select";
        let cargo = ".cargo-select";
        let dg = ".dg-select";
        let rate = ".rate-select";
        let currency = ".currency-select";
        let uom = ".uom-select";
        let vat = ".vat-select";
        let container = ".container-select";
        let qty_input = ".qty-input";
        let maxFields = MAX_FIELD;

        function totalFields() {
            return $(className).length;
        }

        function addNewField(obj) {
            if (totalFields() < maxFields) {
                count = totalFields() + Math.floor(Math.random() * 999) + 1;
                field = $("#dynamic-field-1").clone();
                field.attr("id", "dynamic-field-" + count);
                field.find(charge_code).empty();
                field.find(cargo).val("");
                field.find(chgunit).val("");
                field.find(pc).val("");
                field.find(chg).val("");
                field.find(dg).val("");
                field.find(rate).val("");
                field.find(currency).empty();
                field.find(uom).empty();
                field.find(vat).empty();
                field.find(qty_input).attr("id", "qty-input-" + count);
                field.find(charge_code).attr("id", "charge-code-select-" + count).select2({
                    placeholder: 'Search item code',
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
                                        id: item.id,
                                        custom_attribute: item.item_description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.find(charge_desc).attr("id", "charge_desc_" + count);
                field.find(chgunit).attr("id", "chgunit-select-" + count).select2({
                    placeholder: 'Search chg unit',
                    width: "100%",
                    allowClear: true,
                });
                field.find(container).attr("id", "container-select-" + count).select2({
                    placeholder: 'Search container',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.container') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.type} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.find(currency).attr("id", "currency-select-" + count).select2({
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
                                        text: `${item.code} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.find(uom).attr("id", "uom-select-" + count).select2({
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
                                        text: `${item.code} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                field.find(vat).attr("id", "vat-select-" + count).select2({
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
                                        text: `${item.code} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.find(pc).attr("id", "pc-select-" + count).select2({
                    placeholder: 'Search P/C',
                    width: "100%",
                    allowClear: true,
                });
                field.find(chg).attr("id", "chg-select-" + count).select2({
                    placeholder: 'Search chg',
                    width: "100%",
                    allowClear: true,
                });
                field.find(cargo).attr("id", "cargo-select-" + count).select2({
                    placeholder: 'Search cargo',
                    width: "100%",
                    allowClear: true,
                });
                field.find(dg).attr("id", "dg-select-" + count).select2({
                    placeholder: 'Search dg',
                    width: "100%",
                    allowClear: true,
                });
                field.find(rate).attr("id", "rate-select-" + count).select2({
                    placeholder: 'Search rate',
                    width: "100%",
                    allowClear: true,
                });
                field.children("label").text("Field " + count);
                field.find("input").val("");
                field.find(".select2-container").remove();
                field.find(".select2-container").empty();
                $(className + ":last").after($(field));

                $(`#charge-code-select-${count}`).select2({
                    placeholder: 'Search item code',
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
                                        id: item.id,
                                        custom_attribute: item.item_description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#charge-code-select-${count}`).change(function(e) {
                    e.preventDefault();
                    let charge_desc = $(this).select2('data')[0].custom_attribute;

                    $(`#charge_desc_${count}`).val(charge_desc);

                });

                $(`#charge-code-select-1`).select2({
                    placeholder: 'Search item code',
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
                                        id: item.id,
                                        custom_attribute: item.item_description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#chgunit-select-${count}`).select2({
                    placeholder: 'Search chg unit',
                    width: "100%",
                    allowClear: true,
                });

                $(`#pc-select-${count}`).select2({
                    placeholder: 'Search P/C',
                    width: "100%",
                    allowClear: true,
                });

                $(`#chg-select-${count}`).select2({
                    placeholder: 'Search chg',
                    width: "100%",
                    allowClear: true,
                });

                $(`#cargo-select-${count}`).select2({
                    placeholder: 'Search cargo',
                    width: "100%",
                    allowClear: true,
                });

                $(`#dg-select-${count}`).select2({
                    placeholder: 'Search dg',
                    width: "100%",
                    allowClear: true,
                });

                $(`#rate-select-${count}`).select2({
                    placeholder: 'Search rate',
                    width: "100%",
                    allowClear: true,
                });

                $(`#chgunit-select-1`).select2({
                    placeholder: 'Search chg unit',
                    width: "100%",
                    allowClear: true,
                });

                $(`#pc-select-1`).select2({
                    placeholder: 'Search P/C',
                    width: "100%",
                    allowClear: true,
                });

                $(`#chg-select-1`).select2({
                    placeholder: 'Search chg',
                    width: "100%",
                    allowClear: true,
                });

                $(`#cargo-select-1`).select2({
                    placeholder: 'Search cargo',
                    width: "100%",
                    allowClear: true,
                });

                $(`#dg-select-1`).select2({
                    placeholder: 'Search dg',
                    width: "100%",
                    allowClear: true,
                });

                $(`#rate-select-1`).select2({
                    placeholder: 'Search rate',
                    width: "100%",
                    allowClear: true,
                });

                $(`#currency-select-1`).select2({
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
                                        text: `${item.code} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#uom-select-1`).select2({
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
                                        text: `${item.code} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#vat-select-1`).select2({
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
                                        text: `${item.code} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#currency-select-${count}`).select2({
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
                                        text: `${item.code} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#uom-select-${count}`).select2({
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
                                        text: `${item.code} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#vat-select-${count}`).select2({
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
                                        text: `${item.code} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });


                $(`#container-select-1`).select2({
                    placeholder: 'Search container',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.container') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.type} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#container-select-${count}`).select2({
                    placeholder: 'Search container',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.container') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.type} - ${item.description}`,
                                        id: item.id,
                                        custom_attribute: item.description
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

                $("input[data-type='currency']").on({
                    keyup: function() {
                        formatCurrency($(this));
                    },
                    blur: function() {
                        formatCurrency($(this), "blur");
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

                $("input[data-type='currency4']").on({
                    keyup: function() {
                        formatCurrency4($(this));
                    },
                    blur: function() {
                        formatCurrency4($(this), "blur");
                    }
                });

                $(`.chgunit-select`).change(function(e) {
                    e.preventDefault();
                    let val = $(this).val();
                    if (val == "REV TON") {
                        $(`#chg-select-${count}`).attr(`disabled`, true).attr('required', false);
                        $(`#pc-select-${count}`).attr(`disabled`, true).attr('required', false);
                        $(`#container-select-${count}`).attr(`disabled`, true).attr('required', false);
                        $(`#qty-input-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#cargo-select-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#dg-select-${count}`).attr(`disabled`, false);
                        $(`#uom-select-${count}`).attr(`disabled`, false).attr('required', true);
                    } else if (val == `SHIPMENT`) {
                        $(`#qty-input-${count}`).attr(`disabled`, true).attr('required', false);
                        $(`#cargo-select-${count}`).attr(`disabled`, true).attr('required', false);
                        $(`#dg-select-${count}`).attr(`disabled`, true).attr('required', false);
                        $(`#uom-select-${count}`).attr(`disabled`, true).attr('required', false);
                        $(`#container-select-${count}`).attr(`disabled`, true).attr('required', false);
                        $(`#chg-select-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#pc-select-${count}`).attr(`disabled`, false).attr('required', true);
                    } else if (val == `VOLUME` || val == `WEIGHT` || val == `PCS`) {
                        $(`#container-select-${count}`).attr(`disabled`, true).attr('required', false);
                        $(`#qty-input-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#cargo-select-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#dg-select-${count}`).attr(`disabled`, false);
                        $(`#uom-select-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#chg-select-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#pc-select-${count}`).attr(`disabled`, false).attr('required', true);
                    } else {
                        $(`#container-select-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#qty-input-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#cargo-select-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#dg-select-${count}`).attr(`disabled`, false);
                        $(`#uom-select-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#chg-select-${count}`).attr(`disabled`, false).attr('required', true);
                        $(`#pc-select-${count}`).attr(`disabled`, false).attr('required', true);
                    }
                });

                $(`#container-select-${count}`).attr("disabled", false);
                $(`#qty-input-${count}`).attr("disabled", false);
                $(`#cargo-select-${count}`).attr("disabled", false);
                $(`#dg-select-${count}`).attr("disabled", false);
                $(`#uom-select-${count}`).attr("disabled", false);
                $(`#chg-select-${count}`).attr("disabled", false);
                $(`#pc-select-${count}`).attr("disabled", false);

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

            $("input[data-type='currency_amt']").on({
                keyup: function() {
                    formatCurrencyAmt($(this));
                },
                blur: function() {
                    formatCurrencyAmt($(this), "blur");
                }
            });

            $("input[data-type='currency4']").on({
                keyup: function() {
                    formatCurrency4($(this));
                },
                blur: function() {
                    formatCurrency4($(this), "blur");
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

            $(`.chgunit-select`).change(function(e) {
                e.preventDefault();
                let val = $(this).val();
                if (val == "REV TON") {
                    $(`#chg-select-1`).attr(`disabled`, true).attr('required', false);
                    $(`#pc-select-1`).attr(`disabled`, true).attr('required', false);
                    $(`#container-select-1`).attr(`disabled`, true).attr('required', false);
                    $(`#qty-input-1`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#dg-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#uom-select-1`).attr(`disabled`, false).attr('required', true);
                } else if (val == `SHIPMENT`) {
                    $(`#qty-input-1`).attr(`disabled`, true).attr('required', false);
                    $(`#cargo-select-1`).attr(`disabled`, true).attr('required', false);
                    $(`#dg-select-1`).attr(`disabled`, true).attr('required', false);
                    $(`#uom-select-1`).attr(`disabled`, true).attr('required', false);
                    $(`#container-select-1`).attr(`disabled`, true).attr('required', false);
                    $(`#chg-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-select-1`).attr(`disabled`, false).attr('required', true);
                } else if (val == `VOLUME` || val == `WEIGHT` || val == `PCS`) {
                    $(`#container-select-1`).attr(`disabled`, true).attr('required', false);
                    $(`#qty-input-1`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#dg-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#uom-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#chg-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-select-1`).attr(`disabled`, false).attr('required', true);
                } else {
                    $(`#container-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#qty-input-1`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#dg-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#uom-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#chg-select-1`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-select-1`).attr(`disabled`, false).attr('required', true);
                }
            });

            $('.chgunit-select').select2({
                placeholder: 'Search chg unit',
                width: "100%",
                allowClear: true,
            });

            $('.pc-select').select2({
                placeholder: 'Search P/C',
                width: "100%",
                allowClear: true,
            });

            $('.chg-select').select2({
                placeholder: 'Search chg',
                width: "100%",
                allowClear: true,
            });

            $('.cargo-select').select2({
                placeholder: 'Search cargo',
                width: "100%",
                allowClear: true,
            });

            $('.dg-select').select2({
                placeholder: 'Search dg',
                width: "100%",
                allowClear: true,
            });

            $('.rate-select').select2({
                placeholder: 'Search rate',
                width: "100%",
                allowClear: true,
            });

            $('.vendor-select').select2({
                placeholder: 'Search vendor',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.bisnis.party') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code} - ${item.name}`,
                                    id: item.id,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".vendor-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=bisnis_party_name]").val(desc);
            });

            $('.container-select').select2({
                placeholder: 'Search container',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.container') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type} - ${item.description}`,
                                    id: item.id,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.charge-code-select').select2({
                placeholder: 'Search item code',
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
                                    id: item.id,
                                    custom_attribute: item.item_description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".charge-code-select").change(function(e) {
                e.preventDefault();
                let charge_desc = $(this).select2('data')[0].custom_attribute;

                $("#charge_desc_1").val(charge_desc);

            });

            $('.city-select').select2({
                placeholder: 'Search destination',
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
                                    text: `${item.code} - ${item.name}`,
                                    id: item.id,
                                    custom_attribute: item.name,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".city-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;

                $("input[name=city_desc]").val(desc);

            });

            $('.customer-select').select2({
                placeholder: 'Search customer',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.bisnis.party') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code} - ${item.name}`,
                                    id: item.id,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".customer-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=bisnis_party_name]").val(desc);
            });

            $('.portloading-select').select2({
                placeholder: 'Search port',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.port') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code} - ${item.name}`,
                                    id: item.code,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".portloading-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=port_loading_name]").val(desc);
            });

            $('.portdischarge-select').select2({
                placeholder: 'Search port',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.port') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code} - ${item.name}`,
                                    id: item.code,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".portdischarge-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=port_discharge_name]").val(desc);
            });

            $('.viaport-select').select2({
                placeholder: 'Search port',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.port') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code} - ${item.name}`,
                                    id: item.code,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".viaport-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=via_port_name]").val(desc);
            });

            $('.secondport-select').select2({
                placeholder: 'Search port',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.port') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code} - ${item.name}`,
                                    id: item.code,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".secondport-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=second_port_name]").val(desc);
            });

            $(`.job-type`).select2({
                placeholder: 'Search job type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('job.notunique') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type} | ${item.description}`,
                                    id: item.id,
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
                                    text: `${item.code} - ${item.description}`,
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
                                    text: `${item.code} - ${item.description}`,
                                    id: item.id,
                                    custom_attribute: item.description
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
                                    text: `${item.code} - ${item.description}`,
                                    id: item.id,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

        });
    </script>
@endsection
