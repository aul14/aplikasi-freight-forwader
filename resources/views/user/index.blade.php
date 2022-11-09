@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        @permission('create-user')
                            <a href="{{ route('users.create') }}" type="button" class="btn btn-primary">Tambah</a>
                        @endpermission()
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Address</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('users.index') }}',
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="ni ni-bold-right" style="color: #f4645f;"></span>',
                        sPrevious: '<span class="ni ni-bold-left" style="color: #f4645f;"></span>'
                    }
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'firstname',
                        name: 'firstname'
                    },
                    {
                        data: 'lastname',
                        name: 'lastname'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'roles[0].display_name',
                        name: 'roles[0].display_name',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'city',
                        name: 'city'
                    },
                ],
                order: [
                    [0, 'desc']
                ],

            });
        });
    </script>
@endsection
