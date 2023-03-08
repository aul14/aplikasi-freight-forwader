<div class="row">
    <div class="col-md-6">
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="fumigation_code">Fumigation Code</label>
            </div>
            <div class="col-md-5 mt-2">
                <div class="form-group">
                    <select class="fumigationcomp-select @error('fumigation_code') is-invalid @enderror"
                        name="fumigation_code">
                        <option value="{{ old('fumigation_code') }}">{{ old('fumigation_code') }}</option>
                    </select>

                    @error('fumigation_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)" class="btn btn-primary my-2 btn-shipper-3">Same As Shipper</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="fumigation_name">Fumigation Name</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('fumigation_name') }}" placeholder="Fumigation Name"
                        class="form-control @error('fumigation_name') is-invalid @enderror" name="fumigation_name">
                    @error('fumigation_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="fumigation_address_1">Fumigation Address</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('fumigation_address_1') }}" placeholder="Fumigation Address 1"
                        class="form-control @error('fumigation_address_1') is-invalid @enderror"
                        name="fumigation_address_1">
                    @error('fumigation_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="fumigation_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('fumigation_address_2') }}" placeholder="Fumigation Address 2"
                        class="form-control @error('fumigation_address_2') is-invalid @enderror"
                        name="fumigation_address_2">
                    @error('fumigation_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="fumigation_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('fumigation_address_3') }}" placeholder="Fumigation Address 3"
                        class="form-control @error('fumigation_address_3') is-invalid @enderror"
                        name="fumigation_address_3">
                    @error('fumigation_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="fumigation_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('fumigation_address_4') }}" placeholder="Fumigation Address 4"
                        class="form-control @error('fumigation_address_4') is-invalid @enderror"
                        name="fumigation_address_4">
                    @error('fumigation_address_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="fumigation_contact_name">Fumigation Contact Name</label>
            <input type="text" value="{{ old('fumigation_contact_name') }}"
                class="form-control @error('fumigation_contact_name') is-invalid @enderror"
                name="fumigation_contact_name" id="fumigation_contact_name">
            @error('fumigation_contact_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fumigation_instruction_1">Fumigation Instruction</label>
                    <input type="text" value="{{ old('fumigation_instruction_1') }}"
                        placeholder="Fumigation Instruction 1"
                        class="form-control @error('fumigation_instruction_1') is-invalid @enderror"
                        name="fumigation_instruction_1" id="fumigation_instruction_1">
                    @error('fumigation_instruction_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fumigation_instruction_2">&nbsp;</label>
                    <input type="text" value="{{ old('fumigation_instruction_2') }}"
                        placeholder="Fumigation Instruction 2"
                        class="form-control @error('fumigation_instruction_2') is-invalid @enderror"
                        name="fumigation_instruction_2" id="fumigation_instruction_2">
                    @error('fumigation_instruction_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fumigation_instruction_3">&nbsp;</label>
                    <input type="text" value="{{ old('fumigation_instruction_3') }}"
                        placeholder="Fumigation Instruction 3"
                        class="form-control @error('fumigation_instruction_3') is-invalid @enderror"
                        name="fumigation_instruction_3" id="fumigation_instruction_3">
                    @error('fumigation_instruction_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fumigation_instruction_4">&nbsp;</label>
                    <input type="text" value="{{ old('fumigation_instruction_4') }}"
                        placeholder="Fumigation Instruction 4"
                        class="form-control @error('fumigation_instruction_4') is-invalid @enderror"
                        name="fumigation_instruction_4" id="fumigation_instruction_4">
                    @error('fumigation_instruction_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fumigation_instruction_5">&nbsp;</label>
                    <input type="text" value="{{ old('fumigation_instruction_5') }}"
                        placeholder="Fumigation Instruction 5"
                        class="form-control @error('fumigation_instruction_5') is-invalid @enderror"
                        name="fumigation_instruction_5" id="fumigation_instruction_5">
                    @error('fumigation_instruction_5')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fumigation_instruction_6">&nbsp;</label>
                    <input type="text" value="{{ old('fumigation_instruction_6') }}"
                        placeholder="Fumigation Instruction 6"
                        class="form-control @error('fumigation_instruction_6') is-invalid @enderror"
                        name="fumigation_instruction_6" id="fumigation_instruction_6">
                    @error('fumigation_instruction_6')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fumigation_instruction_7">&nbsp;</label>
                    <input type="text" value="{{ old('fumigation_instruction_7') }}"
                        placeholder="Fumigation Instruction 7"
                        class="form-control @error('fumigation_instruction_7') is-invalid @enderror"
                        name="fumigation_instruction_7" id="fumigation_instruction_7">
                    @error('fumigation_instruction_7')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fumigation_instruction_8">&nbsp;</label>
                    <input type="text" value="{{ old('fumigation_instruction_8') }}"
                        placeholder="Fumigation Instruction 8"
                        class="form-control @error('fumigation_instruction_8') is-invalid @enderror"
                        name="fumigation_instruction_8" id="fumigation_instruction_8">
                    @error('fumigation_instruction_8')
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
                    <label for="stumping_date_time">Stamping Date Time</label>
                    <input type="text" value="{{ old('stumping_date_time') }}" placeholder="Stamping Date Time"
                        autocomplete="off"
                        class="form-control @error('stumping_date_time') is-invalid @enderror date-time-picker"
                        name="stumping_date_time" id="stumping_date_time">
                    @error('stumping_date_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fumigation_date_time">Fumigation Date Time</label>
                    <input type="text" value="{{ old('fumigation_date_time') }}"
                        placeholder="Fumigation Date Time" autocomplete="off"
                        class="form-control @error('fumigation_date_time') is-invalid @enderror date-time-picker"
                        name="fumigation_date_time" id="fumigation_date_time">
                    @error('fumigation_date_time')
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
                    <label for="ventilation_date_time">Ventilation Date Time</label>
                    <input type="text" value="{{ old('ventilation_date_time') }}"
                        placeholder="Ventilation Date Time" autocomplete="off"
                        class="form-control @error('ventilation_date_time') is-invalid @enderror date-time-picker"
                        name="ventilation_date_time" id="ventilation_date_time">
                    @error('ventilation_date_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ava_date_time">AVA Date Time</label>
                    <input type="text" value="{{ old('ava_date_time') }}" placeholder="Fumigation Date Time"
                        autocomplete="off"
                        class="form-control @error('ava_date_time') is-invalid @enderror date-time-picker"
                        name="ava_date_time" id="ava_date_time">
                    @error('ava_date_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>
</div>
@section('sub_script_6')
    <script>
        $(function() {
            $(".btn-shipper-3").click(function(e) {
                e.preventDefault();
                let valShippCode = $(shipper_code_val).val();
                if (valShippCode != '' || valShippCode != null) {
                    var newShippClick = new Option(valShippCode, valShippCode, true, true);
                    $("select[name=fumigation_code]").append(newShippClick).trigger(
                        'change');
                    $("input[name=fumigation_name]").val($(shipper_name_val).val());
                    $("input[name=fumigation_address_1]").val($(shipper_address_1_val).val());
                    $("input[name=fumigation_address_2]").val($(shipper_address_2_val).val());
                    $("input[name=fumigation_address_3]").val($(shipper_address_3_val).val());
                    $("input[name=fumigation_address_4]").val($(shipper_address_4_val).val());
                } else {
                    $("select[name=fumigation_code]").empty();
                    $("input[name=fumigation_name]").val('');
                    $("input[name=fumigation_address_1]").val('');
                    $("input[name=fumigation_address_2]").val('');
                    $("input[name=fumigation_address_3]").val('');
                    $("input[name=fumigation_address_4]").val('');
                }

            });

            $('.fumigationcomp-select').select2({
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

            $('.fumigationcomp-select').change(function(e) {
                e.preventDefault();
                let name = $(this).select2('data')[0].custom_attribute;
                let address_1 = $(this).select2('data')[0].address_1;
                let address_2 = $(this).select2('data')[0].address_2;
                let address_3 = $(this).select2('data')[0].address_3;
                let address_4 = $(this).select2('data')[0].address_4;

                $("input[name=fumigation_name]").val(name);
                $("input[name=fumigation_address_1]").val(address_1);
                $("input[name=fumigation_address_2]").val(address_2);
                $("input[name=fumigation_address_3]").val(address_3);
                $("input[name=fumigation_address_4]").val(address_4);
            });
        });
    </script>
@endsection
