@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Sea Import Job', 'title_2' => 'Transaction'])

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
                        @permission('create-sea_im_job')
                            <a href="{{ route('sea_im_job.create') }}" type="button"
                                class="btn btn-sm btn-primary mb-2">Add</a>
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
                                    <th class="select-filter">Job No</th>
                                    <th class="select-filter">Container Seal No Type</th>
                                    <th class="select-filter">Bl No</th>
                                    <th class="select-filter">O Bl No</th>
                                    <th class="select-filter">Job Date</th>
                                    <th class="select-filter">Shipment Type</th>
                                    <th class="select-filter">Customer Name</th>
                                    <th class="select-filter">Etd Date</th>
                                    <th class="select-filter">Eta Date</th>
                                    <th class="select-filter">Vessel Name</th>
                                    <th class="select-filter">Voyage No</th>
                                    <th class="select-filter">Port Of Loading</th>
                                    <th class="select-filter">Port of Discharge</th>
                                    <th class="select-filter">Total Pcs</th>
                                    <th class="select-filter">Total Gross Weight</th>
                                    <th class="select-filter">Total Volume</th>
                                    <th class="select-filter">Cargo Type</th>
                                    <th class="select-filter">Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Job No</th>
                                    <th>Container Seal No Type</th>
                                    <th>Bl No</th>
                                    <th>O Bl No</th>
                                    <th>Job Date</th>
                                    <th>Shipment Type</th>
                                    <th>Customer Name</th>
                                    <th>Etd Date</th>
                                    <th>Eta Date</th>
                                    <th>Vessel Name</th>
                                    <th>Voyage No</th>
                                    <th>Port Of Loading</th>
                                    <th>Port of Discharge</th>
                                    <th>Total Pcs</th>
                                    <th>Total Gross Weight</th>
                                    <th>Total Volume</th>
                                    <th>Cargo Type</th>
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
                ajax: '{{ route('sea_im_job.index') }}',
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
                        data: 'job_no',
                        name: 'job_no'
                    },
                    {
                        data: 'container_no',
                        name: 'container_no'
                    },
                    {
                        data: 'jm.bl_no',
                        name: 'jm.bl_no'
                    },
                    {
                        data: 'jm.obl_no',
                        name: 'jm.obl_no'
                    },
                    {
                        data: 'jm.job_date',
                        name: 'jm.job_date'
                    },
                    {
                        data: 'jm.shipment_type',
                        name: 'jm.shipment_type'
                    },
                    {
                        data: 'jm.customer',
                        name: 'jm.customer'
                    },
                    {
                        data: 's_d2.etd',
                        name: 's_d2.etd'
                    },
                    {
                        data: 's_d2.eta',
                        name: 's_d2.eta'
                    },
                    {
                        data: 's_d2.vessel_name',
                        name: 's_d2.vessel_name'
                    },
                    {
                        data: 's_d2.voyage_no',
                        name: 's_d2.voyage_no'
                    },
                    {
                        data: 's_d2.port_loading_name',
                        name: 's_d2.port_loading_name'
                    },
                    {
                        data: 's_d2.port_discharge_name',
                        name: 's_d2.port_discharge_name'
                    },
                    {
                        data: 'total_pcs',
                        name: 'total_pcs'
                    },
                    {
                        data: 'total_gross',
                        name: 'total_gross'
                    },
                    {
                        data: 'total_volume',
                        name: 'total_volume'
                    },
                    {
                        data: 'jm.cargo_type',
                        name: 'jm.cargo_type'
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
