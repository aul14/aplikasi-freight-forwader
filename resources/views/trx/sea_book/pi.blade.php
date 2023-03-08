<div class="row">
    <div class="col-md-6">
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="trans_company_code">Transport Company Code</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="transport-select @error('trans_company_code') is-invalid @enderror"
                        name="trans_company_code">
                        <option value="{{ old('trans_company_code') }}">{{ old('trans_company_code') }}</option>
                    </select>

                    @error('trans_company_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="trans_company_name">Transport Company Name</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('trans_company_name') }}" placeholder="Transport Company Name"
                        class="form-control @error('trans_company_name') is-invalid @enderror"
                        name="trans_company_name">
                    @error('trans_company_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="trans_company_address_1">Transport Company Address</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('trans_company_address_1') }}"
                        placeholder="Transport Company Address 1"
                        class="form-control @error('trans_company_address_1') is-invalid @enderror"
                        name="trans_company_address_1">
                    @error('trans_company_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="trans_company_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('trans_company_address_2') }}"
                        placeholder="Transport Company Address 2"
                        class="form-control @error('trans_company_address_2') is-invalid @enderror"
                        name="trans_company_address_2">
                    @error('trans_company_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="trans_company_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('trans_company_address_3') }}"
                        placeholder="Transport Company Address 3"
                        class="form-control @error('trans_company_address_3') is-invalid @enderror"
                        name="trans_company_address_3">
                    @error('trans_company_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="trans_company_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('trans_company_address_4') }}"
                        placeholder="Transport Company Address 4"
                        class="form-control @error('trans_company_address_4') is-invalid @enderror"
                        name="trans_company_address_4">
                    @error('trans_company_address_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="trans_company_contact_name">Transport Company Contact Name</label>
            <input type="text" value="{{ old('trans_company_contact_name') }}"
                class="form-control @error('trans_company_contact_name') is-invalid @enderror"
                name="trans_company_contact_name" id="trans_company_contact_name">
            @error('trans_company_contact_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="req_trans_no">Request Transport No</label>
            <input type="text" value="{{ old('req_trans_no') }}"
                class="form-control @error('req_trans_no') is-invalid @enderror" name="req_trans_no" id="req_trans_no">
            @error('req_trans_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="vehicle_no">Vehicle No</label>
            <input type="text" value="{{ old('vehicle_no') }}"
                class="form-control @error('vehicle_no') is-invalid @enderror" name="vehicle_no" id="vehicle_no">
            @error('vehicle_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pickup_date_time">Pickup Date Time</label>
                    <input type="text" value="{{ old('pickup_date_time') }}" placeholder="Pickup Date Time"
                        autocomplete="off"
                        class="form-control @error('pickup_date_time') is-invalid @enderror date-time-picker"
                        name="pickup_date_time" id="pickup_date_time">
                    @error('pickup_date_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pickup_date_time_remark">Pickup Remark</label>
                    <input type="text" value="{{ old('pickup_date_time_remark') }}"
                        class="form-control @error('pickup_date_time_remark') is-invalid @enderror"
                        name="pickup_date_time_remark" id="pickup_date_time_remark">
                    @error('pickup_date_time_remark')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="delivery_date_time">Delivery Date Time</label>
            <input type="text" value="{{ old('delivery_date_time') }}" placeholder="Delivery Date Time"
                autocomplete="off"
                class="form-control @error('delivery_date_time') is-invalid @enderror date-time-picker"
                name="delivery_date_time" id="delivery_date_time">
            @error('delivery_date_time')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="collection_from_code">Collection From Code</label>
            </div>
            <div class="col-md-5 mt-2">
                <div class="form-group">
                    <select class="collection-select @error('collection_from_code') is-invalid @enderror"
                        name="collection_from_code">
                        <option value="{{ old('collection_from_code') }}">{{ old('collection_from_code') }}</option>
                    </select>

                    @error('collection_from_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)" class="btn btn-primary my-2 btn-shipper-1">Same As Shipper</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="collection_from_name">Collection From Name</label>
            </div>
            <div class="col-md-5 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('collection_from_name') }}"
                        placeholder="Collection From Name"
                        class="form-control @error('collection_from_name') is-invalid @enderror"
                        name="collection_from_name">
                    @error('collection_from_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)" class="btn btn-primary my-2 btn-depot">Same As Depot</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="collection_address_1">Collection Address</label>
            </div>
            <div class="col-md-5 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('collection_address_1') }}"
                        placeholder="Collection Address 1"
                        class="form-control @error('collection_address_1') is-invalid @enderror"
                        name="collection_address_1">
                    @error('collection_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)" class="btn btn-primary my-2 btn-yard">Same As Yard</a>
            </div>
            <div class="col-md-4">
                <label for="collection_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('collection_address_2') }}"
                        placeholder="Collection Address 2"
                        class="form-control @error('collection_address_2') is-invalid @enderror"
                        name="collection_address_2">
                    @error('collection_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="collection_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('collection_address_3') }}"
                        placeholder="Collection Address 3"
                        class="form-control @error('collection_address_3') is-invalid @enderror"
                        name="collection_address_3">
                    @error('collection_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="collection_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('collection_address_4') }}"
                        placeholder="Collection Address 4"
                        class="form-control @error('collection_address_4') is-invalid @enderror"
                        name="collection_address_4">
                    @error('collection_address_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-6">
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="delivery_to_code">Delivery To Code</label>
            </div>
            <div class="col-md-5 mt-2">
                <div class="form-group">
                    <select class="deliveryto-select @error('delivery_to_code') is-invalid @enderror"
                        name="delivery_to_code">
                        <option value="{{ old('delivery_to_code') }}">{{ old('delivery_to_code') }}</option>
                    </select>

                    @error('delivery_to_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)" class="btn btn-primary my-2 btn-warehouse">Same As Warehouse</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="delivery_to_name">Delivery To Name</label>
            </div>
            <div class="col-md-5 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('delivery_to_name') }}" placeholder="Delivery To Name"
                        class="form-control @error('delivery_to_name') is-invalid @enderror" name="delivery_to_name">
                    @error('delivery_to_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)" class="btn btn-primary my-2 btn-shipper-2">Same As Shipper</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="delivery_address_1">Delivery Address</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('delivery_address_1') }}" placeholder="Delivery Address 1"
                        class="form-control @error('delivery_address_1') is-invalid @enderror"
                        name="delivery_address_1">
                    @error('delivery_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="delivery_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('delivery_address_2') }}" placeholder="Delivery Address 2"
                        class="form-control @error('delivery_address_2') is-invalid @enderror"
                        name="delivery_address_2">
                    @error('delivery_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="delivery_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('delivery_address_3') }}" placeholder="Delivery Address 3"
                        class="form-control @error('delivery_address_3') is-invalid @enderror"
                        name="delivery_address_3">
                    @error('delivery_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="delivery_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('delivery_address_4') }}" placeholder="Delivery Address 4"
                        class="form-control @error('delivery_address_4') is-invalid @enderror"
                        name="delivery_address_4">
                    @error('delivery_address_4')
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
                    <label for="delivery_instruction_1">Delivery Instruction</label>
                    <input type="text" value="{{ old('delivery_instruction_1') }}"
                        placeholder="Delivery Instruction 1"
                        class="form-control @error('delivery_instruction_1') is-invalid @enderror"
                        name="delivery_instruction_1" id="delivery_instruction_1">
                    @error('delivery_instruction_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_instruction_2">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_instruction_2') }}"
                        placeholder="Delivery Instruction 2"
                        class="form-control @error('delivery_instruction_2') is-invalid @enderror"
                        name="delivery_instruction_2" id="delivery_instruction_2">
                    @error('delivery_instruction_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_instruction_3">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_instruction_3') }}"
                        placeholder="Delivery Instruction 3"
                        class="form-control @error('delivery_instruction_3') is-invalid @enderror"
                        name="delivery_instruction_3" id="delivery_instruction_3">
                    @error('delivery_instruction_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_instruction_4">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_instruction_4') }}"
                        placeholder="Delivery Instruction 4"
                        class="form-control @error('delivery_instruction_4') is-invalid @enderror"
                        name="delivery_instruction_4" id="delivery_instruction_4">
                    @error('delivery_instruction_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_instruction_5">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_instruction_5') }}"
                        placeholder="Delivery Instruction 5"
                        class="form-control @error('delivery_instruction_5') is-invalid @enderror"
                        name="delivery_instruction_5" id="delivery_instruction_5">
                    @error('delivery_instruction_5')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_instruction_6">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_instruction_6') }}"
                        placeholder="Delivery Instruction 6"
                        class="form-control @error('delivery_instruction_6') is-invalid @enderror"
                        name="delivery_instruction_6" id="delivery_instruction_6">
                    @error('delivery_instruction_6')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_instruction_7">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_instruction_7') }}"
                        placeholder="Delivery Instruction 7"
                        class="form-control @error('delivery_instruction_7') is-invalid @enderror"
                        name="delivery_instruction_7" id="delivery_instruction_7">
                    @error('delivery_instruction_7')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_instruction_8">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_instruction_8') }}"
                        placeholder="Delivery Instruction 8"
                        class="form-control @error('delivery_instruction_8') is-invalid @enderror"
                        name="delivery_instruction_8" id="delivery_instruction_8">
                    @error('delivery_instruction_8')
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
                    <label for="stuffing">Stuffing</label>
                    <div class="col-md-12">
                        <input type="checkbox" name="stuffing" @checked(old('stuffing') == 'yes') value="yes"
                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                            data-offstyle="danger">
                        @error('stuffing')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 stuff-remark" style="display: none;">
                <div class="form-group">
                    <label for="stuffing_remark">Stuffing Remark</label>
                    <input type="text" value="{{ old('stuffing_remark') }}" placeholder="Stuffing Remark"
                        class="form-control @error('stuffing_remark') is-invalid @enderror" name="stuffing_remark"
                        id="stuffing_remark">
                    @error('stuffing_remark')
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
                    <label for="fumigation">Fumigation</label>
                    <div class="col-md-12">
                        <input type="checkbox" name="fumigation" @checked(old('fumigation') == 'yes') value="yes"
                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                            data-offstyle="danger">
                        @error('fumigation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 fumigation-remark" style="display: none;">
                <div class="form-group">
                    <label for="fumigation_remark">Fumigation Remark</label>
                    <input type="text" value="{{ old('fumigation_remark') }}" placeholder="Fumigation Remark"
                        class="form-control @error('fumigation_remark') is-invalid @enderror"
                        name="fumigation_remark" id="fumigation_remark">
                    @error('fumigation_remark')
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
                    <label for="permit">Permit</label>
                    <div class="col-md-12">
                        <input type="checkbox" name="permit" @checked(old('permit') == 'yes') value="yes"
                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                            data-offstyle="danger">
                        @error('permit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 permit-remark" style="display: none;">
                <div class="form-group">
                    <label for="permit_remark">Permit Remark</label>
                    <input type="text" value="{{ old('permit_remark') }}" placeholder="Permit Remark"
                        class="form-control @error('permit_remark') is-invalid @enderror" name="permit_remark"
                        id="permit_remark">
                    @error('permit_remark')
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
                    <label for="insurance">Insurance</label>
                    <div class="col-md-12">
                        <input type="checkbox" name="insurance" @checked(old('insurance') == 'yes') value="yes"
                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                            data-offstyle="danger">
                        @error('insurance')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 insurance-remark" style="display: none;">
                <div class="form-group">
                    <label for="insurance_remark">Insurance Remark</label>
                    <input type="text" value="{{ old('insurance_remark') }}" placeholder="Insurance Remark"
                        class="form-control @error('insurance_remark') is-invalid @enderror" name="insurance_remark"
                        id="insurance_remark">
                    @error('insurance_remark')
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
                    <label for="railing">Railing</label>
                    <div class="col-md-12">
                        <input type="checkbox" name="railing" @checked(old('railing') == 'yes') value="yes"
                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                            data-offstyle="danger">
                        @error('railing')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 railing-remark" style="display: none;">
                <div class="form-group">
                    <label for="railing_remark">Railing Remark</label>
                    <input type="text" value="{{ old('railing_remark') }}" placeholder="Railing Remark"
                        class="form-control @error('railing_remark') is-invalid @enderror" name="railing_remark"
                        id="railing_remark">
                    @error('railing_remark')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>
</div>
@section('sub_script_5')
    <script>
        // VAL SHIPPER
        let shipper_code_val = "select[name=shipper_code]";
        let shipper_name_val = "input[name=shipper_name]";
        let shipper_address_1_val = "input[name=shipper_address_1]";
        let shipper_address_2_val = "input[name=shipper_address_2]";
        let shipper_address_3_val = "input[name=shipper_address_3]";
        let shipper_address_4_val = "input[name=shipper_address_4]";

        // VAL WAREHOUSE
        let stuff_agent_code_val = "select[name=stuff_agent_code]";
        let stuff_agent_name_val = "input[name=stuff_agent_name]";
        let stuff_agent_address_1_val = "input[name=stuff_agent_address_1]";
        let stuff_agent_address_2_val = "input[name=stuff_agent_address_2]";
        let stuff_agent_address_3_val = "input[name=stuff_agent_address_3]";
        let stuff_agent_address_4_val = "input[name=stuff_agent_address_4]";

        // VAL DEPOT
        let depot_code_val = "select[name=depot_code]";
        let depot_name_val = "input[name=depot_name]";
        let depot_address_1_val = "input[name=depot_address_1]";
        let depot_address_2_val = "input[name=depot_address_2]";
        let depot_address_3_val = "input[name=depot_address_3]";
        let depot_address_4_val = "input[name=depot_address_4]";

        // VAL YARD
        let yard_code_val = "select[name=yard_code]";
        let yard_name_val = "input[name=yard_name]";
        let yard_address_1_val = "input[name=yard_address_1]";
        let yard_address_2_val = "input[name=yard_address_2]";
        let yard_address_3_val = "input[name=yard_address_3]";
        let yard_address_4_val = "input[name=yard_address_4]";

        $(function() {
            changeCheckboxChecked('input[name=stuffing]', '.stuff-remark');
            changeCheckboxChecked('input[name=fumigation]', '.fumigation-remark');
            changeCheckboxChecked('input[name=permit]', '.permit-remark');
            changeCheckboxChecked('input[name=insurance]', '.insurance-remark');
            changeCheckboxChecked('input[name=railing]', '.railing-remark');

            $(".btn-shipper-1").click(function(e) {
                e.preventDefault();
                let valShippCode = $(shipper_code_val).val();
                if (valShippCode != '' || valShippCode != null) {
                    var newShippClick = new Option(valShippCode, valShippCode, true, true);
                    $("select[name=collection_from_code]").append(newShippClick).trigger(
                        'change');
                    $("input[name=collection_from_name]").val($(shipper_name_val).val());
                    $("input[name=collection_address_1]").val($(shipper_address_1_val).val());
                    $("input[name=collection_address_2]").val($(shipper_address_2_val).val());
                    $("input[name=collection_address_3]").val($(shipper_address_3_val).val());
                    $("input[name=collection_address_4]").val($(shipper_address_4_val).val());
                } else {
                    $("select[name=collection_from_code]").empty();
                    $("input[name=collection_from_name]").val('');
                    $("input[name=collection_address_1]").val('');
                    $("input[name=collection_address_2]").val('');
                    $("input[name=collection_address_3]").val('');
                    $("input[name=collection_address_4]").val('');
                }

            });

            $(".btn-yard").click(function(e) {
                e.preventDefault();
                let valYardCode = $(yard_code_val).val();
                if (valYardCode != '' || valYardCode != null) {
                    var newYardClick = new Option(valYardCode, valYardCode, true, true);
                    $("select[name=collection_from_code]").append(newYardClick).trigger(
                        'change');
                    $("input[name=collection_from_name]").val($(yard_code_val).val());
                    $("input[name=collection_address_1]").val($(yard_address_1_val).val());
                    $("input[name=collection_address_2]").val($(yard_address_2_val).val());
                    $("input[name=collection_address_3]").val($(yard_address_3_val).val());
                    $("input[name=collection_address_4]").val($(yard_address_4_val).val());
                } else {
                    $("select[name=collection_from_code]").empty();
                    $("input[name=collection_from_name]").val('');
                    $("input[name=collection_address_1]").val('');
                    $("input[name=collection_address_2]").val('');
                    $("input[name=collection_address_3]").val('');
                    $("input[name=collection_address_4]").val('');
                }

            });

            $(".btn-depot").click(function(e) {
                e.preventDefault();
                let valDepotCode = $(depot_code_val).val();
                if (valDepotCode != '' || valDepotCode != null) {
                    var newDepotClick = new Option(valDepotCode, valDepotCode, true, true);
                    $("select[name=collection_from_code]").append(newDepotClick).trigger(
                        'change');
                    $("input[name=collection_from_name]").val($(depot_name_val).val());
                    $("input[name=collection_address_1]").val($(depot_address_1_val).val());
                    $("input[name=collection_address_2]").val($(depot_address_2_val).val());
                    $("input[name=collection_address_3]").val($(depot_address_3_val).val());
                    $("input[name=collection_address_4]").val($(depot_address_4_val).val());
                } else {
                    $("select[name=collection_from_code]").empty();
                    $("input[name=collection_from_name]").val('');
                    $("input[name=collection_address_1]").val('');
                    $("input[name=collection_address_2]").val('');
                    $("input[name=collection_address_3]").val('');
                    $("input[name=collection_address_4]").val('');
                }

            });

            $(".btn-warehouse").click(function(e) {
                e.preventDefault();
                let valStuffAgentCode = $(stuff_agent_code_val).val();
                if (valStuffAgentCode != '' || valStuffAgentCode != null) {
                    var newStuffAgentClick = new Option(valStuffAgentCode, valStuffAgentCode, true, true);
                    $("select[name=delivery_to_code]").append(newStuffAgentClick).trigger(
                        'change');
                    $("input[name=delivery_to_name]").val($(stuff_agent_name_val).val());
                    $("input[name=delivery_address_1]").val($(stuff_agent_address_1_val).val());
                    $("input[name=delivery_address_2]").val($(stuff_agent_address_2_val).val());
                    $("input[name=delivery_address_3]").val($(stuff_agent_address_3_val).val());
                    $("input[name=delivery_address_4]").val($(stuff_agent_address_4_val).val());
                } else {
                    $("select[name=delivery_to_code]").empty();
                    $("input[name=delivery_to_name]").val('');
                    $("input[name=delivery_address_1]").val('');
                    $("input[name=delivery_address_2]").val('');
                    $("input[name=delivery_address_3]").val('');
                    $("input[name=delivery_address_4]").val('');
                }

            });

            $(".btn-shipper-2").click(function(e) {
                e.preventDefault();
                let valShippCode = $(shipper_code_val).val();
                if (valShippCode != '' || valShippCode != null) {
                    var newShippClick = new Option(valShippCode, valShippCode, true, true);
                    $("select[name=delivery_to_code]").append(newShippClick).trigger(
                        'change');
                    $("input[name=delivery_to_name]").val($(depot_name_val).val());
                    $("input[name=delivery_address_1]").val($(shipper_address_1_val).val());
                    $("input[name=delivery_address_2]").val($(shipper_address_2_val).val());
                    $("input[name=delivery_address_3]").val($(shipper_address_3_val).val());
                    $("input[name=delivery_address_4]").val($(shipper_address_4_val).val());
                } else {
                    $("select[name=delivery_to_code]").empty();
                    $("input[name=delivery_to_name]").val('');
                    $("input[name=delivery_address_1]").val('');
                    $("input[name=delivery_address_2]").val('');
                    $("input[name=delivery_address_3]").val('');
                    $("input[name=delivery_address_4]").val('');
                }

            });


            $('.transport-select').select2({
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
                                    custom_attribute: item.name,
                                    address_1: item.address_1,
                                    address_2: item.address_2,
                                    address_3: item.address_3,
                                    address_4: item.address_4
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.transport-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=trans_company_name]").val(name);
                $("input[name=trans_company_address_1]").val(address_1);
                $("input[name=trans_company_address_2]").val(address_2);
                $("input[name=trans_company_address_3]").val(address_3);
                $("input[name=trans_company_address_4]").val(address_4);
            });

            $('.collection-select').select2({
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
                                    custom_attribute: item.name,
                                    address_1: item.address_1,
                                    address_2: item.address_2,
                                    address_3: item.address_3,
                                    address_4: item.address_4
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.collection-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=collection_from_name]").val(name);
                $("input[name=collection_address_1]").val(address_1);
                $("input[name=collection_address_2]").val(address_2);
                $("input[name=collection_address_3]").val(address_3);
                $("input[name=collection_address_4]").val(address_4);
            });

            $('.deliveryto-select').select2({
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
                                    custom_attribute: item.name,
                                    address_1: item.address_1,
                                    address_2: item.address_2,
                                    address_3: item.address_3,
                                    address_4: item.address_4
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.deliveryto-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=delivery_to_code]").val(name);
                $("input[name=delivery_address_1]").val(address_1);
                $("input[name=delivery_address_2]").val(address_2);
                $("input[name=delivery_address_3]").val(address_3);
                $("input[name=delivery_address_4]").val(address_4);
            });
        });

        function changeCheckboxChecked(evt1 = null, evt2 = null) {
            $(evt1).change(function(e) {
                e.preventDefault();
                if ($(this).is(':checked')) {
                    $(evt2).show();
                } else {
                    $(evt2).hide();
                }
            });
        }
    </script>
@endsection
