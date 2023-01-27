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
@if (count($sq_d1) > 0)
    @foreach ($sq_d1 as $key => $item)
        <div id="wrapper-row-list-fch-{{ $key + 1 }}" class="wrapper-row-list-fch ">
            <div class="row row-list-fch">
                <div class="col-md-2">
                    <div class="row-number">
                        <div>
                            <small>
                                Quote Line No.
                            </small>
                        </div>

                        <span class='num'> {{ $key + 1 }} </span>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <a href="javascript:void(0)" class="btn  btn-primary" title="Add row"
                                onclick="add_row_fch(this)">
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
                <input name="fch_code[]" type="hidden" value="{{ $item->code }}" class="fch-code"
                    id="fch-code-{{ $key + 1 }}">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="port_loading_code">Port Of Loading </label>
                                <select class="portloading-select" id="portloading-select-{{ $key + 1 }}"
                                    name="port_loading_code[]">
                                    <option value="{{ $item->port_loading_code }}">{{ $item->port_loading_code }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="port_loading_name"> </label>
                                <input type="text" readonly class="form-control portloading-name"
                                    value="{{ $item->port_loading_name }}" name="port_loading_name[]"
                                    id="portloading-name-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="port_discharge_code">Port Of Discharge </label>
                                <select class="portdischarge-select" id="portdischarge-select-{{ $key + 1 }}"
                                    name="port_discharge_code[]">
                                    <option value="{{ $item->port_discharge_code }}">{{ $item->port_discharge_code }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="port_discharge_name"> </label>
                                <input type="text" readonly class="form-control portdischarge-name"
                                    value="{{ $item->port_discharge_name }}" name="port_discharge_name[]"
                                    id="portdischarge-name-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="origin_code">Origin </label>
                                <select class="origin-select" id="origin-select-{{ $key + 1 }}"
                                    name="origin_code[]">
                                    <option value="{{ $item->origin_code }}">{{ $item->origin_code }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="origin_name"> </label>
                                <input type="text" readonly class="form-control origin-name"
                                    value="{{ $item->origin_name }}" name="origin_name[]"
                                    id="origin-name-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dest_code">Destination </label>
                                <select class="dest-select" id="dest-select-{{ $key + 1 }}" name="dest_code[]">
                                    <option value="{{ $item->dest_code }}">{{ $item->dest_code }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="dest_name"> </label>
                                <input type="text" readonly class="form-control dest-name"
                                    value="{{ $item->dest_name }}" name="dest_name[]"
                                    id="dest-name-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="transit_time">Est Transit Time (Day (s))</label>
                        <input type="text" maxlength="5" data-type='currency0' value="{{ $item->transit_time }}"
                            class="form-control @error('transit_time') is-invalid @enderror" name="transit_time[]"
                            id="transit_time">

                    </div>
                    <div class="form-group">
                        <label for="frequency">Frequency </label>
                        <input type="text" value="{{ $item->frequency }}"
                            class="form-control @error('frequency') is-invalid @enderror" name="frequency[]"
                            id="frequency">

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="note_code">Note </label>
                                <input type="text" value="{{ $item->note_code }}"
                                    class="form-control @error('note_code') is-invalid @enderror" name="note_code[]"
                                    id="note_code">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="note">&nbsp; </label>
                                <input type="text" value="{{ $item->note }}"
                                    class="form-control @error('note') is-invalid @enderror" name="note[]"
                                    id="note">

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="shipping_line_code">Shipping Line </label>
                                <select class="shipping-select" id="shipping-select-{{ $key + 1 }}"
                                    name="shipping_line_code[]">
                                    <option value="{{ $item->shipping_line_code }}">{{ $item->shipping_line_code }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="shipping_name"> </label>
                                <input type="text" readonly value="{{ $item->shipping_line_name }}"
                                    class="form-control shipping-name" name="shipping_line_name[]"
                                    id="shipping-name-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="via_port_code">Via Port </label>
                                <select class="viaport-select" id="viaport-select-{{ $key + 1 }}"
                                    name="via_port_code[]">
                                    <option value="{{ $item->via_port_code }}">{{ $item->via_port_code }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="via_port_name"> </label>
                                <input type="text" readonly value="{{ $item->via_port_name }}"
                                    class="form-control viaport-name" name="via_port_name[]"
                                    id="viaport-name-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="second_port_code">Via Port 2 </label>
                                <select class="secondport-select" id="secondport-select-{{ $key + 1 }}"
                                    name="second_port_code[]">
                                    <option value="{{ $item->second_port_code }}">{{ $item->second_port_code }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="second_port_name"> </label>
                                <input type="text" readonly value="{{ $item->second_port_name }}"
                                    class="form-control secondport-name" name="second_port_name[]"
                                    id="secondport-name-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="third_port_code">Via Port 3 </label>
                                <select class="third-select" id="third-select-{{ $key + 1 }}"
                                    name="third_port_code[]">
                                    <option value="{{ $item->third_port_code }}">{{ $item->third_port_code }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="third_port_name"> </label>
                                <input type="text" readonly value="{{ $item->third_port_name }}"
                                    class="form-control third-name" name="third_port_name[]"
                                    id="third-name-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="frt_collect">Frt Collect </label>
                        <select name="frt_collect[]" id="frt_collect" class="form-control">
                            <option value=""></option>
                            <option value="yes" @selected($item->frt_collect == 'yes')>Yes</option>
                            <option value="no" @selected($item->frt_collect == 'no')>No</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="commodity_code">Commodity </label>
                                <select class="commodity-select" id="commodity-select-{{ $key + 1 }}"
                                    name="commodity_code[]">
                                    <option value="{{ $item->commodity_code }}">{{ $item->commodity_code }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="commodity_name"> </label>
                                <input type="text" readonly value="{{ $item->commodity_name }}"
                                    class="form-control commodity-name" name="commodity_name[]"
                                    id="commodity-name-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="delivery_type">Delivery Type </label>
                                <select class="delivery-select" id="delivery-select-{{ $key + 1 }}"
                                    name="delivery_type[]">
                                    <option value="{{ $item->delivery_type }}">{{ $item->delivery_type }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="delivery_name"> </label>
                                <input type="text" readonly value="{{ $item->delivery_name }}"
                                    class="form-control delivery-name" name="delivery_name[]"
                                    id="delivery-name-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            @include('trx.sea_quot.fchsub_edit', [
                'item_s_d1' => $item->sea_quotation_s_d1,
                'count_s_d1' => 99,
            ])
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="row-list-fch-border"></div>
                </div>
            </div>
        </div>
    @endforeach
@else
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
                        <a href="javascript:void(0)" class="btn  btn-primary" title="Add row"
                            onclick="add_row_fch(this)">
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
                            <label for="port_loading_code">Port Of Loading </label>
                            <select class="portloading-select" id="portloading-select-1" name="port_loading_code[]">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="port_loading_name"> </label>
                            <input type="text" readonly class="form-control portloading-name"
                                name="port_loading_name[]" id="portloading-name-1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="port_discharge_code">Port Of Discharge </label>
                            <select class="portdischarge-select" id="portdischarge-select-1"
                                name="port_discharge_code[]">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="port_discharge_name"> </label>
                            <input type="text" readonly class="form-control portdischarge-name"
                                name="port_discharge_name[]" id="portdischarge-name-1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="origin_code">Origin </label>
                            <select class="origin-select" id="origin-select-1" name="origin_code[]">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="origin_name"> </label>
                            <input type="text" readonly class="form-control origin-name" name="origin_name[]"
                                id="origin-name-1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dest_code">Destination </label>
                            <select class="dest-select" id="dest-select-1" name="dest_code[]">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="dest_name"> </label>
                            <input type="text" readonly class="form-control dest-name" name="dest_name[]"
                                id="dest-name-1">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="transit_time">Est Transit Time (Day (s))</label>
                    <input type="text" maxlength="5" data-type='currency0'
                        class="form-control @error('transit_time') is-invalid @enderror" name="transit_time[]"
                        id="transit_time">

                </div>
                <div class="form-group">
                    <label for="frequency">Frequency </label>
                    <input type="text" class="form-control @error('frequency') is-invalid @enderror"
                        name="frequency[]" id="frequency">

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="note_code">Note </label>
                            <input type="text" class="form-control @error('note_code') is-invalid @enderror"
                                name="note_code[]" id="note_code">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="note">&nbsp; </label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror"
                                name="note[]" id="note">

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="shipping_line_code">Shipping Line </label>
                            <select class="shipping-select" id="shipping-select-1" name="shipping_line_code[]">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="shipping_name"> </label>
                            <input type="text" readonly class="form-control shipping-name"
                                name="shipping_line_name[]" id="shipping-name-1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="via_port_code">Via Port </label>
                            <select class="viaport-select" id="viaport-select-1" name="via_port_code[]">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="via_port_name"> </label>
                            <input type="text" readonly class="form-control viaport-name" name="via_port_name[]"
                                id="viaport-name-1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="second_port_code">Via Port 2 </label>
                            <select class="secondport-select" id="secondport-select-1" name="second_port_code[]">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="second_port_name"> </label>
                            <input type="text" readonly class="form-control secondport-name"
                                name="second_port_name[]" id="secondport-name-1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="third_port_code">Via Port 3 </label>
                            <select class="third-select" id="third-select-1" name="third_port_code[]">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="third_port_name"> </label>
                            <input type="text" readonly class="form-control third-name" name="third_port_name[]"
                                id="third-name-1">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="frt_collect">Frt Collect </label>
                    <select name="frt_collect[]" id="frt_collect" class="form-control">
                        <option value=""></option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="commodity_code">Commodity </label>
                            <select class="commodity-select" id="commodity-select-1" name="commodity_code[]">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="commodity_name"> </label>
                            <input type="text" readonly class="form-control commodity-name"
                                name="commodity_name[]" id="commodity-name-1">
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="delivery_type">Delivery Type </label>
                            <select class="delivery-select" id="delivery-select-1" name="delivery_type[]">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="delivery_name"> </label>
                            <input type="text" readonly class="form-control delivery-name" name="delivery_name[]"
                                id="delivery-name-1">
                        </div>
                    </div>
                </div>

            </div>

        </div>
        @include('trx.sea_quot.fchsub_edit', ['item_s_d1' => [], 'count_s_d1' => 0])
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row-list-fch-border"></div>
            </div>
        </div>
    </div>
@endif

<!-- END OF #wrapper-row-list-fch -->
@section('sub_script_2')
    <script>
        let className = ".wrapper-row-list-fch";
        let port_loading = ".portloading-select";
        let port_loading_name = ".portloading-name";
        let port_discharge = ".portdischarge-select";
        let port_discharge_name = ".portdischarge-name";
        let origin = ".origin-select";
        let origin_name = ".origin-name";
        let dest = ".dest-select";
        let dest_name = ".dest-name";
        let viaport = ".viaport-select";
        let viaport_name = ".viaport-name";
        let secondport = ".secondport-select";
        let secondport_name = ".secondport-name";
        let third = ".third-select";
        let third_name = ".third-name";
        let shipping = ".shipping-select";
        let shipping_name = ".shipping-name";
        let commodity = ".commodity-select";
        let commodity_name = ".commodity-name";
        let delivery = ".delivery-select";
        let delivery_name = ".delivery-name";
        let fch_code = ".fch-code";
        let row_number = 0;
        let total_line = 0;
        let obj_new = "";

        $(function() {
            <?php if(count($sq_d1) > 0): ?>
            <?php foreach($sq_d1 as $key => $item): ?>
            evtPort("#portloading-select-{{ $key + 1 }}", "#portloading-name-{{ $key + 1 }}")
            evtPort("#portdischarge-select-{{ $key + 1 }}", "#portdischarge-name-{{ $key + 1 }}")
            evtPort("#viaport-select-{{ $key + 1 }}", "#viaport-name-{{ $key + 1 }}")
            evtPort("#secondport-select-{{ $key + 1 }}", "#secondport-name-{{ $key + 1 }}")
            evtPort("#third-select-{{ $key + 1 }}", "#third-name-{{ $key + 1 }}")
            evtCity("#origin-select-{{ $key + 1 }}", "#origin-name-{{ $key + 1 }}");
            evtCity("#dest-select-{{ $key + 1 }}", "#dest-name-{{ $key + 1 }}");
            evtShippline("#shipping-select-{{ $key + 1 }}", "#shipping-name-{{ $key + 1 }}");
            evtCommodity("#commodity-select-{{ $key + 1 }}", "#commodity-name-{{ $key + 1 }}");
            evtDeliveryType("#delivery-select-{{ $key + 1 }}", "#delivery-name-{{ $key + 1 }}");

            <?php foreach($item->sea_quotation_s_d1 as $key_s_d1 => $item_s_d1): ?>
            evtItemCode(`#item-select-{{ $key_s_d1 + $key * 2 }}`,
                `#item-desc-{{ $key_s_d1 + $key * 2 }}`);
            evtNoData(
                `#chgunit-select-{{ $key_s_d1 + $key * 2 }}, #cargo-select-{{ $key_s_d1 + $key * 2 }}, #dg-select-{{ $key_s_d1 + $key * 2 }}, #chg-select-{{ $key_s_d1 + $key * 2 }}, #pc-select-{{ $key_s_d1 + $key * 2 }}, #rate-select-{{ $key_s_d1 + $key * 2 }}`
            );
            evtUomCode(`#uom-sub-{{ $key_s_d1 + $key * 2 }}`);
            evtCurrencyCode(`#currency-sub-{{ $key_s_d1 + $key * 2 }}`, null, true,
                "#curr-rate{{ $key_s_d1 + $key * 2 }}");
            evtContainer(`#container-select-{{ $key_s_d1 + $key * 2 }}`);
            evtVatCode(`#vat-select-{{ $key_s_d1 + $key * 2 }}`);
            evtChangeChgUnit(`{{ $key_s_d1 + $key * 2 }}`, '');

            $(`#add-button-{{ $key_s_d1 + $key * 2 }}`).removeAttr("onclick").attr("onclick",
                `addNewField(this.id, '#wrapper-row-list-fch-{{ $key + 1 }}')`);
            $(`#amt{{ $key_s_d1 + $key * 2 }}`).removeAttr("onchange").attr("onchange",
                `sumofunittotal({{ $key + 1 }})`).attr("id", "amt" + `{{ $key + 1 }}`);
            $(`#curr-rate{{ $key_s_d1 + $key * 2 }}`).removeAttr("onchange").attr("onchange",
                `sumofunittotal({{ $key + 1 }})`).attr("data-curr", `{{ $key + 1 }}`);
            <?php endforeach; ?>

            <?php endforeach; ?>

            <?php else: ?>

            evtPort("#portloading-select-1", "#portloading-name-1")
            evtPort("#portdischarge-select-1", "#portdischarge-name-1")
            evtPort("#viaport-select-1", "#viaport-name-1")
            evtPort("#secondport-select-1", "#secondport-name-1")
            evtPort("#third-select-1", "#third-name-1")
            evtCity("#origin-select-1", "#origin-name-1");
            evtCity("#dest-select-1", "#dest-name-1");
            evtShippline("#shipping-select-1", "#shipping-name-1");
            evtCommodity("#commodity-select-1", "#commodity-name-1");
            evtDeliveryType("#delivery-select-1", "#delivery-name-1");

            <?php endif; ?>


            let timeVal = Math.floor(Date.now() / 1000) + totalFields() + Math.floor(Math.random() * 999) + 1;

            <?php if(count($sq_d1) > 0): ?>
            $(`#fch-code-1, #fchsub-code-1`).val(timeVal);
            <?php endif; ?>
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
                obj_new.find(port_loading).empty();
                obj_new.find(port_discharge).empty();
                obj_new.find(origin).empty();
                obj_new.find(dest).empty();
                obj_new.find(viaport).empty();
                obj_new.find(secondport).empty();
                obj_new.find(third).empty();
                obj_new.find(shipping).empty();
                obj_new.find(commodity).empty();
                obj_new.find(delivery).empty();

                obj_new.find(itemSelectSub).empty();
                obj_new.find(chgunitSub).val('');
                obj_new.find(pcSub).val('');
                obj_new.find(chgSub).val('');
                obj_new.find(cargoSub).val('');
                obj_new.find(dgSub).val('');
                obj_new.find(rateSub).val('');
                obj_new.find(currencySub).empty();
                obj_new.find(uomSub).empty();
                obj_new.find(vatSub).empty();
                obj_new.find(containerSub).empty();
                obj_new.find(total_amt).attr("id", "total-amt-" + row_number);

                obj_new.find(fch_code).attr("id", "fch-code-" + row_number);

                obj_new.find(port_loading).attr("id", "portloading-select-" + row_number).select2({
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
                                        text: `${item.code}`,
                                        id: item.code,
                                        custom_attribute: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(port_loading_name).attr("id", "portloading-name-" + row_number);

                obj_new.find(port_discharge).attr("id", "portdischarge-select-" + row_number).select2({
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
                                        text: `${item.code}`,
                                        id: item.code,
                                        custom_attribute: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(port_discharge_name).attr("id", "portdischarge-name-" + row_number);

                obj_new.find(origin).attr("id", "origin-select-" + row_number).select2({
                    placeholder: 'Search...',
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
                                        text: `${item.code}`,
                                        id: item.id,
                                        custom_attribute: item.name,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(origin_name).attr("id", "origin-name-" + row_number);

                obj_new.find(dest).attr("id", "dest-select-" + row_number).select2({
                    placeholder: 'Search...',
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
                                        text: `${item.code}`,
                                        id: item.id,
                                        custom_attribute: item.name,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(dest_name).attr("id", "dest-name-" + row_number);

                obj_new.find(shipping).attr("id", "shipping-select-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.shipline') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.code}`,
                                        id: item.code,
                                        custom_attribute: item.name,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(shipping_name).attr("id", "shipping-name-" + row_number);

                obj_new.find(viaport).attr("id", "viaport-select-" + row_number).select2({
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
                                        text: `${item.code}`,
                                        id: item.code,
                                        custom_attribute: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(viaport_name).attr("id", "viaport-name-" + row_number);

                obj_new.find(secondport).attr("id", "secondport-select-" + row_number).select2({
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
                                        text: `${item.code}`,
                                        id: item.code,
                                        custom_attribute: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(secondport_name).attr("id", "secondport-name-" + row_number);

                obj_new.find(third).attr("id", "third-select-" + row_number).select2({
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
                                        text: `${item.code}`,
                                        id: item.code,
                                        custom_attribute: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(third_name).attr("id", "third-name-" + row_number);

                obj_new.find(commodity).attr("id", "commodity-select-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.commodity') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.code}`,
                                        id: item.code,
                                        custom_attribute: item.description,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(commodity_name).attr("id", "commodity-name-" + row_number);

                obj_new.find(delivery).attr("id", "delivery-select-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.del.type') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.type}`,
                                        id: item.type,
                                        custom_attribute: item.description,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(delivery_name).attr("id", "delivery-name-" + row_number);

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

                obj_new.find("#amt1").removeAttr("onchange").attr("onchange", `sumofunittotal(${row_number})`).attr("id",
                    "amt" + row_number);

                obj_new.find("#fchsub-code-1").attr("id", "fchsub-code-" + row_number);

                obj_new.find("#curr-rate1").attr("id", "curr-rate" + row_number);

                obj_new.find("#dynamic-field-1").attr("id", "dynamic-field-" + row_number);
                obj_new.find("#tbody-condition-1").attr("id", "tbody-condition-" + row_number);

                obj_new.find("#add-button-1").attr("id", "add-button-" + row_number);
                obj_new.find("#remove-button-1").attr("id", "remove-button-" + row_number);

                obj_new.find("#qty-input-1").attr("id", "qty-inputsub-" + row_number);

                obj_new.find("#chgunit-select-1").attr("id", "chgunit-selectsub-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                obj_new.find("#cargo-select-1").attr("id", "cargo-selectsub-" + row_number).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                });
                obj_new.find("#dg-select-1").attr("id", "dg-selectsub-" + row_number).select2({
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


                $(className + ":last").after($(obj_new));

                evtPort(`#portloading-select-1`, `#portloading-name-1`)
                evtPort(`#portloading-select-${row_number}`, `#portloading-name-${row_number}`)
                evtPort(`#portdischarge-select-1`, `#portdischarge-name-1`)
                evtPort(`#portdischarge-select-${row_number}`, `#portdischarge-name-${row_number}`)
                evtPort(`#viaport-select-1`, `#viaport-name-1`)
                evtPort(`#viaport-select-${row_number}`, `#viaport-name-${row_number}`)
                evtPort(`#secondport-select-1`, `#secondport-name-1`)
                evtPort(`#secondport-select-${row_number}`, `#secondport-name-${row_number}`)
                evtPort(`#third-select-1`, `#third-name-1`)
                evtPort(`#third-select-${row_number}`, `#third-name-${row_number}`)
                evtCity(`#origin-select-1`, `#origin-name-1`);
                evtCity(`#origin-select-${row_number}`, `#origin-name-${row_number}`);
                evtCity(`#dest-select-1`, `#dest-name-1`);
                evtCity(`#dest-select-${row_number}`, `#dest-name-${row_number}`);
                evtShippline(`#shipping-select-1`, `#shipping-name-1`);
                evtShippline(`#shipping-select-${row_number}`, `#shipping-name-${row_number}`);
                evtCommodity(`#commodity-select-1`, `#commodity-name-1`);
                evtCommodity(`#commodity-select-${row_number}`, `#commodity-name-${row_number}`);
                evtDeliveryType(`#delivery-select-1`, `#delivery-name-1`);
                evtDeliveryType(`#delivery-select-${row_number}`, `#delivery-name-${row_number}`);

                $(`#curr-rate${row_number}`).removeAttr("onchange").attr("onchange", `sumofunittotal(${row_number})`);
                $(`#curr-rate${row_number}`).attr("data-curr", row_number);
                $(`#add-button-${row_number}`).removeAttr("onclick").attr("onclick",
                    `addNewField(this.id, '#wrapper-row-list-fch-${row_number}')`);

                $(`#fch-code-${row_number}, #fchsub-code-${row_number}`).val(row_number);

                evtChangeChgUnit(row_number, 'sub');
                evtEnabledSubDetail(row_number, 'sub');

                evtItemCode(`#item-select-1`, `#item-desc-1`);
                evtItemCode(`#item-selectsub-${row_number}`, `#item-descsub-${row_number}`);
                evtNoData(
                    `#chgunit-select-1, #cargo-select-1, #dg-select-1, #chg-select-1, #pc-select-1, #rate-select-1`);
                evtNoData(
                    `#chgunit-selectsub-${row_number}, #cargo-selectsub-${row_number}, #dg-selectsub-${row_number}, #chg-selectsub-${row_number}, #pc-selectsub-${row_number}, #rate-selectsub-${row_number}`
                );
                evtUomCode(`#uom-sub-1`);
                evtUomCode(`#uom-subsub-${row_number}`);
                evtCurrencyCode(`#currency-sub-1`, null, true, "#curr-rate1");
                evtCurrencyCode(`#currency-subsub-${row_number}`, null, true, `#curr-rate${row_number}`);
                evtContainer(`#container-select-1`);
                evtContainer(`#container-selectsub-${row_number}`);
                evtVatCode(`#vat-select-1`);
                evtVatCode(`#vat-selectsub-${row_number}`);

                // DELETE ROW SUB JIKA ADA LEBIH DARI 1
                obj_new.find(`#dynamic-field-0`).remove()
                countParseSubArray.map((fchsub, i) =>
                    obj_new.find(`#dynamic-field-${fchsub}`).remove()
                );

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
                alert("Minimal 1 baris");
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
                                    text: `${item.code}`,
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

        function evtCity(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search...',
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
                                    text: `${item.code}`,
                                    id: item.code,
                                    custom_attribute: item.name,
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

        function evtShippline(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.shipline') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.code,
                                    custom_attribute: item.name,
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

        function evtCommodity(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.commodity') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.code,
                                    custom_attribute: item.description,
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

        function evtDeliveryType(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.del.type') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type}`,
                                    id: item.type,
                                    custom_attribute: item.description,
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

        function evtChangeChgUnit(evt1 = null, evt2 = null) {
            $(`.chgunit-select`).change(function(e) {
                e.preventDefault();
                let val = $(this).val();
                if (val == "REV TON") {
                    $(`#chg-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#pc-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#container-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#qty-input${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#dg-select${evt2}-${evt1}`).attr(`disabled`, false);
                    $(`#uom-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                } else if (val == `SHIPMENT`) {
                    $(`#qty-input${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#cargo-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#dg-select${evt2}-${evt1}`).attr(`disabled`, true);
                    $(`#uom-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#container-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#chg-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                } else if (val == `VOLUME` || val == `WEIGHT` || val == `PCS`) {
                    $(`#container-select${evt2}-${evt1}`).attr(`disabled`, true).attr('required', false);
                    $(`#qty-input${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#dg-select${evt2}-${evt1}`).attr(`disabled`, false);
                    $(`#uom-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#chg-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                } else {
                    $(`#container-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#qty-input${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#cargo-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#dg-select${evt2}-${evt1}`).attr(`disabled`, false);
                    $(`#uom-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#chg-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                    $(`#pc-select${evt2}-${evt1}`).attr(`disabled`, false).attr('required', true);
                }
            });
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
        }

        function evtContainer(evt1 = null, evt2 = null) {
            $(evt1).select2({
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

            $(evt1).change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $(evt2).val(desc);
            });
        }
    </script>
@endsection
