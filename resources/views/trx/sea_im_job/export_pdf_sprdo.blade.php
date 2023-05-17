<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SURAT PERMOHONAN RELEASE DO TANPA ORIGINAL B/L</title>
    <link id="pagestyle" rel="stylesheet" href="{{ public_path('assets/css/bootstrap.css?v=1.0.2') }}" />

    <style>
        body {
            font-family: 'Times New Roman', Times, sans-serif;
        }

        .pdf-table {
            page-break-before: avoid;
            /* page-break-after: always; */
        }


        .pdf-table {
            border-collapse: collapse;
            width: 100%;
        }

        .pdf-table th {
            border: 1px solid #000;
            padding: 4px 6px;
        }

        .pdf-table td {
            border: 1px solid #000;
            padding: 3px 4px;
        }

        .pdf-table tr th {
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            line-height: 1;
        }

        .pdf-table tr td {
            font-size: 12px;
            line-height: 1.1;
            word-break: break-all;
        }

        .no-table {
            page-break-before: avoid;
            /* page-break-after: always; */
        }

        .no-table {
            border-collapse: collapse;
            width: 100%;
        }

        .no-table th {
            border: 0;
            padding: 4px 6px;
        }

        .no-table td {
            border: 0;
            padding: 3px 4px;
        }

        .no-table tr th {
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            line-height: 1;
        }

        .no-table tr td {
            font-size: 12px;
            line-height: 1.1;
            word-break: break-all;
        }

        p {
            font-size: 14px;
        }


        h2 {
            font-size: 18px;
            text-align: center;
        }

        div.page_break+div.page_break {
            page-break-before: always;
        }

        .kotak {
            border-style: solid;
            width: 18px;
            height: 8px;

            padding-top: 8px;
            padding-bottom: 8px;
            padding-left: 15px;
        }

        .color {
            background: none;
            color: #000;
        }

        .container-pdf {
            width: auto;
            height: auto;
            position: absolute;
            padding-left: 10px;
            padding-right: 40px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>

<body>

    <div class="page_break">
        <div class="container-pdf">
            <div class="row" style="margin-top: 120px;">
                <div class="col-md-12">
                    <p>
                        No. &nbsp; : <br>
                        Jakarta, {{ $tgl_cetak }}
                    </p>
                    <p>
                        Kepada Yth,
                    </p>
                    <p>
                        Jakarta
                    </p>
                    <p>
                        Perihal : SURAT PERMOHONAN RELEASE DO TANPA ORIGINAL BL
                    </p>
                    <p>
                        Dengan hormat,
                    </p>
                    <p style="text-align: justify;">
                        Sehubungan dengan telah datangnya barang Import kami yang dikapalkan dengan data sebagai berikut
                        :
                    </p>
                    <table class="no-table" style="width: 80%">
                        <tr>
                            <td><strong>VESSEL</strong> </td>
                            <td style="text-align: center;"><strong>:</strong></td>
                            <td><strong>{{ $sj->sd2->vessel_name }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>No MB/L</strong> </td>
                            <td style="text-align: center;"><strong>:</strong></td>
                            <td><strong>{{ $sj->jm->obl_no }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>No HB/L</strong> </td>
                            <td style="text-align: center;"><strong>:</strong></td>
                            <td><strong>{{ $sj->jm->hbl_no }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>CONSIGNEE</strong> </td>
                            <td style="text-align: center;"><strong>:</strong></td>
                            <td><strong>{{ $sj->jm->consignee_name }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>NO. CONTAINER</strong> </td>
                            <td style="text-align: center;"><strong>:</strong></td>
                            @php
                                if (is_array($sj->sd4) || is_object($sj->sd4)) {
                                    $val = [];
                                    foreach ($sj->sd4 as $attribute => $value) {
                                        $val[] = $value->container_no . '/' . $value->seal_no;
                                    }
                                }
                            @endphp
                            <td><strong>{{ implode(', ', $val) }}</strong></td>
                        </tr>
                    </table>
                    <br>
                    <p style="text-align: justify;">
                        Mohon agar D/O barang tersebut di atas dapat diserahkan kepada kami, tanpa kami menyerahkan
                        original B/L karena original B/L-nya sudah di surrender di negara asal. Segala resiko yang
                        timbul di kemudian hari atas penyerahan D/O tersebut, menjadi tanggung jawab kami sepenuhnya.
                    </p>

                    <p style="text-align: justify;">
                        Demikian surat permohonan ini kami buat, atas perhatian dan kerjasamanya yang baik selama ini
                        kami ucapkan tarima kasih.
                    </p>
                    <br>
                    <p>
                        Hormat Kami <br>
                        <strong>{{ $company->name }}</strong>
                    </p>
                    <br>
                    <br>
                    <br>
                    <p>
                        {{ !empty(auth()->user()->firstname || auth()->user()->lastname) ? auth()->user()->firstname . ' ' . auth()->user()->lastname : '' }}
                        <br>
                        Import Department
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
