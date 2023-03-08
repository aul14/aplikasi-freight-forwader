<style>
    .row-number {
        background: #e4e7ea;
        text-align: center;
        font-weight: bold;
        padding: 10px 0px;
    }

    .row-list-fch {
        padding-top: 10px;
    }

    .row-list-fch-border {
        width: 100%;
        height: 1px;
        margin-top: 20px;
        margin-bottom: 20px;
        background: #b1b1b1;
    }

    .row-list-fch:last-child {
        border: none;
    }
</style>
@if (count($sd6) > 0)
    @foreach ($sd6 as $key => $val)
        <div id="wrapper-row-list-fch-{{ $key + 1 }}" class="wrapper-row-list-fch ">
            <div class="row row-list-fch">
                <div class="col-md-2">
                    <div class="row-number">
                        <div>
                            <small>
                                Cargo Item No.
                            </small>
                        </div>

                        <span class='num'> {{ $key + 1 }} </span>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <a href="javascript:void(0)" class="btn btn-primary add-btn-fch"
                                id="add-btn-fch-{{ $key + 1 }}" title="Add row" onclick="add_row_ci(this.id)">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="javascript:void(0)" class="btn btn-danger" title="Delete row"
                                onclick="delete_row_ci(this)">
                                <i class="fa fa-minus"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="container_no">Container No.</label>
                        <input type="text" class="form-control" name="container_no[]"
                            value="{{ $val->container_no }}" id="container_no">

                    </div>
                    <div class="form-group">
                        <label for="pcs">Pcs</label>
                        <input type="text" class="form-control " name="pcs[]" value="{{ $val->pcs }}"
                            id="pcs-{{ $key + 1 }}">

                    </div>
                    <div class="form-group">
                        <label for="gross_weight">Gross Weight</label>
                        <input type="text" data-type='currency4' autocomplete="off" title="Gross Weight"
                            placeholder="Gross Weight" class="form-control"
                            value="{{ number_format($val->gross_weight, 4, '.', ',') }}" name="gross_weight[]"
                            id="gross-weight-{{ $key + 1 }}">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cargo_commodity_code">Commodity </label>
                                <select class="cargo-select" name="cargo_commodity_code[]"
                                    id="cargo-select-{{ $key + 1 }}">
                                    <option value="{{ $val->cargo_commodity_code }}">{{ $val->cargo_commodity_code }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="cargo_commodity"> </label>
                                <input type="text" readonly class="form-control cargo-commodity"
                                    name="cargo_commodity[]" value="{{ $val->cargo_commodity }}"
                                    id="cargo-commodity-{{ $key + 1 }}">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="seal_no">Seal No.</label>
                        <input type="text" class="form-control " name="seal_no[]" value="{{ $val->seal_no }}"
                            id="seal_no">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cargo_container_code">Container Type </label>
                                <select class="cont-type-select " name="cargo_container_code[]"
                                    id="cont-type-select-{{ $key + 1 }}">
                                    <option value="{{ $val->cargo_container_code }}">{{ $val->cargo_container_code }}
                                    </option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="cargo_container"> </label>
                                <input type="text" readonly class="form-control cargo-container"
                                    name="cargo_container[]" value="{{ $val->cargo_container }}"
                                    id="cargo-container-{{ $key + 1 }}">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cargo_volume">Volume</label>
                        <input type="text" data-type='currency4' autocomplete="off" title="Volume"
                            placeholder="Volume" class="form-control " name="cargo_volume[]"
                            value="{{ number_format($val->cargo_volume, 4, '.', ',') }}"
                            id="cargo-volume-{{ $key + 1 }}">

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cargo_uom_code">Uom </label>
                                <select class="cargo-uom-select" name="cargo_uom_code[]"
                                    id="cargo-uom-select-{{ $key + 1 }}">
                                    <option value="{{ $val->cargo_uom_code }}">{{ $val->cargo_uom_code }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="cargo_uom"> </label>
                                <input type="text" readonly class="form-control cargo-uom"
                                    value="{{ $val->cargo_uom }}" name="cargo_uom[]"
                                    id="cargo-uom-{{ $key + 1 }}">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="marks_1">Marks</label>
                        <input type="text" class="form-control " placeholder="Marks No 01"
                            value="{{ $val->marks_1 }}" name="marks_1[]" id="marks_1">

                        <input type="text" class="form-control  my-2" placeholder="Marks No 02"
                            value="{{ $val->marks_2 }}" name="marks_2[]" id="marks_2">

                        <input type="text" class="form-control my-2" placeholder="Marks No 03"
                            value="{{ $val->marks_3 }}" name="marks_3[]" id="marks_3">

                        <input type="text" class="form-control  my-2" placeholder="Marks No 04"
                            value="{{ $val->marks_4 }}" name="marks_4[]" id="marks_4">

                        <input type="text" class="form-control  my-2" placeholder="Marks No 05"
                            value="{{ $val->marks_5 }}" name="marks_5[]" id="marks_5">

                        <input type="text" class="form-control  my-2" placeholder="Marks No 06"
                            value="{{ $val->marks_6 }}" name="marks_6[]" id="marks_6">

                        <input type="text" class="form-control  my-2" placeholder="Marks No 07"
                            value="{{ $val->marks_7 }}" name="marks_7[]" id="marks_7">

                        <input type="text" class="form-control my-2" placeholder="Marks No 08"
                            value="{{ $val->marks_8 }}" name="marks_8[]" id="marks_8">
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="good_desc_1">Descriptions</label>
                        <input type="text" placeholder="Description 01" class="form-control "
                            name="good_desc_1[]" value="{{ $val->good_desc_1 }}" id="good_desc_1">

                        <input type="text" placeholder="Description 02" class="form-control  my-2"
                            name="good_desc_2[]" value="{{ $val->good_desc_2 }}" id="good_desc_2">

                        <input type="text" placeholder="Description 03" class="form-control  my-2"
                            name="good_desc_3[]" value="{{ $val->good_desc_3 }}" id="good_desc_3">

                        <input type="text" placeholder="Description 04" class="form-control  my-2"
                            name="good_desc_4[]" value="{{ $val->good_desc_4 }}" id="good_desc_4">

                        <input type="text" placeholder="Description 05" class="form-control  my-2"
                            name="good_desc_5[]" value="{{ $val->good_desc_5 }}" id="good_desc_5">

                        <input type="text" placeholder="Description 06" class="form-control  my-2"
                            name="good_desc_6[]" value="{{ $val->good_desc_6 }}" id="good_desc_6">

                        <input type="text" placeholder="Description 07" class="form-control  my-2"
                            name="good_desc_7[]" value="{{ $val->good_desc_7 }}" id="good_desc_7">

                        <input type="text" placeholder="Description 08" class="form-control  my-2"
                            name="good_desc_8[]" value="{{ $val->good_desc_8 }}" id="good_desc_8">
                    </div>


                </div>
            </div>
        </div>
    @endforeach
@else
    <div id="wrapper-row-list-fch-1" class="wrapper-row-list-fch ">
        <div class="row row-list-fch">
            <div class="col-md-2">
                <div class="row-number">
                    <div>
                        <small>
                            Cargo Item No.
                        </small>
                    </div>

                    <span class='num'> 1 </span>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <a href="javascript:void(0)" class="btn btn-primary add-btn-fch" id="add-btn-fch-1"
                            title="Add row" onclick="add_row_ci(this.id)">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="javascript:void(0)" class="btn btn-danger" title="Delete row"
                            onclick="delete_row_ci(this)">
                            <i class="fa fa-minus"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="container_no">Container No.</label>
                    <input type="text" class="form-control" name="container_no[]" id="container_no">

                </div>
                <div class="form-group">
                    <label for="pcs">Pcs</label>
                    <input type="text" class="form-control " name="pcs[]" id="pcs-1">

                </div>
                <div class="form-group">
                    <label for="gross_weight">Gross Weight</label>
                    <input type="text" data-type='currency4' autocomplete="off" title="Gross Weight"
                        placeholder="Gross Weight" class="form-control " name="gross_weight[]" id="gross-weight-1">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cargo_commodity_code">Commodity </label>
                            <select class="cargo-select" name="cargo_commodity_code[]" id="cargo-select-1">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="cargo_commodity"> </label>
                            <input type="text" readonly class="form-control cargo-commodity"
                                name="cargo_commodity[]" id="cargo-commodity-1">

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="seal_no">Seal No.</label>
                    <input type="text" class="form-control " name="seal_no[]" id="seal_no">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cargo_container_code">Container Type </label>
                            <select class="cont-type-select " name="cargo_container_code[]" id="cont-type-select-1">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="cargo_container"> </label>
                            <input type="text" readonly class="form-control cargo-container"
                                name="cargo_container[]" id="cargo-container-1">

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cargo_volume">Volume</label>
                    <input type="text" data-type='currency4' autocomplete="off" title="Volume"
                        placeholder="Volume" class="form-control " name="cargo_volume[]" id="cargo-volume-1">

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cargo_uom_code">Uom </label>
                            <select class="cargo-uom-select" name="cargo_uom_code[]" id="cargo-uom-select-1">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="cargo_uom"> </label>
                            <input type="text" readonly class="form-control cargo-uom" name="cargo_uom[]"
                                id="cargo-uom-1">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-2">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="marks_1">Marks</label>
                    <input type="text" class="form-control " placeholder="Marks No 01" name="marks_1[]"
                        id="marks_1">

                    <input type="text" class="form-control  my-2" placeholder="Marks No 02" name="marks_2[]"
                        id="marks_2">

                    <input type="text" class="form-control my-2" placeholder="Marks No 03" name="marks_3[]"
                        id="marks_3">

                    <input type="text" class="form-control  my-2" placeholder="Marks No 04" name="marks_4[]"
                        id="marks_4">

                    <input type="text" class="form-control  my-2" placeholder="Marks No 05" name="marks_5[]"
                        id="marks_5">

                    <input type="text" class="form-control  my-2" placeholder="Marks No 06" name="marks_6[]"
                        id="marks_6">

                    <input type="text" class="form-control  my-2" placeholder="Marks No 07" name="marks_7[]"
                        id="marks_7">

                    <input type="text" class="form-control my-2" placeholder="Marks No 08" name="marks_8[]"
                        id="marks_8">
                </div>

            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="good_desc_1">Descriptions</label>
                    <input type="text" placeholder="Description 01" class="form-control " name="good_desc_1[]"
                        id="good_desc_1">

                    <input type="text" placeholder="Description 02" class="form-control  my-2"
                        name="good_desc_2[]" id="good_desc_2">

                    <input type="text" placeholder="Description 03" class="form-control  my-2"
                        name="good_desc_3[]" id="good_desc_3">

                    <input type="text" placeholder="Description 04" class="form-control  my-2"
                        name="good_desc_4[]" id="good_desc_4">

                    <input type="text" placeholder="Description 05" class="form-control  my-2"
                        name="good_desc_5[]" id="good_desc_5">

                    <input type="text" placeholder="Description 06" class="form-control  my-2"
                        name="good_desc_6[]" id="good_desc_6">

                    <input type="text" placeholder="Description 07" class="form-control  my-2"
                        name="good_desc_7[]" id="good_desc_7">

                    <input type="text" placeholder="Description 08" class="form-control  my-2"
                        name="good_desc_8[]" id="good_desc_8">
                </div>


            </div>
        </div>
    </div>
@endif

@section('sub_script_7')
    <script>
        let className = ".wrapper-row-list-fch";
        let cargo_select = ".cargo-select";
        let cargo_commodity = ".cargo-commodity";
        let cont_type_select = ".cont-type-select";
        let cargo_container = ".cargo-container";
        let cargo_uom_select = ".cargo-uom-select";
        let cargo_uom = ".cargo-uom";
        let add_btn_fch = ".add-btn-fch";
        let row_number = 0;
        let total_line = 0;
        let obj_new = "";

        $(function() {
            evtCommodity(`.cargo-select`, `.cargo-commodity`);
            evtContainerType(`.cont-type-select`, `.cargo-container`);
            evtUom(`.cargo-uom-select`, `.cargo-uom`);
        });

        function totalFields() {
            return $(className).length;
        }

        function add_row_ci(obj) {
            if (totalFields() < maxFields) {
                let time = Math.floor(Date.now() / 1000);

                row_number = totalFields() + time + Math.floor(Math.random() * 999) + 1;

                total_line = totalFields();

                obj_new = $('#wrapper-row-list-fch-1').clone();
                obj_new.attr("id", "wrapper-row-list-fch-" + row_number);
                // obj_new.find("input").val('');
                obj_new.find("textarea").val('');
                obj_new.find(".select2-container").remove();
                obj_new.find(".select2-container").empty();

                obj_new.find(cont_type_select).attr("id", "cont-type-select-" + row_number).select2({
                    placeholder: 'Search container type',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.container') }}',
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
                obj_new.find(cargo_container).attr("id", "cargo-container-" + row_number);

                obj_new.find(cargo_uom_select).attr("id", "cargo-uom-select-" + row_number).select2({
                    placeholder: 'Search uom',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('charge.uom') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.code} - ${item.description}`,
                                        id: item.code,
                                        custom_attribute: item.description,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(cargo_uom).attr("id", "cargo-uom-" + row_number);

                obj_new.find(cargo_select).attr("id", "cargo-select-" + row_number).select2({
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
                                        custom_attribute: item.description,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                obj_new.find(cargo_commodity).attr("id", "cargo-commodity-" + row_number);

                $(className + ":last").after($(obj_new));

                evtCommodity(`#cargo-select-1`, `#cargo-commodity-1`);
                evtContainerType(`#cont-type-select-1`, `#cargo-container-1`);
                evtUom(`#cargo-uom-select-1`, `#cargo-uom-1`);
                evtCommodity(`#cargo-select-${row_number}`, `#cargo-commodity-${row_number}`);
                evtContainerType(`#cont-type-select-${row_number}`, `#cargo-container-${row_number}`);
                evtUom(`#cargo-uom-select-${row_number}`, `#cargo-uom-${row_number}`);

                $("input[data-type='currency4']").on({
                    keyup: function() {
                        formatCurrency4($(this));
                    },
                    blur: function() {
                        formatCurrency4($(this), "blur");
                    }
                });

                $("input[type=text]").keyup(function() {
                    $(this).val($(this).val().toUpperCase());
                });

                evtCountRowNumber();
            } else {
                alert(`Maximum ${maxFields} line`);
            }
        }

        function delete_row_ci(obj) {
            if ($(className).length > 1) {
                if (confirm("Are you sure delete this row?") == true) {
                    $(obj).closest(className).remove();
                }
            } else {
                alert("Minimum 1 line");
            }

            evtCountRowNumber();
        }

        function evtCountRowNumber() {
            var obj_row_number = $('.wrapper-row-list-fch .row-number span.num');

            var num = 0;
            for (var i = 0; i < obj_row_number.length; i++) {
                num++;
                $(obj_row_number[i]).html(num);
            }
        }

        function evtContainerType(evt1 = null, evt2 = null) {
            $(evt1).select2({
                placeholder: 'Search container type',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.container') }}',
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
    </script>
@endsection
