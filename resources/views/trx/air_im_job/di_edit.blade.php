<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="delivery_type_code">Delivery Type </label>
                    <select class="deltype-select @error('delivery_type_code') is-invalid @enderror"
                        name="delivery_type_code">
                        <option value="{{ old('delivery_type_code', $ad2->delivery_type_code) }}">
                            {{ old('delivery_type_code', $ad2->delivery_type_code) }}</option>
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
                        name="delivery_type" value="{{ old('delivery_type', $ad2->delivery_type) }}" id="delivery_type">
                    @error('delivery_type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="trans_company_code">Transport Company Code</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="transport-select @error('trans_company_code') is-invalid @enderror"
                        name="trans_company_code">
                        <option value="{{ old('trans_company_code', $ad2->trans_company_code) }}">
                            {{ old('trans_company_code', $ad2->trans_company_code) }}</option>
                    </select>

                    @error('trans_company_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="trans_company_name">Transport Company Name</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('trans_company_name', $ad2->trans_company_name) }}"
                        placeholder="Transport Company Name"
                        class="form-control @error('trans_company_name') is-invalid @enderror"
                        name="trans_company_name">
                    @error('trans_company_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="trans_company_address_1">Transport Company Address</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('trans_company_address_1', $ad2->trans_company_address_1) }}"
                        placeholder="Transport Company Address 1"
                        class="form-control @error('trans_company_address_1') is-invalid @enderror"
                        name="trans_company_address_1">
                    @error('trans_company_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="trans_company_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('trans_company_address_2', $ad2->trans_company_address_2) }}"
                        placeholder="Transport Company Address 2"
                        class="form-control @error('trans_company_address_2') is-invalid @enderror"
                        name="trans_company_address_2">
                    @error('trans_company_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="trans_company_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('trans_company_address_3', $ad2->trans_company_address_3) }}"
                        placeholder="Transport Company Address 3"
                        class="form-control @error('trans_company_address_3') is-invalid @enderror"
                        name="trans_company_address_3">
                    @error('trans_company_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="trans_company_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('trans_company_address_4', $ad2->trans_company_address_4) }}"
                        placeholder="Transport Company Address 4"
                        class="form-control @error('trans_company_address_4') is-invalid @enderror"
                        name="trans_company_address_4">
                    @error('trans_company_address_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="pickup">Pickup Date/Time</label>
            <input type="text"
                value="{{ old('pickup', !empty($ad2->pickup) ? date('Y/m/d H:i', strtotime($ad2->pickup)) : '') }}"
                autocomplete="off" placeholder="Pickup Date/Time"
                class="form-control @error('pickup') is-invalid @enderror date-time-picker" name="pickup"
                id="pickup">
            @error('pickup')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="collect_code">Collection From Code</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="collect-select @error('collect_code') is-invalid @enderror" name="collect_code">
                        <option value="{{ old('collect_code', $ad2->collect_code) }}">
                            {{ old('collect_code', $ad2->collect_code) }}</option>
                    </select>

                    @error('collect_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="collect_name">Collection From Name</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('collect_name', $ad2->collect_name) }}"
                        placeholder="Collection Name"
                        class="form-control @error('collect_name') is-invalid @enderror" name="collect_name">
                    @error('collect_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="collect_address_1">Collection Address</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('collect_address_1', $ad2->collect_address_1) }}"
                        placeholder="Collection Address 1"
                        class="form-control @error('collect_address_1') is-invalid @enderror"
                        name="collect_address_1">
                    @error('collect_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="collect_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('collect_address_2', $ad2->collect_address_2) }}"
                        placeholder="Collection Address 2"
                        class="form-control @error('collect_address_2') is-invalid @enderror"
                        name="collect_address_2">
                    @error('collect_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="collect_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('collect_address_3', $ad2->collect_address_3) }}"
                        placeholder="Collection Address 3"
                        class="form-control @error('collect_address_3') is-invalid @enderror"
                        name="collect_address_3">
                    @error('collect_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="collect_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('collect_address_4', $ad2->collect_address_4) }}"
                        placeholder="Collection Address 4"
                        class="form-control @error('collect_address_4') is-invalid @enderror"
                        name="collect_address_4">
                    @error('collect_address_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="delivery">Delivery Date/Time</label>
            <input type="text"
                value="{{ old('delivery', !empty($ad2->delivery) ? date('Y/m/d H:i', strtotime($ad2->delivery)) : '') }}"
                autocomplete="off" placeholder="Delivery Date/Time"
                class="form-control @error('delivery') is-invalid @enderror date-time-picker" name="delivery"
                id="delivery">
            @error('delivery')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="delivery_to_code">Delivery To Code</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="deliveryto-select @error('delivery_to_code') is-invalid @enderror"
                        name="delivery_to_code">
                        <option value="{{ old('delivery_to_code', $ad2->delivery_to_code) }}">
                            {{ old('delivery_to_code', $ad2->delivery_to_code) }}</option>
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
            <div class="col-md-4">
                <label for="delivery_to_name">Delivery To Name</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('delivery_to_name', $ad2->delivery_to_name) }}"
                        placeholder="Delivery To Name"
                        class="form-control @error('delivery_to_name') is-invalid @enderror" name="delivery_to_name">
                    @error('delivery_to_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="delivery_to_address_1">Delivery Address</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('delivery_to_address_1', $ad2->delivery_to_address_1) }}"
                        placeholder="Delivery Address 1"
                        class="form-control @error('delivery_to_address_1') is-invalid @enderror"
                        name="delivery_to_address_1">
                    @error('delivery_to_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="delivery_to_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('delivery_to_address_2', $ad2->delivery_to_address_2) }}"
                        placeholder="Delivery Address 2"
                        class="form-control @error('delivery_to_address_2') is-invalid @enderror"
                        name="delivery_to_address_2">
                    @error('delivery_to_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="delivery_to_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('delivery_to_address_3', $ad2->delivery_to_address_3) }}"
                        placeholder="Delivery Address 3"
                        class="form-control @error('delivery_to_address_3') is-invalid @enderror"
                        name="delivery_to_address_3">
                    @error('delivery_to_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="delivery_to_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('delivery_to_address_4', $ad2->delivery_to_address_4) }}"
                        placeholder="Delivery Address 4"
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_ins_1">Delivery Instruction</label>
                    <input type="text" value="{{ old('delivery_ins_1', $ad2->delivery_ins_1) }}"
                        placeholder="Delivery Instruction 1"
                        class="form-control @error('delivery_ins_1') is-invalid @enderror" name="delivery_ins_1"
                        id="delivery_ins_1">
                    @error('delivery_ins_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_ins_2">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_ins_2', $ad2->delivery_ins_2) }}"
                        placeholder="Delivery Instruction 2"
                        class="form-control @error('delivery_ins_2') is-invalid @enderror" name="delivery_ins_2"
                        id="delivery_ins_2">
                    @error('delivery_ins_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_ins_3">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_ins_3', $ad2->delivery_ins_3) }}"
                        placeholder="Delivery Instruction 3"
                        class="form-control @error('delivery_ins_3') is-invalid @enderror" name="delivery_ins_3"
                        id="delivery_ins_3">
                    @error('delivery_ins_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_ins_4">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_ins_4', $ad2->delivery_ins_4) }}"
                        placeholder="Delivery Instruction 4"
                        class="form-control @error('delivery_ins_4') is-invalid @enderror" name="delivery_ins_4"
                        id="delivery_ins_4">
                    @error('delivery_ins_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_ins_5">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_ins_5', $ad2->delivery_ins_5) }}"
                        placeholder="Delivery Instruction 5"
                        class="form-control @error('delivery_ins_5') is-invalid @enderror" name="delivery_ins_5"
                        id="delivery_ins_5">
                    @error('delivery_ins_5')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="delivery_ins_6">&nbsp;</label>
                    <input type="text" value="{{ old('delivery_ins_6', $ad2->delivery_ins_6) }}"
                        placeholder="Delivery Instruction 6"
                        class="form-control @error('delivery_ins_6') is-invalid @enderror" name="delivery_ins_6"
                        id="delivery_ins_6">
                    @error('delivery_ins_6')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>
</div>
@section('sub_script_3')
    <script>
        $(function() {
            $('.transport-select').select2({
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

            $('.transport-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=trans_company_name]").val(name);
                $("input[name=trans_company_address_1]").val(address_1);
                $("input[name=trans_company_address_2]").val(address_2);
                $("input[name=trans_company_address_3]").val(address_3);
                $("input[name=trans_company_address_4]").val(address_4);
            });

            $('.collect-select').select2({
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

            $('.collect-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=collect_name]").val(name);
                $("input[name=collect_address_1]").val(address_1);
                $("input[name=collect_address_2]").val(address_2);
                $("input[name=collect_address_3]").val(address_3);
                $("input[name=collect_address_4]").val(address_4);
            });

            $('.deliveryto-select').select2({
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

            $('.deliveryto-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=delivery_to_name]").val(name);
                $("input[name=delivery_to_address_1]").val(address_1);
                $("input[name=delivery_to_address_2]").val(address_2);
                $("input[name=delivery_to_address_3]").val(address_3);
                $("input[name=delivery_to_address_4]").val(address_4);
            });
        });
    </script>
@endsection
