<div class="dropdown">
    <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bars"></i>
    </button>

    <div class="dropdown-menu cuk" aria-labelledby="dropdownMenu">
        @permission($can_edit)
            <a href="{{ $edit_url }}" data-toggle="tooltip" data-id="{{ $row_id }}" data-original-title="Edit"
                class="dropdown-item">
                <i class="fa fa-pencil"></i> Edit</a>
        @endpermission
        @permission($can_delete)
            <form action="{{ $delete_url }}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')"><i
                        class="fa fa-trash"></i> Delete
                </button>
            </form>
        @endpermission
        <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{ $row_id }}"
            data-job_no="{{ $job_no }}" data-original-title="Pdf" class="dropdown-item btn-print">
            <i class="fa fa-print"></i> PDF</a>
        @if (!empty($can_role_access))
            @permission($can_role_access)
                <a href="{{ $access_url }}" data-toggle="tooltip" data-id="{{ $row_id }}" data-original-title="Edit"
                    class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i> Role Access</a>
            @endpermission
        @endif
    </div>
</div>

<!-- Modal Filter Print Jobs -->
<div class="modal fade" id="modal-print" tabindex="-1" aria-labelledby="modalPrint" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPrint">Report Name</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        <label>1.</label>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:void(0)" target="_blank" class="link-js">JOB SHEET (P&L)</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>2.</label>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:void(0)" target="_blank" class="link-jo">JOB ORDER (CHECK LIST)</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>3.</label>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:void(0)" class="btn-sppd">SURAT PENGANTAR PENGAMBILAN DO</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>4.</label>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:void(0)" class="btn-sprdo">
                            SURAT PERMOHONAN RELEASE DO TANPA ORIGINAL B/L
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>5.</label>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:void(0)" class="btn-sk">
                            SURAT KUASA
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- END --}}
<!-- Modal Filter Print SPPD -->
<div class="modal fade" id="modal-sppd" tabindex="-1" aria-labelledby="modalSppd" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSppd">Filter</h5>
            </div>
            <form target="_blank" action="javacript:void(0)" method="post" class="link-sppd">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tgl_cetak">Select Print Date <span style="color: red;">*</span></label>
                                <input type="text" value="{{ old('tgl_cetak', date('d/m/Y')) }}" required
                                    autocomplete="off"
                                    class="form-control @error('tgl_cetak') is-invalid @enderror date-picker"
                                    name="tgl_cetak" id="tgl_cetak">
                                @error('tgl_cetak')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END --}}
<!-- Modal Filter Print SPRDO -->
<div class="modal fade" id="modal-sprdo" tabindex="-1" aria-labelledby="modalSprdo" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSprdo">Filter</h5>
            </div>
            <form target="_blank" action="javacript:void(0)" method="post" class="link-sprdo">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tgl_cetak">Select Print Date <span style="color: red;">*</span></label>
                                <input type="text" value="{{ old('tgl_cetak', date('d/m/Y')) }}" required
                                    autocomplete="off"
                                    class="form-control @error('tgl_cetak') is-invalid @enderror date-picker"
                                    name="tgl_cetak" id="tgl_cetak">
                                @error('tgl_cetak')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END --}}
<!-- Modal Filter Print SK -->
<div class="modal fade" id="modal-sk" tabindex="-1" aria-labelledby="modalSk" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSk">Filter</h5>
            </div>
            <form target="_blank" action="javacript:void(0)" method="post" class="link-sk">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="penerima_kuasa">Recipient of Power of Attorney (Penerima Kuasa) <span
                                        style="color: red;">*</span></label>
                                <input type="text" value="{{ old('penerima_kuasa') }}" required
                                    autocomplete="off"
                                    class="form-control @error('penerima_kuasa') is-invalid @enderror"
                                    name="penerima_kuasa" id="penerima_kuasa">
                                @error('penerima_kuasa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_cetak">Select Print Date <span style="color: red;">*</span></label>
                                <input type="text" value="{{ old('tgl_cetak', date('d/m/Y')) }}" required
                                    autocomplete="off"
                                    class="form-control @error('tgl_cetak') is-invalid @enderror date-picker"
                                    name="tgl_cetak" id="tgl_cetak">
                                @error('tgl_cetak')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END --}}
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.date-picker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });
        $('#tablePrint').DataTable({
            oLanguage: {
                oPaginate: {
                    sNext: '<span class="ni ni-bold-right pgn-1" style="color: #5e72e4"></span>',
                    sPrevious: '<span class="ni ni-bold-left pgn-2" style="color: #5e72e4"></span>',
                    sFirst: '<span class="pgn-3" style="color: #5e72e4">First</span>',
                    sLast: '<span class="pgn-4" style="color: #5e72e4">Last</span>',
                }
            },
        });
        $(`.btn-print`).click(function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let id = $(this).data('id');
            let job_no = $(this).data('job_no');

            // change title
            $('#modalPrint').html(`Report Name (${job_no})`);
            $('#modal-print').modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

            // 1. JOB SHEET
            let url_js = '{{ route('pdf.sea_im_job', ':id') }}';
            url_js = url_js.replace(':id', `${id}/js`);
            $('.link-js').attr('href', url_js);
            // 2. JOB ORDER
            let url_jo = '{{ route('pdf.sea_im_job', ':id') }}';
            url_jo = url_jo.replace(':id', `${id}/jo`);
            $('.link-jo').attr('href', url_jo);
            // 3.  SURAT PENGANTAR PENGAMBILAN DO
            $(`.btn-sppd`).click(function(e) {
                e.preventDefault();
                $('#modal-sppd').modal('show');
                let url_sppd = '{{ route('pdf.post.sea_im_job', ':id') }}';
                url_sppd = url_sppd.replace(':id', `${id}/sppd`);
                $('.link-sppd').attr('action', url_sppd);
            });
            // 4.  SURAT PERMOHONAN RELEASE DO TANPA ORIGINAL B/L
            $(`.btn-sprdo`).click(function(e) {
                e.preventDefault();
                $('#modal-sprdo').modal('show');
                let url_sprdo = '{{ route('pdf.post.sea_im_job', ':id') }}';
                url_sprdo = url_sprdo.replace(':id', `${id}/sprdo`);
                $('.link-sprdo').attr('action', url_sprdo);
            });
            // 4.  SURAT KUASA
            $(`.btn-sk`).click(function(e) {
                e.preventDefault();
                $('#modal-sk').modal('show');
                let url_sk = '{{ route('pdf.post.sea_im_job', ':id') }}';
                url_sk = url_sk.replace(':id', `${id}/sk`);
                $('.link-sk').attr('action', url_sk);
            });

        });
    });
</script>
