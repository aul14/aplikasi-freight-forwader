<div class="row mt-3">
    <div class="col-md-12 col-sm-12" style="overflow:auto;">
        <table id="table-condition" class="table table-bordered table-sm table-responsive-sm">
            <thead>
                <tr>
                    <th class="text-center th-action" style="min-width: 120px;"> Action </th>
                    <th class="text-center" style="min-width: 200px;"> Item Code </th>
                    <th class="text-center" style="min-width: 200px;"> Description </th>
                    <th class="text-center" style="min-width: 200px;"> Charge Unit </th>
                    <th class="text-center" style="min-width: 200px;"> Qty </th>
                    <th class="text-center" style="min-width: 200px;"> UOM </th>
                    <th class="text-center" style="min-width: 200px;"> Charge </th>
                    <th class="text-center" style="min-width: 200px;"> Vat </th>
                    <th class="text-center" style="min-width: 200px;"> Prepaid/Collect </th>
                    <th class="text-center" style="min-width: 200px;"> Due </th>
                    <th class="text-center" style="min-width: 200px;"> Rate </th>
                    <th class="text-center" style="min-width: 200px;"> Currency </th>
                    <th class="text-center" style="min-width: 200px;"> Currency Rate </th>
                    <th class="text-center" style="min-width: 200px;"> Unit Rate </th>
                    <th class="text-center" style="min-width: 200px;"> Min Amount </th>
                    <th class="text-center" style="min-width: 200px;"> Amount </th>
                    <th class="text-center" style="min-width: 200px;"> IDR Amount </th>
                </tr>
            </thead>

            <tbody class="tbody-condition" id="tbody-condition-1">
                @if ($count_s_d2 > 0)
                    @foreach ($item_s_d2 as $key_s_d2 => $val)
                        @php
                            $count_test += $key_s_d2 + $key * 2;
                        @endphp
                        <tr class="dynamic-field" id="dynamic-field-{{ $count_test }}">
                            <td class="text-center">
                                <button type="button"
                                    onclick="addNewField(this.id, '#wrapper-row-list-fch-{{ $key + 1 }}')"
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
                                <input name="fchsub_code[]" value="{{ $val->air_quotation_d1_code }}" type="hidden"
                                    class="fchsub-code" id="fchsub-code-{{ $count_test }}">
                                <div class="form-group">
                                    <select name="item_code_s_d2[]" id="item-select-{{ $count_test }}"
                                        class="item-select">
                                        <option value="{{ $val->item_code }}">{{ $val->item_code }}</option>

                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control item-desc" value="{{ $val->item_desc }}"
                                        name="item_desc_s_d2[]" id="item-desc-{{ $count_test }}">
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <select name="chg_unit_s_d2[]" id="chgunit-select-{{ $count_test }}"
                                        class="chgunit-select">
                                        <option value="">Search</option>
                                        <option value="CHARGE WEIGHT" @selected($val->chg_unit == 'CHARGE WEIGHT')>CHARGE WEIGHT
                                        </option>
                                        <option value="SHIPMENT" @selected($val->chg_unit == 'SHIPMENT')>SHIPMENT</option>
                                        <option value="WEIGHT" @selected($val->chg_unit == 'WEIGHT')>WEIGHT</option>
                                        <option value="VOLUME" @selected($val->chg_unit == 'VOLUME')>VOLUME</option>
                                        <option value="PCS" @selected($val->chg_unit == 'PCS')>PCS</option>
                                        <option value="CC FEE" @selected($val->chg_unit == 'CC FEE')>CC FEE</option>
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control qty-input" autocomplete="off"
                                        @disabled($val->chg_unit == 'SHIPMENT') data-type='currency4'
                                        value="{{ number_format($val->chg_unit == 'SHIPMENT' ? 1 : $val->qty, 4, '.', ',') }}"
                                        name="qty_s_d2[]" id="qty-input-{{ $count_test }}"
                                        onkeyup="sum_idr({{ $count_test }}, {{ $key + 1 }})">
                                </div>
                            </td>


                            <td>
                                <div class="form-group">
                                    <select name="uom_s_d2[]" id="uom-sub-{{ $count_test }}" class="uom-sub">
                                        <option value="{{ $val->uom }}">{{ $val->uom }}</option>
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <select name="chg_s_d2[]" id="chg-select-{{ $count_test }}" class="chg-select">
                                        <option value="">Search</option>
                                        <option value="yes" @selected($val->chg == true)>Yes</option>
                                        <option value="no" @selected($val->chg != true)>No</option>
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <select name="vat_code_s_d2[]" id="vat-select-{{ $count_test }}"
                                        class="vat-select">
                                        <option value="{{ $val->vat_code }}">{{ $val->vat_code }}</option>
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <select name="p_c_s_d2[]" id="pc-select-{{ $count_test }}" class="pc-select">
                                        <option value="">Search</option>
                                        <option value="P" @selected($val->p_c == 'Prepaid')>Prepaid</option>
                                        <option value="C" @selected($val->p_c == 'Collect')>Collect</option>
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <select name="due_s_d2[]" id="due-select-{{ $count_test }}"
                                        class="due-select">
                                        <option value="">Search</option>
                                        <option value="Agent" @selected($val->due == 'Agent')>Agent</option>
                                        <option value="Carrier" @selected($val->due == 'Carrier')>Carrier</option>
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <select name="rate_s_d2[]" id="rate-select-{{ $count_test }}"
                                        class="rate-select">
                                        <option value="">Search</option>
                                        <option value="Break Point" @selected($val->rate == 'Break Point')>Break Point</option>
                                        <option value="Std Rate" @selected($val->rate == 'Std Rate')>Std Rate</option>
                                        <option value="Flat Amount" @selected($val->rate == 'Flat Amount')>Flat Amount</option>
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <select name="currency_s_d2[]" id="currency-sub-{{ $count_test }}"
                                        class="currency-sub">
                                        <option value="{{ $val->currency }}">{{ $val->currency }}</option>
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control curr-rate"
                                        id="curr-rate{{ $count_test }}" autocomplete="off" data-type='currency'
                                        name="curr_rate_s_d2[]"
                                        value="{{ number_format($val->curr_rate, 2, '.', ',') }}"
                                        onkeyup="sum_idr({{ $count_test }}, {{ $key + 1 }})">
                                </div>
                            </td>


                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control unit-rate"
                                        id="unit-rate{{ $count_test }}" autocomplete="off" data-type='currency'
                                        name="unit_rate_s_d2[]"
                                        value="{{ number_format($val->unit_rate, 2, '.', ',') }}"
                                        onkeyup="sum_idr({{ $count_test }}, {{ $key + 1 }})">
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control min-amt"
                                        id="min-amt{{ $count_test }}" autocomplete="off" data-type='currency'
                                        name="min_amt_s_d2[]" value="{{ number_format($val->min_amt, 2, '.', ',') }}"
                                        onkeyup="sum_idr({{ $count_test }}, {{ $key + 1 }})">
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control amt" id="amt{{ $count_test }}"
                                        value="{{ number_format($val->amt, 2, '.', ',') }}" readonly
                                        autocomplete="off" data-type='currency_amt' name="amt_s_d2[]">
                                </div>
                            </td>


                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control idr-amt"
                                        id="idr-amt{{ $count_test }}" readonly data-idr="{{ $key + 1 }}"
                                        autocomplete="off" data-type='currency_amt'
                                        value="{{ number_format($val->idr_amt, 2, '.', ',') }}"
                                        name="idr_amt_s_d2[]">
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr class="dynamic-field" id="dynamic-field-1">
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
                            <input name="fchsub_code[]" type="hidden" class="fchsub-code" id="fchsub-code-1">
                            <div class="form-group">
                                <select name="item_code_s_d2[]" id="item-select-1" class="item-select">
                                    <option value="">Search</option>

                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control item-desc" name="item_desc_s_d2[]"
                                    id="item-desc-1">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <select name="chg_unit_s_d2[]" id="chgunit-select-1" class="chgunit-select">
                                    <option value="">Search</option>
                                    <option value="CHARGE WEIGHT">CHARGE WEIGHT</option>
                                    <option value="SHIPMENT">SHIPMENT</option>
                                    <option value="WEIGHT">WEIGHT</option>
                                    <option value="VOLUME">VOLUME</option>
                                    <option value="PCS">PCS</option>
                                    <option value="CC FEE">CC FEE</option>
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control qty-input" autocomplete="off"
                                    data-type='currency4' name="qty_s_d2[]" id="qty-input-1"
                                    onkeyup="sum_idr(1, 1)">
                            </div>
                        </td>


                        <td>
                            <div class="form-group">
                                <select name="uom_s_d2[]" id="uom-sub-1" class="uom-sub">
                                    <option value="">Search</option>
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <select name="chg_s_d2[]" id="chg-select-1" class="chg-select">
                                    <option value="">Search</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <select name="vat_code_s_d2[]" id="vat-select-1" class="vat-select">
                                    <option value="">Search</option>
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <select name="p_c_s_d2[]" id="pc-select-1" class="pc-select">
                                    <option value="">Search</option>
                                    <option value="P">Prepaid</option>
                                    <option value="C">Collect</option>
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <select name="due_s_d2[]" id="due-select-1" class="due-select">
                                    <option value="">Search</option>
                                    <option value="Agent">Agent</option>
                                    <option value="Carrier">Carrier</option>
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <select name="rate_s_d2[]" id="rate-select-1" class="rate-select">
                                    <option value="">Search</option>
                                    <option value="Break Point">Break Point</option>
                                    <option value="Std Rate">Std Rate</option>
                                    <option value="Flat Amount">Flat Amount</option>
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <select name="currency_s_d2[]" id="currency-sub-1" class="currency-sub">
                                    <option value="">Search</option>
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control curr-rate" id="curr-rate1"
                                    autocomplete="off" data-type='currency' name="curr_rate_s_d2[]"
                                    onkeyup="sum_idr(1, 1)">
                            </div>
                        </td>


                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control unit-rate" id="unit-rate1"
                                    autocomplete="off" data-type='currency' name="unit_rate_s_d2[]"
                                    onkeyup="sum_idr(1, 1)">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control min-amt" id="min-amt1" autocomplete="off"
                                    data-type='currency' name="min_amt_s_d2[]" onkeyup="sum_idr(1, 1)">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control amt" id="amt1" readonly
                                    autocomplete="off" data-type='currency_amt' name="amt_s_d2[]">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control idr-amt" id="idr-amt1" readonly
                                    data-idr="1" autocomplete="off" data-type='currency_amt'
                                    name="idr_amt_s_d2[]">
                            </div>
                        </td>

                    </tr>
                @endif

            </tbody>
        </table>
    </div>
</div>

@if ($count_s_d2 > 0)
    <div class="row mt-2 align-items-center">
        <div class="col-md-12 d-flex justify-content-end">
            <div class="form-group">
                <label for="total_amt">IDR Total Amount</label>
                <input type="text"
                    value="{{ $count_s_d2 == 0 ? '' : number_format($item->total_amt, 2, '.', ',') }}"
                    data-type='currency0' readonly title="No Of Container Type 1" class="form-control total-amt"
                    name="total_amt[]" id="total-amt-{{ $key + 1 }}">
            </div>
        </div>
    </div>
@else
    <div class="row mt-2 align-items-center">
        <div class="col-md-12 d-flex justify-content-end">
            <div class="form-group">
                <label for="total_amt">IDR Total Amount</label>
                <input type="text"
                    value="{{ $count_s_d2 == 0 ? '' : number_format($item->total_amt, 2, '.', ',') }}"
                    data-type='currency0' readonly title="No Of Container Type 1" class="form-contro total-amt"
                    name="total_amt[]" id="total-amt-1">
            </div>
        </div>
    </div>
@endif
@section('sub_script_3')
    <script>
        let buttonAddSub = $("#add-button-1");
        let buttonRemoveSub = $("#remove-button-1");
        let classNameSub = ".dynamic-field";
        let addButton = ".add-button";
        let removeButton = ".remove-button";
        let countSub = 0;
        let fieldSub = "";
        let itemSelectSub = ".item-select";
        let itemDescSub = ".item-desc";
        let chgunitSub = ".chgunit-select";
        let pcSub = ".pc-select";
        let chgSub = ".chg-select";
        let rateSub = ".rate-select";
        let currencySub = ".currency-sub";
        let uomSub = ".uom-sub";
        let vatSub = ".vat-select";
        let qtyInputSub = ".qty-input";
        let total_amt = ".total-amt";
        let curr_rate = ".curr-rate";
        let min_amt = ".min-amt";
        let fchsub_code = ".fchsub-code";
        let dueSub = ".due-select";
        let amt = ".amt";
        let idr_amt = ".idr-amt";
        let unit_rate = ".unit-rate";
        let countParseSub = [];
        let countParseSubArray = [];

        function totalFieldSub() {
            return $(classNameSub).length;
        }

        function evtEnabledSubDetail(evt1 = null, evt2 = null) {
            $(`#qty-input${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#uom-select${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#chg-select${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#pc-select${evt2}-${evt1}`).attr(`disabled`, false);
        }

        $(function() {
            <?php if($count_s_d2 == 0): ?>
            evtItemCode(`#item-select-1`, `#item-desc-1`);
            evtNoData(
                `#chgunit-select-1, #chg-select-1, #pc-select-1, #rate-select-1`
            );
            evtNoData(
                `#due-select-1`
            );
            evtUomCode(`#uom-sub-1`);
            evtCurrencyCode(`#currency-sub-1`, null, true, "#curr-rate1");
            evtVatCode(`#vat-select-1`);
            evtChangeChgUnit(1, '');
            <?php endif; ?>
        });


        function addNewField(obj, evtSub = null) {
            if (totalFieldSub() < maxFields) {
                let timeSub = Math.floor(Date.now() / 1000);
                countSub = totalFieldSub() + timeSub + Math.floor(Math.random() * 999) + 1;

                countParseSub.push(countSub);

                countParseSubArray = [...new Set(countParseSub)];

                fieldSub = $(`#dynamic-field-1`).clone();

                fieldSub.attr("id", "dynamic-field-" + countSub);
                fieldSub.children("label").text("Field " + countSub);
                fieldSub.find("input").val("");
                fieldSub.find(".select2-container").remove();
                fieldSub.find(".select2-container").empty();
                fieldSub.find(itemSelectSub).empty();
                fieldSub.find(chgunitSub).val("");
                fieldSub.find(pcSub).val("");
                fieldSub.find(chgSub).val("");
                fieldSub.find(dueSub).val("");
                fieldSub.find(rateSub).val("");
                fieldSub.find(currencySub).empty();
                fieldSub.find(uomSub).empty();
                fieldSub.find(vatSub).empty();
                fieldSub.find(itemSelectSub).attr("id", "item-select-" + countSub).select2({
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
                fieldSub.find(itemDescSub).attr("id", "item-desc-" + countSub);

                if (total_line > 0) {
                    let fchsubcode = $(`#fchsub-code-${obj.split("-")[2]}`).val();
                    fieldSub.find(addButton).attr("id", "add-button-" + obj.split("-")[2]).removeAttr("onclick").attr(
                        "onclick",
                        `addNewField(this.id, '#wrapper-row-list-fch-${obj.split("-")[2]}')`);

                    fieldSub.find(qtyInputSub).attr("id", "qty-input-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, ${obj.split("-")[2]})`);
                    fieldSub.find(curr_rate).attr("id", "curr-rate" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, ${obj.split("-")[2]})`);
                    fieldSub.find(unit_rate).attr("id", "unit-rate" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, ${obj.split("-")[2]})`);
                    fieldSub.find(min_amt).attr("id", "min-amt" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, ${obj.split("-")[2]})`);
                    fieldSub.find(idr_amt).attr("id", "idr-amt" + countSub).attr("data-idr", obj.split("-")[2]);

                    fieldSub.find(fchsub_code).attr("id", "fchsub-code-" + countSub).val(fchsubcode);
                    fieldSub.find(amt).attr("id", "amt" + countSub);
                } else {
                    <?php if($count_s_d2 > 0): ?>
                    let fchsubcode = $(`#fchsub-code-${obj.split("-")[2]}`).val();
                    fieldSub.find(addButton).attr("id", "add-button-" + obj.split("-")[2]).removeAttr("onclick").attr(
                        "onclick",
                        `addNewField(this.id, '#wrapper-row-list-fch-${obj.split("-")[2]}')`);

                    fieldSub.find(qtyInputSub).attr("id", "qty-input-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, ${obj.split("-")[2]})`);
                    fieldSub.find(curr_rate).attr("id", "curr-rate" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, ${obj.split("-")[2]})`);
                    fieldSub.find(unit_rate).attr("id", "unit-rate" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, ${obj.split("-")[2]})`);
                    fieldSub.find(min_amt).attr("id", "min-amt" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, ${obj.split("-")[2]})`);
                    fieldSub.find(idr_amt).attr("id", "idr-amt" + countSub).attr("data-idr", obj.split("-")[2]);

                    fieldSub.find(fchsub_code).attr("id", "fchsub-code-" + countSub).val(fchsubcode);
                    fieldSub.find(amt).attr("id", "amt" + countSub);
                    <?php else: ?>
                    let fchsubcode = $(`#fchsub-code-1`).val();
                    fieldSub.find(fchsub_code).attr("id", "fchsub-code-" + countSub).val(fchsubcode);

                    fieldSub.find(qtyInputSub).attr("id", "qty-input-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, 1)`);
                    fieldSub.find(curr_rate).attr("id", "curr-rate" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, 1)`);
                    fieldSub.find(unit_rate).attr("id", "unit-rate" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, 1)`);
                    fieldSub.find(min_amt).attr("id", "min-amt" + countSub).removeAttr("onkeyup").attr("onkeyup",
                        `sum_idr(${countSub}, 1)`);
                    fieldSub.find(idr_amt).attr("id", "idr-amt" + countSub).attr("data-idr", 1);
                    fieldSub.find(amt).attr("id", "amt" + countSub);
                    <?php endif; ?>
                }

                fieldSub.find(removeButton).attr("id", "remove-button-" + countSub);

                fieldSub.find(chgunitSub).attr("id", "chgunit-select-" + countSub).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldSub.find(dueSub).attr("id", "due-select-" + countSub).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldSub.find(chgSub).attr("id", "chg-select-" + countSub).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldSub.find(pcSub).attr("id", "pc-select-" + countSub).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldSub.find(rateSub).attr("id", "rate-select-" + countSub).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldSub.find(uomSub).attr("id", "uom-sub-" + countSub).select2({
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
                                        custom_attribute: item.description,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                fieldSub.find(currencySub).attr("id", "currency-sub-" + countSub).select2({
                    placeholder: 'Search...',
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
                                        custom_attribute: item.description,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                fieldSub.find(vatSub).attr("id", "vat-select-" + countSub).select2({
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
                                        custom_attribute: item.description,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                if (evtSub) {
                    $(evtSub).find(classNameSub + ":last").after($(fieldSub));
                } else {
                    $(`#wrapper-row-list-fch-1`).find(classNameSub + ":last").after($(fieldSub));
                }


                evtItemCode(`#item-select-1`, `#item-desc-1`);
                evtItemCode(`#item-select-${countSub}`, `#item-desc-${countSub}`);
                evtNoData(
                    `#chgunit-select-1, #chg-select-1, #pc-select-1, #rate-select-1`);
                evtNoData(
                    `#due-select-1`
                );
                evtNoData(
                    `#chgunit-select-${countSub}, #due-select-${countSub}, #chg-select-${countSub}, #pc-select-${countSub}, #rate-select-${countSub}`
                );
                evtUomCode(`#uom-sub-1`);
                evtUomCode(`#uom-sub-${countSub}`);
                evtCurrencyCode(`#currency-sub-1`, null, true, "#curr-rate1");
                evtCurrencyCode(`#currency-sub-${countSub}`, null, true, `#curr-rate${countSub}`);

                evtVatCode(`#vat-select-1`);
                evtVatCode(`#vat-select-${countSub}`);

                evtChangeChgUnit(countSub, '');
                evtEnabledSubDetail(countSub, '');

                $("input[data-type='currency_amt']").on({
                    keyup: function() {
                        formatCurrencyAmt($(this));
                    },
                    blur: function() {
                        formatCurrencyAmt($(this), "blur");
                    }
                });

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
                $(obj).closest(classNameSub).remove();
            } else {
                alert("Minimum 1 line");
            }
        }

        function numberFormatter(num) {
            if (!isNaN(num)) {
                var wholeAndDecimal = String(num.toFixed(2)).split(".");
                var reversedWholeNumber = Array.from(wholeAndDecimal[0]).reverse();
                var formattedOutput = [];

                reversedWholeNumber.forEach((digit, index) => {
                    formattedOutput.push(digit);
                    if ((index + 1) % 3 === 0 && index < reversedWholeNumber.length - 1) {
                        formattedOutput.push(",");
                    }
                })

                formattedOutput = formattedOutput.reverse().join('') + "." + wholeAndDecimal[1];

                return formattedOutput;
            }

        }

        function sum_idr(evt = null, evt2 = null) {
            let curr = parseFloat($(`#curr-rate${evt}`).val().split(',').join(""));
            let qty = ($(`#qty-input-${evt}`).val().split(',').join("") == '' || $(`#qty-input-${evt}`).val().split(',')
                .join("") == '0.0000') ? 1 : parseFloat($(`#qty-input-${evt}`).val().split(',').join(""));
            let min = ($(`#min-amt${evt}`).val().split(',').join("") == '' || $(`#min-amt${evt}`).val().split(',').join(
                "") == '0.00') ? 0 : parseFloat($(`#min-amt${evt}`).val().split(',').join(""));
            let unit = parseFloat($(`#unit-rate${evt}`).val().split(',').join(""));
            let idr = parseFloat($(`#idr-amt${evt}`).val().split(',').join(""));
            let count_amt = 0;
            let count_idr = 0;

            // COUNT AMOUNT
            if (!isNaN(unit)) {
                count_amt += unit * qty;

                let val_amt = count_amt > min ? count_amt : min;

                document.getElementById(`amt${evt}`).value = numberFormatter(val_amt);

                // COUNT IDR
                count_idr += unit * (curr * qty);

                document.getElementById(`idr-amt${evt}`).value = numberFormatter(count_idr);

                if (evt2 != '') {
                    sumofunittotal(evt2);
                }
            }
        }

        function sumofunittotal(num = null) {
            var total = 0;
            var amt = 0
            var curr_num = $(`*[data-idr="${num}"]`);

            for (var i = 0; i < curr_num.length; ++i) {
                if (!isNaN(parseFloat(curr_num[i].value.split(',').join("")))) {
                    amt = parseFloat(curr_num[i].value.split(',').join(""));
                    total += amt;
                }

            }

            document.getElementById(`total-amt-${num}`).value = numberFormatter(total);

        }
    </script>
@endsection
