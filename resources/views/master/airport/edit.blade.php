@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Airport', 'title_2' => 'Master'])
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
                    <h6>Form Edit Airport</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('airport.update', $airport->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Airport Code <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('code', $airport->code) }}"
                                        class="form-control @error('code') is-invalid @enderror" autofocus
                                        autocomplete="off" readonly name="code" id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Airport Name <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('name', $airport->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" autocomplete="off" required
                                        name="name" id="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country_id">Country <span style="color: red;">*</span></label>
                                            <select class="country-select" required name="country_id">
                                                <option value="{{ $airport->country_id }}">
                                                    {{ $airport->country_id != null ? $airport->country->code : '' }}
                                                </option>
                                            </select>

                                            @error('country_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="country_desc"> </label>
                                            <input type="text"
                                                value="{{ old('country_desc', $airport->country_id != null ? $airport->country->name : '') }}"
                                                disabled class="form-control" name="country_desc" id="country_desc">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('airport.index') }}" class="btn btn-danger btn-back">Back</a>
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
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("input[type=text]").keyup(function() {
                $(this).val($(this).val().toUpperCase());
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
                                    text: `${item.code} - ${item.name}`,
                                    id: item.id,
                                    idd_name: item.idd,
                                    country_name: item.name
                                }
                            })
                        };
                    },
                    cache: false
                }
            });
            $(".country-select").change(function(e) {
                e.preventDefault();
                let idd_name = $(this).select2('data')[0].idd_name;
                let country_name = $(this).select2('data')[0].country_name;

                $("input[name=country_desc]").val(country_name);
            });


        });
    </script>
@endsection
