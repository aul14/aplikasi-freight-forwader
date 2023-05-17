<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JOB SHEET (P&L)</title>
    <link id="pagestyle" rel="stylesheet" href="{{ public_path('assets/css/bootstrap.min.css') }}" />
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
    </style>
</head>

<body>

    <div class="page_break">
        <h6 style="text-align: center;">PROFIT & LOSS SEA EXPORT {{ $sj->jm->cargo_type }}</h6>

        <br>
        <div class="row">
            <table class="no-table">

                <tr>
                    <td>JOB NO</td>
                    <td style="text-align: center;">:</td>
                    <td><strong>{{ $sj->jm->job_no }}</strong></td>

                    <td>SHIPPING LINE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->shippline_name }}</td>
                </tr>
                <tr>
                    <td>JOB DATE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($sj->jm->job_date) ? date('d/M/Y', strtotime($sj->jm->job_date)) : '' }}</td>

                    <td>VESSEL</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->vessel_name }}</td>
                </tr>
                <tr>
                    <td>BL NO.</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->bl_no }}</td>

                    <td>OBL NO.</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->obl_no }}</td>
                </tr>
                <tr>
                    <td>SHIPPER</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->shipper_name }}</td>

                    <td>VOYAGE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->voyage_no }}</td>
                </tr>
                <tr>
                    <td>MARKETING</td>
                    <td style="text-align: center;">:</td>
                    <td>EXPORT</td>

                    <td>ETD</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($sj->s_d1->etd) ? date('d/M/Y', strtotime($sj->s_d1->etd)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td>COMMODITY</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->commodity }}</td>

                    <td>ETA</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($sj->s_d1->eta) ? date('d/M/Y', strtotime($sj->s_d1->eta)) : '' }}
                    </td>
                </tr>
                <tr>
                    <td>FREIGHT</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->freight }}</td>

                    <td>WEIGHT</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ number_format($sj->total_gross, 4, '.', ',') }} KGS</td>
                </tr>
                <tr>
                    <td>PORT OF LOADING</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->port_loading_name }}</td>

                    <td>VOLUME</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ number_format($sj->total_volume, 4, '.', ',') }} M3</td>
                </tr>
                <tr>
                    <td>PORT OF DISCHARGE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->port_discharge_name }}</td>

                    <td>NO. OF PKGS</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->total_pcs }}</td>
                </tr>
                <tr>
                    <td>FINAL DESTINATION</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->port_discharge_name }}</td>

                    <td></td>
                    <td style="text-align: center;"></td>
                    <td></td>
                </tr>
            </table>
            <br>
            <table class="pdf-table">
                <tr>
                    <th>NO.</th>
                    <th>CODE</th>
                    <th>DESCRIPTION</th>
                    <th>QTY</th>
                    <th>CURRENCY</th>
                    <th>UNIT PRICE</th>
                    <th>VAT</th>
                    <th>AMOUNT USD</th>
                    <th>AMOUNT IDR</th>
                </tr>
                <tr>
                    <th colspan="9">SALES</th>
                </tr>
                @php
                    $no_sales = 1;
                    $total_amt_usd_sales = 0;
                    $total_amt_idr_sales = 0;
                @endphp
                @foreach ($sales as $val)
                    @php
                        $total_amt_usd_sales += $val['curr_sales'] == 'USD' ? (int) $val['amt_sales'] : 0;
                        $total_amt_idr_sales += $val['curr_sales'] == 'IDR' ? (int) $val['amt_sales'] : 0;
                    @endphp
                    <tr>
                        <td style="text-align: center;">{{ $no_sales++ }}</td>
                        <td>{{ $val['code'] }}</td>
                        <td>{{ $val['description'] }}</td>
                        <td>{{ number_format($val['qty_sales'], 4, '.', ',') }}</td>
                        <td>{{ $val['curr_sales'] }}</td>
                        <td style="text-align: right;">
                            {{ number_format($val['unit_rate_sales'], 2, '.', ',') }}</td>
                        <td>{{ $val['vat_sales'] }}</td>
                        <td style="text-align: right;">
                            {{ $val['curr_sales'] == 'USD' ? number_format($val['amt_sales'], 2, '.', ',') : '0.00' }}
                        </td>
                        <td style="text-align: right;">
                            {{ $val['curr_sales'] == 'IDR' ? number_format($val['amt_sales'], 2, '.', ',') : '0.00' }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="7">TOTAL</th>
                    <td style="text-align: right;">
                        <strong>{{ number_format($total_amt_usd_sales, 2, '.', ',') }}</strong>
                    </td>
                    <td style="text-align: right;">
                        <strong>{{ number_format($total_amt_idr_sales, 2, '.', ',') }}</strong>
                    </td>
                </tr>
                <tr>
                    <th colspan="9">COST</th>
                </tr>
                @php
                    $no_vendor = 1;
                    $total_amt_usd_vendor = 0;
                    $total_amt_idr_vendor = 0;
                @endphp
                @foreach ($vendor as $val)
                    @php
                        $total_amt_usd_vendor += $val['curr_vendor'] == 'USD' ? (int) $val['amt_vendor'] : 0;
                        $total_amt_idr_vendor += $val['curr_vendor'] == 'IDR' ? (int) $val['amt_vendor'] : 0;
                    @endphp
                    <tr>
                        <td style="text-align: center;">{{ $no_vendor++ }}</td>
                        <td>{{ $val['code'] }}</td>
                        <td>{{ $val['description'] }}</td>
                        <td>{{ number_format($val['qty_vendor'], 4, '.', ',') }}</td>
                        <td>{{ $val['curr_vendor'] }}</td>
                        <td style="text-align: right;">
                            {{ number_format($val['unit_rate_vendor'], 2, '.', ',') }}</td>
                        <td>{{ $val['vat_vendor'] }}</td>
                        <td style="text-align: right;">
                            {{ $val['curr_vendor'] == 'USD' ? number_format($val['amt_vendor'], 2, '.', ',') : '0.00' }}
                        </td>
                        <td style="text-align: right;">
                            {{ $val['curr_vendor'] == 'IDR' ? number_format($val['amt_vendor'], 2, '.', ',') : '0.00' }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="7">TOTAL</th>
                    <td style="text-align: right;">
                        <strong>{{ number_format($total_amt_usd_vendor, 2, '.', ',') }}</strong>
                    </td>
                    <td style="text-align: right;">
                        <strong>{{ number_format($total_amt_idr_vendor, 2, '.', ',') }}</strong>
                    </td>
                </tr>
                <tr>
                    <th colspan="4">BILLING INSTRUCTION</th>
                    <th colspan="3">TOTAL PROFIT OR LOSS</th>
                    <td style="text-align: right;">
                        <strong>{{ number_format($total_amt_usd_sales + $total_amt_usd_vendor, 2, '.', ',') }}</strong>
                    </td>
                    <td style="text-align: right;">
                        <strong>{{ number_format($total_amt_idr_sales + $total_amt_idr_vendor, 2, '.', ',') }}</strong>
                    </td>
                </tr>
            </table>
            <br>
            <table class="pdf-table">
                <thead>
                    <tr>
                        <th>PREPARED BY</th>
                        <th>RECEIVED BY</th>
                        <th>CHECKED BY</th>
                        <th>APPROVED BY</th>
                        <th>CASHIER</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">&nbsp;<br><br><br><br> {{ $sj->create_by }}</td>
                        <td>&nbsp;<br><br><br><br></td>
                        <td>&nbsp;<br><br><br><br></td>
                        <td>&nbsp;<br><br><br><br></td>
                        <td>&nbsp;<br><br><br><br></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p><strong>PRINT DATE : {{ date('d/M/Y') }}</strong></p>
        </div>
    </div>

</body>

</html>
