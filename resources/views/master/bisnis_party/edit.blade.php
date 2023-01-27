@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Business Party', 'title_2' => 'Master'])
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
                    <h6>Form Edit Business Party</h6>
                </div>
                <form action="{{ route('bisnis_party.update', $bisnis_party->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tabset">
                                    <!-- Tab 1 -->
                                    <input type="radio" name="tabset" id="tab1" aria-controls="b_i" checked>
                                    <label for="tab1">Business Info</label>
                                    <!-- Tab 2 -->
                                    <input type="radio" name="tabset" id="tab2" aria-controls="c_i">
                                    <label for="tab2">Contact Info</label>
                                    <div class="tab-panels col-md-12">
                                        <section id="b_i" class="tab-panel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="code">Business Party Code <span
                                                                style="color: red;">*</span></label>
                                                        <input type="text" required name="code" id="code"
                                                            disabled value="{{ $bisnis_party->code }}" autocomplete="off"
                                                            class="form-control @error('code') is-invalid @enderror">
                                                        @error('code')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Business Party Name <span
                                                                style="color: red;">*</span></label>
                                                        <input type="text" required
                                                            value="{{ old('name', $bisnis_party->name) }}"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            autocomplete="off" name="name" id="name">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="local_name">Local Name </label>
                                                        <input type="text"
                                                            class="form-control @error('local_name', $bisnis_party->local_name) is-invalid @enderror"
                                                            name="local_name" id="local_name">
                                                        @error('local_name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="currency_id">Currency </label>
                                                                <select class="currency-select" name="currency_id">
                                                                    <option value="{{ $bisnis_party->currency_id }}">
                                                                        {{ $bisnis_party->currency_id != null ? $bisnis_party->currency->code : '' }}
                                                                    </option>
                                                                </select>

                                                                @error('currency_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="currency_desc"> </label>
                                                                <input type="text" disabled class="form-control"
                                                                    value="{{ $bisnis_party->currency_id != null ? $bisnis_party->currency->description : '' }}"
                                                                    name="currency_desc" id="currency_desc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="payment_term_id">Payment Term </label>
                                                                <select class="term-select" name="payment_term_id">
                                                                    <option value="{{ $bisnis_party->payment_term_id }}">
                                                                        {{ $bisnis_party->payment_term_id != null ? $bisnis_party->payment_term->code : '' }}
                                                                    </option>
                                                                </select>

                                                                @error('payment_term_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="code_desc">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="term_desc"> </label>
                                                                <input type="text"
                                                                    value="{{ old('term_desc', $bisnis_party->payment_term_id != null ? $bisnis_party->payment_term->description : '') }}"
                                                                    disabled class="form-control" name="term_desc"
                                                                    id="term_desc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="vat_code_id">VAT Code </label>
                                                                <select class="vat-select" name="vat_code_id">
                                                                    <option value="{{ $bisnis_party->vat_code_id }}">
                                                                        {{ $bisnis_party->vat_code_id != null ? $bisnis_party->vat_code->code : '' }}
                                                                    </option>
                                                                </select>

                                                                @error('vat_code_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="vat_desc"> </label>
                                                                <input type="text"
                                                                    value="{{ old('vat_desc', $bisnis_party->vat_code_id != null ? $bisnis_party->vat_code->description : '') }}"
                                                                    disabled class="form-control" name="vat_desc"
                                                                    id="vat_desc">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exp_date">Expiry Date </label>
                                                        <input type="text"
                                                            class="form-control date-picker @error('exp_date') is-invalid @enderror"
                                                            name="exp_date"
                                                            value="{{ old('exp_date', $bisnis_party->exp_date) }}"
                                                            id="exp_date">
                                                        @error('exp_date')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="awb_prefix">Awb Prefix </label>
                                                        <input type="text"
                                                            class="form-control @error('awb_prefix') is-invalid @enderror"
                                                            name="awb_prefix" id="awb_prefix"
                                                            value="{{ old('awb_prefix', $bisnis_party->awb_prefix) }}">
                                                        @error('awb_prefix')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="place">Place </label>
                                                        <input type="text"
                                                            class="form-control @error('place') is-invalid @enderror"
                                                            name="place" id="place"
                                                            value="{{ old('place', $bisnis_party->place) }}">
                                                        @error('place')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="marking">Marking </label>
                                                        <input type="text"
                                                            class="form-control @error('marking') is-invalid @enderror"
                                                            name="marking" id="marking"
                                                            value="{{ old('marking', $bisnis_party->marking) }}">
                                                        @error('marking')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="note">Note </label>
                                                        <input type="text"
                                                            value="{{ old('note', $bisnis_party->note) }}"
                                                            class="form-control @error('note') is-invalid @enderror"
                                                            name="note" id="note">
                                                        @error('note')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cr_roc_rob">CR/ROC/ROB No. </label>
                                                        <input type="text"
                                                            value="{{ old('cr_roc_rob', $bisnis_party->cr_roc_rob) }}"
                                                            class="form-control @error('cr_roc_rob') is-invalid @enderror"
                                                            name="cr_roc_rob" id="cr_roc_rob">
                                                        @error('cr_roc_rob')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email </label>
                                                        <input type="text"
                                                            value="{{ old('email', $bisnis_party->email) }}"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" id="email">
                                                        @error('email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="web_site">Website </label>
                                                        <input type="text"
                                                            value="{{ old('web_site', $bisnis_party->web_site) }}"
                                                            class="form-control @error('web_site') is-invalid @enderror"
                                                            name="web_site" id="web_site">
                                                        @error('web_site')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telex">Telex </label>
                                                        <input type="text"
                                                            value="{{ old('telex', $bisnis_party->telex) }}"
                                                            class="form-control @error('telex') is-invalid @enderror"
                                                            name="telex" id="telex">
                                                        @error('telex')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="salesman_id">Salesman </label>
                                                                <select class="salesman-select" name="salesman_id">
                                                                    <option value="{{ $bisnis_party->salesman_id }}">
                                                                        {{ $bisnis_party->salesman_id != null ? $bisnis_party->salesman->code : '' }}
                                                                    </option>
                                                                </select>

                                                                @error('salesman_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="salesman_desc"> </label>
                                                                <input type="text"
                                                                    value="{{ old('salesman_desc', $bisnis_party->salesman_id != null ? $bisnis_party->salesman->name : '') }}"
                                                                    disabled class="form-control" name="salesman_desc"
                                                                    id="salesman_desc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nomination">Nomination</label>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" name="nomination"
                                                                @checked(old('nomination', $bisnis_party->nomination) == 'yes') value="yes"
                                                                data-toggle="toggle" data-on="Yes" data-off="No"
                                                                data-onstyle="primary" data-offstyle="danger">
                                                            @error('nomination')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sales_lead">Sales Lead</label>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" name="sales_lead"
                                                                @checked(old('sales_lead', $bisnis_party->sales_lead) == 'yes') value="yes"
                                                                data-toggle="toggle" data-on="Yes" data-off="No"
                                                                data-onstyle="primary" data-offstyle="danger">
                                                            @error('sales_lead')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cold_call">Cold Call</label>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" name="cold_call"
                                                                @checked(old('cold_call', $bisnis_party->cold_call) == 'yes') value="yes"
                                                                data-toggle="toggle" data-on="Yes" data-off="No"
                                                                data-onstyle="primary" data-offstyle="danger">
                                                            @error('cold_call')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="credit_limit">Credit Limit </label>
                                                        <input type="text" data-type='currency' autocomplete="off"
                                                            value="{{ old('credit_limit', $credit_limit) }}"
                                                            class="form-control @error('credit_limit') is-invalid @enderror"
                                                            name="credit_limit" id="credit_limit">
                                                        @error('credit_limit')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="customer_type_id">Customer Type </label>
                                                                <select class="type-select" name="customer_type_id">
                                                                    <option value="{{ $bisnis_party->customer_type_id }}">
                                                                        {{ $bisnis_party->customer_type_id != null ? $bisnis_party->customer_type->type : '' }}
                                                                    </option>
                                                                </select>

                                                                @error('customer_type_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="type_desc"> </label>
                                                                <input type="text"
                                                                    value="{{ old('type_desc', $bisnis_party->customer_type_id != null ? $bisnis_party->customer_type->type_name : '') }}"
                                                                    disabled class="form-control" name="type_desc"
                                                                    id="type_desc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="is_customer">&nbsp; </label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input"
                                                                        @checked(old('is_customer', $bisnis_party->is_customer) == '1') type="checkbox"
                                                                        value="1" id="is_customer"
                                                                        name="is_customer" @disabled($bisnis_party->is_customer == '1')>
                                                                    <label class="custom-control-label" for="is_customer">
                                                                        Is Customer ?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="customer_code">Customer Code </label>
                                                                <input type="text"
                                                                    value="{{ old('customer_code', $bisnis_party->customer_code) }}"
                                                                    readonly class="form-control" name="customer_code"
                                                                    id="customer_code">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="customer_acc_code">Customer Account Code
                                                                </label>
                                                                <input type="text"
                                                                    value="{{ old('customer_acc_code', $bisnis_party->customer_acc_code) }}"
                                                                    class="form-control" name="customer_acc_code"
                                                                    id="customer_acc_code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="vendor_type_id">Vendor Type</label>
                                                                <select class="vendortype-select" name="vendor_type_id">
                                                                    <option value="{{ $bisnis_party->vendor_type_id }}">
                                                                        {{ $bisnis_party->vendor_type_id != null ? $bisnis_party->vendor_type->type : '' }}
                                                                    </option>
                                                                </select>

                                                                @error('vendor_type_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="vendortype_desc"> </label>
                                                                <input type="text"
                                                                    value="{{ old('vendortype_desc', $bisnis_party->vendor_type_id != null ? $bisnis_party->vendor_type->type_name : '') }}"
                                                                    disabled class="form-control" name="vendortype_desc"
                                                                    id="vendortype_desc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="is_vendor">&nbsp; </label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        @checked(old('is_vendor', $bisnis_party->is_vendor) == '1')
                                                                        @disabled($bisnis_party->is_vendor == '1') value="1"
                                                                        id="is_vendor" name="is_vendor">
                                                                    <label class="custom-control-label" for="is_vendor">
                                                                        Is Vendor ?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="vendor_code">Vendor Code </label>
                                                                <input type="text"
                                                                    value="{{ old('vendor_code', $bisnis_party->vendor_code) }}"
                                                                    readonly class="form-control" name="vendor_code"
                                                                    id="vendor_code">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="vendor_acc_code">Vendor Account Code
                                                                </label>
                                                                <input type="text"
                                                                    value="{{ old('vendor_acc_code', $bisnis_party->vendor_acc_code) }}"
                                                                    class="form-control" name="vendor_acc_code"
                                                                    id="vendor_acc_code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="party_type_id">Party Type </label>
                                                        @foreach ($p_type as $key => $item)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="{{ $item->id }}"
                                                                    @checked(old("party_type_id.{$key}", in_array($item->id, $party_type_id)) == $item->id)
                                                                    name="party_type_id[{{ $key }}]"
                                                                    id="party_type_id{{ $key + 1 }}">
                                                                <label class="form-check-label"
                                                                    for="party_type_id{{ $key + 1 }}">
                                                                    {{ $item->description }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="address_1">Address </label>
                                                        <input type="text"
                                                            value="{{ old('address_1', $bisnis_party->address_1) }}"
                                                            class="form-control @error('address_1') is-invalid @enderror"
                                                            name="address_1" id="address_1">
                                                        @error('address_1')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address_2">&nbsp; </label>
                                                        <input type="text"
                                                            value="{{ old('address_2', $bisnis_party->address_2) }}"
                                                            class="form-control @error('address_2') is-invalid @enderror"
                                                            name="address_2" id="address_2">
                                                        @error('address_2')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address_3">&nbsp; </label>
                                                        <input type="text"
                                                            value="{{ old('address_3', $bisnis_party->address_3) }}"
                                                            class="form-control @error('address_3') is-invalid @enderror"
                                                            name="address_3" id="address_3">
                                                        @error('address_3')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address_4">&nbsp; </label>
                                                        <input type="text"
                                                            value="{{ old('address_4', $bisnis_party->address_4) }}"
                                                            class="form-control @error('address_4') is-invalid @enderror"
                                                            name="address_4" id="address_4">
                                                        @error('address_4')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="postal_code">Postal Code </label>
                                                                <input type="text"
                                                                    value="{{ old('postal_code', $bisnis_party->postal_code) }}"
                                                                    class="form-control @error('postal_code') is-invalid @enderror"
                                                                    name="postal_code" id="postal_code">
                                                                @error('postal_code')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="province">State/Province </label>
                                                                <input type="text"
                                                                    value="{{ old('province', $bisnis_party->province) }}"
                                                                    class="form-control @error('province') is-invalid @enderror"
                                                                    name="province" id="province">
                                                                @error('province')
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
                                                                <label for="city_id">City </label>
                                                                <select class="city-select" name="city_id">
                                                                    <option value="{{ $bisnis_party->city_id }}">
                                                                        {{ $bisnis_party->city_id != null ? $bisnis_party->city->code : '' }}
                                                                    </option>
                                                                </select>

                                                                @error('city_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="city_desc"> </label>
                                                                <input type="text"
                                                                    value="{{ old('city_desc', $bisnis_party->city_id != null ? $bisnis_party->city->name : '') }}"
                                                                    disabled class="form-control" name="city_desc"
                                                                    id="city_desc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="country_id">Country </label>
                                                                <select class="country-select" name="country_id">
                                                                    <option value="{{ $bisnis_party->country_id }}">
                                                                        {{ $bisnis_party->country_id != null ? $bisnis_party->country->code : '' }}
                                                                    </option>
                                                                </select>

                                                                @error('country_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="country_desc"> </label>
                                                                <input type="text"
                                                                    value="{{ old('country_desc', $bisnis_party->country_id != null ? $bisnis_party->country->name : '') }}"
                                                                    disabled class="form-control" name="country_desc"
                                                                    id="country_desc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="port_id">Sea Port </label>
                                                                <select class="port-select" name="port_id">
                                                                    <option value="{{ $bisnis_party->port_id }}">
                                                                        {{ $bisnis_party->port_id != null ? $bisnis_party->port->code : '' }}
                                                                    </option>
                                                                </select>

                                                                @error('port_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="port_desc"> </label>
                                                                <input type="text"
                                                                    value="{{ old('port_desc', $bisnis_party->port_id != null ? $bisnis_party->port->name : '') }}"
                                                                    disabled class="form-control" name="port_desc"
                                                                    id="port_desc">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="telp_idd">Telephone </label>
                                                                <input type="text" name="telp_idd"
                                                                    value="{{ $bisnis_party->country_id != null ? $bisnis_party->country->idd : '' }}"
                                                                    readonly class="form-control">

                                                                @error('telp_idd')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="telp"> &nbsp;</label>
                                                                <input type="text"
                                                                    value="{{ old('telp', $bisnis_party->telp) }}"
                                                                    class="form-control" name="telp" id="telp">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="fax_idd">Fax </label>
                                                                <input type="text" name="fax_idd"
                                                                    value="{{ $bisnis_party->country_id != null ? $bisnis_party->country->idd : '' }}"
                                                                    readonly class="form-control">

                                                                @error('fax_idd')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="fax"> &nbsp;</label>
                                                                <input type="text"
                                                                    value="{{ old('fax', $bisnis_party->fax) }}"
                                                                    class="form-control" name="fax" id="fax">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tax_id">Tax ID </label>
                                                        <input type="text"
                                                            value="{{ old('tax_id', $bisnis_party->tax_id) }}"
                                                            class="form-control @error('tax_id') is-invalid @enderror"
                                                            name="tax_id" id="tax_id">
                                                        @error('tax_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>


                                                </div>
                                            </div>

                                        </section>
                                        <section id="c_i" class="tab-panel">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="notify_contact_name">Notify Contact Name </label>
                                                        <input type="text"
                                                            value="{{ old('notify_contact_name', $bisnis_party->notify_contact_name) }}"
                                                            class="form-control @error('notify_contact_name') is-invalid @enderror"
                                                            name="notify_contact_name" id="notify_contact_name">
                                                        @error('notify_contact_name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="notify_email">Notify Email </label>
                                                        <input type="text"
                                                            value="{{ old('notify_email', $bisnis_party->notify_email) }}"
                                                            class="form-control @error('notify_email') is-invalid @enderror"
                                                            name="notify_email" id="notify_email">
                                                        @error('notify_email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12" style="overflow:auto;">
                                                    <table id="table-condition"
                                                        class="table table-bordered table-sm table-responsive-sm">
                                                        <thead>

                                                            <tr>
                                                                <th class="text-center th-action"
                                                                    style="min-width: 120px;"> Action </th>
                                                                <th class="text-center" style="min-width: 200px;"> Title
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    Name </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    Telephone
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;"> Fax
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    Handphone </th>
                                                                <th class="text-center" style="min-width: 200px;"> Email
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    Birthday
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    Facebook
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    Twitter
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    Like
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    Dislike
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    MSN
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    QQ
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    Skype
                                                                </th>
                                                                <th class="text-center" style="min-width: 200px;">
                                                                    Others
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody id="tbody-condition">
                                                            @if (count($detail_1) > 0)
                                                                @foreach ($detail_1 as $key => $item)
                                                                    <tr class="dynamic-field"
                                                                        id="dynamic-field-{{ $key + 1 }}">
                                                                        <td class="text-center">
                                                                            <button type="button"
                                                                                onclick="addNewField(this)"
                                                                                id="add-button"
                                                                                class="btn btn-xs btn-primary float-left text-uppercase shadow-sm"><i
                                                                                    class="fa fa-plus fa-fw"></i>
                                                                            </button>
                                                                            <button type="button"
                                                                                onclick="removeLastField(this)"
                                                                                id="remove-button"
                                                                                class="btn btn-xs btn-danger float-left text-uppercase ml-1"><i
                                                                                    class="fa fa-minus fa-fw"></i>
                                                                            </button>
                                                                        </td>

                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" name="title[]"
                                                                                    value="{{ $item->title }}"
                                                                                    id="title" class="form-control">
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" name="name_detail[]"
                                                                                    value="{{ $item->name }}"
                                                                                    id="name_detail" class="form-control">
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" name="telp_detail[]"
                                                                                    value="{{ $item->telp }}"
                                                                                    id="telp_detail" class="form-control">
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" name="fax_detail[]"
                                                                                    value="{{ $item->fax }}"
                                                                                    id="fax_detail" class="form-control">
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="handphone[]"
                                                                                    value="{{ $item->handphone }}">
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="email_detail[]"
                                                                                    value="{{ $item->email }}">
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text"
                                                                                    class="form-control date-picker"
                                                                                    name="birthday[]"
                                                                                    value="{{ $item->birthday }}">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="facebook[]"
                                                                                    value="{{ $item->facebook }}">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="twiter[]"
                                                                                    value="{{ $item->twiter }}">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="like[]"
                                                                                    value="{{ $item->like }}">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="dislike[]"
                                                                                    value="{{ $item->dislike }}">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="msn[]"
                                                                                    value="{{ $item->msn }}">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="qq[]"
                                                                                    value="{{ $item->qq }}">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="skype[]"
                                                                                    value="{{ $item->skype }}">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="other[]"
                                                                                    value="{{ $item->other }}">
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr class="dynamic-field" id="dynamic-field-1">
                                                                    <td class="text-center">
                                                                        <button type="button" onclick="addNewField(this)"
                                                                            id="add-button"
                                                                            class="btn btn-xs btn-primary float-left text-uppercase shadow-sm"><i
                                                                                class="fa fa-plus fa-fw"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            onclick="removeLastField(this)"
                                                                            id="remove-button"
                                                                            class="btn btn-xs btn-danger float-left text-uppercase ml-1"><i
                                                                                class="fa fa-minus fa-fw"></i>
                                                                        </button>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" name="title[]"
                                                                                id="title" class="form-control">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" name="name_detail[]"
                                                                                id="name_detail" class="form-control">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" name="telp_detail[]"
                                                                                id="telp_detail" class="form-control">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" name="fax_detail[]"
                                                                                id="fax_detail" class="form-control">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="handphone[]">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="email_detail[]">
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                class="form-control date-picker"
                                                                                name="birthday[]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="facebook[]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="twiter[]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="like[]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="dislike[]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="msn[]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="qq[]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="skype[]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="other[]">
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                            @endif


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('bisnis_party.store') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Customer -->
    <div class="modal fade" id="m-customer" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('customer.store') }}" method="post" class="form-customer">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Customer</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="code_modal">Customer Code </label>
                                    <input type="text" value="NEW" class="form-control" readonly
                                        name="code_modal">
                                    @error('code_modal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="acc_code">Account Code </label>
                                            <input type="text" value="1.02.01.01"
                                                class="form-control @error('acc_code') is-invalid @enderror"
                                                name="acc_code" id="acc_code">
                                            @error('acc_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="acc_desc">Account Description </label>
                                            <input type="text" value="PIUTANG USAHA PIHAK KETIGA"
                                                class="form-control @error('acc_desc') is-invalid @enderror"
                                                name="acc_desc" id="acc_desc">
                                            @error('acc_desc')
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
                                            <label for="payment_term_modal_id">Payment Term Code </label>
                                            <select class="term-modal-select" name="payment_term_modal_id">
                                                <option></option>
                                            </select>

                                            @error('payment_term_modal_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="term_modal_desc"> </label>
                                            <input type="text" readonly class="form-control" name="term_modal_desc"
                                                id="term_modal_desc">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" checked value="1"
                                            name="auto_generate" id="auto_gen">
                                        <label class="form-check-label" for="auto_gen">
                                            Auto Generate
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let buttonAdd = $("#add-button");
        let buttonRemove = $("#remove-button");
        let className = ".dynamic-field";
        let count = 0;
        let field = "";
        let maxFields = MAX_FIELD;

        function totalFields() {
            return $(className).length;
        }

        function addNewField(obj) {
            if (totalFields() < maxFields) {
                count = totalFields() + Math.floor(Math.random() * 999) + 1;
                field = $("#dynamic-field-1").clone();
                field.attr("id", "dynamic-field-" + count);
                field.children("label").text("Field " + count);
                field.find("input").val("");
                field.find(".select2-container").remove();
                field.find(".select2-container").empty();
                $(className + ":last").after($(field));

                $('.date-picker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true,
                    todayHighlight: true
                });

                $("input[type=text]").keyup(function() {
                    $(this).val($(this).val().toUpperCase());
                });


            } else {
                alert(`Maximum ${maxFields} line`);
            }
        }

        function removeLastField(obj) {
            if ($('#tbody-condition tr').length > 1) {
                $(obj).closest('tr').remove();
            } else {
                alert("Minimum 1 line");
            }
        }

        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }

        function formatNumberRight(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, "")
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

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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

            $("input[name=auto_generate]").change(function(e) {
                e.preventDefault();
                if (!this.checked) {
                    $("input[name=code_modal]").attr("readonly", false);
                    $("input[name=code_modal]").val("");
                } else {
                    $("input[name=code_modal]").attr("readonly", true);
                    $("input[name=code_modal]").val("NEW");
                }
            });

            $(`.form-customer`).submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: '{{ route('save.cus.short') }}',
                    data: {

                    },
                    dataType: "json",
                    success: function(response) {

                    }
                });
            });

            // $(`#is_customer`).click(function(e) {
            //     e.preventDefault();

            //     let val_name = $("input[name=name]").val();
            //     let val_curr = $("select[name=currency_id]").val();
            //     let val_pay = $("select[name=payment_term_id]").val();
            //     let val_term_desc = $("input[name=term_desc]").val();
            //     let val_code = $("input[name=code_desc]").val();
            //     if ($(this).prev().prop('checked')) { // is the previous checked.
            //         if (val_name == "") {
            //             alert('The Business Party Name field is required!');
            //             return;
            //         }
            //         if (val_curr == "") {
            //             alert('The Currency field is required!');
            //             return;
            //         }
            //         if (val_pay == "") {
            //             alert('The Payment term field is required!');
            //             return;
            //         }
            //         return false;
            //     }

            // });

            $('.customer-select').select2({
                placeholder: 'Search customer',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.customer') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.id,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".customer-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=customer_desc]").val(desc);
            });

            $('.vendor-select').select2({
                placeholder: 'Search vendor',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.vendor') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.id,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".vendor-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=vendor_desc]").val(desc);
            });

            $('.currency-select').select2({
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
                                    id: item.id,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".currency-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=currency_desc]").val(desc);
            });

            $('.term-select').select2({
                placeholder: 'Search payment term',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.payterm') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.id,
                                    custom_attribute: item.description,
                                    code_attr: item.code
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".term-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                let code = $(this).select2('data')[0].code_attr;
                $("input[name=term_desc]").val(desc);
                $("input[name=code_desc]").val(code);
            });

            $('.term-modal-select').select2({
                placeholder: 'Search payment term',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.payterm') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code}`,
                                    id: item.id,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".term-modal-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=term_modal_desc]").val(desc);
            });

            $('.vat-select').select2({
                placeholder: 'Search vat code',
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
                                    id: item.id,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".vat-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=vat_desc]").val(desc);
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
                                    text: `${item.code}`,
                                    id: item.id,
                                    idd_name: item.idd,
                                    country_name: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".country-select").change(function(e) {
                e.preventDefault();
                let idd_name = $(this).select2('data')[0].idd_name;
                let country_name = $(this).select2('data')[0].country_name;

                $("input[name=country_desc]").val(country_name);
                $("input[name=telp_idd]").val(idd_name);
                $("input[name=fax_idd]").val(idd_name);
            });

            $('.city-select').select2({
                placeholder: 'Search city',
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
                                    country_id: item.country.id,
                                    country_code: item.country.code,
                                    country_name: item.country.name,
                                    country_idd: item.country.idd,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".city-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                let country_id = $(this).select2('data')[0].country_id;
                let country_code = $(this).select2('data')[0].country_code;
                let country_name = $(this).select2('data')[0].country_name;
                let country_idd = $(this).select2('data')[0].country_idd;

                let dataCountry = {
                    id: country_id,
                    text: country_code
                };

                let newOptionCountry = new Option(dataCountry.text, dataCountry.id, true, true);
                $('.country-select').append(newOptionCountry).trigger('change');

                $("input[name=city_desc]").val(desc);
                $("input[name=country_desc]").val(country_name);
                $("input[name=telp_idd]").val(country_idd);
                $("input[name=fax_idd]").val(country_idd);
            });

            $('.port-select').select2({
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
                                    id: item.id,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".port-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=port_desc]").val(desc);
            });

            $('.salesman-select').select2({
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
                                    text: `${item.code}`,
                                    id: item.id,
                                    custom_attribute: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".salesman-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=salesman_desc]").val(desc);
            });

            $('.type-select').select2({
                placeholder: 'Search customer type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.custype') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type}`,
                                    id: item.id,
                                    custom_attribute: item.type_name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".type-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=type_desc]").val(desc);
            });

            $('.vendortype-select').select2({
                placeholder: 'Search vendor type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.ventype') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type}`,
                                    id: item.id,
                                    custom_attribute: item.type_name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".vendortype-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=vendortype_desc]").val(desc);
            });

        });
    </script>
@endsection
