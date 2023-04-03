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
    @foreach ($sb->sea_book_d6 as $key => $val)
        <div class="page_break">
            <div class="row float-left">
                <img src="{{ public_path('img/logo_pdf.jpeg') }}" alt="Logo" height="50px" width="50px"
                    class="img">
            </div>
            <div class="row float-right">
                <strong>{{ $company->name }}</strong>
                <p style="line-height: 15px;font-size: 12px">{!! $company_detail->address !!}
                </p>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <table>
                    <tr>
                        <td colspan="8" style="text-align: center;">
                            <strong>BOOKING CONFIRMATION</strong>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: left;" width="50px">
                            Shipper
                        </th>
                        <td colspan="4" rowspan="6" style="text-align: left;vertical-align: top;" width="100px">
                            Date <span style="padding-left:39px;"> :
                                {{ !empty($sb->booking_date) ? date('d-M-Y', strtotime($sb->booking_date)) : '' }}</span><br>
                            To <span style="padding-left:48px;"> :
                                {{ $sb->customer }}</span><br>
                            Attn <span style="padding-left:40px;"> : {{ $sb->contact_name }}</span><br>
                            Telphone <span style="padding-left:16px;"> : {{ $sb->telp }}</span><br>
                            Fax <span style="padding-left:44px;"> : {{ $sb->fax }}</span><br>
                            Booking No. <span style="padding-left:0px;"> : {{ $sb->code }}</span><br>
                            Staff <span style="padding-left:42px;">:
                                {{ auth()->user()->firstname . ' ' . auth()->user()->lastname }} </span>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: left;" width="50px">
                            {{ $sb->sea_book_d1->shipper_name }} <br>
                            {{ $sb->sea_book_d1->shipper_address_1 }} <br>
                            {{ $sb->sea_book_d1->shipper_address_2 }} <br>
                            {{ $sb->sea_book_d1->shipper_address_3 }} <br>
                            {{ $sb->sea_book_d1->shipper_address_4 }}
                        </td>

                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: left;" width="50px">
                            Consignee
                        </th>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: left;" width="50px">
                            {{ $sb->sea_book_d1->consignee_name }} <br>
                            {{ $sb->sea_book_d1->consignee_address_1 }} <br>
                            {{ $sb->sea_book_d1->consignee_address_2 }} <br>
                            {{ $sb->sea_book_d1->consignee_address_3 }} <br>
                            {{ $sb->sea_book_d1->consignee_address_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: left;" width="50px">
                            Notify
                        </th>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: left;" width="50px">
                            {{ $sb->sea_book_d1->notify_name }} <br>
                            {{ $sb->sea_book_d1->notify_address_1 }} <br>
                            {{ $sb->sea_book_d1->notify_address_2 }} <br>
                            {{ $sb->sea_book_d1->notify_address_3 }} <br>
                            {{ $sb->sea_book_d1->notify_address_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: left;">
                            Feeder Vessel
                        </th>
                        <th colspan="4" style="text-align: left;">
                            Place of Receipt
                        </th>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: left;">
                            {{ $sb->sea_book_d2->vessel_name }}
                        </td>
                        <td colspan="4" style="text-align: left;">
                            {{ $sb->sea_book_d2->place_of_receipt }}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: left;">
                            Mother Vessel
                        </th>
                        <th colspan="4" style="text-align: left;">
                            Port of Loading
                        </th>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: left;">
                            {{ $sb->sea_book_d2->mother_vessel_name }}
                        </td>
                        <td colspan="4" style="text-align: left;">
                            {{ $sb->sea_book_d2->port_loading_name }}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: left;">
                            Port of Discharge
                        </th>
                        <th colspan="2" style="text-align: left;">
                            Place of Delivery
                        </th>
                        <th colspan="2" style="text-align: left;">
                            No. of Original B/L
                        </th>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: left;">
                            {{ $sb->sea_book_d2->port_discharge_name }}
                        </td>
                        <td colspan="2" style="text-align: left;">
                            {{ $sb->sea_book_d2->place_of_delivery }}
                        </td>
                        <td colspan="2" style="text-align: left;">
                            {{ $sb->bl_no }}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: center;">
                            Container / Seal No.
                            Marks & Nos.
                        </th>
                        <th colspan="2" style="text-align: center;">
                            No. and Kind
                            of Packages
                        </th>
                        <th colspan="2" style="text-align: center;">
                            Description of Goods
                        </th>
                        <th colspan="2" style="text-align: center;">
                            Weight Measurement
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            {{ $val->cargo_container . ' / ' . $val->seal_no . ' / ' . number_format($val->cargo_volume, 4, '.', ',') . 'M3 / ' . number_format($val->gross_weight, 4, '.', ',') . 'KGS / ' . $val->pcs . 'UNITS' }}
                        </td>
                        <td colspan="2" style="text-align: center;vertical-align: top;">
                            {{ $key + 1 }}
                        </td>
                        <td colspan="2" style="text-align: left;vertical-align: top;">
                            {!! !empty($val->good_desc_1) ? $val->good_desc_1 . '<br/>' : '' !!}
                            {!! !empty($val->good_desc_2) ? $val->good_desc_2 . '<br/>' : '' !!}
                            {!! !empty($val->good_desc_3) ? $val->good_desc_3 . '<br/>' : '' !!}
                            {!! !empty($val->good_desc_4) ? $val->good_desc_4 . '<br/>' : '' !!}
                            {!! !empty($val->good_desc_5) ? $val->good_desc_5 . '<br/>' : '' !!}
                            {!! !empty($val->good_desc_6) ? $val->good_desc_6 . '<br/>' : '' !!}
                            {!! !empty($val->good_desc_7) ? $val->good_desc_7 . '<br/>' : '' !!}
                            {!! !empty($val->good_desc_8) ? $val->good_desc_8 . '<br/>' : '' !!}
                        </td>
                        <td colspan="2" style="text-align: right;vertical-align: top;">
                            {{ number_format($sb->total_gross, 4, '.', ',') }} KGS <br>
                            {{ number_format($sb->total_volume, 4, '.', ',') }} M3
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    @endforeach
</body>

</html>
