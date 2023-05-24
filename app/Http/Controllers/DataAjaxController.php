<?php

namespace App\Http\Controllers;

use App\Models\Uom;
use App\Models\City;
use App\Models\Port;
use App\Models\Module;
use App\Models\Vendor;
use App\Models\Vessel;
use App\Models\WtCode;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Country;
use App\Models\JobType;
use App\Models\VatCode;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Salesman;
use App\Models\Commodity;
use App\Models\Container;
use App\Models\AirBooking;
use App\Models\AirQuotation;
use App\Models\ChargeCode;
use App\Models\VendorType;
use App\Models\BisnisParty;
use App\Models\ChargeTable;
use App\Models\PaymentTerm;
use App\Models\CustomerType;
use App\Models\DeliveryType;
use App\Models\SeaBookingD6;
use App\Models\SeaQuotation;
use App\Models\ShippingLine;
use Illuminate\Http\Request;
use App\Models\QuotationType;
use App\Models\AirQuotationD1;
use App\Models\SeaQuotationD1;
use Yajra\DataTables\DataTables;
use App\Models\CurrencyDetailSatu;
use Illuminate\Support\Facades\DB;

class DataAjaxController extends Controller
{
    public function ajax_change_date(Request $request)
    {
        $data = date('d/m/Y', strtotime(now()->addDays($request->value)));

        return response()->json($data);
    }

    public function ajax_format_currency(Request $request)
    {
        $data = number_format($request->total, 2, ".", ",");

        return response()->json($data);
    }

    public function ajax_commodity(Request $request)
    {
        $search = strtoupper($request->q);

        $commodity = [];
        if ($request->ajax()) {
            if ($search == '') {
                $commodity = Commodity::orderby('code', 'asc')->select('id', 'code', 'description')->limit(10)->get();
            } else {
                $commodity = Commodity::orderby('code', 'asc')->select('id', 'code', 'description')->where('code', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($commodity);
    }

    public function ajax_get_airport(Request $request)
    {
        $search = strtoupper($request->q);

        $airport = [];
        if ($request->ajax()) {
            if ($search == '') {
                $airport = Airport::orderby('code', 'asc')->select('id', 'code', 'name')->limit(10)->get();
            } else {
                $airport = Airport::orderby('code', 'asc')->select('id', 'code', 'name')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($airport);
    }

    public function ajax_get_airline(Request $request)
    {
        $search = strtoupper($request->q);

        $airline = [];
        if ($request->ajax()) {
            if ($search == '') {
                $airline = Airline::orderby('code', 'asc')->select('id', 'code', 'name', 'airline_id')->limit(10)->get();
            } else {
                $airline = Airline::orderby('code', 'asc')->select('id', 'code', 'name', 'airline_id')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->orWhere('airline_id', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($airline);
    }

    public function ajax_del_type(Request $request)
    {
        $search = strtoupper($request->q);

        $type = [];
        if ($request->ajax()) {
            if ($search == '') {
                $type = DeliveryType::orderby('type', 'asc')->select('id', 'type', 'description')->limit(10)->get();
            } else {
                $type = DeliveryType::orderby('type', 'asc')->select('id', 'type', 'description')->where('type', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($type);
    }

    public function ajax_quot_type(Request $request)
    {
        $search = strtoupper($request->q);

        $type = [];
        if ($request->ajax()) {
            if ($search == '') {
                $type = QuotationType::orderby('type', 'asc')->select('id', 'type', 'description')->limit(10)->get();
            } else {
                $type = QuotationType::orderby('type', 'asc')->select('id', 'type', 'description')->where('type', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($type);
    }

    public function ajax_get_port(Request $request)
    {
        $search = strtoupper($request->q);

        $ports = [];
        if ($request->ajax()) {
            if ($search == '') {
                $ports = Port::orderby('name', 'asc')->select('id', 'name', 'code')->limit(10)->get();
            } else {
                $ports = Port::orderby('name', 'asc')->select('id', 'name', 'code')->where('name', 'like', "%$search%")->orWhere('code', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($ports);
    }

    public function ajax_get_country(Request $request)
    {
        $search = strtoupper($request->q);

        $ports = [];
        if ($request->ajax()) {
            if ($search == '') {
                $ports = Country::orderby('name', 'asc')->select('id', 'name', 'code', 'region_code', 'idd')->limit(10)->get();
            } else {
                $ports = Country::orderby('name', 'asc')->select('id', 'name', 'code', 'region_code', 'idd')->where('name', 'like', "%$search%")->orWhere('code', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($ports);
    }

    public function ajax_by_code_city(Request $request)
    {
        $search = $request->code;
        $query = '';
        if ($request->ajax()) {
            $query = City::where('code', $search)->first();
        }
        return response()->json($query);
    }

    public function ajax_get_city(Request $request)
    {
        $search = strtoupper($request->q);

        $ports = [];
        if ($request->ajax()) {
            if ($search == '') {
                $ports = City::orderby('name', 'asc')->limit(10)->get();
            } else {
                $ports = City::orderby('name', 'asc')->where('name', 'like', "%$search%")->orWhere('code', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($ports);
    }

    public function ajax_get_currency(Request $request)
    {
        $search = strtoupper($request->q);

        $currency = [];
        if ($request->ajax()) {
            if ($search == '') {
                $currency = Currency::orderby('id', 'asc')->limit(10)->get();
            } else {
                $currency = Currency::orderby('id', 'asc')->where('code', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($currency);
    }

    public function ajax_get_detail_currency(Request $request)
    {
        $search = strtoupper($request->code);

        if ($request->ajax()) {
            $currency = Currency::with('currency_detail_satu')->where('code', $search)->first();

            $detail = CurrencyDetailSatu::orderby('date', 'desc')->where('currency_id', $currency->id)->first()->curr_rate;
        }

        return response()->json(number_format($detail, 2, ".", ","));
    }

    public function ajax_get_container(Request $request)
    {
        $search = strtoupper($request->q);

        $jobs = [];
        if ($request->ajax()) {
            if ($search == '') {
                $jobs = Container::orderby('id', 'asc')->limit(10)->get();
            } else {
                $jobs = Container::orderby('id', 'asc')->where('type', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($jobs);
    }

    public function ajax_get_uom(Request $request)
    {
        $search = strtoupper($request->q);

        $uom = [];
        if ($request->ajax()) {
            if ($search == '') {
                $uom = Uom::orderby('id', 'asc')->limit(10)->get();
            } else {
                $uom = Uom::orderby('id', 'asc')->where('code', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($uom);
    }

    public function ajax_get_charge(Request $request)
    {
        $search = strtoupper($request->q);

        $charge = [];
        if ($request->ajax()) {
            if ($search == '') {
                $charge = ChargeCode::orderby('id', 'asc')->select('charge_code.id', 'item_code', 'item_description')->limit(10)->get();
            } else {
                $charge = ChargeCode::orderby('id', 'asc')->select('charge_code.id', 'item_code', 'item_description')->where('item_code', 'like', "%$search%")->orWhere('item_description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($charge);
    }

    public function ajax_get_wht(Request $request)
    {
        $search = strtoupper($request->q);

        $wht = [];
        if ($request->ajax()) {
            if ($search == '') {
                $wht = WtCode::orderby('id', 'asc')->select('id', 'code', 'description')->limit(10)->get();
            } else {
                $wht = WtCode::orderby('id', 'asc')->select('id', 'code', 'description')->where('code', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($wht);
    }

    public function ajax_get_vat(Request $request)
    {
        $search = strtoupper($request->q);

        $vat = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vat = VatCode::orderby('id', 'asc')->select('id', 'code', 'description')->limit(10)->get();
            } else {
                $vat = VatCode::orderby('id', 'asc')->select('id', 'code', 'description')->where('code', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vat);
    }

    public function ajax_get_job_type(Request $request)
    {
        $search = strtoupper($request->q);

        $job = [];
        if ($request->ajax()) {
            if ($search == '') {
                $job = JobType::orderby('id', 'asc')->select('id', 'type', 'description', 'module_code')->limit(10)->get()->unique('module_code');
            } else {
                $job = JobType::orderby('id', 'asc')->select('id', 'type', 'description', 'module_code')->where('module_code', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->orWhere('type', 'like', "%$search%")->limit(10)->get()->unique('module_code');
            }
        }

        return response()->json($job);
    }

    public function ajax_get_job_type_not_unique(Request $request)
    {
        $search = strtoupper($request->q);

        $job = [];
        if ($request->ajax()) {
            if ($search == '') {
                $job = JobType::orderby('id', 'asc')->select('id', 'type', 'description', 'module_code')->limit(10)->get();
            } else {
                $job = JobType::orderby('id', 'asc')->select('id', 'type', 'description', 'module_code')->where('module_code', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->orWhere('type', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($job);
    }

    public function ajax_get_module(Request $request)
    {
        $search = ucwords($request->q);

        $module = [];
        if ($request->ajax()) {
            if ($search == '') {
                $module = Module::orderby('id', 'asc')->limit(10)->get();
            } else {
                $module = Module::orderby('id', 'asc')->where('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($module);
    }

    public function ajax_get_vendor_type(Request $request)
    {
        $search = strtoupper($request->q);

        $job = [];
        if ($request->ajax()) {
            if ($search == '') {
                $job = VendorType::orderby('id', 'asc')->select('id', 'type', 'type_name')->limit(10)->get();
            } else {
                $job = VendorType::orderby('id', 'asc')->select('id', 'type', 'type_name')->where('type', 'like', "%$search%")->orWhere('type_name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($job);
    }

    public function ajax_get_customer(Request $request)
    {
        $search = strtoupper($request->q);

        $customer = [];
        if ($request->ajax()) {
            if ($search == '') {
                $customer = Customer::orderby('id', 'asc')->select('id', 'code', 'name')->limit(10)->get();
            } else {
                $customer = Customer::orderby('id', 'asc')->select('id', 'code', 'name')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($customer);
    }

    public function ajax_get_vessel(Request $request)
    {
        $search = strtoupper($request->q);

        $vessel = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vessel = Vessel::orderby('id', 'asc')->select('id', 'code', 'name')->limit(10)->get();
            } else {
                $vessel = Vessel::orderby('id', 'asc')->select('id', 'code', 'name')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vessel);
    }

    public function ajax_get_salesman(Request $request)
    {
        $search = strtoupper($request->q);

        $salesman = [];
        if ($request->ajax()) {
            if (!empty(auth()->user()->salesman_code)) {
                if ($search == '') {
                    $salesman = Salesman::orderby('id', 'asc')->select('id', 'code', 'name')->whereIn('code', explode(",", auth()->user()->salesman_code))->limit(10)->get();
                } else {
                    $salesman = Salesman::orderby('id', 'asc')->select('id', 'code', 'name')->whereIn('code', explode(",", auth()->user()->salesman_code))
                        ->where(function ($query) use ($search) {
                            $query->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%");
                        })
                        ->limit(10)->get();
                }
            } else {
                if ($search == '') {
                    $salesman = Salesman::orderby('id', 'asc')->select('id', 'code', 'name')->limit(10)->get();
                } else {
                    $salesman = Salesman::orderby('id', 'asc')->select('id', 'code', 'name')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
                }
            }
        }

        return response()->json($salesman);
    }

    public function ajax_get_vendor(Request $request)
    {
        $search = strtoupper($request->q);

        $vendor = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vendor = Vendor::orderby('id', 'asc')->select('id', 'code', 'name')->limit(10)->get();
            } else {
                $vendor = Vendor::orderby('id', 'asc')->select('id', 'code', 'name')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vendor);
    }

    public function ajax_get_shipline(Request $request)
    {
        $search = strtoupper($request->q);

        $shipline = [];
        if ($request->ajax()) {
            if ($search == '') {
                $shipline = ShippingLine::orderby('id', 'asc')->select('id', 'code', 'name')->limit(10)->get();
            } else {
                $shipline = ShippingLine::orderby('id', 'asc')->select('id', 'code', 'name')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($shipline);
    }

    public function ajax_get_payment_term(Request $request)
    {
        $search = strtoupper($request->q);

        $pay_term = [];
        if ($request->ajax()) {
            if ($search == '') {
                $pay_term = PaymentTerm::orderby('id', 'asc')->select('id', 'code', 'description')->limit(10)->get();
            } else {
                $pay_term = PaymentTerm::orderby('id', 'asc')->select('id', 'code', 'description')->where('code', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($pay_term);
    }

    public function ajax_get_cus_type(Request $request)
    {
        $search = strtoupper($request->q);

        $cus_type = [];
        if ($request->ajax()) {
            if ($search == '') {
                $cus_type = CustomerType::orderby('id', 'asc')->select('id', 'type', 'type_name')->limit(10)->get();
            } else {
                $cus_type = CustomerType::orderby('id', 'asc')->select('id', 'type', 'type_name')->where('type', 'like', "%$search%")->orWhere('type_name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($cus_type);
    }

    public function ajax_get_bisnis_party(Request $request)
    {
        $search = strtoupper($request->q);

        $vat = [];
        if ($request->ajax()) {
            if (!empty(auth()->user()->salesman_code)) {
                if ($search == '') {
                    $vat = BisnisParty::orderby('id', 'asc')->whereIn('salesman_code', explode(",", auth()->user()->salesman_code))->limit(10)->get();
                } else {
                    $vat = BisnisParty::orderby('id', 'asc')->whereIn('salesman_code', explode(",", auth()->user()->salesman_code))
                        ->where(function ($query) use ($search) {
                            $query->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%");
                        })
                        ->limit(10)->get();
                }
            } else {
                if ($search == '') {
                    $vat = BisnisParty::orderby('id', 'asc')->limit(10)->get();
                } else {
                    $vat = BisnisParty::orderby('id', 'asc')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
                }
            }
        }

        return response()->json($vat);
    }

    public function ajax_table_get_bisnis_party(Request $request)
    {
        if ($request->ajax()) {
            if (!empty(auth()->user()->salesman_code)) {
                $query = BisnisParty::orderby('id', 'asc')->whereIn('salesman_code', explode(",", auth()->user()->salesman_code))->select('*');
            } else {
                $query = BisnisParty::orderby('id', 'asc')->select('*');
            }

            return DataTables::of($query)
                ->addColumn('action', function ($query) {
                    return "<input type='radio' class='input_check' name='input_check' value='{$query->code}' 
                    data-customer='{$query->name}'/>";
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function ajax_get_charge_table(Request $request)
    {
        $search = strtoupper($request->q);

        $vat = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vat = ChargeTable::orderby('id', 'asc')->limit(10)->get();
            } else {
                $vat = ChargeTable::orderby('id', 'asc')->where('code', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vat);
    }

    public function ajax_table_air_quotation(Request $request)
    {
        if ($request->ajax()) {
            $query = AirQuotationD1::with('air_quotation.quotation')->whereHas('air_quotation.quotation', function ($query) {
                $query->where('expiry_date', '>=', date('Y-m-d', strtotime(now())))
                    ->where('effective_date', '<=', date('Y-m-d', strtotime(now())));
            })->select('*');

            return DataTables::of($query)
                ->addColumn('action', function ($query) {
                    return "<input type='radio' class='input_check' name='input_check' value='{$query->id}' data-air_quotation_id='{$query->air_quotation_id}'/>";
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function ajax_search_air_quotation(Request $request)
    {
        $id = $request->id;
        $air_quotation_id = $request->air_quotation_id;

        if ($request->ajax()) {
            $query = AirQuotationD1::with('air_quotation.quotation')->whereHas('air_quotation.quotation', function ($query) {
                $query->where('expiry_date', '>=', date('Y-m-d', strtotime(now())))
                    ->where('effective_date', '<=', date('Y-m-d', strtotime(now())));
            })
                ->where('id', $id)
                ->where('air_quotation_id', $air_quotation_id)
                ->select('*')->first();
        }
        return response()->json($query);
    }

    public function ajax_table_air_customer(Request $request)
    {
        if ($request->ajax()) {
            $search = str_replace("'", "", strtoupper($_POST['search']['value']));
            $searchTerms = explode(" ",  $search);

            $array = [];
            if ($searchTerms) {
                foreach ($searchTerms as $searchTerm) {
                    $array['search'] = $searchTerm;
                }
            }

            $query = DB::table('bisnis_party as bp')
                ->select('bp.id', 'air_quotation_d1.id as air_quotation_d1_id', 'air_quotation_d1.air_quotation_id', 'bp.code', 'bp.name', 'quotations.air_quot_no', 'quotations.contact_name', 'quotations.reference_no', 'quotations.telp', 'quotations.fax', 'quotations.email', 'quotations.total_gross', 'quotations.total_volume', 'quotations.pcs', 'quotations.salesman_code', 'quotations.salesman', 'quotations.delivery_type_code', 'quotations.delivery_type', 'quotations.commodity_code', 'quotations.commodity', 'quotations.uom_code', 'quotations.uom', 'air_dept_code', 'air_dept_name', 'air_dest_code', 'air_dest_name')
                ->leftJoin('quotations', function ($join) {
                    $join->on('quotations.customer_code', '=', 'bp.code')
                        ->whereNull('sea_quot_no');
                })
                ->leftJoin('air_quotations', 'air_quotations.air_quot_no', '=', 'quotations.air_quot_no')
                ->leftJoin('air_quotation_d1', 'air_quotation_d1.air_quotation_id', '=', 'air_quotations.id')
                ->groupBy(['bp.id', 'air_quotation_d1.id', 'air_quotation_d1.air_quotation_id', 'bp.code', 'bp.name', 'quotations.air_quot_no', 'quotations.contact_name', 'quotations.reference_no', 'quotations.telp', 'quotations.fax', 'quotations.email', 'quotations.total_gross', 'quotations.total_volume', 'quotations.pcs', 'quotations.salesman_code', 'quotations.salesman', 'quotations.delivery_type_code', 'quotations.delivery_type', 'quotations.commodity_code', 'quotations.commodity', 'quotations.uom_code', 'quotations.uom', 'air_dept_code', 'air_dept_name', 'air_dest_code', 'air_dest_name']);

            if ($array['search'] != '') {
                $query->where('bp.name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('quotations.air_quot_no', 'like', "%" . $array['search'] . "%");

                $query->orWhere('air_quotation_d1.air_dept_name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('air_quotation_d1.air_dest_name', 'like', "%" . $array['search'] . "%");
            }

            return DataTables::of($query)
                ->addColumn('action', function ($query) {
                    $air_quotation_d1_id = !empty($query->air_quotation_d1_id) ? $query->air_quotation_d1_id : 0;
                    $air_quotation_id = !empty($query->air_quotation_id) ? $query->air_quotation_id : 0;
                    return "<input type='radio' class='input_check' name='input_check' value='{$query->id}' data-air_quotation_d1_id='{$air_quotation_d1_id}' data-air_quotation_id='{$air_quotation_id}'/>";
                })
                ->filter(
                    function ($query) {
                        if (request()->has('name')) {
                            $query->where('bp.name', 'like', "%" . request('name') . "%");
                        }

                        if (request()->has('air_quot_no')) {
                            $query->where('quotations.air_quot_no', 'like', "%" . request('air_quot_no') . "%");
                        }

                        if (request()->has('air_dept_name')) {
                            $query->where('air_quotation_d1.air_dept_name', 'like', "%" . request('air_dept_name') . "%");
                        }

                        if (request()->has('air_dest_name')) {
                            $query->where('air_quotation_d1.air_dest_name', 'like', "%" . request('air_dest_name') . "%");
                        }
                    }
                )
                ->smart(false)
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->toJson();
        }
    }

    public function ajax_search_air_customer(Request $request)
    {
        $id = $request->id;
        $air_quotation_id = $request->air_quotation_id;
        $air_quotation_d1_id = $request->air_quotation_d1_id;

        if ($request->ajax()) {
            $query = DB::table('bisnis_party as bp')
                ->select('bp.id', 'air_quotation_d1.id as air_quotation_d1_id', 'air_quotation_d1.air_quotation_id', 'bp.code', 'bp.name', 'quotations.air_quot_no', 'quotations.contact_name', 'quotations.reference_no', 'quotations.telp', 'quotations.fax', 'quotations.email', 'quotations.total_gross', 'quotations.total_volume', 'quotations.pcs', 'quotations.salesman_code', 'quotations.salesman', 'quotations.delivery_type_code', 'quotations.delivery_type', 'quotations.commodity_code', 'quotations.commodity', 'quotations.uom_code', 'quotations.uom', 'air_dept_code', 'air_dept_name', 'air_dest_code', 'air_dest_name')
                ->leftJoin('quotations', function ($join) {
                    $join->on('quotations.customer_code', '=', 'bp.code')
                        ->whereNull('sea_quot_no');
                })
                ->leftJoin('air_quotations', 'air_quotations.air_quot_no', '=', 'quotations.air_quot_no')
                ->leftJoin('air_quotation_d1', 'air_quotation_d1.air_quotation_id', '=', 'air_quotations.id')
                ->groupBy(['bp.id', 'air_quotation_d1.id', 'air_quotation_d1.air_quotation_id', 'bp.code', 'bp.name', 'quotations.air_quot_no', 'quotations.contact_name', 'quotations.reference_no', 'quotations.telp', 'quotations.fax', 'quotations.email', 'quotations.total_gross', 'quotations.total_volume', 'quotations.pcs', 'quotations.salesman_code', 'quotations.salesman', 'quotations.delivery_type_code', 'quotations.delivery_type', 'quotations.commodity_code', 'quotations.commodity', 'quotations.uom_code', 'quotations.uom', 'air_dept_code', 'air_dept_name', 'air_dest_code', 'air_dest_name'])
                ->where('bp.id', $id);

            if ($air_quotation_id == 0) {
                $query->whereNull('air_quotation_d1.air_quotation_id');
            } else {
                $query->where('air_quotation_d1.air_quotation_id', $air_quotation_id);
            }

            if ($air_quotation_d1_id == 0) {
                $query->whereNull('air_quotation_d1.id');
            } else {
                $query->where('air_quotation_d1.id', $air_quotation_d1_id);
            }

            $end_query = $query->first();
        }
        return response()->json($end_query);
    }

    public function ajax_table_sea_quotation(Request $request)
    {
        if ($request->ajax()) {
            $query = SeaQuotationD1::with('sea_quotation.quotation')->whereHas('sea_quotation.quotation', function ($query) {
                $query->where('expiry_date', '>=', date('Y-m-d', strtotime(now())))
                    ->where('effective_date', '<=', date('Y-m-d', strtotime(now())));
            })->select('*');

            return DataTables::of($query)
                ->addColumn('action', function ($query) {
                    return "<input type='radio' class='input_check' name='input_check' value='{$query->id}' data-sea_quotation_id='{$query->sea_quotation_id}'/>";
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function ajax_search_sea_quotation(Request $request)
    {
        $id = $request->id;
        $sea_quotation_id = $request->sea_quotation_id;

        if ($request->ajax()) {
            $query = SeaQuotationD1::with('sea_quotation.quotation')->whereHas('sea_quotation.quotation', function ($query) {
                $query->where('expiry_date', '>=', date('Y-m-d', strtotime(now())))
                    ->where('effective_date', '<=', date('Y-m-d', strtotime(now())));
            })
                ->where('id', $id)
                ->where('sea_quotation_id', $sea_quotation_id)
                ->select('*')->first();
        }
        return response()->json($query);
    }

    public function ajax_search_sea_customer(Request $request)
    {
        $id = $request->id;
        $sea_quotation_id = $request->sea_quotation_id;
        $sea_quotation_d1_id = $request->sea_quotation_d1_id;

        if ($request->ajax()) {
            $query = DB::table('bisnis_party as bp')
                ->select('bp.id', 'sea_quotation_d1.id as sea_quotation_d1_id', 'sea_quotation_d1.sea_quotation_id', 'bp.code', 'bp.name', 'quotations.sea_quot_no', 'quotations.contact_name', 'quotations.reference_no', 'quotations.telp', 'quotations.fax', 'quotations.email', 'quotations.total_gross', 'quotations.total_volume', 'quotations.pcs', 'quotations.salesman_code', 'quotations.salesman', 'quotations.delivery_type_code', 'quotations.delivery_type', 'quotations.commodity_code', 'quotations.commodity', 'quotations.uom_code', 'quotations.uom', 'port_loading_code', 'port_loading_name', 'port_discharge_code', 'port_discharge_name', 'origin_code', 'origin_name', 'dest_code', 'dest_name', 'sea_quotations.agent_code', 'sea_quotations.agent_name', 'sea_quotations.agent_address_1', 'sea_quotations.agent_address_2', 'sea_quotations.agent_address_3', 'sea_quotations.agent_address_4', 'sea_quotations.consignee_code', 'sea_quotations.consignee_name', 'sea_quotations.consignee_address_1', 'sea_quotations.consignee_address_2', 'sea_quotations.consignee_address_3', 'sea_quotations.consignee_address_4', 'sea_quotations.shipper_code', 'sea_quotations.shipper_name', 'sea_quotations.shipper_address_1', 'sea_quotations.shipper_address_2', 'sea_quotations.shipper_address_3', 'sea_quotations.shipper_address_4', 'via_port_code', 'via_port_name', 'shipping_line_code', 'shipping_line_name')
                ->leftJoin('quotations', function ($join) {
                    $join->on('quotations.customer_code', '=', 'bp.code')
                        ->whereNull('air_quot_no');
                })
                ->leftJoin('sea_quotations', 'sea_quotations.sea_quot_no', '=', 'quotations.sea_quot_no')
                ->leftJoin('sea_quotation_d1', 'sea_quotation_d1.sea_quotation_id', '=', 'sea_quotations.id')
                ->groupBy(['bp.id', 'sea_quotation_d1.id', 'sea_quotation_d1.sea_quotation_id', 'bp.code', 'bp.name', 'quotations.sea_quot_no', 'quotations.contact_name', 'quotations.reference_no', 'quotations.telp', 'quotations.fax', 'quotations.email', 'quotations.total_gross', 'quotations.total_volume', 'quotations.pcs', 'quotations.salesman_code', 'quotations.salesman', 'quotations.delivery_type_code', 'quotations.delivery_type', 'quotations.commodity_code', 'quotations.commodity', 'quotations.uom_code', 'quotations.uom', 'port_loading_code', 'port_loading_name', 'port_discharge_code', 'port_discharge_name', 'origin_code', 'origin_name', 'dest_code', 'dest_name', 'sea_quotations.agent_code', 'sea_quotations.agent_name', 'sea_quotations.agent_address_1', 'sea_quotations.agent_address_2', 'sea_quotations.agent_address_3', 'sea_quotations.agent_address_4', 'sea_quotations.consignee_code', 'sea_quotations.consignee_name', 'sea_quotations.consignee_address_1', 'sea_quotations.consignee_address_2', 'sea_quotations.consignee_address_3', 'sea_quotations.consignee_address_4', 'sea_quotations.shipper_code', 'sea_quotations.shipper_name', 'sea_quotations.shipper_address_1', 'sea_quotations.shipper_address_2', 'sea_quotations.shipper_address_3', 'sea_quotations.shipper_address_4', 'via_port_code', 'via_port_name', 'shipping_line_code', 'shipping_line_name'])
                ->where('bp.id', $id);

            if ($sea_quotation_id == 0) {
                $query->whereNull('sea_quotation_d1.sea_quotation_id');
            } else {
                $query->where('sea_quotation_d1.sea_quotation_id', $sea_quotation_id);
            }

            if ($sea_quotation_d1_id == 0) {
                $query->whereNull('sea_quotation_d1.id');
            } else {
                $query->where('sea_quotation_d1.id', $sea_quotation_d1_id);
            }

            $end_query = $query->first();
        }
        return response()->json($end_query);
    }

    public function ajax_table_sea_customer(Request $request)
    {
        if ($request->ajax()) {

            $search = str_replace("'", "", strtoupper($_POST['search']['value']));
            $searchTerms = explode(" ",  $search);

            $array = [];
            if ($searchTerms) {
                foreach ($searchTerms as $searchTerm) {
                    $array['search'] = $searchTerm;
                }
            }

            $query = DB::table('bisnis_party as bp')
                ->select('bp.id', 'sea_quotation_d1.id as sea_quotation_d1_id', 'sea_quotation_d1.sea_quotation_id', 'bp.code', 'bp.name', 'quotations.sea_quot_no', 'quotations.contact_name', 'quotations.reference_no', 'quotations.telp', 'quotations.fax', 'quotations.email', 'quotations.total_gross', 'quotations.total_volume', 'quotations.pcs', 'quotations.salesman_code', 'quotations.salesman', 'quotations.delivery_type_code', 'quotations.delivery_type', 'quotations.commodity_code', 'quotations.commodity', 'quotations.uom_code', 'quotations.uom', 'port_loading_code', 'port_loading_name', 'port_discharge_code', 'port_discharge_name', 'origin_code', 'origin_name', 'dest_code', 'dest_name')
                ->leftJoin('quotations', function ($join) {
                    $join->on('quotations.customer_code', '=', 'bp.code')
                        ->whereNull('air_quot_no');
                })
                ->leftJoin('sea_quotations', 'sea_quotations.sea_quot_no', '=', 'quotations.sea_quot_no')
                ->leftJoin('sea_quotation_d1', 'sea_quotation_d1.sea_quotation_id', '=', 'sea_quotations.id')
                ->groupBy(['bp.id', 'sea_quotation_d1.id', 'sea_quotation_d1.sea_quotation_id', 'bp.code', 'bp.name', 'quotations.sea_quot_no', 'quotations.contact_name', 'quotations.reference_no', 'quotations.telp', 'quotations.fax', 'quotations.email', 'quotations.total_gross', 'quotations.total_volume', 'quotations.pcs', 'quotations.salesman_code', 'quotations.salesman', 'quotations.delivery_type_code', 'quotations.delivery_type', 'quotations.commodity_code', 'quotations.commodity', 'quotations.uom_code', 'quotations.uom', 'port_loading_code', 'port_loading_name', 'port_discharge_code', 'port_discharge_name', 'origin_code', 'origin_name', 'dest_code', 'dest_name']);

            if ($array['search'] != '') {
                $query->where('bp.name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('quotations.sea_quot_no', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sea_quotation_d1.port_loading_name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sea_quotation_d1.port_discharge_name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sea_quotation_d1.origin_name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sea_quotation_d1.dest_name', 'like', "%" . $array['search'] . "%");
            }

            return DataTables::of($query)
                ->addColumn('action', function ($query) {
                    $sea_quotation_d1_id = !empty($query->sea_quotation_d1_id) ? $query->sea_quotation_d1_id : 0;
                    $sea_quotation_id = !empty($query->sea_quotation_id) ? $query->sea_quotation_id : 0;
                    return "<input type='radio' class='input_check' name='input_check' value='{$query->id}' data-sea_quotation_d1_id='{$sea_quotation_d1_id}' data-sea_quotation_id='{$sea_quotation_id}'/>";
                })
                ->filter(
                    function ($query) {
                        if (request()->has('name')) {
                            $query->where('bp.name', 'like', "%" . request('name') . "%");
                        }

                        if (request()->has('sea_quot_no')) {
                            $query->where('quotations.sea_quot_no', 'like', "%" . request('sea_quot_no') . "%");
                        }

                        if (request()->has('port_loading_name')) {
                            $query->where('sea_quotation_d1.port_loading_name', 'like', "%" . request('port_loading_name') . "%");
                        }

                        if (request()->has('port_discharge_name')) {
                            $query->where('sea_quotation_d1.port_discharge_name', 'like', "%" . request('port_discharge_name') . "%");
                        }

                        if (request()->has('origin_name')) {
                            $query->where('sea_quotation_d1.origin_name', 'like', "%" . request('origin_name') . "%");
                        }

                        if (request()->has('dest_name')) {
                            $query->where('sea_quotation_d1.dest_name', 'like', "%" . request('dest_name') . "%");
                        }
                    }
                )
                ->smart(false)
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->toJson();
        }
    }

    public function ajax_table_cus_ex_job(Request $request)
    {
        if ($request->ajax()) {

            $search = str_replace("'", "", strtoupper($_POST['search']['value']));
            $searchTerms = explode(" ",  $search);

            $array = [];
            if ($searchTerms) {
                foreach ($searchTerms as $searchTerm) {
                    $array['search'] = $searchTerm;
                }
            }

            $query = DB::table('bisnis_party as bp')
                ->select('sb.quotation_no', 'sb.id', 'bp.code', 'bp.name', 'sb.code as booking_no', 'sb.origin_code', 'sb.origin_name', 'sb.dest_code', 'sb.dest_name', 'sb_d1.shipper_code', 'sb_d1.shipper_name', 'sb_d1.consignee_code', 'sb_d1.consignee_name', 'sb_d1.notify_code', 'sb_d1.notify_name', 'sb_d2.port_loading_code', 'sb_d2.port_loading_name', 'sb_d2.port_discharge_code', 'sb_d2.port_discharge_name', 'sb_d2.coloader_ref_no', 'sb_d3.principle_agent_code', 'sb_d3.shippagent_code')
                ->leftJoin('sea_bookings as sb', 'sb.code_customer', '=', 'bp.code')
                ->leftJoin('sea_booking_d1 as sb_d1', 'sb_d1.sea_booking_id', '=', 'sb.id')
                ->leftJoin('sea_booking_d2 as sb_d2', 'sb_d2.sea_booking_id', '=', 'sb.id')
                ->leftJoin('sea_booking_d3 as sb_d3', 'sb_d3.sea_booking_id', '=', 'sb.id')
                ->groupBy(['sb.quotation_no', 'sb.id', 'bp.code', 'bp.name', 'sb.code', 'sb.origin_code', 'sb.origin_name', 'sb.dest_code', 'sb.dest_name', 'sb_d1.shipper_code', 'sb_d1.shipper_name', 'sb_d1.consignee_code', 'sb_d1.consignee_name', 'sb_d1.notify_code', 'sb_d1.notify_name', 'sb_d2.port_loading_code', 'sb_d2.port_loading_name', 'sb_d2.port_discharge_code', 'sb_d2.port_discharge_name', 'sb_d2.coloader_ref_no', 'sb_d3.principle_agent_code', 'sb_d3.shippagent_code']);

            if ($array['search'] != '') {
                $query->where('bp.name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sb.code', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sb_d2.port_loading_name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sb_d2.port_discharge_name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sb.origin_name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sb.dest_name', 'like', "%" . $array['search'] . "%");
            }

            return DataTables::of($query)
                ->addColumn('action', function ($query) {
                    $cus_code = !empty($query->code) ? $query->code : "";
                    $quotation_no = !empty($query->quotation_no) ? $query->quotation_no : 0;
                    $booking_no = !empty($query->booking_no) ? $query->booking_no : 0;
                    $id = !empty($query->id) ? $query->id : 0;
                    return "<input type='radio' class='input_check' name='input_check' value='{$cus_code}' data-id='{$id}' 
                    data-quotation_no='{$quotation_no}' data-booking_no='{$booking_no}'/>";
                })
                ->filter(
                    function ($query) {
                        if (request()->has('name')) {
                            $query->where('bp.name', 'like', "%" . request('name') . "%");
                        }

                        if (request()->has('code')) {
                            $query->where('sb.code', 'like', "%" . request('code') . "%");
                        }

                        if (request()->has('port_loading_name')) {
                            $query->where('sb_d2.port_loading_name', 'like', "%" . request('port_loading_name') . "%");
                        }

                        if (request()->has('port_discharge_name')) {
                            $query->where('sb_d2.port_discharge_name', 'like', "%" . request('port_discharge_name') . "%");
                        }

                        if (request()->has('origin_name')) {
                            $query->where('sb.origin_name', 'like', "%" . request('origin_name') . "%");
                        }

                        if (request()->has('dest_name')) {
                            $query->where('sb.dest_name', 'like', "%" . request('dest_name') . "%");
                        }
                    }
                )
                ->smart(false)
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->toJson();
        }
    }

    public function ajax_search_cus_ex_job(Request $request)
    {
        $code = $request->code;
        $booking_no = $request->booking_no;

        if ($request->ajax()) {
            $query = DB::table('bisnis_party as bp')
                ->select('sb.id', 'bp.code', 'bp.name', 'sb.code as booking_no', 'sb.booking_date', 'sb.salesman_code', 'sb.salesman', 'sb.delivery_type_code', 'sb.delivery_type', 'sb.commodity_code', 'sb.commodity', 'sb.origin_code', 'sb.origin_name', 'sb.dest_code', 'sb.dest_name', 'sb_d1.shipper_code', 'sb_d1.shipper_name', 'sb_d1.shipper_address_1', 'sb_d1.shipper_address_2', 'sb_d1.shipper_address_3', 'sb_d1.shipper_address_4', 'sb_d1.consignee_code', 'sb_d1.consignee_name', 'sb_d1.consignee_address_1', 'sb_d1.consignee_address_2', 'sb_d1.consignee_address_3', 'sb_d1.consignee_address_4', 'sb_d1.notify_code', 'sb_d1.notify_name', 'sb_d1.notify_address_1', 'sb_d1.notify_address_2', 'sb_d1.notify_address_3', 'sb_d1.notify_address_4', 'sb_d2.eta_sub', 'sb_d2.etd_date', 'sb.etd', 'sb_d2.first_via_ata', 'sb_d2.first_via_eta', 'sb_d2.first_via_etd', 'sb_d2.eta', 'sb_d2.dest_eta_date', 'sb_d2.close_date_time', 'sb_d2.place_of_receipt', 'sb_d2.port_loading_code', 'sb_d2.port_loading_name', 'sb_d2.port_discharge_code', 'sb_d2.port_discharge_name', 'sb_d2.via_port_code', 'sb_d2.via_port_name', 'sb_d2.terminal', 'sb_d2.place_of_delivery', 'sb_d2.vessel_code', 'sb_d2.vessel_name', 'sb_d2.voyage_no', 'sb_d2.mother_vessel_name', 'sb_d2.mother_voyage', 'sb_d2.shippline_code', 'sb_d2.shippline_name', 'sb_d2.shippline_ref_no', 'sb_d2.shipmode', 'sb_d2.coloader_code', 'sb_d2.coloader_name', 'sb_d2.coloader_ref_no', 'sb_d3.principle_agent_code', 'sb_d3.shippagent_code', 'sb_d3.stuff_agent_code', 'sb_d3.stuff_agent_name', 'sb_d3.stuff_agent_address_1', 'sb_d3.stuff_agent_address_2', 'sb_d3.stuff_agent_address_3', 'sb_d3.stuff_agent_address_4', 'sb_d3.stuff_agent_contact_name', 'sb_d3.stuff as stuff_date', 'sb_d3.yard_code', 'sb_d3.yard_name', 'sb_d3.yard_address_1', 'sb_d3.yard_address_2', 'sb_d3.yard_address_3', 'sb_d3.yard_address_4', 'sb_d3.depot_code', 'sb_d3.depot_name', 'sb_d3.depot_address_1', 'sb_d3.depot_address_2', 'sb_d3.depot_address_3', 'sb_d3.depot_address_4')
                ->leftJoin('sea_bookings as sb', 'sb.code_customer', '=', 'bp.code')
                ->leftJoin('sea_booking_d1 as sb_d1', 'sb_d1.sea_booking_id', '=', 'sb.id')
                ->leftJoin('sea_booking_d2 as sb_d2', 'sb_d2.sea_booking_id', '=', 'sb.id')
                ->leftJoin('sea_booking_d3 as sb_d3', 'sb_d3.sea_booking_id', '=', 'sb.id')
                ->groupBy(['sb.id', 'bp.code', 'bp.name', 'sb.code', 'sb.booking_date', 'sb.salesman_code', 'sb.salesman', 'sb.delivery_type_code', 'sb.delivery_type', 'sb.commodity_code', 'sb.commodity', 'sb.origin_code', 'sb.origin_name', 'sb.dest_code', 'sb.dest_name', 'sb_d1.shipper_code', 'sb_d1.shipper_name', 'sb_d1.shipper_address_1', 'sb_d1.shipper_address_2', 'sb_d1.shipper_address_3', 'sb_d1.shipper_address_4', 'sb_d1.consignee_code', 'sb_d1.consignee_name', 'sb_d1.consignee_address_1', 'sb_d1.consignee_address_2', 'sb_d1.consignee_address_3', 'sb_d1.consignee_address_4', 'sb_d1.notify_code', 'sb_d1.notify_name', 'sb_d1.notify_address_1', 'sb_d1.notify_address_2', 'sb_d1.notify_address_3', 'sb_d1.notify_address_4', 'sb_d2.eta_sub', 'sb_d2.etd_date', 'sb_d2.first_via_ata', 'sb_d2.first_via_eta', 'sb_d2.first_via_etd', 'sb.etd', 'sb_d2.eta', 'sb_d2.dest_eta_date', 'sb_d2.close_date_time', 'sb_d2.place_of_receipt', 'sb_d2.port_loading_code', 'sb_d2.port_loading_name', 'sb_d2.port_discharge_code', 'sb_d2.port_discharge_name', 'sb_d2.via_port_code', 'sb_d2.via_port_name', 'sb_d2.terminal', 'sb_d2.place_of_delivery', 'sb_d2.vessel_code', 'sb_d2.vessel_name', 'sb_d2.voyage_no', 'sb_d2.mother_vessel_name', 'sb_d2.mother_voyage', 'sb_d2.shippline_code', 'sb_d2.shippline_name', 'sb_d2.shippline_ref_no', 'sb_d2.shipmode', 'sb_d2.coloader_code', 'sb_d2.coloader_name', 'sb_d2.coloader_ref_no', 'sb_d3.principle_agent_code', 'sb_d3.shippagent_code', 'sb_d3.stuff_agent_code', 'sb_d3.stuff_agent_name', 'sb_d3.stuff_agent_address_1', 'sb_d3.stuff_agent_address_2', 'sb_d3.stuff_agent_address_3', 'sb_d3.stuff_agent_address_4', 'sb_d3.stuff_agent_contact_name', 'sb_d3.stuff', 'sb_d3.yard_code', 'sb_d3.yard_name', 'sb_d3.yard_address_1', 'sb_d3.yard_address_2', 'sb_d3.yard_address_3', 'sb_d3.yard_address_4', 'sb_d3.depot_code', 'sb_d3.depot_name', 'sb_d3.depot_address_1', 'sb_d3.depot_address_2', 'sb_d3.depot_address_3', 'sb_d3.depot_address_4'])
                ->where('bp.code', $code);
            // ->where('sb.code', $booking_no)

            $end_query = $query->first();
        }
        return response()->json($end_query);
    }

    public function ajax_table_booking_ex_job_sea(Request $request)
    {
        if ($request->ajax()) {

            $search = str_replace("'", "", strtoupper($_POST['search']['value']));
            $searchTerms = explode(" ",  $search);

            $array = [];
            if ($searchTerms) {
                foreach ($searchTerms as $searchTerm) {
                    $array['search'] = $searchTerm;
                }
            }

            $query = DB::table('sea_bookings as sb')
                ->select('sb.quotation_no', 'sb.id', 'sb.code as booking_no', 'sb.code_customer', 'sb.customer', 'sb.booking_date', 'sb.salesman_code', 'sb.salesman', 'sb.etd', 'sb.origin_code', 'sb.origin_name', 'sb.dest_code', 'sb.dest_name', 'sb_d1.shipper_code', 'sb_d1.shipper_name', 'sb_d1.consignee_code', 'sb_d1.consignee_name', 'sb_d1.notify_code', 'sb_d1.notify_name', 'sb_d2.port_loading_code', 'sb_d2.port_loading_name', 'sb_d2.port_discharge_code', 'sb_d2.port_discharge_name', 'sb_d3.stuff_agent_name', 'sb_d3.yard_code', 'sb_d3.yard_name')
                ->leftJoin('sea_booking_d1 as sb_d1', 'sb_d1.sea_booking_id', '=', 'sb.id')
                ->leftJoin('sea_booking_d2 as sb_d2', 'sb_d2.sea_booking_id', '=', 'sb.id')
                ->leftJoin('sea_booking_d3 as sb_d3', 'sb_d3.sea_booking_id', '=', 'sb.id')
                ->groupBy(['sb.quotation_no', 'sb.id', 'sb.code', 'sb.code_customer', 'sb.customer', 'sb.booking_date', 'sb.salesman_code', 'sb.salesman', 'sb.etd', 'sb.origin_code', 'sb.origin_name', 'sb.dest_code', 'sb.dest_name', 'sb_d1.shipper_code', 'sb_d1.shipper_name', 'sb_d1.consignee_code', 'sb_d1.consignee_name', 'sb_d1.notify_code', 'sb_d1.notify_name', 'sb_d2.port_loading_code', 'sb_d2.port_loading_name', 'sb_d2.port_discharge_code', 'sb_d2.port_discharge_name', 'sb_d3.stuff_agent_name', 'sb_d3.yard_code', 'sb_d3.yard_name']);

            if ($array['search'] != '') {
                $query->where('sb.code', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sb.customer', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sb_d2.port_loading_name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sb_d2.port_discharge_name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sb.origin_name', 'like', "%" . $array['search'] . "%");

                $query->orWhere('sb.dest_name', 'like', "%" . $array['search'] . "%");
            }

            return DataTables::of($query)
                ->addColumn('action', function ($query) {
                    $cus_code = !empty($query->code_customer) ? $query->code_customer : "";
                    $quotation_no = !empty($query->quotation_no) ? $query->quotation_no : "";
                    $booking_no = !empty($query->booking_no) ? $query->booking_no : 0;
                    $id = !empty($query->id) ? $query->id : 0;
                    return "<input type='radio' class='input_check' name='input_check' value='{$booking_no}' data-quotation_no='{$quotation_no}' data-id='{$id}' data-cus_code='{$cus_code}'/>";
                })
                ->filter(
                    function ($query) {
                        if (request()->has('customer')) {
                            $query->where('sb.customer', 'like', "%" . request('customer') . "%");
                        }

                        if (request()->has('code')) {
                            $query->where('sb.code', 'like', "%" . request('code') . "%");
                        }

                        if (request()->has('port_loading_name')) {
                            $query->where('sb_d2.port_loading_name', 'like', "%" . request('port_loading_name') . "%");
                        }

                        if (request()->has('port_discharge_name')) {
                            $query->where('sb_d2.port_discharge_name', 'like', "%" . request('port_discharge_name') . "%");
                        }

                        if (request()->has('origin_name')) {
                            $query->where('sb.origin_name', 'like', "%" . request('origin_name') . "%");
                        }

                        if (request()->has('dest_name')) {
                            $query->where('sb.dest_name', 'like', "%" . request('dest_name') . "%");
                        }
                    }
                )
                ->smart(false)
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->toJson();
        }
    }

    public function ajax_search_booking_ex_job_sea(Request $request)
    {
        $code = $request->code;
        $booking_no = $request->booking_no;

        if ($request->ajax()) {
            $query = DB::table('sea_bookings as sb')
                ->select('sb.id', 'sb.code as booking_no', 'sb.code_customer', 'sb.customer', 'sb.booking_date', 'sb.salesman_code', 'sb.salesman', 'sb.etd', 'sb.delivery_type_code', 'sb.delivery_type', 'sb.commodity_code', 'sb.commodity', 'sb.origin_code', 'sb.origin_name', 'sb.dest_code', 'sb.dest_name', 'sb_d1.shipper_code', 'sb_d1.shipper_name', 'sb_d1.shipper_address_1', 'sb_d1.shipper_address_2', 'sb_d1.shipper_address_3', 'sb_d1.shipper_address_4', 'sb_d1.consignee_code', 'sb_d1.consignee_name', 'sb_d1.consignee_address_1', 'sb_d1.consignee_address_2', 'sb_d1.consignee_address_3', 'sb_d1.consignee_address_4', 'sb_d1.notify_code', 'sb_d1.notify_name', 'sb_d1.notify_address_1', 'sb_d1.notify_address_2', 'sb_d1.notify_address_3', 'sb_d1.notify_address_4', 'sb_d2.eta_sub', 'sb_d2.etd_date', 'sb_d2.first_via_ata', 'sb_d2.first_via_eta', 'sb_d2.first_via_etd', 'sb_d2.eta', 'sb_d2.dest_eta_date', 'sb_d2.close_date_time', 'sb_d2.place_of_receipt', 'sb_d2.port_loading_code', 'sb_d2.port_loading_name', 'sb_d2.port_discharge_code', 'sb_d2.port_discharge_name', 'sb_d2.via_port_code', 'sb_d2.via_port_name', 'sb_d2.terminal', 'sb_d2.place_of_delivery', 'sb_d2.vessel_code', 'sb_d2.vessel_name', 'sb_d2.voyage_no', 'sb_d2.mother_vessel_name', 'sb_d2.mother_voyage', 'sb_d2.shippline_code', 'sb_d2.shippline_name', 'sb_d2.shippline_ref_no', 'sb_d2.shipmode', 'sb_d2.coloader_code', 'sb_d2.coloader_name', 'sb_d2.coloader_ref_no', 'sb_d3.principle_agent_code', 'sb_d3.shippagent_code', 'sb_d3.stuff_agent_code', 'sb_d3.stuff_agent_name', 'sb_d3.stuff_agent_address_1', 'sb_d3.stuff_agent_address_2', 'sb_d3.stuff_agent_address_3', 'sb_d3.stuff_agent_address_4', 'sb_d3.stuff_agent_contact_name', 'sb_d3.stuff as stuff_date', 'sb_d3.yard_code', 'sb_d3.yard_name', 'sb_d3.yard_address_1', 'sb_d3.yard_address_2', 'sb_d3.yard_address_3', 'sb_d3.yard_address_4', 'sb_d3.depot_code', 'sb_d3.depot_name', 'sb_d3.depot_address_1', 'sb_d3.depot_address_2', 'sb_d3.depot_address_3', 'sb_d3.depot_address_4')
                ->leftJoin('sea_booking_d1 as sb_d1', 'sb_d1.sea_booking_id', '=', 'sb.id')
                ->leftJoin('sea_booking_d2 as sb_d2', 'sb_d2.sea_booking_id', '=', 'sb.id')
                ->leftJoin('sea_booking_d3 as sb_d3', 'sb_d3.sea_booking_id', '=', 'sb.id')
                ->groupBy(['sb.id', 'sb.code', 'sb.code_customer', 'sb.customer', 'sb.booking_date', 'sb.salesman_code', 'sb.salesman', 'sb.etd', 'sb.delivery_type_code', 'sb.delivery_type', 'sb.commodity_code', 'sb.commodity', 'sb.origin_code', 'sb.origin_name', 'sb.dest_code', 'sb.dest_name', 'sb_d1.shipper_code', 'sb_d1.shipper_name', 'sb_d1.shipper_address_1', 'sb_d1.shipper_address_2', 'sb_d1.shipper_address_3', 'sb_d1.shipper_address_4', 'sb_d1.consignee_code', 'sb_d1.consignee_name', 'sb_d1.consignee_address_1', 'sb_d1.consignee_address_2', 'sb_d1.consignee_address_3', 'sb_d1.consignee_address_4', 'sb_d1.notify_code', 'sb_d1.notify_name', 'sb_d1.notify_address_1', 'sb_d1.notify_address_2', 'sb_d1.notify_address_3', 'sb_d1.notify_address_4', 'sb_d2.eta_sub', 'sb_d2.etd_date', 'sb_d2.first_via_ata', 'sb_d2.first_via_eta', 'sb_d2.first_via_etd', 'sb_d2.eta', 'sb_d2.dest_eta_date', 'sb_d2.close_date_time', 'sb_d2.place_of_receipt', 'sb_d2.port_loading_code', 'sb_d2.port_loading_name', 'sb_d2.port_discharge_code', 'sb_d2.port_discharge_name', 'sb_d2.via_port_code', 'sb_d2.via_port_name', 'sb_d2.terminal', 'sb_d2.place_of_delivery', 'sb_d2.vessel_code', 'sb_d2.vessel_name', 'sb_d2.voyage_no', 'sb_d2.mother_vessel_name', 'sb_d2.mother_voyage', 'sb_d2.shippline_code', 'sb_d2.shippline_name', 'sb_d2.shippline_ref_no', 'sb_d2.shipmode', 'sb_d2.coloader_code', 'sb_d2.coloader_name', 'sb_d2.coloader_ref_no', 'sb_d3.principle_agent_code', 'sb_d3.shippagent_code', 'sb_d3.stuff_agent_code', 'sb_d3.stuff_agent_name', 'sb_d3.stuff_agent_address_1', 'sb_d3.stuff_agent_address_2', 'sb_d3.stuff_agent_address_3', 'sb_d3.stuff_agent_address_4', 'sb_d3.stuff_agent_contact_name', 'sb_d3.stuff', 'sb_d3.yard_code', 'sb_d3.yard_name', 'sb_d3.yard_address_1', 'sb_d3.yard_address_2', 'sb_d3.yard_address_3', 'sb_d3.yard_address_4', 'sb_d3.depot_code', 'sb_d3.depot_name', 'sb_d3.depot_address_1', 'sb_d3.depot_address_2', 'sb_d3.depot_address_3', 'sb_d3.depot_address_4'])

                ->where('sb.code', $booking_no);

            $end_query = $query->first();
        }
        return response()->json($end_query);
    }

    public function ajax_table_booking_ex_job_air(Request $request)
    {
        if ($request->ajax()) {
            $query = AirBooking::with(['air_book_d1', 'quot'])->orderBy('id', 'DESC')->select('*');

            return DataTables::of($query)
                ->addColumn('action', function ($query) {
                    $cus_code = !empty($query->quot->code_customer) ? $query->quot->code_customer : "";
                    $quotation_no = !empty($query->quotation_no) ? $query->quotation_no : 0;
                    $booking_no = !empty($query->code) ? $query->code : 0;
                    $id = !empty($query->id) ? $query->id : 0;
                    return "<input type='radio' class='input_check' name='input_check' value='{$booking_no}' data-quotation_no='{$quotation_no}' data-id='{$id}' data-cus_code='{$cus_code}'/>";
                })
                ->smart(false)
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->toJson();
        }
    }

    public function ajax_search_booking_ex_job_air(Request $request)
    {
        $booking_no = $request->booking_no;

        if ($request->ajax()) {
            $query = AirBooking::with(['air_book_d1', 'quot'])->orderBy('id', 'DESC')->where('code', $booking_no);

            $end_query = $query->first();
        }
        return response()->json($end_query);
    }

    public function ajax_table_cus_im_job_air(Request $request)
    {
        if ($request->ajax()) {
            $query = BisnisParty::with(['quotation'])->orderBy('id', 'DESC')->select('*');

            return DataTables::of($query)
                ->addColumn('action', function ($query) {
                    $cus_code = !empty($query->code) ? $query->code : "";
                    $quotation_no = !empty($query->ab->quotation_no) ? $query->ab->quotation_no : 0;
                    $booking_no = !empty($query->ab->code) ? $query->ab->code : 0;
                    $id = !empty($query->id) ? $query->id : 0;
                    return "<input type='radio' class='input_check' name='input_check' value='{$booking_no}' data-quotation_no='{$quotation_no}' data-id='{$id}' data-cus_code='{$cus_code}'/>";
                })
                ->smart(false)
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->toJson();
        }
    }
    public function ajax_table_cus_ex_job_air(Request $request)
    {
        if ($request->ajax()) {
            $query = BisnisParty::with(['ab.air_book_d1'])->orderBy('id', 'DESC')->select('*');

            return DataTables::of($query)
                ->addColumn('action', function ($query) {
                    $cus_code = !empty($query->code) ? $query->code : "";
                    $quotation_no = !empty($query->ab->quotation_no) ? $query->ab->quotation_no : 0;
                    $booking_no = !empty($query->ab->code) ? $query->ab->code : 0;
                    $id = !empty($query->id) ? $query->id : 0;
                    return "<input type='radio' class='input_check' name='input_check' value='{$booking_no}' data-quotation_no='{$quotation_no}' data-id='{$id}' data-cus_code='{$cus_code}'/>";
                })
                ->smart(false)
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->toJson();
        }
    }

    public function ajax_search_cus_ex_job_air(Request $request)
    {
        $code = $request->code;
        if ($request->ajax()) {
            $query = BisnisParty::with(['ab.air_book_d1'])->orderBy('id', 'DESC')->where('code', $code);

            $end_query = $query->first();
        }
        return response()->json($end_query);
    }

    public function ajax_get_cargo_info(Request $request)
    {
        $id = $request->id;
        if ($request->ajax()) {
            $query = SeaBookingD6::where('sea_booking_id', $id)->get();
        }
        return response()->json($query);
    }

    public function ajax_get_jc_from_quot_sea(Request $request)
    {
        $quotation_no = $request->quotation_no;
        $data = "";
        if ($request->ajax()) {
            $query = SeaQuotation::with(['sqd2', 'sqsd1'])->where('sea_quot_no', $quotation_no)->first()->toArray();
            $data = array_merge_recursive($query['sqsd1'], $query['sqd2']);
        }
        return response()->json($data);
    }

    public function ajax_get_jc_from_quot_air(Request $request)
    {
        $quotation_no = $request->quotation_no;
        $data = "";
        if ($request->ajax()) {
            $query = AirQuotation::with(['aqd2', 'aqsd2'])->where('air_quot_no', $quotation_no)->first()->toArray();
            $data = array_merge_recursive($query['aqd2'], $query['aqsd2']);
        }
        return response()->json($data);
    }

    public function ajax_store_short(Request $request)
    {
        DB::beginTransaction();
        try {
            $customer = new Customer();
            $customer->code = $request->auto_generate === '1' ? $this->custom_code(strtoupper(substr($request->name, 0, 1))) : $request->code;
            $customer->name = $request->name;
            $customer->customer_type_id = $request->customer_type_id;
            $customer->acc_code = $request->acc_code;
            $customer->acc_desc = $request->acc_desc;
            $customer->currency_id = $request->currency_id;
            $customer->payment_term_id = $request->payment_term_id;
            $customer->credit_limit =  ($request->credit_limit != null) ? str_replace(",", "", $request->credit_limit) : 0;
            $customer->save();

            DB::commit();
            $data = [
                'status' => true,
                'msg'   => 'Success'
            ];
        } catch (\Throwable $th) {
            DB::rollback();

            $data = [
                'status' => false,
                'msg'   => $th->getMessage()
            ];
        }
        return response()->json($data);
    }
}
