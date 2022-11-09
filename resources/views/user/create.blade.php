@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4 py-5">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }}</strong>
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Form Add User</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('username') }}"
                                        class="form-control @error('username') is-invalid @enderror" required
                                        name="username" id="username">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email <span style="color: red;">*</span></label>
                                    <input type="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" required name="email"
                                        id="email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <span style="color: red;">*</span></label>
                                    <input type="password" value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror" required
                                        name="password" id="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role <span style="color: red;">*</span></label>
                                    <select name="role_id" data-live-search="true" id="role_id"
                                        class="form-control chosen-select" required>
                                        <option value=""></option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" value="{{ old('firstname') }}"
                                        class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                        id="firstname">
                                    @error('firstname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" value="{{ old('lastname') }}"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        id="lastname">
                                    @error('lastname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" value="{{ old('address') }}"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        id="address">
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" value="{{ old('city') }}"
                                        class="form-control @error('city') is-invalid @enderror" name="city"
                                        id="city">
                                    @error('city')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a href="{{ route('users.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
