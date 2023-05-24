<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="air_dept_code">Airport of Departure <span style="color: red;">*</span></label>
                        <select class="airdept-select @error('air_dept_code') is-invalid @enderror" id="airdept-select-1"
                            name="air_dept_code" required>
                            <option value="{{ old('air_dept_code', $ad1->air_dept_code) }}">
                                {{ old('air_dept_code', $ad1->air_dept_code) }}
                            </option>
                        </select>
                        @error('air_dept_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="air_dept_name"> </label>
                        <input type="text"
                            class="form-control airdept-name @error('air_dept_name') is-invalid @enderror"
                            name="air_dept_name" value="{{ old('air_dept_name', $ad1->air_dept_name) }}"
                            id="airdept-name-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="air_dest_code">Airport of Destination <span style="color: red;">*</span></label>
                        <select class="airdest-select @error('air_dest_code') is-invalid @enderror"
                            id="airdest-select-1" name="air_dest_code" required>
                            <option
                                value="{{ old('air_dest_code', !empty($ad1->air_dest_code) ? $ad1->air_dest_code : 'JKT') }}">
                                {{ old('air_dest_code', !empty($ad1->air_dest_code) ? $ad1->air_dest_code : 'JKT') }}
                            </option>
                        </select>
                        @error('air_dest_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="air_dest_name"> </label>
                        <input type="text"
                            class="form-control airdest-name @error('air_dest_name') is-invalid @enderror"
                            name="air_dest_name"
                            value="{{ old('air_dest_name', !empty($ad1->air_dest_name) ? $ad1->air_dest_name : 'JAKARTA SOEKARNO HATTA') }}"
                            id="airdest-name-1">
                        @error('air_dest_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="flight_no">Flight No.</label>
                    <input type="text" class="form-control @error('flight_no') is-invalid @enderror" name="flight_no"
                        value="{{ old('flight_no', $ad1->flight_no) }}">
                    @error('flight_no')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="flight_date_1">Flight Date </label>
                    <input type="text"
                        value="{{ old('flight_date_1', !empty($ad1->flight_date_1) ? date('Y/m/d H:i', strtotime($ad1->flight_date_1)) : '') }}"
                        autocomplete="off" placeholder="Flight Date"
                        class="form-control @error('flight_date_1') is-invalid @enderror date-time-picker"
                        name="flight_date_1" id="flight_date_1">
                    @error('flight_date_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="arrival_date_time">Arrival Date Time <span style="color: red;">*</span></label>
                    <input type="text"
                        value="{{ old('arrival_date_time', !empty($ad1->arrival_date_time) ? date('Y/m/d H:i', strtotime($ad1->arrival_date_time)) : '') }}"
                        autocomplete="off" placeholder="Arrival Date Time" required
                        class="form-control @error('arrival_date_time') is-invalid @enderror date-time-picker"
                        name="arrival_date_time" id="arrival_date_time">
                    @error('arrival_date_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 mt-2">
                <label for="route_1">Route 1</label>
            </div>
            <div class="col-md-10 mt-2">
                <div class="row" style="overflow:auto;">
                    <div class="d-flex flex-row">
                        <div class="p-2" style="width: 20%">
                            <select class="flight-select @error('route_1') is-invalid @enderror" name="route_1">
                                <option value="{{ old('route_1', $ad1->route_1) }}">
                                    {{ old('route_1', $ad1->route_1) }}
                                </option>
                            </select>
                            @error('route_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">By</div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" placeholder="Flight No 1"
                                class="form-control @error('flight_no_1') is-invalid @enderror" name="flight_no_1"
                                value="{{ old('flight_no_1', $ad1->flight_no_1) }}">
                            @error('flight_no_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">On</div>
                        <div class="p-2" style="width: 23%">
                            <input type="text"
                                value="{{ old('etd_1', !empty($ad1->etd_1) ? date('Y/m/d H:i', strtotime($ad1->etd_1)) : '') }}"
                                autocomplete="off" placeholder="Etd Date 1"
                                class="form-control @error('etd_1') is-invalid @enderror date-time-picker"
                                name="etd_1" id="etd_1">
                            @error('etd_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">ETA 1</div>
                        <div class="p-2" style="width: 23%">
                            <input type="text"
                                value="{{ old('eta_1', !empty($ad1->eta_1) ? date('Y/m/d H:i', strtotime($ad1->eta_1)) : '') }}"
                                autocomplete="off" placeholder="Eta Date 1"
                                class="form-control @error('eta_1') is-invalid @enderror date-time-picker"
                                name="eta_1" id="eta_1">
                            @error('eta_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 mt-2">
                <label for="route_1">Route 2</label>
            </div>
            <div class="col-md-10 mt-2">
                <div class="row" style="overflow:auto;">
                    <div class="d-flex flex-row">
                        <div class="p-2" style="width: 20%">
                            <select class="flight-select @error('route_2') is-invalid @enderror" name="route_2">
                                <option value="{{ old('route_2', $ad1->route_2) }}">
                                    {{ old('route_2', $ad1->route_2) }}
                                </option>
                            </select>
                            @error('route_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">By</div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" placeholder="Flight No 2"
                                class="form-control @error('flight_no_2') is-invalid @enderror" name="flight_no_2"
                                value="{{ old('flight_no_2', $ad1->flight_no_2) }}">
                            @error('flight_no_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">On</div>
                        <div class="p-2" style="width: 23%">
                            <input type="text"
                                value="{{ old('etd_2', !empty($ad1->etd_2) ? date('Y/m/d H:i', strtotime($ad1->etd_2)) : '') }}"
                                autocomplete="off" placeholder="Etd Date 2"
                                class="form-control @error('etd_2') is-invalid @enderror date-time-picker"
                                name="etd_2" id="etd_2">
                            @error('etd_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">ETA 2</div>
                        <div class="p-2" style="width: 23%">
                            <input type="text"
                                value="{{ old('eta_2', !empty($ad1->eta_2) ? date('Y/m/d H:i', strtotime($ad1->eta_2)) : '') }}"
                                autocomplete="off" placeholder="Eta Date 2"
                                class="form-control @error('eta_2') is-invalid @enderror date-time-picker"
                                name="eta_2" id="eta_2">
                            @error('eta_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 mt-2">
                <label for="route_1">Route 3</label>
            </div>
            <div class="col-md-10 mt-2">
                <div class="row" style="overflow:auto;">
                    <div class="d-flex flex-row">
                        <div class="p-2" style="width: 20%">
                            <select class="flight-select @error('route_3') is-invalid @enderror" name="route_3">
                                <option value="{{ old('route_3', $ad1->route_3) }}">
                                    {{ old('route_3', $ad1->route_3) }}
                                </option>
                            </select>
                            @error('route_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">By</div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" placeholder="Flight No 3"
                                class="form-control @error('flight_no_3') is-invalid @enderror" name="flight_no_3"
                                value="{{ old('flight_no_3', $ad1->flight_no_3) }}">
                            @error('flight_no_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">On</div>
                        <div class="p-2" style="width: 23%">
                            <input type="text"
                                value="{{ old('etd_3', !empty($ad1->etd_3) ? date('Y/m/d H:i', strtotime($ad1->etd_3)) : '') }}"
                                autocomplete="off" placeholder="Etd Date 3"
                                class="form-control @error('etd_3') is-invalid @enderror date-time-picker"
                                name="etd_3" id="etd_3">
                            @error('etd_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">ETA 3</div>
                        <div class="p-2" style="width: 23%">
                            <input type="text"
                                value="{{ old('eta_3', !empty($ad1->eta_3) ? date('Y/m/d H:i', strtotime($ad1->eta_3)) : '') }}"
                                autocomplete="off" placeholder="Eta Date 3"
                                class="form-control @error('eta_3') is-invalid @enderror date-time-picker"
                                name="eta_3" id="eta_3">
                            @error('eta_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="curr_code">Currency Code</label>
                <select class="currsi-code @error('curr_code') is-invalid @enderror" name="curr_code">
                    <option value="{{ old('curr_code', !empty($ad1->curr_code) ? $ad1->curr_code : 'IDR') }}">
                        {{ old('curr_code', !empty($ad1->curr_code) ? $ad1->curr_code : 'IDR - INDONESIA RUPIAH') }}
                    </option>
                </select>
                @error('curr_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="commodity_code">Commodity</label>
                <select class="commodity-code @error('commodity_code') is-invalid @enderror" name="commodity_code">
                    <option value="{{ old('commodity_code', $ad1->commodity_code) }}">
                        {{ old('commodity_code', $ad1->commodity_code) }}
                    </option>
                </select>
                @error('commodity_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="commodity_name">&nbsp;</label>
                <input type="text" placeholder="Commodity Name"
                    class="form-control @error('commodity_name') is-invalid @enderror" name="commodity_name"
                    value="{{ old('commodity_name', $ad1->commodity_name) }}">
                @error('commodity_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="weight_val_flag">Weight Value </label>
                <select class="select-null @error('weight_val_flag') is-invalid @enderror" name="weight_val_flag">
                    <option value=""></option>
                    <option value="COLLECT" @selected($ad1->weight_val_flag == 'COLLECT')>COLLECT</option>
                    <option value="PREPAID" @selected($ad1->weight_val_flag == 'COLLECT')>PREPAID</option>
                </select>
                @error('weight_val_flag')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="bill_party_code_1">Billing Party</label>
                <select class="bill-party @error('bill_party_code_1') is-invalid @enderror" name="bill_party_code_1">
                    <option value="{{ old('bill_party_code_1', $ad1->bill_party_code_1) }}">
                        {{ old('bill_party_code_1', $ad1->bill_party_code_1) }}</option>
                </select>
                @error('bill_party_code_1')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="other_val_flag">Other</label>
                <select class="select-null @error('other_val_flag') is-invalid @enderror" name="other_val_flag">
                    <option value=""></option>
                    <option value="COLLECT" @selected($ad1->other_val_flag == 'COLLECT')>COLLECT</option>
                    <option value="PREPAID" @selected($ad1->other_val_flag == 'COLLECT')>PREPAID</option>
                </select>
                @error('other_val_flag')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="bill_party_code_2">Other Billing Party</label>
                <select class="bill-party @error('bill_party_code_2') is-invalid @enderror" name="bill_party_code_2">
                    <option value="{{ old('bill_party_code_2', $ad1->bill_party_code_2) }}">
                        {{ old('bill_party_code_2', $ad1->bill_party_code_2) }}</option>
                </select>
                @error('bill_party_code_2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="pcs">Pcs/Rcp </label>
                <input type="number" value="{{ old('pcs', $ad1->pcs) }}" autocomplete="off"
                    class="form-control @error('pcs') is-invalid @enderror" name="pcs" id="pcs">
                @error('pcs')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="uom_code">Uom </label>
                <select name="uom_code" id="uom-code-1" class="uom-code @error('uom_code') is-invalid @enderror">
                    <option value="{{ old('uom_code', $ad1->uom_code) }}">{{ old('uom_code', $ad1->uom_code) }}
                    </option>
                </select>
                @error('uom_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="gross_weight">Gross Weight </label>
                <input type="text" data-type='currency'
                    value="{{ old('gross_weight', !empty($ad1->gross_weight) ? number_format($ad1->gross_weight, 2, '.', ',') : '') }}"
                    autocomplete="off" class="form-control @error('gross_weight') is-invalid @enderror"
                    name="gross_weight" id="gross_weight">
                @error('gross_weight')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="volume_weight">Volumetric Weight </label>
                <input type="text" data-type='currency'
                    value="{{ old('volume_weight', !empty($ad1->volume_weight) ? number_format($ad1->volume_weight, 2, '.', ',') : '') }}"
                    autocomplete="off" class="form-control @error('volume_weight') is-invalid @enderror"
                    name="volume_weight" id="volume_weight">
                @error('volume_weight')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="kg_lb">Kg/Lb? </label>
                <select class="select-null @error('kg_lb') is-invalid @enderror" name="kg_lb">
                    <option value="KILO" @selected($ad1->kg_lb == 'KILO')>KILO</option>
                    <option value="LB" @selected($ad1->kg_lb == 'LB')>LB</option>
                </select>
                @error('kg_lb')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="rate_class">Class </label>
                <select class="select-null @error('rate_class') is-invalid @enderror" name="rate_class">
                    <option value="MINIMUM" @selected($ad1->rate_class == 'MINIMUM')>MINIMUM</option>
                    <option value="NORMAL" @selected($ad1->rate_class == 'NORMAL')>NORMAL</option>
                    <option value="WEIGHT" @selected($ad1->rate_class == 'WEIGHT')>WEIGHT</option>
                    <option value="COMMODITY" @selected($ad1->rate_class == 'COMMODITY')>COMMODITY</option>
                </select>
                @error('rate_class')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="charge_weight">Charge Weight </label>
                <input type="text" data-type='currency'
                    value="{{ old('charge_weight', !empty($ad1->charge_weight) ? number_format($ad1->charge_weight, 2, '.', ',') : '') }}"
                    autocomplete="off" class="form-control @error('charge_weight') is-invalid @enderror"
                    name="charge_weight" id="charge_weight">
                @error('charge_weight')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="iata_rate">Rate </label>
                <input type="text" placeholder="Iata Rate" data-type='currency'
                    value="{{ old('iata_rate', !empty($ad1->iata_rate) ? number_format($ad1->iata_rate, 2, '.', ',') : '') }}"
                    autocomplete="off" class="form-control @error('iata_rate') is-invalid @enderror"
                    name="iata_rate" id="iata_rate">
                @error('iata_rate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="iata_total_amt">Total Amt </label>
                <input type="text" readonly placeholder="Iata Total Amt" data-type='currency'
                    value="{{ old('iata_total_amt', !empty($ad1->iata_total_amt) ? number_format($ad1->iata_total_amt, 2, '.', ',') : '') }}"
                    autocomplete="off" class="form-control @error('iata_total_amt') is-invalid @enderror"
                    name="iata_total_amt" id="iata_total_amt">
                @error('iata_total_amt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Prepaid </label>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="weight_charge_pp">Weight Charge</label>
                        <input type="text" placeholder="Weight Charge Prepaid Amt" data-type='currency'
                            value="{{ old('weight_charge_pp', !empty($ad1->weight_charge_pp) ? number_format($ad1->weight_charge_pp, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('weight_charge_pp') is-invalid @enderror"
                            name="weight_charge_pp" id="weight_charge_pp">
                        @error('weight_charge_pp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value_charge_pp">Valuation Charge</label>
                        <input type="text" placeholder="Value Charge Prepaid Amt" data-type='currency'
                            value="{{ old('value_charge_pp', !empty($ad1->value_charge_pp) ? number_format($ad1->value_charge_pp, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('value_charge_pp') is-invalid @enderror"
                            name="value_charge_pp" id="value_charge_pp">
                        @error('value_charge_pp')
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
                        <label for="tax_pp">Taxation</label>
                        <input type="text" placeholder="Tax Prepaid Amt" data-type='currency'
                            value="{{ old('tax_pp', !empty($ad1->tax_pp) ? number_format($ad1->tax_pp, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('tax_pp') is-invalid @enderror"
                            name="tax_pp" id="tax_pp">
                        @error('tax_pp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="agent_pp">Agent</label>
                        <input type="text" placeholder="Due Agent Prepaid Amt" data-type='currency'
                            value="{{ old('agent_pp', !empty($ad1->agent_pp) ? number_format($ad1->agent_pp, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('agent_pp') is-invalid @enderror"
                            name="agent_pp" id="agent_pp">
                        @error('agent_pp')
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
                        <label for="carrier_pp">Carrier</label>
                        <input type="text" placeholder="Due Carrier Prepaid Amt" data-type='currency'
                            value="{{ old('carrier_pp', !empty($ad1->carrier_pp) ? number_format($ad1->carrier_pp, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('carrier_pp') is-invalid @enderror"
                            name="carrier_pp" id="carrier_pp">
                        @error('carrier_pp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="total_pp">Total</label>
                        <input type="text" readonly placeholder="Total Prepaid Amt" data-type='currency'
                            value="{{ old('total_pp', !empty($ad1->total_pp) ? number_format($ad1->total_pp, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('total_pp') is-invalid @enderror"
                            name="total_pp" id="total_pp">
                        @error('total_pp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label>Collect </label>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="weight_charge_cc">Weight Charge</label>
                        <input type="text" placeholder="Weight Charge Collect Amt" data-type='currency'
                            value="{{ old('weight_charge_cc', !empty($ad1->weight_charge_cc) ? number_format($ad1->weight_charge_cc, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('weight_charge_cc') is-invalid @enderror"
                            name="weight_charge_cc" id="weight_charge_cc">
                        @error('weight_charge_cc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value_charge_cc">Valuation Charge</label>
                        <input type="text" placeholder="Value Charge Collect Amt" data-type='currency'
                            value="{{ old('value_charge_cc', !empty($ad1->value_charge_cc) ? number_format($ad1->value_charge_cc, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('value_charge_cc') is-invalid @enderror"
                            name="value_charge_cc" id="value_charge_cc">
                        @error('value_charge_cc')
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
                        <label for="tax_cc">Taxation</label>
                        <input type="text" placeholder="Tax Collect Amt" data-type='currency'
                            value="{{ old('tax_cc', !empty($ad1->tax_cc) ? number_format($ad1->tax_cc, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('tax_cc') is-invalid @enderror"
                            name="tax_cc" id="tax_cc">
                        @error('tax_cc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="agent_cc">Agent</label>
                        <input type="text" placeholder="Due Agent Collect Amt" data-type='currency'
                            value="{{ old('agent_cc', !empty($ad1->agent_cc) ? number_format($ad1->agent_cc, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('agent_cc') is-invalid @enderror"
                            name="agent_cc" id="agent_cc">
                        @error('agent_cc')
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
                        <label for="carrier_cc">Carrier</label>
                        <input type="text" placeholder="Due Carrier Collect Amt" data-type='currency'
                            value="{{ old('carrier_cc', !empty($ad1->carrier_cc) ? number_format($ad1->carrier_cc, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('carrier_cc') is-invalid @enderror"
                            name="carrier_cc" id="carrier_cc">
                        @error('carrier_cc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="total_cc">Total</label>
                        <input type="text" readonly placeholder="Total Collect Amt" data-type='currency'
                            value="{{ old('total_cc', !empty($ad1->total_cc) ? number_format($ad1->total_cc, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('total_cc') is-invalid @enderror"
                            name="total_cc" id="total_cc">
                        @error('total_cc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="permit_no">Permit No</label>
                <input type="text" placeholder="Permit No" value="{{ old('permit_no', $ad1->permit_no) }}"
                    autocomplete="off" class="form-control @error('permit_no') is-invalid @enderror"
                    name="permit_no" id="permit_no">
                @error('permit_no')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="permit">Permit Date</label>
                <input type="text" placeholder="Permit Date"
                    value="{{ old('permit', !empty($ad1->permit) ? date('d/m/Y', strtotime($ad1->permit)) : '') }}"
                    autocomplete="off" class="form-control @error('permit') is-invalid @enderror date-picker"
                    name="permit" id="permit">
                @error('permit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <label>Final Amount to be Collected </label>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="collect_curr">Collect Currency</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select class="collect-curr @error('collect_curr') is-invalid @enderror"
                                    name="collect_curr">
                                    <option
                                        value="{{ old('collect_curr', !empty($ad1->collect_curr) ? $ad1->collect_curr : 'IDR') }}">
                                        {{ old('collect_curr', !empty($ad1->collect_curr) ? $ad1->collect_curr : 'IDR') }}
                                    </option>
                                </select>
                                @error('collect_curr')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <input type="text" placeholder="Currency Rate" data-type='currency'
                                    value="{{ old('curr_rate', !empty($ad1->curr_rate) ? number_format($ad1->curr_rate, 2, '.', ',') : '1.00') }}"
                                    autocomplete="off" class="form-control @error('curr_rate') is-invalid @enderror"
                                    name="curr_rate" id="curr_rate">
                                @error('curr_rate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="curr_markup_rate">Currency Mark Up Rate (%)</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" placeholder="Factor" data-type='currency'
                                    value="{{ old('curr_markup_rate', !empty($ad1->curr_markup_rate) ? number_format($ad1->curr_markup_rate, 2, '.', ',') : '0') }}"
                                    autocomplete="off"
                                    class="form-control @error('curr_markup_rate') is-invalid @enderror"
                                    name="curr_markup_rate" id="curr_markup_rate">
                                @error('curr_markup_rate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <input type="text" placeholder="Final Rate" data-type='currency'
                                    value="{{ old('final_rate', !empty($ad1->final_rate) ? number_format($ad1->final_rate, 2, '.', ',') : '1.00') }}"
                                    autocomplete="off" readonly
                                    class="form-control @error('final_rate') is-invalid @enderror" name="final_rate"
                                    id="final_rate">
                                @error('final_rate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="final_amt">Amount</label>
                        <input type="text" placeholder="Final Amount" data-type='currency'
                            value="{{ old('final_amt', !empty($ad1->final_amt) ? number_format($ad1->final_amt, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('final_amt') is-invalid @enderror"
                            name="final_amt" id="final_amt">
                        @error('final_amt')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="local_amt">Local Amount</label>
                        <input type="text" placeholder="Total Local Amount" data-type='currency'
                            value="{{ old('local_amt', !empty($ad1->local_amt) ? number_format($ad1->local_amt, 2, '.', ',') : '') }}"
                            autocomplete="off" readonly class="form-control @error('local_amt') is-invalid @enderror"
                            name="local_amt" id="local_amt">
                        @error('local_amt')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="cc_fee_percent">Collect Fee (%)</label>
                        <input type="text" placeholder="Collect Fee Percent" data-type='currency'
                            value="{{ old('cc_fee_percent', !empty($ad1->cc_fee_percent) ? number_format($ad1->cc_fee_percent, 2, '.', ',') : '') }}"
                            autocomplete="off" class="form-control @error('cc_fee_percent') is-invalid @enderror"
                            name="cc_fee_percent" id="cc_fee_percent">
                        @error('cc_fee_percent')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@section('sub_script_2')
    <script>
        $(function() {
            evtDeliveryType(".deltype-select", "input[name=delivery_type]");
            evtAirPort(`#airdept-select-1`, `#airdept-name-1`);
            evtAirPort(`#airdest-select-1`, `#airdest-name-1`);
            evtAirPortDest(`.flight-select`, null);
            evtAirLine(`.airline-select`, null);
            evtCurrencyCodeSi(`.currsi-code`, null, true, null);
            evtCurrencyCode(`.collectsi-code`, null, true, `.collectsi-rate`);
            evtCurrencyCode(`.collect-curr`, null, true, `input[name=curr_rate], input[name=final_rate]`);
            evtCurrencyCode(`.currency-only`, null, false, null);
            evtNoData('.select-null');
            evtUomCode(`.uom-code`);
            evtBisnisPartyNotComplete('.bill-party');
            evtCommodity('.commodity-code', 'input[name=commodity_name]');
        });

        function evtBisnisPartyNotComplete(evt1 = null, evt2 = null) {
            $(`${evt1}`).select2({
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

            $(`${evt1}`).change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $(`${evt2}`).val(desc);
            });
        }

        function evtDeliveryType(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search delivery type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.del.type') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
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

        function evtAirPortDest(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search Origin Code',
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
                placeholder: 'Search By Airline ID',
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

        function evtCurrencyCodeSi(evt1 = null, evt2 = null, evt3 = null, evt4 = null) {
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
                let code = $(this).val();
                let merCurr = `${code} - ${desc}`;

                let newColCurr = new Option(merCurr, code, true, true);
                $(".collectsi-code").append(newColCurr).trigger('change');

                $(evt2).val(desc);

                if (evt3) {
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
                                    text: `${item.code} - ${item.name}`,
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
                placeholder: 'Search commodity',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.commodity') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
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
