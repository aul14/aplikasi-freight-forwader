<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="sea_quot_no">Quotation No<span style="color: red;">*</span></label>
            <input type="text" value="{{ $sq->sea_quot_no }}"
                class="form-control @error('sea_quot_no') is-invalid @enderror" readonly name="sea_quot_no"
                id="sea_quot_no">
            @error('sea_quot_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="effective_date">Quotation Date</label>
                    <input type="text"
                        value="{{ old('effective_date', date('d/m/Y', strtotime($sq->quotation->effective_date))) }}"
                        autocomplete="off"
                        class="form-control @error('effective_date') is-invalid @enderror date-picker"
                        name="effective_date" id="effective_date">
                    @error('effective_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="validity_day">Validity Day</label>
                    <input type="number" value="{{ old('validity_day', $sq->quotation->validity_day) }}"
                        autocomplete="off" class="form-control @error('validity_day') is-invalid @enderror "
                        name="validity_day" id="validity_day">
                    @error('validity_day')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="expiry_date">Validity Date</label>
                    <input type="text"
                        value="{{ old('expiry_date', date('d/m/Y', strtotime($sq->quotation->expiry_date))) }}"
                        autocomplete="off" class="form-control @error('expiry_date') is-invalid @enderror date-picker"
                        name="expiry_date" id="expiry_date">
                    @error('expiry_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="title">Quotation Title </label>
            <input type="text" value="{{ old('title', $sq->quotation->title) }}"
                class="form-control @error('title') is-invalid @enderror" name="title" id="title">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="job_type_id">Job Type </label>
            <div class="row">
                <div class="col-md-12">
                    <select name="job_type_id" class="job-type @error('job_type_id') is-invalid @enderror">
                        <option value="{{ $sq->quotation->job_type_id }}">
                            {{ !empty($sq->quotation->job_type_id) ? "{$sq->quotation->job_type->type} | {$sq->quotation->job_type->description}" : '' }}
                        </option>
                    </select>
                    @error('job_type_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
        </div>
        <div class="row ">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="quotation_type_id">Quotation Type <span style="color: red;">*</span> </label>
                    <select class="qt-select" required id="qt-select-1" name="quotation_type_id">
                        <option value="{{ $sq->quotation->quotation_type_id }}">
                            {{ !empty($sq->quotation->quotation_type_id) ? $sq->quotation->quotation_type->type : '' }}
                        </option>
                    </select>

                    @error('quotation_type_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="quotation_type_name"> </label>
                    <input type="text"
                        value="{{ old('quotation_type_name', !empty($sq->quotation->quotation_type_id) ? $sq->quotation->quotation_type->description : '') }}"
                        disabled class="form-control" name="quotation_type_name" id="quotation_type_name">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="salesman_id">Salesman <span style="color: red;">*</span></label>
                    <select class="salesman-select" required name="salesman_id">
                        <option value="{{ $sq->quotation->salesman_id }}">
                            {{ !empty($sq->quotation->salesman_id) ? $sq->quotation->salesman->code : '' }}</option>
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
                        value="{{ old('salesman_desc', !empty($sq->quotation->salesman_id) ? $sq->quotation->salesman->name : '') }}"
                        disabled class="form-control" name="salesman_desc" id="salesman_desc">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="bisnis_party_id">Customer Code </label>
                    <select class="customer-select @error('bisnis_party_id') is-invalid @enderror"
                        name="bisnis_party_id">
                        <option value="{{ $sq->quotation->bisnis_party_id }}">
                            {{ !empty($sq->quotation->bisnis_party_id) ? $sq->quotation->bisnis_party->code : '' }}
                        </option>
                    </select>

                    @error('bisnis_party_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="bisnis_party_name"> </label>
                    <input type="text"
                        value="{{ old('bisnis_party_name', !empty($sq->quotation->bisnis_party_id) ? $sq->quotation->bisnis_party->name : '') }}"
                        readonly class="form-control" name="bisnis_party_name" id="bisnis_party_name">
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="currency_id">Currency </label>
                    <select class="currency-select @error('currency_id') is-invalid @enderror" name="currency_id">
                        <option value="{{ $sq->quotation->currency_id }}">
                            {{ !empty($sq->quotation->currency_id) ? $sq->quotation->currency->code : '' }}
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
                        value="{{ !empty($sq->quotation->currency_id) ? $sq->quotation->currency->description : '' }}"
                        name="currency_desc" id="currency_desc">
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="delivery_type_id">Delivery Type </label>
                    <select class="deltype-select @error('delivery_type_id') is-invalid @enderror"
                        name="delivery_type_id">
                        <option value="{{ $sq->quotation->delivery_type_id }}">
                            {{ !empty($sq->quotation->delivery_type_id) ? $sq->quotation->delivery_type->type : '' }}
                        </option>
                    </select>

                    @error('delivery_type_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="delivery_type_name"> </label>
                    <input type="text" disabled class="form-control"
                        value="{{ !empty($sq->quotation->delivery_type_id) ? $sq->quotation->delivery_type->description : '' }}"
                        name="delivery_type_name" id="delivery_type_name">
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="payment_term_id">Payment Term </label>
                    <select class="term-select @error('payment_term_id') is-invalid @enderror" name="payment_term_id">
                        <option value="{{ $sq->payment_term_id }}">
                            {{ !empty($sq->payment_term_id) ? $sq->payment_term->code : '' }}
                        </option>
                    </select>

                    @error('payment_term_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="term_desc"> </label>
                    <input type="text"
                        value="{{ old('term_desc', !empty($sq->payment_term_id) ? $sq->payment_term->description : '') }}"
                        disabled class="form-control" name="term_desc" id="term_desc">
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address_1">Address </label>
            <input type="text" value="{{ old('address_1', $sq->quotation->address_1) }}"
                class="form-control @error('address_1') is-invalid @enderror" name="address_1" id="address_1">
            @error('address_1')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address_2"> </label>
            <input type="text" value="{{ old('address_2', $sq->quotation->address_2) }}"
                class="form-control @error('address_2') is-invalid @enderror" name="address_2" id="address_2">
            @error('address_2')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address_3">&nbsp; </label>
            <input type="text" value="{{ old('address_3', $sq->quotation->address_3) }}"
                class="form-control @error('address_3') is-invalid @enderror" name="address_3" id="address_3">
            @error('address_3')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address_4">&nbsp; </label>
            <input type="text" value="{{ old('address_4', $sq->quotation->address_4) }}"
                class="form-control @error('address_4') is-invalid @enderror" name="address_4" id="address_4">
            @error('address_4')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="contact_name">Contact Name </label>
            <input type="text" value="{{ old('contact_name', $sq->quotation->contact_name) }}"
                class="form-control @error('contact_name') is-invalid @enderror" name="contact_name"
                id="contact_name">
            @error('contact_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="telp">Telephone </label>
            <input type="text" value="{{ old('telp', $sq->quotation->telp) }}"
                class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp">
            @error('telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="fax">Fax </label>
            <input type="text" value="{{ old('fax', $sq->quotation->fax) }}"
                class="form-control @error('fax') is-invalid @enderror" name="fax" id="fax">
            @error('fax')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email </label>
            <input type="email" value="{{ old('email', $sq->quotation->email) }}"
                class="form-control @error('email') is-invalid @enderror" name="email" id="email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="reference_no">Reference No. </label>
            <input type="text" value="{{ old('reference_no', $sq->quotation->reference_no) }}"
                class="form-control @error('reference_no') is-invalid @enderror" name="reference_no"
                id="reference_no">
            @error('reference_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="commodity_id">Commodity </label>
                    <select class="commodity-select @error('commodity_id') is-invalid @enderror" name="commodity_id">
                        <option value="{{ $sq->quotation->commodity_id }}">
                            {{ !empty($sq->quotation->commodity_id) ? $sq->quotation->commodity->code : '' }}</option>
                    </select>

                    @error('commodity_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="commodity_desc"> </label>
                    <input type="text"
                        value="{{ old('commodity_desc', !empty($sq->quotation->commodity_id) ? $sq->quotation->commodity->description : '') }}"
                        disabled class="form-control" name="commodity_desc" id="commodity_desc">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row align-items-center">
    <div class="col-md-2 mt-2">
        <label for="container_type">Container Type</label>
    </div>
    <div class="col-md-10 mt-2">
        <div class="row" style="overflow:auto;">
            <div class="d-flex flex-row">
                <div class="p-2" style="width: 10%">
                    <input type="text" value="{{ old('jml_container_type_1', $sq->jml_container_type_1) }}"
                        data-type='currency0' maxlength="10" autocomplete="off" title="No Of Container Type 1"
                        class="form-control @error('jml_container_type_1') is-invalid @enderror"
                        name="jml_container_type_1" id="jml_container_type_1">
                    @error('jml_container_type_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-1 my-2">X</div>
                <div class="p-2" style="width: 12%">
                    <select name="container_type_1" class="cont-1 @error('container_type_1') is-invalid @enderror">
                        <option value="{{ $sq->container_type_1 }}">{{ $sq->container_type_1 }}</option>
                    </select>
                    @error('container_type_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="p-1 my-2">/</div>
                <div class="p-2" style="width: 10%">
                    <input type="text" value="{{ old('jml_container_type_2', $sq->jml_container_type_2) }}"
                        title="No Of Container Type 2" data-type='currency0' maxlength="10" autocomplete="off"
                        class="form-control @error('jml_container_type_2') is-invalid @enderror"
                        name="jml_container_type_2" id="jml_container_type_2">
                    @error('jml_container_type_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-1 my-2">X</div>
                <div class="p-2" style="width: 12%">
                    <select name="container_type_2" class="cont-1 @error('container_type_2') is-invalid @enderror">
                        <option value="{{ $sq->container_type_2 }}">{{ $sq->container_type_2 }}</option>
                    </select>
                    @error('container_type_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="p-1 my-2">/</div>
                <div class="p-2" style="width: 10%">
                    <input type="text" value="{{ old('jml_container_type_3', $sq->jml_container_type_3) }}"
                        title="No Of Container Type 3" data-type='currency0' maxlength="10" autocomplete="off"
                        class="form-control @error('jml_container_type_3') is-invalid @enderror"
                        name="jml_container_type_3" id="jml_container_type_3">
                    @error('jml_container_type_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-1 my-2">X</div>
                <div class="p-2" style="width: 12%">
                    <select name="container_type_3" class="cont-1 @error('container_type_3') is-invalid @enderror">
                        <option value="{{ $sq->container_type_3 }}">{{ $sq->container_type_3 }}</option>
                    </select>
                    @error('container_type_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-1 my-2">/</div>
                <div class="p-2" style="width: 10%">
                    <input type="text" value="{{ old('jml_container_type_4', $sq->jml_container_type_4) }}"
                        title="No Of Container Type 4" data-type='currency0' maxlength="10" autocomplete="off"
                        class="form-control @error('jml_container_type_4') is-invalid @enderror"
                        name="jml_container_type_4" id="jml_container_type_4">
                    @error('jml_container_type_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-1 my-2">X</div>
                <div class="p-2" style="width: 12%">
                    <select name="container_type_4" class="cont-1 @error('container_type_4') is-invalid @enderror">
                        <option value="{{ $sq->container_type_4 }}">{{ $sq->container_type_4 }}</option>
                    </select>
                    @error('container_type_4')
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
                    <input type="text" value="{{ old('pcs', $sq->quotation->pcs) }}" title="Total Pcs"
                        placeholder="Total Pcs" data-type='currency0' maxlength="10" autocomplete="off"
                        class="form-control @error('pcs') is-invalid @enderror" name="pcs" id="pcs">
                    @error('pcs')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-2" style="width: 12%">
                    <select name="uom_id" class="uom-select @error('uom_id') is-invalid @enderror">
                        <option value="{{ $sq->quotation->uom_id }}">
                            {{ !empty($sq->quotation->uom_id) ? $sq->quotation->uom->code : '' }}</option>
                    </select>
                    @error('uom_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-2" style="width: 20%">
                    <input type="text" class="form-control" disabled name="uom_desc"
                        value="{{ !empty($sq->quotation->uom_id) ? $sq->quotation->uom->description : '' }}"
                        id="uom_desc">
                </div>
                <div class="p-1 my-2">/</div>
                <div class="p-2" style="width: 20%">
                    <input type="text" data-type='currency4' autocomplete="off" title="Total Gross Weight"
                        value="{{ old('total_gross', number_format($sq->quotation->total_gross, 4, '.', ',')) }}"
                        placeholder="Total Gross Weight"
                        class="form-control @error('total_gross') is-invalid @enderror" name="total_gross"
                        id="total_gross">
                    @error('total_gross')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-1 my-2">KGS /</div>
                <div class="p-2" style="width: 20%">
                    <input type="text" data-type='currency4' autocomplete="off" title="Total Volume"
                        value="{{ old('total_volume', number_format($sq->quotation->total_volume, 4, '.', ',')) }}"
                        placeholder="Total Volume" class="form-control @error('total_volume') is-invalid @enderror"
                        name="total_volume" id="total_volume">
                    @error('total_volume')
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
<div class="row mt-3">
    <div class="col-md-6 d-flex">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title">Delivery Agent</h5>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="agent_code">Agent
                            Code</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <select class="agent-select @error('agent_code') is-invalid @enderror" name="agent_code">
                                <option value="{{ old('agent_code', $sq->agent_code) }}">
                                    {{ old('agent_code', $sq->agent_code) }}</option>
                            </select>

                            @error('agent_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="agent_name">Agent Name</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('agent_name', $sq->agent_name) }}"
                                class="form-control @error('agent_name') is-invalid @enderror" name="agent_name">
                            @error('agent_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="agent_address_1">Agent Address</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('agent_address_1', $sq->agent_address_1) }}"
                                class="form-control @error('agent_address_1') is-invalid @enderror"
                                name="agent_address_1">
                            @error('agent_address_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="agent_address_2"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('agent_address_2', $sq->agent_address_2) }}"
                                class="form-control @error('agent_address_2') is-invalid @enderror"
                                name="agent_address_2">
                            @error('agent_address_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="agent_address_3"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('agent_address_3', $sq->agent_address_3) }}"
                                class="form-control @error('agent_address_3') is-invalid @enderror"
                                name="agent_address_3">
                            @error('agent_address_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="agent_address_4"></label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('agent_address_4', $sq->agent_address_4) }}"
                                class="form-control @error('agent_address_4') is-invalid @enderror"
                                name="agent_address_4">
                            @error('agent_address_4')
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
    <div class="col-md-6 d-flex">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title">Shipper</h5>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="shipper_code">Shipper
                            Code</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <select class="shipper-select @error('shipper_code') is-invalid @enderror"
                                name="shipper_code">
                                <option value="{{ old('shipper_code', $sq->shipper_code) }}">
                                    {{ old('shipper_code', $sq->shipper_code) }}</option>
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
                            <input type="text" value="{{ old('shipper_name', $sq->shipper_name) }}"
                                class="form-control @error('shipper_name') is-invalid @enderror" name="shipper_name">
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
                        <label for="shipper_address_1">Shipper
                            Address</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('shipper_address_1', $sq->shipper_address_1) }}"
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
                            <input type="text" value="{{ old('shipper_address_2', $sq->shipper_address_2) }}"
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
                            <input type="text" value="{{ old('shipper_address_3', $sq->shipper_address_3) }}"
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
                            <input type="text" value="{{ old('shipper_address_4', $sq->shipper_address_4) }}"
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
    </div>
    <div class="col-md-6 d-flex">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title">Consignee</h5>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="consignee_code">Consignee
                            Code</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <select class="consignee-select @error('consignee_code') is-invalid @enderror"
                                name="consignee_code">
                                <option value="{{ old('consignee_code', $sq->consignee_code) }}">
                                    {{ old('consignee_code', $sq->consignee_code) }}</option>
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
                            <input type="text" value="{{ old('consignee_name', $sq->consignee_name) }}"
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
                        <label for="consignee_address_1">Consignee
                            Address</label>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="form-group">
                            <input type="text" value="{{ old('consignee_address_1', $sq->consignee_address_1) }}"
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
                            <input type="text" value="{{ old('consignee_address_2', $sq->consignee_address_2) }}"
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
                            <input type="text" value="{{ old('consignee_address_3', $sq->consignee_address_3) }}"
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
                            <input type="text" value="{{ old('consignee_address_4', $sq->consignee_address_4) }}"
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
    <div class="col-md-6 d-flex">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title">Extra Info</h5>
                <div class="row align-items-center">
                    @foreach ($add_info as $key => $item)
                        <div class="col-md-5">
                            <label for="{{ str_replace('k', 'v', $key) }}">{{ $item }}</label>
                        </div>
                        @php
                            $replace = str_replace('k', 'v', $key) ?? 'vb1';
                        @endphp
                        @if (strstr($key, 'kb'))
                            <div class="col-md-7 mt-2">
                                <div class="form-group">

                                    <input type="checkbox" name="{{ str_replace('k', 'v', $key) }}"
                                        @checked(old(str_replace('k', 'v', $key)) == 'yes') value="{{ old(str_replace('k', 'v', $key)) }}"
                                        data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                                        data-offstyle="danger">
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
                                        value="{{ old(str_replace('k', 'v', $key), $add_info_d1->$replace) }}"
                                        class="form-control @error(str_replace('k', 'v', $key)) is-invalid @enderror date-picker"
                                        autocomplete="off" name="{{ str_replace('k', 'v', $key) }}">
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
                                        value="{{ old(str_replace('k', 'v', $key), $add_info_d1->$replace) }}"
                                        class="form-control @error(str_replace('k', 'v', $key)) is-invalid @enderror"
                                        autocomplete="off" name="{{ str_replace('k', 'v', $key) }}">
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
                                        value="{{ old(str_replace('k', 'v', $key), $add_info_d1->$replace) }}"
                                        class="form-control @error(str_replace('k', 'v', $key)) is-invalid @enderror"
                                        autocomplete="off" name="{{ str_replace('k', 'v', $key) }}">
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
@section('sub_script_1')
    <script>
        $(function() {
            $(`input[name=validity_day]`).keyup(function() {
                let value = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '{{ route('change.date') }}',
                    data: {
                        value: value
                    },
                    dataType: "json",
                    success: function(res) {
                        $(`input[name=expiry_date]`).val(res);
                    }
                });
            });

            evtUom(".uom-select", "input[name=uom_desc]");
            evtCurrency(".currency-select", "input[name=currency_desc]");

            $(`.cont-1`).select2({
                placeholder: 'Search container type',
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
                                }
                            })
                        };
                    },
                    cache: false
                }
            });


            $(`.qt-select`).select2({
                placeholder: 'Search quotation type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.quot.type') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type}`,
                                    id: item.id,
                                    custom_attribute: item.description
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".qt-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=quotation_type_name]").val(desc);
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

            $(`.job-type`).select2({
                placeholder: 'Search job type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('job.notunique') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type} | ${item.description}`,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.agent-select').select2({
                placeholder: 'Search agent',
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
                                    text: `${item.code}`,
                                    id: item.id,
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

            $('.agent-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=agent_name]").val(name);
                $("input[name=agent_address_1]").val(address_1);
                $("input[name=agent_address_2]").val(address_2);
                $("input[name=agent_address_3]").val(address_3);
                $("input[name=agent_address_4]").val(address_4);
            });

            $('.consignee-select').select2({
                placeholder: 'Search consignee',
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
                                    text: `${item.code}`,
                                    id: item.id,
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

            $('.consignee-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=consignee_name]").val(name);
                $("input[name=consignee_address_1]").val(address_1);
                $("input[name=consignee_address_2]").val(address_2);
                $("input[name=consignee_address_3]").val(address_3);
                $("input[name=consignee_address_4]").val(address_4);
            });

            $('.shipper-select').select2({
                placeholder: 'Search shipper',
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
                                    text: `${item.code}`,
                                    id: item.id,
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


            $('.shipper-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=shipper_name]").val(name);
                $("input[name=shipper_address_1]").val(address_1);
                $("input[name=shipper_address_2]").val(address_2);
                $("input[name=shipper_address_3]").val(address_3);
                $("input[name=shipper_address_4]").val(address_4);
            });

            $('.customer-select').select2({
                placeholder: 'Search customer',
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
                $("input[name=bisnis_party_name]").val(desc);
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
                                    text: `${item.type}`,
                                    id: item.id,
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

            $('.commodity-select').select2({
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

            $(".commodity-select").change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $("input[name=commodity_desc]").val(desc);
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
                $("input[name=term_desc]").val(desc);
            });

        });

        function evtCurrency(evt1 = null, evt2 = null) {
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
                                    id: item.id,
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

            $(evt1).change(function(e) {
                e.preventDefault();
                let desc = $(this).select2('data')[0].custom_attribute;
                $(evt2).val(desc);
            });
        }
    </script>
@endsection
