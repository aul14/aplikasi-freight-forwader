<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export PDF</title>
    <link id="pagestyle" rel="stylesheet" href="{{ public_path('assets/css/bootstrap.min.css') }}" />
    <style>
        body,
        table {
            font-family: 'Times New Roman', Times, sans-serif;
        }

        table {
            page-break-before: avoid;
            /* page-break-after: always; */
        }

        h2 {
            font-size: 18px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th {
            border: 1px solid #000;
            padding: 4px 6px;
        }

        table td {
            border: 1px solid #000;
            padding: 3px 4px;
        }

        table tr th {
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            line-height: 1;
        }

        table tr td {
            font-size: 12px;
            line-height: 1.1;
            word-break: break-all;
        }

        p {
            font-size: 12px;
        }

        div.page_break+div.page_break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    @foreach ($aq_d1 as $key => $item)
        <div class="page_break">
            <div class="row float-left">
                <img src="{{ public_path('img/logo_pdf.jpeg') }}" alt="Logo" height="50px" width="50px"
                    class="img">
            </div>
            <div class="row float-right">
                <strong>{{ $company->name }}</strong>
                <p style="line-height: 15px;font-size: 12px">{!! implode('<br />', str_split($company->company_detail_satu[0]->address, 42)) !!}</p>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <table>
                    <tr>
                        <th colspan="5">TITLE</th>
                        <th>QUOTE REFERENCE</th>
                        <th>TYPE</th>
                        <th>QUOTE DATE</th>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: left;">{{ $aq->quotation->title }}</td>
                        <td>{{ $aq->air_quot_no }}</td>
                        <td>AIR FREIGHT</td>
                        <td>{{ date('d-M-y', strtotime($aq->quotation->effective_date)) }}</td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: left;">
                            Thank you for the opportunity to present this rate quotation for your consideration. We are
                            pleased
                            to ofter the following rates for this job, based on the criteria listed below.
                        </td>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: left;">CUSTOMER</th>
                        <th colspan="3" style="text-align: left;">ATTN</th>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: left;">
                            {{ !empty($aq->quotation->bisnis_party_id) ? $aq->quotation->bisnis_party->name : '' }}</td>
                        <td colspan="3" style="text-align: left;">
                            {{ $aq->quotation->contact_name }}</td>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: left;">FROM</th>
                        <th colspan="3" style="text-align: left;">FINAL DESTINATION</th>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: left;">
                            {{ $item['air_dept_name'] }}</td>
                        <td colspan="3" style="text-align: left;">
                            {{ $item['air_dest_name'] }}</td>
                    </tr>
                    <tr>
                        <th colspan="8" style="text-align: left;">
                            DIMENSION
                        </th>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: left;">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th colspan="8" style="text-align: left;">
                            DESCRIPTION OF GOODS
                        </th>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: left;">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">
                            QUANTITY
                        </th>
                        <th style="text-align: left;">
                            ACTUAL WEIGHT (KG)
                        </th>
                        <th style="text-align: left;">
                            VOLUME (KG)
                        </th>
                        <th colspan="3" style="text-align: left;">
                            CHARGEABLE WEIGHT (KG)
                        </th>
                        <th style="text-align: left;">
                            FUMIGATION
                        </th>
                        <th style="text-align: left;">
                            INSURANCE
                        </th>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            &nbsp;
                        </td>
                        <td style="text-align: left;">
                            &nbsp;
                        </td>
                        <td style="text-align: left;">
                            &nbsp;
                        </td>
                        <td colspan="3" style="text-align: left;">
                            &nbsp;
                        </td>
                        <td style="text-align: left;">
                            &nbsp;
                        </td>
                        <td style="text-align: left;">
                            &nbsp;
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row mt-3">
                <table>
                    <thead>
                        <tr>
                            <th>CHARGES DESCRIPTION</th>
                            <th>VAT</th>
                            <th>QTY</th>
                            <th width="80" style="text-align: left">CURRENCY</th>
                            <th style="text-align: right">CHARGE</th>
                            <th style="text-align: right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_all = 0;
                            $total_all_vat = 0;
                        @endphp
                        @foreach ($item['air_quotation_s_d2'] as $item_d1)
                            @php
                                $total_vat = (int) $item_d1['idr_amt_s_d2'] * ($item_d1['vat']['vat_code_detail_satu'][0]['vat_rate'] / 100);
                                $total = $item_d1['idr_amt_s_d2'] + $total_vat;
                                $total_all += $total;
                                $total_all_vat += $total_vat;
                            @endphp
                            <tr>
                                <td>{{ $item_d1['item_desc_s_d2'] }}</td>
                                <td style="text-align: center">
                                    {{ empty($item_d1['vat']['vat_code_detail_satu']) ? '' : $item_d1['vat']['vat_code_detail_satu'][0]['vat_rate'] . '%' }}
                                </td>
                                <td style="text-align: center">
                                    {{ number_format($item_d1['qty_s_d2'] == 0 ? 1 : $item_d1['qty_s_d2'], 2, '.', ',') }}
                                </td>
                                <td style="text-align: left">IDR</td>
                                <td style="text-align: right">
                                    {{ number_format($item_d1['idr_amt_s_d2'], 2, '.', ',') }}
                                </td>
                                <td style="text-align: right">{{ number_format($total, 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        @foreach ($aq['air_quotation_d2'] as $item_d2)
                            @php
                                $total_vat = (int) $item_d2['idr_amt_d2'] * ($item_d2['vat']['vat_code_detail_satu'][0]['vat_rate'] / 100);
                                $total = $item_d2['idr_amt_d2'] + $total_vat;
                                $total_all += $total;
                                $total_all_vat += $total_vat;
                            @endphp
                            <tr>
                                <td>{{ $item_d2['item_desc_d2'] }}</td>
                                <td style="text-align: center">
                                    {{ empty($item_d2['vat']['vat_code_detail_satu']) ? '' : $item_d2['vat']['vat_code_detail_satu'][0]['vat_rate'] . '%' }}
                                </td>
                                <td style="text-align: center">
                                    {{ number_format($item_d2['qty_d2'] == 0 ? 1 : $item_d2['qty_d2'], 2, '.', ',') }}
                                </td>
                                <td style="text-align: left">IDR</td>
                                <td style="text-align: right">{{ number_format($item_d2['idr_amt_d2'], 2, '.', ',') }}
                                </td>
                                <td style="text-align: right">{{ number_format($total, 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        @php
                            $grand_total = $total_all + $total_all_vat;
                        @endphp
                        <tr>
                            <th rowspan="3" colspan="3">&nbsp;</th>
                            <th style="text-align: left">TOTAL</th>
                            <th style="text-align: right">IDR</th>
                            <th style="text-align: right">{{ number_format($total_all, 2, '.', ',') }}</th>
                        </tr>
                        <tr>
                            <th style="text-align: left">VAT</th>
                            <th style="text-align: right">IDR</th>
                            <th style="text-align: right">{{ number_format($total_all_vat, 2, '.', ',') }}</th>
                        </tr>
                        <tr>
                            <th style="text-align: left">GRAND TOTAL</th>
                            <th style="text-align: right">IDR</th>
                            <th style="text-align: right">{{ number_format($grand_total, 2, '.', ',') }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row float-left mt-5">
                <p>Warmest Regards,</p>
                <br>
                <br>
                <p>
                    {{ !empty($aq->quotation->salesman_id) ? $aq->quotation->salesman->name : '' }}
                    <br>
                    Mobile: {{ !empty($aq->quotation->salesman_id) ? $aq->quotation->salesman->hanphone : '' }}
                    <br>
                    E-mail: {{ !empty($aq->quotation->salesman_id) ? $aq->quotation->salesman->email : '' }}
                </p>
            </div>
            <div class="row float-right mt-5">
                <p>Approval quote,</p>
                <br>
                <br>
                <p>
                    &nbsp;&nbsp;____________
                </p>
            </div>
        </div>
    @endforeach
</body>

</html>
