<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="shipment_type">Shipment Type</label>
            <select class="select-2 @error('shipment_type') is-invalid @enderror" name="shipment_type">
                <option value="HOUSE" @selected(old('shipment_type') == 'HOUSE')>HOUSE</option>
                <option value="DIRECT" @selected(old('shipment_type') == 'DIRECT')>DIRECT</option>
                <option value="SUB-MASTER" @selected(old('shipment_type') == 'SUB-MASTER')>SUB-MASTER</option>
            </select>
            @error('shipment_type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="master_job_no">Master Job No.</label>
            <input type="text" value="{{ old('master_job_no') }}"
                class="form-control @error('master_job_no') is-invalid @enderror" name="master_job_no"
                id="master_job_no">
            @error('master_job_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="place_of_receipt">Place of Receipt</label>
            <input type="text" value="{{ old('place_of_receipt', 'JAKARTA CY') }}"
                class="form-control @error('place_of_receipt') is-invalid @enderror" name="place_of_receipt"
                id="place_of_receipt">
            @error('place_of_receipt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row my-2">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="port_loading_code">Port Of Loading </label>
                    <select class="portloading-select @error('port_loading_code') is-invalid @enderror"
                        id="portloading-select-1" name="port_loading_code">
                        <option value="{{ old('port_loading_code', 'IDJKT') }}">
                            {{ old('port_loading_code', 'IDJKT') }}</option>
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
                    <label for="port_loading_name"> </label>
                    <input type="text" readonly class="form-control portloading-name"
                        value="{{ old('port_loading_name', 'JAKARTA, INDONESIA') }}" name="port_loading_name"
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
                        <option value="{{ old('via_port_code') }}">{{ old('via_port_code') }}</option>
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
                    <label for="via_port_name"> </label>
                    <input type="text" readonly class="form-control viaport-name" value="{{ old('via_port_name') }}"
                        name="via_port_name" id="viaport-name-1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="port_discharge_code">Port Of Discharge </label>
                    <select class="portdischarge-select @error('port_discharge_code') is-invalid @enderror"
                        id="portdischarge-select-1" name="port_discharge_code">
                        <option value="{{ old('port_discharge_code') }}">{{ old('port_discharge_code') }}</option>
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
                    <label for="port_discharge_name"> </label>
                    <input type="text" readonly class="form-control portdischarge-name"
                        value="{{ old('port_discharge_name') }}" name="port_discharge_name" id="portdischarge-name-1">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="terminal">Terminal</label>
            <input type="text" value="{{ old('terminal') }}"
                class="form-control @error('terminal') is-invalid @enderror" name="terminal" id="terminal">
            @error('terminal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="place_of_delivery">Place of Delivery</label>
            <input type="text" value="{{ old('place_of_delivery') }}"
                class="form-control @error('place_of_delivery') is-invalid @enderror" name="place_of_delivery"
                id="place_of_delivery">
            @error('place_of_delivery')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="letter_of_credit">Letter of Credit No.</label>
            <input type="text" value="{{ old('letter_of_credit') }}"
                class="form-control @error('letter_of_credit') is-invalid @enderror" name="letter_of_credit"
                id="letter_of_credit">
            @error('letter_of_credit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="freight">Freight </label>
            <select class="select-2 @error('freight') is-invalid @enderror" name="freight">
                <option value="PREPAID" @selected(old('freight') == 'PREPAID')>PREPAID</option>
                <option value="COLLECT" @selected(old('freight') == 'COLLECT')>COLLECT</option>
            </select>
            @error('freight')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="other_charges">Other Charges </label>
            <select class="select-2 @error('other_charges') is-invalid @enderror" name="other_charges">
                <option value="COLLECT" @selected(old('other_charges') == 'COLLECT')>COLLECT</option>
                <option value="PREPAID" @selected(old('other_charges') == 'PREPAID')>PREPAID</option>
            </select>
            @error('other_charges')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="shipmode">Ship Mode </label>
            <select class="select-2 @error('shipmode') is-invalid @enderror" name="shipmode">
                <option value=""></option>
                <option value="ROUTING ORDER" @selected(old('shipmode') == 'ROUTING ORDER')>ROUTING ORDER</option>
                <option value="FREE HANDS" @selected(old('shipmode') == 'FREE HANDS')>FREE HANDS</option>
                <option value="TRANSIT" @selected(old('shipmode') == 'TRANSIT')>TRANSIT</option>
            </select>
            @error('shipmode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="service_level">Service Level</label>
            <input type="text" value="{{ old('service_level') }}"
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="eta_sub">ETA SUB</label>
                    <input type="text" value="{{ old('eta_sub') }}" placeholder="ETA SUB" autocomplete="off"
                        class="form-control @error('eta_sub') is-invalid @enderror date-time-picker" name="eta_sub"
                        id="eta_sub">
                    @error('eta_sub')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="close_date_time">Close Date/Time</label>
                    <input type="text" value="{{ old('close_date_time') }}" placeholder="Close Date/Time"
                        autocomplete="off"
                        class="form-control @error('close_date_time') is-invalid @enderror date-time-picker"
                        name="close_date_time" id="close_date_time">
                    @error('close_date_time')
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
                    <label for="etd_date">ETD</label>
                    <input type="text" value="{{ old('etd_date') }}" placeholder="ETD" autocomplete="off"
                        class="form-control @error('etd_date') is-invalid @enderror date-picker" name="etd_date"
                        id="etd_date">
                    @error('etd_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_via_ata">Via ATA</label>
                    <input type="text" value="{{ old('first_via_ata') }}" placeholder="First Via ATA"
                        autocomplete="off"
                        class="form-control @error('first_via_ata') is-invalid @enderror date-picker"
                        name="first_via_ata" id="first_via_ata">
                    @error('first_via_ata')
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
                    <label for="first_via_eta">Via ETA</label>
                    <input type="text" value="{{ old('first_via_eta') }}" placeholder="First Via ETA"
                        autocomplete="off"
                        class="form-control @error('first_via_eta') is-invalid @enderror date-picker"
                        name="first_via_eta" id="first_via_eta">
                    @error('first_via_eta')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_via_etd">ETD</label>
                    <input type="text" value="{{ old('first_via_etd') }}" placeholder="First Via ETD"
                        autocomplete="off"
                        class="form-control @error('first_via_etd') is-invalid @enderror date-picker"
                        name="first_via_etd" id="first_via_etd">
                    @error('first_via_etd')
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
                    <label for="eta">ETA</label>
                    <input type="text" value="{{ old('eta') }}" placeholder="First Via ETA"
                        autocomplete="off" class="form-control @error('eta') is-invalid @enderror date-picker"
                        name="eta" id="eta">
                    @error('eta')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dest_eta_date">Dest ETA</label>
                    <input type="text" value="{{ old('dest_eta_date') }}" placeholder="First Via ETD"
                        autocomplete="off"
                        class="form-control @error('dest_eta_date') is-invalid @enderror date-picker"
                        name="dest_eta_date" id="dest_eta_date">
                    @error('dest_eta_date')
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
                    <label for="vessel_code">Feeder/Direct Vessel </label>
                    <select class="vessel-select @error('vessel_code') is-invalid @enderror" id="vessel-select-1"
                        name="vessel_code">
                        <option value="{{ old('vessel_code') }}">{{ old('vessel_code') }}</option>
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
                    <input type="text" readonly class="form-control vessel-name" value="{{ old('vessel_name') }}"
                        name="vessel_name" id="vessel-name-1">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="voyage_no">Feeder/Direct Voyage</label>
            <input type="text" value="{{ old('voyage_no') }}"
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
                    <input type="text" value="{{ old('mother_voyage') }}"
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
                    <input type="text" value="{{ old('mother_vessel_name') }}"
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
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="shippline_code">Shipping Line </label>
                    <select class="shipping-select @error('shippline_code') is-invalid @enderror"
                        id="shipping-select-1" name="shippline_code">
                        <option value="{{ old('shippline_code') }}">{{ old('shippline_code') }}</option>
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
                        value="{{ old('shippline_name') }}" name="shippline_name" id="shipping-name-1">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="shippline_ref_no">Shipping Line Ref No.</label>
            <input type="text" value="{{ old('shippline_ref_no') }}"
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
                        <option value="{{ old('coloader_code') }}">{{ old('coloader_code') }}</option>
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
                    <label for="coloader_name"> </label>
                    <input type="text" readonly class="form-control coloader-name"
                        value="{{ old('coloader_name') }}" name="coloader_name" id="coloader-name-1">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="coloader_ref_no">Coloader Ref No.</label>
            <input type="text" value="{{ old('coloader_ref_no') }}"
                class="form-control @error('coloader_ref_no') is-invalid @enderror" name="coloader_ref_no"
                id="coloader_ref_no">
            @error('coloader_ref_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="stuff_warehouse_code">Stuffing Warehouse </label>
                    <select class="stuff-select @error('stuff_warehouse_code') is-invalid @enderror"
                        id="stuff-select-1" name="stuff_warehouse_code">
                        <option value="{{ old('stuff_warehouse_code') }}">{{ old('stuff_warehouse_code') }}</option>
                    </select>
                    @error('stuff_warehouse_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="stuff_warehouse_name"> </label>
                    <input type="text" readonly class="form-control stuff-name"
                        value="{{ old('stuff_warehouse_name') }}" name="stuff_warehouse_name" id="stuff-name-1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="forward_agent_code">Forward Agent Code </label>
                    <select class="forward-select @error('forward_agent_code') is-invalid @enderror"
                        id="forward-select-1" name="forward_agent_code">
                        <option value="{{ old('forward_agent_code') }}">{{ old('forward_agent_code') }}</option>
                    </select>
                    @error('forward_agent_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="forward_agent_name"> </label>
                    <input type="text" readonly class="form-control forward-name"
                        value="{{ old('forward_agent_name') }}" name="forward_agent_name" id="forward-name-1">
                </div>
            </div>
        </div>

    </div>
</div>
@section('sub_script_3')
    <script>
        $(function() {
            evtPort("#portloading-select-1", "#portloading-name-1");
            evtPort("#portdischarge-select-1", "#portdischarge-name-1");
            evtPort("#viaport-select-1", "#viaport-name-1");
            evtVessel("#vessel-select-1", "#vessel-name-1");
            evtShippline("#shipping-select-1", "#shipping-name-1");
            evtBisnisParty("#coloader-select-1", "#coloader-name-1");
            evtBisnisParty("#stuff-select-1", "#stuff-name-1");
            evtBisnisParty("#forward-select-1", "#forward-name-1");

        });

        function evtBisnisParty(evt1 = null, evt2 = null) {
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
    </script>
@endsection
