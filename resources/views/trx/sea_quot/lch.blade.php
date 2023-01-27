<div class="row">
    <div class="col-md-12 col-sm-12" style="overflow:auto;">
        <table id="table-condition" class="table table-bordered table-sm table-responsive-sm">
            <thead>
                <tr>
                    <th class="text-center th-action" style="min-width: 120px;"> Action </th>
                    <th class="text-center" style="min-width: 200px;"> Item Code </th>
                    <th class="text-center" style="min-width: 200px;"> Description </th>
                    <th class="text-center" style="min-width: 200px;"> Charge Unit </th>
                    <th class="text-center" style="min-width: 200px;"> Qty </th>
                    <th class="text-center" style="min-width: 200px;"> Cargo </th>
                    <th class="text-center" style="min-width: 200px;"> DG </th>
                    <th class="text-center" style="min-width: 200px;"> UOM </th>
                    <th class="text-center" style="min-width: 200px;"> Charge </th>
                    <th class="text-center" style="min-width: 200px;"> Vat </th>
                    <th class="text-center" style="min-width: 200px;"> Prepaid/Collect </th>
                    <th class="text-center" style="min-width: 200px;"> Container </th>
                    <th class="text-center" style="min-width: 200px;"> Rate </th>
                    <th class="text-center" style="min-width: 200px;"> Currency </th>
                    <th class="text-center" style="min-width: 200px;"> Min Amount </th>
                    <th class="text-center" style="min-width: 200px;"> Amount </th>
                </tr>
            </thead>

            <tbody id="tbody-conditiond2">
                <tr class="dynamic-field-d2" id="dynamic-field-d2-1">
                    <td class="text-center">
                        <button type="button" onclick="addNewFieldD2(this)" id="add-buttond2"
                            class="btn btn-xs btn-primary float-left text-uppercase shadow-sm"><i
                                class="fa fa-plus fa-fw"></i>
                        </button>
                        <button type="button" onclick="removeLastFieldD2(this)" id="remove-buttond2"
                            class="btn btn-xs btn-danger float-left text-uppercase ml-1"><i
                                class="fa fa-minus fa-fw"></i>
                        </button>

                    </td>

                    <td>
                        <div class="form-group">
                            <select name="item_code_d2[]" id="item-selectd2-1" class="item-selectd2">
                                <option value="">Search</option>

                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control item-descd2" name="item_desc_d2[]" readonly
                                id="item-descd2-1">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="chg_unit_d2[]" id="chgunit-selectd2-1" class="chgunit-selectd2">
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
                            <input type="text" class="form-control qty-inputd2" autocomplete="off"
                                data-type='currency4' name="qty_d2[]" id="qty-inputd2-1">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="cargo_d2[]" id="cargo-selectd2-1" class="cargo-selectd2">
                                <option value="">Search</option>
                                <option value="FCL">FCL</option>
                                <option value="LCL">LCL</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="dg_d2[]" id="dg-selectd2-1" class="dg-selectd2">
                                <option value="">Search</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="uom_d2[]" id="uom-subd2-1" class="uom-subd2">
                                <option value="">Search</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="chg_d2[]" id="chg-selectd2-1" class="chg-selectd2">
                                <option value="">Search</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="vat_code_d2[]" id="vat-selectd2-1" class="vat-selectd2">
                                <option value="">Search</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="p_c_d2[]" id="pc-selectd2-1" class="pc-selectd2">
                                <option value="">Search</option>
                                <option value="P">Prepaid</option>
                                <option value="C">Collect</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="container_d2[]" id="container-selectd2-1" class="container-selectd2">
                                <option value="">Search</option>
                                </option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="rate_d2[]" id="rate-selectd2-1" class="rate-selectd2">
                                <option value="">Search</option>
                                <option value="Break Point">Break Point</option>
                                <option value="Std Rate">Std Rate</option>
                                <option value="Flat Amount">Flat Amount</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="currency_d2[]" id="currency-subd2-1" class="currency-subd2">
                                <option value="">Search</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" autocomplete="off" data-type='currency'
                                name="min_amt_d2[]">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" autocomplete="off" data-type='currency_amt'
                                name="amt_d2[]">
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@section('sub_script_4')
    <script>
        let buttonAddD2 = $("#add-buttond2");
        let buttonRemoveD2 = $("#remove-buttond2");
        let classNameD2 = ".dynamic-field-d2";
        let countD2 = 0;
        let fieldD2 = "";
        let itemSelectD2 = ".item-selectd2";
        let itemDescD2 = ".item-descd2";
        let chgunitD2 = ".chgunit-selectd2";
        let pcD2 = ".pc-selectd2";
        let chgD2 = ".chg-selectd2";
        let cargoD2 = ".cargo-selectd2";
        let dgD2 = ".dg-selectd2";
        let rateD2 = ".rate-selectd2";
        let currencyD2 = ".currency-subd2";
        let uomD2 = ".uom-subd2";
        let vatD2 = ".vat-selectd2";
        let containerD2 = ".container-selectd2";
        let qtyInputD2 = ".qty-inputd2";
        let countParseD2 = [];
        let countParseD2Array = [];

        function totalFieldD2() {
            return $(classNameD2).length;
        }

        $(function() {
            evtItemCode(`#item-selectd2-1`, `#item-descd2-1`);
            evtNoData(
                `#chgunit-selectd2-1, #cargo-selectd2-1, #dg-selectd2-1, #chg-selectd2-1, #pc-selectd2-1, #rate-selectd2-1`
            );
            evtUomCode(`#uom-subd2-1`);
            evtCurrencyCode(`#currency-subd2-1`);
            evtContainer(`#container-selectd2-1`);
            evtVatCode(`#vat-selectd2-1`);

            evtChangeChgUnitD2(1, '');
            evtEnabledSubDetailD2(1, '');
        });

        function evtChangeChgUnitD2(evt1 = null, evt2 = null) {
            $(`.chgunit-selectd2`).change(function(e) {
                e.preventDefault();
                let val = $(this).val();
                if (val == "REV TON") {
                    $(`#chg-selectd2${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#pc-selectd2${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#container-selectd2${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#qty-inputd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#dg-selectd2${evt2}-${evt1}`).attr(`disabled`, false);
                    $(`#uom-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                } else if (val == `SHIPMENT`) {
                    $(`#qty-inputd2${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#cargo-selectd2${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#dg-selectd2${evt2}-${evt1}`).attr(`disabled`, true)
                    $(`#uom-selectd2${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#container-selectd2${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#chg-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                } else if (val == `VOLUME` || val == `WEIGHT` || val == `PCS`) {
                    $(`#container-selectd2${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#qty-inputd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#dg-selectd2${evt2}-${evt1}`).attr(`disabled`, false);
                    $(`#uom-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#chg-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                } else {
                    $(`#container-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#qty-inputd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#dg-selectd2${evt2}-${evt1}`).attr(`disabled`, false);
                    $(`#uom-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#chg-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-selectd2${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                }
            });
        }

        function evtEnabledSubDetailD2(evt1 = null, evt2 = null) {
            $(`#container-selectd2${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#qty-inputd2${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#cargo-selectd2${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#dg-selectd2${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#uom-selectd2${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#chg-selectd2${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#pc-selectd2${evt2}-${evt1}`).attr(`disabled`, false);
        }

        function addNewFieldD2(obj) {
            if (totalFieldD2() < maxFields) {
                let timeD2 = Math.floor(Date.now() / 1000);

                countD2 = totalFieldD2() + timeD2 + Math.floor(Math.random() * 999) + 1;

                countParseD2.push(countD2);

                countParseD2Array = [...new Set(countParseD2)];

                fieldD2 = $("#dynamic-field-d2-1").clone();
                fieldD2.attr("id", "dynamic-field-d2-" + countD2);
                fieldD2.children("label").text("Field " + countD2);
                fieldD2.find("input").val("");
                fieldD2.find(".select2-container").remove();
                fieldD2.find(".select2-container").empty();
                fieldD2.find(itemSelectD2).empty();
                fieldD2.find(currencyD2).empty();
                fieldD2.find(uomD2).empty();
                fieldD2.find(vatD2).empty();
                fieldD2.find(dueSelectD2).val('');
                fieldD2.find(chgunitD2).val('');
                fieldD2.find(pcD2).val('');
                fieldD2.find(chgD2).val('');
                fieldD2.find(rateD2).val('');
                fieldD2.find(qtyInputD2).attr("id", "qty-inputd2-" + countD2);

                fieldD2.find(itemSelectD2).attr("id", "item-selectd2-" + countD2).select2({
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
                fieldD2.find(itemDescD2).attr("id", "item-descd2-" + countD2)

                fieldD2.find(chgunitD2).attr("id", "chgunit-selectd2-" + countD2).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldD2.find(cargoD2).attr("id", "cargo-selectd2-" + countD2).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldD2.find(dgD2).attr("id", "dg-selectd2-" + countD2).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldD2.find(chgD2).attr("id", "chg-selectd2-" + countD2).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldD2.find(pcD2).attr("id", "pc-selectd2-" + countD2).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldD2.find(rateD2).attr("id", "rate-selectd2-" + countD2).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldD2.find(uomD2).attr("id", "uom-subd2-" + countD2).select2({
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
                                        id: item.code,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                fieldD2.find(currencyD2).attr("id", "currency-subd2-" + countD2).select2({
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
                                        id: item.code,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                fieldD2.find(containerD2).attr("id", "container-selectd2-" + countD2).select2({
                    placeholder: 'Search...',
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
                                        text: `${item.type}`,
                                        id: item.type,
                                        custom_attribute: item.description
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                fieldD2.find(vatD2).attr("id", "vat-selectd2-" + countD2).select2({
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

                $(classNameD2 + ":last").after($(fieldD2));

                evtItemCode(`#item-selectd2-1`, `#item-descd2-1`);
                evtItemCode(`#item-selectd2-${countD2}`, `#item-descd2-${countD2}`);
                evtNoData(
                    `#chgunit-selectd2-1, #cargo-selectd2-1, #dg-selectd2-1, #chg-selectd2-1, #pc-selectd2-1, #rate-selectd2-1`
                );
                evtNoData(
                    `#chgunit-selectd2-${countD2}, #cargo-selectd2-${countD2}, #dg-selectd2-${countD2}, #chg-selectd2-${countD2}, #pc-selectd2-${countD2}, #rate-selectd2-${countD2}`
                );
                evtUomCode(`#uom-subd2-1`);
                evtUomCode(`#uom-subd2-${countD2}`);
                evtCurrencyCode(`#currency-subd2-1`);
                evtCurrencyCode(`#currency-subd2-${countD2}`);
                evtContainer(`#container-selectd2-1`);
                evtContainer(`#container-selectd2-${countD2}`);
                evtVatCode(`#vat-selectd2-1`);
                evtVatCode(`#vat-selectd2-${countD2}`);

                evtChangeChgUnitD2(countD2, '');
                evtEnabledSubDetailD2(countD2, '');

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

        function removeLastFieldD2(obj) {
            if ($(classNameD2).length > 1) {
                $(obj).closest(classNameD2).remove();
            } else {
                alert("Minimum 1 line");
            }
        }
    </script>
@endsection
