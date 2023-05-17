<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="air_dept_code">Airport of Departure <span style="color: red;">*</span></label>
                        <select class="airdept-select @error('air_dept_code') is-invalid @enderror" id="airdept-select-1"
                            name="air_dept_code" required>
                            <option value="{{ old('air_dept_code', 'JKT') }}">
                                {{ old('air_dept_code', 'JKT') }}
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
                            name="air_dept_name" value="{{ old('air_dept_name', 'JAKARTA SOEKARNO HATTA') }}"
                            id="airdept-name-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 mt-2">
                <label for="to_dest_code_1">1st Flight To</label>
            </div>
            <div class="col-md-10 mt-2">
                <div class="row" style="overflow:auto;">
                    <div class="d-flex flex-row">
                        <div class="p-2" style="width: 20%">
                            <select class="flight-select @error('to_dest_code_1') is-invalid @enderror" required
                                name="to_dest_code_1">
                                <option value="{{ old('to_dest_code_1') }}">
                                    {{ old('to_dest_code_1') }}
                                </option>
                            </select>
                            @error('to_dest_code_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">By</div>
                        <div class="p-2" style="width: 20%">
                            <select name="by_airline_id_1"
                                class="airline-select @error('by_airline_id_1') is-invalid @enderror" required>
                                <option value="{{ old('by_airline_id_1') }}">
                                    {{ old('by_airline_id_1') }}</option>
                            </select>
                            @error('by_airline_id_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-2" style="width: 20%">
                            <input type="number" class="form-control @error('flight_no_1') is-invalid @enderror"
                                required name="flight_no_1" placeholder="First Flight No" title="First Flight No"
                                value="{{ old('flight_no_1') }}" id="flight_no_1">
                            @error('flight_no_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">On</div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" value="{{ old('flight_date_1') }}" autocomplete="off" required
                                placeholder="First Flight Date"
                                class="form-control @error('flight_date_1') is-invalid @enderror date-time-picker"
                                name="flight_date_1" id="flight_date_1">
                            @error('flight_date_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" value="{{ old('eta_date_1') }}" autocomplete="off"
                                placeholder="First Eta Date"
                                class="form-control @error('eta_date_1') is-invalid @enderror date-time-picker"
                                name="eta_date_1" id="eta_date_1">
                            @error('eta_date_1')
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
                <label for="to_dest_code_2">2nd Flight To</label>
            </div>
            <div class="col-md-10 mt-2">
                <div class="row" style="overflow:auto;">
                    <div class="d-flex flex-row">
                        <div class="p-2" style="width: 20%">
                            <select class="flight-select @error('to_dest_code_2') is-invalid @enderror"
                                name="to_dest_code_2">
                                <option value="{{ old('to_dest_code_2') }}">
                                    {{ old('to_dest_code_2') }}
                                </option>
                            </select>
                            @error('to_dest_code_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">By</div>
                        <div class="p-2" style="width: 20%">
                            <select name="by_airline_id_2"
                                class="airline-select @error('by_airline_id_2') is-invalid @enderror">
                                <option value="{{ old('by_airline_id_2') }}">
                                    {{ old('by_airline_id_2') }}</option>
                            </select>
                            @error('by_airline_id_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-2" style="width: 20%">
                            <input type="number" class="form-control @error('flight_no_2') is-invalid @enderror"
                                name="flight_no_2" placeholder="Second Flight No" title="Second Flight No"
                                value="{{ old('flight_no_2') }}" id="flight_no_2">
                            @error('flight_no_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">On</div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" value="{{ old('flight_date_2') }}" autocomplete="off"
                                placeholder="Second Flight Date"
                                class="form-control @error('flight_date_2') is-invalid @enderror date-time-picker"
                                name="flight_date_2" id="flight_date_2">
                            @error('flight_date_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" value="{{ old('eta_date_2') }}" autocomplete="off"
                                placeholder="Second Eta Date"
                                class="form-control @error('eta_date_2') is-invalid @enderror date-time-picker"
                                name="eta_date_2" id="eta_date_2">
                            @error('eta_date_2')
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
                <label for="to_dest_code_3">3rd Flight To</label>
            </div>
            <div class="col-md-10 mt-2">
                <div class="row" style="overflow:auto;">
                    <div class="d-flex flex-row">
                        <div class="p-2" style="width: 20%">
                            <select class="flight-select @error('to_dest_code_3') is-invalid @enderror"
                                name="to_dest_code_3">
                                <option value="{{ old('to_dest_code_3') }}">
                                    {{ old('to_dest_code_3') }}
                                </option>
                            </select>
                            @error('to_dest_code_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">By</div>
                        <div class="p-2" style="width: 20%">
                            <select name="by_airline_id_3"
                                class="airline-select @error('by_airline_id_3') is-invalid @enderror">
                                <option value="{{ old('by_airline_id_3') }}">
                                    {{ old('by_airline_id_3') }}</option>
                            </select>
                            @error('by_airline_id_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-2" style="width: 20%">
                            <input type="number" class="form-control @error('flight_no_3') is-invalid @enderror"
                                name="flight_no_3" placeholder="Third Flight No" title="Third Flight No"
                                value="{{ old('flight_no_3') }}" id="flight_no_3">
                            @error('flight_no_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">On</div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" value="{{ old('flight_date_3') }}" autocomplete="off"
                                placeholder="Third Flight Date"
                                class="form-control @error('flight_date_3') is-invalid @enderror date-time-picker"
                                name="flight_date_3" id="flight_date_3">
                            @error('flight_date_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" value="{{ old('eta_date_3') }}" autocomplete="off"
                                placeholder="Third Eta Date"
                                class="form-control @error('eta_date_3') is-invalid @enderror date-time-picker"
                                name="eta_date_3" id="eta_date_3">
                            @error('eta_date_3')
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
                <label for="to_dest_code_4">4th Flight To</label>
            </div>
            <div class="col-md-10 mt-2">
                <div class="row" style="overflow:auto;">
                    <div class="d-flex flex-row">
                        <div class="p-2" style="width: 20%">
                            <select class="flight-select @error('to_dest_code_4') is-invalid @enderror"
                                name="to_dest_code_4">
                                <option value="{{ old('to_dest_code_4') }}">
                                    {{ old('to_dest_code_4') }}
                                </option>
                            </select>
                            @error('to_dest_code_4')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">By</div>
                        <div class="p-2" style="width: 20%">
                            <select name="by_airline_id_4"
                                class="airline-select @error('by_airline_id_4') is-invalid @enderror">
                                <option value="{{ old('by_airline_id_4') }}">
                                    {{ old('by_airline_id_4') }}</option>
                            </select>
                            @error('by_airline_id_4')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-2" style="width: 20%">
                            <input type="number" class="form-control @error('flight_no_4') is-invalid @enderror"
                                name="flight_no_4" placeholder="Fourth Flight No" title="Fourth Flight No"
                                value="{{ old('flight_no_4') }}" id="flight_no_4">
                            @error('flight_no_4')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">On</div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" value="{{ old('flight_date_4') }}" autocomplete="off"
                                placeholder="Fourth Flight Date"
                                class="form-control @error('flight_date_4') is-invalid @enderror date-time-picker"
                                name="flight_date_4" id="flight_date_4">
                            @error('flight_date_4')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-2" style="width: 20%">
                            <input type="text" value="{{ old('eta_date_4') }}" autocomplete="off"
                                placeholder="Fourth Eta Date"
                                class="form-control @error('eta_date_4') is-invalid @enderror date-time-picker"
                                name="eta_date_4" id="eta_date_4">
                            @error('eta_date_4')
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
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="air_dest_code">Airport of Destination <span style="color: red;">*</span></label>
                        <select class="airdest-select @error('air_dest_code') is-invalid @enderror"
                            id="airdest-select-1" name="air_dest_code" required>
                            <option value="{{ old('air_dest_code') }}">
                                {{ old('air_dest_code') }}
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
                            name="air_dest_name" value="{{ old('air_dest_name') }}" id="airdest-name-1">
                        @error('air_dest_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="arrival_date_time">Arrival Date Time <span style="color: red;">*</span></label>
                <input type="text" value="{{ old('arrival_date_time') }}" autocomplete="off"
                    placeholder="Arrival Date Time" required
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
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="curr_code">Currency Code</label>
                <select class="currsi-code @error('curr_code') is-invalid @enderror" name="curr_code">
                    <option value="{{ old('curr_code', 'IDR') }}">
                        {{ old('curr_code', 'IDR - INDONESIA RUPIAH') }}
                    </option>
                </select>
                @error('curr_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="curr_rate">Currency Rate</label>
                <input type="text" class="form-control currsi-rate @error('curr_rate') is-invalid @enderror"
                    data-type='currency' name="curr_rate" value="{{ old('curr_rate', '1.00') }}">
                @error('curr_rate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="collect_curr_code">Collect Currency Code</label>
                <select class="collectsi-code @error('collect_curr_code') is-invalid @enderror"
                    name="collect_curr_code">
                    <option value="{{ old('collect_curr_code', 'IDR') }}">
                        {{ old('collect_curr_code', 'IDR - INDONESIA RUPIAH') }}
                    </option>
                </select>
                @error('collect_curr_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="collect_curr_rate">Collect Currency Rate</label>
                <input type="text"
                    class="form-control collectsi-rate @error('collect_curr_rate') is-invalid @enderror"
                    data-type='currency' name="collect_curr_rate" value="{{ old('collect_curr_rate', '1.00') }}">
                @error('collect_curr_rate')
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
                <label for="weight_val_flag">Weight Value <span style="color: red;">*</span></label>
                <select class="select-null @error('weight_val_flag') is-invalid @enderror" required
                    name="weight_val_flag">
                    <option value=""></option>
                    <option value="COLLECT">COLLECT</option>
                    <option value="PREPAID">PREPAID</option>
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
                <label for="frt_bill_party">Billing Party</label>
                <select class="bill-party @error('frt_bill_party') is-invalid @enderror" name="frt_bill_party">
                    <option value="{{ old('frt_bill_party') }}">{{ old('frt_bill_party') }}</option>
                </select>
                @error('frt_bill_party')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="other_flag">Other <span style="color: red;">*</span></label>
                <select class="select-null @error('other_flag') is-invalid @enderror" required name="other_flag">
                    <option value=""></option>
                    <option value="COLLECT">COLLECT</option>
                    <option value="PREPAID">PREPAID</option>
                </select>
                @error('other_flag')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="other_bill_party">Other Billing Party</label>
                <select class="bill-party @error('other_bill_party') is-invalid @enderror" name="other_bill_party">
                    <option value="{{ old('other_bill_party') }}">{{ old('other_bill_party') }}</option>
                </select>
                @error('other_bill_party')
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
                <label for="declare_val_carriage">Declared Value for Carriage</label>
                <input type="text" class="form-control @error('declare_val_carriage') is-invalid @enderror"
                    name="declare_val_carriage" value="{{ old('declare_val_carriage', 'N.V.D') }}">
                @error('declare_val_carriage')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="custom_curr_code">Custom Currency Code</label>
                <select class="currency-only @error('custom_curr_code') is-invalid @enderror"
                    name="custom_curr_code">
                    <option value="{{ old('custom_curr_code') }}">
                        {{ old('custom_curr_code') }}
                    </option>
                </select>
                @error('custom_curr_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="custom_declare_val">Custom Declare</label>
                <input type="text" class="form-control @error('custom_declare_val') is-invalid @enderror"
                    name="custom_declare_val" value="{{ old('custom_declare_val', 'N.C.V') }}">
                @error('custom_declare_val')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="custom_local_amt">Custom Local Amt</label>
                <input type="text" class="form-control @error('custom_local_amt') is-invalid @enderror"
                    data-type='currency' name="custom_local_amt" value="{{ old('custom_local_amt') }}">
                @error('custom_local_amt')
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
                <label for="shipmode">Ship Mode </label>
                <select class="select-2 @error('shipmode') is-invalid @enderror" name="shipmode">
                    <option value=""></option>
                    <option value="ROUTING ORDER" @selected(old('shipmode') == 'ROUTING ORDER')>ROUTING ORDER</option>
                    <option value="FREE HANDS" @selected(old('shipmode') == 'FREE HANDS')>FREE HANDS</option>
                    <option value="TRANSIT" @selected(old('shipmode') == 'TRANSIT')>TRANSIT</option>
                </select>
                @error('shipmode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="insure_curr_code">Insure Currency Code</label>
                <select class="currency-only @error('insure_curr_code') is-invalid @enderror"
                    name="insure_curr_code">
                    <option value="{{ old('insure_curr_code', 'IDR') }}">
                        {{ old('insure_curr_code', 'IDR - INDONESIA RUPIAH') }}
                    </option>
                </select>
                @error('insure_curr_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="insure_amt">Insure Amt</label>
                <input type="text" class="form-control @error('insure_amt') is-invalid @enderror"
                    data-type='currency' name="insure_amt" value="{{ old('insure_amt') }}">
                @error('insure_amt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="insure_local_amt">Insure Local Amt</label>
                <input type="text" class="form-control @error('insure_local_amt') is-invalid @enderror"
                    data-type='currency' name="insure_local_amt" value="{{ old('insure_local_amt') }}">
                @error('insure_local_amt')
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
                <label for="handling_info_1">Handling Information</label>
                <input type="text" class="form-control @error('handling_info_1') is-invalid @enderror"
                    name="handling_info_1" value="{{ old('handling_info_1') }}"
                    placeholder="Handling Information 1">
                @error('handling_info_1')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="handling_info_2">&nbsp;</label>
                <input type="text" class="form-control @error('handling_info_2') is-invalid @enderror"
                    name="handling_info_2" value="{{ old('handling_info_2') }}"
                    placeholder="Handling Information 2">
                @error('handling_info_2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="handling_info_3">&nbsp;</label>
                <input type="text" class="form-control @error('handling_info_3') is-invalid @enderror"
                    name="handling_info_3" value="{{ old('handling_info_3') }}"
                    placeholder="Handling Information 3">
                @error('handling_info_3')
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
                <label for="account_info_1">Accounting Information</label>
                <input type="text" class="form-control @error('account_info_1') is-invalid @enderror"
                    name="account_info_1" value="{{ old('account_info_1') }}"
                    placeholder="Accounting Information 1">
                @error('account_info_1')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="account_info_2">&nbsp;</label>
                <input type="text" class="form-control @error('account_info_2') is-invalid @enderror"
                    name="account_info_2" value="{{ old('account_info_2') }}"
                    placeholder="Accounting Information 2">
                @error('account_info_2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="account_info_3">&nbsp;</label>
                <input type="text" class="form-control @error('account_info_3') is-invalid @enderror"
                    name="account_info_3" value="{{ old('account_info_3') }}"
                    placeholder="Accounting Information 3">
                @error('account_info_3')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="account_info_4">&nbsp;</label>
                <input type="text" class="form-control @error('account_info_4') is-invalid @enderror"
                    name="account_info_4" value="{{ old('account_info_4') }}"
                    placeholder="Accounting Information 4">
                @error('account_info_4')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="account_info_5">&nbsp;</label>
                <input type="text" class="form-control @error('account_info_5') is-invalid @enderror"
                    name="account_info_5" value="{{ old('account_info_5') }}"
                    placeholder="Accounting Information 5">
                @error('account_info_5')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="account_info_6">&nbsp;</label>
                <input type="text" class="form-control @error('account_info_6') is-invalid @enderror"
                    name="account_info_6" value="{{ old('account_info_6') }}"
                    placeholder="Accounting Information 6">
                @error('account_info_6')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="account_info_7">&nbsp;</label>
                <input type="text" class="form-control @error('account_info_7') is-invalid @enderror"
                    name="account_info_7" value="{{ old('account_info_7') }}"
                    placeholder="Accounting Information 7">
                @error('account_info_7')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="permit_no">Permit No.</label>
                <input type="text" class="form-control @error('permit_no') is-invalid @enderror" name="permit_no"
                    value="{{ old('permit_no') }}" placeholder="Permit No.">
                @error('permit_no')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="dg_cargo">DG Cargo</label>
                <div class="col-md-6">
                    <input type="checkbox" name="dg_cargo" @checked(old('dg_cargo') == 'yes') value="yes"
                        data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                        data-offstyle="danger">
                    @error('dg_cargo')
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
                <label for="coloader_code">Co-Leader</label>
                <select class="bill-party @error('coloader_code') is-invalid @enderror" name="coloader_code">
                    <option value="{{ old('coloader_code') }}">{{ old('coloader_code') }}</option>
                </select>
                @error('coloader_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="delivery_type_code">Delivery Type </label>
                <select class="deltype-select @error('delivery_type_code') is-invalid @enderror"
                    name="delivery_type_code">
                    <option value="{{ old('delivery_type_code') }}">{{ old('delivery_type_code') }}</option>
                </select>

                @error('delivery_type_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="delivery_type">&nbsp; </label>
                <input type="text" readonly class="form-control @error('delivery_type') is-invalid @enderror"
                    name="delivery_type" value="{{ old('delivery_type') }}" id="delivery_type">
                @error('delivery_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
            evtCurrencyCodeSi(`.currsi-code`, null, true, `.currsi-rate`);
            evtCurrencyCode(`.collectsi-code`, null, true, `.collectsi-rate`);
            evtCurrencyCode(`.currency-only`, null, false, null);
            evtNoData('.select-null');
            evtBisnisPartyNotComplete('.bill-party');
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
                placeholder: 'Search To Dest Code',
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
