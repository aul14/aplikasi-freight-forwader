<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\BisnisParty;
use App\Models\Uom;
use App\Models\City;
use App\Models\Port;
use App\Models\Module;
use App\Models\Vendor;
use App\Models\WtCode;
use App\Models\Country;
use App\Models\JobType;
use App\Models\VatCode;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Salesman;
use App\Models\ChargeCode;
use App\Models\ChargeTable;
use App\Models\Commodity;
use App\Models\Container;
use App\Models\CurrencyDetailSatu;
use App\Models\VendorType;
use App\Models\PaymentTerm;
use App\Models\CustomerType;
use App\Models\DeliveryType;
use App\Models\QuotationType;
use App\Models\ShippingLine;
use Illuminate\Http\Request;
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

        $vat = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vat = Customer::orderby('id', 'asc')->select('id', 'code', 'name')->limit(10)->get();
            } else {
                $vat = Customer::orderby('id', 'asc')->select('id', 'code', 'name')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vat);
    }

    public function ajax_get_salesman(Request $request)
    {
        $search = strtoupper($request->q);

        $vat = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vat = Salesman::orderby('id', 'asc')->select('id', 'code', 'name')->limit(10)->get();
            } else {
                $vat = Salesman::orderby('id', 'asc')->select('id', 'code', 'name')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vat);
    }

    public function ajax_get_vendor(Request $request)
    {
        $search = strtoupper($request->q);

        $vat = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vat = Vendor::orderby('id', 'asc')->select('id', 'code', 'name')->limit(10)->get();
            } else {
                $vat = Vendor::orderby('id', 'asc')->select('id', 'code', 'name')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vat);
    }

    public function ajax_get_shipline(Request $request)
    {
        $search = strtoupper($request->q);

        $vat = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vat = ShippingLine::orderby('id', 'asc')->select('id', 'code', 'name')->limit(10)->get();
            } else {
                $vat = ShippingLine::orderby('id', 'asc')->select('id', 'code', 'name')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vat);
    }

    public function ajax_get_payment_term(Request $request)
    {
        $search = strtoupper($request->q);

        $vat = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vat = PaymentTerm::orderby('id', 'asc')->select('id', 'code', 'description')->limit(10)->get();
            } else {
                $vat = PaymentTerm::orderby('id', 'asc')->select('id', 'code', 'description')->where('code', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vat);
    }

    public function ajax_get_cus_type(Request $request)
    {
        $search = strtoupper($request->q);

        $vat = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vat = CustomerType::orderby('id', 'asc')->select('id', 'type', 'type_name')->limit(10)->get();
            } else {
                $vat = CustomerType::orderby('id', 'asc')->select('id', 'type', 'type_name')->where('type', 'like', "%$search%")->orWhere('type_name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vat);
    }

    public function ajax_get_bisnis_party(Request $request)
    {
        $search = strtoupper($request->q);

        $vat = [];
        if ($request->ajax()) {
            if ($search == '') {
                $vat = BisnisParty::orderby('id', 'asc')->limit(10)->get();
            } else {
                $vat = BisnisParty::orderby('id', 'asc')->where('code', 'like', "%$search%")->orWhere('name', 'like', "%$search%")->limit(10)->get();
            }
        }

        return response()->json($vat);
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
