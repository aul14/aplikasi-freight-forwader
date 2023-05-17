<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="delivery_type_code">Delivery Type </label>
                    <select class="deltype-select @error('delivery_type_code') is-invalid @enderror"
                        name="delivery_type_code">
                        <option value="{{ old('delivery_type_code', $sd2->delivery_type_code) }}">
                            {{ old('delivery_type_code', $sd2->delivery_type_code) }}</option>
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
                    <label for="delivery_type">&nbsp; </label>
                    <input type="text" readonly class="form-control @error('delivery_type') is-invalid @enderror"
                        name="delivery_type" value="{{ old('delivery_type', $sd2->delivery_type) }}" id="delivery_type">
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
                        <option value="{{ old('commodity_code', $sd2->commodity_code) }}">
                            {{ old('commodity_code', $sd2->commodity_code) }}</option>
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
                    <label for="commodity">&nbsp; </label>
                    <input type="text" value="{{ old('commodity', $sd2->commodity) }}" readonly
                        class="form-control @error('commodity') is-invalid @enderror" name="commodity" id="commodity">
                    @error('commodity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="cargo_class">Cargo Class </label>
            <select class="select-2 @error('cargo_class') is-invalid @enderror" name="cargo_class">
                <option value=""></option>
                <option value="0 - LIGUID BULK" @selected(old('cargo_class', $sd2->cargo_class) == '0 - LIGUID BULK')>0 - LIGUID BULK</option>
                <option value="1 - BREAK BULK/GENERAL BULK" @selected(old('cargo_class', $sd2->cargo_class) == '1 - BREAK BULK/GENERAL BULK')>1 - BREAK BULK/GENERAL BULK
                </option>
                <option value="2 - CONTAINER" @selected(old('cargo_class', $sd2->cargo_class) == '2 - CONTAINER')>2 - CONTAINER</option>
                <option value="6 - PASSENGER" @selected(old('cargo_class', $sd2->cargo_class) == '6 - PASSENGER')>6 - PASSENGER</option>
                <option value="7 - VEHICLES" @selected(old('cargo_class', $sd2->cargo_class) == '7 - VEHICLES')>7 - VEHICLES</option>
                <option value="9 - GENERAL" @selected(old('cargo_class', $sd2->cargo_class) == '9 - GENERAL')>9 - GENERAL</option>
                <option value="A - DANGEROUS GOODS CLASS I" @selected(old('cargo_class', $sd2->cargo_class) == 'A - DANGEROUS GOODS CLASS I')>A - DANGEROUS GOODS CLASS I
                </option>
                <option value="B - DANGEROUS GOODS CLASS II" @selected(old('cargo_class', $sd2->cargo_class) == 'B - DANGEROUS GOODS CLASS II')>B - DANGEROUS GOODS CLASS II
                </option>
                <option value="C - DANGEROUS GOODS CLASS III" @selected(old('cargo_class', $sd2->cargo_class) == 'C - DANGEROUS GOODS CLASS III')>C - DANGEROUS GOODS CLASS III
                </option>
                <option value="L - LIVE STOCK" @selected(old('cargo_class', $sd2->cargo_class) == 'L - LIVE STOCK')>L - LIVE STOCK</option>
                <option value="S - SPECIAL" @selected(old('cargo_class', $sd2->cargo_class) == 'S - SPECIAL')>S - SPECIAL</option>
                <option value="V - VALUABLE" @selected(old('cargo_class', $sd2->cargo_class) == 'V - VALUABLE')>V - VALUABLE</option>
            </select>
            @error('cargo_class')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="dg_cargo">DG Cargo</label>
            <div class="col-md-6">
                <input type="checkbox" name="dg_cargo" @checked(old('dg_cargo', $sd2->dg_cargo) == 'yes') value="yes" data-toggle="toggle"
                    data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="danger">
                @error('dg_cargo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="origin_code">From <span style="color: red;">*</span></label>
                    <select class="origin-select @error('origin_code') is-invalid @enderror" required
                        id="origin-select-1" name="origin_code">
                        <option value="{{ old('origin_code', $sd2->origin_code) }}">
                            {{ old('origin_code', $sd2->origin_code) }}</option>
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
                    <label for="origin_name">&nbsp; </label>
                    <input type="text" readonly value="{{ old('origin_name', $sd2->origin_name) }}"
                        class="form-control origin-name @error('origin_name') is-invalid @enderror" name="origin_name"
                        id="origin-name-1">
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
                    <label for="dest_code">Destination </label>
                    <select class="dest-select @error('dest_code') is-invalid @enderror" id="dest-select-1"
                        name="dest_code">
                        <option value="{{ old('dest_code', !empty($sd2->dest_code) ? $sd2->dest_code : 'JKT') }}">
                            {{ old('dest_code', !empty($sd2->dest_code) ? $sd2->dest_code : 'JKT') }}</option>
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
                    <label for="dest_name">&nbsp; </label>
                    <input type="text" readonly
                        value="{{ old('dest_name', !empty($sd2->dest_name) ? $sd2->dest_name : 'JAKARTA') }}"
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
        <div class="form-group">
            <label for="place_of_receipt">Place of Receipt</label>
            <input type="text"
                value="{{ old('place_of_receipt', !empty($sd2->place_of_receipt) ? $sd2->place_of_receipt : 'CFS') }}"
                class="form-control @error('place_of_receipt') is-invalid @enderror" name="place_of_receipt"
                id="place_of_receipt">
            @error('place_of_receipt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="port_loading_code">Port Of Loading <span style="color: red;">*</span></label>
                    <select class="portloading-select @error('port_loading_code') is-invalid @enderror" required
                        id="portloading-select-1" name="port_loading_code">
                        <option value="{{ old('port_loading_code', $sd2->port_loading_code) }}">
                            {{ old('port_loading_code', $sd2->port_loading_code) }}</option>
                    </select>
                    @error('port_loading_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="port_loading_name">&nbsp; </label>
                    <input type="text" readonly class="form-control portloading-name"
                        value="{{ old('port_loading_name', $sd2->port_loading_name) }}" name="port_loading_name"
                        id="portloading-name-1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="via_port_code">Via Port </label>
                    <select class="viaport-select @error('via_port_code') is-invalid @enderror" id="viaport-select-1"
                        name="via_port_code">
                        <option value="{{ old('via_port_code', $sd2->via_port_code) }}">
                            {{ old('via_port_code', $sd2->via_port_code) }}
                        </option>
                    </select>
                    @error('via_port_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="via_port_name">&nbsp; </label>
                    <input type="text" readonly class="form-control viaport-name"
                        value="{{ old('via_port_name', $sd2->via_port_name) }}" name="via_port_name"
                        id="viaport-name-1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="port_discharge_code">Port Of Discharge <span style="color: red;">*</span></label>
                    <select class="portdischarge-select @error('port_discharge_code') is-invalid @enderror" required
                        id="portdischarge-select-1" name="port_discharge_code">
                        <option
                            value="{{ old('port_discharge_code', !empty($sd2->port_discharge_code) ? $sd2->port_discharge_code : 'IDJKT') }}">
                            {{ old('port_discharge_code', !empty($sd2->port_discharge_code) ? $sd2->port_discharge_code : 'IDJKT') }}
                        </option>
                    </select>
                    @error('port_discharge_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="port_discharge_name">&nbsp; </label>
                    <input type="text" readonly class="form-control portdischarge-name"
                        value="{{ old('port_discharge_name', !empty($sd2->port_discharge_name) ? $sd2->port_discharge_name : 'JAKARTA, INDONESIA') }}"
                        name="port_discharge_name" id="portdischarge-name-1">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="place_of_delivery">Place of Delivery</label>
            <input type="text"
                value="{{ old('place_of_delivery', !empty($sd2->place_of_delivery) ? $sd2->place_of_delivery : 'JAKARTA CFS') }}"
                class="form-control @error('place_of_delivery') is-invalid @enderror" name="place_of_delivery"
                id="place_of_delivery">
            @error('place_of_delivery')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="vessel_code">Vessel </label>
                    <select class="vessel-select @error('vessel_code') is-invalid @enderror" id="vessel-select-1"
                        name="vessel_code">
                        <option value="{{ old('vessel_code', $sd2->vessel_code) }}">
                            {{ old('vessel_code', $sd2->vessel_code) }}</option>
                    </select>
                    @error('vessel_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="vessel_name"> </label>
                    <input type="text" readonly class="form-control vessel-name"
                        value="{{ old('vessel_name', $sd2->vessel_name) }}" name="vessel_name" id="vessel-name-1">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="voyage_no">Voyage</label>
            <input type="text" value="{{ old('voyage_no', $sd2->voyage_no) }}"
                class="form-control @error('voyage_no') is-invalid @enderror" name="voyage_no" id="voyage_no">
            @error('voyage_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="mother_voyage">Mother Voyage</label>
                    <input type="text" value="{{ old('mother_voyage', $sd2->mother_voyage) }}"
                        class="form-control @error('mother_voyage') is-invalid @enderror" name="mother_voyage"
                        id="mother_voyage">
                    @error('mother_voyage')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="mother_vessel_name">Mother Vessel</label>
                    <input type="text" value="{{ old('mother_vessel_name', $sd2->mother_vessel_name) }}"
                        class="form-control @error('mother_vessel_name') is-invalid @enderror"
                        name="mother_vessel_name" id="mother_vessel_name">
                    @error('mother_vessel_name')
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
                    <label for="etd">ETD </label>
                    <input type="text"
                        value="{{ old('etd', !empty($sd2->etd) ? date('d/m/Y', strtotime($sd2->etd)) : '') }}"
                        placeholder="ETD" autocomplete="off"
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
                    <label for="first_via_eta">Via ETA</label>
                    <input type="text"
                        value="{{ old('first_via_eta', !empty($sd2->first_via_eta) ? date('d/m/Y', strtotime($sd2->first_via_eta)) : '') }}"
                        placeholder="First Via ETA" autocomplete="off"
                        class="form-control @error('first_via_eta') is-invalid @enderror date-picker"
                        name="first_via_eta" id="first_via_eta">
                    @error('first_via_eta')
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
                    <label for="eta">ETA <span style="color: red;">*</span></label>
                    <input type="text"
                        value="{{ old('eta', !empty($sd2->eta) ? date('Y/m/d H:i', strtotime($sd2->eta)) : '') }}"
                        placeholder="ETA" required autocomplete="off"
                        class="form-control @error('eta') is-invalid @enderror date-time-picker" name="eta"
                        id="eta">
                    @error('eta')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dest_eta">Dest ETA</label>
                    <input type="text"
                        value="{{ old('dest_eta', !empty($sd2->dest_eta) ? date('Y/m/d H:i', strtotime($sd2->dest_eta)) : '') }}"
                        placeholder="Dest ETA" autocomplete="off"
                        class="form-control @error('dest_eta') is-invalid @enderror date-time-picker" name="dest_eta"
                        id="dest_eta">
                    @error('dest_eta')
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
                    <label for="service_level">Service Level</label>
                    <input type="text" value="{{ old('service_level', $sd2->service_level) }}"
                        class="form-control @error('service_level') is-invalid @enderror" name="service_level"
                        id="service_level">
                    @error('service_level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shipmode">Ship Mode </label>
                    <select class="select-2 @error('shipmode') is-invalid @enderror" name="shipmode">
                        <option value=""></option>
                        <option value="ROUTING ORDER" @selected(old('shipmode', $sd2->shipmode) == 'ROUTING ORDER')>ROUTING ORDER</option>
                        <option value="FREE HANDS" @selected(old('shipmode', $sd2->shipmode) == 'FREE HANDS')>FREE HANDS</option>
                        <option value="TRANSIT" @selected(old('shipmode', $sd2->shipmode) == 'TRANSIT')>TRANSIT</option>
                    </select>
                    @error('shipmode')
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
                    <label for="shippline_code">Shipping Line </label>
                    <select class="shipping-select @error('shippline_code') is-invalid @enderror"
                        id="shipping-select-1" name="shippline_code">
                        <option value="{{ old('shippline_code', $sd2->shippline_code) }}">
                            {{ old('shippline_code', $sd2->shippline_code) }}
                        </option>
                    </select>
                    @error('shippline_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="shippline_name"> </label>
                    <input type="text" readonly class="form-control shipping-name"
                        value="{{ old('shippline_name', $sd2->shippline_name) }}" name="shippline_name"
                        id="shipping-name-1">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="shippline_ref_no">Shipping Line Ref No.</label>
            <input type="text" value="{{ old('shippline_ref_no', $sd2->shippline_ref_no) }}"
                class="form-control @error('shippline_ref_no') is-invalid @enderror" name="shippline_ref_no"
                id="shippline_ref_no">
            @error('shippline_ref_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="coloader_code">Coloader Agent Code </label>
                    <select class="coloader-select @error('coloader_code') is-invalid @enderror"
                        id="coloader-select-1" name="coloader_code">
                        <option value="{{ old('coloader_code', $sd2->coloader_code) }}">
                            {{ old('coloader_code', $sd2->coloader_code) }}</option>
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
                    <label for="coloader_name">&nbsp; </label>
                    <input type="text" readonly class="form-control coloader-name"
                        value="{{ old('coloader_name', $sd2->coloader_name) }}" name="coloader_name"
                        id="coloader-name-1">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="coloader_ref_no">Coloader Ref No.</label>
            <input type="text" value="{{ old('coloader_ref_no', $sd2->coloader_ref_no) }}"
                class="form-control @error('coloader_ref_no') is-invalid @enderror" name="coloader_ref_no"
                id="coloader_ref_no">
            @error('coloader_ref_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="detention_free_day">Detention Free Day</label>
                    <input type="number" value="{{ old('detention_free_day', $sd2->detention_free_day) }}"
                        class="form-control @error('detention_free_day') is-invalid @enderror"
                        name="detention_free_day" id="detention_free_day">
                    @error('detention_free_day')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="demurage_free_day">Demurage Free Day</label>
                    <input type="number" value="{{ old('demurage_free_day', $sd2->demurage_free_day) }}"
                        class="form-control @error('demurage_free_day') is-invalid @enderror"
                        name="demurage_free_day" id="demurage_free_day">
                    @error('demurage_free_day')
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
                    <label for="permit_no">Permit No </label>
                    <input type="text" value="{{ old('permit_no', $sd2->permit_no) }}"
                        class="form-control @error('permit_no') is-invalid @enderror" name="permit_no"
                        id="permit_no">
                    @error('permit_no')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="letter_of_credit_no">Letter Of Credit </label>
                    <input type="text" value="{{ old('letter_of_credit_no', $sd2->letter_of_credit_no) }}"
                        class="form-control @error('letter_of_credit_no') is-invalid @enderror"
                        name="letter_of_credit_no" id="letter_of_credit_no">
                    @error('letter_of_credit_no')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>
</div>
@section('sub_script_2')
    <script>
        $(function() {
            evtDeliveryType(".deltype-select", "input[name=delivery_type]");
            evtCommodity(".commodity-select", "input[name=commodity]");
            evtCity("#origin-select-1", "#origin-name-1");
            evtCity("#dest-select-1", "#dest-name-1");
            evtPort("#portloading-select-1", "#portloading-name-1");
            evtPort("#portdischarge-select-1", "#portdischarge-name-1");
            evtPort("#viaport-select-1", "#viaport-name-1");
            evtVessel("#vessel-select-1", "#vessel-name-1");
            evtShippline("#shipping-select-1", "#shipping-name-1");
            evtBisnisPartyNotComplete("#coloader-select-1", "#coloader-name-1");
            evtBisnisPartyNotComplete("#stuff-select-1", "#stuff-name-1");
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

        function evtPort(evt1 = null, evt2 = null) {
            $(`${evt1}`).select2({
                placeholder: 'Search...',
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

        function evtVessel(evt1 = null, evt2 = null) {
            $(`${evt1}`).select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.vessel') }}',
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
    </script>
@endsection
