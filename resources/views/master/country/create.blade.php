@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Country', 'title_2' => 'Master'])

    <div class="row mt-1 px-1">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }}</strong>
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Form Add Country</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="container-fluid">
                        <form action="{{ route('country.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="col-md-12 mt-4">
                                <div class="tabset">
                                    <!-- Tab 1 -->
                                    <input type="radio" name="tabset" id="tab1" aria-controls="country" checked>
                                    <label for="tab1">Country</label>
                                    <!-- Tab 2 -->
                                    <input type="radio" name="tabset" id="tab2" aria-controls="port">
                                    <label for="tab2">Via Port</label>
                                    <!-- Tab 3 -->
                                    <input type="radio" name="tabset" id="tab3" aria-controls="symbol">
                                    <label for="tab3">Symbol</label>

                                    <div class="tab-panels col-md-12">
                                        <section id="country" class="tab-panel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="code">Country Code <span
                                                                style="color: red;">*</span></label>
                                                        <input type="text" autocomplete="off" value="{{ old('code') }}"
                                                            class="form-control @error('code') is-invalid @enderror"
                                                            required name="code" id="code">
                                                        @error('code')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Country Name <span
                                                                style="color: red;">*</span></label>
                                                        <input type="text" autocomplete="off" value="{{ old('name') }}"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            required name="name" id="name">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image_country">Country Image </label>
                                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                                        <input
                                                            class="form-control @error('image_country') is-invalid @enderror"
                                                            type="file" id="image_country" name="image_country"
                                                            onchange="previewImage()">
                                                        @error('image_country')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="idd">IDD </label>
                                                        <input type="number" value="{{ old('idd') }}"
                                                            class="form-control @error('idd') is-invalid @enderror"
                                                            name="idd" id="idd">
                                                        @error('idd')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="region_code">Region Code </label>
                                                        <input type="text" value="{{ old('region_code') }}"
                                                            class="form-control @error('region_code') is-invalid @enderror"
                                                            name="region_code" id="region_code">
                                                        @error('region_code')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="zone_code">Zone Code </label>
                                                        <input type="text" value="{{ old('zone_code') }}"
                                                            class="form-control @error('zone_code') is-invalid @enderror"
                                                            name="zone_code" id="zone_code">
                                                        @error('zone_code')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="handling_instructions">Handling Instruction </label>
                                                        <textarea name="handling_instructions" id="handling_instructions"
                                                            class="form-control @error('handling_instructions') is-invalid @enderror" cols="30" rows="10">{{ old('handling_instructions') }}</textarea>
                                                        @error('handling_instructions')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="special_instructions">Special Instruction </label>
                                                        <textarea name="special_instructions" id="special_instructions"
                                                            class="form-control @error('special_instructions') is-invalid @enderror" cols="30" rows="8">{{ old('special_instructions') }}</textarea>
                                                        @error('special_instructions')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="port" class="tab-panel">
                                            <div class="row">
                                                <div class="col md-12">
                                                    <div class="row">
                                                        <div class="col-md-10 dynamic-field" id="dynamic-field-1">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Port</label>
                                                                        <select class="port-select" name="port_id[]">
                                                                            <option value="">Select Port</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 append-buttons">
                                                            <div class="row my-4">
                                                                <div class="col-md-12">
                                                                    <div class="clearfix">
                                                                        <button type="button" id="add-button"
                                                                            class="btn btn-primary float-left text-uppercase shadow-sm"><i
                                                                                class="fa fa-plus fa-fw"></i>
                                                                        </button>
                                                                        <button type="button" id="remove-button"
                                                                            class="btn btn-danger float-left text-uppercase ml-1"
                                                                            disabled="disabled"><i
                                                                                class="fa fa-minus fa-fw"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="handling_instructions_port">Handling Instruction
                                                        </label>
                                                        <textarea name="handling_instructions_port" id="handling_instructions_port"
                                                            class="form-control @error('handling_instructions_port') is-invalid @enderror" cols="30" rows="10">{{ old('handling_instructions_port') }}</textarea>
                                                        @error('handling_instructions_port')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="symbol" class="tab-panel">
                                            <div class="row">
                                                <div class="col md-12">
                                                    <div class="row mb-2">
                                                        <div class="col-md-10 dynamic-fieldsymbol"
                                                            id="dynamic-fieldsymbol-1">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Symbol</label>
                                                                        <input type="text" class="form-control"
                                                                            id="symbol" name="symbol[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 append-buttons">
                                                            <div class="row my-4">
                                                                <div class="col-md-12">
                                                                    <div class="clearfix">
                                                                        <button type="button" id="add-buttonsymbol"
                                                                            class="btn btn-primary float-left text-uppercase shadow-sm"><i
                                                                                class="fa fa-plus fa-fw"></i>
                                                                        </button>
                                                                        <button type="button" id="remove-buttonsymbol"
                                                                            class="btn btn-danger float-left text-uppercase ml-1"
                                                                            disabled="disabled"><i
                                                                                class="fa fa-minus fa-fw"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="handling_instructions_symbol">Handling Instruction
                                                        </label>
                                                        <textarea name="handling_instructions_symbol" id="handling_instructions_symbol"
                                                            class="form-control @error('handling_instructions_symbol') is-invalid @enderror" cols="30" rows="10">{{ old('handling_instructions_symbol') }}</textarea>
                                                        @error('handling_instructions_symbol')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a href="{{ route('country.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
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

        let buttonAddsymbol = $("#add-buttonsymbol");
        let buttonRemovesymbol = $("#remove-buttonsymbol");
        let classNamesymbol = ".dynamic-fieldsymbol";
        let countsymbol = 0;
        let fieldsymbol = "";
        let maxFieldssymbol = MAX_FIELD;

        function totalFieldssymbol() {
            return $(classNamesymbol).length;
        }

        function addNewFieldsymbol() {
            countsymbol = totalFieldssymbol() + 1;
            fieldsymbol = $("#dynamic-fieldsymbol-1").clone();
            fieldsymbol.attr("id", "dynamic-fieldsymbol-" + countsymbol);
            fieldsymbol.children("label").text("fieldsymbol " + countsymbol);
            fieldsymbol.find("input").val("");
            fieldsymbol.find(".select2-container").empty();
            $(classNamesymbol + ":last").after($(fieldsymbol));

        }

        function removeLastFieldsymbol() {
            if (totalFieldssymbol() > 1) {
                $(classNamesymbol + ":last").remove();
            }
        }

        function enableButtonRemovesymbol() {
            if (totalFieldssymbol() === 2) {
                buttonRemovesymbol.removeAttr("disabled");
                buttonRemovesymbol.addClass("shadow-sm");
            }
        }

        function disableButtonRemovesymbol() {
            if (totalFieldssymbol() === 1) {
                buttonRemovesymbol.attr("disabled", "disabled");
                buttonRemovesymbol.removeClass("shadow-sm");
            }
        }

        function disableButtonAddsymbol() {
            if (totalFieldssymbol() === maxFieldssymbol) {
                buttonAddsymbol.attr("disabled", "disabled");
                buttonAddsymbol.removeClass("shadow-sm");
            }
        }

        function enableButtonAddsymbol() {
            if (totalFieldssymbol() === (maxFieldssymbol - 1)) {
                buttonAddsymbol.removeAttr("disabled");
                buttonAddsymbol.addClass("shadow-sm");
            }
        }
        // -------------------------------------------------------
        function totalFields() {
            return $(className).length;
        }

        function addNewField() {
            count = totalFields() + 1;
            field = $("#dynamic-field-1").clone();
            field.attr("id", "dynamic-field-" + count);
            field.children("label").text("Field " + count);
            field.find("input").val("");
            field.find(".select2-container").empty();
            $(className + ":last").after($(field));

            $('.port-select').select2({
                placeholder: 'Search port',
                width: "100%",
                ajax: {
                    url: '{{ route('get.port') }}',
                    dataType: 'json',
                    type: 'POST',
                    delay: 0,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.code} | ${item.name}`,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }

        function removeLastField() {
            if (totalFields() > 1) {
                $(className + ":last").remove();
            }
        }

        function enableButtonRemove() {
            if (totalFields() === 2) {
                buttonRemove.removeAttr("disabled");
                buttonRemove.addClass("shadow-sm");
            }
        }

        function disableButtonRemove() {
            if (totalFields() === 1) {
                buttonRemove.attr("disabled", "disabled");
                buttonRemove.removeClass("shadow-sm");
            }
        }

        function disableButtonAdd() {
            if (totalFields() === maxFields) {
                buttonAdd.attr("disabled", "disabled");
                buttonAdd.removeClass("shadow-sm");
            }
        }

        function enableButtonAdd() {
            if (totalFields() === (maxFields - 1)) {
                buttonAdd.removeAttr("disabled");
                buttonAdd.addClass("shadow-sm");
            }
        }


        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.port-select').select2({
                placeholder: 'Search port',
                width: "100%",
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
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $("input[type=text]").keyup(function() {
                $(this).val($(this).val().toUpperCase());
            });

            buttonAdd.click(function() {
                addNewField();
                enableButtonRemove();
                disableButtonAdd();
            });

            buttonRemove.click(function() {
                removeLastField();
                disableButtonRemove();
                enableButtonAdd();
            });

            buttonAddsymbol.click(function() {
                addNewFieldsymbol();
                enableButtonRemovesymbol();
                disableButtonAddsymbol();
            });

            buttonRemovesymbol.click(function() {
                removeLastFieldsymbol();
                disableButtonRemovesymbol();
                enableButtonAddsymbol();
            });
        });


        function previewImage() {
            const image = document.querySelector('#image_country');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(ofREvent) {
                imgPreview.src = ofREvent.target.result;
            }
        }
    </script>
@endsection
