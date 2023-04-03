<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="principle_agent_code">Principle Agent Code </label>
            <select class="principle-select @error('principle_agent_code') is-invalid @enderror" id="principle-select-1"
                name="principle_agent_code">
                <option value="{{ old('principle_agent_code', $sd2->principle_agent_code) }}">
                    {{ old('principle_agent_code', $sd2->principle_agent_code) }}</option>
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
                <option value="{{ old('shippagent_code', $sd2->shippagent_code) }}">
                    {{ old('shippagent_code', $sd2->shippagent_code) }}</option>
            </select>
            @error('shippagent_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stuff_agent_contact_name">Stuffing Contact Name</label>
            <input type="text" value="{{ old('stuff_agent_contact_name', $sd2->stuff_agent_contact_name) }}"
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
                <label for="stuff_agent_code">Stuffing Warehouse</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="stuffagent-select @error('stuff_agent_code') is-invalid @enderror"
                        name="stuff_agent_code">
                        <option value="{{ old('stuff_agent_code', $sd2->stuff_agent_code) }}">
                            {{ old('stuff_agent_code', $sd2->stuff_agent_code) }}</option>
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
                    <input type="text" value="{{ old('stuff_agent_name', $sd2->stuff_agent_name) }}"
                        placeholder="Warehouse Name"
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
                    <input type="text" value="{{ old('stuff_agent_address_1', $sd2->stuff_agent_address_1) }}"
                        placeholder="Warehouse Address 1"
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
                    <input type="text" value="{{ old('stuff_agent_address_2', $sd2->stuff_agent_address_2) }}"
                        placeholder="Warehouse Address 2"
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
                    <input type="text" value="{{ old('stuff_agent_address_3', $sd2->stuff_agent_address_3) }}"
                        placeholder="Warehouse Address 3"
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
                    <input type="text" value="{{ old('stuff_agent_address_4', $sd2->stuff_agent_address_4) }}"
                        placeholder="Warehouse Address 4"
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
                <label for="yard_code">Yard Code</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="yard-select @error('yard_code') is-invalid @enderror" name="yard_code">
                        <option value="{{ old('yard_code', $sd2->yard_code) }}">
                            {{ old('yard_code', $sd2->yard_code) }}
                        </option>
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
                    <input type="text" value="{{ old('yard_name', $sd2->yard_name) }}" placeholder="Yard Name"
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
                    <input type="text" value="{{ old('yard_address_1', $sd2->yard_address_1) }}"
                        placeholder="Yard Address 1"
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
                    <input type="text" value="{{ old('yard_address_2', $sd2->yard_address_2) }}"
                        placeholder="Yard Address 2"
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
                    <input type="text" value="{{ old('yard_address_3', $sd2->yard_address_3) }}"
                        placeholder="Yard Address 3"
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
                    <input type="text" value="{{ old('yard_address_4', $sd2->yard_address_4) }}"
                        placeholder="Yard Address 4"
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

    <div class="col-md-6">
        <div class="form-group">
            <label for="smk_code">SMK Code</label>
            <input type="text" value="{{ old('smk_code', $sd2->smk_code) }}"
                class="form-control @error('smk_code') is-invalid @enderror" name="smk_code" id="smk_code">
            @error('smk_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="scn_code">SCN Code</label>
            <input type="text" value="{{ old('scn_code', $sd2->scn_code) }}"
                class="form-control @error('scn_code') is-invalid @enderror" name="scn_code" id="scn_code">
            @error('scn_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="billing">Storage Billing Date</label>
            <input type="text"
                value="{{ old('billing', !empty($sd2->billing) ? date('d/m/Y', strtotime($sd2->billing)) : '') }}"
                placeholder="Storage Billing Date" autocomplete="off"
                class="form-control @error('billing') is-invalid @enderror date-picker" name="billing"
                id="billing">
            @error('billing')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="trucking">Trucking Date</label>
            <input type="text"
                value="{{ old('trucking', !empty($sd2->trucking) ? date('Y/m/d H:i', strtotime($sd2->trucking)) : '') }}"
                placeholder="Trucking Date" autocomplete="off"
                class="form-control @error('trucking') is-invalid @enderror date-time-picker" name="trucking"
                id="trucking">
            @error('trucking')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stuff">Stuffing Date</label>
            <input type="text"
                value="{{ old('stuff', !empty($sd2->stuff) ? date('Y/m/d H:i', strtotime($sd2->stuff)) : '') }}"
                placeholder="Stuffing Date" autocomplete="off"
                class="form-control @error('stuff') is-invalid @enderror date-time-picker" name="stuff"
                id="stuff">
            @error('stuff')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="depot_code">Depot Code</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="depot-select @error('depot_code') is-invalid @enderror" name="depot_code">
                        <option value="{{ old('depot_code', $sd2->depot_code) }}">
                            {{ old('depot_code', $sd2->depot_code) }}</option>
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
                    <input type="text" value="{{ old('depot_name', $sd2->depot_name) }}" placeholder="Depot Name"
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
                    <input type="text" value="{{ old('depot_address_1', $sd2->depot_address_1) }}"
                        placeholder="Depot Address 1"
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
                    <input type="text" value="{{ old('depot_address_2', $sd2->depot_address_2) }}"
                        placeholder="Depot Address 2"
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
                    <input type="text" value="{{ old('depot_address_3', $sd2->depot_address_3) }}"
                        placeholder="Depot Address 3"
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
                    <input type="text" value="{{ old('depot_address_4', $sd2->depot_address_4) }}"
                        placeholder="Depot Address 4"
                        class="form-control @error('depot_address_4') is-invalid @enderror" name="depot_address_4">
                    @error('depot_address_4')
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
            evtShippline("#principle-select-1", null);
            evtShippline("#shipagent-select-1", null);

            evtBisnisParty('.stuffagent-select', 'Search stuffing warehouse', 'input[name=stuff_agent_name]',
                'input[name=stuff_agent_address_1]', 'input[name=stuff_agent_address_2]',
                'input[name=stuff_agent_address_3]',
                'input[name=stuff_agent_address_4]');

            evtBisnisParty('.yard-select', 'Search yard', 'input[name=yard_name]',
                'input[name=yard_address_1]', 'input[name=yard_address_2]',
                'input[name=yard_address_3]',
                'input[name=yard_address_4]');

            evtBisnisParty('.depot-select', 'Search depot', 'input[name=depot_name]',
                'input[name=depot_address_1]', 'input[name=depot_address_2]',
                'input[name=depot_address_3]',
                'input[name=depot_address_4]');
        });
    </script>
@endsection
