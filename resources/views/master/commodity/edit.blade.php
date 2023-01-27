@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Commodity', 'title_2' => 'Master'])
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
                    <h6>Form Edit Commodity</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('commodity.update', $commodity->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Commodity Code <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('code', $commodity->code) }}"
                                        class="form-control @error('code') is-invalid @enderror" readonly name="code"
                                        id="code">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Commodity Description <span
                                            style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('description', $commodity->description) }}"
                                        class="form-control @error('description') is-invalid @enderror" autocomplete="off"
                                        required name="description" id="description">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dutiable">Dutiable </label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="dutiable" @checked(old('dutiable', $commodity->dutiable) == 'yes') value="yes"
                                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                                            data-offstyle="danger">
                                    </div>
                                    @error('dutiable')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('commodity.index') }}" class="btn btn-danger">Back</a>
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

        });
    </script>
@endsection
