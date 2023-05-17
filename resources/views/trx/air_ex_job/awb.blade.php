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
            <label for="awb_no">House AWB No <span style="color: red;">*</span></label>
            <input type="text" class="form-control @error('awb_no') is-invalid @enderror" placeholder="AWB No"
                value="{{ old('awb_no') }}" required name="awb_no" id="awb_no">
            @error('awb_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="smawb_no">SM AWB No </label>
            <input type="text" class="form-control @error('smawb_no') is-invalid @enderror" placeholder="SM AWB No"
                value="{{ old('smawb_no') }}" name="smawb_no" id="smawb_no">
            @error('smawb_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="mawb_no">M AWB No <span style="color: red;">*</span></label>
            <input type="text" class="form-control @error('mawb_no') is-invalid @enderror" placeholder="M AWB No"
                value="{{ old('mawb_no') }}" required name="mawb_no" id="mawb_no">
            @error('mawb_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-8">
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
            <div class="col-md-2">
                <div class="form-group">
                    <label for="booking_no">&nbsp;</label>
                    <a href="javascript:void(0)" class="btn btn-primary form-control btn-book">
                        <i class="fa fa-search"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="booking_no">&nbsp;</label>
                    <a href="javascript:void(0)" class="btn btn-danger form-control btn-delete-book">
                        <i class="fa fa-close"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="customer_code">Customer Code <span style="color: red;">*</span></label>
                    <input type="text" class="form-control @error('customer_code') is-invalid @enderror"
                        name="customer_code" value="{{ old('customer_code') }}" id="customer_code" required>
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
                            <input type="text" value="{{ old('shipper_address_1') }}"
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
                            <input type="text" value="{{ old('shipper_address_2') }}"
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
                            <input type="text" value="{{ old('shipper_address_3') }}"
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
                            <input type="text" value="{{ old('shipper_address_4') }}"
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

        <div class="row">
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
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="job_type">Job Type <span style="color: red;">*</span></label>
                    <select class="select-2 @error('job_type') is-invalid @enderror job-type" required
                        name="job_type">
                        @foreach ($job_type as $item)
                            <option value="{{ $item->type }}" @selected($item->type == 'AE')>{{ $item->type }}
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
            <label for="nomination_flag">Nomination Cargo</label>
            <div class="col-md-6">
                <input type="checkbox" name="nomination_flag" @checked(old('nomination_flag') == 'yes') value="yes"
                    data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                    data-offstyle="danger">
                @error('nomination_flag')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="delivery_agent_code">Overseas Agent</label>
                    <select class="delivery_agent-select @error('delivery_agent_code') is-invalid @enderror"
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
            <div class="col-md-8">
                <div class="form-group">
                    <label for="delivery_agent_name">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_agent_name') }}" placeholder="Delivery Agent Name"
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
                    <label for="agent_code">Agent Code</label>
                    <select class="agent-select @error('agent_code') is-invalid @enderror" name="agent_code">
                        <option value="{{ old('agent_code') }}">{{ old('agent_code') }}
                        </option>
                    </select>

                    @error('agent_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="agent_name">&nbsp;</label>
                    <input type="text" value="{{ old('agent_name') }}" readonly placeholder="Agent Name"
                        class="form-control @error('agent_name') is-invalid @enderror" name="agent_name"
                        id="agent_name">
                    @error('agent_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="agent_iata_code">Agent IATA Code</label>
            <input type="text" value="{{ old('agent_iata_code') }}" placeholder="Agent IATA Name"
                class="form-control @error('agent_iata_code') is-invalid @enderror" name="agent_iata_code"
                id="agent_iata_code">
            @error('agent_iata_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="reference_no">Customer Reference No.</label>
            <input type="text" class="form-control @error('reference_no') is-invalid @enderror"
                name="reference_no" value="{{ old('reference_no') }}" id="reference_no">
            @error('reference_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="agent_acc_no">Agent Account No.</label>
            <input type="text" value="{{ old('agent_acc_no') }}" placeholder="Agent Account No."
                class="form-control @error('agent_acc_no') is-invalid @enderror" name="agent_acc_no"
                id="agent_acc_no">
            @error('agent_acc_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="awb_prefix">Awb Prefix</label>
            <input type="text" class="form-control @error('awb_prefix') is-invalid @enderror" name="awb_prefix"
                value="{{ old('awb_prefix') }}" id="awb_prefix">
            @error('awb_prefix')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="shipper_acc_no">Shipper Account No.</label>
            <input type="text" value="{{ old('shipper_acc_no') }}" placeholder="Shipper Account No."
                class="form-control @error('shipper_acc_no') is-invalid @enderror" name="shipper_acc_no"
                id="shipper_acc_no">
            @error('shipper_acc_no')
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
        <div class="form-group">
            <label for="consignee_acc_no">Consignee Account No.</label>
            <input type="text" value="{{ old('consignee_acc_no') }}" placeholder="Consignee Account No."
                class="form-control @error('consignee_acc_no') is-invalid @enderror" name="consignee_acc_no"
                id="consignee_acc_no">
            @error('consignee_acc_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
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
                                <th class="select-filter">Airport of Departure</th>
                                <th class="select-filter">Airport of Destination</th>
                                <th class="select-filter">First Flight Date</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Search Air Export Booking</h5>
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
                                <th class="select-filter">First Flight Date</th>
                                <th class="select-filter">Customer</th>
                                <th class="select-filter">Airport of Departure</th>
                                <th class="select-filter">Airport of Destination</th>
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
            evtBisnisParty('.agent-select', 'Search agent', 'input[name=agent_name]');

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
                $("input[name=booking_no]").val('');
                $("select[name=consignee_code]").empty();
                $("input[name=consignee_name]").val("");
                $("select[name=air_dept_code]").append(new Option('JKT', 'JKT',
                    true, true)).trigger(
                    'change');
                $("input[name=air_dept_name]").val("JAKARTA SOEKARNO HATTA");
                $("select[name=air_dest_code]").empty();
                $("input[name=air_dest_name]").val("");
                // FLIGHT 1
                $("select[name=to_dest_code_1]").empty();
                $("select[name=by_airline_id_1]").empty();
                $("input[name=flight_no_1]").val('');
                $("input[name=flight_date_1]").val('');
                $("input[name=eta_date_1]").val('');
                // FLIGHT 2
                $("select[name=to_dest_code_2]").empty();
                $("select[name=by_airline_id_2]").empty();
                $("input[name=flight_no_2]").val('');
                $("input[name=flight_date_2]").val('');
                $("input[name=eta_date_2]").val('');
                // FLIGHT 3
                $("select[name=to_dest_code_3]").empty();
                $("select[name=by_airline_id_3]").empty();
                $("input[name=flight_no_3]").val('');
                $("input[name=flight_date_3]").val('');
                $("input[name=eta_date_3]").val('');
                // FLIGHT 4
                $("select[name=to_dest_code_4]").empty();
                $("select[name=by_airline_id_4]").empty();
                $("input[name=flight_no_4]").val('');
                $("input[name=flight_date_4]").val('');
                $("input[name=eta_date_4]").val('');
                $("select[name=agent_code]").empty();
                $("input[name=agent_name]").val("");
                $("select[name=delivery_type_code]").empty();
                $("input[name=delivery_type]").val("");
                $("select[name=delivery_agent_code]").empty();
                $("input[name=delivery_agent_name]").val("");
                $("select[name=notify_code]").empty();
                $("input[name=notify_name]").val("");
                $("input[name=notify_address_1]").val("");
                $("input[name=notify_address_2]").val("");
                $("input[name=notify_address_3]").val("");
                $("input[name=notify_address_4]").val("");

                $(`.tbody-conditionjc`).html("");
                cloneJc = `<tr class="dynamic-field" id="dynamic-field-1" onclick="click_tr(1)">
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
                                                    <div class="form-group">
                                                        <select name="code[]" id="code-select-1" class="code-select">
                                                            <option value="">Search</option>

                                                        </select>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control desc" name="description[]" id="desc-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-sales" name="qty_sales[]" id="qty-sales-1"
                                                            data-type='currency4' autocomplete="off" onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="uom_sales[]" id="uom-sales-1" class="uom-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="pc_sales[]" id="pc-sales-1" class="pc-sales">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="cust_code_sales[]" id="cust-code-sales-1" class="cust-code-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cust-name-sales" name="cust_name_sales[]"
                                                            id="cust-name-sales-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="vat_sales[]" id="vat-sales-1" class="vat-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="curr_sales[]" id="curr-sales-1" class="curr-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-sales" id="rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="rate_sales[]" 
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-sales" id="unit-rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_sales[]"
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-sales" readonly id="amt-sales-1"
                                                            autocomplete="off" data-type='currency' name="amt_sales[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control sales" readonly id="sales-1"
                                                            autocomplete="off" data-type='currency' name="sales[]" data-total_sales="1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-vendor" name="qty_vendor[]"
                                                            id="qty-vendor-1" data-type='currency4' autocomplete="off"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="pc_vendor[]" id="pc-vendor-1" class="pc-vendor">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="code_vendor[]" id="code-vendor-1" class="code-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control name-vendor" name="name_vendor[]"
                                                            id="name-vendor-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="vat_vendor[]" id="vat-vendor-1" class="vat-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="curr_vendor[]" id="curr-vendor-1" class="curr-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-vendor" id="rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-vendor" id="unit-rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-vendor" readonly id="amt-vendor-1"
                                                            autocomplete="off" data-type='currency' name="amt_vendor[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cost" readonly id="cost-1"
                                                            autocomplete="off" data-type='currency' name="cost[]" data-total_vendor="1">
                                                    </div>
                                                </td>

                                                </tr>`;
                $(`.tbody-conditionjc`).append(
                    cloneJc);
                evtNoData(
                    `#pc-sales-1, #pc-vendor-1`
                );
                evtItemCode(`#code-select-1`,
                    `#desc-1`);
                evtUomCode(`#uom-sales-1`);

                evtBisnisPartyNotComplete(
                    `#cust-code-sales-1`,
                    `#cust-name-sales-1`);
                evtBisnisPartyNotComplete(
                    `#code-vendor-1`,
                    `#name-vendor-1`);
                evtVatCode(
                    `#vat-sales-1, #vat-vendor-1`
                );
                evtCurrencyCode(`#curr-sales-1`,
                    null, true,
                    `#rate-sales-1`);
                evtCurrencyCode(`#curr-vendor-1`,
                    null, true,
                    `#rate-vendor-1`);

                $("input[data-type='currency']").on({
                    keyup: function() {
                        formatCurrency($(this));
                    },
                    blur: function() {
                        formatCurrency($(this),
                            "blur");
                    }
                });

                $("input[data-type='currency4']").on({
                    keyup: function() {
                        formatCurrency4($(
                            this));
                    },
                    blur: function() {
                        formatCurrency4($(this),
                            "blur");
                    }
                });
                $(`#total-sales-1`).val("");
                // UPDATE TOTAL ALL SALES
                total_all_sales = 0;

                $(`.tbody-condition`).html("");
                cloneDm = `
                                        <tr class="dynamic-fieldsi" id="dynamic-fieldsi-1">
                                            <td class="text-center">
                                                <button type="button" onclick="addNewFieldSi(this.id)" id="add-buttonsi-1"
                                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                                        class="fa fa-plus fa-fw"></i>
                                                </button>
                                                <button type="button" onclick="removeLastFieldSi(this)" id="remove-buttonsi-1"
                                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                                        class="fa fa-minus fa-fw"></i>
                                                </button>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="pcs_rcp[]" class="form-control pcs-rcp" data-pcs="1"
                                                        id="pcs-rcp-1" onkeyup="sumDimension(1, 1)">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control length" id="length-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="length[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control width" id="width-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="width[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control height" id="height-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="height[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="hidden" id="sum-m3-1" name="sum_m3[]" class="sum-m3"
                                                        data-m3="1">
                                                    <input type="hidden" id="sum-volwt-1" name="sum_volwt[]" class="sum-volwt"
                                                        data-volwt="1">
                                                    <input type="text" class="form-control dimension" id="dimension-1"
                                                        data-dimension="1" autocomplete="off" readonly data-type='currency1'
                                                        name="dimension[]">
                                                </div>
                                            </td>

                                        </tr>
                                    `;
                $(`.tbody-condition`).append(cloneDm);
                $("input[data-type='currency1']").on({
                    keyup: function() {
                        formatCurrency1($(this));
                    },
                    blur: function() {
                        formatCurrency1($(this), "blur");
                    }
                });
            });
        }

        function dataTableBooking(idTable) {
            let cloneJc, cloneDm;
            var table = $(idTable).DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                ajax: {
                    url: '{{ route('get.table.book_ex_job_air') }}',
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
                        data: 'booking_date',
                        name: 'booking_date'
                    },
                    {
                        data: 'flight_date_1',
                        name: 'flight_date_1'
                    },
                    {
                        data: 'customer',
                        name: 'customer'
                    },
                    {
                        data: 'air_dept_name',
                        name: 'air_dept_name'
                    },
                    {
                        data: 'air_dest_name',
                        name: 'air_dest_name'
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
                    let quotation_no = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked')
                        .data('quotation_no');

                    let cus_code = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked')
                        .data('cus_code');

                    $.ajax({
                        type: "post",
                        url: '{{ route('search.book_ex_job_air') }}',
                        data: {
                            booking_no: booking_no
                        },
                        dataType: "json",
                        success: function(res) {
                            // console.log(res);
                            $(`#modal-book`).modal('hide');
                            $("input[name=customer_code]").val(res.code_customer);
                            $("input[name=customer]").val(res.customer);
                            $("input[name=booking_no]").val(booking_no);

                            if (res.consignee_code != null) {
                                var newCons = new Option(res.consignee_code, res.consignee_code, true,
                                    true);
                                $("select[name=consignee_code]").append(newCons).trigger('change');
                                $("input[name=consignee_name]").val(res.consignee_name);
                            } else {
                                $("select[name=consignee_code]").empty();
                                $("input[name=consignee_name]").val("");
                            }

                            if (res.air_dept_code != null) {
                                var newAirDept = new Option(res
                                    .air_dept_code, res
                                    .air_dept_code, true, true);
                                $("select[name=air_dept_code]").append(newAirDept).trigger('change');
                                $("input[name=air_dept_name]").val(res.air_dept_name);
                            } else {
                                $("select[name=air_dept_code]").append(new Option('JKT', 'JKT',
                                    true, true)).trigger(
                                    'change');
                                $("input[name=air_dept_name]").val("JAKARTA SOEKARNO HATTA");
                            }

                            if (res.air_dest_code != null) {
                                var newAirDest = new Option(res
                                    .air_dest_code, res
                                    .air_dest_code, true, true);
                                $("select[name=air_dest_code]").append(newAirDest).trigger('change');
                                $("input[name=air_dest_name]").val(res.air_dest_name);
                            } else {
                                $("select[name=air_dest_code]").empty();
                                $("input[name=air_dest_name]").val("");
                            }

                            // FLIGHT 1
                            if (res.to_dest_code_1 != null) {
                                var newTo1 = new Option(res
                                    .to_dest_code_1, res
                                    .to_dest_code_1, true, true);
                                $("select[name=to_dest_code_1]").append(newTo1).trigger('change');
                            } else {
                                $("select[name=to_dest_code_1]").empty();
                            }
                            if (res.by_airline_id_1 != null) {
                                var newByAir1 = new Option(res
                                    .by_airline_id_1, res
                                    .by_airline_id_1, true, true);
                                $("select[name=by_airline_id_1]").append(newByAir1).trigger('change');
                            } else {
                                $("select[name=by_airline_id_1]").empty();
                            }
                            $("input[name=flight_no_1]").val(res.flight_no_1);
                            $("input[name=flight_date_1]").val(res.flight_date_1);
                            $("input[name=eta_date_1]").val(res.eta_date_1);

                            // FLIGHT 2
                            if (res.to_dest_code_2 != null) {
                                var newTo2 = new Option(res
                                    .to_dest_code_2, res
                                    .to_dest_code_2, true, true);
                                $("select[name=to_dest_code_2]").append(newTo2).trigger('change');
                            } else {
                                $("select[name=to_dest_code_2]").empty();
                            }
                            if (res.by_airline_id_2 != null) {
                                var newByAir2 = new Option(res
                                    .by_airline_id_2, res
                                    .by_airline_id_2, true, true);
                                $("select[name=by_airline_id_2]").append(newByAir2).trigger('change');
                            } else {
                                $("select[name=by_airline_id_2]").empty();
                            }
                            $("input[name=flight_no_2]").val(res.flight_no_2);
                            $("input[name=flight_date_2]").val(res.flight_date_2);
                            $("input[name=eta_date_2]").val(res.eta_date_2);

                            // FLIGHT 3
                            if (res.to_dest_code_3 != null) {
                                var newTo3 = new Option(res
                                    .to_dest_code_3, res
                                    .to_dest_code_3, true, true);
                                $("select[name=to_dest_code_3]").append(newTo3).trigger('change');
                            } else {
                                $("select[name=to_dest_code_3]").empty();
                            }
                            if (res.by_airline_id_3 != null) {
                                var newByAir3 = new Option(res
                                    .by_airline_id_3, res
                                    .by_airline_id_3, true, true);
                                $("select[name=by_airline_id_3]").append(newByAir3).trigger('change');
                            } else {
                                $("select[name=by_airline_id_3]").empty();
                            }
                            $("input[name=flight_no_3]").val(res.flight_no_3);
                            $("input[name=flight_date_3]").val(res.flight_date_3);
                            $("input[name=eta_date_3]").val(res.eta_date_3);

                            // FLIGHT 4
                            if (res.to_dest_code_4 != null) {
                                var newTo4 = new Option(res
                                    .to_dest_code_4, res
                                    .to_dest_code_4, true, true);
                                $("select[name=to_dest_code_4]").append(newTo4).trigger('change');
                            } else {
                                $("select[name=to_dest_code_4]").empty();
                            }
                            if (res.by_airline_id_4 != null) {
                                var newByAir4 = new Option(res
                                    .by_airline_id_4, res
                                    .by_airline_id_4, true, true);
                                $("select[name=by_airline_id_4]").append(newByAir4).trigger('change');
                            } else {
                                $("select[name=by_airline_id_4]").empty();
                            }
                            $("input[name=flight_no_4]").val(res.flight_no_4);
                            $("input[name=flight_date_4]").val(res.flight_date_4);
                            $("input[name=eta_date_4]").val(res.eta_date_4);

                            if (res.agent_code != null) {
                                var newAgent = new Option(res
                                    .agent_code, res
                                    .agent_code, true, true);
                                $("select[name=agent_code]").append(newAgent).trigger('change');
                                $("input[name=agent_name]").val(res.agent_name);
                            } else {
                                $("select[name=agent_code]").empty();
                                $("input[name=agent_name]").val("");
                            }

                            if (res.delivery_type_code != null) {
                                var newDelType = new Option(res
                                    .delivery_type_code, res
                                    .delivery_type_code, true, true);
                                $("select[name=delivery_type_code]").append(newDelType).trigger(
                                    'change');
                                $("input[name=delivery_type]").val(res.delivery_type_name);
                            } else {
                                $("select[name=delivery_type_code]").empty();
                                $("input[name=delivery_type]").val("");
                            }

                            if (res.overseas_agent_code != null) {
                                var newOver = new Option(res
                                    .overseas_agent_code, res
                                    .overseas_agent_code, true, true);
                                $("select[name=delivery_agent_code]").append(newOver).trigger('change');
                                $("input[name=delivery_agent_name]").val(res.overseas_agent_name);
                            } else {
                                $("select[name=delivery_agent_code]").empty();
                                $("input[name=delivery_agent_name]").val("");
                            }

                            if (res.notify_code != null) {
                                var newNotif = new Option(res
                                    .notify_code, res
                                    .notify_code, true, true);
                                $("select[name=notify_code]").append(newNotif).trigger('change');
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

                            //  LIST JOB COSTING
                            if (quotation_no != 0) {
                                $.ajax({
                                    type: "post",
                                    url: '{{ route('get.jc.from.quot_air') }}',
                                    data: {
                                        quotation_no: quotation_no
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                        let totalSales = 0;
                                        if (data.length > 0) {
                                            $(`.tbody-conditionjc`).html("");
                                            for (let i = 0; i < data.length; i++) {
                                                totalSales += parseFloat(data[i].idr_amt);
                                                cloneJc = `<tr class="dynamic-field" id="dynamic-field-${i+1}" onclick="click_tr(${i+1})">
                                                            <td class="text-center">
                                                                <button type="button" onclick="addNewField(this.id)" id="add-button-${i+1}"
                                                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                                                        class="fa fa-plus fa-fw"></i>
                                                                </button>
                                                                <button type="button" onclick="removeLastField(this)" id="remove-button-${i+1}"
                                                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                                                        class="fa fa-minus fa-fw"></i>
                                                                </button>
                                                            </td>

                                                            <td>
                                                                <div class="form-group">
                                                                    <select name="code[]" id="code-select-${i+1}" class="code-select">
                                                                        <option value="${data[i].item_code != null ? data[i].item_code : ''}">${data[i].item_code != null ? data[i].item_code + " - " + data[i].item_desc : ''}</option>

                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control desc" name="description[]" id="desc-${i+1}" value="${data[i].item_desc != null ? data[i].item_desc : ''}">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control qty-sales" name="qty_sales[]" id="qty-sales-${i+1}"
                                                                        data-type='currency4' value="${data[i].qty != null ? numberFormatter4(parseFloat(data[i].qty))  : ''}" autocomplete="off" onkeyup="sum_idr_sales(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <select name="uom_sales[]" id="uom-sales-${i+1}" class="uom-sales">
                                                                        <option value="${data[i].uom != null ? data[i].uom : ''}">${data[i].uom != null ? data[i].uom : ''}</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <select name="pc_sales[]" id="pc-sales-${i+1}" class="pc-sales">
                                                                        <option value="">Search</option>
                                                                        <option value="Prepaid" ${data[i].p_c == 'Prepaid' ? 'selected' : ''} >Prepaid</option>
                                                                        <option value="Collect" ${data[i].p_c == 'Collect' ? 'selected' : ''} >Collect</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <select name="cust_code_sales[]" id="cust-code-sales-${i+1}" class="cust-code-sales">
                                                                        <option value="${res.code_customer}">${res.code_customer}</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" value='${res.customer}' class="form-control cust-name-sales" name="cust_name_sales[]"
                                                                        id="cust-name-sales-${i+1}">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <select name="vat_sales[]" id="vat-sales-${i+1}" class="vat-sales">
                                                                        <option value="${data[i].vat_code != null ? data[i].vat_code : ''}">${data[i].vat_code != null ? data[i].vat_code : ''}</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <select name="curr_sales[]" id="curr-sales-${i+1}" class="curr-sales">
                                                                        <option value="${data[i].currency != null ? data[i].currency : ''}">${data[i].currency != null ? data[i].currency : ''}</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control rate-sales" id="rate-sales-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="rate_sales[]" 
                                                                        value='${data[i].curr_rate != null ? numberFormatter(parseFloat(data[i].curr_rate)) : ''}'
                                                                        onkeyup="sum_idr_sales(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control unit-rate-sales" id="unit-rate-sales-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="unit_rate_sales[]"
                                                                        value='${data[i].unit_rate != null ? numberFormatter(parseFloat(data[i].unit_rate)) : ''}'
                                                                        onkeyup="sum_idr_sales(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control amt-sales" readonly id="amt-sales-${i+1}"
                                                                    value='${data[i].amt != null ? numberFormatter(parseFloat(data[i].amt)) : ''}'
                                                                        autocomplete="off" data-type='currency' name="amt_sales[]">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control sales" readonly id="sales-${i+1}"
                                                                    value='${data[i].idr_amt != null ? numberFormatter(parseFloat(data[i].idr_amt)) : ''}'
                                                                        autocomplete="off" data-type='currency' name="sales[]" data-total_sales="1">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control qty-vendor" name="qty_vendor[]"
                                                                        id="qty-vendor-${i+1}" data-type='currency4' autocomplete="off"
                                                                        onkeyup="sum_idr_vendor(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <select name="pc_vendor[]" id="pc-vendor-${i+1}" class="pc-vendor">
                                                                        <option value="">Search</option>
                                                                        <option value="Prepaid">Prepaid</option>
                                                                        <option value="Collect">Collect</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <select name="code_vendor[]" id="code-vendor-${i+1}" class="code-vendor">
                                                                        <option value="">Search</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control name-vendor" name="name_vendor[]"
                                                                        id="name-vendor-${i+1}">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <select name="vat_vendor[]" id="vat-vendor-${i+1}" class="vat-vendor">
                                                                        <option value="">Search</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <select name="curr_vendor[]" id="curr-vendor-${i+1}" class="curr-vendor">
                                                                        <option value="">Search</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control rate-vendor" id="rate-vendor-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="rate_vendor[]"
                                                                        onkeyup="sum_idr_vendor(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control unit-rate-vendor" id="unit-rate-vendor-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="unit_rate_vendor[]"
                                                                        onkeyup="sum_idr_vendor(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control amt-vendor" readonly id="amt-vendor-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="amt_vendor[]">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control cost" readonly id="cost-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="cost[]" data-total_vendor="1">
                                                                </div>
                                                            </td>

                                                            </tr>`;
                                                $(`.tbody-conditionjc`).append(
                                                    cloneJc);
                                                evtNoData(
                                                    `#pc-sales-${i+1}, #pc-vendor-${i+1}`
                                                );
                                                evtItemCode(`#code-select-${i+1}`,
                                                    `#desc-${i+1}`);
                                                evtUomCode(`#uom-sales-${i+1}`);

                                                evtBisnisPartyNotComplete(
                                                    `#cust-code-sales-${i+1}`,
                                                    `#cust-name-sales-${i+1}`);
                                                evtBisnisPartyNotComplete(
                                                    `#code-vendor-${i+1}`,
                                                    `#name-vendor-${i+1}`);
                                                evtVatCode(
                                                    `#vat-sales-${i+1}, #vat-vendor-${i+1}`
                                                );
                                                evtCurrencyCode(`#curr-sales-${i+1}`,
                                                    null, true,
                                                    `#rate-sales-${i+1}`);
                                                evtCurrencyCode(`#curr-vendor-${i+1}`,
                                                    null, true,
                                                    `#rate-vendor-${i+1}`);

                                                $("input[data-type='currency']").on({
                                                    keyup: function() {
                                                        formatCurrency($(this));
                                                    },
                                                    blur: function() {
                                                        formatCurrency($(this),
                                                            "blur");
                                                    }
                                                });

                                                $("input[data-type='currency4']").on({
                                                    keyup: function() {
                                                        formatCurrency4($(
                                                            this));
                                                    },
                                                    blur: function() {
                                                        formatCurrency4($(this),
                                                            "blur");
                                                    }
                                                });

                                            }
                                            $(`#total-sales-1`).val(numberFormatter(
                                                parseFloat(totalSales)));
                                            // UPDATE TOTAL ALL SALES
                                            total_all_sales = totalSales;
                                        } else {
                                            $(`.tbody-conditionjc`).html("");
                                            cloneJc = `<tr class="dynamic-field" id="dynamic-field-1" onclick="click_tr(1)">
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
                                                    <div class="form-group">
                                                        <select name="code[]" id="code-select-1" class="code-select">
                                                            <option value="">Search</option>

                                                        </select>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control desc" name="description[]" id="desc-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-sales" name="qty_sales[]" id="qty-sales-1"
                                                            data-type='currency4' autocomplete="off" onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="uom_sales[]" id="uom-sales-1" class="uom-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="pc_sales[]" id="pc-sales-1" class="pc-sales">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="cust_code_sales[]" id="cust-code-sales-1" class="cust-code-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cust-name-sales" name="cust_name_sales[]"
                                                            id="cust-name-sales-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="vat_sales[]" id="vat-sales-1" class="vat-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="curr_sales[]" id="curr-sales-1" class="curr-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-sales" id="rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="rate_sales[]" 
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-sales" id="unit-rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_sales[]"
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-sales" readonly id="amt-sales-1"
                                                            autocomplete="off" data-type='currency' name="amt_sales[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control sales" readonly id="sales-1"
                                                            autocomplete="off" data-type='currency' name="sales[]" data-total_sales="1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-vendor" name="qty_vendor[]"
                                                            id="qty-vendor-1" data-type='currency4' autocomplete="off"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="pc_vendor[]" id="pc-vendor-1" class="pc-vendor">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="code_vendor[]" id="code-vendor-1" class="code-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control name-vendor" name="name_vendor[]"
                                                            id="name-vendor-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="vat_vendor[]" id="vat-vendor-1" class="vat-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="curr_vendor[]" id="curr-vendor-1" class="curr-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-vendor" id="rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-vendor" id="unit-rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-vendor" readonly id="amt-vendor-1"
                                                            autocomplete="off" data-type='currency' name="amt_vendor[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cost" readonly id="cost-1"
                                                            autocomplete="off" data-type='currency' name="cost[]" data-total_vendor="1">
                                                    </div>
                                                </td>

                                                </tr>`;
                                            $(`.tbody-conditionjc`).append(
                                                cloneJc);
                                            evtNoData(
                                                `#pc-sales-1, #pc-vendor-1`
                                            );
                                            evtItemCode(`#code-select-1`,
                                                `#desc-1`);
                                            evtUomCode(`#uom-sales-1`);

                                            evtBisnisPartyNotComplete(
                                                `#cust-code-sales-1`,
                                                `#cust-name-sales-1`);
                                            evtBisnisPartyNotComplete(
                                                `#code-vendor-1`,
                                                `#name-vendor-1`);
                                            evtVatCode(
                                                `#vat-sales-1, #vat-vendor-1`
                                            );
                                            evtCurrencyCode(`#curr-sales-1`,
                                                null, true,
                                                `#rate-sales-1`);
                                            evtCurrencyCode(`#curr-vendor-1`,
                                                null, true,
                                                `#rate-vendor-1`);

                                            $("input[data-type='currency']").on({
                                                keyup: function() {
                                                    formatCurrency($(this));
                                                },
                                                blur: function() {
                                                    formatCurrency($(this),
                                                        "blur");
                                                }
                                            });

                                            $("input[data-type='currency4']").on({
                                                keyup: function() {
                                                    formatCurrency4($(
                                                        this));
                                                },
                                                blur: function() {
                                                    formatCurrency4($(this),
                                                        "blur");
                                                }
                                            });
                                            $(`#total-sales-1`).val("");
                                            // UPDATE TOTAL ALL SALES
                                            total_all_sales = 0;
                                        }
                                    }
                                });
                            } else {
                                $(`.tbody-conditionjc`).html("");
                                cloneJc = `<tr class="dynamic-field" id="dynamic-field-1" onclick="click_tr(1)">
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
                                                    <div class="form-group">
                                                        <select name="code[]" id="code-select-1" class="code-select">
                                                            <option value="">Search</option>

                                                        </select>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control desc" name="description[]" id="desc-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-sales" name="qty_sales[]" id="qty-sales-1"
                                                            data-type='currency4' autocomplete="off" onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="uom_sales[]" id="uom-sales-1" class="uom-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="pc_sales[]" id="pc-sales-1" class="pc-sales">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="cust_code_sales[]" id="cust-code-sales-1" class="cust-code-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cust-name-sales" name="cust_name_sales[]"
                                                            id="cust-name-sales-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="vat_sales[]" id="vat-sales-1" class="vat-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="curr_sales[]" id="curr-sales-1" class="curr-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-sales" id="rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="rate_sales[]" 
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-sales" id="unit-rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_sales[]"
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-sales" readonly id="amt-sales-1"
                                                            autocomplete="off" data-type='currency' name="amt_sales[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control sales" readonly id="sales-1"
                                                            autocomplete="off" data-type='currency' name="sales[]" data-total_sales="1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-vendor" name="qty_vendor[]"
                                                            id="qty-vendor-1" data-type='currency4' autocomplete="off"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="pc_vendor[]" id="pc-vendor-1" class="pc-vendor">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="code_vendor[]" id="code-vendor-1" class="code-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control name-vendor" name="name_vendor[]"
                                                            id="name-vendor-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="vat_vendor[]" id="vat-vendor-1" class="vat-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="curr_vendor[]" id="curr-vendor-1" class="curr-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-vendor" id="rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-vendor" id="unit-rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-vendor" readonly id="amt-vendor-1"
                                                            autocomplete="off" data-type='currency' name="amt_vendor[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cost" readonly id="cost-1"
                                                            autocomplete="off" data-type='currency' name="cost[]" data-total_vendor="1">
                                                    </div>
                                                </td>

                                                </tr>`;
                                $(`.tbody-conditionjc`).append(
                                    cloneJc);
                                evtNoData(
                                    `#pc-sales-1, #pc-vendor-1`
                                );
                                evtItemCode(`#code-select-1`,
                                    `#desc-1`);
                                evtUomCode(`#uom-sales-1`);

                                evtBisnisPartyNotComplete(
                                    `#cust-code-sales-1`,
                                    `#cust-name-sales-1`);
                                evtBisnisPartyNotComplete(
                                    `#code-vendor-1`,
                                    `#name-vendor-1`);
                                evtVatCode(
                                    `#vat-sales-1, #vat-vendor-1`
                                );
                                evtCurrencyCode(`#curr-sales-1`,
                                    null, true,
                                    `#rate-sales-1`);
                                evtCurrencyCode(`#curr-vendor-1`,
                                    null, true,
                                    `#rate-vendor-1`);

                                $("input[data-type='currency']").on({
                                    keyup: function() {
                                        formatCurrency($(this));
                                    },
                                    blur: function() {
                                        formatCurrency($(this),
                                            "blur");
                                    }
                                });

                                $("input[data-type='currency4']").on({
                                    keyup: function() {
                                        formatCurrency4($(
                                            this));
                                    },
                                    blur: function() {
                                        formatCurrency4($(this),
                                            "blur");
                                    }
                                });
                                $(`#total-sales-1`).val("");
                                // UPDATE TOTAL ALL SALES
                                total_all_sales = 0;
                            }

                            // LIST DIMENSION

                            if (res.air_book_d1.length > 0) {
                                $(`.tbody-condition`).html("");
                                for (let i = 0; i < res.air_book_d1.length; i++) {
                                    cloneDm = `
                                        <tr class="dynamic-fieldsi" id="dynamic-fieldsi-${i+1}">
                                            <td class="text-center">
                                                <button type="button" onclick="addNewFieldSi(this.id)" id="add-buttonsi-${i+1}"
                                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                                        class="fa fa-plus fa-fw"></i>
                                                </button>
                                                <button type="button" onclick="removeLastFieldSi(this)" id="remove-buttonsi-${i+1}"
                                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                                        class="fa fa-minus fa-fw"></i>
                                                </button>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="pcs_rcp[]" class="form-control pcs-rcp" data-pcs="1"
                                                        id="pcs-rcp-${i+1}" onkeyup="sumDimension(${i+1}, 1)" value="${res.air_book_d1[i].pcs_rcp}">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control length" id="length-${i+1}"
                                                        autocomplete="off" onkeyup="sumDimension(${i+1}, 1)" data-type='currency1'
                                                        name="length[]" value="${res.air_book_d1[i].length != null ? numberFormatter1(parseFloat(res.air_book_d1[i].length))  : ''}">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control width" id="width-${i+1}"
                                                        autocomplete="off" onkeyup="sumDimension(${i+1}, 1)" data-type='currency1'
                                                        name="width[]" value="${res.air_book_d1[i].width != null ? numberFormatter1(parseFloat(res.air_book_d1[i].width))  : ''}">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control height" id="height-${i+1}"
                                                        autocomplete="off" onkeyup="sumDimension(${i+1}, 1)" data-type='currency1'
                                                        name="height[]" value="${res.air_book_d1[i].height != null ? numberFormatter1(parseFloat(res.air_book_d1[i].height))  : ''}">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="hidden" id="sum-m3-${i+1}" name="sum_m3[]" class="sum-m3"
                                                        data-m3="1" value="${res.air_book_d1[i].sum_m3 != null ? numberFormatter1(parseFloat(res.air_book_d1[i].sum_m3))  : ''}">
                                                    <input type="hidden" id="sum-volwt-${i+1}" name="sum_volwt[]" class="sum-volwt"
                                                        data-volwt="1" value="${res.air_book_d1[i].sum_volwt != null ? numberFormatter1(parseFloat(res.air_book_d1[i].sum_volwt))  : ''}">
                                                    <input type="text" class="form-control dimension" id="dimension-${i+1}"
                                                        data-dimension="1" autocomplete="off" readonly data-type='currency1'
                                                        name="dimension[]" value="${res.air_book_d1[i].dimension != null ? numberFormatter1(parseFloat(res.air_book_d1[i].dimension))  : ''}">
                                                </div>
                                            </td>

                                        </tr>
                                    `;
                                    $(`.tbody-condition`).append(cloneDm);
                                    $("input[name=total_dimension]").val(res.total_dimension != null ?
                                        numberFormatter1(parseFloat(res.total_dimension)) : '');
                                    $("input[name=total_m3]").val(res.total_m3 != null ?
                                        numberFormatter3(parseFloat(res.total_m3)) : '');
                                    $("input[name=total_pcs],input[name=pcs]").val(res.total_pcs !=
                                        null ?
                                        parseFloat(res.total_pcs) : '');
                                    $("input[name=total_vol_wt]").val(res.total_vol_wt != null ?
                                        numberFormatter1(parseFloat(res.total_vol_wt)) : '');
                                    $("input[data-type='currency1']").on({
                                        keyup: function() {
                                            formatCurrency1($(this));
                                        },
                                        blur: function() {
                                            formatCurrency1($(this), "blur");
                                        }
                                    });
                                }
                            } else {
                                $(`.tbody-condition`).html("");
                                cloneDm = `
                                        <tr class="dynamic-fieldsi" id="dynamic-fieldsi-1">
                                            <td class="text-center">
                                                <button type="button" onclick="addNewFieldSi(this.id)" id="add-buttonsi-1"
                                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                                        class="fa fa-plus fa-fw"></i>
                                                </button>
                                                <button type="button" onclick="removeLastFieldSi(this)" id="remove-buttonsi-1"
                                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                                        class="fa fa-minus fa-fw"></i>
                                                </button>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="pcs_rcp[]" class="form-control pcs-rcp" data-pcs="1"
                                                        id="pcs-rcp-1" onkeyup="sumDimension(1, 1)">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control length" id="length-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="length[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control width" id="width-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="width[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control height" id="height-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="height[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="hidden" id="sum-m3-1" name="sum_m3[]" class="sum-m3"
                                                        data-m3="1">
                                                    <input type="hidden" id="sum-volwt-1" name="sum_volwt[]" class="sum-volwt"
                                                        data-volwt="1">
                                                    <input type="text" class="form-control dimension" id="dimension-1"
                                                        data-dimension="1" autocomplete="off" readonly data-type='currency1'
                                                        name="dimension[]">
                                                </div>
                                            </td>

                                        </tr>
                                    `;
                                $(`.tbody-condition`).append(cloneDm);
                                $("input[data-type='currency1']").on({
                                    keyup: function() {
                                        formatCurrency1($(this));
                                    },
                                    blur: function() {
                                        formatCurrency1($(this), "blur");
                                    }
                                });
                            }
                        }
                    });
                }
            });

            return table;
        }

        function dataTableCustomer(idTable) {
            let cloneJc, cloneDm;
            var table = $(idTable).DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                ajax: {
                    url: '{{ route('get.table.cus_ex_job_air') }}',
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
                        data: 'ab.code',
                        name: 'ab.code'
                    },
                    {
                        data: 'ab.air_dept_name',
                        name: 'ab.air_dept_name'
                    },
                    {
                        data: 'ab.air_dest_name',
                        name: 'ab.air_dest_name'
                    },
                    {
                        data: 'ab.flight_date_1',
                        name: 'ab.flight_date_1'
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

                    let booking_no = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked')
                        .val();
                    let id = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked').data(
                        'id');
                    let quotation_no = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked')
                        .data('quotation_no');

                    let code = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked')
                        .data('cus_code');

                    $.ajax({
                        type: "post",
                        url: '{{ route('search.cus_ex_job_air') }}',
                        data: {
                            code: code
                        },
                        dataType: "json",
                        success: function(res) {
                            // console.log(res);
                            $(`#modal-cus`).modal('hide');
                            $("input[name=customer_code]").val(code);
                            $("input[name=customer]").val(res.name);

                            if (res.ab != null) {
                                $("input[name=booking_no]").val(res.ab.code);
                                if (res.ab.consignee_code != null) {
                                    var newCons = new Option(res
                                        .ab.consignee_code, res
                                        .ab.consignee_code, true, true);
                                    $("select[name=consignee_code]").append(newCons).trigger('change');
                                    $("input[name=consignee_name]").val(res.ab.consignee_name);
                                } else {
                                    $("select[name=consignee_code]").empty();
                                    $("input[name=consignee_name]").val("");
                                }

                                if (res.ab.air_dept_code != null) {
                                    var newAirDept = new Option(res
                                        .ab.air_dept_code, res
                                        .ab.air_dept_code, true, true);
                                    $("select[name=air_dept_code]").append(newAirDept).trigger(
                                        'change');
                                    $("input[name=air_dept_name]").val(res.ab.air_dept_name);
                                } else {

                                    $("select[name=air_dept_code]").append(new Option('JKT', 'JKT',
                                        true, true)).trigger(
                                        'change');
                                    $("input[name=air_dept_name]").val("JAKARTA SOEKARNO HATTA");
                                }

                                if (res.ab.air_dest_code != null) {
                                    var newAirDest = new Option(res
                                        .ab.air_dest_code, res
                                        .ab.air_dest_code, true, true);
                                    $("select[name=air_dest_code]").append(newAirDest).trigger(
                                        'change');
                                    $("input[name=air_dest_name]").val(res.ab.air_dest_name);
                                } else {
                                    $("select[name=air_dest_code]").empty();
                                    $("input[name=air_dest_name]").val("");
                                }

                                // FLIGHT 1
                                if (res.ab.to_dest_code_1 != null) {
                                    var newTo1 = new Option(res
                                        .ab.to_dest_code_1, res
                                        .ab.to_dest_code_1, true, true);
                                    $("select[name=to_dest_code_1]").append(newTo1).trigger('change');
                                } else {
                                    $("select[name=to_dest_code_1]").empty();
                                }
                                if (res.ab.by_airline_id_1 != null) {
                                    var newByAir1 = new Option(res
                                        .ab.by_airline_id_1, res
                                        .ab.by_airline_id_1, true, true);
                                    $("select[name=by_airline_id_1]").append(newByAir1).trigger(
                                        'change');
                                } else {
                                    $("select[name=by_airline_id_1]").empty();
                                }
                                $("input[name=flight_no_1]").val(res.ab.flight_no_1);
                                $("input[name=flight_date_1]").val(res.ab.flight_date_1);
                                $("input[name=eta_date_1]").val(res.ab.eta_date_1);

                                // FLIGHT 2
                                if (res.ab.to_dest_code_2 != null) {
                                    var newTo2 = new Option(res
                                        .ab.to_dest_code_2, res
                                        .ab.to_dest_code_2, true, true);
                                    $("select[name=to_dest_code_2]").append(newTo2).trigger('change');
                                } else {
                                    $("select[name=to_dest_code_2]").empty();
                                }
                                if (res.ab.by_airline_id_2 != null) {
                                    var newByAir2 = new Option(res
                                        .ab.by_airline_id_2, res
                                        .ab.by_airline_id_2, true, true);
                                    $("select[name=by_airline_id_2]").append(newByAir2).trigger(
                                        'change');
                                } else {
                                    $("select[name=by_airline_id_2]").empty();
                                }
                                $("input[name=flight_no_2]").val(res.ab.flight_no_2);
                                $("input[name=flight_date_2]").val(res.ab.flight_date_2);
                                $("input[name=eta_date_2]").val(res.ab.eta_date_2);

                                // FLIGHT 3
                                if (res.ab.to_dest_code_3 != null) {
                                    var newTo3 = new Option(res
                                        .ab.to_dest_code_3, res
                                        .ab.to_dest_code_3, true, true);
                                    $("select[name=to_dest_code_3]").append(newTo3).trigger('change');
                                } else {
                                    $("select[name=to_dest_code_3]").empty();
                                }
                                if (res.ab.by_airline_id_3 != null) {
                                    var newByAir3 = new Option(res
                                        .ab.by_airline_id_3, res
                                        .ab.by_airline_id_3, true, true);
                                    $("select[name=by_airline_id_3]").append(newByAir3).trigger(
                                        'change');
                                } else {
                                    $("select[name=by_airline_id_3]").empty();
                                }
                                $("input[name=flight_no_3]").val(res.ab.flight_no_3);
                                $("input[name=flight_date_3]").val(res.ab.flight_date_3);
                                $("input[name=eta_date_3]").val(res.ab.eta_date_3);

                                // FLIGHT 4
                                if (res.ab.to_dest_code_4 != null) {
                                    var newTo4 = new Option(res
                                        .ab.to_dest_code_4, res
                                        .ab.to_dest_code_4, true, true);
                                    $("select[name=to_dest_code_4]").append(newTo4).trigger('change');
                                } else {
                                    $("select[name=to_dest_code_4]").empty();
                                }
                                if (res.ab.by_airline_id_4 != null) {
                                    var newByAir4 = new Option(res
                                        .ab.by_airline_id_4, res
                                        .ab.by_airline_id_4, true, true);
                                    $("select[name=by_airline_id_4]").append(newByAir4).trigger(
                                        'change');
                                } else {
                                    $("select[name=by_airline_id_4]").empty();
                                }
                                $("input[name=flight_no_4]").val(res.ab.flight_no_4);
                                $("input[name=flight_date_4]").val(res.ab.flight_date_4);
                                $("input[name=eta_date_4]").val(res.ab.eta_date_4);

                                if (res.ab.agent_code != null) {
                                    var newAgent = new Option(res
                                        .ab.agent_code, res
                                        .ab.agent_code, true, true);
                                    $("select[name=agent_code]").append(newAgent).trigger('change');
                                    $("input[name=agent_name]").val(res.ab.agent_name);
                                } else {
                                    $("select[name=agent_code]").empty();
                                    $("input[name=agent_name]").val("");
                                }

                                if (res.ab.delivery_type_code != null) {
                                    var newDelType = new Option(res
                                        .ab.delivery_type_code, res
                                        .ab.delivery_type_code, true, true);
                                    $("select[name=delivery_type_code]").append(newDelType).trigger(
                                        'change');
                                    $("input[name=delivery_type]").val(res.ab.delivery_type_name);
                                } else {
                                    $("select[name=delivery_type_code]").empty();
                                    $("input[name=delivery_type]").val("");
                                }

                                if (res.ab.overseas_agent_code != null) {
                                    var newOver = new Option(res
                                        .ab.overseas_agent_code, res
                                        .ab.overseas_agent_code, true, true);
                                    $("select[name=delivery_agent_code]").append(newOver).trigger(
                                        'change');
                                    $("input[name=delivery_agent_name]").val(res.ab
                                        .overseas_agent_name);
                                } else {
                                    $("select[name=delivery_agent_code]").empty();
                                    $("input[name=delivery_agent_name]").val("");
                                }

                                if (res.ab.notify_code != null) {
                                    var newNotif = new Option(res
                                        .ab.notify_code, res
                                        .ab.notify_code, true, true);
                                    $("select[name=notify_code]").append(newNotif).trigger('change');
                                    $("input[name=notify_name]").val(res.ab.notify_name);
                                    $("input[name=notify_address_1]").val(res.ab.notify_address_1);
                                    $("input[name=notify_address_2]").val(res.ab.notify_address_2);
                                    $("input[name=notify_address_3]").val(res.ab.notify_address_3);
                                    $("input[name=notify_address_4]").val(res.ab.notify_address_4);
                                } else {
                                    $("select[name=notify_code]").empty();
                                    $("input[name=notify_name]").val("");
                                    $("input[name=notify_address_1]").val("");
                                    $("input[name=notify_address_2]").val("");
                                    $("input[name=notify_address_3]").val("");
                                    $("input[name=notify_address_4]").val("");
                                }

                                //  LIST JOB COSTING
                                if (quotation_no != 0) {
                                    $.ajax({
                                        type: "post",
                                        url: '{{ route('get.jc.from.quot_air') }}',
                                        data: {
                                            quotation_no: quotation_no
                                        },
                                        dataType: "json",
                                        success: function(data) {
                                            let totalSales = 0;
                                            if (data.length > 0) {
                                                $(`.tbody-conditionjc`).html("");
                                                for (let i = 0; i < data.length; i++) {
                                                    totalSales += parseFloat(data[i]
                                                        .idr_amt);
                                                    cloneJc = `<tr class="dynamic-field" id="dynamic-field-${i+1}" onclick="click_tr(${i+1})">
                                                            <td class="text-center">
                                                                <button type="button" onclick="addNewField(this.id)" id="add-button-${i+1}"
                                                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                                                        class="fa fa-plus fa-fw"></i>
                                                                </button>
                                                                <button type="button" onclick="removeLastField(this)" id="remove-button-${i+1}"
                                                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                                                        class="fa fa-minus fa-fw"></i>
                                                                </button>
                                                            </td>

                                                            <td>
                                                                <div class="form-group">
                                                                    <select name="code[]" id="code-select-${i+1}" class="code-select">
                                                                        <option value="${data[i].item_code != null ? data[i].item_code : ''}">${data[i].item_code != null ? data[i].item_code + " - " + data[i].item_desc : ''}</option>

                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control desc" name="description[]" id="desc-${i+1}" value="${data[i].item_desc != null ? data[i].item_desc : ''}">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control qty-sales" name="qty_sales[]" id="qty-sales-${i+1}"
                                                                        data-type='currency4' value="${data[i].qty != null ? numberFormatter4(parseFloat(data[i].qty))  : ''}" autocomplete="off" onkeyup="sum_idr_sales(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <select name="uom_sales[]" id="uom-sales-${i+1}" class="uom-sales">
                                                                        <option value="${data[i].uom != null ? data[i].uom : ''}">${data[i].uom != null ? data[i].uom : ''}</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <select name="pc_sales[]" id="pc-sales-${i+1}" class="pc-sales">
                                                                        <option value="">Search</option>
                                                                        <option value="Prepaid" ${data[i].p_c == 'Prepaid' ? 'selected' : ''} >Prepaid</option>
                                                                        <option value="Collect" ${data[i].p_c == 'Collect' ? 'selected' : ''} >Collect</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <select name="cust_code_sales[]" id="cust-code-sales-${i+1}" class="cust-code-sales">
                                                                        <option value="${code}">${code}</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" value='${res.name}' class="form-control cust-name-sales" name="cust_name_sales[]"
                                                                        id="cust-name-sales-${i+1}">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <select name="vat_sales[]" id="vat-sales-${i+1}" class="vat-sales">
                                                                        <option value="${data[i].vat_code != null ? data[i].vat_code : ''}">${data[i].vat_code != null ? data[i].vat_code : ''}</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <select name="curr_sales[]" id="curr-sales-${i+1}" class="curr-sales">
                                                                        <option value="${data[i].currency != null ? data[i].currency : ''}">${data[i].currency != null ? data[i].currency : ''}</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control rate-sales" id="rate-sales-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="rate_sales[]" 
                                                                        value='${data[i].curr_rate != null ? numberFormatter(parseFloat(data[i].curr_rate)) : ''}'
                                                                        onkeyup="sum_idr_sales(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control unit-rate-sales" id="unit-rate-sales-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="unit_rate_sales[]"
                                                                        value='${data[i].unit_rate != null ? numberFormatter(parseFloat(data[i].unit_rate)) : ''}'
                                                                        onkeyup="sum_idr_sales(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control amt-sales" readonly id="amt-sales-${i+1}"
                                                                    value='${data[i].amt != null ? numberFormatter(parseFloat(data[i].amt)) : ''}'
                                                                        autocomplete="off" data-type='currency' name="amt_sales[]">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: darksalmon;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control sales" readonly id="sales-${i+1}"
                                                                    value='${data[i].idr_amt != null ? numberFormatter(parseFloat(data[i].idr_amt)) : ''}'
                                                                        autocomplete="off" data-type='currency' name="sales[]" data-total_sales="1">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control qty-vendor" name="qty_vendor[]"
                                                                        id="qty-vendor-${i+1}" data-type='currency4' autocomplete="off"
                                                                        onkeyup="sum_idr_vendor(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <select name="pc_vendor[]" id="pc-vendor-${i+1}" class="pc-vendor">
                                                                        <option value="">Search</option>
                                                                        <option value="Prepaid">Prepaid</option>
                                                                        <option value="Collect">Collect</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <select name="code_vendor[]" id="code-vendor-${i+1}" class="code-vendor">
                                                                        <option value="">Search</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control name-vendor" name="name_vendor[]"
                                                                        id="name-vendor-${i+1}">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <select name="vat_vendor[]" id="vat-vendor-${i+1}" class="vat-vendor">
                                                                        <option value="">Search</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <select name="curr_vendor[]" id="curr-vendor-${i+1}" class="curr-vendor">
                                                                        <option value="">Search</option>
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control rate-vendor" id="rate-vendor-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="rate_vendor[]"
                                                                        onkeyup="sum_idr_vendor(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control unit-rate-vendor" id="unit-rate-vendor-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="unit_rate_vendor[]"
                                                                        onkeyup="sum_idr_vendor(${i+1}, 1)">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control amt-vendor" readonly id="amt-vendor-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="amt_vendor[]">
                                                                </div>
                                                            </td>

                                                            <td style="background-color: cadetblue;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control cost" readonly id="cost-${i+1}"
                                                                        autocomplete="off" data-type='currency' name="cost[]" data-total_vendor="1">
                                                                </div>
                                                            </td>

                                                            </tr>`;
                                                    $(`.tbody-conditionjc`).append(
                                                        cloneJc);
                                                    evtNoData(
                                                        `#pc-sales-${i+1}, #pc-vendor-${i+1}`
                                                    );
                                                    evtItemCode(`#code-select-${i+1}`,
                                                        `#desc-${i+1}`);
                                                    evtUomCode(`#uom-sales-${i+1}`);

                                                    evtBisnisPartyNotComplete(
                                                        `#cust-code-sales-${i+1}`,
                                                        `#cust-name-sales-${i+1}`);
                                                    evtBisnisPartyNotComplete(
                                                        `#code-vendor-${i+1}`,
                                                        `#name-vendor-${i+1}`);
                                                    evtVatCode(
                                                        `#vat-sales-${i+1}, #vat-vendor-${i+1}`
                                                    );
                                                    evtCurrencyCode(`#curr-sales-${i+1}`,
                                                        null, true,
                                                        `#rate-sales-${i+1}`);
                                                    evtCurrencyCode(`#curr-vendor-${i+1}`,
                                                        null, true,
                                                        `#rate-vendor-${i+1}`);

                                                    $("input[data-type='currency']").on({
                                                        keyup: function() {
                                                            formatCurrency($(
                                                                this));
                                                        },
                                                        blur: function() {
                                                            formatCurrency($(
                                                                    this),
                                                                "blur");
                                                        }
                                                    });

                                                    $("input[data-type='currency4']").on({
                                                        keyup: function() {
                                                            formatCurrency4($(
                                                                this));
                                                        },
                                                        blur: function() {
                                                            formatCurrency4($(
                                                                    this),
                                                                "blur");
                                                        }
                                                    });

                                                }
                                                $(`#total-sales-1`).val(numberFormatter(
                                                    parseFloat(totalSales)));
                                                // UPDATE TOTAL ALL SALES
                                                total_all_sales = totalSales;
                                            } else {
                                                $(`.tbody-conditionjc`).html("");
                                                cloneJc = `<tr class="dynamic-field" id="dynamic-field-1" onclick="click_tr(1)">
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
                                                    <div class="form-group">
                                                        <select name="code[]" id="code-select-1" class="code-select">
                                                            <option value="">Search</option>

                                                        </select>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control desc" name="description[]" id="desc-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-sales" name="qty_sales[]" id="qty-sales-1"
                                                            data-type='currency4' autocomplete="off" onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="uom_sales[]" id="uom-sales-1" class="uom-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="pc_sales[]" id="pc-sales-1" class="pc-sales">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="cust_code_sales[]" id="cust-code-sales-1" class="cust-code-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cust-name-sales" name="cust_name_sales[]"
                                                            id="cust-name-sales-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="vat_sales[]" id="vat-sales-1" class="vat-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="curr_sales[]" id="curr-sales-1" class="curr-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-sales" id="rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="rate_sales[]" 
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-sales" id="unit-rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_sales[]"
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-sales" readonly id="amt-sales-1"
                                                            autocomplete="off" data-type='currency' name="amt_sales[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control sales" readonly id="sales-1"
                                                            autocomplete="off" data-type='currency' name="sales[]" data-total_sales="1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-vendor" name="qty_vendor[]"
                                                            id="qty-vendor-1" data-type='currency4' autocomplete="off"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="pc_vendor[]" id="pc-vendor-1" class="pc-vendor">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="code_vendor[]" id="code-vendor-1" class="code-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control name-vendor" name="name_vendor[]"
                                                            id="name-vendor-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="vat_vendor[]" id="vat-vendor-1" class="vat-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="curr_vendor[]" id="curr-vendor-1" class="curr-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-vendor" id="rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-vendor" id="unit-rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-vendor" readonly id="amt-vendor-1"
                                                            autocomplete="off" data-type='currency' name="amt_vendor[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cost" readonly id="cost-1"
                                                            autocomplete="off" data-type='currency' name="cost[]" data-total_vendor="1">
                                                    </div>
                                                </td>

                                                </tr>`;
                                                $(`.tbody-conditionjc`).append(
                                                    cloneJc);
                                                evtNoData(
                                                    `#pc-sales-1, #pc-vendor-1`
                                                );
                                                evtItemCode(`#code-select-1`,
                                                    `#desc-1`);
                                                evtUomCode(`#uom-sales-1`);

                                                evtBisnisPartyNotComplete(
                                                    `#cust-code-sales-1`,
                                                    `#cust-name-sales-1`);
                                                evtBisnisPartyNotComplete(
                                                    `#code-vendor-1`,
                                                    `#name-vendor-1`);
                                                evtVatCode(
                                                    `#vat-sales-1, #vat-vendor-1`
                                                );
                                                evtCurrencyCode(`#curr-sales-1`,
                                                    null, true,
                                                    `#rate-sales-1`);
                                                evtCurrencyCode(`#curr-vendor-1`,
                                                    null, true,
                                                    `#rate-vendor-1`);

                                                $("input[data-type='currency']").on({
                                                    keyup: function() {
                                                        formatCurrency($(this));
                                                    },
                                                    blur: function() {
                                                        formatCurrency($(this),
                                                            "blur");
                                                    }
                                                });

                                                $("input[data-type='currency4']").on({
                                                    keyup: function() {
                                                        formatCurrency4($(
                                                            this));
                                                    },
                                                    blur: function() {
                                                        formatCurrency4($(this),
                                                            "blur");
                                                    }
                                                });
                                                $(`#total-sales-1`).val("");
                                                // UPDATE TOTAL ALL SALES
                                                total_all_sales = 0;
                                            }
                                        }
                                    });
                                } else {
                                    $(`.tbody-conditionjc`).html("");
                                    cloneJc = `<tr class="dynamic-field" id="dynamic-field-1" onclick="click_tr(1)">
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
                                                    <div class="form-group">
                                                        <select name="code[]" id="code-select-1" class="code-select">
                                                            <option value="">Search</option>

                                                        </select>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control desc" name="description[]" id="desc-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-sales" name="qty_sales[]" id="qty-sales-1"
                                                            data-type='currency4' autocomplete="off" onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="uom_sales[]" id="uom-sales-1" class="uom-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="pc_sales[]" id="pc-sales-1" class="pc-sales">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="cust_code_sales[]" id="cust-code-sales-1" class="cust-code-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cust-name-sales" name="cust_name_sales[]"
                                                            id="cust-name-sales-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="vat_sales[]" id="vat-sales-1" class="vat-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="curr_sales[]" id="curr-sales-1" class="curr-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-sales" id="rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="rate_sales[]" 
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-sales" id="unit-rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_sales[]"
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-sales" readonly id="amt-sales-1"
                                                            autocomplete="off" data-type='currency' name="amt_sales[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control sales" readonly id="sales-1"
                                                            autocomplete="off" data-type='currency' name="sales[]" data-total_sales="1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-vendor" name="qty_vendor[]"
                                                            id="qty-vendor-1" data-type='currency4' autocomplete="off"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="pc_vendor[]" id="pc-vendor-1" class="pc-vendor">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="code_vendor[]" id="code-vendor-1" class="code-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control name-vendor" name="name_vendor[]"
                                                            id="name-vendor-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="vat_vendor[]" id="vat-vendor-1" class="vat-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="curr_vendor[]" id="curr-vendor-1" class="curr-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-vendor" id="rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-vendor" id="unit-rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-vendor" readonly id="amt-vendor-1"
                                                            autocomplete="off" data-type='currency' name="amt_vendor[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cost" readonly id="cost-1"
                                                            autocomplete="off" data-type='currency' name="cost[]" data-total_vendor="1">
                                                    </div>
                                                </td>

                                                </tr>`;
                                    $(`.tbody-conditionjc`).append(
                                        cloneJc);
                                    evtNoData(
                                        `#pc-sales-1, #pc-vendor-1`
                                    );
                                    evtItemCode(`#code-select-1`,
                                        `#desc-1`);
                                    evtUomCode(`#uom-sales-1`);

                                    evtBisnisPartyNotComplete(
                                        `#cust-code-sales-1`,
                                        `#cust-name-sales-1`);
                                    evtBisnisPartyNotComplete(
                                        `#code-vendor-1`,
                                        `#name-vendor-1`);
                                    evtVatCode(
                                        `#vat-sales-1, #vat-vendor-1`
                                    );
                                    evtCurrencyCode(`#curr-sales-1`,
                                        null, true,
                                        `#rate-sales-1`);
                                    evtCurrencyCode(`#curr-vendor-1`,
                                        null, true,
                                        `#rate-vendor-1`);

                                    $("input[data-type='currency']").on({
                                        keyup: function() {
                                            formatCurrency($(this));
                                        },
                                        blur: function() {
                                            formatCurrency($(this),
                                                "blur");
                                        }
                                    });

                                    $("input[data-type='currency4']").on({
                                        keyup: function() {
                                            formatCurrency4($(
                                                this));
                                        },
                                        blur: function() {
                                            formatCurrency4($(this),
                                                "blur");
                                        }
                                    });
                                    $(`#total-sales-1`).val("");
                                    // UPDATE TOTAL ALL SALES
                                    total_all_sales = 0;
                                }

                                // LIST DIMENSION
                                if (res.ab.air_book_d1.length > 0) {
                                    $(`.tbody-condition`).html("");
                                    for (let i = 0; i < res.ab.air_book_d1.length; i++) {
                                        cloneDm = `
                                        <tr class="dynamic-fieldsi" id="dynamic-fieldsi-${i+1}">
                                            <td class="text-center">
                                                <button type="button" onclick="addNewFieldSi(this.id)" id="add-buttonsi-${i+1}"
                                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                                        class="fa fa-plus fa-fw"></i>
                                                </button>
                                                <button type="button" onclick="removeLastFieldSi(this)" id="remove-buttonsi-${i+1}"
                                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                                        class="fa fa-minus fa-fw"></i>
                                                </button>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="pcs_rcp[]" class="form-control pcs-rcp" data-pcs="1"
                                                        id="pcs-rcp-${i+1}" onkeyup="sumDimension(${i+1}, 1)" value="${res.ab.air_book_d1[i].pcs_rcp}">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control length" id="length-${i+1}"
                                                        autocomplete="off" onkeyup="sumDimension(${i+1}, 1)" data-type='currency1'
                                                        name="length[]" value="${res.ab.air_book_d1[i].length != null ? numberFormatter1(parseFloat(res.ab.air_book_d1[i].length))  : ''}">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control width" id="width-${i+1}"
                                                        autocomplete="off" onkeyup="sumDimension(${i+1}, 1)" data-type='currency1'
                                                        name="width[]" value="${res.ab.air_book_d1[i].width != null ? numberFormatter1(parseFloat(res.ab.air_book_d1[i].width))  : ''}">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control height" id="height-${i+1}"
                                                        autocomplete="off" onkeyup="sumDimension(${i+1}, 1)" data-type='currency1'
                                                        name="height[]" value="${res.ab.air_book_d1[i].height != null ? numberFormatter1(parseFloat(res.ab.air_book_d1[i].height))  : ''}">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="hidden" id="sum-m3-${i+1}" name="sum_m3[]" class="sum-m3"
                                                        data-m3="1" value="${res.ab.air_book_d1[i].sum_m3 != null ? numberFormatter1(parseFloat(res.ab.air_book_d1[i].sum_m3))  : ''}">
                                                    <input type="hidden" id="sum-volwt-${i+1}" name="sum_volwt[]" class="sum-volwt"
                                                        data-volwt="1" value="${res.ab.air_book_d1[i].sum_volwt != null ? numberFormatter1(parseFloat(res.ab.air_book_d1[i].sum_volwt))  : ''}">
                                                    <input type="text" class="form-control dimension" id="dimension-${i+1}"
                                                        data-dimension="1" autocomplete="off" readonly data-type='currency1'
                                                        name="dimension[]" value="${res.ab.air_book_d1[i].dimension != null ? numberFormatter1(parseFloat(res.ab.air_book_d1[i].dimension))  : ''}">
                                                </div>
                                            </td>

                                        </tr>
                                    `;
                                        $(`.tbody-condition`).append(cloneDm);
                                        $("input[name=total_dimension]").val(res.ab.total_dimension !=
                                            null ?
                                            numberFormatter1(parseFloat(res.ab.total_dimension)) :
                                            '');
                                        $("input[name=total_m3]").val(res.ab.total_m3 != null ?
                                            numberFormatter3(parseFloat(res.ab.total_m3)) : '');
                                        $("input[name=total_pcs], input[name=pcs]").val(res.ab
                                            .total_pcs != null ?
                                            parseFloat(res.ab.total_pcs) : '');
                                        $("input[name=total_vol_wt]").val(res.ab.total_vol_wt != null ?
                                            numberFormatter1(parseFloat(res.ab.total_vol_wt)) : '');
                                        $("input[data-type='currency1']").on({
                                            keyup: function() {
                                                formatCurrency1($(this));
                                            },
                                            blur: function() {
                                                formatCurrency1($(this), "blur");
                                            }
                                        });
                                    }
                                } else {
                                    $(`.tbody-condition`).html("");
                                    cloneDm = `
                                        <tr class="dynamic-fieldsi" id="dynamic-fieldsi-1">
                                            <td class="text-center">
                                                <button type="button" onclick="addNewFieldSi(this.id)" id="add-buttonsi-1"
                                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                                        class="fa fa-plus fa-fw"></i>
                                                </button>
                                                <button type="button" onclick="removeLastFieldSi(this)" id="remove-buttonsi-1"
                                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                                        class="fa fa-minus fa-fw"></i>
                                                </button>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="pcs_rcp[]" class="form-control pcs-rcp" data-pcs="1"
                                                        id="pcs-rcp-1" onkeyup="sumDimension(1, 1)">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control length" id="length-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="length[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control width" id="width-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="width[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control height" id="height-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="height[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="hidden" id="sum-m3-1" name="sum_m3[]" class="sum-m3"
                                                        data-m3="1">
                                                    <input type="hidden" id="sum-volwt-1" name="sum_volwt[]" class="sum-volwt"
                                                        data-volwt="1">
                                                    <input type="text" class="form-control dimension" id="dimension-1"
                                                        data-dimension="1" autocomplete="off" readonly data-type='currency1'
                                                        name="dimension[]">
                                                </div>
                                            </td>

                                        </tr>
                                    `;
                                    $(`.tbody-condition`).append(cloneDm);
                                    $("input[data-type='currency1']").on({
                                        keyup: function() {
                                            formatCurrency1($(this));
                                        },
                                        blur: function() {
                                            formatCurrency1($(this), "blur");
                                        }
                                    });
                                }
                            } else {
                                $("input[name=booking_no]").val('');
                                $("select[name=consignee_code]").empty();
                                $("input[name=consignee_name]").val("");
                                $("select[name=air_dept_code]").append(new Option('JKT', 'JKT',
                                    true, true)).trigger(
                                    'change');
                                $("input[name=air_dept_name]").val("JAKARTA SOEKARNO HATTA");
                                $("select[name=air_dest_code]").empty();
                                $("input[name=air_dest_name]").val("");
                                // FLIGHT 1
                                $("select[name=to_dest_code_1]").empty();
                                $("select[name=by_airline_id_1]").empty();
                                $("input[name=flight_no_1]").val('');
                                $("input[name=flight_date_1]").val('');
                                $("input[name=eta_date_1]").val('');
                                // FLIGHT 2
                                $("select[name=to_dest_code_2]").empty();
                                $("select[name=by_airline_id_2]").empty();
                                $("input[name=flight_no_2]").val('');
                                $("input[name=flight_date_2]").val('');
                                $("input[name=eta_date_2]").val('');
                                // FLIGHT 3
                                $("select[name=to_dest_code_3]").empty();
                                $("select[name=by_airline_id_3]").empty();
                                $("input[name=flight_no_3]").val('');
                                $("input[name=flight_date_3]").val('');
                                $("input[name=eta_date_3]").val('');
                                // FLIGHT 4
                                $("select[name=to_dest_code_4]").empty();
                                $("select[name=by_airline_id_4]").empty();
                                $("input[name=flight_no_4]").val('');
                                $("input[name=flight_date_4]").val('');
                                $("input[name=eta_date_4]").val('');
                                $("select[name=agent_code]").empty();
                                $("input[name=agent_name]").val("");
                                $("select[name=delivery_type_code]").empty();
                                $("input[name=delivery_type]").val("");
                                $("select[name=delivery_agent_code]").empty();
                                $("input[name=delivery_agent_name]").val("");
                                $("select[name=notify_code]").empty();
                                $("input[name=notify_name]").val("");
                                $("input[name=notify_address_1]").val("");
                                $("input[name=notify_address_2]").val("");
                                $("input[name=notify_address_3]").val("");
                                $("input[name=notify_address_4]").val("");

                                $(`.tbody-conditionjc`).html("");
                                cloneJc = `<tr class="dynamic-field" id="dynamic-field-1" onclick="click_tr(1)">
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
                                                    <div class="form-group">
                                                        <select name="code[]" id="code-select-1" class="code-select">
                                                            <option value="">Search</option>

                                                        </select>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control desc" name="description[]" id="desc-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-sales" name="qty_sales[]" id="qty-sales-1"
                                                            data-type='currency4' autocomplete="off" onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="uom_sales[]" id="uom-sales-1" class="uom-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="pc_sales[]" id="pc-sales-1" class="pc-sales">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="cust_code_sales[]" id="cust-code-sales-1" class="cust-code-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cust-name-sales" name="cust_name_sales[]"
                                                            id="cust-name-sales-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="vat_sales[]" id="vat-sales-1" class="vat-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <select name="curr_sales[]" id="curr-sales-1" class="curr-sales">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-sales" id="rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="rate_sales[]" 
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-sales" id="unit-rate-sales-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_sales[]"
                                                            onkeyup="sum_idr_sales(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-sales" readonly id="amt-sales-1"
                                                            autocomplete="off" data-type='currency' name="amt_sales[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: darksalmon;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control sales" readonly id="sales-1"
                                                            autocomplete="off" data-type='currency' name="sales[]" data-total_sales="1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty-vendor" name="qty_vendor[]"
                                                            id="qty-vendor-1" data-type='currency4' autocomplete="off"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="pc_vendor[]" id="pc-vendor-1" class="pc-vendor">
                                                            <option value="">Search</option>
                                                            <option value="Prepaid">Prepaid</option>
                                                            <option value="Collect">Collect</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="code_vendor[]" id="code-vendor-1" class="code-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control name-vendor" name="name_vendor[]"
                                                            id="name-vendor-1">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="vat_vendor[]" id="vat-vendor-1" class="vat-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <select name="curr_vendor[]" id="curr-vendor-1" class="curr-vendor">
                                                            <option value="">Search</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rate-vendor" id="rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control unit-rate-vendor" id="unit-rate-vendor-1"
                                                            autocomplete="off" data-type='currency' name="unit_rate_vendor[]"
                                                            onkeyup="sum_idr_vendor(1, 1)">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control amt-vendor" readonly id="amt-vendor-1"
                                                            autocomplete="off" data-type='currency' name="amt_vendor[]">
                                                    </div>
                                                </td>

                                                <td style="background-color: cadetblue;">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control cost" readonly id="cost-1"
                                                            autocomplete="off" data-type='currency' name="cost[]" data-total_vendor="1">
                                                    </div>
                                                </td>

                                                </tr>`;
                                $(`.tbody-conditionjc`).append(
                                    cloneJc);
                                evtNoData(
                                    `#pc-sales-1, #pc-vendor-1`
                                );
                                evtItemCode(`#code-select-1`,
                                    `#desc-1`);
                                evtUomCode(`#uom-sales-1`);

                                evtBisnisPartyNotComplete(
                                    `#cust-code-sales-1`,
                                    `#cust-name-sales-1`);
                                evtBisnisPartyNotComplete(
                                    `#code-vendor-1`,
                                    `#name-vendor-1`);
                                evtVatCode(
                                    `#vat-sales-1, #vat-vendor-1`
                                );
                                evtCurrencyCode(`#curr-sales-1`,
                                    null, true,
                                    `#rate-sales-1`);
                                evtCurrencyCode(`#curr-vendor-1`,
                                    null, true,
                                    `#rate-vendor-1`);

                                $("input[data-type='currency']").on({
                                    keyup: function() {
                                        formatCurrency($(this));
                                    },
                                    blur: function() {
                                        formatCurrency($(this),
                                            "blur");
                                    }
                                });

                                $("input[data-type='currency4']").on({
                                    keyup: function() {
                                        formatCurrency4($(
                                            this));
                                    },
                                    blur: function() {
                                        formatCurrency4($(this),
                                            "blur");
                                    }
                                });
                                $(`#total-sales-1`).val("");
                                // UPDATE TOTAL ALL SALES
                                total_all_sales = 0;

                                $(`.tbody-condition`).html("");
                                cloneDm = `
                                        <tr class="dynamic-fieldsi" id="dynamic-fieldsi-1">
                                            <td class="text-center">
                                                <button type="button" onclick="addNewFieldSi(this.id)" id="add-buttonsi-1"
                                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                                        class="fa fa-plus fa-fw"></i>
                                                </button>
                                                <button type="button" onclick="removeLastFieldSi(this)" id="remove-buttonsi-1"
                                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                                        class="fa fa-minus fa-fw"></i>
                                                </button>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="pcs_rcp[]" class="form-control pcs-rcp" data-pcs="1"
                                                        id="pcs-rcp-1" onkeyup="sumDimension(1, 1)">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control length" id="length-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="length[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control width" id="width-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="width[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control height" id="height-1"
                                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                                        name="height[]">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="hidden" id="sum-m3-1" name="sum_m3[]" class="sum-m3"
                                                        data-m3="1">
                                                    <input type="hidden" id="sum-volwt-1" name="sum_volwt[]" class="sum-volwt"
                                                        data-volwt="1">
                                                    <input type="text" class="form-control dimension" id="dimension-1"
                                                        data-dimension="1" autocomplete="off" readonly data-type='currency1'
                                                        name="dimension[]">
                                                </div>
                                            </td>

                                        </tr>
                                    `;
                                $(`.tbody-condition`).append(cloneDm);
                                $("input[data-type='currency1']").on({
                                    keyup: function() {
                                        formatCurrency1($(this));
                                    },
                                    blur: function() {
                                        formatCurrency1($(this), "blur");
                                    }
                                });
                            }
                        }
                    });

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
