<div class="row">
    <div class="col-md-7">
        <div class="form-group">
            <label for="code">Booking No <span style="color: red;">*</span></label>
            <input type="text" value="NEW" class="form-control @error('code') is-invalid @enderror" readonly
                name="code" id="code">
            @error('code')
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
                    <label for="booking_date">Booking Date</label>
                    <input type="text" value="{{ old('booking_date', date('Y/m/d H:i')) }}" autocomplete="off"
                        class="form-control @error('booking_date') is-invalid @enderror date-time-picker"
                        name="booking_date" id="booking_date">
                    @error('booking_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="show-fcl mt-1">
            <div class="row align-items-center">
                <div class="col-md-2 ">
                    <label for="container_type">Container</label>
                </div>
                <div class="col-md-10 ">
                    <div class="d-flex flex-row" style="overflow:auto;">
                        <div class="p-2" style="width: 50%">
                            <input type="text" value="{{ old('jml_container_type_1') }}" data-type='currency0'
                                maxlength="10" autocomplete="off" title="No Of Container Type 1"
                                class="form-control @error('jml_container_type_1') is-invalid @enderror"
                                name="jml_container_type_1" id="jml_container_type_1">
                            @error('jml_container_type_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">X</div>
                        <div class="p-2" style="width: 50%">
                            <select name="container_type_1"
                                class="cont-1 @error('container_type_1') is-invalid @enderror">
                                <option value="{{ old('container_type_1') }}">{{ old('container_type_1') }}</option>
                            </select>
                            @error('container_type_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 ">
                    <label for="container_type2">&nbsp;</label>
                </div>
                <div class="col-md-10 ">
                    <div class="d-flex flex-row" style="overflow:auto;">
                        <div class="p-2" style="width: 50%">
                            <input type="text" value="{{ old('jml_container_type_2') }}"
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
                        <div class="p-2" style="width: 50%">
                            <select name="container_type_2"
                                class="cont-1 @error('container_type_2') is-invalid @enderror">
                                <option value="{{ old('container_type_2') }}">{{ old('container_type_2') }}
                                </option>
                            </select>
                            @error('container_type_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 ">
                    <label for="container_type3">&nbsp;</label>
                </div>
                <div class="col-md-10 ">
                    <div class="d-flex flex-row" style="overflow:auto;">
                        <div class="p-2" style="width: 50%">
                            <input type="text" value="{{ old('jml_container_type_3') }}"
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
                        <div class="p-2" style="width: 50%">
                            <select name="container_type_3"
                                class="cont-1 @error('container_type_3') is-invalid @enderror">
                                <option value="{{ old('container_type_3') }}">{{ old('container_type_3') }}
                                </option>
                            </select>
                            @error('container_type_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 ">
                    <label for="container_type4">&nbsp;</label>
                </div>
                <div class="col-md-10 ">
                    <div class="d-flex flex-row" style="overflow:auto;">
                        <div class="p-2" style="width: 50%">
                            <input type="text" value="{{ old('jml_container_type_4') }}"
                                title="No Of Container Type 4" data-type='currency0' maxlength="10"
                                autocomplete="off"
                                class="form-control @error('jml_container_type_4') is-invalid @enderror"
                                name="jml_container_type_4" id="jml_container_type_4">
                            @error('jml_container_type_4')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="p-1 my-2">X</div>
                        <div class="p-2" style="width: 50%">
                            <select name="container_type_4"
                                class="cont-1 @error('container_type_4') is-invalid @enderror">
                                <option value="{{ old('container_type_4') }}">{{ old('container_type_4') }}
                                </option>
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
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="quotation_no">Quotation No</label>
                    <input type="text" class="form-control @error('quotation_no') is-invalid @enderror"
                        name="quotation_no" value="{{ old('quotation_no') }}" id="quotation_no">
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
                    <a href="javascript:void(0)" class="btn btn-primary form-control btn-quot">Search</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="code_customer">Customer Code</label>
                    <input type="text" class="form-control @error('code_customer') is-invalid @enderror"
                        name="code_customer" value="{{ old('code_customer') }}" id="code_customer">
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
                    <input type="text" class="form-control @error('customer') is-invalid @enderror"
                        name="customer" value="{{ old('customer') }}" id="customer">
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
                    <a href="javascript:void(0)" class="btn btn-primary form-control btn-cus">Search</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="contact_name">Contact Name</label>
            <input type="text" class="form-control @error('contact_name') is-invalid @enderror"
                name="contact_name" value="{{ old('contact_name') }}" id="contact_name">
            @error('contact_name')
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
            <label for="telp">Telephone </label>
            <input type="text" value="{{ old('telp') }}"
                class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp">
            @error('telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="fax">Fax </label>
            <input type="text" value="{{ old('fax') }}"
                class="form-control @error('fax') is-invalid @enderror" name="fax" id="fax">
            @error('fax')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email </label>
            <input type="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror" name="email" id="email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
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
            <div class="col-md-8">
                <div class="form-group">
                    <label for="delivery_type"> </label>
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
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="commodity_code">Commodity </label>
                    <select class="commodity-select @error('commodity_code') is-invalid @enderror"
                        name="commodity_code">
                        <option value="{{ old('commodity_code') }}">{{ old('commodity_code') }}</option>
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
                    <input type="text" value="{{ old('commodity') }}" readonly
                        class="form-control @error('commodity') is-invalid @enderror" name="commodity"
                        id="commodity">
                    @error('commodity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-5">
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="job_no">Job No</label>
                    <input type="text" class="form-control @error('job_no') is-invalid @enderror" readonly
                        name="job_no" value="{{ old('job_no') }}" id="job_no">
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
            <label for="job_date">Job Date</label>
            <input type="text" value="{{ old('job_date', date('Y/m/d')) }}" autocomplete="off" readonly
                class="form-control @error('job_date') is-invalid @enderror" name="job_date" id="job_date">
            @error('job_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="import_job_no">Import Job No</label>
            <input type="text" class="form-control @error('import_job_no') is-invalid @enderror"
                name="import_job_no" value="{{ old('import_job_no') }}" id="import_job_no">
            @error('import_job_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="bl_no">B/L No</label>
            <input type="text" class="form-control @error('bl_no') is-invalid @enderror" name="bl_no"
                value="{{ old('bl_no') }}" id="bl_no">
            @error('bl_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
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
        <div class="form-group">
            <label for="nomination_cargo">Nomination Cargo</label>
            <div class="col-md-6">
                <input type="checkbox" name="nomination_cargo" @checked(old('nomination_cargo') == 'yes') value="yes"
                    data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                    data-offstyle="danger">
                @error('nomination_cargo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="railing">Railing</label>
            <div class="col-md-6">
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
        <div class="form-group">
            <label for="refeer_container">Reefer Container</label>
            <div class="col-md-6">
                <input type="checkbox" name="refeer_container" @checked(old('refeer_container') == 'yes') value="yes"
                    data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                    data-offstyle="danger">
                @error('refeer_container')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="etd">ETD <span style="color: red;">*</span></label>
                    <input type="text" value="{{ old('etd') }}" required autocomplete="off"
                        class="form-control @error('etd') is-invalid @enderror date-picker" name="etd"
                        id="etd">
                    @error('etd')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dest_eta">Dest ETA</label>
                    <input type="text" value="{{ old('dest_eta') }}" autocomplete="off"
                        class="form-control @error('dest_eta') is-invalid @enderror date-picker" name="dest_eta"
                        id="dest_eta">
                    @error('dest_eta')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="cargo_class">Cargo Class</label>
            <input type="text" value="{{ old('cargo_class') }}"
                class="form-control @error('cargo_class') is-invalid @enderror" name="cargo_class" id="cargo_class">
            @error('cargo_class')
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
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="origin_code">From </label>
                    <select class="origin-select @error('origin_code') is-invalid @enderror" id="origin-select-1"
                        name="origin_code">
                        <option value="{{ old('origin_code', 'JKT') }}">{{ old('origin_code', 'JKT') }}</option>
                    </select>
                    @error('origin_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="origin_name"> </label>
                    <input type="text" readonly value="{{ old('origin_name', 'JAKARTA') }}"
                        class="form-control origin-name @error('origin_name') is-invalid @enderror"
                        name="origin_name" id="origin-name-1">
                    @error('origin_name')
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
                    <label for="dest_code">Destination <span style="color: red;">*</span></label>
                    <select class="dest-select @error('dest_code') is-invalid @enderror" required id="dest-select-1"
                        name="dest_code">
                        <option value="{{ old('dest_code') }}">{{ old('dest_code') }}</option>
                    </select>
                    @error('dest_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="dest_name"> </label>
                    <input type="text" readonly value="{{ old('dest_name') }}"
                        class="form-control dest-name @error('dest_name') is-invalid @enderror" name="dest_name"
                        id="dest-name-1">
                    @error('dest_name')
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
                    <label for="country_code">Dest Country </label>
                    <input type="text" readonly name="country_code" id="country_code"
                        value="{{ old('country_code') }}"
                        class="form-control @error('country_code') is-invalid @enderror">
                    @error('country_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="country_name"> </label>
                    <input type="text" readonly value="{{ old('country_name') }}"
                        class="form-control dest-name @error('country_name') is-invalid @enderror"
                        name="country_name" id="country-name-1">
                    @error('country_name')
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
        <label for="total_pcs">Pcs/Weight/Volume</label>
    </div>
    <div class="col-md-10 mt-2">
        <div class="row" style="overflow:auto;">
            <div class="d-flex flex-row">

                <div class="p-2" style="width: 15%">
                    <input type="text" value="{{ old('total_pcs') }}" title="Total Pcs" placeholder="Total Pcs"
                        data-type='currency0' maxlength="10" autocomplete="off"
                        class="form-control @error('total_pcs') is-invalid @enderror" name="total_pcs"
                        id="total_pcs">
                    @error('total_pcs')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-2" style="width: 12%">
                    <select name="uom_code" class="uom-select @error('uom_code') is-invalid @enderror">
                        <option value="{{ old('uom_code') }}">{{ old('uom_code') }}</option>
                    </select>
                    @error('uom_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-2" style="width: 20%">
                    <input type="text" class="form-control @error('uom') is-invalid @enderror" readonly
                        name="uom" value="{{ old('uom') }}" id="uom">
                    @error('uom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-1 my-2">/</div>
                <div class="p-2" style="width: 20%">
                    <input type="text" data-type='currency4' autocomplete="off" title="Total Gross Weight"
                        placeholder="Total Gross Weight" value="{{ old('total_gross') }}"
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
                        value="{{ old('total_volume') }}" placeholder="Total Volume"
                        class="form-control @error('total_volume') is-invalid @enderror" name="total_volume"
                        id="total_volume">
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

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="footer_1">Booking Remark </label>
                    <input type="text" value="{{ old('footer_1') }}"
                        class="form-control @error('footer_1') is-invalid @enderror" placeholder="Remark 1"
                        name="footer_1" id="footer_1">
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
                    <input type="text" value="{{ old('footer_2') }}"
                        class="form-control @error('footer_2') is-invalid @enderror" name="footer_2"
                        placeholder="Remark 2" id="footer_2">
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
                    <input type="text" value="{{ old('footer_3') }}"
                        class="form-control @error('footer_3') is-invalid @enderror" name="footer_3"
                        placeholder="Remark 3" id="footer_3">
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
                    <input type="text" value="{{ old('footer_4') }}"
                        class="form-control @error('footer_4') is-invalid @enderror" name="footer_4"
                        placeholder="Remark 4" id="footer_4">
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
                    <input type="text" value="{{ old('footer_5') }}"
                        class="form-control @error('footer_5') is-invalid @enderror" name="footer_5"
                        placeholder="Remark 5" id="footer_5">
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
                    <input type="text" value="{{ old('footer_6') }}"
                        class="form-control @error('footer_6') is-invalid @enderror" name="footer_6"
                        placeholder="Remark 6" id="footer_6">
                    @error('footer_6')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Search Quotation -->
<div class="modal fade" id="modal-sq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search Quotation</h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-0">
                    <table id="tableQuot" class="modal-table1 table modal-tableview table-bordered table-hover w-100">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>No</th>
                                <th class="select-filter">Quotation No</th>
                                <th class="select-filter">Port Loading</th>
                                <th class="select-filter">Port Discharge</th>
                                <th class="select-filter">From</th>
                                <th class="select-filter">Dest</th>
                                {{-- <th class="select-filter">Customer</th>
                                <th class="select-filter">Salesman</th> --}}
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
                    <table id="tableCus" class="modal-table1 table modal-tableview table-bordered table-hover w-100">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>No</th>
                                <th class="select-filter">Customer</th>
                                <th class="select-filter">Quotation No</th>
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
@section('sub_script_1')
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            dataTableQuotation('#tableQuot');
            dataTableCustomer('#tableCus');
            evtCity("#origin-select-1", "#origin-name-1");
            evtCity("#dest-select-1", "#dest-name-1", true);
            evtSalesman(".salesman-select", "input[name=salesman]");
            evtDeliveryType(".deltype-select", "input[name=delivery_type]");
            evtCommodity(".commodity-select", "input[name=commodity]");
            evtUom(".uom-select", "input[name=uom]");

            $(`input[name=etd]`).change(function(e) {
                e.preventDefault();
                $("input[name=etd_date]").val($(this).val());
            });

            $(`.btn-quot`).click(function(e) {
                e.preventDefault();
                $(`#modal-sq`).modal({
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

            $('.select-2').select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
            });

            $(`.cont-1`).select2({
                placeholder: 'Search Container Type',
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
                                    text: `${item.type} - ${item.description}`,
                                    id: item.type,
                                }
                            })
                        };
                    },
                    cache: false
                }
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

        });

        function dataTableCustomer(idTable) {
            var table = $(idTable).DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                ajax: {
                    url: '{{ route('get.table.sea_cus') }}',
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
                        data: 'sea_quot_no',
                        name: 'sea_quot_no'
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
                if (table.rows(colIdx).nodes().to$().find('td:first-child .input_check').is(':checked') === true) {
                    table.rows(colIdx).nodes().to$().find('td:first-child .input_check').prop('checked', false);
                } else {
                    table.rows(colIdx).nodes().to$().find('td:first-child .input_check').prop('checked', true);

                    let id = table.rows(colIdx).nodes().to$().find('td:first-child .input_check:checked').val();
                    let sea_quotation_id = table.rows(colIdx).nodes().to$().find(
                        'td:first-child .input_check:checked').data('sea_quotation_id');
                    let sea_quotation_d1_id = table.rows(colIdx).nodes().to$().find(
                        'td:first-child .input_check:checked').data('sea_quotation_d1_id');

                    $.ajax({
                        type: "POST",
                        url: '{{ route('search.sea_cus') }}',
                        data: {
                            id: id,
                            sea_quotation_id: sea_quotation_id,
                            sea_quotation_d1_id: sea_quotation_d1_id
                        },
                        dataType: "json",
                        success: function(res) {
                            $(`#modal-cus`).modal('hide');
                            $("input[name=code_customer]").val(res.code);
                            $("input[name=customer]").val(res.name);
                            $("input[name=quotation_no]").val(res.sea_quot_no);
                            $("input[name=contact_name]").val(res.contact_name);
                            $("input[name=reference_no]").val(res.reference_no);
                            $("input[name=telp]").val(res.telp);
                            $("input[name=fax]").val(res.fax);
                            $("input[name=email]").val(res.email);
                            $("input[name=total_gross]").val(numberFormatter(parseFloat(res
                                .total_gross)));
                            $("input[name=total_volume]").val(numberFormatter(parseFloat(res
                                .total_volume)));
                            $("input[name=total_pcs]").val(res.pcs);

                            $("#gross-weight-1").val(numberFormatter(parseFloat(res
                                .total_gross)));
                            $("#cargo-volume-1").val(numberFormatter(parseFloat(res
                                .total_volume)));
                            $("#pcs-1").val(res.pcs);

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

                            if (res.commodity_code != null) {
                                var newCommodity = new Option(res
                                    .commodity_code, res
                                    .commodity_code, true, true);
                                $("select[name=commodity_code], #cargo-select-1").append(newCommodity)
                                    .trigger('change');
                                $("input[name=commodity], #cargo-commodity-1").val(res
                                    .commodity);
                            } else {
                                $("select[name=commodity_code], #cargo-select-1").empty;
                                $("input[name=commodity], #cargo-commodity-1").val("");
                            }

                            if (res.uom_code != null) {
                                var newUom = new Option(res.uom_code, res
                                    .uom_code, true, true);
                                $("select[name=uom_code], #cargo-uom-select-1").append(newUom).trigger(
                                    'change');
                                $("input[name=uom], #cargo-uom-1").val(res
                                    .uom);
                            } else {
                                $("select[name=uom_code], #cargo-uom-select-1").empty();
                                $("input[name=uom], #cargo-uom-1").val("");
                            }

                            if (res.origin_code != null) {
                                var newFrom = new Option(res.origin_code, res.origin_code, true, true);
                                $("select[name=origin_code]").append(newFrom).trigger('change');
                                $("input[name=origin_name]").val(res.origin_name);
                            } else {
                                $("select[name=origin_code]").empty();
                                $("input[name=origin_name]").val("");
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

                            if (res.agent_code != null) {
                                var newAgentCode = new Option(res.agent_code, res
                                    .agent_code, true, true);
                                $("select[name=agent_code]").append(newAgentCode).trigger('change');
                                $("input[name=agent_name]").val(res.agent_name);
                                $("input[name=agent_address_1]").val(res.agent_address_1);
                                $("input[name=agent_address_2]").val(res.agent_address_2);
                                $("input[name=agent_address_3]").val(res.agent_address_3);
                                $("input[name=agent_address_4]").val(res.agent_address_4);
                            } else {
                                $("select[name=agent_code]").empty();
                                $("input[name=agent_name]").val("");
                                $("input[name=agent_address_1]").val("");
                                $("input[name=agent_address_2]").val("");
                                $("input[name=agent_address_3]").val("");
                                $("input[name=agent_address_4]").val("");
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

                            if (res.dest_code != null) {
                                var newTo = new Option(res.dest_code, res.dest_code, true, true);
                                $("select[name=dest_code]").append(newTo).trigger('change');
                                $("input[name=dest_name]").val(res.dest_name);

                                $.ajax({
                                    type: "POST",
                                    url: '{{ route('by.code.city') }}',
                                    data: {
                                        code: res.dest_code
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        $("input[name=country_code]").val(response.country
                                            .code);
                                        $("input[name=country_name]").val(response.country
                                            .name);
                                    }
                                });
                            } else {
                                $("select[name=dest_code]").empty();
                                $("input[name=dest_name]").val("");
                                $("input[name=country_code]").val("");
                                $("input[name=country_name]").val("");
                            }
                        }
                    });

                }
            });

            return table;
        }

        function dataTableQuotation(idTable) {
            var table = $(idTable).DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                ajax: {
                    url: '{{ route('get.table.sea_quot') }}',
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
                        data: 'sea_quotation.sea_quot_no',
                        name: 'sea_quotation.sea_quot_no'
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
                    {
                        data: 'sea_quotation.quotation.commodity',
                        name: 'sea_quotation.quotation.commodity'
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
                    let sea_quotation_id = table.rows(colIdx).nodes().to$().find(
                        'td:first-child .input_check:checked').data('sea_quotation_id');

                    $.ajax({
                        type: "POST",
                        url: '{{ route('search.sea_quot') }}',
                        data: {
                            id: id,
                            sea_quotation_id: sea_quotation_id
                        },
                        dataType: "json",
                        success: function(res) {
                            $(`#modal-sq`).modal('hide');
                            $("input[name=code_customer]").val(res.sea_quotation.quotation
                                .customer_code);
                            $("input[name=customer]").val(res.sea_quotation.quotation
                                .customer);
                            $("input[name=quotation_no]").val(res.sea_quotation.sea_quot_no);
                            $("input[name=contact_name]").val(res.sea_quotation.quotation.contact_name);
                            $("input[name=reference_no]").val(res.sea_quotation.quotation.reference_no);
                            $("input[name=telp]").val(res.sea_quotation.quotation.telp);
                            $("input[name=fax]").val(res.sea_quotation.quotation.fax);
                            $("input[name=email]").val(res.sea_quotation.quotation.email);
                            $("input[name=total_gross]").val(numberFormatter(parseFloat(res
                                .sea_quotation.quotation
                                .total_gross)));
                            $("input[name=total_volume]").val(numberFormatter(parseFloat(res
                                .sea_quotation.quotation.total_volume)));
                            $("input[name=total_pcs]").val(res.sea_quotation.quotation.pcs);
                            $("#gross-weight-1").val(numberFormatter(parseFloat(res
                                .sea_quotation.quotation
                                .total_gross)));
                            $("#cargo-volume-1").val(numberFormatter(parseFloat(res
                                .sea_quotation.quotation.total_volume)));
                            $("#pcs-1").val(res.sea_quotation.quotation.pcs);

                            if (res.sea_quotation.quotation.salesman_code != null) {
                                var newSales = new Option(res.sea_quotation.quotation
                                    .salesman_code, res.sea_quotation.quotation
                                    .salesman_code, true, true);
                                $("select[name=salesman_code]").append(newSales).trigger('change');
                                $("input[name=salesman]").val(res.sea_quotation.quotation.salesman);
                            } else {
                                $("select[name=salesman_code]").empty();
                                $("input[name=salesman]").val("");
                            }

                            if (res.sea_quotation.quotation.delivery_type_code != null) {
                                var newDelType = new Option(res.sea_quotation.quotation
                                    .delivery_type_code,
                                    res.sea_quotation.quotation
                                    .delivery_type_code, true, true);
                                $("select[name=delivery_type_code]").append(newDelType).trigger(
                                    'change');
                                $("input[name=delivery_type]").val(res.sea_quotation.quotation
                                    .delivery_type);
                            } else {
                                $("select[name=delivery_type_code]").empty();
                                $("input[name=delivery_type]").val("");
                            }

                            if (res.sea_quotation.quotation.commodity_code != null) {
                                var newCommodity = new Option(res.sea_quotation.quotation
                                    .commodity_code, res.sea_quotation.quotation
                                    .commodity_code, true, true);
                                $("select[name=commodity_code], #cargo-select-1").append(newCommodity)
                                    .trigger('change');
                                $("input[name=commodity], #cargo-commodity-1").val(res.sea_quotation
                                    .quotation
                                    .commodity);
                            } else {
                                $("select[name=commodity_code], #cargo-select-1").empty();
                                $("input[name=commodity], #cargo-commodity-1").val("");
                            }

                            if (res.sea_quotation.quotation.uom_code != null) {
                                var newUom = new Option(res.sea_quotation.quotation
                                    .uom_code, res.sea_quotation.quotation
                                    .uom_code, true, true);
                                $("select[name=uom_code], #cargo-uom-select-1").append(newUom).trigger(
                                    'change');
                                $("input[name=uom], #cargo-uom-1").val(res.sea_quotation.quotation
                                    .uom);
                            } else {
                                $("select[name=uom_code], #cargo-uom-select-1").empty();
                                $("input[name=uom], #cargo-uom-1").val("");
                            }

                            if (res.origin_code != null) {
                                var newFrom = new Option(res.origin_code, res.origin_code, true, true);
                                $("select[name=origin_code]").append(newFrom).trigger('change');
                                $("input[name=origin_name]").val(res.origin_name);
                            } else {
                                $("select[name=origin_code]").empty();
                                $("input[name=origin_name]").val("");
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

                            if (res.sea_quotation.agent_code != null) {
                                var newAgentCode = new Option(res.sea_quotation.agent_code, res
                                    .sea_quotation.agent_code, true, true);
                                $("select[name=agent_code]").append(newAgentCode).trigger('change');
                                $("input[name=agent_name]").val(res.sea_quotation.agent_name);
                                $("input[name=agent_address_1]").val(res.sea_quotation.agent_address_1);
                                $("input[name=agent_address_2]").val(res.sea_quotation.agent_address_2);
                                $("input[name=agent_address_3]").val(res.sea_quotation.agent_address_3);
                                $("input[name=agent_address_4]").val(res.sea_quotation.agent_address_4);
                            } else {
                                $("select[name=agent_code]").empty();
                                $("input[name=agent_name]").val("");
                                $("input[name=agent_address_1]").val("");
                                $("input[name=agent_address_2]").val("");
                                $("input[name=agent_address_3]").val("");
                                $("input[name=agent_address_4]").val("");
                            }

                            if (res.sea_quotation.consignee_code != null) {
                                var newConsigneeCode = new Option(res.sea_quotation.consignee_code, res
                                    .sea_quotation.consignee_code, true, true);
                                $("select[name=consignee_code]").append(newConsigneeCode).trigger(
                                    'change');
                                $("input[name=consignee_name]").val(res.sea_quotation.consignee_name);
                                $("input[name=consignee_address_1]").val(res.sea_quotation
                                    .consignee_address_1);
                                $("input[name=consignee_address_2]").val(res.sea_quotation
                                    .consignee_address_2);
                                $("input[name=consignee_address_3]").val(res.sea_quotation
                                    .consignee_address_3);
                                $("input[name=consignee_address_4]").val(res.sea_quotation
                                    .consignee_address_4);
                            } else {
                                $("select[name=consignee_code]").empty();
                                $("input[name=consignee_name]").val("");
                                $("input[name=consignee_address_1]").val("");
                                $("input[name=consignee_address_2]").val("");
                                $("input[name=consignee_address_3]").val("");
                                $("input[name=consignee_address_4]").val("");
                            }

                            if (res.sea_quotation.shipper_code != null) {
                                var newShipperCode = new Option(res.sea_quotation.shipper_code, res
                                    .sea_quotation.shipper_code, true, true);
                                $("select[name=shipper_code]").append(newShipperCode).trigger(
                                    'change');
                                $("input[name=shipper_name]").val(res.sea_quotation.shipper_name);
                                $("input[name=shipper_address_1]").val(res.sea_quotation
                                    .shipper_address_1);
                                $("input[name=shipper_address_2]").val(res.sea_quotation
                                    .shipper_address_2);
                                $("input[name=shipper_address_3]").val(res.sea_quotation
                                    .shipper_address_3);
                                $("input[name=shipper_address_4]").val(res.sea_quotation
                                    .shipper_address_4);
                            } else {
                                $("select[name=shipper_code]").empty();
                                $("input[name=shipper_name]").val("");
                                $("input[name=shipper_address_1]").val("");
                                $("input[name=shipper_address_2]").val("");
                                $("input[name=shipper_address_3]").val("");
                                $("input[name=shipper_address_4]").val("");
                            }

                            if (res.dest_code != null) {
                                var newTo = new Option(res.dest_code, res.dest_code, true, true);
                                $("select[name=dest_code]").append(newTo).trigger('change');
                                $("input[name=dest_name]").val(res.dest_name);

                                $.ajax({
                                    type: "POST",
                                    url: '{{ route('by.code.city') }}',
                                    data: {
                                        code: res.dest_code
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        $("input[name=country_code]").val(response.country
                                            .code);
                                        $("input[name=country_name]").val(response.country
                                            .name);
                                    }
                                });
                            } else {
                                $("select[name=dest_code]").empty();
                                $("input[name=dest_name]").val("");
                                $("input[name=country_code]").val("");
                                $("input[name=country_name]").val("");
                            }
                        }
                    });

                }
            });

            return table;
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

        function evtCity(evt1 = null, evt2 = null, evt3 = false) {
            $(evt1).select2({
                placeholder: 'Search...',
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
                                    text: `${item.code} - ${item.name}`,
                                    id: item.code,
                                    custom_attribute: item.name,
                                    code_country: item.country.code,
                                    name_country: item.country.name,
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

                let name_country = $(this).select2('data')[0].name_country;
                let code_country = $(this).select2('data')[0].code_country;

                if (evt3 == true) {
                    $("input[name=country_code]").val(code_country);
                    $("input[name=country_name]").val(name_country);
                }

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

        function numberFormatter(num) {
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
    </script>
@endsection
