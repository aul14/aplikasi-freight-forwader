<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="job_no">Job No</label>
            <input type="text" value="{{ $jm->job_no }}" class="form-control @error('job_no') is-invalid @enderror"
                readonly name="job_no" id="job_no">
            @error('job_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="awb_no">AWB No <span style="color: red;">*</span></label>
            <input type="text" class="form-control @error('awb_no') is-invalid @enderror" placeholder="AWB No"
                value="{{ old('awb_no', $jm->awb_no) }}" required name="awb_no" id="awb_no">
            @error('awb_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="smawb_no">SM AWB No </label>
            <input type="text" class="form-control @error('smawb_no') is-invalid @enderror" placeholder="SM AWB No"
                value="{{ old('smawb_no', $aj->smawb_no) }}" name="smawb_no" id="smawb_no">
            @error('smawb_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="mawb_no">M AWB No </label>
            <input type="text" readonly class="form-control @error('mawb_no') is-invalid @enderror"
                placeholder="M AWB No" value="{{ old('mawb_no', $jm->mawb_no) }}" name="mawb_no" id="mawb_no">
            @error('mawb_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="origin_awb_no">Origin AWB No </label>
            <input type="text" class="form-control @error('origin_awb_no') is-invalid @enderror"
                placeholder="Origin AWB No" value="{{ old('origin_awb_no', $aj->origin_awb_no) }}" name="origin_awb_no"
                id="origin_awb_no">
            @error('origin_awb_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shipment_type">Shipment Type <span style="color: red;">*</span></label>
                    <select class="select-2 @error('shipment_type') is-invalid @enderror" required name="shipment_type">
                        <option value="HOUSE" @selected($jm->shipment_type == 'HOUSE')>HOUSE</option>
                        <option value="DIRECT" @selected($jm->shipment_type == 'HOUSE')>DIRECT</option>
                        <option value="MASTER" @selected($jm->shipment_type == 'HOUSE')>MASTER</option>
                    </select>
                    @error('shipment_type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="clearance">Clearance <span style="color: red;">*</span></label>
                    <select class="select-2 @error('clearance') is-invalid @enderror" required name="clearance">
                        <option value="HOUSE" @selected($jm->clearance == 'HOUSE')>HOUSE</option>
                        <option value="DIRECT" @selected($jm->clearance == 'HOUSE')>DIRECT</option>
                        <option value="MASTER" @selected($jm->clearance == 'HOUSE')>MASTER</option>
                    </select>
                    @error('clearance')
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
                    <label for="customer_code">Customer Code <span style="color: red;">*</span></label>
                    <input type="text" class="form-control @error('customer_code') is-invalid @enderror"
                        name="customer_code" value="{{ old('customer_code', $jm->customer_code) }}" id="customer_code"
                        required>
                    @error('customer_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="customer">Customer Name</label>
                    <input type="text" class="form-control @error('customer') is-invalid @enderror" name="customer"
                        value="{{ old('customer', $jm->customer) }}" id="customer">
                    @error('customer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="customer_code">&nbsp;</label>
                    <a href="javascript:void(0)" class="btn btn-primary form-control btn-cus">
                        <i class="fa fa-search"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="customer_code">&nbsp;</label>
                    <a href="javascript:void(0)" class="btn btn-danger form-control btn-delete-cus">
                        <i class="fa fa-close"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="reference_no">Customer Reference No.</label>
                    <input type="text" class="form-control @error('reference_no') is-invalid @enderror"
                        name="reference_no" value="{{ old('reference_no', $jm->reference_no) }}" id="reference_no">
                    @error('reference_no')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="customer_contact">Customer Contact</label>
                    <input type="text" class="form-control @error('customer_contact') is-invalid @enderror"
                        name="customer_contact" value="{{ old('customer_contact', $aj->customer_contact) }}"
                        id="customer_contact">
                    @error('customer_contact')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="shipper_code">Shipper
                            Code</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <select class="shipper-select @error('shipper_code') is-invalid @enderror"
                                name="shipper_code" id="shipper_code">
                                <option value="{{ old('shipper_code', $jm->shipper_code) }}">
                                    {{ old('shipper_code', $jm->shipper_code) }}</option>
                            </select>

                            @error('shipper_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="shipper_name">Shipper Name</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('shipper_name', $jm->shipper_name) }}"
                                class="form-control @error('shipper_name') is-invalid @enderror"
                                placeholder="Shipper Name" name="shipper_name" id="shipper_name">
                            @error('shipper_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="shipper_address_1">Shipper Address</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('shipper_address_1', $jm->shipper_address_1) }}"
                                placeholder="Shipper Address 1"
                                class="form-control @error('shipper_address_1') is-invalid @enderror"
                                name="shipper_address_1" id="shipper_address_1">
                            @error('shipper_address_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="shipper_address_2"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('shipper_address_2', $jm->shipper_address_2) }}"
                                placeholder="Shipper Address 2"
                                class="form-control @error('shipper_address_2') is-invalid @enderror"
                                name="shipper_address_2" id="shipper_address_2">
                            @error('shipper_address_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="shipper_address_3"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('shipper_address_3', $jm->shipper_address_3) }}"
                                placeholder="Shipper Address 3"
                                class="form-control @error('shipper_address_3') is-invalid @enderror"
                                name="shipper_address_3" id="shipper_address_3">
                            @error('shipper_address_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="shipper_address_4"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('shipper_address_4', $jm->shipper_address_4) }}"
                                placeholder="Shipper Address 4"
                                class="form-control @error('shipper_address_4') is-invalid @enderror"
                                name="shipper_address_4" id="shipper_address_4">
                            @error('shipper_address_4')
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
                        <label for="consignee_code">Consignee
                            Code</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <select class="consignee-select @error('consignee_code') is-invalid @enderror"
                                name="consignee_code" id="consignee_code">
                                <option value="{{ old('consignee_code', $jm->consignee_code) }}">
                                    {{ old('consignee_code', $jm->consignee_code) }}</option>
                            </select>

                            @error('consignee_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="consignee_name">Consignee Name</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('consignee_name', $jm->consignee_name) }}"
                                placeholder="Consignee Name"
                                class="form-control @error('consignee_name') is-invalid @enderror"
                                name="consignee_name">
                            @error('consignee_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="consignee_address_1">Consignee Address</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('consignee_address_1', $jm->consignee_address_1) }}"
                                placeholder="Consignee Address 1"
                                class="form-control @error('consignee_address_1') is-invalid @enderror"
                                name="consignee_address_1">
                            @error('consignee_address_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="consignee_address_2"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('consignee_address_2', $jm->consignee_address_2) }}"
                                placeholder="Consignee Address 2"
                                class="form-control @error('consignee_address_2') is-invalid @enderror"
                                name="consignee_address_2">
                            @error('consignee_address_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="consignee_address_3"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('consignee_address_3', $jm->consignee_address_3) }}"
                                placeholder="Consignee Address 3"
                                class="form-control @error('consignee_address_3') is-invalid @enderror"
                                name="consignee_address_3">
                            @error('consignee_address_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="consignee_address_4"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('consignee_address_4', $jm->consignee_address_4) }}"
                                placeholder="Consignee Address 4"
                                class="form-control @error('consignee_address_4') is-invalid @enderror"
                                name="consignee_address_4">
                            @error('consignee_address_4')
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
            <div class="col-md-4">
                <div class="form-group">
                    <label for="consignee_postal_code">Consignee Postal Code</label>
                    <input type="text" class="form-control @error('consignee_postal_code') is-invalid @enderror"
                        name="consignee_postal_code"
                        value="{{ old('consignee_postal_code', $aj->consignee_postal_code) }}"
                        id="consignee_postal_code">
                    @error('consignee_postal_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="consignee_contact">Consignee Contact</label>
                    <input type="text" class="form-control @error('consignee_contact') is-invalid @enderror"
                        name="consignee_contact" value="{{ old('consignee_contact', $aj->consignee_contact) }}"
                        id="consignee_contact">
                    @error('consignee_contact')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="consignee_telp">Consignee Telephone</label>
                    <input type="text" class="form-control @error('consignee_telp') is-invalid @enderror"
                        name="consignee_telp" value="{{ old('consignee_telp', $aj->consignee_telp) }}"
                        id="consignee_telp">
                    @error('consignee_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>


    </div>

    <div class="col-md-6">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="job_date">Job Date</label>
                    <input type="text" value="{{ old('job_date', date('Y/m/d', strtotime($jm->job_date))) }}"
                        autocomplete="off" readonly class="form-control @error('job_date') is-invalid @enderror"
                        name="job_date" id="job_date">
                    @error('job_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="job_type">Job Type <span style="color: red;">*</span></label>
                    <select class="select-2 @error('job_type') is-invalid @enderror job-type" required
                        name="job_type">
                        @foreach ($job_type as $item)
                            <option value="{{ $item->type }}" @selected($item->type == $jm->job_type)>{{ $item->type }}
                            </option>
                        @endforeach
                    </select>
                    @error('job_type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="transhipment">Transhipment</label>
            <div class="col-md-6">
                <input type="checkbox" name="transhipment" @checked(old('transhipment', $aj->transhipment) == 'yes') value="yes"
                    data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                    data-offstyle="danger">
                @error('transhipment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="nomination_flag">Nomination Cargo</label>
            <div class="col-md-6">
                <input type="checkbox" name="nomination_flag" @checked(old('nomination_flag', $aj->nomination_flag) == 'yes') value="yes"
                    data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                    data-offstyle="danger">
                @error('nomination_flag')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="shipmode">Shipmode</label>
            <select class="select-2 @error('shipmode') is-invalid @enderror" name="shipmode">
                <option value=""></option>
                <option value="ROUTING ORDER" @selected($aj->shipmode == 'ROUTING ORDER')>ROUTING ORDER</option>
                <option value="FREE HANDS" @selected($aj->shipmode == 'FREE HANDS')>FREE HANDS</option>
                <option value="TRANSIT" @selected($aj->shipmode == 'TRANSIT')>TRANSIT</option>
            </select>
            @error('shipmode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="delivery_agent_code">Overseas Agent</label>
                    <select class="delivery_agent-select @error('delivery_agent_code') is-invalid @enderror"
                        name="delivery_agent_code">
                        <option value="{{ old('delivery_agent_code', $jm->delivery_agent_code) }}">
                            {{ old('delivery_agent_code', $jm->delivery_agent_code) }}
                        </option>
                    </select>

                    @error('delivery_agent_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="delivery_agent_name">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_agent_name', $jm->delivery_agent_name) }}"
                        placeholder="Delivery Agent Name"
                        class="form-control @error('delivery_agent_name') is-invalid @enderror"
                        name="delivery_agent_name" id="delivery_agent_name">
                    @error('delivery_agent_name')
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
                    <label for="warehouse_agent_code">Warehouse</label>
                    <select class="warehouse_agent-select @error('warehouse_agent_code') is-invalid @enderror"
                        name="warehouse_agent_code">
                        <option value="{{ old('warehouse_agent_code', $aj->warehouse_agent_code) }}">
                            {{ old('warehouse_agent_code', $aj->warehouse_agent_code) }}
                        </option>
                    </select>

                    @error('warehouse_agent_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="warehouse_agent_name">&nbsp;</label>
                    <input type="text" value="{{ old('warehouse_agent_name', $aj->warehouse_agent_name) }}"
                        placeholder="Warehouse Agent Name"
                        class="form-control @error('warehouse_agent_name') is-invalid @enderror"
                        name="warehouse_agent_name" id="warehouse_agent_name">
                    @error('warehouse_agent_name')
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
                    <label for="appt_agent_code">Appointed Code</label>
                    <select class="agent-select @error('appt_agent_code') is-invalid @enderror"
                        name="appt_agent_code">
                        <option value="{{ old('appt_agent_code', $aj->appt_agent_code) }}">
                            {{ old('appt_agent_code', $aj->appt_agent_code) }}
                        </option>
                    </select>

                    @error('appt_agent_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="appt_agent_name">&nbsp;</label>
                    <input type="text" value="{{ old('appt_agent_name', $aj->appt_agent_name) }}" readonly
                        placeholder="Appointed Agent Name"
                        class="form-control @error('appt_agent_name') is-invalid @enderror" name="appt_agent_name"
                        id="appt_agent_name">
                    @error('appt_agent_name')
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
                    <label for="appt_contact">Appointed Contact</label>
                    <input type="text" value="{{ old('appt_contact', $aj->appt_contact) }}"
                        class="form-control @error('appt_contact') is-invalid @enderror" name="appt_contact"
                        id="appt_contact">
                    @error('appt_contact')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="appt_telp">Appointed Telephone</label>
                    <input type="text" value="{{ old('appt_telp', $aj->appt_telp) }}"
                        class="form-control @error('appt_telp') is-invalid @enderror" name="appt_telp"
                        id="appt_telp">
                    @error('appt_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <label for="notify_code">Notify Code</label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <select class="notify-select @error('notify_code') is-invalid @enderror"
                                    name="notify_code">
                                    <option value="{{ old('notify_code', $aj->notify_code) }}">
                                        {{ old('notify_code', $aj->notify_code) }}
                                    </option>
                                </select>

                                @error('notify_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <label for="notify_name">Notify Name</label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <input type="text" value="{{ old('notify_name', $aj->notify_name) }}"
                                    placeholder="Notify Name"
                                    class="form-control @error('notify_name') is-invalid @enderror"
                                    name="notify_name">
                                @error('notify_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <label for="notify_address_1">Notify Address</label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <input type="text" value="{{ old('notify_address_1', $aj->notify_address_1) }}"
                                    placeholder="Notify Address 1"
                                    class="form-control @error('notify_address_1') is-invalid @enderror"
                                    name="notify_address_1">
                                @error('notify_address_1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="notify_address_2"></label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <input type="text" value="{{ old('notify_address_2', $aj->notify_address_2) }}"
                                    placeholder="Notify Address 2"
                                    class="form-control @error('notify_address_2') is-invalid @enderror"
                                    name="notify_address_2">
                                @error('notify_address_2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="notify_address_3"></label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <input type="text" value="{{ old('notify_address_3', $aj->notify_address_3) }}"
                                    placeholder="Notify Address 3"
                                    class="form-control @error('notify_address_3') is-invalid @enderror"
                                    name="notify_address_3">
                                @error('notify_address_3')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="notify_address_4"></label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <input type="text" value="{{ old('notify_address_4', $aj->notify_address_4) }}"
                                    placeholder="Notify Address 4"
                                    class="form-control @error('notify_address_4') is-invalid @enderror"
                                    name="notify_address_4">
                                @error('notify_address_4')
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
            <div class="col-md-12">
                <div class="form-group">
                    <label for="remark_1">Remark</label>
                    <input type="text" value="{{ old('remark_1', $aj->remark_1) }}" placeholder="Footer 1"
                        class="form-control @error('remark_1') is-invalid @enderror" name="remark_1" id="remark_1">
                    @error('remark_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="remark_2">&nbsp;</label>
                    <input type="text" value="{{ old('remark_2', $aj->remark_2) }}" placeholder="Footer 2"
                        class="form-control @error('remark_2') is-invalid @enderror" name="remark_2" id="remark_2">
                    @error('remark_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="remark_3">&nbsp;</label>
                    <input type="text" value="{{ old('remark_3', $aj->remark_3) }}" placeholder="Footer 3"
                        class="form-control @error('remark_3') is-invalid @enderror" name="remark_3" id="remark_3">
                    @error('remark_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="remark_4">&nbsp;</label>
                    <input type="text" value="{{ old('remark_4', $aj->remark_4) }}" placeholder="Footer 4"
                        class="form-control @error('remark_4') is-invalid @enderror" name="remark_4" id="remark_4">
                    @error('remark_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal Search Customer -->
<div class="modal fade" id="modal-cus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search Customer</h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-0">
                    <table id="tableCus" class="modal-table1 table modal-tableview table-bordered table-hover w-100">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>No</th>
                                <th class="select-filter">Bisnis Party Code</th>
                                <th class="select-filter">Bisnis Party Name</th>
                                <th class="select-filter">Customer Code</th>
                                <th class="select-filter">Vendor Code</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-cus">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- END --}}

@section('sub_script_1')
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            evtSalesman(".salesman-select", "input[name=salesman]");

            dataTableCustomer('#tableCus');
            clickRemoveValBook(`.btn-delete-book, .btn-delete-cus`);

            evtBisnisParty('.shipper-select', 'Search shipper', 'input[name=shipper_name]',
                'input[name=shipper_address_1]', 'input[name=shipper_address_2]',
                'input[name=shipper_address_3]',
                'input[name=shipper_address_4]');

            evtBisnisParty('.consignee-select', 'Search consignee', 'input[name=consignee_name]',
                'input[name=consignee_address_1]', 'input[name=consignee_address_2]',
                'input[name=consignee_address_3]',
                'input[name=consignee_address_4]');

            evtBisnisParty('.notify-select', 'Search notify', 'input[name=notify_name]',
                'input[name=notify_address_1]', 'input[name=notify_address_2]', 'input[name=notify_address_3]',
                'input[name=notify_address_4]');

            evtBisnisParty('.delivery_agent-select', 'Search delivery agent', 'input[name=delivery_agent_name]');
            evtBisnisParty('.warehouse_agent-select', 'Search warehouse agent', 'input[name=warehouse_agent_name]');
            evtBisnisParty('.agent-select', 'Search agent', 'input[name=appt_agent_name]');

            $(`.btn-cus`).click(function(e) {
                e.preventDefault();
                $(`#modal-cus`).modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            });

            $(`.btn-book`).click(function(e) {
                e.preventDefault();
                $(`#modal-book`).modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            });

        });

        function clickRemoveValBook(classBtn) {
            $(classBtn).click(function(e) {
                e.preventDefault();
                $("input[name=customer_code]").val('');
                $("input[name=customer]").val('');
            });
        }

        function dataTableCustomer(idTable) {
            var table = $(idTable).DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                ajax: {
                    url: '{{ route('table.bp') }}',
                    dataType: "json",
                    type: "POST",
                },
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="ni ni-bold-right pgn-1" style="color: #5e72e4"></span>',
                        sPrevious: '<span class="ni ni-bold-left pgn-2" style="color: #5e72e4"></span>',
                        sFirst: '<span class="pgn-3" style="color: #5e72e4">First</span>',
                        sLast: '<span class="pgn-4" style="color: #5e72e4">Last</span>',
                    }
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'customer_code',
                        name: 'customer_code'
                    },
                    {
                        data: 'vendor_code',
                        name: 'vendor_code'
                    },

                ],
                columnDefs: [{
                    defaultContent: "-",
                    targets: "_all"
                }],

            });

            $(document).on('click', '.modal-table1 .tbody-cus td', function() {
                var colIdx = table.cell(this).index().row;
                if (table.rows(colIdx).nodes().to$().find('td:first-child .input_check').is(':checked') ===
                    true) {
                    table.rows(colIdx).nodes().to$().find('td:first-child .input_check').prop('checked', false);
                } else {
                    table.rows(colIdx).nodes().to$().find('td:first-child .input_check').prop('checked', true);

                    let code = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked')
                        .val();

                    let customer = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked')
                        .data('customer');

                    $(`#modal-cus`).modal('hide');
                    $("input[name=customer_code]").val(code);
                    $("input[name=customer]").val(customer);

                }
            });

            return table;
        }

        function evtBisnisParty(evt1 = null, placeholder = null, evt2 = null, evt3 = null, evt4 = null, evt5 = null,
            evt6 =
            null) {
            $(evt1).select2({
                placeholder: `${placeholder}`,
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

            $(evt1).change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $(evt2).val(name);
                $(evt3).val(address_1);
                $(evt4).val(address_2);
                $(evt5).val(address_3);
                $(evt6).val(address_4);
            });
        }

        function evtSalesman(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search salesman',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.salesman') }}',
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

        function evtUom(evt1 = null, evt2 = null) {
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
