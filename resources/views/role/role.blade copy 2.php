@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Role'])
    <div class="row mt-4 mx-4 py-5 justi">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }}</strong>
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Role Access {{ $role->display_name }}</h4>
                    <p class="sub-title">Please Select Role Modules To Set Permissions!</p>
                    @php
                        $accordion = 0;
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Module</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($module as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $item->name }}</strong></td>

                                            </tr>
                                            @foreach ($item->permission as $row)
                                                @php
                                                    $permission_with_role = $row->permission_with_role($row->id, $role->id);
                                                @endphp
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $row->display_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        @if (!empty($permission_with_role))
                                                            @if ($row->id == $permission_with_role->permission_id)
                                                                <input type="checkbox"
                                                                    id="inlineCheckbox{{ $row->id }}"
                                                                    value="{{ $row->id }}" checked=""
                                                                    data-permission="{{ $row->name }}">
                                                                <label for="inlineCheckbox{{ $row->id }}">
                                                                    {{ $row->display_name }} </label>
                                                            @endif
                                                        @else
                                                            <input type="checkbox" id="inlineCheckbox{{ $row->id }}"
                                                                value="option{{ $row->id }}"
                                                                data-permission="{{ $row->name }}">
                                                            <label for="inlineCheckbox{{ $row->id }}">
                                                                {{ $row->display_name }} </label>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <a href="{{ route('roles.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
