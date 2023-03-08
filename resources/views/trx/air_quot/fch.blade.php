<style>
    .row-number {
        background: #e4e7ea;
        text-align: center;
        font-weight: bold;
        padding: 10px 0px;
    }

    .row-list-fch {
        padding-top: 10px;
    }

    .row-list-fch-border {
        width: 100%;
        height: 1px;
        margin-top: 20px;
        margin-bottom: 20px;
        background: #b1b1b1;
    }

    .row-list-fch:last-child {
        border: none;
    }
</style>

<!-- START OF #wrapper-row-list-fch -->
<div id="wrapper-row-list-fch-1" class="wrapper-row-list-fch ">
    <div class="row row-list-fch">
        <div class="col-md-2">
            <div class="row-number">
                <div>
                    <small>
                        Quote Line No.
                    </small>
                </div>

                <span class='num'> 1 </span>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <a href="javascript:void(0)" class="btn  btn-primary" title="Add row" onclick="add_row_fch(this)">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0)" class="btn  btn-danger" title="Delete row"
                        onclick="delete_row_fch(this)">
                        <i class="fa fa-minus"></i>
                    </a>
                </div>
            </div>

        </div>
        <input name="fch_code[]" type="hidden" class="fch-code" id="fch-code-1">
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="air_dept_code">Air of Departure </label>
                        <select class="airdept-select" id="airdept-select-1" name="air_dept_code[]">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="air_dept_name"> </label>
                        <input type="text" readonly class="form-control airdept-name" name="air_dept_name[]"
                            id="airdept-name-1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="air_dest_code">Air of Destination </label>
                        <select class="airdest-select" id="airdest-select-1" name="air_dest_code[]">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="air_dest_name"> </label>
                        <input type="text" readonly class="form-control airdest-name" name="air_dest_name[]"
                            id="airdest-name-1">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="origin_code">Service Level </label>
                <input type="text" class="form-control service-level" id="service-level-1" name="service_level">
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="airline_id">Airline ID/Flight No</label>
                        <select class="airline-select" id="airline-select-1" name="airline_id[]">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="flight_no"> </label>
                        <input type="text" maxlength="6" data-type='currency0'
                            class="form-control @error('flight_no') is-invalid @enderror" name="flight_no[]"
                            id="flight_no">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="transit_time">Est Transit Time (Hour (s))</label>
                <input type="text" maxlength="5" data-type='currency0'
                    class="form-control @error('transit_time') is-invalid @enderror" name="transit_time[]"
                    id="transit_time">

            </div>

        </div>

        <div class="col-md-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sales_item_code">Sales Item </label>
                        <select class="salesitem-select" id="salesitem-select-1" name="sales_item_code[]">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="sales_item_name"> </label>
                        <input type="text" class="form-control salesitem-name" name="sales_item_name[]"
                            id="salesitem-name-1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="currency_d1">Currency </label>
                        <select class="currencyd1-select" id="currencyd1-select-1" name="currency_d1[]">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="weight_type">Weight Type </label>
                        <select class="weight-select form-control" id="weight-select-1" name="weight_type[]">
                            <option value=""></option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="frequency">Frequency </label>
                <input type="text" class="form-control @error('frequency') is-invalid @enderror"
                    name="frequency[]" id="frequency">
            </div>
            <div class="form-group">
                <label for="note">Note </label>
                <input type="text" class="form-control @error('note') is-invalid @enderror" name="note[]"
                    id="note">
            </div>

        </div>

    </div>
    {{-- @include('trx.air_quot.fchsub1') --}}
    @include('trx.air_quot.fchsub')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="row-list-fch-border"></div>
        </div>
    </div>
</div>
<!-- END OF #wrapper-row-list-fch -->
@section('sub_script_2')
    <script>
        let className = ".wrapper-row-list-fch";
        let air_dept = ".airdept-select";
        let air_dept_name = ".airdept-name";
        let air_dest = ".airdest-select";
        let air_dest_name = ".airdest-name";
        let service_level = ".service-level";
        let airline = ".airline-select";
        let sales_item = ".salesitem-select";
        let sales_item_name = ".salesitem-name";
        let currency_d1 = ".currencyd1-select";
        let fch_code = ".fch-code";
        let add_btn_fch = ".add-btn-fch";
        let row_number = 0;
        let total_line = 0;
        let obj_new = "";

        $(function() {
            evtAirPort(`#airdept-select-1`, `#airdept-name-1`);
            evtAirPort(`#airdest-select-1`, `#airdest-name-1`);
            evtAirLine(`#airline-select-1`, ``);
            evtItemCode(`#salesitem-select-1`, `#salesitem-name-1`);
            evtCurrencyCode(`#currencyd1-select-1`, null, false, null);
            let timeVal = Math.floor(Date.now() / 1000) + totalFields() + Math.floor(Math.random() * 999) + 1;
            $(`#fch-code-1, #fchsub-code-1`).val(timeVal);
        });

        function totalFields() {
            return $(className).length;
        }

        function add_row_fch(obj) {
            if (totalFields() < maxFields) {
                let time = Math.floor(Date.now() / 1000);

                row_number = totalFields() + time + Math.floor(Math.random() * 999) + 1;

                total_line = totalFields();

                obj_new = $('#wrapper-row-list-fch-1').clone();
                obj_new.attr("id", "wrapper-row-list-fch-" + row_number);
                obj_new.find("input").val('');
                obj_new.find("textarea").val('');
                obj_new.find(".select2-container").remove();
                obj_new.find(".select2-container").empty();
                obj_new.find(air_dept).empty();
                obj_new.find(air_dest).empty();
                obj_new.find(sales_item).empty();
                obj_new.find(airline).empty();
                obj_new.find(currency_d1).empty();

                obj_new.find(itemSelectSub).empty();
                obj_new.find(chgunitSub).val("");
                obj_new.find(pcSub).val("");
                obj_new.find(chgSub).val("");
                obj_new.find(dueSub).val("");
                obj_new.find(rateSub).val("");
                obj_new.find(currencySub).empty();
                obj_new.find(uomSub).empty();
                obj_new.find(vatSub).empty();
                obj_new.find(total_amt).attr("id", "total-amt-" + row_number);

                obj_new.find(fch_code).attr("id", "fch-code-" + row_number);

                obj_new.find(air_dept).attr("id", "airdept-select-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.airport') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
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
                obj_new.find(air_dept_name).attr("id", "airdept-name-" + row_number);

                obj_new.find(air_dest).attr("id", "airdest-select-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.airport') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
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
                obj_new.find(air_dest_name).attr("id", "airdest-name-" + row_number);

                obj_new.find(sales_item).attr("id", "salesitem-select-" + row_number).select2({
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
                obj_new.find(sales_item_name).attr("id", "salesitem-name-" + row_number);

                obj_new.find(airline).attr("id", "airline-select-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.airline') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.airline_id} - ${item.name}`,
                                        id: item.airline_id,
                                        custom_attribute: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(currency_d1).attr("id", "currencyd1-select-" + row_number).select2({
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
                                        custom_attribute: item.description,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });


                // ADD ROW SUB
                obj_new.find("#item-select-1").attr("id", "item-selectsub-" + row_number).select2({
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
                obj_new.find("#item-desc-1").attr("id", "item-descsub-" + row_number);

                obj_new.find("#fchsub-code-1").attr("id", "fchsub-code-" + row_number);

                obj_new.find("#dynamic-field-1").attr("id", "dynamic-field-" + row_number);
                obj_new.find("#tbody-condition-1").attr("id", "tbody-condition-" + row_number);

                obj_new.find("#add-button-1").attr("id", "add-button-" + row_number);
                obj_new.find("#remove-button-1").attr("id", "remove-button-" + row_number);

                obj_new.find("#qty-input-1").attr("id", "qty-input-" + row_number).removeAttr("onkeyup").attr("onkeyup",
                    `sum_idr(${row_number}, ${row_number})`).attr('disabled', false);
                obj_new.find("#curr-rate1").attr("id", "curr-rate" + row_number).removeAttr("onkeyup").attr("onkeyup",
                    `sum_idr(${row_number}, ${row_number})`);
                obj_new.find("#unit-rate1").attr("id", "unit-rate" + row_number).removeAttr("onkeyup").attr("onkeyup",
                    `sum_idr(${row_number}, ${row_number})`);
                obj_new.find("#min-amt1").attr("id", "min-amt" + row_number).removeAttr("onkeyup").attr("onkeyup",
                    `sum_idr(${row_number}, ${row_number})`);
                obj_new.find("#idr-amt1").attr("id", "idr-amt" + row_number).attr("data-idr", row_number);
                obj_new.find("#amt1").attr("id", "amt" + row_number);

                obj_new.find("#chgunit-select-1").attr("id", "chgunit-selectsub-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });

                obj_new.find("#due-select-1").attr("id", "due-selectsub-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                obj_new.find("#chg-select-1").attr("id", "chg-selectsub-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                obj_new.find("#pc-select-1").attr("id", "pc-selectsub-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                obj_new.find("#rate-select-1").attr("id", "rate-selectsub-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                obj_new.find("#uom-sub-1").attr("id", "uom-subsub-" + row_number).select2({
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
                obj_new.find("#currency-sub-1").attr("id", "currency-subsub-" + row_number).select2({
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
                obj_new.find("#container-select-1").attr("id", "container-selectsub-" + row_number).select2({
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
                obj_new.find("#vat-select-1").attr("id", "vat-selectsub-" + row_number).select2({
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

                $(className + ":last").after($(obj_new));


                evtAirPort(`#airdept-select-1`, `#airdept-name-1`);
                evtAirPort(`#airdept-select-${row_number}`, `#airdept-name-${row_number}`);
                evtAirPort(`#airdest-select-1`, `#airdest-name-1`);
                evtAirPort(`#airdest-select-${row_number}`, `#airdest-name-${row_number}`);
                evtAirLine(`#airline-select-1`, ``);
                evtAirLine(`#airline-select-${row_number}`, ``);
                evtItemCode(`#salesitem-select-1`, `#salesitem-name-1`);
                evtItemCode(`#salesitem-select-${row_number}`, `#salesitem-name-${row_number}`);
                evtCurrencyCode(`#currencyd1-select-1`, null, false, null);
                evtCurrencyCode(`#currencyd1-select-${row_number}`, null, false, null);

                $(`#add-button-${row_number}`).removeAttr("onclick").attr("onclick",
                    `addNewField(this.id, '#wrapper-row-list-fch-${row_number}')`);

                $(`#fch-code-${row_number}, #fchsub-code-${row_number}`).val(row_number);

                evtChangeChgUnit(row_number, 'sub');
                evtEnabledSubDetail(row_number, 'sub');

                evtItemCode(`#item-select-1`, `#item-desc-1`);
                evtItemCode(`#item-selectsub-${row_number}`, `#item-descsub-${row_number}`);
                evtNoData(
                    `#chgunit-select-1, #cargo-select-1, #chg-select-1, #pc-select-1, #rate-select-1`);
                evtNoData(
                    `#due-select-1`
                );
                evtNoData(
                    `#chgunit-selectsub-${row_number}, #cargo-selectsub-${row_number}, #due-selectsub-${row_number}, #chg-selectsub-${row_number}, #pc-selectsub-${row_number}, #rate-selectsub-${row_number}`
                );
                evtUomCode(`#uom-sub-1`);
                evtUomCode(`#uom-subsub-${row_number}`);
                evtCurrencyCode(`#currency-sub-1`, null, true, "#curr-rate1");
                evtCurrencyCode(`#currency-subsub-${row_number}`, null, true, `#curr-rate${row_number}`);
                evtVatCode(`#vat-select-1`);
                evtVatCode(`#vat-selectsub-${row_number}`);


                // DELETE ROW SUB JIKA ADA LEBIH DARI 1
                obj_new.find(`.dynamic-field`).not(':first').remove();

                evtCountRowNumber();

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

        function delete_row_fch(obj) {
            if ($(className).length > 1) {
                if (confirm("Are you sure delete this row?") == true) {
                    $(obj).closest(className).remove();
                }
            } else {
                alert("Minimum 1 line");
            }

            evtCountRowNumber();
        }

        function evtCountRowNumber() {
            var obj_row_number = $('.wrapper-row-list-fch .row-number span.num');

            var num = 0;
            for (var i = 0; i < obj_row_number.length; i++) {
                num++;
                $(obj_row_number[i]).html(num);
            }
        }

        function evtPort(evt1 = null, evt2 = null) {
            $(`${evt1}`).select2({
                placeholder: 'Search...',
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

            $(`${evt1}`).change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $(`${evt2}`).val(desc);
            });
        }


        function evtChangeChgUnit(evt1 = null, evt2 = null) {
            $(`.chgunit-select`).change(function(e) {
                e.preventDefault();
                let val = $(this).val();
                if (val == "REV TON") {
                    $(`#chg-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#pc-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#container-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#qty-input-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#uom-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                } else if (val == `SHIPMENT`) {
                    $(`#qty-input-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#cargo-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#uom-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#container-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#chg-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                } else if (val == `VOLUME` || val == `WEIGHT` || val == `PCS`) {
                    $(`#container-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#qty-input-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#uom-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#chg-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                } else {
                    $(`#container-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#qty-input-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#uom-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#chg-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                }
            });
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

            $(evt1).change(function(e) {
                e.preventDefault();
                let charge_desc = $(this).select2('data')[0].custom_attribute;

                $(evt2).val(charge_desc);
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

        function evtAirPort(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.airport') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
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

            $(evt1).change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $(evt2).val(desc);
            });
        }

        function evtAirLine(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.airline') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.airline_id} - ${item.name}`,
                                    id: item.airline_id,
                                    custom_attribute: item.name
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
