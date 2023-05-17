<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SURAT KUASA</title>
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

        hr {
            border: 0;
            border-top: 2px inset #000;
            margin-top: -10px;
            margin-bottom: -10px;
        }

        strong {
            text-align: center !important;
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
        <div class="row mx-2" style="margin-top: 120px;">
            <div class="col-md-12">
                <p>
                    No. &nbsp; :
                </p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <strong>SURAT KUASA</strong>
            </div>
        </div>
        <div class="row mx-2 mt-5">
            <div class="col-md-12">
                <p>
                    Dengan Hormat,
                </p>
                <p>
                    Sehubungan dengan telah datangnya barang Import klient kami yang dikapalkan dengan data sebagai
                    berikut :
                </p>
            </div>
        </div>
        <div class="row mx-2">
            <div class="col-md-12">
                <table class="no-table" style="width: 80%; margin-left: 30px;">
                    <tr>
                        <td><strong>VESSEL</strong> </td>
                        <td style="text-align: center;"><strong>:</strong></td>
                        <td><strong>{{ $sj->sd2->vessel_name }}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>No HB/L</strong> </td>
                        <td style="text-align: center;"><strong>:</strong></td>
                        <td><strong>{{ $sj->jm->hbl_no }}</strong></td>
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
            </div>
        </div>
        <div class="row mx-2 mt-2">
            <div class="col-md-12">
                <p>Dengan ini kami bertanda tangan dibawah ini :</p>
                <table class="no-table" style="width: 80%; margin-left: 30px;">
                    <tr>
                        <td><strong>Nama</strong> </td>
                        <td style="text-align: center;"><strong>:</strong></td>
                        <td>
                            <strong>
                                {{ !empty(auth()->user()->firstname || auth()->user()->lastname) ? auth()->user()->firstname . ' ' . auth()->user()->lastname : '' }}
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Alamat</strong> </td>
                        <td style="text-align: center;"><strong>:</strong></td>
                        <td>
                            <strong>
                                Jl.Kesehatan raya No. 54 Tanah Abang IV, Jakarta Pusat 10160
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Jabatan</strong> </td>
                        <td style="text-align: center;"><strong>:</strong></td>
                        <td>
                            <strong>
                                Import Departement
                            </strong>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="row mx-2 mt-2">
            <div class="col-md-12">
                <p>
                    Memberikan kuasa untuk proses pengambilan dokumen import sesuai data diatas kepada nama di bawah ini
                    :
                </p>
                <table class="no-table" style="width: 80%; margin-left: 30px;">
                    <tr>
                        <td><strong>Nama</strong> </td>
                        <td style="text-align: center;"><strong>:</strong></td>
                        <td>
                            <strong>
                                {{ $penerima_kuasa }}
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Alamat</strong> </td>
                        <td style="text-align: center;"><strong>:</strong></td>
                        <td>
                            <strong>
                                Jl.Kesehatan raya No. 54 Tanah Abang IV, Jakarta Pusat 10160
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Jabatan</strong> </td>
                        <td style="text-align: center;"><strong>:</strong></td>
                        <td>
                            <strong>
                                Staf Import Departement
                            </strong>
                        </td>
                    </tr>
                </table>
                <p class="mt-3">
                    Demikian surat kuasa ini kami buat, untuk dapat dipergunakan sebagaimana mestinya.
                </p>
            </div>
        </div>
        <div class="row ml-2 mt-4" style="margin-right: 120px;">
            <div class="col-md-12">
                <div style="float:left">
                    <p>Jakarta, {{ $tgl_cetak }} <br>
                        Yang Memberikan Kuasa,
                    </p>
                    <br>
                    <br>
                    <br>
                    <p>
                        {{ !empty(auth()->user()->firstname || auth()->user()->lastname) ? auth()->user()->firstname . ' ' . auth()->user()->lastname : '' }}
                        <hr>
                        Import Departement
                    </p>

                </div>
                <div style="float:right">
                    <p> <br>
                        Yang Diberi Kuasa,
                    </p>
                    <br>
                    <br>
                    <br>
                    <p>
                        {{ $penerima_kuasa }}
                        <hr>
                        Staf Operasional Import
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
