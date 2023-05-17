<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JOB ORDER</title>
    <link id="pagestyle" rel="stylesheet" href="{{ public_path('assets/css/bootstrap.css?v=1.0.1') }}" />

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
            font-size: 12px;
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
            width: 100%;
            padding-right: 5px;
            padding-left: 5px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>

<body>

    <div class="page_break">
        <h6 style="text-align: center;">{{ $company->name }} <br> OPERATIONAL ORDER SHEET <br> IMPORT / EXPORT</h6>

        <br>
        <div class="row">
            <table class="no-table">
                <tr>
                    <td>JOB NO</td>
                    <td style="text-align: center;">:</td>
                    <td><strong>{{ $aj->jm->job_no }}</strong></td>

                    <td>AWB#</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->jm->mawb_no }}</td>
                </tr>
                <tr>
                    <td>AJU</td>
                    <td style="text-align: center;">:</td>
                    <td></td>

                    <td>RESPONSE</td>
                    <td style="text-align: center;">:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>CUSTOMER</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->jm->customer }}</td>

                    <td>CASH ADVANCE</td>
                    <td style="text-align: center;">:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>QTY / WEIGHT</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->total_pcs . ' / ' . number_format($aj->ad3->gross_weight, 2, '.', ',') . ' KGS' }}
                    </td>

                    <td>DELIVERY</td>
                    <td style="text-align: center;">:</td>
                    <td></td>
                </tr>

            </table>
            <br>
            <p>CHECKING LIST : </p>
            <table class="no-table">
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*DRAFT PIB /
                                PEB</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*DO
                                ASLI</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*DRAFT HAWB /
                                MAWB</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*WAREHOUSE
                                INVOICE ASLI</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*PIB OK &
                                PAYMENT</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*DOC INVOICE
                                ASLI</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*TRANSFER
                                EDI</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*SURAT JALAN
                                ASLI</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*HAWB &
                                MAWB</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*DNP
                                ASLI</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*CIPL</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*PO DAN
                                BROSUR ASLI</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*SURAT
                                KUASA</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*BUKTI
                                PENERIMAAN BERKAS PIB</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*S.PERNYATAAN KEABSAHAN DOC</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*DAGLU,
                                COI, LS</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*PIB / PEB
                                ASLI</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*KARTU
                                KENDALI</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*LEMBAR
                                LANJUTAN PIB / PEB ASLI</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*SKEP</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*SSPCP
                                ASLI</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*LHP</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*BUKTI
                                SETOR BANK ASLI</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*PRE-ALERT</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*PNBP</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*INVOICING</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*SRJM</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*SPJK</label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*SPPB</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*BC
                                1.1</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*ETD</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*ETA</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*AIRPORT OF
                                DEPARTURE</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*AIRPORT OF
                                DESTINATION</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*TANGGAL</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*ANALIS</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">*DELIVERY /
                                PICK UP</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*POS</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*FLIGHT</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*SUBPOS</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*GAPUDA</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mt-2" style="margin-bottom: 10px;" type="checkbox"
                                id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px; line-height: 15px;"
                                for="inlineCheckbox1">*SHIPPER
                                <br>&nbsp; {{ $aj->jm->shipper_name }} </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mt-2" style="margin-bottom: 10px;" type="checkbox"
                                id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px; line-height: 15px;"
                                for="inlineCheckbox1">*CONSIGNEE
                                <br>&nbsp; {{ $aj->jm->consignee_name }} </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px"
                                for="inlineCheckbox1">*VENDOR</label>
                        </div>
                    </td>
                </tr>


            </table>
            <br>
            <br>
            <p>REMARKS : </p>
        </div>
    </div>

</body>

</html>
