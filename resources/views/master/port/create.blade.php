@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Port', 'title_2' => 'Master'])
    <div class="row mt-1 px-1">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }}</strong>
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4 ">
                <div class="card-header pb-0">
                    <h6>Form Add Port</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('port.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Port Code <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('code') }}"
                                        class="form-control @error('code') is-invalid @enderror" autofocus
                                        autocomplete="off" required name="code" id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Port Name <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" autocomplete="off" required
                                        name="name" id="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="country_id">Country <span style="color: red;">*</span></label>
                                    <select class="country-select" name="country_id" required>
                                        <option></option>
                                    </select>

                                    @error('country_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dg_cargo">DG Cargo </label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="dg_cargo" @checked(old('dg_cargo') == 'yes') value="yes"
                                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                                            data-offstyle="danger">
                                    </div>
                                    @error('dg_cargo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="symbol">Symbol </label>
                                    <input type="text" name="symbol" id="symbol" value="{{ old('symbol') }}"
                                        class="form-control @error('symbol') is-invalid @enderror">
                                    @error('symbol')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="group_code">Group Code </label>
                                    <input type="text" name="group_code" id="group_code" value="{{ old('group_code') }}"
                                        class="form-control @error('group_code') is-invalid @enderror">
                                    @error('group_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="region_code">Region Code </label>
                                    <input type="text" name="region_code" disabled class="form-control">

                                    @error('region_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="via_port">Via Port </label>
                                    <select class="port-select" name="via_port" id="via_port">
                                        <option value=""></option>
                                    </select>
                                    @error('via_port')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row dynamic-field" id="dynamic-field-1">
                            <div class="col md-12">
                                <div class="row">
                                    <div class="col-md-2 mt-4 append-buttons">
                                        <div class="col-md-12">
                                            <div class="clearfix">
                                                <button type="button" onclick="return addNewField(this)" id="add-button"
                                                    class="btn btn-xs btn-primary float-left text-uppercase shadow-sm"><i
                                                        class="fa fa-plus fa-fw"></i>
                                                </button>
                                                <button type="button" onclick="return removeLastField(this)"
                                                    id="remove-button"
                                                    class="btn btn-xs btn-danger float-left text-uppercase ml-1"><i
                                                        class="fa fa-minus fa-fw"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Dest Code</label>
                                                    <select class="city-select" id="city-select-1" name="city_id[]">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Dest Country Code</label>
                                                    <input type="text" class="form-control country-code"
                                                        id="country-code-1" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Dest Name</label>
                                                    <input type="text" class="form-control city-name" id="city-name-1"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>No. Of Day</label>
                                                    <input type="number" class="form-control" name="no_of_day[]"
                                                        id="no_of_day">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('port.index') }}" class="btn btn-danger btn-back">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let buttonAdd = $("#add-button");
        let buttonRemove = $("#remove-button");
        let className = ".dynamic-field";
        let cc = ".country-code";
        let cn = ".city-name";
        let cs = ".city-select";
        let count = 0;
        let field = "";
        let maxFields = MAX_FIELD;

        function totalFields() {
            return $(className).length;
        }

        function addNewField(obj) {
            if (totalFields() < maxFields) {
                count = totalFields() + Math.floor(Math.random() * 999) + 1;
                field = $("#dynamic-field-1").clone();
                field.attr("id", "dynamic-field-" + count);
                field.find(cc).attr("id", "country-code-" + count);
                field.find(cn).attr("id", "city-name-" + count);
                field.find(cs).attr("id", "city-select-" + count).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.city') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.code} | ${item.name}`,
                                        id: item.id,
                                        country_code: item.country.code,
                                        city_name: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.children("label").text("Field " + count);
                field.find("input").val("");
                field.find(".select2-container").empty();
                field.find(".city-select").empty();
                $(className + ":last").after($(field));

                $(`#city-select-1`).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.city') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.code} | ${item.name}`,
                                        id: item.id,
                                        country_code: item.country.code,
                                        city_name: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#city-select-${count}`).select2({
                    placeholder: 'Search...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('get.city') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.code} | ${item.name}`,
                                        id: item.id,
                                        country_code: item.country.code,
                                        city_name: item.name
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#city-select-${count}`).change(function(e) {
                    e.preventDefault();
                    let country_code = $(this).select2('data')[0].country_code;
                    let city_name = $(this).select2('data')[0].city_name;

                    $(`#country-code-${count}`).val(country_code);
                    $(`#city-name-${count}`).val(city_name);
                });
            } else {
                alert(`Maximum ${maxFields} line`);
            }

        }

        function removeLastField(obj) {
            if (totalFields() > 1) {
                $(obj).closest(className).remove();
            } else {
                alert("Minimum 1 line");
            }
        }


        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("input[type=text]").keyup(function() {
                $(this).val($(this).val().toUpperCase());
            });

            $('#city-select-1').select2({
                placeholder: 'Search...',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.city') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code} | ${item.name}`,
                                    id: item.id,
                                    country_code: item.country.code,
                                    city_name: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.country-select').select2({
                placeholder: 'Search country',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('get.country') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code} | ${item.name}`,
                                    id: item.id,
                                    custom_attribute: item.region_code
                                }
                            })
                        };
                    },
                    cache: false
                }
            });
            $('.port-select').select2({
                placeholder: 'Search port',
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
                                    text: `${item.code} | ${item.name}`,
                                    id: `${item.code} | ${item.name}`
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(".country-select").change(function(e) {
                e.preventDefault();
                let data_region = $(this).select2('data')[0].custom_attribute;
                $("input[name=region_code]").val(data_region);
            });
            $("#city-select-1").change(function(e) {
                e.preventDefault();
                let country_code = $(this).select2('data')[0].country_code;
                let city_name = $(this).select2('data')[0].city_name;
                let item1 = $(".country-code")[0];
                let item2 = $(".city-name")[0];

                $("#country-code-1").val(country_code);
                $(`#city-name-1`).val(city_name);
            });
        });
    </script>
@endsection
