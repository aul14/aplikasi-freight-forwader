<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JOB COSTING (P&L)</title>
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
            font-size: 9px;
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
        <h6 style="text-align: center;" class="mt-3">{{ $company->name }} <br> SEA EXPORT JOB COSTING</h6>

        <br>
        <div class="row">
            <table class="no-table">
                <tr>
                    <td>JOB NO</td>
                    <td style="text-align: center;">:</td>
                    <td><strong>{{ $sj->jm->job_no }}</strong></td>

                </tr>
                <tr>
                    <td>BL NO</td>
                    <td style="text-align: center;">:</td>
                    <td><strong>{{ $sj->jm->bl_no }}</strong></td>

                </tr>
                <tr>
                    <td>BL NO</td>
                    <td style="text-align: center;">:</td>
                    <td><strong>{{ $sj->jm->obl_no }}</strong></td>
                </tr>
                <tr>
                    <td>CUSTOMER</td>
                    <td style="text-align: center;">:</td>
                    <td><strong>{{ $sj->jm->customer }}</strong></td>

                </tr>
                <tr>
                    <td style="vertical-align: top;">ADDRESS</td>
                    <td style="text-align: center;vertical-align: top;">:</td>
                    <td>
                        {{ $sj->jm->bisnis_party->address_1 }} <br>
                        {{ $sj->jm->bisnis_party->address_2 }} <br>
                        {{ $sj->jm->bisnis_party->address_3 }} <br>
                        {{ $sj->jm->bisnis_party->address_4 }}
                    </td>
                </tr>
                <tr>
                    <td>SALESMAN</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->salesman_code }}</td>
                </tr>
                <tr>
                    <td>SHIPPER</td>
                    <td style="text-align: center;">:</td>
                    <td><strong>{{ $sj->jm->shipper_name }}</strong></td>
                </tr>
                <tr>
                    <td>CONSIGNEE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->consignee_name }}</td>
                </tr>
                <tr>
                    <td>OVERSEAS AGENT</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->delivery_agent_name }}</td>
                </tr>
                <tr>
                    <td>COMMODITY</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->commodity }}</td>
                </tr>
                <tr>
                    <td>FREIGHT</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->freight }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: center;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>CARGO TYPE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->cargo_type }}</td>

                    <td>PORT OF LOADING</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->port_loading_name }}</td>
                </tr>
                <tr>
                    <td>ETD</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($sj->s_d1->etd) ? date('d/M/Y', strtotime($sj->s_d1->etd)) : '' }}
                    </td>

                    <td>PORT OF DISCHARGE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->port_discharge_name }}</td>
                </tr>
                <tr>
                    <td>ETA</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ !empty($sj->s_d1->eta) ? date('d/M/Y', strtotime($sj->s_d1->eta)) : '' }}
                    </td>

                    <td>WEIGHT</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ number_format($sj->total_gross, 0, '.', ',') }} KGS
                    </td>
                </tr>
                <tr>
                    <td>SHIPPING LINE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->shippline_name }}</td>

                    <td>VOLUME</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ number_format($sj->total_volume, 0, '.', ',') }} KGS
                    </td>
                </tr>
                <tr>
                    <td>VESSEL</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->vessel_name }}</td>

                    <td>NO. OF PKGS</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->total_pcs }} PCS</td>
                </tr>
                <tr>
                    <td>VOYAGE</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->s_d1->voyage_no }}</td>
                </tr>
                <tr>
                    <td>CARRIER REF NO.</td>
                    <td style="text-align: center;">:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>REFERENCE NO</td>
                    <td style="text-align: center;">:</td>
                    <td>{{ $sj->jm->reference_no }}</td>
                </tr>
            </table>
            <br>
            <table class="pdf-table">
                <thead>
                    <tr>
                        <th>CODE</th>
                        <th>DESCRIPTION</th>
                        <th>CUSTOMER</th>
                        <th>QTY</th>
                        {{-- <th>RATE</th> --}}
                        <th>CURRENCY</th>
                        <th>RATE</th>
                        <th>SALES</th>
                        <th>CURRENCY</th>
                        <th>RATE</th>
                        <th>COST</th>
                        <th>PROFIT</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $t_usd_sales = 0;
                        $t_usd_vendor = 0;
                        $t_idr_sales = 0;
                        $t_idr_vendor = 0;
                        $t_profit = 0;
                    @endphp
                    @foreach ($sj->s_d5 as $val)
                        @php
                            $profit = !empty($val->sales) ? $val->sales : 0 - $val->cost;
                            $t_usd_sales += $val->curr_sales == 'USD' ? $val->unit_rate_sales : 0;
                            $t_idr_sales += $val->curr_sales == 'IDR' ? $val->unit_rate_sales : 0;
                            $t_usd_vendor += $val->curr_vendor == 'USD' ? $val->unit_rate_vendor : 0;
                            $t_idr_vendor += $val->curr_vendor == 'IDR' ? $val->unit_rate_vendor : 0;
                            $t_profit += $profit;
                        @endphp
                        <tr style="">
                            <td>{{ $val->code }}</td>
                            <td>{{ $val->description }}</td>
                            <td>{{ $val->cust_code_sales }}</td>
                            <td>{{ number_format($val->qty_sales, 2, '.', ',') }}</td>
                            <td>{{ $val->curr_sales }}</td>
                            <td align="right">{{ number_format($val->rate_sales, 2, '.', ',') }}</td>
                            <td align="right">{{ number_format($val->unit_rate_sales, 2, '.', ',') }}</td>
                            <td>{{ $val->curr_vendor }}</td>
                            <td align="right">{{ number_format($val->rate_vendor, 2, '.', ',') }}</td>
                            <td align="right">{{ number_format($val->unit_rate_vendor, 2, '.', ',') }}</td>
                            <td align="right" width="60">{{ number_format($profit, 2, '.', ',') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <table class="pdf-table">
                <tr>
                    <th colspan="4" rowspan="2">Billing Instruction</th>
                    <th style="text-align: left">TOTAL USD :</th>
                    <th colspan="3" style="text-align: right">{{ number_format($t_usd_sales, 2, '.', ',') }}</th>
                    <th colspan="2" style="text-align: right">{{ number_format($t_usd_vendor, 2, '.', ',') }}</th>
                    <th rowspan="2" style="text-align: right">{{ number_format($t_profit, 2, '.', ',') }}</th>
                </tr>
                <tr>
                    <th style="text-align: left">TOTAL IDR :</th>
                    <th colspan="3" style="text-align: right">{{ number_format($t_idr_sales, 2, '.', ',') }}</th>
                    <th colspan="2" style="text-align: right">{{ number_format($t_idr_vendor, 2, '.', ',') }}</th>
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
                        <th style="text-align: center;">&nbsp;<br><br><br><br> {{ $sj->create_by }}</th>
                        <th>&nbsp;<br><br><br><br></th>
                        <th>&nbsp;<br><br><br><br></th>
                        <th>&nbsp;<br><br><br><br></th>
                        <th>&nbsp;<br><br><br><br></th>
                    </tr>
                </tbody>
            </table>
            <br>
            <p><strong>PRINT DATE : {{ date('d/M/Y') }}</strong></p>
        </div>
    </div>

</body>

</html>
