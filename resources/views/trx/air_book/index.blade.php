@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Air Export Booking', 'title_2' => 'Transaction'])

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
                        @permission('create-air_book')
                            <a href="{{ route('air_book.create') }}" type="button" class="btn btn-sm btn-primary mb-2">Add</a>
                        @endpermission
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-0">
                        <table id="myTable" class="my-table1 table my-tableview my-table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>No</th>
                                    <th class="select-filter">Booking No</th>
                                    <th class="select-filter">Customer Code</th>
                                    <th class="select-filter">Awb No</th>
                                    <th class="select-filter">M Awb No</th>
                                    <th class="select-filter">First Flight No</th>
                                    <th class="select-filter">First By Airline ID</th>
                                    <th class="select-filter">First To Dest Code</th>
                                    <th class="select-filter">First Flight Date</th>
                                    <th class="select-filter">Pcs</th>
                                    <th class="select-filter">Volumetric Weight</th>
                                    <th class="select-filter">Gross Weight</th>
                                    <th class="select-filter">Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Booking No</th>
                                    <th>Customer Code</th>
                                    <th>Awb No</th>
                                    <th>M Awb No</th>
                                    <th>First Flight No</th>
                                    <th>First By Airline ID</th>
                                    <th>First To Dest Code</th>
                                    <th>First Flight Date</th>
                                    <th>Pcs</th>
                                    <th>Volumetric Weight</th>
                                    <th>Gross Weight</th>
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
                ajax: '{{ route('air_book.index') }}',
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
                        data: 'code_customer',
                        name: 'code_customer'
                    },
                    {
                        data: 'awb_no',
                        name: 'awb_no'
                    },
                    {
                        data: 'mawb_no',
                        name: 'mawb_no'
                    },
                    {
                        data: 'flight_no_1',
                        name: 'flight_no_1'
                    },
                    {
                        data: 'by_airline_id_1',
                        name: 'by_airline_id_1'
                    },
                    {
                        data: 'to_dest_code_1',
                        name: 'to_dest_code_1'
                    },
                    {
                        data: 'flight_date_1',
                        name: 'flight_date_1'
                    },
                    {
                        data: 'pcs',
                        name: 'pcs'
                    },
                    {
                        data: 'volume_weight',
                        name: 'volume_weight'
                    },
                    {
                        data: 'gross_weight',
                        name: 'gross_weight'
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
