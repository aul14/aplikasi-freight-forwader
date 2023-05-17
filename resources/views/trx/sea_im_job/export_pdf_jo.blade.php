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
        <h6 style="text-align: center;">{{ $company->name }} <br> ORDER SHEET <br> IMPORT</h6>

        <br>
        <div class="row">
            <table class="no-table" style="width: 80%">
                <tr>
                    <td>JOB NO</td>
                    <td style="text-align: center;">:</td>
                    <td><strong>{{ $sj->jm->job_no }}</strong></td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>CONSIGNEE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->consignee_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>CUSTOMER</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->customer }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>SHIPPER</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->shipper_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>AGENT</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->delivery_agent_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>CARRIER</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->sd2->shippline_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>WAREHOUSE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->sd3->cfs_warehouse_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>MB/L NO</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->obl_no }}</td>

                    <td>ETD</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($sj->sd2->etd) ? date('d/M/Y', strtotime($sj->sd2->etd)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td>HB/L NO</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->hbl_no }}</td>

                    <td>ETA</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($sj->sd2->eta) ? date('d/M/Y', strtotime($sj->sd2->eta)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td>POL</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->sd2->port_loading_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>POD</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->sd2->port_discharge_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>VIA</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->sd2->via_port_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>QTY</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->total_pcs . ' ' . $sj->sd4[0]->cargo_uom }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>VESSEL</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->sd2->vessel_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>VOYAGE NO</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->sd2->voyage_no }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>MOTHER VESSEL</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->sd2->mother_vessel_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>CONTAINER</td>
                    <td style="text-align: center;">:</td>
                    @php
                        if (is_array($sj->sd4) || is_object($sj->sd4)) {
                            $val = [];
                            foreach ($sj->sd4 as $attribute => $value) {
                                $val[] = $value->container_no . '/' . $value->seal_no;
                            }
                        }
                    @endphp
                    <td>{{ implode(', ', $val) }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>REMARK</td>
                    <td style="text-align: center;">:</td>
                    <td>
                        {!! !empty($sj->footer_1) ? $sj->footer_1 . '<br>' : '' !!}
                        {!! !empty($sj->footer_2) ? $sj->footer_2 . '<br>' : '' !!}
                        {!! !empty($sj->footer_3) ? $sj->footer_3 . '<br>' : '' !!}
                        {!! !empty($sj->footer_4) ? $sj->footer_4 . '<br>' : '' !!}
                        {!! !empty($sj->footer_5) ? $sj->footer_5 . '<br>' : '' !!}
                    </td>

                    <td></td>
                    <td style="text-align: center;"></td>
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
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                PRE ALERT </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">DELIVERY / PU
                                DATE</label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                MANIFEST ADJUSTMENT</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">SPPB</label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">DRAFT
                                PIB</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">SEND PROOF
                                OF
                                DLVRY</label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">PIB
                                CONFIRMED</label>
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
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">PIB
                                PAYMENT</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                OTHERS : </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline mt-4">
                            <input class="form-check-input" style="margin-bottom: 100px;" type="checkbox"
                                id="inlineCheckbox1">
                            <label class="form-check-label" style="font-size: 12px" for="inlineCheckbox1">
                                CUSTOMS DOCS <br>
                                * HB/L COPY NON NEGOTIABLE, MBL, MANIFEST<br>
                                * S. PERNYATAAN TELEX RELEASE FRM F/F<br>
                                * S.PERNYATAAN KEABSAHAN DOC (B/L)<br>
                                * PIB ASLI<br>
                                * SSPCP, BPN<br>
                                * BUKTI SETORAN BANK<br>
                                * D/O ASLI<br>
                                * CIPL ASLI<br>
                            </label>
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
