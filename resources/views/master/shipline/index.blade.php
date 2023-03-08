@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Shipping Line', 'title_2' => 'Master'])
    <div class="row mt-1 px-1">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        @permission('create-shipline')
                            <a href="{{ route('shipline.create') }}" type="button" class="btn btn-sm btn-primary">Add</a>
                        @endpermission()
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-0">
                        <table id="myTable" class="my-table1 table my-tableview my-table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>No</th>
                                    <th class="select-filter">Shipping Line Code</th>
                                    <th class="select-filter">Shipping Line Name</th>
                                    <th class="select-filter">Contact Name</th>
                                    <th class="select-filter">Telephone</th>
                                    <th class="select-filter">Fax</th>
                                    <th class="select-filter">Email</th>
                                    <th class="select-filter">City</th>
                                    <th class="select-filter">Country</th>
                                    <th class="select-filter">Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Shipping Line Code</th>
                                    <th>Shipping Line Name</th>
                                    <th>Contact Name</th>
                                    <th>Telephone</th>
                                    <th>Fax</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Updated At</th>
                                </tr>
                            </tfoot>
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
            $.fn.DataTable.ext.pager.numbers_length = 5;
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                scrollY: "50vh",
                scrollCollapse: true,
                scrollX: true,
                ajax: '{{ route('shipline.index') }}',
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="ni ni-bold-right pgn-1" style="color: #5e72e4"></span>',
                        sPrevious: '<span class="ni ni-bold-left pgn-2" style="color: #5e72e4"></span>',
                        sFirst: '<span class="pgn-3" style="color: #5e72e4">First</span>',
                        sLast: '<span class="pgn-4" style="color: #5e72e4">Last</span>',
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
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'contact',
                        name: 'contact'
                    },
                    {
                        data: 'telp',
                        name: 'telp'
                    },
                    {
                        data: 'fax',
                        name: 'fax'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'city.name',
                        name: 'city.name'
                    },
                    {
                        data: 'country.name',
                        name: 'country.name'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                ],
                columnDefs: [{
                    defaultContent: "-",
                    targets: "_all"
                }],
                fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    this.api()
                        .columns('.select-filter')
                        .every(function() {
                            var column = this;
                            var select = $(
                                    '<select style="width: 100%;"><option value=""></option></select>'
                                )
                                .appendTo($(column.footer()).empty())
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column.search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append('<option value="' + d + '">' + d +
                                        '</option>');
                                });
                        });
                },

            });
        });
    </script>
@endsection
