<div class="row">
    <div class="col-md-12">
        <div class="row align-items-center">
            <div class="col-md-5">
                <label for="shipper_code">Shipper
                    Code</label>
            </div>
            <div class="col-md-7 mt-2">
                <div class="form-group">
                    <select class="shipper-select @error('shipper_code') is-invalid @enderror" name="shipper_code">
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
                    <input type="text" value="{{ old('shipper_address_1') }}"
                        class="form-control @error('shipper_address_1') is-invalid @enderror" name="shipper_address_1">
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
                        class="form-control @error('shipper_address_2') is-invalid @enderror" name="shipper_address_2">
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
                        class="form-control @error('shipper_address_3') is-invalid @enderror" name="shipper_address_3">
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
                        class="form-control @error('shipper_address_4') is-invalid @enderror" name="shipper_address_4">
                    @error('shipper_address_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
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
                    <input type="text" value="{{ old('consignee_name') }}"
                        class="form-control @error('consignee_name') is-invalid @enderror" name="consignee_name">
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
                    <input type="text" value="{{ old('consignee_address_1') }}"
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
    <div class="col-md-12">
        <div class="row align-items-center">
            <div class="col-md-5">
                <label for="agent_code">Agent
                    Code</label>
            </div>
            <div class="col-md-7 mt-2">
                <div class="form-group">
                    <select class="agent-select @error('agent_code') is-invalid @enderror" name="agent_code">
                        <option value="{{ old('agent_code') }}">{{ old('agent_code') }}</option>
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
                    <input type="text" value="{{ old('agent_name') }}"
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
                    <input type="text" value="{{ old('agent_address_1') }}"
                        class="form-control @error('agent_address_1') is-invalid @enderror" name="agent_address_1">
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
                    <input type="text" value="{{ old('agent_address_2') }}"
                        class="form-control @error('agent_address_2') is-invalid @enderror" name="agent_address_2">
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
                    <input type="text" value="{{ old('agent_address_3') }}"
                        class="form-control @error('agent_address_3') is-invalid @enderror" name="agent_address_3">
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
                    <input type="text" value="{{ old('agent_address_4') }}"
                        class="form-control @error('agent_address_4') is-invalid @enderror" name="agent_address_4">
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

@section('sub_script_2')
    <script>
        $(function() {
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
        });
    </script>
@endsection
