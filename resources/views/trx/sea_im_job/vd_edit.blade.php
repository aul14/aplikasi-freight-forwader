<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="principle_agent_code">Principle Agent Code </label>
            <select class="principle-select @error('principle_agent_code') is-invalid @enderror" id="principle-select-1"
                name="principle_agent_code">
                <option value="{{ old('principle_agent_code', $sd3->principle_agent_code) }}">
                    {{ old('principle_agent_code', $sd3->principle_agent_code) }}</option>
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
                <option value="{{ old('shippagent_code', $sd3->shippagent_code) }}">
                    {{ old('shippagent_code', $sd3->shippagent_code) }}</option>
            </select>
            @error('shippagent_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="unstuff">Unstuffing Date</label>
                    <input type="text"
                        value="{{ old('unstuff', !empty($sd3->unstuff) ? date('d/m/Y', strtotime($sd3->unstuff)) : '') }}"
                        placeholder="Unstuffing Date" autocomplete="off"
                        class="form-control @error('unstuff') is-invalid @enderror date-picker" name="unstuff"
                        id="unstuff">
                    @error('unstuff')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="billing">Storage Billing Date</label>
                    <input type="text"
                        value="{{ old('billing', !empty($sd3->billing) ? date('d/m/Y', strtotime($sd3->billing)) : '') }}"
                        placeholder="Storage Billing Date" autocomplete="off"
                        class="form-control @error('billing') is-invalid @enderror date-picker" name="billing"
                        id="billing">
                    @error('billing')
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
                    <label for="truck_in">Truck In</label>
                    <input type="text"
                        value="{{ old('truck_in', !empty($sd3->truck_in) ? date('Y/m/d H:i', strtotime($sd3->truck_in)) : '') }}"
                        placeholder="Truck In Date" autocomplete="off"
                        class="form-control @error('truck_in') is-invalid @enderror date-time-picker" name="truck_in"
                        id="truck_in">
                    @error('truck_in')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="truck_out">Truck Out</label>
                    <input type="text"
                        value="{{ old('truck_out', !empty($sd3->truck_out) ? date('Y/m/d H:i', strtotime($sd3->truck_out)) : '') }}"
                        placeholder="Truck Out Date" autocomplete="off"
                        class="form-control @error('truck_out') is-invalid @enderror date-time-picker" name="truck_out"
                        id="truck_out">
                    @error('truck_out')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="cfs_warehouse_contact">CFS Warehouse Contact</label>
            <input type="text" value="{{ old('cfs_warehouse_contact', $sd3->cfs_warehouse_contact) }}"
                class="form-control @error('cfs_warehouse_contact') is-invalid @enderror" name="cfs_warehouse_contact"
                id="cfs_warehouse_contact">
            @error('cfs_warehouse_contact')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="cfs_warehouse_code">CFS Warehouse Code</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <select class="cfswarehouse-select @error('cfs_warehouse_code') is-invalid @enderror"
                        name="cfs_warehouse_code">
                        <option value="{{ old('cfs_warehouse_code', $sd3->cfs_warehouse_code) }}">
                            {{ old('cfs_warehouse_code', $sd3->cfs_warehouse_code) }}</option>
                    </select>

                    @error('cfs_warehouse_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="cfs_warehouse_name">CFS Warehouse Name</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('cfs_warehouse_name', $sd3->cfs_warehouse_name) }}"
                        placeholder="CFS Warehouse Name"
                        class="form-control @error('cfs_warehouse_name') is-invalid @enderror"
                        name="cfs_warehouse_name">
                    @error('cfs_warehouse_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <label for="cfs_warehouse_address_1">CFS Warehouse
                    Address</label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('cfs_warehouse_address_1', $sd3->cfs_warehouse_address_1) }}"
                        placeholder="CFS Warehouse Address 1"
                        class="form-control @error('cfs_warehouse_address_1') is-invalid @enderror"
                        name="cfs_warehouse_address_1">
                    @error('cfs_warehouse_address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="cfs_warehouse_address_2"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('cfs_warehouse_address_2', $sd3->cfs_warehouse_address_2) }}"
                        placeholder="CFS Warehouse Address 2"
                        class="form-control @error('cfs_warehouse_address_2') is-invalid @enderror"
                        name="cfs_warehouse_address_2">
                    @error('cfs_warehouse_address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="cfs_warehouse_address_3"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('cfs_warehouse_address_3', $sd3->cfs_warehouse_address_3) }}"
                        placeholder="CFS Warehouse Address 3"
                        class="form-control @error('cfs_warehouse_address_3') is-invalid @enderror"
                        name="cfs_warehouse_address_3">
                    @error('cfs_warehouse_address_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <label for="cfs_warehouse_address_4"></label>
            </div>
            <div class="col-md-8 mt-2">
                <div class="form-group">
                    <input type="text" value="{{ old('cfs_warehouse_address_4', $sd3->cfs_warehouse_address_4) }}"
                        placeholder="CFS Warehouse Address 4"
                        class="form-control @error('cfs_warehouse_address_4') is-invalid @enderror"
                        name="cfs_warehouse_address_4">
                    @error('cfs_warehouse_address_4')
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
                        <option value="{{ old('yard_code', $sd3->yard_code) }}">
                            {{ old('yard_code', $sd3->yard_code) }}</option>
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
                    <input type="text" value="{{ old('yard_name', $sd3->yard_name) }}" placeholder="Yard Name"
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
                    <input type="text" value="{{ old('yard_address_1', $sd3->yard_address_1) }}"
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
                    <input type="text" value="{{ old('yard_address_2', $sd3->yard_address_2) }}"
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
                    <input type="text" value="{{ old('yard_address_3', $sd3->yard_address_3) }}"
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
                    <input type="text" value="{{ old('yard_address_4', $sd3->yard_address_4) }}"
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
            <input type="text" value="{{ old('smk_code', $sd3->smk_code) }}"
                class="form-control @error('smk_code') is-invalid @enderror" name="smk_code" id="smk_code">
            @error('smk_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="scn_code">SCN Code</label>
            <input type="text" value="{{ old('scn_code', $sd3->scn_code) }}"
                class="form-control @error('scn_code') is-invalid @enderror" name="scn_code" id="scn_code">
            @error('scn_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="empty_container">Empty Container</label>
            <input type="text"
                value="{{ old('empty_container', !empty($sd3->empty_container) ? date('Y/m/d H:i', strtotime($sd3->empty_container)) : '') }}"
                placeholder="Empty Container Date" autocomplete="off"
                class="form-control @error('empty_container') is-invalid @enderror date-time-picker"
                name="empty_container" id="empty_container">
            @error('empty_container')
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
                        <option value="{{ old('depot_code', $sd3->depot_code) }}">
                            {{ old('depot_code', $sd3->depot_code) }}</option>
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
                    <input type="text" value="{{ old('depot_name', $sd3->depot_name) }}" placeholder="Depot Name"
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
                    <input type="text" value="{{ old('depot_address_1', $sd3->depot_address_1) }}"
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
                    <input type="text" value="{{ old('depot_address_2', $sd3->depot_address_2) }}"
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
                    <input type="text" value="{{ old('depot_address_3', $sd3->depot_address_3) }}"
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
                    <input type="text" value="{{ old('depot_address_4', $sd3->depot_address_4) }}"
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="depot_instruction_1">Depot Instruction 1</label>
                    <input type="text" value="{{ old('depot_instruction_1', $sd3->depot_instruction_1) }}"
                        placeholder="Depot Instruction 1"
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
                    <label for="depot_instruction_2">Depot Instruction 2</label>
                    <input type="text" value="{{ old('depot_instruction_2', $sd3->depot_instruction_2) }}"
                        placeholder="Depot Instruction 2"
                        class="form-control @error('depot_instruction_2') is-invalid @enderror"
                        name="depot_instruction_2" id="depot_instruction_2">
                    @error('depot_instruction_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="depot_instruction_3">Depot Instruction 3</label>
                    <input type="text" value="{{ old('depot_instruction_3', $sd3->depot_instruction_3) }}"
                        placeholder="Depot Instruction 3"
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
                    <label for="depot_instruction_4">Depot Instruction 4</label>
                    <input type="text" value="{{ old('depot_instruction_4', $sd3->depot_instruction_4) }}"
                        placeholder="Depot Instruction 4"
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
                    <label for="instruction_1">Instruction 1</label>
                    <input type="text" value="{{ old('instruction_1', $sd3->instruction_1) }}"
                        placeholder="Instruction 1" class="form-control @error('instruction_1') is-invalid @enderror"
                        name="instruction_1" id="instruction_1">
                    @error('instruction_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="instruction_2">Instruction 2</label>
                    <input type="text" value="{{ old('instruction_2', $sd3->instruction_2) }}"
                        placeholder="Instruction 2" class="form-control @error('instruction_2') is-invalid @enderror"
                        name="instruction_2" id="instruction_2">
                    @error('instruction_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="instruction_3">Instruction 3</label>
                    <input type="text" value="{{ old('instruction_3', $sd3->instruction_3) }}"
                        placeholder="Instruction 3" class="form-control @error('instruction_3') is-invalid @enderror"
                        name="instruction_3" id="instruction_3">
                    @error('instruction_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="instruction_4">Instruction 4</label>
                    <input type="text" value="{{ old('instruction_4', $sd3->instruction_4) }}"
                        placeholder="Instruction 4" class="form-control @error('instruction_4') is-invalid @enderror"
                        name="instruction_4" id="instruction_4">
                    @error('instruction_4')
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

            evtBisnisParty('.cfswarehouse-select', 'Search cfs warehouse', 'input[name=cfs_warehouse_name]',
                'input[name=cfs_warehouse_address_1]', 'input[name=cfs_warehouse_address_2]',
                'input[name=cfs_warehouse_address_3]',
                'input[name=cfs_warehouse_address_4]');

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
