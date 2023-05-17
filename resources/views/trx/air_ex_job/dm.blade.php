<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="vol_wt_ratio">Volume Ratio</label>
                    <input type="text" class="form-control @error('vol_wt_ratio') is-invalid @enderror"
                        name="vol_wt_ratio" value="{{ old('vol_wt_ratio', '6000') }}" id="vol_wt_ratio">
                    @error('vol_wt_ratio')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="satuan_dimension">Weight Ratio</label>
                    <select class="select-2 @error('satuan_dimension') is-invalid @enderror" name="satuan_dimension">
                        <option value="CM" @selected(old('satuan_dimension') == 'CM')>CM</option>
                        <option value="IN" @selected(old('satuan_dimension') == 'IN')>IN</option>
                    </select>
                    @error('satuan_dimension')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="kg_lb_flag">Kg/Lb</label>
                    <select class="select-2 @error('kg_lb_flag') is-invalid @enderror" name="kg_lb_flag">
                        <option value="KILO" @selected(old('kg_lb_flag') == 'KILO')>KILO</option>
                        <option value="LB" @selected(old('kg_lb_flag') == 'LB')>LB</option>
                    </select>
                    @error('kg_lb_flag')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="no_high_pallet">No of High Pallet</label>
                    <input type="text" data-type="currency"
                        class="form-control @error('no_high_pallet') is-invalid @enderror" name="no_high_pallet"
                        value="{{ old('no_high_pallet') }}" id="no_high_pallet">
                    @error('no_high_pallet')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="no_low_pallet">No of Low Pallet</label>
                    <input type="text" data-type="currency"
                        class="form-control @error('no_low_pallet') is-invalid @enderror" name="no_low_pallet"
                        value="{{ old('no_low_pallet') }}" id="no_low_pallet">
                    @error('no_low_pallet')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="no_container">No of Container</label>
                    <input type="text" data-type="currency"
                        class="form-control @error('no_container') is-invalid @enderror" name="no_container"
                        value="{{ old('no_container') }}" id="no_container">
                    @error('no_container')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 my-2" style="overflow:auto;">
                <table id="table-condition" class="table table-bordered table-sm table-responsive-sm">
                    <thead>
                        <tr>
                            <th class="text-center th-action" style="min-width: 120px;">
                                Action </th>

                            <th class="text-center" style="min-width: 200px;"> Pcs/Rcp
                            </th>
                            <th class="text-center" style="min-width: 200px;"> Length
                            </th>
                            <th class="text-center" style="min-width: 200px;"> Width
                            </th>
                            <th class="text-center" style="min-width: 200px;"> Height
                            </th>
                            <th class="text-center" style="min-width: 200px;"> Dimension
                            </th>
                        </tr>
                    </thead>

                    <tbody class="tbody-condition" id="tbody-condition-1">
                        <tr class="dynamic-fieldsi" id="dynamic-fieldsi-1">
                            <td class="text-center">
                                <button type="button" onclick="addNewFieldSi(this.id)" id="add-buttonsi-1"
                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm add-button"><i
                                        class="fa fa-plus fa-fw"></i>
                                </button>
                                <button type="button" onclick="removeLastFieldSi(this)" id="remove-buttonsi-1"
                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1 remove-button"><i
                                        class="fa fa-minus fa-fw"></i>
                                </button>
                            </td>


                            <td>
                                <div class="form-group">
                                    <input type="number" name="pcs_rcp[]" class="form-control pcs-rcp" data-pcs="1"
                                        id="pcs-rcp-1" onkeyup="sumDimension(1, 1)">
                                </div>
                            </td>


                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control length" id="length-1"
                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                        name="length[]">
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control width" id="width-1"
                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                        name="width[]">
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control height" id="height-1"
                                        autocomplete="off" onkeyup="sumDimension(1, 1)" data-type='currency1'
                                        name="height[]">
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="hidden" id="sum-m3-1" name="sum_m3[]" class="sum-m3"
                                        data-m3="1">
                                    <input type="hidden" id="sum-volwt-1" name="sum_volwt[]" class="sum-volwt"
                                        data-volwt="1">
                                    <input type="text" class="form-control dimension" id="dimension-1"
                                        data-dimension="1" autocomplete="off" readonly data-type='currency1'
                                        name="dimension[]">
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="form-group">
                            <label for="total_m3">Total M3</label>
                            <input type="text" data-type='currency0' readonly title="Total M3"
                                class="form-control @error('total_m3') is-invalid @enderror total-m3" name="total_m3"
                                id="total-m3-1" value="{{ old('total_m3') }}">
                            @error('total_m3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="form-group">
                            <label for="total_dimension">Total Dimension</label>
                            <input type="text" data-type='currency0' readonly title="Total Dimension"
                                class="form-control @error('total_dimension') is-invalid @enderror total-dimension"
                                name="total_dimension" id="total-dimension-1" value="{{ old('total_dimension') }}">
                            @error('total_dimension')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="form-group">
                            <label for="total_pcs">Total Pcs</label>
                            <input type="text" data-type='currency0' readonly title="Total Pcs"
                                class="form-control @error('total_pcs') is-invalid @enderror total-pcs"
                                name="total_pcs" id="total-pcs-1" value="{{ old('total_pcs') }}">
                            @error('total_pcs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="form-group">
                            <label for="total_vol_wt">Total Volume Weight</label>
                            <input type="text" data-type='currency0' readonly title="Total Volume Weight"
                                class="form-control @error('total_vol_wt') is-invalid @enderror total-volwt"
                                name="total_vol_wt" id="total-volwt-1" value="{{ old('total_vol_wt') }}">
                            @error('total_vol_wt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@section('sub_script_3')
    <script>
        let buttonAddSubSi = $("#add-buttonsi-1");
        let buttonRemoveSubSi = $("#remove-buttonsi-1");
        let classNameSi = ".dynamic-fieldsi";
        let addButton = ".add-button";
        let removeButton = ".remove-button";
        let pcs_rcp = ".pcs-rcp";
        let length = ".length";
        let width = ".width";
        let height = ".height";
        let dimension = ".dimension";
        let total_volwt = ".total-volwt";
        let sum_volwt = ".sum-volwt";
        let total_dimension = ".total-dimension";
        let total_pcs = ".total-pcs";
        let total_m3 = ".total-m3";
        let sum_m3 = ".sum-m3";
        let countSubSi = 0;
        let fieldsi = "";

        function totalFieldSubSi() {
            return $(classNameSi).length;
        }

        function addNewFieldSi(obj) {
            if (totalFieldSubSi() < maxFields) {
                let timeSub = Math.floor(Date.now() / 1000);
                countSubSi = totalFieldSubSi() + timeSub + Math.floor(Math.random() * 999) + 1;

                fieldsi = $(`#dynamic-fieldsi-1`).clone();
                fieldsi.attr("id", "dynamic-fieldsi-" + countSubSi);
                fieldsi.children("label").text("Field " + countSubSi);
                fieldsi.find("input").val("");
                fieldsi.find(".select2-container").remove();
                fieldsi.find(".select2-container").empty();
                fieldsi.find(pcs_rcp).attr("id", "pcs-rcp-" + countSubSi).removeAttr("onkeyup").attr("onkeyup",
                    `sumDimension(${countSubSi}, 1)`);
                fieldsi.find(length).attr("id", "length-" + countSubSi).removeAttr("onkeyup").attr("onkeyup",
                    `sumDimension(${countSubSi}, 1)`);
                fieldsi.find(width).attr("id", "width-" + countSubSi).removeAttr("onkeyup").attr("onkeyup",
                    `sumDimension(${countSubSi}, 1)`);
                fieldsi.find(height).attr("id", "height-" + countSubSi).removeAttr("onkeyup").attr("onkeyup",
                    `sumDimension(${countSubSi}, 1)`);
                fieldsi.find(dimension).attr("id", "dimension-" + countSubSi);
                fieldsi.find(sum_m3).attr("id", "sum-m3-" + countSubSi);
                fieldsi.find(sum_volwt).attr("id", "sum-volwt-" + countSubSi);

                $(classNameSi + ":last").after($(fieldsi));

                $("input[data-type='currency1']").on({
                    keyup: function() {
                        formatCurrency1($(this));
                    },
                    blur: function() {
                        formatCurrency1($(this), "blur");
                    }
                });
            } else {
                alert(`Maximum ${maxFields} line`);
            }
        }

        function removeLastFieldSi(obj) {
            if ($(classNameSi).length > 1) {
                $(obj).closest(classNameSi).remove();
            } else {
                alert("Minimum 1 line");
            }
        }

        function sumDimension(evt = null, evt2 = null) {
            let pcs_sum = ($(`#pcs-rcp-${evt}`).val().split(',').join("") == '') ? 0 : parseFloat($(`#pcs-rcp-${evt}`).val()
                .split(',').join(""));
            let length_sum = ($(`#length-${evt}`).val().split(',').join("") == '') ? 0 : parseFloat($(`#length-${evt}`)
                .val()
                .split(',').join(""));
            let width_sum = ($(`#width-${evt}`).val().split(',').join("") == '') ? 0 : parseFloat($(`#width-${evt}`)
                .val()
                .split(',').join(""));
            let height_sum = ($(`#height-${evt}`).val().split(',').join("") == '') ? 0 : parseFloat($(`#height-${evt}`)
                .val()
                .split(',').join(""));

            let dimension_sum = 0;
            let total_sum_m3 = 0;
            let total_sum_volwt = 0;

            dimension_sum += pcs_sum * length_sum * width_sum * height_sum;
            total_sum_m3 += (pcs_sum * length_sum * width_sum * height_sum) / 1000000;
            total_sum_volwt += (pcs_sum * length_sum * width_sum * height_sum) / 6000;
            // ISI VALUE DIMENSION
            $(`#dimension-${evt}`).val(numberFormatter(dimension_sum));
            $(`#sum-m3-${evt}`).val(addCommas(total_sum_m3));
            $(`#sum-volwt-${evt}`).val(addCommas1(total_sum_volwt));
            if (evt2 != '') {
                sumOfTotalDimension(evt2);
                sumOfTotalM3(evt2);
                sumOfTotalPcs(evt2);
                sumOfTotalVolWWt(evt2);
            }
        }

        function addCommas(nStr) {
            nStr = parseFloat(nStr).toFixed(3);
            console.log(nStr);
            const checkIsNan = isNaN(nStr);
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            const rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            let result = x1 + x2;
            return checkIsNan ? 0 : result;
        }

        function addCommas1(nStr) {
            nStr = parseFloat(nStr).toFixed(1);
            console.log(nStr);
            const checkIsNan = isNaN(nStr);
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            const rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            let result = x1 + x2;
            return checkIsNan ? 0 : result;
        }

        function sumOfTotalDimension(num = null) {
            let dimension_num = $(`*[data-dimension="${num}"]`);
            let total = 0;
            let amt = 0

            for (let i = 0; i < dimension_num.length; i++) {
                if (!isNaN(parseFloat(dimension_num[i].value.split(',').join("")))) {
                    amt = parseFloat(dimension_num[i].value.split(',').join(""));
                    total += amt;
                }
            }

            $(`.total-dimension`).val(numberFormatter(total));
        }

        function sumOfTotalM3(num = null) {
            let m3_num = $(`*[data-m3="${num}"]`);
            let total = 0;
            let amt = 0

            for (let i = 0; i < m3_num.length; i++) {
                if (!isNaN(parseFloat(m3_num[i].value.split(',').join("")))) {
                    amt = parseFloat(m3_num[i].value.split(',').join(""));
                    total += amt;
                }
            }

            $(`.total-m3`).val(addCommas(total));
        }

        function sumOfTotalPcs(num = null) {
            let pcs_num = $(`*[data-pcs="${num}"]`);
            let total = 0;
            let amt = 0

            for (let i = 0; i < pcs_num.length; i++) {
                if (!isNaN(parseFloat(pcs_num[i].value.split(',').join("")))) {
                    amt = parseFloat(pcs_num[i].value.split(',').join(""));
                    total += amt;
                }
            }

            $(`.total-pcs, input[name=pcs]`).val(total);
        }

        function sumOfTotalVolWWt(num = null) {
            let volwt_num = $(`*[data-volwt="${num}"]`);
            let total = 0;
            let amt = 0

            for (let i = 0; i < volwt_num.length; i++) {
                if (!isNaN(parseFloat(volwt_num[i].value.split(',').join("")))) {
                    amt = parseFloat(volwt_num[i].value.split(',').join(""));
                    total += amt;
                }
            }

            $(`.total-volwt`).val(addCommas1(total));
        }
    </script>
@endsection
