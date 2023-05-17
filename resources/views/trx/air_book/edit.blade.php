@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Air Export Booking', 'title_2' => 'Transaction'])
    <div class="row mt-1 px-1">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }}</strong>
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Form Edit Air Export Booking</h6>
                </div>
                <form action="{{ route('air_book.update', $ab->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="code">Booking No <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ $ab->code }}"
                                        class="form-control @error('code') is-invalid @enderror" readonly name="code"
                                        id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="booking_date">Booking Date <span style="color: red;">*</span></label>
                                    <input type="text" required
                                        value="{{ old('booking_date', empty($ab->booking_date) ? '' : date('Y/m/d H:i', strtotime($ab->booking_date))) }}"
                                        autocomplete="off"
                                        class="form-control @error('booking_date') is-invalid @enderror date-time-picker"
                                        name="booking_date" id="booking_date">
                                    @error('booking_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="quotation_no">Quotation No</label>
                                            <input type="text"
                                                class="form-control @error('quotation_no') is-invalid @enderror"
                                                name="quotation_no" value="{{ old('quotation_no', $ab->quotation_no) }}"
                                                id="quotation_no">
                                            @error('quotation_no')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quotation_no">&nbsp;</label>
                                            <a href="javascript:void(0)"
                                                class="btn btn-primary form-control btn-quot">Search</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="code_customer">Customer Code</label>
                                            <input type="text"
                                                class="form-control @error('code_customer') is-invalid @enderror"
                                                name="code_customer" value="{{ old('code_customer', $ab->code_customer) }}"
                                                id="code_customer">
                                            @error('code_customer')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="customer">Customer Name</label>
                                            <input type="text"
                                                class="form-control @error('customer') is-invalid @enderror" name="customer"
                                                value="{{ old('customer', $ab->customer) }}" id="customer">
                                            @error('customer')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quotation_no">&nbsp;</label>
                                            <a href="javascript:void(0)"
                                                class="btn btn-primary form-control btn-cus">Search</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="booking_from">Booking From</label>
                                    <input type="text" class="form-control @error('booking_from') is-invalid @enderror"
                                        name="booking_from" value="{{ old('booking_from', $ab->booking_from) }}"
                                        id="booking_from">
                                    @error('booking_from')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="reference_no">Customer Reference No.</label>
                                    <input type="text" class="form-control @error('reference_no') is-invalid @enderror"
                                        name="reference_no" value="{{ old('reference_no', $ab->reference_no) }}"
                                        id="reference_no">
                                    @error('reference_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="telp">Telephone </label>
                                    <input type="text" value="{{ old('telp', $ab->telp) }}"
                                        class="form-control @error('telp') is-invalid @enderror" name="telp"
                                        id="telp">
                                    @error('telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="email" value="{{ old('email', $ab->email) }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        id="email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="shipper_code">Shipper Code</label>
                                            <select class="shipper-select @error('shipper_code') is-invalid @enderror"
                                                name="shipper_code">
                                                <option value="{{ old('shipper_code', $ab->shipper_code) }}">
                                                    {{ old('shipper_code', $ab->shipper_code) }}
                                                </option>
                                            </select>
                                            @error('shipper_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="shipper_name">Shipper Name </label>
                                            <input type="shipper_name"
                                                value="{{ old('shipper_name', $ab->shipper_name) }}"
                                                class="form-control @error('shipper_name') is-invalid @enderror"
                                                name="shipper_name" id="shipper_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="consignee_code">Consignee Code</label>
                                            <select class="consignee-select @error('consignee_code') is-invalid @enderror"
                                                name="consignee_code">
                                                <option value="{{ old('consignee_code', $ab->consignee_code) }}">
                                                    {{ old('consignee_code', $ab->consignee_code) }}
                                                </option>
                                            </select>
                                            @error('consignee_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="consignee_name">Consignee Name </label>
                                            <input type="consignee_name"
                                                value="{{ old('consignee_name', $ab->consignee_name) }}"
                                                class="form-control @error('consignee_name') is-invalid @enderror"
                                                name="consignee_name" id="consignee_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="coloader_code">Coloader Code</label>
                                            <select class="coloader-select @error('coloader_code') is-invalid @enderror"
                                                name="coloader_code">
                                                <option value="{{ old('coloader_code', $ab->coloader_code) }}">
                                                    {{ old('coloader_code', $ab->coloader_code) }}
                                                </option>
                                            </select>
                                            @error('coloader_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="coloader_name">Coloader Name </label>
                                            <input type="coloader_name"
                                                value="{{ old('coloader_name', $ab->coloader_name) }}"
                                                class="form-control @error('coloader_name') is-invalid @enderror"
                                                name="coloader_name" id="coloader_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="agent_code">Agent Code</label>
                                            <select class="agent-select @error('agent_code') is-invalid @enderror"
                                                name="agent_code">
                                                <option value="{{ old('agent_code', $ab->agent_code) }}">
                                                    {{ old('agent_code', $ab->agent_code) }}
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
                                            <label for="agent_name">Agent Name </label>
                                            <input type="agent_name" value="{{ old('agent_name', $ab->agent_name) }}"
                                                class="form-control @error('agent_name') is-invalid @enderror"
                                                name="agent_name" id="agent_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="air_dept_code">Airport of Departure <span
                                                    style="color: red;">*</span></label>
                                            <select class="airdept-select @error('air_dept_code') is-invalid @enderror"
                                                id="airdept-select-1" name="air_dept_code" required>
                                                <option value="{{ old('air_dept_code', $ab->air_dept_code) }}">
                                                    {{ old('air_dept_code', $ab->air_dept_code) }}
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
                                            <input type="text" readonly
                                                class="form-control airdept-name @error('air_dept_name') is-invalid @enderror"
                                                name="air_dept_name"
                                                value="{{ old('air_dept_name', $ab->air_dept_name) }}"
                                                id="airdept-name-1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="air_dest_code">Airport of Destination <span
                                                    style="color: red;">*</span></label>
                                            <select class="airdest-select @error('air_dest_code') is-invalid @enderror"
                                                id="airdest-select-1" name="air_dest_code" required>
                                                <option value="{{ old('air_dest_code', $ab->air_dest_code) }}">
                                                    {{ old('air_dest_code', $ab->air_dest_code) }}
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
                                            <input type="text" readonly
                                                class="form-control airdest-name @error('air_dest_name') is-invalid @enderror"
                                                name="air_dest_name"
                                                value="{{ old('air_dest_name', $ab->air_dest_name) }}"
                                                id="airdest-name-1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country_origin_code">Country of Origin </label>
                                    <select class="country-select @error('country_origin_code') is-invalid @enderror"
                                        id="country-select-1" name="country_origin_code">
                                        <option value="{{ old('country_origin_code', $ab->country_origin_code) }}">
                                            {{ old('country_origin_code', $ab->country_origin_code) }}
                                        </option>
                                    </select>
                                    @error('country_origin_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="delivery_type_code">Delivery Type </label>
                                            <select
                                                class="deltype-select @error('delivery_type_code') is-invalid @enderror"
                                                name="delivery_type_code">
                                                <option value="{{ old('delivery_type_code', $ab->delivery_type_code) }}">
                                                    {{ old('delivery_type_code', $ab->delivery_type_code) }}</option>
                                            </select>

                                            @error('delivery_type_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="delivery_type_name"> </label>
                                            <input type="text" readonly class="form-control"
                                                value="{{ old('delivery_type_name', $ab->delivery_type_name) }}"
                                                name="delivery_type_name" id="delivery_type_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="commodity_code">Commodity </label>
                                            <select class="commodity-select @error('commodity_code') is-invalid @enderror"
                                                name="commodity_code">
                                                <option value="{{ old('commodity_code', $ab->commodity_code) }}">
                                                    {{ old('commodity_code', $ab->commodity_code) }}
                                                </option>
                                            </select>

                                            @error('commodity_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="commodity"> </label>
                                            <input type="text" value="{{ old('commodity', $ab->commodity) }}" readonly
                                                class="form-control @error('commodity') is-invalid @enderror"
                                                name="commodity" id="commodity">
                                            @error('commodity')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="service_level">Service Level</label>
                                    <input type="service_level" value="{{ old('service_level', $ab->service_level) }}"
                                        class="form-control @error('service_level') is-invalid @enderror"
                                        name="service_level" id="service_level">
                                    @error('service_level')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="job_no">Job No</label>
                                            <input type="text"
                                                class="form-control @error('job_no') is-invalid @enderror" readonly
                                                name="job_no" value="{{ old('job_no', $ab->job_no) }}" id="job_no">
                                            @error('job_no')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="job_type">Job Type</label>
                                            <select class="select-2 @error('job_type') is-invalid @enderror job-type"
                                                required name="job_type">
                                                @foreach ($job_type as $item)
                                                    <option value="{{ $item->type }}" @selected(old('job_type', $ab->job_type) == 'AE')>
                                                        {{ $item->type }}
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
                                    <label for="job_date">Job Date</label>
                                    <input type="text"
                                        value="{{ old('job_date', date('Y/m/d', strtotime($ab->job_date))) }}"
                                        autocomplete="off" readonly
                                        class="form-control @error('job_date') is-invalid @enderror" name="job_date"
                                        id="job_date">
                                    @error('job_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="import_job_no">Import Job No</label>
                                    <input type="text"
                                        class="form-control @error('import_job_no') is-invalid @enderror"
                                        name="import_job_no" value="{{ old('import_job_no', $ab->import_job_no) }}"
                                        id="import_job_no">
                                    @error('import_job_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nomination_cargo">Nomination Cargo</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="nomination_cargo" @checked(old('nomination_cargo', $ab->nomination_cargo) == 'yes')
                                            value="yes" data-toggle="toggle" data-on="Yes" data-off="No"
                                            data-onstyle="primary" data-offstyle="danger">
                                        @error('nomination_cargo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="shipmode">Shipment Mode </label>
                                    <select class="select-2 @error('shipmode') is-invalid @enderror" name="shipmode">
                                        <option value=""></option>
                                        <option value="ROUTING ORDER" @selected(old('shipmode', $ab->shipmode) == 'ROUTING ORDER')>ROUTING ORDER</option>
                                        <option value="FREE HANDS" @selected(old('shipmode', $ab->shipmode) == 'FREE HANDS')>FREE HANDS</option>
                                        <option value="TRANSIT" @selected(old('shipmode', $ab->shipmode) == 'TRANSIT')>TRANSIT</option>
                                    </select>
                                    @error('shipmode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="shipment_type">Shipment Type</label>
                                    <select class="select-2 @error('shipment_type') is-invalid @enderror"
                                        name="shipment_type">
                                        <option value="HOUSE" @selected(old('shipment_type', $ab->shipment_type) == 'HOUSE')>HOUSE</option>
                                        <option value="DIRECT" @selected(old('shipment_type', $ab->shipment_type) == 'DIRECT')>DIRECT</option>
                                        <option value="SUB-MASTER" @selected(old('shipment_type', $ab->shipment_type) == 'SUB-MASTER')>SUB-MASTER</option>
                                    </select>
                                    @error('shipment_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="awb_no">Awb No. </label>
                                            <input type="awb_no" value="{{ old('awb_no', $ab->awb_no) }}"
                                                class="form-control @error('awb_no') is-invalid @enderror" name="awb_no"
                                                id="awb_no">
                                            @error('awb_no')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mawb_no">Mawb No. </label>
                                            <input type="mawb_no" value="{{ old('mawb_no', $ab->mawb_no) }}"
                                                class="form-control @error('mawb_no') is-invalid @enderror"
                                                name="mawb_no" id="mawb_no">
                                            @error('mawb_no')
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
                                            <label for="weight_val_flag">Wt/Val ?</label>
                                            <select class="select-2 @error('weight_val_flag') is-invalid @enderror"
                                                name="weight_val_flag">
                                                <option value="PREPAID" @selected(old('weight_val_flag', $ab->weight_val_flag) == 'PREPAID')>PREPAID</option>
                                                <option value="COLLECT" @selected(old('weight_val_flag', $ab->weight_val_flag) == 'COLLECT')>COLLECT</option>
                                            </select>
                                            @error('weight_val_flag')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_flag">Other ?</label>
                                            <select class="select-2 @error('other_flag') is-invalid @enderror"
                                                name="other_flag">
                                                <option value="PREPAID" @selected(old('other_flag', $ab->other_flag) == 'PREPAID')>PREPAID</option>
                                                <option value="COLLECT" @selected(old('other_flag', $ab->other_flag) == 'COLLECT')>COLLECT</option>
                                            </select>
                                            @error('other_flag')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label for="notify_code">Notify Code</label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <select class="notify-select @error('notify_code') is-invalid @enderror"
                                                name="notify_code">
                                                <option value="{{ old('notify_code', $ab->notify_code) }}">
                                                    {{ old('notify_code', $ab->notify_code) }}
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
                                    <div class="col-md-4">
                                        <label for="notify_name">Notify Name</label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <input type="text" value="{{ old('notify_name', $ab->notify_name) }}"
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
                                    <div class="col-md-4">
                                        <label for="notify_address_1">Notify Address</label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <input type="text"
                                                value="{{ old('notify_address_1', $ab->notify_address_1) }}"
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
                                    <div class="col-md-4">
                                        <label for="notify_address_2"></label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <input type="text"
                                                value="{{ old('notify_address_2', $ab->notify_address_2) }}"
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
                                    <div class="col-md-4">
                                        <label for="notify_address_3"></label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <input type="text"
                                                value="{{ old('notify_address_3', $ab->notify_address_3) }}"
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
                                    <div class="col-md-4">
                                        <label for="notify_address_4"></label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <input type="text"
                                                value="{{ old('notify_address_4', $ab->notify_address_4) }}"
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
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label for="overseas_agent_code">Overseas Agent Code</label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <select
                                                class="overseas_agent-select @error('overseas_agent_code') is-invalid @enderror"
                                                name="overseas_agent_code">
                                                <option
                                                    value="{{ old('overseas_agent_code', $ab->overseas_agent_code) }}">
                                                    {{ old('overseas_agent_code', $ab->overseas_agent_code) }}</option>
                                            </select>

                                            @error('overseas_agent_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label for="overseas_agent_name">Overseas Agent Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text"
                                                value="{{ old('overseas_agent_name', $ab->overseas_agent_name) }}"
                                                placeholder="Overseas Agent Name"
                                                class="form-control @error('overseas_agent_name') is-invalid @enderror"
                                                name="overseas_agent_name">
                                            @error('overseas_agent_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label for="overseas_agent_address_1">Overseas Agent Address</label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <input type="text"
                                                value="{{ old('overseas_agent_address_1', $ab->overseas_agent_address_1) }}"
                                                placeholder="Overseas Agent Address 1"
                                                class="form-control @error('overseas_agent_address_1') is-invalid @enderror"
                                                name="overseas_agent_address_1">
                                            @error('overseas_agent_address_1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="overseas_agent_address_2"></label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <input type="text"
                                                value="{{ old('overseas_agent_address_2', $ab->overseas_agent_address_2) }}"
                                                placeholder="Overseas Agent Address 2"
                                                class="form-control @error('overseas_agent_address_2') is-invalid @enderror"
                                                name="overseas_agent_address_2">
                                            @error('overseas_agent_address_2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="overseas_agent_address_3"></label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <input type="text"
                                                value="{{ old('overseas_agent_address_3', $ab->overseas_agent_address_3) }}"
                                                placeholder="Overseas Agent Address 3"
                                                class="form-control @error('overseas_agent_address_3') is-invalid @enderror"
                                                name="overseas_agent_address_3">
                                            @error('overseas_agent_address_3')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="overseas_agent_address_4"></label>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="form-group">
                                            <input type="text"
                                                value="{{ old('overseas_agent_address_4', $ab->overseas_agent_address_4) }}"
                                                placeholder="Overseas Agent Address 4"
                                                class="form-control @error('overseas_agent_address_4') is-invalid @enderror"
                                                name="overseas_agent_address_4">
                                            @error('overseas_agent_address_4')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: -12px">
                                        <div class="form-group">
                                            <label for="footnote">Footnote</label>
                                            <textarea name="footnote" id="footnote" cols="30" rows="5"
                                                class="form-control @error('footnote') is-invalid @enderror">{{ old('footnote', $ab->footnote) }}</textarea>
                                            @error('footnote')
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
                                <label for="to_dest_code_1">First Flight To</label>
                            </div>
                            <div class="col-md-10 mt-2">
                                <div class="row" style="overflow:auto;">
                                    <div class="d-flex flex-row">
                                        <div class="p-2" style="width: 20%">
                                            <select class="flight-select @error('to_dest_code_1') is-invalid @enderror"
                                                name="to_dest_code_1">
                                                <option value="{{ old('to_dest_code_1', $ab->to_dest_code_1) }}">
                                                    {{ old('to_dest_code_1', $ab->to_dest_code_1) }}
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
                                                class="airline-select @error('by_airline_id_1') is-invalid @enderror">
                                                <option value="{{ old('by_airline_id_1', $ab->by_airline_id_1) }}">
                                                    {{ old('by_airline_id_1', $ab->by_airline_id_1) }}</option>
                                            </select>
                                            @error('by_airline_id_1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="number"
                                                class="form-control @error('flight_no_1') is-invalid @enderror"
                                                name="flight_no_1" placeholder="First Flight No" title="First Flight No"
                                                value="{{ old('flight_no_1', $ab->flight_no_1) }}" id="flight_no_1">
                                            @error('flight_no_1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-1 my-2">On</div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text"
                                                value="{{ old('flight_date_1', empty($ab->flight_date_1) ? '' : date('Y/m/d H:i', strtotime($ab->flight_date_1))) }}"
                                                autocomplete="off" required placeholder="First Flight Date"
                                                class="form-control @error('flight_date_1') is-invalid @enderror date-time-picker"
                                                name="flight_date_1" id="flight_date_1">
                                            @error('flight_date_1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text"
                                                value="{{ old('eta_date_1', empty($ab->eta_date_1) ? '' : date('Y/m/d H:i', strtotime($ab->eta_date_1))) }}"
                                                autocomplete="off" placeholder="First Eta Date"
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
                                <label for="to_dest_code_2">Second Flight To</label>
                            </div>
                            <div class="col-md-10 mt-2">
                                <div class="row" style="overflow:auto;">
                                    <div class="d-flex flex-row">
                                        <div class="p-2" style="width: 20%">
                                            <select class="flight-select @error('to_dest_code_2') is-invalid @enderror"
                                                name="to_dest_code_2">
                                                <option value="{{ old('to_dest_code_2', $ab->to_dest_code_2) }}">
                                                    {{ old('to_dest_code_2', $ab->to_dest_code_2) }}
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
                                                <option value="{{ old('by_airline_id_2', $ab->by_airline_id_2) }}">
                                                    {{ old('by_airline_id_2', $ab->by_airline_id_2) }}</option>
                                            </select>
                                            @error('by_airline_id_2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="number"
                                                class="form-control @error('flight_no_2') is-invalid @enderror"
                                                name="flight_no_2" placeholder="Second Flight No"
                                                title="Second Flight No"
                                                value="{{ old('flight_no_2', $ab->flight_no_2) }}" id="flight_no_2">
                                            @error('flight_no_2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-1 my-2">On</div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text"
                                                value="{{ old('flight_date_2', empty($ab->flight_date_2) ? '' : date('Y/m/d H:i', strtotime($ab->flight_date_2))) }}"
                                                autocomplete="off" placeholder="Second Flight Date"
                                                class="form-control @error('flight_date_2') is-invalid @enderror date-time-picker"
                                                name="flight_date_2" id="flight_date_2">
                                            @error('flight_date_2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text"
                                                value="{{ old('eta_date_2', empty($ab->eta_date_2) ? '' : date('Y/m/d H:i', strtotime($ab->eta_date_2))) }}"
                                                autocomplete="off" placeholder="Second Eta Date"
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
                                <label for="to_dest_code_3">Third Flight To</label>
                            </div>
                            <div class="col-md-10 mt-2">
                                <div class="row" style="overflow:auto;">
                                    <div class="d-flex flex-row">
                                        <div class="p-2" style="width: 20%">
                                            <select class="flight-select @error('to_dest_code_3') is-invalid @enderror"
                                                name="to_dest_code_3">
                                                <option value="{{ old('to_dest_code_3', $ab->to_dest_code_3) }}">
                                                    {{ old('to_dest_code_3', $ab->to_dest_code_3) }}
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
                                                <option value="{{ old('by_airline_id_3', $ab->by_airline_id_3) }}">
                                                    {{ old('by_airline_id_3', $ab->by_airline_id_3) }}</option>
                                            </select>
                                            @error('by_airline_id_3')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="number"
                                                class="form-control @error('flight_no_3') is-invalid @enderror"
                                                name="flight_no_3" placeholder="Third Flight No" title="Third Flight No"
                                                value="{{ old('flight_no_3', $ab->flight_no_3) }}" id="flight_no_3">
                                            @error('flight_no_3')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-1 my-2">On</div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text"
                                                value="{{ old('flight_date_3', empty($ab->flight_date_3) ? '' : date('Y/m/d H:i', strtotime($ab->flight_date_3))) }}"
                                                autocomplete="off" placeholder="Third Flight Date"
                                                class="form-control @error('flight_date_3') is-invalid @enderror date-time-picker"
                                                name="flight_date_3" id="flight_date_3">
                                            @error('flight_date_3')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text"
                                                value="{{ old('eta_date_3', empty($ab->eta_date_3) ? '' : date('Y/m/d H:i', strtotime($ab->eta_date_3))) }}"
                                                autocomplete="off" placeholder="Third Eta Date"
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
                                <label for="to_dest_code_4">Fourth Flight To</label>
                            </div>
                            <div class="col-md-10 mt-2">
                                <div class="row" style="overflow:auto;">
                                    <div class="d-flex flex-row">
                                        <div class="p-2" style="width: 20%">
                                            <select class="flight-select @error('to_dest_code_4') is-invalid @enderror"
                                                name="to_dest_code_4">
                                                <option value="{{ old('to_dest_code_4', $ab->to_dest_code_4) }}">
                                                    {{ old('to_dest_code_4', $ab->to_dest_code_4) }}
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
                                                <option value="{{ old('by_airline_id_4', $ab->by_airline_id_4) }}">
                                                    {{ old('by_airline_id_4', $ab->by_airline_id_4) }}</option>
                                            </select>
                                            @error('by_airline_id_4')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="number"
                                                class="form-control @error('flight_no_4') is-invalid @enderror"
                                                name="flight_no_4" placeholder="Fourth Flight No"
                                                title="Fourth Flight No"
                                                value="{{ old('flight_no_4', $ab->flight_no_4) }}" id="flight_no_4">
                                            @error('flight_no_4')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-1 my-2">On</div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text"
                                                value="{{ old('flight_date_4', empty($ab->flight_date_4) ? '' : date('Y/m/d H:i', strtotime($ab->flight_date_4))) }}"
                                                autocomplete="off" placeholder="Fourth Flight Date"
                                                class="form-control @error('flight_date_4') is-invalid @enderror date-time-picker"
                                                name="flight_date_4" id="flight_date_4">
                                            @error('flight_date_4')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text"
                                                value="{{ old('eta_date_4', empty($ab->eta_date_4) ? '' : date('Y/m/d H:i', strtotime($ab->eta_date_4))) }}"
                                                autocomplete="off" placeholder="Fourth Eta Date"
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
                        <div class="row align-items-center">
                            <div class="col-md-2 mt-2">
                                <label for="pcs">Pcs/Weight/Volume</label>
                            </div>
                            <div class="col-md-10 mt-2">
                                <div class="row" style="overflow:auto;">
                                    <div class="d-flex flex-row">

                                        <div class="p-2" style="width: 15%">
                                            <input type="text" value="{{ old('pcs', $ab->pcs) }}" title="Pcs/Rcp"
                                                placeholder="Pcs/Rcp" data-type='currency0' maxlength="10"
                                                autocomplete="off"
                                                class="form-control @error('pcs') is-invalid @enderror" name="pcs"
                                                id="pcs">
                                            @error('pcs')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-2" style="width: 12%">
                                            <select name="uom_code"
                                                class="uom-select @error('uom_code') is-invalid @enderror">
                                                <option value="{{ old('uom_code', $ab->uom_code) }}">
                                                    {{ old('uom_code', $ab->uom_code) }}</option>
                                            </select>
                                            @error('uom_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text" class="form-control @error('uom') is-invalid @enderror"
                                                readonly name="uom" value="{{ old('uom', $ab->uom) }}"
                                                id="uom">
                                            @error('uom')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-1 my-2">/</div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text" data-type='currency4' autocomplete="off"
                                                title="Gross Weight" placeholder="Gross Weight"
                                                value="{{ old('gross_weight', number_format($ab->gross_weight, 4, '.', ',')) }}"
                                                class="form-control @error('gross_weight') is-invalid @enderror"
                                                name="gross_weight" id="gross_weight">
                                            @error('gross_weight')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-1 my-2">KGS /</div>
                                        <div class="p-2" style="width: 20%">
                                            <input type="text" data-type='currency4' autocomplete="off"
                                                title="Volume Weight"
                                                value="{{ old('volume_weight', number_format($ab->volume_weight, 4, '.', ',')) }}"
                                                placeholder="Volume Weight"
                                                class="form-control @error('volume_weight') is-invalid @enderror"
                                                name="volume_weight" id="volume_weight">
                                            @error('volume_weight')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="p-1 my-2">m3</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="footer_1">Booking Remark </label>
                                            <input type="text" value="{{ old('footer_1', $ab->footer_1) }}"
                                                class="form-control @error('footer_1') is-invalid @enderror"
                                                placeholder="Remark 1" name="footer_1" id="footer_1">
                                            @error('footer_1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="footer_2">&nbsp; </label>
                                            <input type="text" value="{{ old('footer_2', $ab->footer_2) }}"
                                                class="form-control @error('footer_2') is-invalid @enderror"
                                                name="footer_2" placeholder="Remark 2" id="footer_2">
                                            @error('footer_2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="footer_3">&nbsp; </label>
                                            <input type="text" value="{{ old('footer_3', $ab->footer_3) }}"
                                                class="form-control @error('footer_3') is-invalid @enderror"
                                                name="footer_3" placeholder="Remark 3" id="footer_3">
                                            @error('footer_3')
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
                                            <label for="footer_4">&nbsp; </label>
                                            <input type="text" value="{{ old('footer_4', $ab->footer_4) }}"
                                                class="form-control @error('footer_4') is-invalid @enderror"
                                                name="footer_4" placeholder="Remark 4" id="footer_4">
                                            @error('footer_4')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="footer_5">&nbsp; </label>
                                            <input type="text" value="{{ old('footer_5', $ab->footer_5) }}"
                                                class="form-control @error('footer_5') is-invalid @enderror"
                                                name="footer_5" placeholder="Remark 5" id="footer_5">
                                            @error('footer_5')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="footer_6">&nbsp; </label>
                                            <input type="text" value="{{ old('footer_6', $ab->footer_6) }}"
                                                class="form-control @error('footer_6') is-invalid @enderror"
                                                name="footer_6" placeholder="Remark 6" id="footer_6">
                                            @error('footer_6')
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
                                            <label for="footer_7">&nbsp; </label>
                                            <input type="text" value="{{ old('footer_7', $ab->footer_7) }}"
                                                class="form-control @error('footer_7') is-invalid @enderror"
                                                name="footer_7" placeholder="Remark 7" id="footer_7">
                                            @error('footer_7')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="footer_8">&nbsp; </label>
                                            <input type="text" value="{{ old('footer_8', $ab->footer_8) }}"
                                                class="form-control @error('footer_8') is-invalid @enderror"
                                                name="footer_8" placeholder="Remark 8" id="footer_8">
                                            @error('footer_8')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="footer_9">&nbsp; </label>
                                            <input type="text" value="{{ old('footer_9', $ab->footer_9) }}"
                                                class="form-control @error('footer_9') is-invalid @enderror"
                                                name="footer_9" placeholder="Remark 9" id="footer_9">
                                            @error('footer_9')
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
                            <div class="col-md-6 d-flex">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Extra Info</h5>
                                        <div class="row align-items-center">
                                            @foreach ($add_info as $key => $item)
                                                <div class="col-md-5">
                                                    <label
                                                        for="{{ str_replace('k', 'v', $key) }}">{{ $item }}</label>
                                                </div>
                                                @php
                                                    $replace = str_replace('k', 'v', $key) ?? 'vb1';
                                                @endphp
                                                @if (strstr($key, 'kb'))
                                                    <div class="col-md-7 mt-2">
                                                        <div class="form-group">
                                                            <input type="checkbox"
                                                                name="{{ str_replace('k', 'v', $key) }}"
                                                                @checked(old(str_replace('k', 'v', $key), !empty($add_info_d1) ? $add_info_d1->$replace : null) == 'yes')
                                                                value="{{ old(str_replace('k', 'v', $key), 'yes') }}"
                                                                data-toggle="toggle" data-on="Yes" data-off="No"
                                                                data-onstyle="primary" data-offstyle="danger">
                                                            @error(str_replace('k', 'v', $key))
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @elseif (strstr($key, 'kd'))
                                                    <div class="col-md-7 mt-2">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                value="{{ old(str_replace('k', 'v', $key), !empty($add_info_d1->$replace) ? date('d/m/Y', strtotime($add_info_d1->$replace)) : null) }}"
                                                                class="form-control @error(str_replace('k', 'v', $key)) is-invalid @enderror date-picker"
                                                                autocomplete="off"
                                                                name="{{ str_replace('k', 'v', $key) }}">
                                                            @error(str_replace('k', 'v', $key))
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @elseif (strstr($key, 'kdt'))
                                                    <div class="col-md-7 mt-2">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                value="{{ old(str_replace('k', 'v', $key), !empty($add_info_d1->$replace) ? date('Y/m/d H:i', strtotime($add_info_d1->$replace)) : null) }}"
                                                                class="form-control @error(str_replace('k', 'v', $key)) is-invalid @enderror date-time-picker"
                                                                autocomplete="off"
                                                                name="{{ str_replace('k', 'v', $key) }}">
                                                            @error(str_replace('k', 'v', $key))
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @elseif (strstr($key, 'kn'))
                                                    <div class="col-md-7 mt-2">
                                                        <div class="form-group">
                                                            <input type="number"
                                                                value="{{ old(str_replace('k', 'v', $key), !empty($add_info_d1) ? $add_info_d1->$replace : null) }}"
                                                                class="form-control @error(str_replace('k', 'v', $key)) is-invalid @enderror"
                                                                autocomplete="off"
                                                                name="{{ str_replace('k', 'v', $key) }}">
                                                            @error(str_replace('k', 'v', $key))
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-md-7 mt-2">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                value="{{ old(str_replace('k', 'v', $key), !empty($add_info_d1) ? $add_info_d1->$replace : null) }}"
                                                                class="form-control @error(str_replace('k', 'v', $key)) is-invalid @enderror"
                                                                autocomplete="off"
                                                                name="{{ str_replace('k', 'v', $key) }}">
                                                            @error(str_replace('k', 'v', $key))
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Dimension</h5>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <select class="select-2 @error('satuan_dimension') is-invalid @enderror"
                                                    name="satuan_dimension">
                                                    <option value=""></option>
                                                    <option value="CM" @selected(old('satuan_dimension', $ab->satuan_dimension) == 'CM')>CM</option>
                                                    <option value="IN" @selected(old('satuan_dimension', $ab->satuan_dimension) == 'IN')>IN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 my-2" style="overflow:auto;">
                                                <table id="table-condition"
                                                    class="table table-bordered table-sm table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center th-action" style="min-width: 120px;">
                                                                Action </th>
                                                            <th class="text-center" style="min-width: 200px;"> S/No
                                                            </th>
                                                            <th class="text-center" style="min-width: 200px;"> Loose Qty
                                                            </th>
                                                            <th class="text-center" style="min-width: 200px;"> Pcs/Rcp
                                                            </th>
                                                            <th class="text-center" style="min-width: 200px;"> Uom </th>
                                                            <th class="text-center" style="min-width: 200px;"> Length
                                                            </th>
                                                            <th class="text-center" style="min-width: 200px;"> Width
                                                            </th>
                                                            <th class="text-center" style="min-width: 200px;"> Height
                                                            </th>
                                                            <th class="text-center" style="min-width: 200px;"> Dimension
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="tbody-condition" id="tbody-condition-1">
                                                        @if (count($ab->a_d1) > 0)
                                                            @foreach ($ab->a_d1 as $key => $val)
                                                                <tr class="dynamic-field"
                                                                    id="dynamic-field-{{ $key + 1 }}">
                                                                    <td class="text-center">
                                                                        <button type="button"
                                                                            onclick="addNewField(this.id)"
                                                                            id="add-button-{{ $key + 1 }}"
                                                                            class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                                                                class="fa fa-plus fa-fw"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            onclick="removeLastField(this)"
                                                                            id="remove-button-{{ $key + 1 }}"
                                                                            class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                                                                class="fa fa-minus fa-fw"></i>
                                                                        </button>

                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="number" name="s_no[]"
                                                                                class="form-control s-no"
                                                                                id="s-no-{{ $key + 1 }}" readonly
                                                                                value="{{ $val->s_no }}">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="number" name="loose_qty[]"
                                                                                class="form-control loose-qty"
                                                                                value="{{ $val->loose_qty }}"
                                                                                id="loose-qty-{{ $key + 1 }}">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="number" name="pcs_rcp[]"
                                                                                class="form-control pcs-rcp"
                                                                                data-pcs="1"
                                                                                id="pcs-rcp-{{ $key + 1 }}"
                                                                                value="{{ $val->pcs_rcp }}"
                                                                                onkeyup="sumDimension({{ $key + 1 }}, 1)">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <select name="uom_d1[]"
                                                                                id="uom-d1-{{ $key + 1 }}"
                                                                                class="uom-d1">
                                                                                <option value="{{ $val->uom_d1 }}">
                                                                                    {{ $val->uom_d1 }}</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                class="form-control length"
                                                                                id="length-{{ $key + 1 }}"
                                                                                autocomplete="off"
                                                                                value="{{ number_format($val->length, 1, '.', ',') }}"
                                                                                onkeyup="sumDimension({{ $key + 1 }}, 1)"
                                                                                data-type='currency1' name="length[]">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                class="form-control width"
                                                                                id="width-{{ $key + 1 }}"
                                                                                autocomplete="off"
                                                                                value="{{ number_format($val->width, 1, '.', ',') }}"
                                                                                onkeyup="sumDimension({{ $key + 1 }}, 1)"
                                                                                data-type='currency1' name="width[]">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                class="form-control height"
                                                                                id="height-{{ $key + 1 }}"
                                                                                autocomplete="off"
                                                                                value="{{ number_format($val->height, 1, '.', ',') }}"
                                                                                onkeyup="sumDimension({{ $key + 1 }}, 1)"
                                                                                data-type='currency1' name="height[]">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="hidden"
                                                                                id="sum-m3-{{ $key + 1 }}"
                                                                                name="sum_m3[]" class="sum-m3"
                                                                                value="1" data-m3="1">
                                                                            <input type="hidden"
                                                                                id="sum-volwt-{{ $key + 1 }}"
                                                                                name="sum_volwt[]" class="sum-volwt"
                                                                                value="{{ $val->sum_volwt }}"
                                                                                data-volwt="1">
                                                                            <input type="text"
                                                                                class="form-control dimension"
                                                                                id="dimension-{{ $key + 1 }}"
                                                                                data-dimension="1" autocomplete="off"
                                                                                readonly data-type='currency1'
                                                                                value="{{ number_format($val->dimension, 1, '.', ',') }}"
                                                                                name="dimension[]">
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr class="dynamic-field" id="dynamic-field-1">
                                                                <td class="text-center">
                                                                    <button type="button"
                                                                        onclick="addNewField(this.id)" id="add-button-1"
                                                                        class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                                                            class="fa fa-plus fa-fw"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                        onclick="removeLastField(this)"
                                                                        id="remove-button-1"
                                                                        class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                                                            class="fa fa-minus fa-fw"></i>
                                                                    </button>

                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="number" name="s_no[]"
                                                                            class="form-control s-no" id="s-no-1"
                                                                            readonly value="1">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="number" name="loose_qty[]"
                                                                            class="form-control loose-qty"
                                                                            id="loose-qty-1">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="number" name="pcs_rcp[]"
                                                                            class="form-control pcs-rcp" data-pcs="1"
                                                                            id="pcs-rcp-1" onkeyup="sumDimension(1, 1)">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <select name="uom_d1[]" id="uom-d1-1"
                                                                            class="uom-d1">
                                                                            <option value="">Search</option>
                                                                        </select>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control length" id="length-1"
                                                                            autocomplete="off"
                                                                            onkeyup="sumDimension(1, 1)"
                                                                            data-type='currency1' name="length[]">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control width"
                                                                            id="width-1" autocomplete="off"
                                                                            onkeyup="sumDimension(1, 1)"
                                                                            data-type='currency1' name="width[]">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control height" id="height-1"
                                                                            autocomplete="off"
                                                                            onkeyup="sumDimension(1, 1)"
                                                                            data-type='currency1' name="height[]">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" id="sum-m3-1"
                                                                            class="sum-m3" data-m3="1">
                                                                        <input type="hidden" id="sum-volwt-1"
                                                                            class="sum-volwt" data-volwt="1">
                                                                        <input type="text"
                                                                            class="form-control dimension"
                                                                            id="dimension-1" data-dimension="1"
                                                                            autocomplete="off" readonly
                                                                            data-type='currency1' name="dimension[]">
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6 d-flex justify-content-end">
                                                        <div class="form-group">
                                                            <label for="total_m3">Total M3</label>
                                                            <input type="text" data-type='currency0' readonly
                                                                title="Total M3"
                                                                class="form-control @error('total_m3') is-invalid @enderror total-m3"
                                                                name="total_m3" id="total-m3-1"
                                                                value="{{ old('total_m3', number_format($ab->total_m3, 3, '.', ',')) }}">
                                                            @error('total_m3')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex justify-content-end">
                                                        <div class="form-group">
                                                            <label for="total_dimension">Total Dimension</label>
                                                            <input type="text" data-type='currency0' readonly
                                                                title="Total Dimension"
                                                                class="form-control @error('total_dimension') is-invalid @enderror total-dimension"
                                                                name="total_dimension" id="total-dimension-1"
                                                                value="{{ old('total_dimension', number_format($ab->total_dimension, 1, '.', ',')) }}">
                                                            @error('total_dimension')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex justify-content-end">
                                                        <div class="form-group">
                                                            <label for="total_pcs">Total Pcs</label>
                                                            <input type="text" data-type='currency0' readonly
                                                                title="Total Pcs"
                                                                class="form-control @error('total_pcs') is-invalid @enderror total-pcs"
                                                                name="total_pcs" id="total-pcs-1"
                                                                value="{{ old('total_pcs', $ab->total_pcs) }}">
                                                            @error('total_pcs')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex justify-content-end">
                                                        <div class="form-group">
                                                            <label for="total_vol_wt">Total Volume Weight</label>
                                                            <input type="text" data-type='currency0' readonly
                                                                title="Total Volume Weight"
                                                                class="form-control @error('total_vol_wt') is-invalid @enderror total-volwt"
                                                                name="total_vol_wt" id="total-volwt-1"
                                                                value="{{ old('total_vol_wt', number_format($ab->total_vol_wt, 1, '.', ',')) }}">
                                                            @error('total_vol_wt')
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
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="{{ route('air_book.index') }}" class="btn btn-danger btn-back">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Search Quotation -->
    <div class="modal fade" id="modal-aq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search Quotation</h5>
                </div>
                <div class="modal-body">
                    <div class="table-responsive p-0">
                        <table id="tableQuot"
                            class="modal-table1 table modal-tableview table-bordered table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>No</th>
                                    <th class="select-filter">Quotation No</th>
                                    <th class="select-filter">Airport Departure</th>
                                    <th class="select-filter">Airport Destination</th>
                                    <th class="select-filter">Commodity</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-quot">
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

    <!-- Modal Search Customer -->
    <div class="modal fade" id="modal-cus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search Customer</h5>
                </div>
                <div class="modal-body">
                    <div class="table-responsive p-0">
                        <table id="tableCus"
                            class="modal-table1 table modal-tableview table-bordered table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>No</th>
                                    <th class="select-filter">Customer</th>
                                    <th class="select-filter">Quotation No</th>
                                    <th class="select-filter">Airport Departure</th>
                                    <th class="select-filter">Airport Destination</th>
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
@endsection
@section('script')
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        let maxFields = MAX_FIELD;
        let buttonAddSub = $("#add-button-1");
        let buttonRemoveSub = $("#remove-button-1");
        let className = ".dynamic-field";
        let addButton = ".add-button";
        let removeButton = ".remove-button";
        let s_no = ".s-no";
        let loose_qty = ".loose-qty";
        let pcs_rcp = ".pcs-rcp";
        let uom_d1 = ".uom-d1";
        let length = ".length";
        let width = ".width";
        let height = ".height";
        let dimension = ".dimension";
        let total_volwt = ".total-volwt";
        let sum_volwt = ".sum-volwt";
        let total_dimension = ".total-dimension";
        let total_pcs = ".total-pcs";
        let total_m3 = ".total-m3";
        let sum_m3 = ".sum-m3";
        let countSub = 0;
        let field = "";

        function totalFieldSub() {
            return $(className).length;
        }

        function addNewField(obj) {
            if (totalFieldSub() < maxFields) {
                let timeSub = Math.floor(Date.now() / 1000);
                countSub = totalFieldSub() + timeSub + Math.floor(Math.random() * 999) + 1;

                field = $(`#dynamic-field-1`).clone();
                field.attr("id", "dynamic-field-" + countSub);
                field.children("label").text("Field " + countSub);
                field.find("input").val("");
                field.find(".select2-container").remove();
                field.find(".select2-container").empty();
                field.find(pcs_rcp).attr("id", "pcs-rcp-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                    `sumDimension(${countSub}, 1)`);
                field.find(length).attr("id", "length-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                    `sumDimension(${countSub}, 1)`);
                field.find(width).attr("id", "width-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                    `sumDimension(${countSub}, 1)`);
                field.find(height).attr("id", "height-" + countSub).removeAttr("onkeyup").attr("onkeyup",
                    `sumDimension(${countSub}, 1)`);
                field.find(dimension).attr("id", "dimension-" + countSub);
                field.find(sum_m3).attr("id", "sum-m3-" + countSub);
                field.find(sum_volwt).attr("id", "sum-volwt-" + countSub);

                field.find(uom_d1).attr("id", "uom-d1-" + countSub).select2({
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

                $(className + ":last").after($(field));

                evtUom(`#uom-d1-1`, null);
                evtUom(`#uom-d1-${countSub}`, null);

                evtCountRowNumber();

                $("input[data-type='currency1']").on({
                    keyup: function() {
                        formatCurrency1($(this));
                    },
                    blur: function() {
                        formatCurrency1($(this), "blur");
                    }
                });
            } else {
                alert(`Maximum ${maxFields} line`);
            }
        }

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            dataTableQuotation('#tableQuot');
            dataTableCustomer('#tableCus');

            $(`.btn-quot`).click(function(e) {
                e.preventDefault();
                $(`#modal-aq`).modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            });

            $(`.btn-cus`).click(function(e) {
                e.preventDefault();
                $(`#modal-cus`).modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            });

            evtAllBisnisParty(".shipper-select", "input[name=shipper_name]");
            evtAllBisnisParty(".consignee-select", "input[name=consignee_name]");
            evtAllBisnisParty(".coloader-select", "input[name=coloader_name]");
            evtAllBisnisParty(".agent-select", "input[name=agent_name]");
            evtAllAddressBp('.notify-select', 'input[name=notify_name]', 'input[name=notify_address_1]',
                'input[name=notify_address_2]', 'input[name=notify_address_3]', 'input[name=notify_address_4]');
            evtAllAddressBp('.overseas_agent-select', 'input[name=overseas_agent_name]',
                'input[name=overseas_agent_address_1]',
                'input[name=overseas_agent_address_2]', 'input[name=overseas_agent_address_3]',
                'input[name=overseas_agent_address_4]');
            evtAirPort(`#airdept-select-1`, `#airdept-name-1`);
            evtAirPort(`#airdest-select-1`, `#airdest-name-1`);
            evtAirPortDest(`.flight-select`, null);
            evtAirLine(`.airline-select`, null);
            evtCommodity(".commodity-select", "input[name=commodity]");
            evtUom(".uom-select", "input[name=uom]");
            evtUom(".uom-d1", null);

            $('form').bind('submit', function() {
                $(this).find(':input').prop('disabled', false);
            });


            $('.select-2').select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
            });

            $("input[type=text]").keyup(function() {
                $(this).val($(this).val().toUpperCase());
            });

            $("input[data-type='currency']").on({
                keyup: function() {
                    formatCurrency($(this));
                },
                blur: function() {
                    formatCurrency($(this), "blur");
                }
            });

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

            $("input[data-type='currency4']").on({
                keyup: function() {
                    formatCurrency4($(this));
                },
                blur: function() {
                    formatCurrency4($(this), "blur");
                }
            });

            $("input[data-type='currency1']").on({
                keyup: function() {
                    formatCurrency1($(this));
                },
                blur: function() {
                    formatCurrency1($(this), "blur");
                }
            });

            $("input[data-type='currency_amt']").on({
                keyup: function() {
                    formatCurrencyAmt($(this));
                },
                blur: function() {
                    formatCurrencyAmt($(this), "blur");
                }
            });

            $('.country-select').select2({
                placeholder: 'Search country',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.country') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code} - ${item.name}`,
                                    id: item.code,
                                    idd_name: item.idd,
                                    country_name: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.deltype-select').select2({
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

            $(".deltype-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=delivery_type_name]").val(desc);
            });

        });

        function removeLastField(obj) {
            if ($(className).length > 1) {
                $(obj).closest(className).remove();
            } else {
                alert("Minimum 1 line");
            }
            evtCountRowNumber();
        }

        function evtCountRowNumber() {
            var obj_row_number = $('.dynamic-field .s-no');

            var num = 0;
            for (var i = 0; i < obj_row_number.length; i++) {
                num++;
                $(obj_row_number[i]).val(num);
            }
        }

        function sumDimension(evt = null, evt2 = null) {
            let pcs_sum = ($(`#pcs-rcp-${evt}`).val().split(',').join("") == '') ? 0 : parseFloat($(`#pcs-rcp-${evt}`).val()
                .split(',').join(""));
            let length_sum = ($(`#length-${evt}`).val().split(',').join("") == '') ? 0 : parseFloat($(`#length-${evt}`)
                .val()
                .split(',').join(""));
            let width_sum = ($(`#width-${evt}`).val().split(',').join("") == '') ? 0 : parseFloat($(`#width-${evt}`)
                .val()
                .split(',').join(""));
            let height_sum = ($(`#height-${evt}`).val().split(',').join("") == '') ? 0 : parseFloat($(`#height-${evt}`)
                .val()
                .split(',').join(""));

            let dimension_sum = 0;
            let total_sum_m3 = 0;
            let total_sum_volwt = 0;

            dimension_sum += pcs_sum * length_sum * width_sum * height_sum;
            total_sum_m3 += (pcs_sum * length_sum * width_sum * height_sum) / 1000000;
            total_sum_volwt += (pcs_sum * length_sum * width_sum * height_sum) / 6000;
            // ISI VALUE DIMENSION
            $(`#dimension-${evt}`).val(numberFormatter(dimension_sum));
            $(`#sum-m3-${evt}`).val(addCommas(total_sum_m3));
            $(`#sum-volwt-${evt}`).val(addCommas1(total_sum_volwt));
            if (evt2 != '') {
                sumOfTotalDimension(evt2);
                sumOfTotalM3(evt2);
                sumOfTotalPcs(evt2);
                sumOfTotalVolWWt(evt2);
            }
        }

        function addCommas(nStr) {
            nStr = parseFloat(nStr).toFixed(3);
            console.log(nStr);
            const checkIsNan = isNaN(nStr);
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            const rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            let result = x1 + x2;
            return checkIsNan ? 0 : result;
        }

        function addCommas1(nStr) {
            nStr = parseFloat(nStr).toFixed(1);
            console.log(nStr);
            const checkIsNan = isNaN(nStr);
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            const rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            let result = x1 + x2;
            return checkIsNan ? 0 : result;
        }

        function sumOfTotalDimension(num = null) {
            let dimension_num = $(`*[data-dimension="${num}"]`);
            let total = 0;
            let amt = 0

            for (let i = 0; i < dimension_num.length; i++) {
                if (!isNaN(parseFloat(dimension_num[i].value.split(',').join("")))) {
                    amt = parseFloat(dimension_num[i].value.split(',').join(""));
                    total += amt;
                }
            }

            $(`.total-dimension`).val(numberFormatter(total));
        }

        function sumOfTotalM3(num = null) {
            let m3_num = $(`*[data-m3="${num}"]`);
            let total = 0;
            let amt = 0

            for (let i = 0; i < m3_num.length; i++) {
                if (!isNaN(parseFloat(m3_num[i].value.split(',').join("")))) {
                    amt = parseFloat(m3_num[i].value.split(',').join(""));
                    total += amt;
                }
            }

            $(`.total-m3`).val(addCommas(total));
        }

        function sumOfTotalPcs(num = null) {
            let pcs_num = $(`*[data-pcs="${num}"]`);
            let total = 0;
            let amt = 0

            for (let i = 0; i < pcs_num.length; i++) {
                if (!isNaN(parseFloat(pcs_num[i].value.split(',').join("")))) {
                    amt = parseFloat(pcs_num[i].value.split(',').join(""));
                    total += amt;
                }
            }

            $(`.total-pcs`).val(total);
        }

        function sumOfTotalVolWWt(num = null) {
            let volwt_num = $(`*[data-volwt="${num}"]`);
            let total = 0;
            let amt = 0

            for (let i = 0; i < volwt_num.length; i++) {
                if (!isNaN(parseFloat(volwt_num[i].value.split(',').join("")))) {
                    amt = parseFloat(volwt_num[i].value.split(',').join(""));
                    total += amt;
                }
            }

            $(`.total-volwt`).val(addCommas1(total));
        }

        function numberFormatter(num) {
            if (!isNaN(num)) {
                var wholeAndDecimal = String(num.toFixed(1)).split(".");
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

        function numberFormatter4(num) {
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

        function evtAllAddressBp(evt1 = null, evt2 = null, evt3 = null, evt4 = null, evt5 = null, evt6 = null) {
            $(evt1).select2({
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

        function evtAllBisnisParty(evt1 = null, evt2 = null) {
            $(evt1).select2({
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

            $(evt1).change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $(evt2).val(name);

            });
        }

        function dataTableQuotation(idTable) {
            var table = $(idTable).DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                ajax: {
                    url: '{{ route('get.table.air_quot') }}',
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
                        data: 'air_quotation.air_quot_no',
                        name: 'air_quotation.air_quot_no'
                    },

                    {
                        data: 'air_dept_name',
                        name: 'air_dept_name'
                    },
                    {
                        data: 'air_dest_name',
                        name: 'air_dest_name'
                    },
                    {
                        data: 'air_quotation.quotation.commodity',
                        name: 'air_quotation.quotation.commodity'
                    },
                ],
                columnDefs: [{
                    defaultContent: "-",
                    targets: "_all"
                }],

            });

            $(document).on('click', '.modal-table1 .tbody-quot td', function() {
                var colIdx = table.cell(this).index().row;
                if (table.rows(colIdx).nodes().to$().find('td:first-child .input_check').is(':checked') === true) {
                    table.rows(colIdx).nodes().to$().find('td:first-child .input_check').prop('checked', false);
                } else {
                    table.rows(colIdx).nodes().to$().find('td:first-child .input_check').prop('checked', true);

                    let id = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked').val();
                    let air_quotation_id = table.rows(colIdx).nodes().to$().find(
                        'td:first-child .input_check:checked').data('air_quotation_id');

                    $.ajax({
                        type: "POST",
                        url: '{{ route('search.air_quot') }}',
                        data: {
                            id: id,
                            air_quotation_id: air_quotation_id
                        },
                        dataType: "json",
                        success: function(res) {
                            $(`#modal-aq`).modal('hide');
                            $("input[name=code_customer]").val(res.air_quotation.quotation
                                .customer_code);
                            $("input[name=customer]").val(res.air_quotation.quotation
                                .customer);
                            $("input[name=quotation_no]").val(res.air_quotation.air_quot_no);
                            $("input[name=contact_name]").val(res.air_quotation.quotation.contact_name);
                            $("input[name=reference_no]").val(res.air_quotation.quotation.reference_no);
                            $("input[name=telp]").val(res.air_quotation.quotation.telp);
                            $("input[name=fax]").val(res.air_quotation.quotation.fax);
                            $("input[name=email]").val(res.air_quotation.quotation.email);
                            $("input[name=gross_weight]").val(numberFormatter4(parseFloat(res
                                .air_quotation.quotation
                                .total_gross)));
                            $("input[name=volume_weight]").val(numberFormatter4(parseFloat(res
                                .air_quotation.quotation.total_volume)));
                            $("input[name=pcs]").val(res.air_quotation.quotation.pcs);


                            if (res.air_quotation.quotation.delivery_type_code != null) {
                                var newDelType = new Option(res.air_quotation.quotation
                                    .delivery_type_code,
                                    res.air_quotation.quotation
                                    .delivery_type_code, true, true);
                                $("select[name=delivery_type_code]").append(newDelType).trigger(
                                    'change');
                                $("input[name=delivery_type_name]").val(res.air_quotation.quotation
                                    .delivery_type);
                            } else {
                                $("select[name=delivery_type_code]").empty();
                                $("input[name=delivery_type_name]").val("");
                            }

                            if (res.air_quotation.quotation.commodity_code != null) {
                                var newCommodity = new Option(res.air_quotation.quotation
                                    .commodity_code, res.air_quotation.quotation
                                    .commodity_code, true, true);
                                $("select[name=commodity_code]").append(newCommodity)
                                    .trigger('change');
                                $("input[name=commodity]").val(res.air_quotation
                                    .quotation
                                    .commodity);
                            } else {
                                $("select[name=commodity_code]").empty();
                                $("input[name=commodity]").val("");
                            }


                            if (res.air_quotation.quotation.uom_code != null) {
                                var newUom = new Option(res.air_quotation.quotation
                                    .uom_code, res.air_quotation.quotation
                                    .uom_code, true, true);
                                $("select[name=uom_code]").append(newUom).trigger(
                                    'change');
                                $("input[name=uom]").val(res.air_quotation.quotation
                                    .uom);
                            } else {
                                $("select[name=uom_code]").empty();
                                $("input[name=uom]").val("");
                            }



                            if (res.air_dept_code != null) {
                                var newPortLoading = new Option(res.air_dept_code, res
                                    .air_dept_code,
                                    true, true);
                                $("select[name=air_dept_code]").append(newPortLoading).trigger(
                                    'change');
                                $("input[name=air_dept_name]").val(res.air_dept_name);
                            } else {
                                $("select[name=air_dept_code]").empty();
                                $("input[name=air_dept_name]").val("");
                            }


                            if (res.air_dest_code != null) {
                                var newPortDischar = new Option(res.air_dest_code, res
                                    .air_dest_code,
                                    true, true);
                                $("select[name=air_dest_code]").append(newPortDischar).trigger(
                                    'change');
                                $("input[name=air_dest_name]").val(res.air_dest_name);
                            } else {
                                $("select[name=air_dest_code]").empty();
                                $("input[name=air_dest_name]").val("");
                            }
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
                    url: '{{ route('get.table.air_cus') }}',
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
                        data: 'air_quot_no',
                        name: 'air_quot_no'
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

            $(document).on('click', '.modal-table1 .tbody-cus td', function() {
                var colIdx = table.cell(this).index().row;
                if (table.rows(colIdx).nodes().to$().find('td:first-child .input_check').is(':checked') === true) {
                    table.rows(colIdx).nodes().to$().find('td:first-child .input_check').prop('checked', false);
                } else {
                    table.rows(colIdx).nodes().to$().find('td:first-child .input_check').prop('checked', true);

                    let id = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked').val();
                    let air_quotation_id = table.rows(colIdx).nodes().to$().find(
                        'td:first-child .input_check:checked').data('air_quotation_id');
                    let air_quotation_d1_id = table.rows(colIdx).nodes().to$().find(
                        'td:first-child .input_check:checked').data('air_quotation_d1_id');

                    $.ajax({
                        type: "POST",
                        url: '{{ route('search.air_cus') }}',
                        data: {
                            id: id,
                            air_quotation_id: air_quotation_id,
                            air_quotation_d1_id: air_quotation_d1_id
                        },
                        dataType: "json",
                        success: function(res) {
                            $(`#modal-cus`).modal('hide');
                            $("input[name=code_customer]").val(res.code);
                            $("input[name=customer]").val(res.name);
                            $("input[name=quotation_no]").val(res.air_quot_no);
                            $("input[name=contact_name]").val(res.contact_name);
                            $("input[name=reference_no]").val(res.reference_no);
                            $("input[name=telp]").val(res.telp);
                            $("input[name=fax]").val(res.fax);
                            $("input[name=email]").val(res.email);
                            $("input[name=gross_weight]").val(numberFormatter4(parseFloat(res
                                .total_gross)));
                            $("input[name=volume_weight]").val(numberFormatter4(parseFloat(res
                                .total_volume)));
                            $("input[name=pcs]").val(res.pcs);

                            if (res.delivery_type_code != null) {
                                var newDelType = new Option(res
                                    .delivery_type_code, res
                                    .delivery_type_code, true, true);
                                $("select[name=delivery_type_code]").append(newDelType).trigger(
                                    'change');
                                $("input[name=delivery_type_name]").val(res
                                    .delivery_type);
                            } else {
                                $("select[name=delivery_type_code]").empty();
                                $("input[name=delivery_type_name]").val("");
                            }

                            if (res.commodity_code != null) {
                                var newCommodity = new Option(res
                                    .commodity_code, res
                                    .commodity_code, true, true);
                                $("select[name=commodity_code]").append(newCommodity)
                                    .trigger('change');
                                $("input[name=commodity]").val(res
                                    .commodity);
                            } else {
                                $("select[name=commodity_code]").empty();
                                $("input[name=commodity]").val("");
                            }

                            if (res.uom_code != null) {
                                var newUom = new Option(res.uom_code, res
                                    .uom_code, true, true);
                                $("select[name=uom_code]").append(newUom).trigger(
                                    'change');
                                $("input[name=uom]").val(res
                                    .uom);
                            } else {
                                $("select[name=uom_code]").empty();
                                $("input[name=uom]").val("");
                            }

                            if (res.air_dept_code != null) {
                                var newPortLoading = new Option(res.air_dept_code, res
                                    .air_dept_code,
                                    true, true);
                                $("select[name=air_dept_code]").append(newPortLoading).trigger(
                                    'change');
                                $("input[name=air_dept_name]").val(res.air_dept_name);
                            } else {
                                $("select[name=air_dept_code]").empty();
                                $("input[name=air_dept_name]").val("");
                            }

                            if (res.air_dest_code != null) {
                                var newPortDischar = new Option(res.air_dest_code, res
                                    .air_dest_code,
                                    true, true);
                                $("select[name=air_dest_code]").append(newPortDischar).trigger(
                                    'change');
                                $("input[name=air_dest_name]").val(res.air_dest_name);
                            } else {
                                $("select[name=air_dest_code]").empty();
                                $("input[name=air_dest_name]").val("");
                            }
                        }
                    });

                }
            });

            return table;
        }

        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }

        function formatNumberRight(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, "")
        }

        function formatCurrency1(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();



            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumberRight(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "0";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 1);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;
                // console.log(input_val.length);

                // final formatting
                if (input_val.length > 12) {
                    input_val += ".0";
                }

                if (blur === "blur") {
                    input_val += ".0";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();



            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;
                // console.log(input_val.length);

                // final formatting
                if (input_val.length > 13) {
                    input_val += ".00";
                }

                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

        function formatCurrency4(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();



            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumberRight(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "0000";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 4);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;
                // console.log(input_val.length);

                // final formatting
                if (input_val.length > 10) {
                    input_val += ".0000";
                }

                if (blur === "blur") {
                    input_val += ".0000";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

        function formatCurrencyAmt(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();



            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;
                // console.log(input_val.length);

                // final formatting
                if (input_val.length > 10) {
                    input_val += ".00";
                }

                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
    </script>
@endsection
