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

        p {
            font-size: 12px;
        }

        table tr td {
            font-size: 12px;
            line-height: 1.1;
            word-break: break-all;
        }

        div.page_break+div.page_break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    @foreach ($sq_d1 as $key => $item)
        <div class="page_break">
            <div class="row float-left">
                <img src="{{ public_path('img/logo_pdf.jpeg') }}" alt="Logo" height="50px" width="50px"
                    class="img">
            </div>
            <div class="row float-right">
                <strong>{{ $company->name }}</strong>
                <p style="line-height: 15px;font-size: 12px">{!! implode('<br />', str_split($company_detail->address, 42)) !!}</p>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <table>
                    <tr>
                        <th colspan="6">TITLE</th>
                        <th>QUOTE REFERENCE</th>
                        <th>TYPE</th>
                        <th>QUOTE DATE</th>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: left;">{{ $sq->quotation->title }}</td>
                        <td>{{ $sq->sea_quot_no }}</td>
                        <td>SEA FREIGHT</td>
                        <td>{{ date('d-M-y', strtotime($sq->quotation->effective_date)) }}</td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align: left;">
                            Thank you for the opportunity to present this rate quotation for your consideration. We are
                            pleased
                            to ofter the following rates for this job, based on the criteria listed below.
                        </td>
                    </tr>
                    <tr>
                        <th colspan="6" style="text-align: left;">CUSTOMER</th>
                        <th colspan="3" style="text-align: left;">ATTN</th>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: left;">
                            {{ !empty($sq->quotation->customer) ? $sq->quotation->customer : '' }}</td>
                        <td colspan="3" style="text-align: left;">
                            {{ $sq->quotation->contact_name }}</td>
                    </tr>
                    <tr>
                        <th colspan="6" style="text-align: left;">FROM</th>
                        <th colspan="3" style="text-align: left;">FINAL DESTINATION</th>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: left;">
                            {{ $item['port_loading_name'] }}</td>
                        <td colspan="3" style="text-align: left;">
                            {{ $item['port_discharge_name'] }}</td>
                    </tr>
                    <tr>
                        <th colspan="9" style="text-align: left;">
                            DIMENSION
                        </th>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align: left;">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th colspan="9" style="text-align: left;">
                            DESCRIPTION OF GOODS
                        </th>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align: left;">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">
                            COMMODITY
                        </th>
                        <th style="text-align: left;">
                            QUANTITY
                        </th>
                        <th style="text-align: left;">
                            ACTUAL WEIGHT (KG)
                        </th>
                        <th style="text-align: left;">
                            VOLUME (M3)
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
                            {{ !empty($sq->quotation->commodity_code) ? $sq->quotation->commodity_code : '' }}
                        </td>
                        <td style="text-align: left;">
                            {{ $sq->quotation->pcs }}
                        </td>
                        <td style="text-align: left;">
                            {{ number_format($sq->quotation->total_gross, 4, '.', ',') }}
                        </td>
                        <td style="text-align: left;">
                            {{ number_format($sq->quotation->total_volume, 4, '.', ',') }}
                        </td>
                        <td colspan="3" style="text-align: left;">
                            {{ number_format(($sq->quotation->total_volume * 1000000) / 4000, 4, '.', ',') }}
                        </td>
                        <td style="text-align: left;">
                            {{ !empty($add_info_d1->vb1) && $add_info_d1->vb1 == true ? 'YES' : '' }}
                        </td>
                        <td style="text-align: left;">
                            {{ !empty($add_info_d1->vb2) && $add_info_d1->vb2 == true ? 'YES' : '' }}
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
                            <th width="100" style="text-align: left">CURRENCY <p class="float-right">RATE</p>
                            </th>
                            <th style="text-align: right">AMOUNT</th>
                            <th style="text-align: right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_all = 0;
                            $total_all_vat = 0;
                        @endphp
                        @foreach ($item['sea_quotation_s_d1'] as $item_d1)
                            @php
                                $total_vat = (int) $item_d1['amt'] * ($item_d1['vat']['vat_code_detail_satu'][0]['vat_rate'] / 100);
                                $total = $item_d1['amt'] + $total_vat;
                                $total_all += $total;
                                $total_all_vat += $total_vat;
                            @endphp
                            <tr>
                                <td>{{ $item_d1['item_desc'] }}</td>
                                <td style="text-align: center">
                                    {{ empty($item_d1['vat']['vat_code_detail_satu']) ? '' : $item_d1['vat']['vat_code_detail_satu'][0]['vat_rate'] . '%' }}
                                </td>
                                <td style="text-align: center">
                                    {{ number_format($item_d1['qty'] == 0 ? 1 : $item_d1['qty'], 2, '.', ',') }}</td>
                                <td style="text-align: left">{{ $item_d1['currency'] }} <p class="float-right">
                                        {{ number_format($item_d1['curr_rate'], 2, '.', ',') }}</p>
                                </td>
                                <td style="text-align: right">{{ number_format($item_d1['amt'], 2, '.', ',') }}
                                </td>
                                <td style="text-align: right">{{ number_format($total, 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        @foreach ($sq['sea_quotation_d2'] as $item_d2)
                            @php
                                $total_vat = (int) $item_d2['amt_d2'] * ($item_d2['vat']['vat_code_detail_satu'][0]['vat_rate'] / 100);
                                $total = $item_d2['amt_d2'] + $total_vat;
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
                                <td style="text-align: left">{{ $item_d2['currency_d2'] }} <p class="float-right">
                                        {{ number_format($item_d2['curr_rate_d2'], 2, '.', ',') }}</p>
                                </td>
                                <td style="text-align: right">{{ number_format($item_d2['amt_d2'], 2, '.', ',') }}
                                </td>
                                <td style="text-align: right">{{ number_format($total, 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        @php
                            $grand_total = $total_all + $total_all_vat;
                        @endphp
                        <tr>
                            <th rowspan="3" colspan="4">&nbsp;</th>
                            <th style="text-align: left">TOTAL <p class="float-right">{{ $item_d1['currency'] }}</p>
                            </th>
                            <th style="text-align: right">{{ number_format($total_all, 2, '.', ',') }}</th>
                        </tr>
                        <tr>
                            <th style="text-align: left">VAT <p class="float-right">{{ $item_d1['currency'] }}</th>
                            <th style="text-align: right">{{ number_format($total_all_vat, 2, '.', ',') }}</th>
                        </tr>
                        <tr>
                            <th style="text-align: left">GRAND TOTAL <p class="float-right">{{ $item_d1['currency'] }}
                            </th>
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
                    {{ !empty($sq->quotation->salesman_id) ? $sq->quotation->salesman->name : '' }}
                    <br>
                    Mobile: {{ !empty($sq->quotation->salesman_id) ? $sq->quotation->salesman->hanphone : '' }}
                    <br>
                    E-mail: {{ !empty($sq->quotation->salesman_id) ? $sq->quotation->salesman->email : '' }}
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
