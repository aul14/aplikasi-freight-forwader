<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="pcs">Pcs/Rcp</label>
                    <input type="number" readonly class="form-control @error('pcs') is-invalid @enderror" name="pcs"
                        value="{{ old('pcs') }}" id="pcs">
                    @error('pcs')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="uom">UOM</label>
                    <select name="uom" id="uom-rd-1" class="uom-rd @error('uom') is-invalid @enderror">
                        <option value="{{ old('uom') }}">{{ old('uom') }}</option>
                    </select>
                    @error('uom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="gross_weight">Gross Weight</label>
                    <input type="text" data-type="currency"
                        class="form-control @error('gross_weight') is-invalid @enderror" name="gross_weight"
                        value="{{ old('gross_weight') }}" id="gross_weight">
                    @error('gross_weight')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="rate_class">Rate Class Code</label>
                    <select name="rate_class" id="rate_class-rd-1"
                        class="select-2 @error('rate_class') is-invalid @enderror">
                        <option value="Minimum Charge" @selected(old('rate_class') == 'Minimum Charge')>Minimum Charge</option>
                        <option value="Normal Rate" @selected(old('rate_class') == 'Normal Rate')>Normal Rate</option>
                        <option value="Quantity Rate" @selected(old('rate_class') == 'Quantity Rate')>Quantity Rate</option>
                        <option value="Specific Commodity Rate" @selected(old('rate_class') == 'Specific Commodity Rate')>
                            Specific Commodity Rate
                        </option>
                        <option value="Class Rate Reduction" @selected(old('rate_class') == 'Class Rate Reduction')>
                            Class Rate Reduction
                        </option>
                        <option value="Class Rate Surcharge" @selected(old('rate_class') == 'Class Rate Surcharge')>
                            Class Rate Surcharge
                        </option>
                        <option value="ULD Basic Charge" @selected(old('rate_class') == 'ULD Basic Charge')>
                            ULD Basic Charge
                        </option>
                        <option value="ULD Additioal Rate" @selected(old('rate_class') == 'ULD Additioal Rate')>
                            ULD Additioal Rate
                        </option>
                        <option value="ULD Discount" @selected(old('rate_class') == 'ULD Discount')>
                            ULD Discount
                        </option>
                        <option value="Base Charge" @selected(old('rate_class') == 'Base Charge')>
                            Base Charge
                        </option>
                        <option value="Rate Per Kilo" @selected(old('rate_class') == 'Rate Per Kilo')>
                            Rate Per Kilo
                        </option>
                    </select>
                    @error('rate_class')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="commodity_code">Commodity</label>
                    <select name="commodity_code" id="commodity_code-rd-1"
                        class="commodity_code-rd @error('commodity_code') is-invalid @enderror">
                        <option value="{{ old('commodity_code') }}">{{ old('commodity_code') }}</option>
                    </select>
                    @error('commodity_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="salesman_code">Salesman </label>
                    <select class="salesman-select @error('salesman_code') is-invalid @enderror" name="salesman_code">
                        <option value="{{ old('salesman_code') }}">{{ old('salesman_code') }}</option>
                    </select>
                    <input type="hidden" name="salesman" value="{{ old('salesman') }}">
                    @error('salesman_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="chargeable_wt">Doc Charge Weight</label>
                    <input type="text" data-type="currency" readonly
                        class="form-control @error('chargeable_wt') is-invalid @enderror" name="chargeable_wt"
                        value="{{ old('chargeable_wt') }}" id="chargeable_wt">
                    @error('chargeable_wt')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="doc_rate">Rate/Charge</label>
                    <input type="text" data-type="currency"
                        class="form-control @error('doc_rate') is-invalid @enderror" name="doc_rate"
                        value="{{ old('doc_rate') }}" id="doc_rate">
                    @error('doc_rate')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="doc_total_amt">Doc Total Amt</label>
                    <input type="text" data-type="currency"
                        class="form-control @error('doc_total_amt') is-invalid @enderror" name="doc_total_amt"
                        value="{{ old('doc_total_amt') }}" id="doc_total_amt">
                    @error('doc_total_amt')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="slac_qty">SLAC Qty</label>
                    <input type="text" data-type="currency"
                        class="form-control @error('slac_qty') is-invalid @enderror" name="slac_qty"
                        value="{{ old('slac_qty') }}" id="slac_qty">
                    @error('slac_qty')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="slac_uom">SLAC Uom</label>
                    <select name="slac_uom" id="slac_uom-rd-1"
                        class="uom-rd @error('slac_uom') is-invalid @enderror">
                        <option value="{{ old('slac_uom') }}">{{ old('slac_uom') }}</option>
                    </select>
                    @error('slac_uom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="user_charge_wt">User Charge Weight</label>
                    <input type="text" data-type="currency"
                        class="form-control @error('user_charge_wt') is-invalid @enderror" name="user_charge_wt"
                        value="{{ old('user_charge_wt') }}" id="user_charge_wt">
                    @error('user_charge_wt')
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
                    <label for="desc_1">&nbsp;</label>
                    <input type="text" placeholder="Description 01"
                        class="form-control @error('desc_1') is-invalid @enderror" name="desc_1"
                        value="{{ old('desc_1') }}" id="desc_1">
                    @error('desc_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 02"
                        class="form-control @error('desc_2') is-invalid @enderror" name="desc_2"
                        value="{{ old('desc_2') }}" id="desc_2">
                    @error('desc_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 03"
                        class="form-control @error('desc_3') is-invalid @enderror" name="desc_3"
                        value="{{ old('desc_3') }}" id="desc_3">
                    @error('desc_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 04"
                        class="form-control @error('desc_4') is-invalid @enderror" name="desc_4"
                        value="{{ old('desc_4') }}" id="desc_4">
                    @error('desc_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 05"
                        class="form-control @error('desc_5') is-invalid @enderror" name="desc_5"
                        value="{{ old('desc_5') }}" id="desc_5">
                    @error('desc_5')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 06"
                        class="form-control @error('desc_6') is-invalid @enderror" name="desc_6"
                        value="{{ old('desc_6') }}" id="desc_6">
                    @error('desc_6')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 07"
                        class="form-control @error('desc_7') is-invalid @enderror" name="desc_7"
                        value="{{ old('desc_7') }}" id="desc_7">
                    @error('desc_7')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 08"
                        class="form-control @error('desc_8') is-invalid @enderror" name="desc_8"
                        value="{{ old('desc_8') }}" id="desc_8">
                    @error('desc_8')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 09"
                        class="form-control @error('desc_9') is-invalid @enderror" name="desc_9"
                        value="{{ old('desc_9') }}" id="desc_9">
                    @error('desc_9')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 10"
                        class="form-control @error('desc_10') is-invalid @enderror" name="desc_10"
                        value="{{ old('desc_10') }}" id="desc_10">
                    @error('desc_10')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 11"
                        class="form-control @error('desc_11') is-invalid @enderror" name="desc_11"
                        value="{{ old('desc_11') }}" id="desc_11">
                    @error('desc_11')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Description 12"
                        class="form-control @error('desc_12') is-invalid @enderror" name="desc_12"
                        value="{{ old('desc_12') }}" id="desc_12">
                    @error('desc_12')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="commodity_desc_1">Nature & Quantity of Goods</label>
                    <input type="text" placeholder="Commodity Description 01"
                        class="form-control @error('commodity_desc_1') is-invalid @enderror" name="commodity_desc_1"
                        value="{{ old('commodity_desc_1') }}" id="commodity_desc_1">
                    @error('commodity_desc_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 02"
                        class="form-control @error('commodity_desc_2') is-invalid @enderror" name="commodity_desc_2"
                        value="{{ old('commodity_desc_2') }}" id="commodity_desc_2">
                    @error('commodity_desc_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 03"
                        class="form-control @error('commodity_desc_3') is-invalid @enderror" name="commodity_desc_3"
                        value="{{ old('commodity_desc_3') }}" id="commodity_desc_3">
                    @error('commodity_desc_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 04"
                        class="form-control @error('commodity_desc_4') is-invalid @enderror" name="commodity_desc_4"
                        value="{{ old('commodity_desc_4') }}" id="commodity_desc_4">
                    @error('commodity_desc_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 05"
                        class="form-control @error('commodity_desc_5') is-invalid @enderror" name="commodity_desc_5"
                        value="{{ old('commodity_desc_5') }}" id="commodity_desc_5">
                    @error('commodity_desc_5')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 06"
                        class="form-control @error('commodity_desc_6') is-invalid @enderror" name="commodity_desc_6"
                        value="{{ old('commodity_desc_6') }}" id="commodity_desc_6">
                    @error('commodity_desc_6')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 07"
                        class="form-control @error('commodity_desc_7') is-invalid @enderror" name="commodity_desc_7"
                        value="{{ old('commodity_desc_7') }}" id="commodity_desc_7">
                    @error('commodity_desc_7')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 08"
                        class="form-control @error('commodity_desc_8') is-invalid @enderror" name="commodity_desc_8"
                        value="{{ old('commodity_desc_8') }}" id="commodity_desc_8">
                    @error('commodity_desc_8')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 09"
                        class="form-control @error('commodity_desc_9') is-invalid @enderror" name="commodity_desc_9"
                        value="{{ old('commodity_desc_9') }}" id="commodity_desc_9">
                    @error('commodity_desc_9')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 10"
                        class="form-control @error('commodity_desc_10') is-invalid @enderror"
                        name="commodity_desc_10" value="{{ old('commodity_desc_10') }}" id="commodity_desc_10">
                    @error('commodity_desc_10')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 11"
                        class="form-control @error('commodity_desc_11') is-invalid @enderror"
                        name="commodity_desc_11" value="{{ old('commodity_desc_11') }}" id="commodity_desc_11">
                    @error('commodity_desc_11')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Commodity Description 12"
                        class="form-control @error('commodity_desc_12') is-invalid @enderror"
                        name="commodity_desc_12" value="{{ old('commodity_desc_12') }}" id="commodity_desc_12">
                    @error('commodity_desc_12')
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
        $(function() {
            evtUomCode(`.uom-rd`);
            evtCommodity(`.commodity_code-rd`);

            $("input[name=gross_weight]").keyup(function(e) {
                let val = $(this).val().replace(",", "");
                val = parseFloat(val);
                $("input[name=chargeable_wt]").val(numberFormatter(val));
            });
        });
    </script>
@endsection
