<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="collect_from_code">Collect From Code</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <select class="collect-select @error('collect_from_code') is-invalid @enderror"
                                name="collect_from_code">
                                <option value="{{ old('collect_from_code') }}">{{ old('collect_from_code') }}</option>
                            </select>

                            @error('collect_from_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="collect_from_name">Collect From Name</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('collect_from_name') }}"
                                class="form-control @error('collect_from_name') is-invalid @enderror"
                                placeholder="Collect From Name" name="collect_from_name">
                            @error('collect_from_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="collect_from_address_1">Collect Address</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('collect_from_address_1') }}"
                                placeholder="Collect Address 1"
                                class="form-control @error('collect_from_address_1') is-invalid @enderror"
                                name="collect_from_address_1">
                            @error('collect_from_address_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="collect_from_address_2"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('collect_from_address_2') }}"
                                placeholder="Collect Address 2"
                                class="form-control @error('collect_from_address_2') is-invalid @enderror"
                                name="collect_from_address_2">
                            @error('collect_from_address_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="collect_from_address_3"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('collect_from_address_3') }}"
                                placeholder="Collect Address 3"
                                class="form-control @error('collect_from_address_3') is-invalid @enderror"
                                name="collect_from_address_3">
                            @error('collect_from_address_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="collect_from_address_4"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('collect_from_address_4') }}"
                                placeholder="Collect Address 4"
                                class="form-control @error('collect_from_address_4') is-invalid @enderror"
                                name="collect_from_address_4">
                            @error('collect_from_address_4')
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
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="delivery_to_code">Delivery To Code</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <select class="delivery-select @error('delivery_to_code') is-invalid @enderror"
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
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="delivery_to_name">Delivery To Name</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('delivery_to_name') }}"
                                class="form-control @error('delivery_to_name') is-invalid @enderror"
                                placeholder="Delivery To Name" name="delivery_to_name">
                            @error('delivery_to_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="delivery_to_address_1">Delivery To Address</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('delivery_to_address_1') }}"
                                placeholder="Delivery To Address 1"
                                class="form-control @error('delivery_to_address_1') is-invalid @enderror"
                                name="delivery_to_address_1">
                            @error('delivery_to_address_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="delivery_to_address_2"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('delivery_to_address_2') }}"
                                placeholder="Delivery To Address 2"
                                class="form-control @error('delivery_to_address_2') is-invalid @enderror"
                                name="delivery_to_address_2">
                            @error('delivery_to_address_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="delivery_to_address_3"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('delivery_to_address_3') }}"
                                placeholder="Delivery To Address 3"
                                class="form-control @error('delivery_to_address_3') is-invalid @enderror"
                                name="delivery_to_address_3">
                            @error('delivery_to_address_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="delivery_to_address_4"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('delivery_to_address_4') }}"
                                placeholder="Delivery To Address 4"
                                class="form-control @error('delivery_to_address_4') is-invalid @enderror"
                                name="delivery_to_address_4">
                            @error('delivery_to_address_4')
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
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="transport_company_code">Transport Company Code</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <select class="transport-select @error('transport_company_code') is-invalid @enderror"
                                name="transport_company_code">
                                <option value="{{ old('transport_company_code') }}">
                                    {{ old('transport_company_code') }}</option>
                            </select>

                            @error('transport_company_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="transport_company_name">Transport Company Name</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('transport_company_name') }}"
                                class="form-control @error('transport_company_name') is-invalid @enderror"
                                placeholder="Transport Company Name" name="transport_company_name">
                            @error('transport_company_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="transport_company_address_1">Transport Company Address</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('transport_company_address_1') }}"
                                placeholder="Transport Company Address 1"
                                class="form-control @error('transport_company_address_1') is-invalid @enderror"
                                name="transport_company_address_1">
                            @error('transport_company_address_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="transport_company_address_2"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('transport_company_address_2') }}"
                                placeholder="Transport Company Address 2"
                                class="form-control @error('transport_company_address_2') is-invalid @enderror"
                                name="transport_company_address_2">
                            @error('transport_company_address_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="transport_company_address_3"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('transport_company_address_3') }}"
                                placeholder="Transport Company Address 3"
                                class="form-control @error('transport_company_address_3') is-invalid @enderror"
                                name="transport_company_address_3">
                            @error('transport_company_address_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="transport_company_address_4"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('transport_company_address_4') }}"
                                placeholder="Transport Company Address 4"
                                class="form-control @error('transport_company_address_4') is-invalid @enderror"
                                name="transport_company_address_4">
                            @error('transport_company_address_4')
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

    <div class="col-md-6">
        <div class="form-group">
            <label for="transport_company_contact_name">Transport Company Contact Name </label>
            <input type="text" value="{{ old('transport_company_contact_name') }}"
                class="form-control @error('transport_company_contact_name') is-invalid @enderror"
                name="transport_company_contact_name" id="transport_company_contact_name">
            @error('transport_company_contact_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="transport_company_telp">Transport Company Telephone </label>
                    <input type="text" value="{{ old('transport_company_telp') }}"
                        class="form-control @error('transport_company_telp') is-invalid @enderror"
                        name="transport_company_telp" id="transport_company_telp">
                    @error('transport_company_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="transport_company_fax">Transport Company Fax </label>
                    <input type="text" value="{{ old('transport_company_fax') }}"
                        class="form-control @error('transport_company_fax') is-invalid @enderror"
                        name="transport_company_fax" id="transport_company_fax">
                    @error('transport_company_fax')
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
                    <label for="cr_no">Cr No </label>
                    <input type="text" value="{{ old('cr_no') }}"
                        class="form-control @error('cr_no') is-invalid @enderror" name="cr_no" id="cr_no">
                    @error('cr_no')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vehicle_no">Vehicle No</label>
                    <input type="text" value="{{ old('vehicle_no') }}"
                        class="form-control @error('vehicle_no') is-invalid @enderror" name="vehicle_no"
                        id="vehicle_no">
                    @error('vehicle_no')
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
                    <label for="delivery_date">Delivery Date/Time</label>
                    <input type="text" value="{{ old('delivery_date') }}"
                        class="form-control @error('delivery_date') is-invalid @enderror date-time-picker"
                        autocomplete="off" name="delivery_date" id="delivery_date">
                    @error('delivery_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="driver_name">Driver</label>
                    <input type="text" value="{{ old('driver_name') }}"
                        class="form-control @error('driver_name') is-invalid @enderror" name="driver_name"
                        id="driver_name">
                    @error('driver_name')
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
                    <label for="driver_contact_1">Driver Contact No 1</label>
                    <input type="text" value="{{ old('driver_contact_1') }}"
                        class="form-control @error('driver_contact_1') is-invalid @enderror" name="driver_contact_1"
                        id="driver_contact_1">
                    @error('driver_contact_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="driver_contact_2">Driver Contact No 2</label>
                    <input type="text" value="{{ old('driver_contact_2') }}"
                        class="form-control @error('driver_contact_2') is-invalid @enderror" name="driver_contact_2"
                        id="driver_contact_2">
                    @error('driver_contact_2')
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
        </div>

    </div>
</div>
