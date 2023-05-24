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
        <h6 style="text-align: center;">{{ $company->name }} <br> OPERATIONAL ORDER SHEET <br> AIR IMPORT</h6>

        <br>
        <div class="row">
            <table class="no-table">
                <tr>
                    <td>JOB NO</td>
                    <td style="text-align: center;">:</td>
                    <td><strong>{{ $aj->jm->job_no }}</strong></td>
                </tr>

                <tr>
                    <td>CONSIGNEE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->jm->consignee_name }}</td>


                </tr>

                <tr>
                    <td>CUSTOMER</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->jm->customer }}</td>

                    <td>AWB</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->jm->awb_no }}</td>
                </tr>

                <tr>
                    <td>SHIPPER</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->jm->shipper_name }}</td>

                    <td>MAWB</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->jm->mawb_no }}</td>
                </tr>

                <tr>
                    <td>AGENT</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->jm->delivery_agent_name }}</td>

                    <td>AIRPORT OF DEPARTURE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->ad1->air_dept_name }}</td>
                </tr>

                <tr>
                    <td>WAREHOUSE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->warehouse_agent_name }}</td>

                    <td>AIRPORT OF DESTINATION</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->ad1->air_dest_name }}</td>
                </tr>



                <tr>
                    <td>FLIGHT NO</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $aj->ad1->flight_no }}</td>

                    <td>QTY</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ number_format($aj->ad1->charge_weight, 2, '.', ',') }}
                    </td>
                </tr>

                <tr>
                    <td>CHARGE WEIGHT</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ number_format($aj->ad1->pcs, 2, '.', ',') . ' ' . $aj->ad1->uom_code }}
                    </td>

                    <td>FLIGHT DATE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($aj->ad1->flight_date_1) ? date('d/m/Y', strtotime($aj->ad1->flight_date_1)) : '' }}
                    </td>
                </tr>

                <tr>
                    <td>ARRIVAL DATE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($aj->ad1->flight_date_1) ? date('d/m/Y', strtotime($aj->ad1->arrival_date_time)) : '' }}
                    </td>

                    <td>GROSS WEIGHT</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ number_format($aj->ad1->gross_weight, 2, '.', ',') }}
                    </td>
                </tr>

            </table>
            <br>
            <p>CHECKING LIST : </p>
            <table class="no-table">
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                PRE ALERT
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                DELIVERY / PU DATE
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                MANIFEST ADJUSTMENT
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                SPPB
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                DRAFT PIB
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                SEND PROOF OF DLVRY
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                PIB CONFIRMED
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                COLLECT D/O
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                PIB PAYMENT
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                OTHERS :
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline mt-4">
                            <input class="form-check-input" type="checkbox" style="margin-bottom: 100px;"
                                id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                CUSTOM DOCS <br>
                                * HB/L COPY NON NEGOTIABLE, MBL, MANIFEST<br>
                                * S. PERNYATAAN TELEX RELEASE FRM F/F<br>
                                * S.PERNYATAAN KEABSAHAN DOC (B/L)<br>
                                * PIB ASLI<br>
                                * SSPCP, BPN<br>
                                * BUKTI SETORAN BANK<br>
                                * D/O ASLI<br>
                                * CIPL ASLI
                            </label>
                        </div>
                    </td>
                </tr>

            </table>
            <p>REMARKS : {{ $aj->remark_1 }} </p>
        </div>
    </div>

</body>

</html>
