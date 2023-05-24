<div class="row">
    <div class="col-md-12 col-sm-12" style="overflow:auto;">
        <table id="table-condition" class="table table-bordered table-sm table-responsive-sm">
            <thead>
                <tr>
                    <th class="text-center th-action" style="min-width: 120px;"> Action </th>
                    <th class="text-center" style="min-width: 200px;"> Code </th>
                    <th class="text-center" style="min-width: 200px;"> Description </th>
                    <th class="text-center" style="min-width: 200px;"> Qty </th>
                    <th class="text-center" style="min-width: 200px;"> UOM </th>
                    <th class="text-center" style="min-width: 200px;"> Prepaid/Collect </th>
                    <th class="text-center" style="min-width: 200px;"> Customer </th>
                    <th class="text-center" style="min-width: 200px;"> Customer Name </th>
                    <th class="text-center" style="min-width: 200px;"> VAT </th>
                    <th class="text-center" style="min-width: 200px;"> Currency </th>
                    <th class="text-center" style="min-width: 200px;"> Currency Rate </th>
                    <th class="text-center" style="min-width: 200px;"> Unit Rate </th>
                    <th class="text-center" style="min-width: 200px;"> Amount </th>
                    <th class="text-center" style="min-width: 200px;"> Sales </th>
                    <th class="text-center" style="min-width: 200px;"> Qty </th>
                    <th class="text-center" style="min-width: 200px;"> Prepaid/Collect </th>
                    <th class="text-center" style="min-width: 200px;"> Vendor </th>
                    <th class="text-center" style="min-width: 200px;"> Vendor Name </th>
                    <th class="text-center" style="min-width: 200px;"> VAT </th>
                    <th class="text-center" style="min-width: 200px;"> Currency </th>
                    <th class="text-center" style="min-width: 200px;"> Currency Rate </th>
                    <th class="text-center" style="min-width: 200px;"> Unit Rate </th>
                    <th class="text-center" style="min-width: 200px;"> Amount </th>
                    <th class="text-center" style="min-width: 200px;"> Cost </th>
                </tr>
            </thead>
            <tbody class="tbody-condition" id="tbody-condition-1">
                @if (count($sd5) > 0)
                    @foreach ($sd5 as $key => $val)
                        <tr class="dynamic-field" id="dynamic-field-{{ $key + 1 }}"
                            onclick="click_tr({{ $key + 1 }})">
                            <input type="hidden" name="id_key[]" id="id-key-{{ $key + 1 }}" class="id-key"
                                value="{{ $key + 1 }}">
                            <td class="text-center">
                                <button type="button" onclick="addNewField(this.id)"
                                    id="add-button-{{ $key + 1 }}"
                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                        class="fa fa-plus fa-fw"></i>
                                </button>
                                <button type="button" onclick="removeLastField(this)"
                                    id="remove-button-{{ $key + 1 }}"
                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                        class="fa fa-minus fa-fw"></i>
                                </button>
                            </td>

                            <td>
                                <div class="form-group">
                                    <select name="code[{{ $key + 1 }}]" id="code-select-{{ $key + 1 }}"
                                        class="code-select">
                                        <option value="{{ $val->code }}">{{ $val->code }}</option>

                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control desc"
                                        name="description[{{ $key + 1 }}]" id="desc-{{ $key + 1 }}"
                                        value="{{ $val->description }}">
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <input type="text" class="form-control qty-sales"
                                        name="qty_sales[{{ $key + 1 }}]" id="qty-sales-{{ $key + 1 }}"
                                        data-type='currency4' value="{{ number_format($val->qty_sales, 4, '.', ',') }}"
                                        autocomplete="off" onkeyup="sum_idr_sales({{ $key + 1 }}, 1)">
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <select name="uom_sales[{{ $key + 1 }}]" id="uom-sales-{{ $key + 1 }}"
                                        class="uom-sales">
                                        <option value="{{ $val->uom_sales }}">{{ $val->uom_sales }}</option>
                                    </select>
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <select name="pc_sales[{{ $key + 1 }}]" id="pc-sales-{{ $key + 1 }}"
                                        class="pc-sales">
                                        <option value="">Search</option>
                                        <option value="Prepaid" @selected($val->pc_sales == 'Prepaid')>Prepaid</option>
                                        <option value="Collect" @selected($val->pc_sales == 'Collect')>Collect</option>
                                    </select>
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <select name="cust_code_sales[{{ $key + 1 }}]"
                                        id="cust-code-sales-{{ $key + 1 }}" class="cust-code-sales">
                                        <option value="{{ $val->cust_code_sales }}">{{ $val->cust_code_sales }}
                                        </option>
                                    </select>
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <input type="text" class="form-control cust-name-sales"
                                        name="cust_name_sales[{{ $key + 1 }}]"
                                        value="{{ $val->cust_name_sales }}"
                                        id="cust-name-sales-{{ $key + 1 }}">
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <select name="vat_sales[{{ $key + 1 }}]" id="vat-sales-{{ $key + 1 }}"
                                        class="vat-sales">
                                        <option value="{{ $val->vat_sales }}">{{ $val->vat_sales }}</option>
                                    </select>
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <select name="curr_sales[{{ $key + 1 }}]"
                                        id="curr-sales-{{ $key + 1 }}" class="curr-sales">
                                        <option value="{{ $val->curr_sales }}">{{ $val->curr_sales }}</option>
                                    </select>
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <input type="text" class="form-control rate-sales"
                                        id="rate-sales-{{ $key + 1 }}" autocomplete="off" data-type='currency'
                                        name="rate_sales[{{ $key + 1 }}]"
                                        value="{{ number_format($val->rate_sales, 2, '.', ',') }}"
                                        onkeyup="sum_idr_sales({{ $key + 1 }}, 1)">
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <input type="text" class="form-control unit-rate-sales"
                                        id="unit-rate-sales-{{ $key + 1 }}" autocomplete="off"
                                        data-type='currency' name="unit_rate_sales[{{ $key + 1 }}]"
                                        value="{{ number_format($val->unit_rate_sales, 2, '.', ',') }}"
                                        onkeyup="sum_idr_sales({{ $key + 1 }}, 1)">
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <input type="text" class="form-control amt-sales" readonly
                                        id="amt-sales-{{ $key + 1 }}" autocomplete="off" data-type='currency'
                                        name="amt_sales[{{ $key + 1 }}]"
                                        value="{{ number_format($val->amt_sales, 2, '.', ',') }}">
                                </div>
                            </td>

                            <td style="background-color: darksalmon;">
                                <div class="form-group">
                                    <input type="text" class="form-control sales" readonly
                                        id="sales-{{ $key + 1 }}" autocomplete="off" data-type='currency'
                                        name="sales[{{ $key + 1 }}]" data-total_sales="1"
                                        value="{{ number_format($val->sales, 2, '.', ',') }}">
                                </div>
                            </td>

                            <td style="background-color: cadetblue;">
                                <div class="form-group">
                                    <input type="text" class="form-control qty-vendor"
                                        name="qty_vendor[{{ $key + 1 }}]" id="qty-vendor-{{ $key + 1 }}"
                                        data-type='currency4' autocomplete="off"
                                        value="{{ number_format($val->qty_vendor, 4, '.', ',') }}"
                                        onkeyup="sum_idr_vendor({{ $key + 1 }}, 1)">
                                </div>
                            </td>

                            <td style="background-color: cadetblue;">
                                <div class="form-group">
                                    <select name="pc_vendor[{{ $key + 1 }}]" id="pc-vendor-{{ $key + 1 }}"
                                        class="pc-vendor">
                                        <option value="">Search</option>
                                        <option value="Prepaid" @selected($val->pc_vendor == 'Prepaid')>Prepaid</option>
                                        <option value="Collect" @selected($val->pc_vendor == 'Collect')>Collect</option>
                                    </select>
                                </div>
                            </td>

                            <td style="background-color: cadetblue;">
                                <div class="form-group">
                                    <select name="code_vendor[{{ $key + 1 }}]"
                                        id="code-vendor-{{ $key + 1 }}" class="code-vendor">
                                        <option value="{{ $val->code_vendor }}">{{ $val->code_vendor }}</option>
                                    </select>
                                </div>
                            </td>

                            <td style="background-color: cadetblue;">
                                <div class="form-group">
                                    <input type="text" class="form-control name-vendor"
                                        name="name_vendor[{{ $key + 1 }}]" value="{{ $val->name_vendor }}"
                                        id="name-vendor-{{ $key + 1 }}">
                                </div>
                            </td>

                            <td style="background-color: cadetblue;">
                                <div class="form-group">
                                    <select name="vat_vendor[{{ $key + 1 }}]"
                                        id="vat-vendor-{{ $key + 1 }}" class="vat-vendor">
                                        <option value="{{ $val->vat_vendor }}">{{ $val->vat_vendor }}</option>
                                    </select>
                                </div>
                            </td>

                            <td style="background-color: cadetblue;">
                                <div class="form-group">
                                    <select name="curr_vendor[{{ $key + 1 }}]"
                                        id="curr-vendor-{{ $key + 1 }}" class="curr-vendor">
                                        <option value="{{ $val->curr_vendor }}">{{ $val->curr_vendor }}</option>
                                    </select>
                                </div>
                            </td>

                            <td style="background-color: cadetblue;">
                                <div class="form-group">
                                    <input type="text" class="form-control rate-vendor"
                                        id="rate-vendor-{{ $key + 1 }}" autocomplete="off" data-type='currency'
                                        value="{{ number_format($val->rate_vendor, 2, '.', ',') }}"
                                        name="rate_vendor[{{ $key + 1 }}]"
                                        onkeyup="sum_idr_vendor({{ $key + 1 }}, 1)">
                                </div>
                            </td>

                            <td style="background-color: cadetblue;">
                                <div class="form-group">
                                    <input type="text" class="form-control unit-rate-vendor"
                                        id="unit-rate-vendor-{{ $key + 1 }}" autocomplete="off"
                                        data-type='currency' name="unit_rate_vendor[{{ $key + 1 }}]"
                                        value="{{ number_format($val->unit_rate_vendor, 2, '.', ',') }}"
                                        onkeyup="sum_idr_vendor({{ $key + 1 }}, 1)">
                                </div>
                            </td>

                            <td style="background-color: cadetblue;">
                                <div class="form-group">
                                    <input type="text" class="form-control amt-vendor" readonly
                                        id="amt-vendor-{{ $key + 1 }}" autocomplete="off" data-type='currency'
                                        value="{{ number_format($val->amt_vendor, 2, '.', ',') }}"
                                        name="amt_vendor[{{ $key + 1 }}]">
                                </div>
                            </td>

                            <td style="background-color: cadetblue;">
                                <div class="form-group">
                                    <input type="text" class="form-control cost" readonly
                                        id="cost-{{ $key + 1 }}" autocomplete="off" data-type='currency'
                                        value="{{ number_format($val->cost, 2, '.', ',') }}"
                                        name="cost[{{ $key + 1 }}]" data-total_vendor="1">
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr class="dynamic-field" id="dynamic-field-1" onclick="click_tr(1)">
                        <input type="hidden" name="id_key[]" id="id-key-1" class="id-key" value="1">
                        <td class="text-center">
                            <button type="button" onclick="addNewField(this.id)" id="add-button-1"
                                class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                    class="fa fa-plus fa-fw"></i>
                            </button>
                            <button type="button" onclick="removeLastField(this)" id="remove-button-1"
                                class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                    class="fa fa-minus fa-fw"></i>
                            </button>
                        </td>

                        <td>
                            <div class="form-group">
                                <select name="code[1]" id="code-select-1" class="code-select">
                                    <option value="">Search</option>

                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control desc" name="description[1]"
                                    id="desc-1">
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <input type="text" class="form-control qty-sales" name="qty_sales[1]"
                                    id="qty-sales-1" data-type='currency4' autocomplete="off"
                                    onkeyup="sum_idr_sales(1, 1)">
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <select name="uom_sales[1]" id="uom-sales-1" class="uom-sales">
                                    <option value="">Search</option>
                                </select>
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <select name="pc_sales[1]" id="pc-sales-1" class="pc-sales">
                                    <option value="">Search</option>
                                    <option value="Prepaid">Prepaid</option>
                                    <option value="Collect">Collect</option>
                                </select>
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <select name="cust_code_sales[1]" id="cust-code-sales-1" class="cust-code-sales">
                                    <option value="">Search</option>
                                </select>
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <input type="text" class="form-control cust-name-sales" name="cust_name_sales[1]"
                                    id="cust-name-sales-1">
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <select name="vat_sales[1]" id="vat-sales-1" class="vat-sales">
                                    <option value="">Search</option>
                                </select>
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <select name="curr_sales[1]" id="curr-sales-1" class="curr-sales">
                                    <option value="">Search</option>
                                </select>
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <input type="text" class="form-control rate-sales" id="rate-sales-1"
                                    autocomplete="off" data-type='currency' name="rate_sales[1]"
                                    onkeyup="sum_idr_sales(1, 1)">
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <input type="text" class="form-control unit-rate-sales" id="unit-rate-sales-1"
                                    autocomplete="off" data-type='currency' name="unit_rate_sales[1]"
                                    onkeyup="sum_idr_sales(1, 1)">
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <input type="text" class="form-control amt-sales" readonly id="amt-sales-1"
                                    autocomplete="off" data-type='currency' name="amt_sales[1]">
                            </div>
                        </td>

                        <td style="background-color: darksalmon;">
                            <div class="form-group">
                                <input type="text" class="form-control sales" readonly id="sales-1"
                                    autocomplete="off" data-type='currency' name="sales[1]" data-total_sales="1">
                            </div>
                        </td>

                        <td style="background-color: cadetblue;">
                            <div class="form-group">
                                <input type="text" class="form-control qty-vendor" name="qty_vendor[1]"
                                    id="qty-vendor-1" data-type='currency4' autocomplete="off"
                                    onkeyup="sum_idr_vendor(1, 1)">
                            </div>
                        </td>

                        <td style="background-color: cadetblue;">
                            <div class="form-group">
                                <select name="pc_vendor[1]" id="pc-vendor-1" class="pc-vendor">
                                    <option value="">Search</option>
                                    <option value="Prepaid">Prepaid</option>
                                    <option value="Collect">Collect</option>
                                </select>
                            </div>
                        </td>

                        <td style="background-color: cadetblue;">
                            <div class="form-group">
                                <select name="code_vendor[1]" id="code-vendor-1" class="code-vendor">
                                    <option value="">Search</option>
                                </select>
                            </div>
                        </td>

                        <td style="background-color: cadetblue;">
                            <div class="form-group">
                                <input type="text" class="form-control name-vendor" name="name_vendor[1]"
                                    id="name-vendor-1">
                            </div>
                        </td>

                        <td style="background-color: cadetblue;">
                            <div class="form-group">
                                <select name="vat_vendor[1]" id="vat-vendor-1" class="vat-vendor">
                                    <option value="">Search</option>
                                </select>
                            </div>
                        </td>

                        <td style="background-color: cadetblue;">
                            <div class="form-group">
                                <select name="curr_vendor[1]" id="curr-vendor-1" class="curr-vendor">
                                    <option value="">Search</option>
                                </select>
                            </div>
                        </td>

                        <td style="background-color: cadetblue;">
                            <div class="form-group">
                                <input type="text" class="form-control rate-vendor" id="rate-vendor-1"
                                    autocomplete="off" data-type='currency' name="rate_vendor[1]"
                                    onkeyup="sum_idr_vendor(1, 1)">
                            </div>
                        </td>

                        <td style="background-color: cadetblue;">
                            <div class="form-group">
                                <input type="text" class="form-control unit-rate-vendor" id="unit-rate-vendor-1"
                                    autocomplete="off" data-type='currency' name="unit_rate_vendor[1]"
                                    onkeyup="sum_idr_vendor(1, 1)">
                            </div>
                        </td>

                        <td style="background-color: cadetblue;">
                            <div class="form-group">
                                <input type="text" class="form-control amt-vendor" readonly id="amt-vendor-1"
                                    autocomplete="off" data-type='currency' name="amt_vendor[1]">
                            </div>
                        </td>

                        <td style="background-color: cadetblue;">
                            <div class="form-group">
                                <input type="text" class="form-control cost" readonly id="cost-1"
                                    autocomplete="off" data-type='currency' name="cost[1]" data-total_vendor="1">
                            </div>
                        </td>

                    </tr>
                @endif

            </tbody>
        </table>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6" style="background-color: darksalmon;">
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="code_jc_sales">Code</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Code" class="form-control" readonly
                                id="code_jc_sales">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="desc_jc_sales">Description</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Description" class="form-control" readonly
                                id="desc_jc_sales">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="qty_jc_sales">Qty</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Qty" class="form-control" readonly id="qty_jc_sales">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="pc_jc_sales">Prepaid/Collect</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Prepaid/Collect" class="form-control" readonly
                                id="pc_jc_sales">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="vat_jc_sales">Vat</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Vat" class="form-control" readonly id="vat_jc_sales">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="amt_jc_sales">Amount</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Amount" class="form-control" readonly
                                id="amt_jc_sales">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="cus_jc_sales">Customer</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Customer" class="form-control" readonly
                                id="cus_jc_sales">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="cus_name_jc_sales">Customer Name</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Customer Name" class="form-control" readonly
                                id="cus_name_jc_sales">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="curr_jc_sales">Currency</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Currency" class="form-control" readonly
                                id="curr_jc_sales">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="curr_rate_jc_sales">Currency Rate</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Currency Rate" class="form-control" readonly
                                id="curr_rate_jc_sales">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="unit_rate_jc_sales">Unit Rate</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Unit Rate" class="form-control" readonly
                                id="unit_rate_jc_sales">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="jc_sales">Sales</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Sales" class="form-control" readonly id="jc_sales">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6" style="background-color: cadetblue;">
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="code_jc_vendor">Code</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Code" class="form-control" readonly
                                id="code_jc_vendor">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="desc_jc_vendor">Description</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Description" class="form-control" readonly
                                id="desc_jc_vendor">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="qty_jc_vendor">Qty</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Qty" class="form-control" readonly
                                id="qty_jc_vendor">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="pc_jc_vendor">Prepaid/Collect</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Prepaid/Collect" class="form-control" readonly
                                id="pc_jc_vendor">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="vat_jc_vendor">Vat</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Vat" class="form-control" readonly
                                id="vat_jc_vendor">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="amt_jc_vendor">Amount</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Amount" class="form-control" readonly
                                id="amt_jc_vendor">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="ven_jc_vendor">Vendor</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Vendor" class="form-control" readonly
                                id="ven_jc_vendor">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="ven_name_jc_vendor">Vendor Name</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Vendor Name" class="form-control" readonly
                                id="ven_name_jc_vendor">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="curr_jc_vendor">Currency</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Currency" class="form-control" readonly
                                id="curr_jc_vendor">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="curr_rate_jc_vendor">Currency Rate</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Currency Rate" class="form-control" readonly
                                id="curr_rate_jc_vendor">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="unit_rate_jc_vendor">Unit Rate</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Unit Rate" class="form-control" readonly
                                id="unit_rate_jc_vendor">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="jc_vendor">Cost</label>
                    </div>
                    <div class="col-md-7 ">
                        <div class="form-group">
                            <input type="text" placeholder="Cost" class="form-control" readonly id="jc_vendor">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-12">
        <div class="form-group">
            <label for="billing_instruction">Billing Instruction</label>
            <textarea name="billing_instruction" id="billing_instruction" cols="30" rows="3"
                class="form-control @error('billing_instruction') is-invalid @enderror">{{ old('billing_instruction', $sj->billing_instruction) }}</textarea>
            @error('billing_instruction')
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
            <label for="job_costing_remark">Job Costing Remark</label>
            <textarea name="job_costing_remark" id="job_costing_remark" cols="30" rows="4"
                class="form-control @error('job_costing_remark') is-invalid @enderror">{{ old('job_costing_remark', $sj->job_costing_remark) }}</textarea>
            @error('job_costing_remark')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-end">
                <div class="form-group">
                    <label for="profit_loss">Profit/Loss</label>
                    <input type="text" data-type='currency0' readonly title="Profit/Loss"
                        class="form-control @error('profit_loss') is-invalid @enderror total-profit"
                        name="profit_loss" id="total-profit-1"
                        value="{{ old('profit_loss', number_format($sj->profit_loss, 2, '.', ',')) }}">
                    @error('profit_loss')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="form-group">
                    <label for="total_sales">Total Sales</label>
                    <input type="text" data-type='currency0' readonly title="Total Sales"
                        class="form-control @error('total_sales') is-invalid @enderror total-sales" name="total_sales"
                        id="total-sales-1"
                        value="{{ old('total_sales', number_format($sj->total_sales, 2, '.', ',')) }}">
                    @error('total_sales')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="form-group">
                    <label for="margin">Margin</label>
                    <input type="text" data-type='currency0' readonly title="Margin"
                        class="form-control @error('margin') is-invalid @enderror margin" name="margin"
                        id="margin-1" value="{{ old('margin', $sj->margin) }}">
                    @error('margin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="form-group">
                    <label for="total_cost">Total Cost</label>
                    <input type="text" data-type='currency0' readonly title="Total Cost"
                        class="form-control @error('total_cost') is-invalid @enderror total-cost" name="total_cost"
                        id="total-cost-1"
                        value="{{ old('total_cost', number_format($sj->total_cost, 2, '.', ',')) }}">
                    @error('total_cost')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

</div>
@section('sub_script_6')
    <script>
        let id_key = ".id-key";
        let buttonAddSub = $("#add-button-1");
        let buttonRemoveSub = $("#remove-button-1");
        let classNameSub = ".dynamic-field";
        let pc_sales = ".pc-sales";
        let pc_vendor = ".pc-vendor";
        let code_select = ".code-select";
        let uom_sales = ".uom-sales";
        let desc = ".desc";
        let cust_code_sales = ".cust-code-sales";
        let cust_name_sales = ".cust-name-sales";
        let code_vendor = ".code-vendor";
        let name_vendor = ".name-vendor";
        let vat_sales = ".vat-sales";
        let vat_vendor = ".vat-vendor";
        let curr_sales = ".curr-sales";
        let rate_sales = ".rate-sales";
        let curr_vendor = ".curr-vendor";
        let rate_vendor = ".rate-vendor";
        let qty_sales = ".qty-sales";
        let qty_vendor = ".qty-vendor";
        let amt_sales = ".amt-sales";
        let amt_vendor = ".amt-vendor";
        let unit_rate_sales = ".unit-rate-sales";
        let unit_rate_vendor = ".unit-rate-vendor";
        let sales = ".sales";
        let cost = ".cost";
        let field = "";
        let total_all_sales = {{ $sj->total_sales == null || $sj->total_sales == '0' ? '0' : $sj->total_sales }};
        let total_all_cost = {{ $sj->total_cost == null || $sj->total_cost == '0' ? '0' : $sj->total_cost }};

        function totalFieldSub() {
            return $(classNameSub).length;
        }

        $(function() {
            evtItemCode(`.code-select`, `.desc`);
            evtUomCode(`.uom-sales`);
            evtNoData(`.pc-sales, .pc-vendor`);
            evtBisnisPartyNotComplete(`.cust-code-sales`, `.cust-name-sales`);
            evtBisnisPartyNotComplete(`.code-vendor`, `.name-vendor`);
            evtVatCode(`.vat-sales, .vat-vendor`);
            evtCurrencyCode(`.curr-sales`, null, true, `.rate-sales`);
            evtCurrencyCode(`.curr-vendor`, null, true, `.rate-vendor`);

        });

        function click_tr(evt = null) {
            let get_code = $(`#code-select-${evt}`).val();
            let get_desc = $(`#desc-${evt}`).val();

            // GET VALUE SALES
            let get_qty_sales = $(`#qty-sales-${evt}`).val();
            let get_pc_sales = $(`#pc-sales-${evt}`).val();
            let get_cus_code_sales = $(`#cust-code-sales-${evt}`).val();
            let get_cus_name_sales = $(`#cust-name-sales-${evt}`).val();
            let get_vat_sales = $(`#vat-sales-${evt}`).val();
            let get_curr_sales = $(`#curr-sales-${evt}`).val();
            let get_rate_sales = $(`#rate-sales-${evt}`).val();
            let get_unit_rate_sales = $(`#unit-rate-sales-${evt}`).val();
            let get_amt_sales = $(`#amt-sales-${evt}`).val();
            let get_sales = $(`#sales-${evt}`).val();

            if (get_qty_sales != "0.0000" || get_qty_sales == "") {
                $(`#code_jc_sales`).val(get_code);
                $(`#desc_jc_sales`).val(get_desc);
                $(`#qty_jc_sales`).val(get_qty_sales);
                $(`#pc_jc_sales`).val(get_pc_sales);
                $(`#cus_jc_sales`).val(get_cus_code_sales);
                $(`#cus_name_jc_sales`).val(get_cus_name_sales);
                $(`#vat_jc_sales`).val(get_vat_sales);
                $(`#amt_jc_sales`).val(get_amt_sales);
                $(`#amt_jc_sales`).val(get_amt_sales);
                $(`#curr_jc_sales`).val(get_curr_sales);
                $(`#curr_rate_jc_sales`).val(get_rate_sales);
                $(`#unit_rate_jc_sales`).val(get_unit_rate_sales);
                $(`#jc_sales`).val(get_sales);
            } else {
                $(`#code_jc_sales`).val("");
                $(`#desc_jc_sales`).val("");
                $(`#qty_jc_sales`).val("");
                $(`#pc_jc_sales`).val("");
                $(`#cus_jc_sales`).val("");
                $(`#cus_name_jc_sales`).val("");
                $(`#vat_jc_sales`).val("");
                $(`#amt_jc_sales`).val("");
                $(`#amt_jc_sales`).val("");
                $(`#curr_jc_sales`).val("");
                $(`#curr_rate_jc_sales`).val("");
                $(`#unit_rate_jc_sales`).val("");
                $(`#jc_sales`).val("");
            }

            // GET VALUE COST
            let get_qty_vendor = $(`#qty-vendor-${evt}`).val();
            let get_pc_vendor = $(`#pc-vendor-${evt}`).val();
            let get_cus_code_vendor = $(`#code-vendor-${evt}`).val();
            let get_cus_name_vendor = $(`#name-vendor-${evt}`).val();
            let get_vat_vendor = $(`#vat-vendor-${evt}`).val();
            let get_curr_vendor = $(`#curr-vendor-${evt}`).val();
            let get_rate_vendor = $(`#rate-vendor-${evt}`).val();
            let get_unit_rate_vendor = $(`#unit-rate-vendor-${evt}`).val();
            let get_amt_vendor = $(`#amt-vendor-${evt}`).val();
            let get_cost = $(`#cost-${evt}`).val();

            if (get_qty_vendor != "0.0000" || get_qty_vendor == "") {
                $(`#code_jc_vendor`).val(get_code);
                $(`#desc_jc_vendor`).val(get_desc);
                $(`#qty_jc_vendor`).val(get_qty_vendor);
                $(`#pc_jc_vendor`).val(get_pc_vendor);
                $(`#ven_jc_vendor`).val(get_cus_code_vendor);
                $(`#ven_name_jc_vendor`).val(get_cus_name_vendor);
                $(`#vat_jc_vendor`).val(get_vat_vendor);
                $(`#amt_jc_vendor`).val(get_amt_vendor);
                $(`#amt_jc_vendor`).val(get_amt_vendor);
                $(`#curr_jc_vendor`).val(get_curr_vendor);
                $(`#curr_rate_jc_vendor`).val(get_rate_vendor);
                $(`#unit_rate_jc_vendor`).val(get_unit_rate_vendor);
                $(`#jc_vendor`).val(get_cost);
            } else {
                $(`#code_jc_vendor`).val("");
                $(`#desc_jc_vendor`).val("");
                $(`#qty_jc_vendor`).val("");
                $(`#pc_jc_vendor`).val("");
                $(`#ven_jc_vendor`).val("");
                $(`#ven_name_jc_vendor`).val("");
                $(`#vat_jc_vendor`).val("");
                $(`#amt_jc_vendor`).val("");
                $(`#amt_jc_vendor`).val("");
                $(`#curr_jc_vendor`).val("");
                $(`#curr_rate_jc_vendor`).val("");
                $(`#unit_rate_jc_vendor`).val("");
                $(`#jc_vendor`).val("");
            }

        }

        function sum_idr_sales(evt = null, evt2 = null) {
            let curr = parseFloat($(`#rate-sales-${evt}`).val().split(',').join(""));
            let qty = ($(`#qty-sales-${evt}`).val().split(',').join("") == '' || $(`#qty-sales-${evt}`).val().split(',')
                .join("") == '0.0000') ? 1 : parseFloat($(`#qty-sales-${evt}`).val().split(',').join(""));
            let unit = parseFloat($(`#unit-rate-sales-${evt}`).val().split(',').join(""));
            let count_amt = 0;
            let count_sales = 0;

            let count_profit = 0;
            let count_margin = 0


            // COUNT AMOUNT
            if (!isNaN(unit)) {
                count_amt += unit * qty;
                document.getElementById(`amt-sales-${evt}`).value = numberFormatter(count_amt);

                count_sales += count_amt * curr;
                document.getElementById(`sales-${evt}`).value = numberFormatter(count_sales);

                // COUNT IDR
                if (evt2 != '') {
                    sum_of_sales(evt2);
                    // COUNT PROFIT/LOSS
                    count_profit += total_all_sales - total_all_cost;
                    $(`.total-profit`).val(numberFormatter(count_profit));
                    // COUNT MARGIN
                    count_margin += (count_profit / total_all_sales) * 100;
                    count_margin = count_margin.toFixed(2);
                    $(`.margin`).val(count_margin + "%");
                }
            }
        }

        function sum_of_sales(num = null) {
            var total = 0;
            var amt = 0
            var curr_num = $(`*[data-total_sales="${num}"]`);

            for (var i = 0; i < curr_num.length; ++i) {
                if (!isNaN(parseFloat(curr_num[i].value.split(',').join("")))) {
                    amt = parseFloat(curr_num[i].value.split(',').join(""));
                    total += amt;
                }

            }

            document.getElementById(`total-sales-${num}`).value = numberFormatter(total);

            total_all_sales = total;
        }

        function sum_idr_vendor(evt = null, evt2 = null) {
            let curr = parseFloat($(`#rate-vendor-${evt}`).val().split(',').join(""));
            let qty = ($(`#qty-vendor-${evt}`).val().split(',').join("") == '' || $(`#qty-vendor-${evt}`).val().split(',')
                .join("") == '0.0000') ? 1 : parseFloat($(`#qty-vendor-${evt}`).val().split(',').join(""));
            let unit = parseFloat($(`#unit-rate-vendor-${evt}`).val().split(',').join(""));
            let count_amt = 0;
            let count_vendor = 0;

            let count_profit = 0;
            let count_margin = 0;

            // COUNT AMOUNT
            if (!isNaN(unit)) {
                count_amt += unit * qty;
                document.getElementById(`amt-vendor-${evt}`).value = numberFormatter(count_amt);

                count_vendor += count_amt * curr;
                document.getElementById(`cost-${evt}`).value = numberFormatter(count_vendor);

                // COUNT IDR
                if (evt2 != '') {
                    sum_of_vendor(evt2);
                    // COUNT PROFIT/LOSS
                    count_profit += total_all_sales - total_all_cost;
                    $(`.total-profit`).val(numberFormatter(count_profit));
                    // COUNT MARGIN
                    count_margin += (count_profit / total_all_sales) * 100;
                    count_margin = count_margin.toFixed(2);
                    $(`.margin`).val(count_margin + "%");
                }
            }
        }

        function sum_of_vendor(num = null) {
            var total = 0;
            var amt = 0
            var curr_num = $(`*[data-total_vendor="${num}"]`);

            for (var i = 0; i < curr_num.length; ++i) {
                if (!isNaN(parseFloat(curr_num[i].value.split(',').join("")))) {
                    amt = parseFloat(curr_num[i].value.split(',').join(""));
                    total += amt;
                }

            }

            document.getElementById(`total-cost-${num}`).value = numberFormatter(total);

            total_all_cost = total;

        }

        function addNewField(obj) {
            if (totalFieldSub() < maxFields) {
                let timeSub = Math.floor(Date.now() / 1000);
                countSub = totalFieldSub() + timeSub + Math.floor(Math.random() * 999) + 1;

                field = $(`#dynamic-field-1`).clone();

                field.attr("id", "dynamic-field-" + countSub).removeAttr("onclick").attr("onclick",
                    `click_tr(${countSub})`);
                field.children("label").text("Field " + countSub);
                field.find("input").val("");
                field.find(".select2-container").remove();
                field.find(".select2-container").empty();
                field.find(code_select).empty();
                field.find(cust_code_sales).empty();
                field.find(uom_sales).empty();
                field.find(code_vendor).empty();
                field.find(curr_sales).empty();
                field.find(curr_vendor).empty();
                field.find(vat_sales).empty();
                field.find(vat_vendor).empty();
                field.find(pc_sales).val("");
                field.find(pc_vendor).val("");

                field.find(pc_sales).attr("id", "pc-sales-" + countSub).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });

                field.find(pc_vendor).attr("id", "pc-vendor-" + countSub).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });

                field.find(code_select).attr("id", "code-select-" + countSub).select2({
                    placeholder: 'Search...',
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
                                        text: `${item.item_code} - ${item.item_description}`,
                                        id: item.item_code,
                                        custom_attribute: item.item_description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.find(desc).attr("id", "desc-" + countSub);

                field.find(uom_sales).attr("id", "uom-sales-" + countSub).select2({
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
                                        id: item.code,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                field.find(cust_code_sales).attr("id", "cust-code-sales-" + countSub).select2({
                    placeholder: 'Search...',
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
                                        id: item.code,
                                        custom_attribute: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.find(cust_name_sales).attr("id", "cust-name-sales-" + countSub);

                field.find(code_vendor).attr("id", "code-vendor-" + countSub).select2({
                    placeholder: 'Search...',
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
                                        id: item.code,
                                        custom_attribute: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.find(name_vendor).attr("id", "name-vendor-" + countSub);

                field.find(vat_sales).attr("id", "vat-sales-" + countSub).select2({
                    placeholder: 'Search...',
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
                                        id: item.code,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                field.find(vat_vendor).attr("id", "vat-vendor-" + countSub).select2({
                    placeholder: 'Search...',
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
                                        id: item.code,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                field.find(curr_sales).attr("id", "curr-sales-" + countSub).select2({
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
                                        id: item.code,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.find(rate_sales).attr("id", "rate-sales-" + countSub);

                field.find(curr_vendor).attr("id", "curr-vendor-" + countSub).select2({
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
                                        id: item.code,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                // CHANGE NAME ARRAY BY INDEX
                field.find(code_select).attr("name", `code[${countSub}]`);
                field.find(desc).attr("name", `description[${countSub}]`);
                field.find(qty_sales).attr("name", `qty_sales[${countSub}]`);
                field.find(pc_sales).attr("name", `pc_sales[${countSub}]`);
                field.find(cust_code_sales).attr("name", `cust_code_sales[${countSub}]`);
                field.find(cust_name_sales).attr("name", `cust_name_sales[${countSub}]`);
                field.find(vat_sales).attr("name", `vat_sales[${countSub}]`);
                field.find(curr_sales).attr("name", `curr_sales[${countSub}]`);
                field.find(rate_sales).attr("name", `rate_sales[${countSub}]`);
                field.find(unit_rate_sales).attr("name", `unit_rate_sales[${countSub}]`);
                field.find(amt_sales).attr("name", `amt_sales[${countSub}]`);
                field.find(sales).attr("name", `sales[${countSub}]`);
                field.find(qty_vendor).attr("name", `qty_vendor[${countSub}]`);
                field.find(pc_vendor).attr("name", `pc_vendor[${countSub}]`);
                field.find(code_vendor).attr("name", `code_vendor[${countSub}]`);
                field.find(name_vendor).attr("name", `name_vendor[${countSub}]`);
                field.find(vat_vendor).attr("name", `vat_vendor[${countSub}]`);
                field.find(curr_vendor).attr("name", `curr_vendor[${countSub}]`);
                field.find(rate_vendor).attr("name", `rate_vendor[${countSub}]`);
                field.find(unit_rate_vendor).attr("name", `unit_rate_vendor[${countSub}]`);
                field.find(amt_vendor).attr("name", `amt_vendor[${countSub}]`);
                field.find(cost).attr("name", `cost[${countSub}]`);
                field.find(id_key).attr("id", `id-key-${countSub}`).val(countSub);

                field.find(rate_vendor).attr("id", "rate-vendor-" + countSub);

                field.find(amt_sales).attr("id", "amt-sales-" + countSub);
                field.find(sales).attr("id", "sales-" + countSub);
                field.find(qty_sales).attr("id", "qty-sales-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                    `sum_idr_sales(${countSub}, 1)`);
                field.find(unit_rate_sales).attr("id", "unit-rate-sales-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                    `sum_idr_sales(${countSub}, 1)`);
                field.find(rate_sales).attr("id", "rate-sales-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                    `sum_idr_sales(${countSub}, 1)`);

                field.find(amt_vendor).attr("id", "amt-vendor-" + countSub);
                field.find(cost).attr("id", "cost-" + countSub);
                field.find(qty_vendor).attr("id", "qty-vendor-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                    `sum_idr_vendor(${countSub}, 1)`);
                field.find(unit_rate_vendor).attr("id", "unit-rate-vendor-" + countSub).removeAttr("onkeyup").attr(
                    "onkeyup",
                    `sum_idr_vendor(${countSub}, 1)`);
                field.find(rate_vendor).attr("id", "rate-vendor-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                    `sum_idr_vendor(${countSub}, 1)`);

                $(classNameSub + ":last").after($(field));

                evtNoData(`#pc-sales-1, #pc-vendor-1`);
                evtNoData(`#pc-sales-${countSub}, #pc-vendor-${countSub}`);
                evtItemCode(`#code-select-1`, `#desc-1`);
                evtItemCode(`#code-select-${countSub}`, `#desc-${countSub}`);
                evtUomCode(`#uom-sales-1`);
                evtUomCode(`#uom-sales-${countSub}`);
                evtBisnisPartyNotComplete(`#cust-code-sales-1`, `#cust-name-sales-1`);
                evtBisnisPartyNotComplete(`#code-vendor-1`, `#name-vendor-1`);
                evtBisnisPartyNotComplete(`#cust-code-sales-${countSub}`, `#cust-name-sales-${countSub}`);
                evtBisnisPartyNotComplete(`#code-vendor-${countSub}`, `#name-vendor-${countSub}`);
                evtVatCode(`#vat-sales-1, #vat-vendor-1`);
                evtVatCode(`#vat-sales-${countSub}, #vat-vendor-${countSub}`);
                evtCurrencyCode(`#curr-sales-1`, null, true, `#rate-sales-1`);
                evtCurrencyCode(`#curr-vendor-1`, null, true, `#rate-vendor-1`);
                evtCurrencyCode(`#curr-sales-${countSub}`, null, true, `#rate-sales-${countSub}`);
                evtCurrencyCode(`#curr-vendor-${countSub}`, null, true, `#rate-vendor-${countSub}`);

                $("input[data-type='currency']").on({
                    keyup: function() {
                        formatCurrency($(this));
                    },
                    blur: function() {
                        formatCurrency($(this), "blur");
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
            } else {
                alert(`Maximum ${maxFields} line`);
            }
        }

        function removeLastField(obj) {
            if ($(classNameSub).length > 1) {
                if (confirm("Are you sure delete this row?") == true) {
                    $(obj).closest(classNameSub).remove();
                }
            } else {
                alert("Minimum 1 line");
            }
        }

        function evtNoData(evt1 = null) {
            $(evt1).select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
            });
        }

        function evtVatCode(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search...',
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
                                    id: item.code,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });
        }

        function evtCurrencyCode(evt1 = null, evt2 = null, evt3 = null, evt4 = null) {
            $(evt1).select2({
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
                                    id: item.code,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(evt1).change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $(evt2).val(desc);

                if (evt3) {
                    let code = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: '{{ route('get.detail.currency') }}',
                        data: {
                            code: code
                        },
                        dataType: "json",
                        success: function(response) {
                            $(evt4).val(response);
                        }
                    });
                }
            });
        }

        function evtItemCode(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search...',
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
                                    text: `${item.item_code} - ${item.item_description}`,
                                    id: item.item_code,
                                    custom_attribute: item.item_description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(evt1).change(function(e) {
                e.preventDefault();
                let charge_desc = $(this).select2('data')[0].custom_attribute;

                $(evt2).val(charge_desc);
            });
        }

        function evtUomCode(evt1 = null, evt2 = null) {
            $(evt1).select2({
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
                                    id: item.code,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(evt1).change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $(evt2).val(desc);
            });
        }
    </script>
@endsection
