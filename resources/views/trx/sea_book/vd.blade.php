<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="principle_agent_code">Principle Agent Code </label>
            <select class="principle-select @error('principle_agent_code') is-invalid @enderror" id="principle-select-1"
                name="principle_agent_code">
                <option value="{{ old('principle_agent_code') }}">{{ old('principle_agent_code') }}</option>
            </select>
            @error('principle_agent_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="shippagent_code">Shipping Agent </label>
            <select class="shipagent-select @error('shippagent_code') is-invalid @enderror" id="shipagent-select-1"
                name="shippagent_code">
                <option value="{{ old('shippagent_code') }}">{{ old('shippagent_code') }}</option>
            </select>
            @error('shippagent_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="stuff_agent_code">Stuffing Warehouse</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="stuffagent-select @error('stuff_agent_code') is-invalid @enderror"
                        name="stuff_agent_code">
                        <option value="{{ old('stuff_agent_code') }}">{{ old('stuff_agent_code') }}</option>
                    </select>

                    @error('stuff_agent_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="stuff_agent_name">Warehouse Name</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('stuff_agent_name') }}" placeholder="Warehouse Name"
                        class="form-control @error('stuff_agent_name') is-invalid @enderror" name="stuff_agent_name">
                    @error('stuff_agent_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="stuff_agent_address_1">Warehouse
                    Address</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('stuff_agent_address_1') }}" placeholder="Warehouse Address 1"
                        class="form-control @error('stuff_agent_address_1') is-invalid @enderror"
                        name="stuff_agent_address_1">
                    @error('stuff_agent_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="stuff_agent_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('stuff_agent_address_2') }}" placeholder="Warehouse Address 2"
                        class="form-control @error('stuff_agent_address_2') is-invalid @enderror"
                        name="stuff_agent_address_2">
                    @error('stuff_agent_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="stuff_agent_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('stuff_agent_address_3') }}" placeholder="Warehouse Address 3"
                        class="form-control @error('stuff_agent_address_3') is-invalid @enderror"
                        name="stuff_agent_address_3">
                    @error('stuff_agent_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="stuff_agent_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('stuff_agent_address_4') }}" placeholder="Warehouse Address 4"
                        class="form-control @error('stuff_agent_address_4') is-invalid @enderror"
                        name="stuff_agent_address_4">
                    @error('stuff_agent_address_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="depot_code">Depot Code</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="depot-select @error('depot_code') is-invalid @enderror" name="depot_code">
                        <option value="{{ old('depot_code') }}">{{ old('depot_code') }}</option>
                    </select>

                    @error('depot_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="depot_name">Depot Name</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('depot_name') }}" placeholder="Depot Name"
                        class="form-control @error('depot_name') is-invalid @enderror" name="depot_name">
                    @error('depot_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="depot_address_1">Depot Address</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('depot_address_1') }}" placeholder="Depot Address 1"
                        class="form-control @error('depot_address_1') is-invalid @enderror" name="depot_address_1">
                    @error('depot_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="depot_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('depot_address_2') }}" placeholder="Depot Address 2"
                        class="form-control @error('depot_address_2') is-invalid @enderror" name="depot_address_2">
                    @error('depot_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="depot_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('depot_address_3') }}" placeholder="Depot Address 3"
                        class="form-control @error('depot_address_3') is-invalid @enderror" name="depot_address_3">
                    @error('depot_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="depot_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('depot_address_4') }}" placeholder="Depot Address 4"
                        class="form-control @error('depot_address_4') is-invalid @enderror" name="depot_address_4">
                    @error('depot_address_4')
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
                    <label for="depot_instruction_1">Depot Instruction</label>
                    <input type="text" value="{{ old('depot_instruction_1') }}" placeholder="Depot Instruction 1"
                        class="form-control @error('depot_instruction_1') is-invalid @enderror"
                        name="depot_instruction_1" id="depot_instruction_1">
                    @error('depot_instruction_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="depot_instruction_2">&nbsp;</label>
                    <input type="text" value="{{ old('depot_instruction_2') }}" placeholder="Depot Instruction 2"
                        class="form-control @error('depot_instruction_2') is-invalid @enderror"
                        name="depot_instruction_2" id="depot_instruction_2">
                    @error('depot_instruction_2')
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
                    <label for="depot_instruction_3">&nbsp;</label>
                    <input type="text" value="{{ old('depot_instruction_3') }}" placeholder="Depot Instruction 3"
                        class="form-control @error('depot_instruction_3') is-invalid @enderror"
                        name="depot_instruction_3" id="depot_instruction_3">
                    @error('depot_instruction_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="depot_instruction_4">&nbsp;</label>
                    <input type="text" value="{{ old('depot_instruction_4') }}" placeholder="Depot Instruction 4"
                        class="form-control @error('depot_instruction_4') is-invalid @enderror"
                        name="depot_instruction_4" id="depot_instruction_4">
                    @error('depot_instruction_4')
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
                    <label for="instruction_1">Instruction</label>
                    <input type="text" value="{{ old('instruction_1') }}" placeholder=" Instruction 1"
                        class="form-control @error('instruction_1') is-invalid @enderror" name="instruction_1"
                        id="instruction_1">
                    @error('instruction_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="instruction_2">&nbsp;</label>
                    <input type="text" value="{{ old('instruction_2') }}" placeholder=" Instruction 2"
                        class="form-control @error('instruction_2') is-invalid @enderror" name="instruction_2"
                        id="instruction_2">
                    @error('instruction_2')
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
                    <label for="instruction_3">&nbsp;</label>
                    <input type="text" value="{{ old('instruction_3') }}" placeholder=" Instruction 3"
                        class="form-control @error('instruction_3') is-invalid @enderror" name="instruction_3"
                        id="instruction_3">
                    @error('instruction_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="instruction_4">&nbsp;</label>
                    <input type="text" value="{{ old('instruction_4') }}" placeholder=" Instruction 4"
                        class="form-control @error('instruction_4') is-invalid @enderror" name="instruction_4"
                        id="instruction_4">
                    @error('instruction_4')
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
            <label for="smk_code">SMK Code</label>
            <input type="text" value="{{ old('smk_code') }}"
                class="form-control @error('smk_code') is-invalid @enderror" name="smk_code" id="smk_code">
            @error('smk_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="scn_code">SCN Code</label>
            <input type="text" value="{{ old('scn_code') }}"
                class="form-control @error('scn_code') is-invalid @enderror" name="scn_code" id="scn_code">
            @error('scn_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="cargo_receipt">Cargo Receipt</label>
            <input type="text" value="{{ old('cargo_receipt') }}" placeholder="Cargo Receipt" autocomplete="off"
                class="form-control @error('cargo_receipt') is-invalid @enderror date-time-picker"
                name="cargo_receipt" id="cargo_receipt">
            @error('cargo_receipt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stuff">Stuffing Date</label>
            <input type="text" value="{{ old('stuff') }}" placeholder="Stuffing Date" autocomplete="off"
                class="form-control @error('stuff') is-invalid @enderror date-time-picker" name="stuff"
                id="stuff">
            @error('stuff')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stuff_agent_contact_name">Stuffing Contact Name</label>
            <input type="text" value="{{ old('stuff_agent_contact_name') }}"
                class="form-control @error('stuff_agent_contact_name') is-invalid @enderror"
                name="stuff_agent_contact_name" id="stuff_agent_contact_name">
            @error('stuff_agent_contact_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="yard_code">Yard Code</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="yard-select @error('yard_code') is-invalid @enderror" name="yard_code">
                        <option value="{{ old('yard_code') }}">{{ old('yard_code') }}</option>
                    </select>

                    @error('yard_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="yard_name">Yard Name</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('yard_name') }}" placeholder="Yard Name"
                        class="form-control @error('yard_name') is-invalid @enderror" name="yard_name">
                    @error('yard_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="yard_address_1">Yard Address</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('yard_address_1') }}" placeholder="Yard Address 1"
                        class="form-control @error('yard_address_1') is-invalid @enderror" name="yard_address_1">
                    @error('yard_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="yard_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('yard_address_2') }}" placeholder="Yard Address 2"
                        class="form-control @error('yard_address_2') is-invalid @enderror" name="yard_address_2">
                    @error('yard_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="yard_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('yard_address_3') }}" placeholder="Yard Address 3"
                        class="form-control @error('yard_address_3') is-invalid @enderror" name="yard_address_3">
                    @error('yard_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="yard_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('yard_address_4') }}" placeholder="Yard Address 4"
                        class="form-control @error('yard_address_4') is-invalid @enderror" name="yard_address_4">
                    @error('yard_address_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>
</div>

@section('sub_script_4')
    <script>
        $(document).ready(function() {
            evtShippline("#principle-select-1", null);
            evtShippline("#shipagent-select-1", null);

            $('.stuffagent-select').select2({
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

            $('.stuffagent-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=stuff_agent_name]").val(name);
                $("input[name=stuff_agent_address_1]").val(address_1);
                $("input[name=stuff_agent_address_2]").val(address_2);
                $("input[name=stuff_agent_address_3]").val(address_3);
                $("input[name=stuff_agent_address_4]").val(address_4);
            });

            $('.yard-select').select2({
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

            $('.yard-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=yard_name]").val(name);
                $("input[name=yard_address_1]").val(address_1);
                $("input[name=yard_address_2]").val(address_2);
                $("input[name=yard_address_3]").val(address_3);
                $("input[name=yard_address_4]").val(address_4);
            });

            $('.depot-select').select2({
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

            $('.depot-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=depot_name]").val(name);
                $("input[name=depot_address_1]").val(address_1);
                $("input[name=depot_address_2]").val(address_2);
                $("input[name=depot_address_3]").val(address_3);
                $("input[name=depot_address_4]").val(address_4);
            });
        });
    </script>
@endsection
