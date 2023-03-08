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
                    <th class="text-center" style="min-width: 200px;"> Cargo </th>
                    <th class="text-center" style="min-width: 200px;"> DG </th>
                    <th class="text-center" style="min-width: 200px;"> UOM </th>
                    <th class="text-center" style="min-width: 200px;"> Charge </th>
                    <th class="text-center" style="min-width: 200px;"> Vat </th>
                    <th class="text-center" style="min-width: 200px;"> Prepaid/Collect </th>
                    <th class="text-center" style="min-width: 200px;"> Container </th>
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
                            <select name="item_code[]" id="item-select-1" class="item-select">
                                <option value="">Search</option>

                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control item-desc" name="item_desc[]" id="item-desc-1">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="chg_unit[]" id="chgunit-select-1" class="chgunit-select">
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
                            <input type="text" class="form-control qty-input" autocomplete="off"
                                data-type='currency4' name="qty[]" id="qty-input-1" onkeyup="sum_idr(1, 1)">
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
                            <select name="uom[]" id="uom-sub-1" class="uom-sub">
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
                            <select name="vat_code[]" id="vat-select-1" class="vat-select">
                                <option value="">Search</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="p_c[]" id="pc-select-1" class="pc-select">
                                <option value="">Search</option>
                                <option value="P">Prepaid</option>
                                <option value="C">Collect</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <select name="container[]" id="container-select-1" class="container-select">
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
                            <select name="currency[]" id="currency-sub-1" class="currency-sub">
                                <option value="">Search</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control curr-rate" id="curr-rate1" autocomplete="off"
                                data-type='currency' name="curr_rate[]" onkeyup="sum_idr(1, 1)">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control unit-rate" id="unit-rate1" autocomplete="off"
                                data-type='currency' name="unit_rate[]" onkeyup="sum_idr(1, 1)">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control min-amt" id="min-amt1" autocomplete="off"
                                data-type='currency' name="min_amt[]" onkeyup="sum_idr(1, 1)">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control amt" id="amt1" readonly
                                autocomplete="off" data-type='currency_amt' name="amt[]">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control idr-amt" id="idr-amt1" readonly
                                data-idr="1" autocomplete="off" data-type='currency_amt' name="idr_amt[]">
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-2 align-items-center">
    <div class="col-md-12 d-flex justify-content-end">
        <div class="form-group">
            <label for="total_amt">IDR Total Amount</label>
            <input type="text" data-type='currency0' readonly title="No Of Container Type 1"
                class="form-control total-amt" name="total_amt[]" id="total-amt-1">
        </div>
    </div>
</div>
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
        let cargoSub = ".cargo-select";
        let dgSub = ".dg-select";
        let rateSub = ".rate-select";
        let currencySub = ".currency-sub";
        let uomSub = ".uom-sub";
        let vatSub = ".vat-select";
        let containerSub = ".container-select";
        let qtyInputSub = ".qty-input";
        let total_amt = ".total-amt";
        let curr_rate = ".curr-rate";
        let min_amt = ".min-amt";
        let fchsub_code = ".fchsub-code";
        let amt = ".amt";
        let idr_amt = ".idr-amt";
        let unit_rate = ".unit-rate";
        let countParseSub = [];
        let countParseSubArray = [];

        function totalFieldSub() {
            return $(classNameSub).length;
        }

        $(function() {
            evtItemCode(`#item-select-1`, `#item-desc-1`);
            evtNoData(
                `#chgunit-select-1, #cargo-select-1, #dg-select-1, #chg-select-1, #pc-select-1, #rate-select-1`);
            evtUomCode(`#uom-sub-1`);
            evtCurrencyCode(`#currency-sub-1`, null, true, "#curr-rate1");
            evtContainer(`#container-select-1`);
            evtVatCode(`#vat-select-1`);
            evtChangeChgUnit(1, '');
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
                fieldSub.find(chgunitSub).val('');
                fieldSub.find(pcSub).val('');
                fieldSub.find(chgSub).val('');
                fieldSub.find(cargoSub).val('');
                fieldSub.find(dgSub).val('');
                fieldSub.find(rateSub).val('');
                fieldSub.find(currencySub).empty();
                fieldSub.find(uomSub).empty();
                fieldSub.find(vatSub).empty();
                fieldSub.find(containerSub).empty();
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
                }

                fieldSub.find(removeButton).attr("id", "remove-button-" + countSub);

                fieldSub.find(chgunitSub).attr("id", "chgunit-select-" + countSub).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldSub.find(cargoSub).attr("id", "cargo-select-" + countSub).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                fieldSub.find(dgSub).attr("id", "dg-select-" + countSub).select2({
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
                fieldSub.find(containerSub).attr("id", "container-select-" + countSub).select2({
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
                                        text: `${item.type} - ${item.description}`,
                                        id: item.type,
                                        custom_attribute: item.description
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
                    `#chgunit-select-1, #cargo-select-1, #dg-select-1, #chg-select-1, #pc-select-1, #rate-select-1`);
                evtNoData(
                    `#chgunit-select-${countSub}, #cargo-select-${countSub}, #dg-select-${countSub}, #chg-select-${countSub}, #pc-select-${countSub}, #rate-select-${countSub}`
                );
                evtUomCode(`#uom-sub-1`);
                evtUomCode(`#uom-sub-${countSub}`);
                evtCurrencyCode(`#currency-sub-1`, null, true, "#curr-rate1");
                evtCurrencyCode(`#currency-sub-${countSub}`, null, true, `#curr-rate${countSub}`);
                evtContainer(`#container-select-1`);
                evtContainer(`#container-select-${countSub}`);
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

        function evtEnabledSubDetail(evt1 = null, evt2 = null) {
            $(`#container-select${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#qty-input${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#cargo-select${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#dg-select${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#uom-select${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#chg-select${evt2}-${evt1}`).attr(`disabled`, false);
            $(`#pc-select${evt2}-${evt1}`).attr(`disabled`, false);
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
