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
        <h6 style="text-align: center;">{{ $company->name }} <br> ORDER SHEET <br> EXPORT</h6>

        <br>
        <div class="row">
            <table class="no-table">
                <tr>
                    <td>JOB NO</td>
                    <td style="text-align: center;">:</td>
                    <td><strong>{{ $sj->jm->job_no }}</strong></td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>INV CUST</td>
                    <td style="text-align: center;">:</td>
                    <td>&nbsp;</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <br>
                <tr>
                    <td>CUSTOMER</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->customer }}</td>

                    <td>CARRIER</td>
                    <td style="text-align: center;">:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>MB/L NO</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->obl_no }}</td>

                    <td>TLP</td>
                    <td style="text-align: center;">:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>HB/L NO</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->hbl_no }}</td>

                    <td>O/F USD</td>
                    <td style="text-align: center;">:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>VESSEL</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->vessel_name }}</td>

                    <td>BL & OTHERS IDR</td>
                    <td style="text-align: center;">:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>POL</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->port_loading_name }}</td>


                </tr>
                <tr>
                    <td>POD</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->port_discharge_name }}</td>

                    <td>WAREHOUSE</td>
                    <td style="text-align: center;">:</td>
                    <td colspan="3">{{ $sj->s_d1->stuff_warehouse_name }}</td>
                </tr>
                <tr>
                    <td>ETD</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($sj->s_d1->etd) ? date('d/M/Y', strtotime($sj->s_d1->etd)) : '' }}
                    </td>

                    <td>PIC</td>
                    <td style="text-align: center;">:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>ETA</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($sj->s_d1->eta) ? date('d/M/Y', strtotime($sj->s_d1->eta)) : '' }}
                    </td>

                    <td>TLP</td>
                    <td style="text-align: center;">:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>QTY/PARTY</td>
                    <td style="text-align: center;">:</td>
                    <td></td>

                    <td>OTHERS</td>
                    <td style="text-align: center;">:</td>
                    <td colspan="3"></td>
                </tr>
            </table>
            <br>
            <p>CHECKING LIST : </p>
            <table class="no-table">
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">SI FROM
                                SHIPPER SI TO CARRIER </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">D/O (IF
                                FCL)</label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                D/O (IF FCL)</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">DRAFT PEB &
                                HB/L</label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">PEB
                                CONFIRMED</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">NPE</label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">PNBP</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                SEND PROOF OF DELIVERY
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">DELIVERY/PU
                                DATE</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                DELIVERY/PU DATE</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" style="margin-bottom: 65px;" type="checkbox"
                                id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                CHECK LIST DOCS <br>
                                * MB/L<br>
                                * HB/L<br>
                                * PEB<br>
                                * NPE<br>
                                * CERT. FUMIGATION (IF ANY)<br>
                            </label>
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline" style="margin-top: -10px;">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                SEND PRE-ALERT DOCS TO AGENT</label>
                        </div>
                    </td>
                </tr>
            </table>

            <br>
            <p><strong>PRINT DATE : {{ date('d/M/Y') }}</strong></p>
        </div>
    </div>

</body>

</html>
