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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- END --}}
<script>
    $(function() {
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
            let url_js = '{{ route('pdf.air_im_job', ':id') }}';
            url_js = url_js.replace(':id', `${id}/js`);
            $('.link-js').attr('href', url_js);
            // 2. JOB ORDER
            let url_jo = '{{ route('pdf.air_im_job', ':id') }}';
            url_jo = url_jo.replace(':id', `${id}/jo`);
            $('.link-jo').attr('href', url_jo);


        });
    });
</script>
