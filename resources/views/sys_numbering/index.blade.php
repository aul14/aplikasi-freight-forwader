@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'System Numbering', 'title_2' => 'Master'])
    <div class="row mt-1 px-1">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }}</strong>
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4 ">
                <div class="card-header pb-0">
                    <h6>Form System Numbering</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('sys_numbering.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="overflow:auto;">
                                <table id="table-condition" class="table table-bordered table-sm table-responsive-sm">
                                    <thead>

                                        <tr>
                                            <th class="text-center th-action" style="min-width: 120px;"> Action </th>
                                            <th class="text-center" style="min-width: 200px;"> Module <span
                                                    style="color: red;">*</span> </th>
                                            <th class="text-center" style="min-width: 200px;"> Cycle </th>
                                            <th class="text-center" style="min-width: 200px;"> Description </th>
                                            <th class="text-center" style="min-width: 200px;"> Job Type </th>
                                            <th class="text-center" style="min-width: 200px;"> Next Number </th>
                                            <th class="text-center" style="min-width: 200px;"> Length Number </th>
                                            <th class="text-center" style="min-width: 200px;"> Prefix </th>
                                        </tr>
                                    </thead>

                                    <tbody id="tbody-condition">
                                        @if (count($sys_num) > 0)
                                            @foreach ($sys_num as $key => $item)
                                                <tr class="dynamic-field" id="dynamic-field-{{ $key + 1 }}">
                                                    <td class="text-center">
                                                        <button type="button" onclick="addNewField(this)" id="add-button"
                                                            class="btn btn-xs btn-primary float-left text-uppercase shadow-sm"><i
                                                                class="fa fa-plus fa-fw"></i>
                                                        </button>
                                                        <button type="button" onclick="removeLastField(this)"
                                                            id="remove-button"
                                                            class="btn btn-xs btn-danger float-left text-uppercase ml-1"><i
                                                                class="fa fa-minus fa-fw"></i>
                                                        </button>
                                                        <input type="hidden" name="count_hide[]"
                                                            id="count_hide_{{ $key + 1 }}" class="count_hide"
                                                            value="{{ $key + 1 }}">
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            <select name="module_id[]" required
                                                                id="module-{{ $key + 1 }}" class="module">
                                                                <option value="{{ $item->module_id }}">
                                                                    {{ !empty($item->module_id) ? $item->module->name : '' }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            <select name="cycle[]" id="cycle-{{ $key + 1 }}"
                                                                class="cycle">
                                                                <option value=""></option>
                                                                <option value="M" @selected($item->cycle == 'M')>M
                                                                </option>
                                                                <option value="Y" @selected($item->cycle == 'Y')>Y
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" name="description[]" autocomplete="off"
                                                                value="{{ $item->description }}" id="description"
                                                                class="form-control">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            <select name="job_type_{{ $key + 1 }}[]"
                                                                id="job-select-{{ $key + 1 }}" class="job-select"
                                                                multiple>
                                                                @if (!empty($item->job_type))
                                                                    @foreach (explode(',', $item->job_type) as $val)
                                                                        <option value="{{ $val }}" selected>
                                                                            {{ $val }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->next_number }}" data-type='currency'
                                                                autocomplete="off" name="next_number[]">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" min="1" max="12"
                                                                class="form-control" autocomplete="off" data-type='currency'
                                                                value="{{ $item->length_number }}" name="length_number[]">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" autocomplete="off"
                                                                value="{{ $item->prefix }}" name="prefix[]">
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="dynamic-field" id="dynamic-field-1">
                                                <td class="text-center">
                                                    <button type="button" onclick="addNewField(this)" id="add-button"
                                                        class="btn btn-xs btn-primary float-left text-uppercase shadow-sm"><i
                                                            class="fa fa-plus fa-fw"></i>
                                                    </button>
                                                    <button type="button" onclick="removeLastField(this)"
                                                        id="remove-button"
                                                        class="btn btn-xs btn-danger float-left text-uppercase ml-1"><i
                                                            class="fa fa-minus fa-fw"></i>
                                                    </button>
                                                    <input type="hidden" name="count_hide[]" id="count_hide_1"
                                                        class="count_hide" value="1">
                                                </td>


                                                <td>
                                                    <div class="form-group">
                                                        <select name="module_id[]" id="module-1" class="module">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <select name="cycle[]" id="cycle-1" class="cycle">
                                                            <option value=""></option>
                                                            <option value="M">M</option>
                                                            <option value="Y">Y</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="description[]" id="description"
                                                            class="form-control">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <select name="job_type_1[]" id="job-select-1" class="job-select"
                                                            multiple>
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" data-type='currency'
                                                            autocomplete="off" name="next_number[]">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" autocomplete="off"
                                                            data-type='currency' name="length_number[]">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" autocomplete="off"
                                                            name="prefix[]">
                                                    </div>
                                                </td>

                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <h6>Important!</h6>
                                <p class="text-monospace text-justify">
                                    - If you want to use the year and month format for the
                                    previous
                                    <strong>Prefix Column</strong>, <br> use a comma "," and square brackets "[]". Example:
                                    FWPC-FBKA,[YYYY],[MM],TEST. <br>The available year and month formats for the prefix
                                    column
                                    are examples:
                                    <br>
                                    {{-- <ul class="text-monospace"> --}}
                                    1. [YYYY] = 2022 (Year). <br>
                                    2. [YY]&nbsp;&nbsp; = 22 (Year). <br>
                                    3. [MM]&nbsp;&nbsp; = 01 (Month). <br>
                                    {{-- </ul> --}}
                                    - If you want to add a new module, please contact the IT team first, to match the code
                                    with the module. <br>
                                    - Value for colomn <strong>Length Number</strong> that is, Minimum = 0, & Maximal = 12
                                </p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @permission('manage-sys_numbering')
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                @endpermission
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
                field.find('.job-select').attr("name", `job_type_${count}[]`);
                field.find('.count_hide').attr("id", `count_hide_${count}`);
                field.find('.cycle').attr("id", "cycle-" + count).select2({
                    placeholder: 'Search cycle',
                    width: "100%",
                    allowClear: true,
                });
                field.find('.job-select').attr("id", "job-select-" + count).select2({
                    placeholder: '...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('job.notunique') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.type} - ${item.description}`,
                                        id: item.type,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.find('.module').attr("id", "module-" + count).select2({
                    placeholder: 'Select module',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('all.module') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.name}`,
                                        id: item.id,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });
                field.children("label").text("Field " + count);
                field.find("input").val("");
                field.find(".cycle").val("");
                field.find(".module").val("");
                field.find(".select2-container").empty();
                $(className + ":last").after($(field));
                $(`#count_hide_${count}`).val(count);

                $(`#cycle-1`).select2({
                    placeholder: 'Search cycle',
                    width: "100%",
                    allowClear: true,
                });

                $(`#job-select-1`).select2({
                    placeholder: '...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('job.notunique') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.type} - ${item.description}`,
                                        id: item.type,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#job-select-${count}`).select2({
                    placeholder: '...',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('job.notunique') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.type} - ${item.description}`,
                                        id: item.type,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#module-1`).select2({
                    placeholder: 'Select module',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('all.module') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.name}`,
                                        id: item.id,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#module-${count}`).select2({
                    placeholder: 'Select module',
                    width: "100%",
                    allowClear: true,
                    ajax: {
                        url: '{{ route('all.module') }}',
                        dataType: 'json',
                        type: 'POST',
                        delay: 0,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: `${item.name}`,
                                        id: item.id,
                                    }
                                })
                            };
                        },
                        cache: false
                    }
                });

                $(`#cycle-${count}`).select2({
                    placeholder: 'Search cycle',
                    width: "100%",
                    allowClear: true,
                });

                $("input[type=text]").keyup(function() {
                    $(this).val($(this).val().toUpperCase());
                });

                $("input[data-type='currency']").keypress(function(e) {
                    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        return false;
                    }
                });

            } else {
                alert(`Maximum ${maxFields} line`);
            }
        }

        function removeLastField(obj) {
            if ($('#tbody-condition tr').length > 1) {
                $(obj).closest('tr').remove();
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

            $("input[data-type='currency']").keypress(function(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });


            $(`#cycle-1`).select2({
                placeholder: 'Search cycle',
                width: "100%",
                allowClear: true,
            });

            $(`.cycle`).select2({
                placeholder: 'Search cycle',
                width: "100%",
                allowClear: true,
            });

            $(`#job-select-1`).select2({
                placeholder: '...',
                width: "100%",
                allowClear: true,
                multiple: true,
                ajax: {
                    url: '{{ route('job.notunique') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type} - ${item.description}`,
                                    id: item.type,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(`#module-1`).select2({
                placeholder: 'Select module',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('all.module') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.name}`,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(`.job-select`).select2({
                placeholder: '...',
                width: "100%",
                allowClear: true,
                multiple: true,
                ajax: {
                    url: '{{ route('job.notunique') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.type} - ${item.description}`,
                                    id: item.type,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $(`.module`).select2({
                placeholder: 'Select module',
                width: "100%",
                allowClear: true,
                ajax: {
                    url: '{{ route('all.module') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.name}`,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    cache: false
                }
            });
        });
    </script>
@endsection
