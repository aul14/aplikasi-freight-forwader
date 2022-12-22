@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Salesman', 'title_2' => 'Master'])
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
                    <h6>Form Add Salesman</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('salesman.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Salesman Code <span style="color: red;">*</span></label>
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
                                    <label for="name">Salesman Description </label>
                                    <input type="text" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        id="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="employee_code">Employee Code </label>
                                    <input type="text" value="{{ old('employee_code') }}"
                                        class="form-control @error('employee_code') is-invalid @enderror"
                                        name="employee_code" id="employee_code">
                                    @error('employee_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password </label>
                                    <input type="password" value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        id="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="area">Area </label>
                                    <input type="text" value="{{ old('area') }}"
                                        class="form-control @error('area') is-invalid @enderror" name="area"
                                        id="area">
                                    @error('area')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="division">Division </label>
                                    <input type="text" value="{{ old('division') }}"
                                        class="form-control @error('division') is-invalid @enderror" name="division"
                                        id="division">
                                    @error('division')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title </label>
                                    <input type="text" value="{{ old('title') }}"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        id="title">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="text" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        id="email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="telp">Telephone </label>
                                    <input type="number" value="{{ old('telp') }}"
                                        class="form-control @error('telp') is-invalid @enderror" name="telp"
                                        id="telp">
                                    @error('telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="hanphone">Handphone </label>
                                    <input type="number" value="{{ old('hanphone') }}"
                                        class="form-control @error('hanphone') is-invalid @enderror" name="hanphone"
                                        id="hanphone">
                                    @error('hanphone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="join_date">Join Date </label>
                                    <input type="text" value="{{ old('join_date') }}"
                                        class="form-control date-picker @error('join_date') is-invalid @enderror"
                                        name="join_date" id="join_date">
                                    @error('join_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="resign_date">Resign Date </label>
                                    <input type="text" value="{{ old('resign_date') }}"
                                        class="form-control date-picker @error('resign_date') is-invalid @enderror"
                                        name="resign_date" id="resign_date">
                                    @error('resign_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('salesman.index') }}" class="btn btn-danger">Back</a>
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
