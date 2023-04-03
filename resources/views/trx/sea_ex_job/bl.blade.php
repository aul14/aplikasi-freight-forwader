<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="job_no">Job No</label>
            <input type="text" value="NEW" class="form-control @error('job_no') is-invalid @enderror" readonly
                name="job_no" id="job_no">
            @error('job_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="bl_no">BL No <span style="color: red;">*</span></label>
            <input type="text" class="form-control @error('bl_no') is-invalid @enderror" value="{{ old('bl_no') }}"
                required name="bl_no" id="bl_no">
            @error('bl_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="booking_no">Booking No</label>
                    <input type="text" class="form-control @error('booking_no') is-invalid @enderror"
                        name="booking_no" value="{{ old('booking_no') }}" id="booking_no">
                    @error('booking_no')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="booking_no">&nbsp;</label>
                    <a href="javascript:void(0)" class="btn btn-primary form-control btn-book">Search</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="shipment_type">Shipment Type <span style="color: red;">*</span></label>
            <select class="select-2 @error('shipment_type') is-invalid @enderror" required name="shipment_type">
                <option value="HOUSE" @selected(old('shipment_type') == 'HOUSE')>HOUSE</option>
                <option value="DIRECT" @selected(old('shipment_type') == 'DIRECT')>DIRECT</option>
                <option value="MASTER" @selected(old('shipment_type') == 'MASTER')>MASTER</option>
                <option value="SUB-HOUSE" @selected(old('shipment_type') == 'SUB-HOUSE')>SUB-HOUSE</option>
                <option value="SUB-MASTER" @selected(old('shipment_type') == 'SUB-MASTER')>SUB-MASTER</option>
            </select>
            @error('shipment_type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="master_job_no">Master Job No</label>
            <input type="text" class="form-control @error('master_job_no') is-invalid @enderror" readonly
                name="master_job_no" id="master_job_no">
            @error('master_job_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="obl_no">OB/L No </label>
            <input type="text" class="form-control @error('obl_no') is-invalid @enderror" name="obl_no"
                id="obl_no">
            @error('obl_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="customer_code">Customer Code <span style="color: red;">*</span></label>
                    <input type="text" class="form-control @error('customer_code') is-invalid @enderror"
                        name="customer_code" value="{{ old('customer_code') }}" required id="customer_code">
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
                        value="{{ old('customer') }}" id="customer">
                    @error('customer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="customer_code">&nbsp;</label>
                    <a href="javascript:void(0)" class="btn btn-primary form-control btn-cus">Search</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="reference_no">Customer Reference No.</label>
            <input type="text" class="form-control @error('reference_no') is-invalid @enderror" name="reference_no"
                value="{{ old('reference_no') }}" id="reference_no">
            @error('reference_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
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
                                name="shipper_code">
                                <option value="{{ old('shipper_code') }}">{{ old('shipper_code') }}</option>
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
                            <input type="text" value="{{ old('shipper_name') }}"
                                class="form-control @error('shipper_name') is-invalid @enderror"
                                placeholder="Shipper Name" name="shipper_name">
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
                            <input type="text" value="{{ old('shipper_address_1') }}"
                                placeholder="Shipper Address 1"
                                class="form-control @error('shipper_address_1') is-invalid @enderror"
                                name="shipper_address_1">
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
                            <input type="text" value="{{ old('shipper_address_2') }}"
                                placeholder="Shipper Address 2"
                                class="form-control @error('shipper_address_2') is-invalid @enderror"
                                name="shipper_address_2">
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
                            <input type="text" value="{{ old('shipper_address_3') }}"
                                placeholder="Shipper Address 3"
                                class="form-control @error('shipper_address_3') is-invalid @enderror"
                                name="shipper_address_3">
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
                            <input type="text" value="{{ old('shipper_address_4') }}"
                                placeholder="Shipper Address 4"
                                class="form-control @error('shipper_address_4') is-invalid @enderror"
                                name="shipper_address_4">
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
                                name="consignee_code">
                                <option value="{{ old('consignee_code') }}">{{ old('consignee_code') }}</option>
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
                            <input type="text" value="{{ old('consignee_name') }}" placeholder="Consignee Name"
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
                            <input type="text" value="{{ old('consignee_address_1') }}"
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
                            <input type="text" value="{{ old('consignee_address_2') }}"
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
                            <input type="text" value="{{ old('consignee_address_3') }}"
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
                            <input type="text" value="{{ old('consignee_address_4') }}"
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


    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="job_date">Job Date</label>
            <input type="text" value="{{ old('job_date', date('Y/m/d')) }}" autocomplete="off" readonly
                class="form-control @error('job_date') is-invalid @enderror" name="job_date" id="job_date">
            @error('job_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cargo_type">Cargo Type <span style="color: red;">*</span></label>
                    <select class="select-2 @error('cargo_type') is-invalid @enderror cargo-type" required
                        name="cargo_type">
                        <option value="FCL" @selected(old('cargo_type') == 'FCL')>FCL</option>
                        <option value="LCL" @selected(old('cargo_type') == 'LCL')>LCL</option>
                    </select>
                    @error('cargo_type')
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
                            <option value="{{ $item->type }}" @selected($item->type == 'FC')>{{ $item->type }}
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
            <label for="bl_surrendered">Bl Surrendered?</label>
            <div class="col-md-6">
                <input type="checkbox" name="bl_surrendered" @checked(old('bl_surrendered') == 'yes') value="yes"
                    data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                    data-offstyle="danger">
                @error('bl_surrendered')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="bl_attach">Bl Attachment</label>
            <div class="col-md-6">
                <input type="checkbox" name="bl_attach" @checked(old('bl_attach') == 'yes') value="yes"
                    data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                    data-offstyle="danger">
                @error('bl_attach')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="no_of_original_bl">No. of Original BL</label>
            <input type="number" value="{{ old('no_of_original_bl', 3) }}" autocomplete="off"
                class="form-control @error('no_of_original_bl') is-invalid @enderror" name="no_of_original_bl"
                id="no_of_original_bl">
            @error('no_of_original_bl')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="salesman_code">Salesman </label>
                    <select class="salesman-select @error('salesman_code') is-invalid @enderror"
                        name="salesman_code">
                        <option value="{{ old('salesman_code') }}">{{ old('salesman_code') }}</option>
                    </select>

                    @error('salesman_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="salesman"> </label>
                    <input type="text" value="{{ old('salesman') }}" readonly
                        class="form-control @error('salesman') is-invalid @enderror" name="salesman" id="salesman">
                    @error('salesman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="freight">Freight </label>
            <select class="select-2 @error('freight') is-invalid @enderror" name="freight">
                <option value=""></option>
                <option value="COLLECT" @selected(old('freight') == 'COLLECT')>COLLECT</option>
                <option value="PREPAID" @selected(old('freight') == 'PREPAID')>PREPAID</option>
            </select>
            @error('freight')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
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
                                    <option value="{{ old('notify_code') }}">{{ old('notify_code') }}
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
                                <input type="text" value="{{ old('notify_name') }}" placeholder="Notify Name"
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
                                <input type="text" value="{{ old('notify_address_1') }}"
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
                                <input type="text" value="{{ old('notify_address_2') }}"
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
                                <input type="text" value="{{ old('notify_address_3') }}"
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
                                <input type="text" value="{{ old('notify_address_4') }}"
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
                <div class="col-md-12">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <label for="delivery_agent_code">Delivery Agent Code</label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <select
                                    class="delivery_agent-select @error('delivery_agent_code') is-invalid @enderror"
                                    name="delivery_agent_code">
                                    <option value="{{ old('delivery_agent_code') }}">{{ old('delivery_agent_code') }}
                                    </option>
                                </select>

                                @error('delivery_agent_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <label for="delivery_agent_name">Delivery Agent Name</label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <input type="text" value="{{ old('delivery_agent_name') }}"
                                    placeholder="Delivery Agent Name"
                                    class="form-control @error('delivery_agent_name') is-invalid @enderror"
                                    name="delivery_agent_name">
                                @error('delivery_agent_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <label for="delivery_agent_address_1">Delivery Agent Address</label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <input type="text" value="{{ old('delivery_agent_address_1') }}"
                                    placeholder="Delivery Agent Address 1"
                                    class="form-control @error('delivery_agent_address_1') is-invalid @enderror"
                                    name="delivery_agent_address_1">
                                @error('delivery_agent_address_1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="delivery_agent_address_2"></label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <input type="text" value="{{ old('delivery_agent_address_2') }}"
                                    placeholder="Delivery Agent Address 2"
                                    class="form-control @error('delivery_agent_address_2') is-invalid @enderror"
                                    name="delivery_agent_address_2">
                                @error('delivery_agent_address_2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="delivery_agent_address_3"></label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <input type="text" value="{{ old('delivery_agent_address_3') }}"
                                    placeholder="Delivery Agent Address 3"
                                    class="form-control @error('delivery_agent_address_3') is-invalid @enderror"
                                    name="delivery_agent_address_3">
                                @error('delivery_agent_address_3')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="delivery_agent_address_4"></label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <div class="form-group">
                                <input type="text" value="{{ old('delivery_agent_address_4') }}"
                                    placeholder="Delivery Agent Address 4"
                                    class="form-control @error('delivery_agent_address_4') is-invalid @enderror"
                                    name="delivery_agent_address_4">
                                @error('delivery_agent_address_4')
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
                                <th class="select-filter">Customer</th>
                                <th class="select-filter">Booking No</th>
                                <th class="select-filter">Port Loading</th>
                                <th class="select-filter">Port Discharge</th>
                                <th class="select-filter">From</th>
                                <th class="select-filter">Dest</th>
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

<!-- Modal Search Booking -->
<div class="modal fade" id="modal-book" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search Sea Export Booking</h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-0">
                    <table id="tableBook" class="modal-table1 table modal-tableview table-bordered table-hover w-100">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>No</th>
                                <th class="select-filter">Booking No</th>
                                <th class="select-filter">Booking Date</th>
                                <th class="select-filter">Etd Date</th>
                                <th class="select-filter">Customer</th>
                                <th class="select-filter">Port Loading</th>
                                <th class="select-filter">Port Discharge</th>
                                <th class="select-filter">From</th>
                                <th class="select-filter">Dest</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-book">
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
            dataTableBooking('#tableBook');

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

            $(`.cargo-type`).change(function(e) {
                e.preventDefault();
                if ($(this).val() == 'LCL') {
                    $(".show-fcl").hide();
                    $("select[name=job_type]").val("LC").trigger('change');
                } else {
                    $(".show-fcl").show();
                    $("select[name=job_type]").val("FC").trigger('change');
                }
            });

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

            evtBisnisParty('.delivery_agent-select', 'Search delivery agent', 'input[name=delivery_agent_name]',
                'input[name=delivery_agent_address_1]', 'input[name=delivery_agent_address_2]',
                'input[name=delivery_agent_address_3]',
                'input[name=delivery_agent_address_4]');

        });

        function dataTableBooking(idTable) {
            var table = $(idTable).DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                ajax: {
                    url: '{{ route('get.table.book_ex_job') }}',
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
                        data: 'booking_no',
                        name: 'booking_no'
                    },
                    {
                        data: 'booking_date',
                        name: 'booking_date'
                    },
                    {
                        data: 'etd',
                        name: 'etd'
                    },
                    {
                        data: 'customer',
                        name: 'customer'
                    },
                    {
                        data: 'port_loading_name',
                        name: 'port_loading_name'
                    },
                    {
                        data: 'port_discharge_name',
                        name: 'port_discharge_name'
                    },
                    {
                        data: 'origin_name',
                        name: 'origin_name'
                    },

                    {
                        data: 'dest_name',
                        name: 'dest_name'
                    },
                ],
                columnDefs: [{
                    defaultContent: "-",
                    targets: "_all"
                }],

            });

            $(document).on('click', '.modal-table1 .tbody-book td', function() {
                var colIdx = table.cell(this).index().row;
                if (table.rows(colIdx).nodes().to$().find('td:first-child .input_check').is(':checked') === true) {
                    table.rows(colIdx).nodes().to$().find('td:first-child .input_check').prop('checked', false);
                } else {
                    table.rows(colIdx).nodes().to$().find('td:first-child .input_check').prop('checked', true);

                    let booking_no = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked')
                        .val();
                    let id = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked').data(
                        'id');

                    $.ajax({
                        type: "POST",
                        url: '{{ route('search.book_ex_job') }}',
                        data: {
                            booking_no: booking_no,
                        },
                        dataType: "json",
                        success: function(res) {
                            $(`#modal-book`).modal('hide');
                            $("input[name=customer_code]").val(res.code_customer);
                            $("input[name=customer]").val(res.customer);
                            var etd = new Date(res.etd_date != null ? res.etd_date : res.etd);
                            $("input[name=etd]").val(etd.toString("dd/MM/yyyy"));
                            var eta_sub = new Date(res.eta_sub);
                            $("input[name=eta_sub]").val(res.eta_sub != null ? eta_sub.toString(
                                "yyyy/MM/dd HH:mm") : '');
                            var close_date_time = new Date(res.close_date_time);
                            $("input[name=close_date_time]").val(res.close_date_time != null ?
                                close_date_time.toString(
                                    "yyyy/MM/dd HH:mm") : '');
                            var first_via_ata = new Date(res.first_via_ata);
                            $("input[name=first_via_ata]").val(res.first_via_ata != null ? first_via_ata
                                .toString("dd/MM/yyyy") : '');
                            var first_via_eta = new Date(res.first_via_eta);
                            $("input[name=first_via_eta]").val(res.first_via_eta != null ? first_via_eta
                                .toString("dd/MM/yyyy") : '');
                            var first_via_etd = new Date(res.first_via_etd);
                            $("input[name=first_via_etd]").val(res.first_via_etd != null ? first_via_etd
                                .toString("dd/MM/yyyy") : '');
                            var eta = new Date(res.eta);
                            $("input[name=eta]").val(res.eta != null ? eta.toString("dd/MM/yyyy") : '');
                            var dest_eta_date = new Date(res.dest_eta_date);
                            $("input[name=dest_eta_date]").val(res.dest_eta_date != null ? dest_eta_date
                                .toString("dd/MM/yyyy") : '');
                            $("input[name=booking_no]").val(res.booking_no);
                            $("input[name=place_of_receipt]").val(res.place_of_receipt);
                            $("input[name=place_of_delivery]").val(res.place_of_delivery);
                            $("input[name=voyage_no]").val(res.voyage_no);
                            $("input[name=mother_voyage]").val(res.mother_voyage);
                            $("input[name=mother_vessel_name]").val(res.mother_vessel_name);

                            if (res.salesman_code != null) {
                                var newSales = new Option(res
                                    .salesman_code, res
                                    .salesman_code, true, true);
                                $("select[name=salesman_code]").append(newSales).trigger('change');
                                $("input[name=salesman]").val(res.salesman);
                            } else {
                                $("select[name=salesman_code]").empty();
                                $("input[name=salesman]").val("");
                            }

                            if (res.delivery_type_code != null) {
                                var newDelType = new Option(res
                                    .delivery_type_code, res
                                    .delivery_type_code, true, true);
                                $("select[name=delivery_type_code]").append(newDelType).trigger(
                                    'change');
                                $("input[name=delivery_type]").val(res
                                    .delivery_type);
                            } else {
                                $("select[name=delivery_type_code]").empty();
                                $("input[name=delivery_type]").val("");
                            }

                            if (res.vessel_code != null) {
                                var newVessel = new Option(res
                                    .vessel_code, res
                                    .vessel_code, true, true);
                                $("select[name=vessel_code]").append(newVessel).trigger('change');
                                $("input[name=vessel_name]").val(res.vessel_name);
                            } else {
                                $("select[name=vessel_code]").empty();
                                $("input[name=vessel_name]").val("");
                            }

                            if (res.commodity_code != null) {
                                var newCommodity = new Option(res
                                    .commodity_code, res
                                    .commodity_code, true, true);
                                $("select[name=commodity_code], #cargo-select-1").append(newCommodity)
                                    .trigger('change');
                                $("input[name=commodity], #cargo-commodity-1").val(res
                                    .commodity);
                            } else {
                                $("select[name=commodity_code], #cargo-select-1").empty();
                                $("input[name=commodity], #cargo-commodity-1").val("");
                            }


                            if (res.origin_code != null) {
                                var newFrom = new Option(res.origin_code, res.origin_code, true, true);
                                $("select[name=origin_code]").append(newFrom).trigger('change');
                                $("input[name=origin_name]").val(res.origin_name);
                            } else {
                                $("select[name=origin_code]").empty();
                                $("input[name=origin_name]").val("");
                            }

                            if (res.dest_code != null) {
                                var newTo = new Option(res.dest_code, res.dest_code, true, true);
                                $("select[name=dest_code]").append(newTo).trigger('change');
                                $("input[name=dest_name]").val(res.dest_name);
                            } else {
                                $("select[name=dest_code]").empty();
                                $("input[name=dest_name]").val("");
                                $("input[name=country_code]").val("");
                                $("input[name=country_name]").val("");
                            }

                            if (res.port_loading_code != null) {
                                var newPortLoading = new Option(res.port_loading_code, res
                                    .port_loading_code,
                                    true, true);
                                $("select[name=port_loading_code]").append(newPortLoading).trigger(
                                    'change');
                                $("input[name=port_loading_name]").val(res.port_loading_name);
                            } else {
                                $("select[name=port_loading_code]").empty();
                                $("input[name=port_loading_name]").val("");
                            }

                            if (res.via_port_code != null) {
                                var newViaPort = new Option(res.via_port_code, res
                                    .via_port_code,
                                    true, true);
                                $("select[name=via_port_code]").append(newViaPort).trigger(
                                    'change');
                                $("input[name=via_port_name]").val(res.via_port_name);
                            } else {
                                $("select[name=via_port_code]").empty();
                                $("input[name=via_port_name]").val("");
                            }

                            if (res.port_discharge_code != null) {
                                var newPortDischar = new Option(res.port_discharge_code, res
                                    .port_discharge_code,
                                    true, true);
                                $("select[name=port_discharge_code]").append(newPortDischar).trigger(
                                    'change');
                                $("input[name=port_discharge_name]").val(res.port_discharge_name);
                            } else {
                                $("select[name=port_discharge_code]").empty();
                                $("input[name=port_discharge_name]").val("");
                            }

                            if (res.shipping_line_code != null) {
                                var newShippLine = new Option(res.shipping_line_code, res
                                    .shipping_line_code,
                                    true, true);
                                $("select[name=shippline_code]").append(newShippLine).trigger(
                                    'change');
                                $("input[name=shippline_name]").val(res.shipping_line_name);
                            } else {
                                $("select[name=shippline_code]").empty();
                                $("input[name=shippline_name]").val("");
                            }

                            if (res.principle_agent_code != null) {
                                var newPrincipleAgent = new Option(res.principle_agent_code, res
                                    .principle_agent_code,
                                    true, true);
                                $("select[name=principle_agent_code]").append(newPrincipleAgent)
                                    .trigger(
                                        'change');
                            } else {
                                $("select[name=principle_agent_code]").empty();
                            }

                            if (res.shippagent_code != null) {
                                var newShipAgent = new Option(res.shippagent_code, res
                                    .shippagent_code,
                                    true, true);
                                $("select[name=shippagent_code]").append(newShipAgent)
                                    .trigger(
                                        'change');
                            } else {
                                $("select[name=shippagent_code]").empty();
                            }

                            if (res.consignee_code != null) {
                                var newConsigneeCode = new Option(res.consignee_code, res
                                    .consignee_code, true, true);
                                $("select[name=consignee_code]").append(newConsigneeCode).trigger(
                                    'change');
                                $("input[name=consignee_name]").val(res.consignee_name);
                                $("input[name=consignee_address_1]").val(res.consignee_address_1);
                                $("input[name=consignee_address_2]").val(res.consignee_address_2);
                                $("input[name=consignee_address_3]").val(res.consignee_address_3);
                                $("input[name=consignee_address_4]").val(res.consignee_address_4);
                            } else {
                                $("select[name=consignee_code]").empty();
                                $("input[name=consignee_name]").val("");
                                $("input[name=consignee_address_1]").val("");
                                $("input[name=consignee_address_2]").val("");
                                $("input[name=consignee_address_3]").val("");
                                $("input[name=consignee_address_4]").val("");
                            }

                            if (res.shipper_code != null) {
                                var newShipperCode = new Option(res.shipper_code, res
                                    .shipper_code, true, true);
                                $("select[name=shipper_code]").append(newShipperCode).trigger(
                                    'change');
                                $("input[name=shipper_name]").val(res.shipper_name);
                                $("input[name=shipper_address_1]").val(res.shipper_address_1);
                                $("input[name=shipper_address_2]").val(res.shipper_address_2);
                                $("input[name=shipper_address_3]").val(res.shipper_address_3);
                                $("input[name=shipper_address_4]").val(res.shipper_address_4);
                            } else {
                                $("select[name=shipper_code]").empty();
                                $("input[name=shipper_name]").val("");
                                $("input[name=shipper_address_1]").val("");
                                $("input[name=shipper_address_2]").val("");
                                $("input[name=shipper_address_3]").val("");
                                $("input[name=shipper_address_4]").val("");
                            }

                            if (res.notify_code != null) {
                                var newNotifyCode = new Option(res.notify_code, res
                                    .notify_code, true, true);
                                $("select[name=notify_code]").append(newNotifyCode).trigger(
                                    'change');
                                $("input[name=notify_name]").val(res.notify_name);
                                $("input[name=notify_address_1]").val(res.notify_address_1);
                                $("input[name=notify_address_2]").val(res.notify_address_2);
                                $("input[name=notify_address_3]").val(res.notify_address_3);
                                $("input[name=notify_address_4]").val(res.notify_address_4);
                            } else {
                                $("select[name=notify_code]").empty();
                                $("input[name=notify_name]").val("");
                                $("input[name=notify_address_1]").val("");
                                $("input[name=notify_address_2]").val("");
                                $("input[name=notify_address_3]").val("");
                                $("input[name=notify_address_4]").val("");
                            }

                            if (res.yard_code != null) {
                                var newYardCode = new Option(res.yard_code, res
                                    .yard_code, true, true);
                                $("select[name=yard_code]").append(newYardCode).trigger(
                                    'change');
                                $("input[name=yard_name]").val(res.yard_name);
                                $("input[name=yard_address_1]").val(res.yard_address_1);
                                $("input[name=yard_address_2]").val(res.yard_address_2);
                                $("input[name=yard_address_3]").val(res.yard_address_3);
                                $("input[name=yard_address_4]").val(res.yard_address_4);
                            } else {
                                $("select[name=yard_code]").empty();
                                $("input[name=yard_name]").val("");
                                $("input[name=yard_address_1]").val("");
                                $("input[name=yard_address_2]").val("");
                                $("input[name=yard_address_3]").val("");
                                $("input[name=yard_address_4]").val("");
                            }

                            if (res.depot_code != null) {
                                var newDepotCode = new Option(res.depot_code, res
                                    .depot_code, true, true);
                                $("select[name=depot_code]").append(newDepotCode).trigger(
                                    'change');
                                $("input[name=depot_name]").val(res.depot_name);
                                $("input[name=depot_address_1]").val(res.depot_address_1);
                                $("input[name=depot_address_2]").val(res.depot_address_2);
                                $("input[name=depot_address_3]").val(res.depot_address_3);
                                $("input[name=depot_address_4]").val(res.depot_address_4);
                            } else {
                                $("select[name=depot_code]").empty();
                                $("input[name=depot_name]").val("");
                                $("input[name=depot_address_1]").val("");
                                $("input[name=depot_address_2]").val("");
                                $("input[name=depot_address_3]").val("");
                                $("input[name=depot_address_4]").val("");
                            }

                            if (res.stuff_agent_code != null) {
                                var newStuffAgentCode = new Option(res.stuff_agent_code, res
                                    .stuff_agent_code, true, true);
                                $("select[name=stuff_agent_code]").append(newStuffAgentCode).trigger(
                                    'change');
                                $("input[name=stuff_agent_name]").val(res.stuff_agent_name);
                                $("input[name=stuff_agent_address_1]").val(res.stuff_agent_address_1);
                                $("input[name=stuff_agent_address_2]").val(res.stuff_agent_address_2);
                                $("input[name=stuff_agent_address_3]").val(res.stuff_agent_address_3);
                                $("input[name=stuff_agent_address_4]").val(res.stuff_agent_address_4);
                            } else {
                                $("select[name=stuff_agent_code]").empty();
                                $("input[name=stuff_agent_name]").val("");
                                $("input[name=stuff_agent_address_1]").val("");
                                $("input[name=stuff_agent_address_2]").val("");
                                $("input[name=stuff_agent_address_3]").val("");
                                $("input[name=stuff_agent_address_4]").val("");
                            }

                            $.ajax({
                                type: "post",
                                url: '{{ route('get.ci') }}',
                                data: {
                                    id: id
                                },
                                dataType: "json",
                                success: function(response) {
                                    // console.log(response.length);
                                    let cloneCi;
                                    if (response.length > 0) {
                                        $(`.wrapper-row-list-fch`).html("");
                                        for (let i = 0; i < response.length; i++) {
                                            cloneCi = `<div class="row row-list-fch">
                                                            <div class="col-md-2">
                                                                <div class="row-number">
                                                                    <div>
                                                                        <small>
                                                                            Cargo Item No.
                                                                        </small>
                                                                    </div>

                                                                    <span class='num'> ${i+1} </span>
                                                                </div>
                                                                <div class="row my-3">
                                                                    <div class="col-md-6">
                                                                        <a href="javascript:void(0)" class="btn btn-primary add-btn-fch" id="add-btn-fch-${i+1}" title="Add row"
                                                                            onclick="add_row_ci(this.id)">
                                                                            <i class="fa fa-plus"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <a href="javascript:void(0)" class="btn btn-danger" title="Delete row"
                                                                            onclick="delete_row_ci(this)">
                                                                            <i class="fa fa-minus"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="container_no">Container No.</label>
                                                                    <input type="text" class="form-control" name="container_no[]" id="container_no" value="${response[i].container_no != null ? response[i].container_no : ''}">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pcs">Pcs</label>
                                                                    <input type="text" class="form-control " name="pcs[]" id="pcs-${i+1}" value="${response[i].pcs != null ? response[i].pcs : ''}">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="gross_weight">Gross Weight</label>
                                                                    <input type="text" data-type='currency4' autocomplete="off" title="Gross Weight"
                                                                        placeholder="Gross Weight" class="form-control " name="gross_weight[]" value="${response[i].gross_weight != null ? numberFormatte4(parseFloat(response[i].gross_weight)) : ''}" id="gross-weight-${i+1}">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="cargo_commodity_code">Commodity </label>
                                                                            <select class="cargo-select" name="cargo_commodity_code[]" id="cargo-select-${i+1}">
                                                                                <option value="${response[i].cargo_commodity_code != null ? response[i].cargo_commodity_code : ''}">${response[i].cargo_commodity_code != null ? response[i].cargo_commodity_code : ''}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="cargo_commodity"> </label>
                                                                            <input type="text" readonly class="form-control cargo-commodity" value="${response[i].cargo_commodity != null ? response[i].cargo_commodity : ''}" name="cargo_commodity[]"
                                                                                id="cargo-commodity-${i+1}">

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="seal_no">Seal No.</label>
                                                                    <input type="text" class="form-control " name="seal_no[]" id="seal_no" value="${response[i].seal_no != null ? response[i].seal_no : ''}">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="cargo_container_code">Container Type </label>
                                                                            <select class="cont-type-select " name="cargo_container_code[]" id="cont-type-select-${i+1}">
                                                                                <option value="${response[i].cargo_container_code != null ? response[i].cargo_container_code : ''}">${response[i].cargo_container_code != null ? response[i].cargo_container_code : ''}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="cargo_container"> </label>
                                                                            <input type="text" readonly class="form-control cargo-container" name="cargo_container[]" 
                                                                                value="${response[i].cargo_container != null ? response[i].cargo_container : ''}"
                                                                                id="cargo-container-${i+1}">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cargo_volume">Volume</label>
                                                                    <input type="text" data-type='currency4' autocomplete="off" title="Volume" placeholder="Volume"
                                                                        class="form-control " name="cargo_volume[]" id="cargo-volume-${i+1}" value="${response[i].cargo_volume != null ? numberFormatte4(parseFloat(response[i].cargo_volume)) : ''}">

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="cargo_uom_code">Uom </label>
                                                                            <select class="cargo-uom-select" name="cargo_uom_code[]" id="cargo-uom-select-${i+1}">
                                                                                <option value="${response[i].cargo_uom_code != null ? response[i].cargo_uom_code : ''}">${response[i].cargo_uom_code != null ? response[i].cargo_uom_code : ''}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="cargo_uom"> </label>
                                                                            <input type="text" readonly class="form-control cargo-uom" name="cargo_uom[]"
                                                                                value="${response[i].cargo_uom != null ? response[i].cargo_uom : ''}"
                                                                                id="cargo-uom-${i+1}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="marks_1">Marks</label>
                                                                    <input type="text" class="form-control " placeholder="Marks No 01" value="${response[i].marks_1 != null ? response[i].marks_1 : ''}" name="marks_1[]"
                                                                        id="marks_1">

                                                                    <input type="text" class="form-control  my-2" placeholder="Marks No 02" value="${response[i].marks_2 != null ? response[i].marks_2 : ''}" name="marks_2[]"
                                                                        id="marks_2">

                                                                    <input type="text" class="form-control my-2" placeholder="Marks No 03" value="${response[i].marks_3 != null ? response[i].marks_3 : ''}" name="marks_3[]"
                                                                        id="marks_3">

                                                                    <input type="text" class="form-control  my-2" placeholder="Marks No 04" value="${response[i].marks_4 != null ? response[i].marks_4 : ''}" name="marks_4[]"
                                                                        id="marks_4">

                                                                    <input type="text" class="form-control  my-2" placeholder="Marks No 05" value="${response[i].marks_5 != null ? response[i].marks_5 : ''}" name="marks_5[]"
                                                                        id="marks_5">

                                                                    <input type="text" class="form-control  my-2" placeholder="Marks No 06" value="${response[i].marks_6 != null ? response[i].marks_6 : ''}" name="marks_6[]"
                                                                        id="marks_6">

                                                                    <input type="text" class="form-control  my-2" placeholder="Marks No 07" value="${response[i].marks_7 != null ? response[i].marks_7 : ''}" name="marks_7[]"
                                                                        id="marks_7">

                                                                    <input type="text" class="form-control my-2" placeholder="Marks No 08" value="${response[i].marks_8 != null ? response[i].marks_8 : ''}" name="marks_8[]"
                                                                        id="marks_8">
                                                                </div>

                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="good_desc_1">Descriptions</label>
                                                                    <input type="text" placeholder="Description 01" class="form-control " value="${response[i].good_desc_1 != null ? response[i].good_desc_1 : ''}" name="good_desc_1[]"
                                                                        id="good_desc_1">

                                                                    <input type="text" placeholder="Description 02" class="form-control  my-2" value="${response[i].good_desc_2 != null ? response[i].good_desc_2 : ''}" name="good_desc_2[]"
                                                                        id="good_desc_2">

                                                                    <input type="text" placeholder="Description 03" class="form-control  my-2" value="${response[i].good_desc_3 != null ? response[i].good_desc_3 : ''}" name="good_desc_3[]"
                                                                        id="good_desc_3">

                                                                    <input type="text" placeholder="Description 04" class="form-control  my-2" value="${response[i].good_desc_4 != null ? response[i].good_desc_4 : ''}" name="good_desc_4[]"
                                                                        id="good_desc_4">

                                                                    <input type="text" placeholder="Description 05" class="form-control  my-2" value="${response[i].good_desc_5 != null ? response[i].good_desc_5 : ''}" name="good_desc_5[]"
                                                                        id="good_desc_5">

                                                                    <input type="text" placeholder="Description 06" class="form-control  my-2" value="${response[i].good_desc_6 != null ? response[i].good_desc_6 : ''}" name="good_desc_6[]"
                                                                        id="good_desc_6">

                                                                    <input type="text" placeholder="Description 07" class="form-control  my-2" value="${response[i].good_desc_7 != null ? response[i].good_desc_7 : ''}" name="good_desc_7[]"
                                                                        id="good_desc_7">

                                                                    <input type="text" placeholder="Description 08" class="form-control  my-2" value="${response[i].good_desc_8 != null ? response[i].good_desc_8 : ''}" name="good_desc_8[]"
                                                                        id="good_desc_8">
                                                                </div>


                                                            </div>
                                                            </div>`;

                                            $(`.wrapper-row-list-fch`).append(
                                                cloneCi);
                                            evtCommodity(`#cargo-select-${i+1}`,
                                                `#cargo-commodity-${i+1}`);
                                            evtContainerType(`#cont-type-select-${i+1}`,
                                                `#cargo-container-${i+1}`);
                                            evtUom(`#cargo-uom-select-${i+1}`,
                                                `#cargo-uom-${i+1}`);
                                            $("input[data-type='currency4']").on({
                                                keyup: function() {
                                                    formatCurrency4($(this));
                                                },
                                                blur: function() {
                                                    formatCurrency4($(this),
                                                        "blur");
                                                }
                                            });
                                        }
                                    }
                                }
                            });

                        }
                    });

                }
            });

            return table;
        }

        function dataTableCustomer(idTable) {
            var table = $(idTable).DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                ajax: {
                    url: '{{ route('get.table.cus_ex_job') }}',
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
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'booking_no',
                        name: 'booking_no'
                    },
                    {
                        data: 'port_loading_name',
                        name: 'port_loading_name'
                    },
                    {
                        data: 'port_discharge_name',
                        name: 'port_discharge_name'
                    },
                    {
                        data: 'origin_name',
                        name: 'origin_name'
                    },

                    {
                        data: 'dest_name',
                        name: 'dest_name'
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

                    let id = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked').data(
                        'id');

                    $.ajax({
                        type: "POST",
                        url: '{{ route('search.cus_ex_job') }}',
                        data: {
                            code: code,
                        },
                        dataType: "json",
                        success: function(res) {
                            $(`#modal-cus`).modal('hide');
                            $("input[name=customer_code]").val(res.code);
                            $("input[name=customer]").val(res.name);
                            var etd = new Date(res.etd_date != null ? res.etd_date : res.etd);
                            $("input[name=etd]").val(etd.toString("dd/MM/yyyy"));
                            var eta_sub = new Date(res.eta_sub);
                            $("input[name=eta_sub]").val(res.eta_sub != null ? eta_sub.toString(
                                "yyyy/MM/dd HH:mm") : '');
                            var close_date_time = new Date(res.close_date_time);
                            $("input[name=close_date_time]").val(res.close_date_time != null ?
                                close_date_time.toString(
                                    "yyyy/MM/dd HH:mm") : '');
                            var first_via_ata = new Date(res.first_via_ata);
                            $("input[name=first_via_ata]").val(res.first_via_ata != null ?
                                first_via_ata
                                .toString("dd/MM/yyyy") : '');
                            var first_via_eta = new Date(res.first_via_eta);
                            $("input[name=first_via_eta]").val(res.first_via_eta != null ?
                                first_via_eta
                                .toString("dd/MM/yyyy") : '');
                            var first_via_etd = new Date(res.first_via_etd);
                            $("input[name=first_via_etd]").val(res.first_via_etd != null ?
                                first_via_etd
                                .toString("dd/MM/yyyy") : '');
                            var eta = new Date(res.eta);
                            $("input[name=eta]").val(res.eta != null ? eta.toString("dd/MM/yyyy") :
                                '');
                            var dest_eta_date = new Date(res.dest_eta_date);
                            $("input[name=dest_eta_date]").val(res.dest_eta_date != null ?
                                dest_eta_date
                                .toString("dd/MM/yyyy") : '');
                            $("input[name=booking_no]").val(res.booking_no);
                            $("input[name=place_of_receipt]").val(res.place_of_receipt);
                            $("input[name=place_of_delivery]").val(res.place_of_delivery);
                            $("input[name=voyage_no]").val(res.voyage_no);
                            $("input[name=mother_voyage]").val(res.mother_voyage);
                            $("input[name=mother_vessel_name]").val(res.mother_vessel_name);

                            if (res.salesman_code != null) {
                                var newSales = new Option(res
                                    .salesman_code, res
                                    .salesman_code, true, true);
                                $("select[name=salesman_code]").append(newSales).trigger('change');
                                $("input[name=salesman]").val(res.salesman);
                            } else {
                                $("select[name=salesman_code]").empty();
                                $("input[name=salesman]").val("");
                            }

                            if (res.delivery_type_code != null) {
                                var newDelType = new Option(res
                                    .delivery_type_code, res
                                    .delivery_type_code, true, true);
                                $("select[name=delivery_type_code]").append(newDelType).trigger(
                                    'change');
                                $("input[name=delivery_type]").val(res
                                    .delivery_type);
                            } else {
                                $("select[name=delivery_type_code]").empty();
                                $("input[name=delivery_type]").val("");
                            }

                            if (res.vessel_code != null) {
                                var newVessel = new Option(res
                                    .vessel_code, res
                                    .vessel_code, true, true);
                                $("select[name=vessel_code]").append(newVessel).trigger('change');
                                $("input[name=vessel_name]").val(res.vessel_name);
                            } else {
                                $("select[name=vessel_code]").empty();
                                $("input[name=vessel_name]").val("");
                            }

                            if (res.commodity_code != null) {
                                var newCommodity = new Option(res
                                    .commodity_code, res
                                    .commodity_code, true, true);
                                $("select[name=commodity_code], #cargo-select-1").append(
                                        newCommodity)
                                    .trigger('change');
                                $("input[name=commodity], #cargo-commodity-1").val(res
                                    .commodity);
                            } else {
                                $("select[name=commodity_code], #cargo-select-1").empty();
                                $("input[name=commodity], #cargo-commodity-1").val("");
                            }


                            if (res.origin_code != null) {
                                var newFrom = new Option(res.origin_code, res.origin_code, true,
                                    true);
                                $("select[name=origin_code]").append(newFrom).trigger('change');
                                $("input[name=origin_name]").val(res.origin_name);
                            } else {
                                $("select[name=origin_code]").empty();
                                $("input[name=origin_name]").val("");
                            }

                            if (res.dest_code != null) {
                                var newTo = new Option(res.dest_code, res.dest_code, true, true);
                                $("select[name=dest_code]").append(newTo).trigger('change');
                                $("input[name=dest_name]").val(res.dest_name);
                            } else {
                                $("select[name=dest_code]").empty();
                                $("input[name=dest_name]").val("");
                                $("input[name=country_code]").val("");
                                $("input[name=country_name]").val("");
                            }

                            if (res.port_loading_code != null) {
                                var newPortLoading = new Option(res.port_loading_code, res
                                    .port_loading_code,
                                    true, true);
                                $("select[name=port_loading_code]").append(newPortLoading).trigger(
                                    'change');
                                $("input[name=port_loading_name]").val(res.port_loading_name);
                            } else {
                                $("select[name=port_loading_code]").empty();
                                $("input[name=port_loading_name]").val("");
                            }

                            if (res.via_port_code != null) {
                                var newViaPort = new Option(res.via_port_code, res
                                    .via_port_code,
                                    true, true);
                                $("select[name=via_port_code]").append(newViaPort).trigger(
                                    'change');
                                $("input[name=via_port_name]").val(res.via_port_name);
                            } else {
                                $("select[name=via_port_code]").empty();
                                $("input[name=via_port_name]").val("");
                            }

                            if (res.port_discharge_code != null) {
                                var newPortDischar = new Option(res.port_discharge_code, res
                                    .port_discharge_code,
                                    true, true);
                                $("select[name=port_discharge_code]").append(newPortDischar)
                                    .trigger(
                                        'change');
                                $("input[name=port_discharge_name]").val(res.port_discharge_name);
                            } else {
                                $("select[name=port_discharge_code]").empty();
                                $("input[name=port_discharge_name]").val("");
                            }

                            if (res.shipping_line_code != null) {
                                var newShippLine = new Option(res.shipping_line_code, res
                                    .shipping_line_code,
                                    true, true);
                                $("select[name=shippline_code]").append(newShippLine).trigger(
                                    'change');
                                $("input[name=shippline_name]").val(res.shipping_line_name);
                            } else {
                                $("select[name=shippline_code]").empty();
                                $("input[name=shippline_name]").val("");
                            }

                            if (res.principle_agent_code != null) {
                                var newPrincipleAgent = new Option(res.principle_agent_code, res
                                    .principle_agent_code,
                                    true, true);
                                $("select[name=principle_agent_code]").append(newPrincipleAgent)
                                    .trigger(
                                        'change');
                            } else {
                                $("select[name=principle_agent_code]").empty();
                            }

                            if (res.shippagent_code != null) {
                                var newShipAgent = new Option(res.shippagent_code, res
                                    .shippagent_code,
                                    true, true);
                                $("select[name=shippagent_code]").append(newShipAgent)
                                    .trigger(
                                        'change');
                            } else {
                                $("select[name=shippagent_code]").empty();
                            }

                            if (res.consignee_code != null) {
                                var newConsigneeCode = new Option(res.consignee_code, res
                                    .consignee_code, true, true);
                                $("select[name=consignee_code]").append(newConsigneeCode).trigger(
                                    'change');
                                $("input[name=consignee_name]").val(res.consignee_name);
                                $("input[name=consignee_address_1]").val(res.consignee_address_1);
                                $("input[name=consignee_address_2]").val(res.consignee_address_2);
                                $("input[name=consignee_address_3]").val(res.consignee_address_3);
                                $("input[name=consignee_address_4]").val(res.consignee_address_4);
                            } else {
                                $("select[name=consignee_code]").empty();
                                $("input[name=consignee_name]").val("");
                                $("input[name=consignee_address_1]").val("");
                                $("input[name=consignee_address_2]").val("");
                                $("input[name=consignee_address_3]").val("");
                                $("input[name=consignee_address_4]").val("");
                            }

                            if (res.shipper_code != null) {
                                var newShipperCode = new Option(res.shipper_code, res
                                    .shipper_code, true, true);
                                $("select[name=shipper_code]").append(newShipperCode).trigger(
                                    'change');
                                $("input[name=shipper_name]").val(res.shipper_name);
                                $("input[name=shipper_address_1]").val(res.shipper_address_1);
                                $("input[name=shipper_address_2]").val(res.shipper_address_2);
                                $("input[name=shipper_address_3]").val(res.shipper_address_3);
                                $("input[name=shipper_address_4]").val(res.shipper_address_4);
                            } else {
                                $("select[name=shipper_code]").empty();
                                $("input[name=shipper_name]").val("");
                                $("input[name=shipper_address_1]").val("");
                                $("input[name=shipper_address_2]").val("");
                                $("input[name=shipper_address_3]").val("");
                                $("input[name=shipper_address_4]").val("");
                            }

                            if (res.notify_code != null) {
                                var newNotifyCode = new Option(res.notify_code, res
                                    .notify_code, true, true);
                                $("select[name=notify_code]").append(newNotifyCode).trigger(
                                    'change');
                                $("input[name=notify_name]").val(res.notify_name);
                                $("input[name=notify_address_1]").val(res.notify_address_1);
                                $("input[name=notify_address_2]").val(res.notify_address_2);
                                $("input[name=notify_address_3]").val(res.notify_address_3);
                                $("input[name=notify_address_4]").val(res.notify_address_4);
                            } else {
                                $("select[name=notify_code]").empty();
                                $("input[name=notify_name]").val("");
                                $("input[name=notify_address_1]").val("");
                                $("input[name=notify_address_2]").val("");
                                $("input[name=notify_address_3]").val("");
                                $("input[name=notify_address_4]").val("");
                            }

                            if (res.yard_code != null) {
                                var newYardCode = new Option(res.yard_code, res
                                    .yard_code, true, true);
                                $("select[name=yard_code]").append(newYardCode).trigger(
                                    'change');
                                $("input[name=yard_name]").val(res.yard_name);
                                $("input[name=yard_address_1]").val(res.yard_address_1);
                                $("input[name=yard_address_2]").val(res.yard_address_2);
                                $("input[name=yard_address_3]").val(res.yard_address_3);
                                $("input[name=yard_address_4]").val(res.yard_address_4);
                            } else {
                                $("select[name=yard_code]").empty();
                                $("input[name=yard_name]").val("");
                                $("input[name=yard_address_1]").val("");
                                $("input[name=yard_address_2]").val("");
                                $("input[name=yard_address_3]").val("");
                                $("input[name=yard_address_4]").val("");
                            }

                            if (res.depot_code != null) {
                                var newDepotCode = new Option(res.depot_code, res
                                    .depot_code, true, true);
                                $("select[name=depot_code]").append(newDepotCode).trigger(
                                    'change');
                                $("input[name=depot_name]").val(res.depot_name);
                                $("input[name=depot_address_1]").val(res.depot_address_1);
                                $("input[name=depot_address_2]").val(res.depot_address_2);
                                $("input[name=depot_address_3]").val(res.depot_address_3);
                                $("input[name=depot_address_4]").val(res.depot_address_4);
                            } else {
                                $("select[name=depot_code]").empty();
                                $("input[name=depot_name]").val("");
                                $("input[name=depot_address_1]").val("");
                                $("input[name=depot_address_2]").val("");
                                $("input[name=depot_address_3]").val("");
                                $("input[name=depot_address_4]").val("");
                            }

                            if (res.stuff_agent_code != null) {
                                var newStuffAgentCode = new Option(res.stuff_agent_code, res
                                    .stuff_agent_code, true, true);
                                $("select[name=stuff_agent_code]").append(newStuffAgentCode)
                                    .trigger(
                                        'change');
                                $("input[name=stuff_agent_name]").val(res.stuff_agent_name);
                                $("input[name=stuff_agent_address_1]").val(res
                                    .stuff_agent_address_1);
                                $("input[name=stuff_agent_address_2]").val(res
                                    .stuff_agent_address_2);
                                $("input[name=stuff_agent_address_3]").val(res
                                    .stuff_agent_address_3);
                                $("input[name=stuff_agent_address_4]").val(res
                                    .stuff_agent_address_4);
                            } else {
                                $("select[name=stuff_agent_code]").empty();
                                $("input[name=stuff_agent_name]").val("");
                                $("input[name=stuff_agent_address_1]").val("");
                                $("input[name=stuff_agent_address_2]").val("");
                                $("input[name=stuff_agent_address_3]").val("");
                                $("input[name=stuff_agent_address_4]").val("");
                            }

                            $.ajax({
                                type: "post",
                                url: '{{ route('get.ci') }}',
                                data: {
                                    id: id
                                },
                                dataType: "json",
                                success: function(response) {
                                    // console.log(response.length);
                                    let cloneCi;
                                    if (response.length > 0) {
                                        $(`.wrapper-row-list-fch`).html("");
                                        for (let i = 0; i < response.length; i++) {
                                            cloneCi = `<div class="row row-list-fch">
                                                            <div class="col-md-2">
                                                                <div class="row-number">
                                                                    <div>
                                                                        <small>
                                                                            Cargo Item No.
                                                                        </small>
                                                                    </div>

                                                                    <span class='num'> ${i+1} </span>
                                                                </div>
                                                                <div class="row my-3">
                                                                    <div class="col-md-6">
                                                                        <a href="javascript:void(0)" class="btn btn-primary add-btn-fch" id="add-btn-fch-${i+1}" title="Add row"
                                                                            onclick="add_row_ci(this.id)">
                                                                            <i class="fa fa-plus"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <a href="javascript:void(0)" class="btn btn-danger" title="Delete row"
                                                                            onclick="delete_row_ci(this)">
                                                                            <i class="fa fa-minus"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="container_no">Container No.</label>
                                                                    <input type="text" class="form-control" name="container_no[]" id="container_no" value="${response[i].container_no != null ? response[i].container_no : ''}">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pcs">Pcs</label>
                                                                    <input type="text" class="form-control " name="pcs[]" id="pcs-${i+1}" value="${response[i].pcs != null ? response[i].pcs : ''}">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="gross_weight">Gross Weight</label>
                                                                    <input type="text" data-type='currency4' autocomplete="off" title="Gross Weight"
                                                                        placeholder="Gross Weight" class="form-control " name="gross_weight[]" value="${response[i].gross_weight != null ? numberFormatte4(parseFloat(response[i].gross_weight)) : ''}" id="gross-weight-${i+1}">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="cargo_commodity_code">Commodity </label>
                                                                            <select class="cargo-select" name="cargo_commodity_code[]" id="cargo-select-${i+1}">
                                                                                <option value="${response[i].cargo_commodity_code != null ? response[i].cargo_commodity_code : ''}">${response[i].cargo_commodity_code != null ? response[i].cargo_commodity_code : ''}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="cargo_commodity"> </label>
                                                                            <input type="text" readonly class="form-control cargo-commodity" value="${response[i].cargo_commodity != null ? response[i].cargo_commodity : ''}" name="cargo_commodity[]"
                                                                                id="cargo-commodity-${i+1}">

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="seal_no">Seal No.</label>
                                                                    <input type="text" class="form-control " name="seal_no[]" id="seal_no" value="${response[i].seal_no != null ? response[i].seal_no : ''}">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="cargo_container_code">Container Type </label>
                                                                            <select class="cont-type-select " name="cargo_container_code[]" id="cont-type-select-${i+1}">
                                                                                <option value="${response[i].cargo_container_code != null ? response[i].cargo_container_code : ''}">${response[i].cargo_container_code != null ? response[i].cargo_container_code : ''}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="cargo_container"> </label>
                                                                            <input type="text" readonly class="form-control cargo-container" name="cargo_container[]" 
                                                                                value="${response[i].cargo_container != null ? response[i].cargo_container : ''}"
                                                                                id="cargo-container-${i+1}">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cargo_volume">Volume</label>
                                                                    <input type="text" data-type='currency4' autocomplete="off" title="Volume" placeholder="Volume"
                                                                        class="form-control " name="cargo_volume[]" id="cargo-volume-${i+1}" value="${response[i].cargo_volume != null ? numberFormatte4(parseFloat(response[i].cargo_volume)) : ''}">

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="cargo_uom_code">Uom </label>
                                                                            <select class="cargo-uom-select" name="cargo_uom_code[]" id="cargo-uom-select-${i+1}">
                                                                                <option value="${response[i].cargo_uom_code != null ? response[i].cargo_uom_code : ''}">${response[i].cargo_uom_code != null ? response[i].cargo_uom_code : ''}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="cargo_uom"> </label>
                                                                            <input type="text" readonly class="form-control cargo-uom" name="cargo_uom[]"
                                                                                value="${response[i].cargo_uom != null ? response[i].cargo_uom : ''}"
                                                                                id="cargo-uom-${i+1}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="marks_1">Marks</label>
                                                                    <input type="text" class="form-control " placeholder="Marks No 01" value="${response[i].marks_1 != null ? response[i].marks_1 : ''}" name="marks_1[]"
                                                                        id="marks_1">

                                                                    <input type="text" class="form-control  my-2" placeholder="Marks No 02" value="${response[i].marks_2 != null ? response[i].marks_2 : ''}" name="marks_2[]"
                                                                        id="marks_2">

                                                                    <input type="text" class="form-control my-2" placeholder="Marks No 03" value="${response[i].marks_3 != null ? response[i].marks_3 : ''}" name="marks_3[]"
                                                                        id="marks_3">

                                                                    <input type="text" class="form-control  my-2" placeholder="Marks No 04" value="${response[i].marks_4 != null ? response[i].marks_4 : ''}" name="marks_4[]"
                                                                        id="marks_4">

                                                                    <input type="text" class="form-control  my-2" placeholder="Marks No 05" value="${response[i].marks_5 != null ? response[i].marks_5 : ''}" name="marks_5[]"
                                                                        id="marks_5">

                                                                    <input type="text" class="form-control  my-2" placeholder="Marks No 06" value="${response[i].marks_6 != null ? response[i].marks_6 : ''}" name="marks_6[]"
                                                                        id="marks_6">

                                                                    <input type="text" class="form-control  my-2" placeholder="Marks No 07" value="${response[i].marks_7 != null ? response[i].marks_7 : ''}" name="marks_7[]"
                                                                        id="marks_7">

                                                                    <input type="text" class="form-control my-2" placeholder="Marks No 08" value="${response[i].marks_8 != null ? response[i].marks_8 : ''}" name="marks_8[]"
                                                                        id="marks_8">
                                                                </div>

                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="good_desc_1">Descriptions</label>
                                                                    <input type="text" placeholder="Description 01" class="form-control " value="${response[i].good_desc_1 != null ? response[i].good_desc_1 : ''}" name="good_desc_1[]"
                                                                        id="good_desc_1">

                                                                    <input type="text" placeholder="Description 02" class="form-control  my-2" value="${response[i].good_desc_2 != null ? response[i].good_desc_2 : ''}" name="good_desc_2[]"
                                                                        id="good_desc_2">

                                                                    <input type="text" placeholder="Description 03" class="form-control  my-2" value="${response[i].good_desc_3 != null ? response[i].good_desc_3 : ''}" name="good_desc_3[]"
                                                                        id="good_desc_3">

                                                                    <input type="text" placeholder="Description 04" class="form-control  my-2" value="${response[i].good_desc_4 != null ? response[i].good_desc_4 : ''}" name="good_desc_4[]"
                                                                        id="good_desc_4">

                                                                    <input type="text" placeholder="Description 05" class="form-control  my-2" value="${response[i].good_desc_5 != null ? response[i].good_desc_5 : ''}" name="good_desc_5[]"
                                                                        id="good_desc_5">
                                                                    
                                                                    <input type="text" placeholder="Description 06" class="form-control  my-2" value="${response[i].good_desc_6 != null ? response[i].good_desc_6 : ''}" name="good_desc_6[]"
                                                                        id="good_desc_6">

                                                                    <input type="text" placeholder="Description 07" class="form-control  my-2" value="${response[i].good_desc_7 != null ? response[i].good_desc_7 : ''}" name="good_desc_7[]"
                                                                        id="good_desc_7">

                                                                    <input type="text" placeholder="Description 08" class="form-control  my-2" value="${response[i].good_desc_8 != null ? response[i].good_desc_8 : ''}" name="good_desc_8[]"
                                                                        id="good_desc_8">
                                                                </div>


                                                            </div>
                                                            </div>`;

                                            $(`.wrapper-row-list-fch`).append(
                                                cloneCi);
                                            evtCommodity(`#cargo-select-${i+1}`,
                                                `#cargo-commodity-${i+1}`);
                                            evtContainerType(`#cont-type-select-${i+1}`,
                                                `#cargo-container-${i+1}`);
                                            evtUom(`#cargo-uom-select-${i+1}`,
                                                `#cargo-uom-${i+1}`);
                                            $("input[data-type='currency4']").on({
                                                keyup: function() {
                                                    formatCurrency4($(this));
                                                },
                                                blur: function() {
                                                    formatCurrency4($(this),
                                                        "blur");
                                                }
                                            });
                                        }
                                    }
                                }
                            });

                        }
                    });

                }
            });

            return table;
        }

        function numberFormatte4(num) {
            if (!isNaN(num)) {
                var wholeAndDecimal = String(num.toFixed(4)).split(".");
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
