<?php

namespace App\Http\Controllers;

use CodeNumbering;
use App\Models\History;
use App\Models\JobType;
use App\Models\Quotation;
use App\Models\SeaBooking;
use App\Models\BisnisParty;
use App\Models\SeaBookingD1;
use App\Models\SeaBookingD2;
use App\Models\SeaBookingD3;
use App\Models\SeaBookingD4;
use App\Models\SeaBookingD5;
use App\Models\SeaBookingD6;
use App\Models\SeaQuotation;
use Illuminate\Http\Request;
use App\Models\SeaQuotationD1;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class SeaExportBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-sea_book')) {
            if ($request->ajax()) {
                if (auth()->user()->is_mng_sales == true || auth()->user()->is_sales == true) {
                    $sea_book = SeaBooking::with(['sea_book_d1', 'sea_book_d2'])->where('salesman_code', explode(",", auth()->user()->salesman_code))->orderBy('id', 'DESC')->select('*');
                } else {
                    $sea_book = SeaBooking::with(['sea_book_d1', 'sea_book_d2'])->orderBy('id', 'DESC')->select('*');
                }
                return DataTables::of($sea_book)
                    ->addColumn('action', function ($sea_book) {
                        return view('datatable-modal._action', [
                            'row_id' => $sea_book->id,
                            'edit_url' => route('sea_book.edit', $sea_book->id),
                            'delete_url' => route('sea_book.destroy', $sea_book->id),
                            'can_edit' => 'edit-sea_book',
                            'can_delete' => 'delete-sea_book'
                        ]);
                    })
                    ->editColumn('updated_at', function ($sea_book) {
                        return !empty($sea_book->updated_at) ? date("d-m-Y H:i", strtotime($sea_book->updated_at)) : "-";
                    })
                    ->editColumn('booking_date', function ($sea_book) {
                        return !empty($sea_book->booking_date) ? date("d-m-Y H:i", strtotime($sea_book->booking_date)) : "-";
                    })
                    ->editColumn('etd', function ($sea_book) {
                        return !empty($sea_book->etd) ? date("d-m-Y", strtotime($sea_book->etd)) : "-";
                    })
                    ->editColumn('eta', function ($sea_book) {
                        return !empty($sea_book->sea_book_d2->eta) ? date("d-m-Y", strtotime($sea_book->sea_book_d2->eta)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action', 'booking_date', 'etd', 'eta'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Sea Export Booking')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Sea Export Booking')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Sea Export Booking',
                    'url_menu'  => route('sea_book.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Sea Export Booking',
                    'url_menu'  => route('sea_book.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('trx.sea_book.index');
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasPermission('create-sea_book')) {
            $job_type = JobType::where('description', 'like', '%EXPORT%')->get();

            return view('trx.sea_book.create', compact('job_type'));
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasPermission('create-sea_book')) {
            $request->validate(
                [
                    'code'    => 'required|max:20|unique:sea_bookings,code',
                    'cargo_type'  => 'required',
                    'etd'  => 'required',
                    'dest_code'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $sea_book = new SeaBooking();
                $code = CodeNumbering::custom_code('34', $sea_book, 'code');

                $sea_book->code = $code;
                $sea_book->cargo_type = !empty($request->cargo_type) ? $request->cargo_type : null;
                $sea_book->quotation_no = !empty($request->quotation_no) ? $request->quotation_no : null;
                $sea_book->job_no = !empty($request->job_no) ? $request->job_no : null;
                $sea_book->job_type = !empty($request->job_type) ? $request->job_type : null;
                $sea_book->import_job_no = !empty($request->import_job_no) ? $request->import_job_no : null;
                $sea_book->booking_date = !empty($request->booking_date) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->booking_date)))  : null;
                $sea_book->job_date = !empty($request->job_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->job_date)))  : null;
                $sea_book->bl_no = !empty($request->bl_no) ? $request->bl_no : null;
                $sea_book->nomination_cargo = $request->nomination_cargo == "yes" ? true : false;
                $sea_book->railing = $request->railing == "yes" ? true : false;
                $sea_book->refeer_container = $request->refeer_container == "yes" ? true : false;
                $sea_book->code_customer = !empty($request->code_customer) ? $request->code_customer : null;
                $sea_book->customer = !empty($request->customer) ? $request->customer : null;
                $sea_book->reference_no = !empty($request->reference_no) ? $request->reference_no : null;
                $sea_book->contact_name = !empty($request->contact_name) ? $request->contact_name : null;
                $sea_book->telp = !empty($request->telp) ? $request->telp : null;
                $sea_book->fax = !empty($request->fax) ? $request->fax : null;
                $sea_book->email = !empty($request->email) ? $request->email : null;
                $sea_book->jml_container_type_1 = !empty($request->jml_container_type_1) ? $request->jml_container_type_1 : null;
                $sea_book->container_type_1 = !empty($request->container_type_1) ? $request->container_type_1 : null;
                $sea_book->jml_container_type_2 = !empty($request->jml_container_type_2) ? $request->jml_container_type_2 : null;
                $sea_book->container_type_2 = !empty($request->container_type_2) ? $request->container_type_2 : null;
                $sea_book->jml_container_type_3 = !empty($request->jml_container_type_3) ? $request->jml_container_type_3 : null;
                $sea_book->container_type_3 = !empty($request->container_type_3) ? $request->container_type_3 : null;
                $sea_book->jml_container_type_4 = !empty($request->jml_container_type_4) ? $request->jml_container_type_4 : null;
                $sea_book->container_type_4 = !empty($request->container_type_4) ? $request->container_type_4 : null;
                $sea_book->etd = !empty($request->etd) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->etd)))  : null;
                $sea_book->dest_eta = !empty($request->dest_eta) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->dest_eta)))  : null;
                $sea_book->cargo_class = !empty($request->cargo_class) ? $request->cargo_class : null;
                $sea_book->salesman_code = !empty($request->salesman_code) ? $request->salesman_code : null;
                $sea_book->salesman = !empty($request->salesman) ? $request->salesman : null;
                $sea_book->origin_code = !empty($request->origin_code) ? $request->origin_code : null;
                $sea_book->origin_name = !empty($request->origin_name) ? $request->origin_name : null;
                $sea_book->dest_code = !empty($request->dest_code) ? $request->dest_code : null;
                $sea_book->dest_name = !empty($request->dest_name) ? $request->dest_name : null;
                $sea_book->country_code = !empty($request->country_code) ? $request->country_code : null;
                $sea_book->country_name = !empty($request->country_name) ? $request->country_name : null;
                $sea_book->country_origin = !empty($request->country_origin) ? $request->country_origin : null;
                $sea_book->dg_cargo = $request->dg_cargo == "yes" ? true : false;
                $sea_book->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $sea_book->delivery_type = !empty($request->delivery_type) ? $request->delivery_type : null;
                $sea_book->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $sea_book->commodity = !empty($request->commodity) ? $request->commodity : null;
                $sea_book->total_pcs = !empty($request->total_pcs) ?  $request->total_pcs : null;
                $sea_book->uom_code = !empty($request->uom_code) ? $request->uom_code : null;
                $sea_book->uom = !empty($request->uom) ? $request->uom : null;
                $sea_book->total_gross = !empty($request->total_gross) ? str_replace(",", "", $request->total_gross) : null;
                $sea_book->total_volume = !empty($request->total_volume) ? str_replace(",", "", $request->total_volume) : null;
                $sea_book->footer_1 = !empty($request->footer_1) ? $request->footer_1 : null;
                $sea_book->footer_2 = !empty($request->footer_2) ? $request->footer_2 : null;
                $sea_book->footer_3 = !empty($request->footer_3) ? $request->footer_3 : null;
                $sea_book->footer_4 = !empty($request->footer_4) ? $request->footer_4 : null;
                $sea_book->footer_5 = !empty($request->footer_5) ? $request->footer_5 : null;
                $sea_book->footer_6 = !empty($request->footer_6) ? $request->footer_6 : null;
                $sea_book->save();

                $sea_d1 = new SeaBookingD1();
                $sea_d1->sea_booking_id = $sea_book->id;
                $sea_d1->agent_code = !empty($request->agent_code) ? $request->agent_code : null;
                $sea_d1->agent_name = !empty($request->agent_name) ? $request->agent_name : null;
                $sea_d1->agent_address_1 = !empty($request->agent_address_1) ? $request->agent_address_1 : null;
                $sea_d1->agent_address_2 = !empty($request->agent_address_2) ? $request->agent_address_2 : null;
                $sea_d1->agent_address_3 = !empty($request->agent_address_3) ? $request->agent_address_3 : null;
                $sea_d1->agent_address_4 = !empty($request->agent_address_4) ? $request->agent_address_4 : null;
                $sea_d1->shipper_code = !empty($request->shipper_code) ? $request->shipper_code : null;
                $sea_d1->shipper_name = !empty($request->shipper_name) ? $request->shipper_name : null;
                $sea_d1->shipper_address_1 = !empty($request->shipper_address_1) ? $request->shipper_address_1 : null;
                $sea_d1->shipper_address_2 = !empty($request->shipper_address_2) ? $request->shipper_address_2 : null;
                $sea_d1->shipper_address_3 = !empty($request->shipper_address_3) ? $request->shipper_address_3 : null;
                $sea_d1->shipper_address_4 = !empty($request->shipper_address_4) ? $request->shipper_address_4 : null;
                $sea_d1->consignee_code = !empty($request->consignee_code) ? $request->consignee_code : null;
                $sea_d1->consignee_name = !empty($request->consignee_name) ? $request->consignee_name : null;
                $sea_d1->consignee_address_1 = !empty($request->consignee_address_1) ? $request->consignee_address_1 : null;
                $sea_d1->consignee_address_2 = !empty($request->consignee_address_2) ? $request->consignee_address_2 : null;
                $sea_d1->consignee_address_3 = !empty($request->consignee_address_3) ? $request->consignee_address_3 : null;
                $sea_d1->consignee_address_4 = !empty($request->consignee_address_4) ? $request->consignee_address_4 : null;
                $sea_d1->save();

                $sea_d2 = new SeaBookingD2();
                $sea_d2->sea_booking_id = $sea_book->id;
                $sea_d2->shipment_type = !empty($request->shipment_type) ? $request->shipment_type : null;
                $sea_d2->master_job_no = !empty($request->master_job_no) ? $request->master_job_no : null;
                $sea_d2->eta_sub = !empty($request->eta_sub) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_sub))) : null;
                $sea_d2->etd_date = !empty($request->etd_date) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->etd_date))) : null;
                $sea_d2->first_via_ata = !empty($request->first_via_ata) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_ata))) : null;
                $sea_d2->first_via_eta = !empty($request->first_via_eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_eta))) : null;
                $sea_d2->first_via_etd = !empty($request->first_via_etd) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_etd))) : null;
                $sea_d2->eta = !empty($request->eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->eta))) : null;
                $sea_d2->dest_eta_date = !empty($request->dest_eta_date) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->dest_eta_date))) : null;
                $sea_d2->close_date_time = !empty($request->close_date_time) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->close_date_time))) : null;
                $sea_d2->place_of_receipt = !empty($request->place_of_receipt) ? $request->place_of_receipt : null;
                $sea_d2->port_loading_code = !empty($request->port_loading_code) ? $request->port_loading_code : null;
                $sea_d2->port_loading_name = !empty($request->port_loading_name) ? $request->port_loading_name : null;
                $sea_d2->port_discharge_code = !empty($request->port_discharge_code) ? $request->port_discharge_code : null;
                $sea_d2->port_discharge_name = !empty($request->port_discharge_name) ? $request->port_discharge_name : null;
                $sea_d2->via_port_code = !empty($request->via_port_code) ? $request->via_port_code : null;
                $sea_d2->via_port_name = !empty($request->via_port_name) ? $request->via_port_name : null;
                $sea_d2->terminal = !empty($request->terminal) ? $request->terminal : null;
                $sea_d2->place_of_delivery = !empty($request->place_of_delivery) ? $request->place_of_delivery : null;
                $sea_d2->vessel_code = !empty($request->vessel_code) ? $request->vessel_code : null;
                $sea_d2->vessel_name = !empty($request->vessel_name) ? $request->vessel_name : null;
                $sea_d2->voyage_no = !empty($request->voyage_no) ? $request->voyage_no : null;
                $sea_d2->mother_vessel_name = !empty($request->mother_vessel_name) ? $request->mother_vessel_name : null;
                $sea_d2->mother_voyage = !empty($request->mother_voyage) ? $request->mother_voyage : null;
                $sea_d2->shippline_code = !empty($request->shippline_code) ? $request->shippline_code : null;
                $sea_d2->shippline_name = !empty($request->shippline_name) ? $request->shippline_name : null;
                $sea_d2->shippline_ref_no = !empty($request->shippline_ref_no) ? $request->shippline_ref_no : null;
                $sea_d2->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $sea_d2->coloader_name = !empty($request->coloader_name) ? $request->coloader_name : null;
                $sea_d2->coloader_ref_no = !empty($request->coloader_ref_no) ? $request->coloader_ref_no : null;
                $sea_d2->stuff_warehouse_code = !empty($request->stuff_warehouse_code) ? $request->stuff_warehouse_code : null;
                $sea_d2->stuff_warehouse_name = !empty($request->stuff_warehouse_name) ? $request->stuff_warehouse_name : null;
                $sea_d2->forward_agent_code = !empty($request->forward_agent_code) ? $request->forward_agent_code : null;
                $sea_d2->forward_agent_name = !empty($request->forward_agent_name) ? $request->forward_agent_name : null;
                $sea_d2->letter_of_credit = !empty($request->letter_of_credit) ? $request->letter_of_credit : null;
                $sea_d2->freight = !empty($request->freight) ? $request->freight : null;
                $sea_d2->other_charges = !empty($request->other_charges) ? $request->other_charges : null;
                $sea_d2->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $sea_d2->service_level = !empty($request->service_level) ? $request->service_level : null;
                $sea_d2->save();

                $sea_d3 = new SeaBookingD3();
                $sea_d3->sea_booking_id = $sea_book->id;
                $sea_d3->principle_agent_code = !empty($request->principle_agent_code) ? $request->principle_agent_code : null;
                $sea_d3->shippagent_code = !empty($request->shippagent_code) ? $request->shippagent_code : null;
                $sea_d3->scn_code = !empty($request->scn_code) ? $request->scn_code : null;
                $sea_d3->stuff_agent_code = !empty($request->stuff_agent_code) ? $request->stuff_agent_code : null;
                $sea_d3->stuff_agent_name = !empty($request->stuff_agent_name) ? $request->stuff_agent_name : null;
                $sea_d3->stuff_agent_address_1 = !empty($request->stuff_agent_address_1) ? $request->stuff_agent_address_1 : null;
                $sea_d3->stuff_agent_address_2 = !empty($request->stuff_agent_address_2) ? $request->stuff_agent_address_2 : null;
                $sea_d3->stuff_agent_address_3 = !empty($request->stuff_agent_address_3) ? $request->stuff_agent_address_3 : null;
                $sea_d3->stuff_agent_address_4 = !empty($request->stuff_agent_address_4) ? $request->stuff_agent_address_4 : null;
                $sea_d3->stuff_agent_contact_name = !empty($request->stuff_agent_contact_name) ? $request->stuff_agent_contact_name : null;
                $sea_d3->stuff = !empty($request->stuff) ? $request->stuff : null;
                $sea_d3->smk_code = !empty($request->smk_code) ? $request->smk_code : null;
                $sea_d3->cargo_receipt = !empty($request->cargo_receipt) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->cargo_receipt))) : null;
                $sea_d3->yard_code = !empty($request->yard_code) ? $request->yard_code : null;
                $sea_d3->yard_name = !empty($request->yard_name) ? $request->yard_name : null;
                $sea_d3->yard_address_1 = !empty($request->yard_address_1) ? $request->yard_address_1 : null;
                $sea_d3->yard_address_2 = !empty($request->yard_address_2) ? $request->yard_address_2 : null;
                $sea_d3->yard_address_3 = !empty($request->yard_address_3) ? $request->yard_address_3 : null;
                $sea_d3->yard_address_4 = !empty($request->yard_address_4) ? $request->yard_address_4 : null;
                $sea_d3->depot_code = !empty($request->depot_code) ? $request->depot_code : null;
                $sea_d3->depot_name = !empty($request->depot_name) ? $request->depot_name : null;
                $sea_d3->depot_address_1 = !empty($request->depot_address_1) ? $request->depot_address_1 : null;
                $sea_d3->depot_address_2 = !empty($request->depot_address_2) ? $request->depot_address_2 : null;
                $sea_d3->depot_address_3 = !empty($request->depot_address_3) ? $request->depot_address_3 : null;
                $sea_d3->depot_address_4 = !empty($request->depot_address_4) ? $request->depot_address_4 : null;
                $sea_d3->depot_instruction_1 = !empty($request->depot_instruction_1) ? $request->depot_instruction_1 : null;
                $sea_d3->depot_instruction_2 = !empty($request->depot_instruction_2) ? $request->depot_instruction_2 : null;
                $sea_d3->depot_instruction_3 = !empty($request->depot_instruction_3) ? $request->depot_instruction_3 : null;
                $sea_d3->depot_instruction_4 = !empty($request->depot_instruction_4) ? $request->depot_instruction_4 : null;
                $sea_d3->instruction_1 = !empty($request->instruction_1) ? $request->instruction_1 : null;
                $sea_d3->instruction_2 = !empty($request->instruction_2) ? $request->instruction_2 : null;
                $sea_d3->instruction_3 = !empty($request->instruction_3) ? $request->instruction_3 : null;
                $sea_d3->instruction_4 = !empty($request->instruction_4) ? $request->instruction_4 : null;
                $sea_d3->save();

                $sea_d4 = new SeaBookingD4();
                $sea_d4->sea_booking_id = $sea_book->id;
                $sea_d4->trans_company_code = !empty($request->trans_company_code) ? $request->trans_company_code : null;
                $sea_d4->trans_company_name = !empty($request->trans_company_name) ? $request->trans_company_name : null;
                $sea_d4->trans_company_address_1 = !empty($request->trans_company_address_1) ? $request->trans_company_address_1 : null;
                $sea_d4->trans_company_address_2 = !empty($request->trans_company_address_2) ? $request->trans_company_address_2 : null;
                $sea_d4->trans_company_address_3 = !empty($request->trans_company_address_3) ? $request->trans_company_address_3 : null;
                $sea_d4->trans_company_address_4 = !empty($request->trans_company_address_4) ? $request->trans_company_address_4 : null;
                $sea_d4->trans_company_contact_name = !empty($request->trans_company_contact_name) ? $request->trans_company_contact_name : null;
                $sea_d4->req_trans_no = !empty($request->req_trans_no) ? $request->req_trans_no : null;
                $sea_d4->vehicle_no = !empty($request->vehicle_no) ? $request->vehicle_no : null;
                $sea_d4->delivery_date_time = !empty($request->delivery_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->delivery_date_time))) : null;
                $sea_d4->pickup_date_time = !empty($request->pickup_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->pickup_date_time))) : null;
                $sea_d4->pickup_date_time_remark = !empty($request->pickup_date_time_remark) ? $request->pickup_date_time_remark : null;
                $sea_d4->collection_from_code = !empty($request->collection_from_code) ? $request->collection_from_code : null;
                $sea_d4->collection_from_name = !empty($request->collection_from_name) ? $request->collection_from_name : null;
                $sea_d4->collection_address_1 = !empty($request->collection_address_1) ? $request->collection_address_1 : null;
                $sea_d4->collection_address_2 = !empty($request->collection_address_2) ? $request->collection_address_2 : null;
                $sea_d4->collection_address_3 = !empty($request->collection_address_3) ? $request->collection_address_3 : null;
                $sea_d4->collection_address_4 = !empty($request->collection_address_4) ? $request->collection_address_4 : null;
                $sea_d4->delivery_to_code = !empty($request->delivery_to_code) ? $request->delivery_to_code : null;
                $sea_d4->delivery_to_name = !empty($request->delivery_to_name) ? $request->delivery_to_name : null;
                $sea_d4->delivery_address_1 = !empty($request->delivery_address_1) ? $request->delivery_address_1 : null;
                $sea_d4->delivery_address_2 = !empty($request->delivery_address_2) ? $request->delivery_address_2 : null;
                $sea_d4->delivery_address_3 = !empty($request->delivery_address_3) ? $request->delivery_address_3 : null;
                $sea_d4->delivery_address_4 = !empty($request->delivery_address_4) ? $request->delivery_address_4 : null;
                $sea_d4->delivery_instruction_1 = !empty($request->delivery_instruction_1) ? $request->delivery_instruction_1 : null;
                $sea_d4->delivery_instruction_2 = !empty($request->delivery_instruction_2) ? $request->delivery_instruction_2 : null;
                $sea_d4->delivery_instruction_3 = !empty($request->delivery_instruction_3) ? $request->delivery_instruction_3 : null;
                $sea_d4->delivery_instruction_4 = !empty($request->delivery_instruction_4) ? $request->delivery_instruction_4 : null;
                $sea_d4->delivery_instruction_5 = !empty($request->delivery_instruction_5) ? $request->delivery_instruction_5 : null;
                $sea_d4->delivery_instruction_6 = !empty($request->delivery_instruction_6) ? $request->delivery_instruction_6 : null;
                $sea_d4->delivery_instruction_7 = !empty($request->delivery_instruction_7) ? $request->delivery_instruction_7 : null;
                $sea_d4->delivery_instruction_8 = !empty($request->delivery_instruction_8) ? $request->delivery_instruction_8 : null;
                $sea_d4->stuffing = $request->stuffing == "yes" ? true : false;
                $sea_d4->stuffing_remark = !empty($request->stuffing_remark) ? $request->stuffing_remark : null;
                $sea_d4->fumigation = $request->fumigation == "yes" ? true : false;
                $sea_d4->fumigation_remark = !empty($request->fumigation_remark) ? $request->fumigation_remark : null;
                $sea_d4->permit = $request->permit == "yes" ? true : false;
                $sea_d4->permit_remark = !empty($request->permit_remark) ? $request->permit_remark : null;
                $sea_d4->insurance = $request->insurance == "yes" ? true : false;
                $sea_d4->insurance_remark = !empty($request->insurance_remark) ? $request->insurance_remark : null;
                $sea_d4->railing = $request->railing == "yes" ? true : false;
                $sea_d4->railing_remark = !empty($request->railing_remark) ? $request->railing_remark : null;
                $sea_d4->save();

                $sea_d5 = new SeaBookingD5();
                $sea_d5->sea_booking_id = $sea_book->id;
                $sea_d5->fumigation_code = !empty($request->fumigation_code) ? $request->fumigation_code : null;
                $sea_d5->fumigation_name = !empty($request->fumigation_name) ? $request->fumigation_name : null;
                $sea_d5->fumigation_address_1 = !empty($request->fumigation_address_1) ? $request->fumigation_address_1 : null;
                $sea_d5->fumigation_address_2 = !empty($request->fumigation_address_2) ? $request->fumigation_address_2 : null;
                $sea_d5->fumigation_address_3 = !empty($request->fumigation_address_3) ? $request->fumigation_address_3 : null;
                $sea_d5->fumigation_address_4 = !empty($request->fumigation_address_4) ? $request->fumigation_address_4 : null;
                $sea_d5->fumigation_contact_name = !empty($request->fumigation_contact_name) ? $request->fumigation_contact_name : null;
                $sea_d5->stumping_date_time = !empty($request->stumping_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->stumping_date_time))) : null;
                $sea_d5->fumigation_date_time = !empty($request->fumigation_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->fumigation_date_time))) : null;
                $sea_d5->ventilation_date_time = !empty($request->ventilation_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ventilation_date_time))) : null;
                $sea_d5->ava_date_time = !empty($request->ava_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ava_date_time))) : null;
                $sea_d5->fumigation_instruction_1 = !empty($request->fumigation_instruction_1) ? $request->fumigation_instruction_1 : null;
                $sea_d5->fumigation_instruction_2 = !empty($request->fumigation_instruction_2) ? $request->fumigation_instruction_2 : null;
                $sea_d5->fumigation_instruction_3 = !empty($request->fumigation_instruction_3) ? $request->fumigation_instruction_3 : null;
                $sea_d5->fumigation_instruction_4 = !empty($request->fumigation_instruction_4) ? $request->fumigation_instruction_4 : null;
                $sea_d5->fumigation_instruction_5 = !empty($request->fumigation_instruction_5) ? $request->fumigation_instruction_5 : null;
                $sea_d5->fumigation_instruction_6 = !empty($request->fumigation_instruction_6) ? $request->fumigation_instruction_6 : null;
                $sea_d5->fumigation_instruction_7 = !empty($request->fumigation_instruction_7) ? $request->fumigation_instruction_7 : null;
                $sea_d5->fumigation_instruction_8 = !empty($request->fumigation_instruction_8) ? $request->fumigation_instruction_8 : null;
                $sea_d5->save();

                $result_d6 = [];
                if ($request->cargo_commodity_code[0] != null) {
                    foreach ($request->cargo_commodity_code as $key => $val) {
                        $result_d6[] = [
                            'sea_booking_id'    => $sea_book->id,
                            'container_no'      => !empty($request->container_no[$key]) ? $request->container_no[$key] : null,
                            'pcs'      => !empty($request->pcs[$key]) ? $request->pcs[$key] : null,
                            'gross_weight'      => !empty($request->gross_weight[$key]) ? str_replace(",", "", $request->gross_weight[$key]) : null,
                            'cargo_commodity_code'      => $val,
                            'cargo_commodity'      => !empty($request->cargo_commodity[$key]) ? $request->cargo_commodity[$key] : null,
                            'seal_no'      => !empty($request->seal_no[$key]) ? $request->seal_no[$key] : null,
                            'cargo_container_code'      => !empty($request->cargo_container_code[$key]) ? $request->cargo_container_code[$key] : null,
                            'cargo_container'      => !empty($request->cargo_container[$key]) ? $request->cargo_container[$key] : null,
                            'cargo_uom_code'      => !empty($request->cargo_uom_code[$key]) ? $request->cargo_uom_code[$key] : null,
                            'cargo_uom'      => !empty($request->cargo_uom[$key]) ? $request->cargo_uom[$key] : null,
                            'cargo_volume'      => !empty($request->cargo_volume[$key]) ? str_replace(",", "", $request->cargo_volume[$key]) : null,
                            'marks_1'      => !empty($request->marks_1[$key]) ? $request->marks_1[$key] : null,
                            'marks_2'      => !empty($request->marks_2[$key]) ? $request->marks_2[$key] : null,
                            'marks_3'      => !empty($request->marks_3[$key]) ? $request->marks_3[$key] : null,
                            'marks_4'      => !empty($request->marks_4[$key]) ? $request->marks_4[$key] : null,
                            'marks_5'      => !empty($request->marks_5[$key]) ? $request->marks_5[$key] : null,
                            'marks_6'      => !empty($request->marks_6[$key]) ? $request->marks_6[$key] : null,
                            'marks_7'      => !empty($request->marks_7[$key]) ? $request->marks_7[$key] : null,
                            'marks_8'      => !empty($request->marks_8[$key]) ? $request->marks_8[$key] : null,
                            'marks_9'      => !empty($request->marks_9[$key]) ? $request->marks_9[$key] : null,
                            'marks_10'      => !empty($request->marks_10[$key]) ? $request->marks_10[$key] : null,
                            'good_desc_1'      => !empty($request->good_desc_1[$key]) ? $request->good_desc_1[$key] : null,
                            'good_desc_2'      => !empty($request->good_desc_2[$key]) ? $request->good_desc_2[$key] : null,
                            'good_desc_3'      => !empty($request->good_desc_3[$key]) ? $request->good_desc_3[$key] : null,
                            'good_desc_4'      => !empty($request->good_desc_4[$key]) ? $request->good_desc_4[$key] : null,
                            'good_desc_5'      => !empty($request->good_desc_5[$key]) ? $request->good_desc_5[$key] : null,
                            'good_desc_6'      => !empty($request->good_desc_6[$key]) ? $request->good_desc_6[$key] : null,
                            'good_desc_7'      => !empty($request->good_desc_7[$key]) ? $request->good_desc_7[$key] : null,
                            'good_desc_8'      => !empty($request->good_desc_8[$key]) ? $request->good_desc_8[$key] : null,
                            'good_desc_9'      => !empty($request->good_desc_9[$key]) ? $request->good_desc_9[$key] : null,
                            'good_desc_10'      => !empty($request->good_desc_10[$key]) ? $request->good_desc_10[$key] : null,
                        ];
                    }
                    SeaBookingD6::insert($result_d6);
                }

                DB::commit();
                return to_route('sea_book.index')->with('success', 'New Sea Export Booking has been added!');
            } catch (QueryException $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            } catch (\Throwable $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            }
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasPermission('edit-sea_book')) {
            $job_type = JobType::where('description', 'like', '%EXPORT%')->get();
            $sb = SeaBooking::with(['s_d1', 's_d2', 's_d3', 's_d4', 's_d5', 's_d6'])->find($id);

            return view('trx.sea_book.edit', compact('job_type', 'sb'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->hasPermission('edit-sea_book')) {
            $request->validate(
                [
                    'code'    => 'required|max:20|unique:sea_bookings,code,' . $id,
                    'cargo_type'  => 'required',
                    'etd'  => 'required',
                    'dest_code'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $sea_book = SeaBooking::find($id);

                $sea_book->cargo_type = !empty($request->cargo_type) ? $request->cargo_type : null;
                $sea_book->quotation_no = !empty($request->quotation_no) ? $request->quotation_no : null;
                $sea_book->job_no = !empty($request->job_no) ? $request->job_no : null;
                $sea_book->job_type = !empty($request->job_type) ? $request->job_type : null;
                $sea_book->import_job_no = !empty($request->import_job_no) ? $request->import_job_no : null;
                $sea_book->booking_date = !empty($request->booking_date) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->booking_date)))  : null;
                $sea_book->job_date = !empty($request->job_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->job_date)))  : null;
                $sea_book->bl_no = !empty($request->bl_no) ? $request->bl_no : null;
                $sea_book->nomination_cargo = $request->nomination_cargo == "yes" ? true : false;
                $sea_book->railing = $request->railing == "yes" ? true : false;
                $sea_book->refeer_container = $request->refeer_container == "yes" ? true : false;
                $sea_book->code_customer = !empty($request->code_customer) ? $request->code_customer : null;
                $sea_book->customer = !empty($request->customer) ? $request->customer : null;
                $sea_book->reference_no = !empty($request->reference_no) ? $request->reference_no : null;
                $sea_book->contact_name = !empty($request->contact_name) ? $request->contact_name : null;
                $sea_book->telp = !empty($request->telp) ? $request->telp : null;
                $sea_book->fax = !empty($request->fax) ? $request->fax : null;
                $sea_book->email = !empty($request->email) ? $request->email : null;
                $sea_book->jml_container_type_1 = !empty($request->jml_container_type_1) ? $request->jml_container_type_1 : null;
                $sea_book->container_type_1 = !empty($request->container_type_1) ? $request->container_type_1 : null;
                $sea_book->jml_container_type_2 = !empty($request->jml_container_type_2) ? $request->jml_container_type_2 : null;
                $sea_book->container_type_2 = !empty($request->container_type_2) ? $request->container_type_2 : null;
                $sea_book->jml_container_type_3 = !empty($request->jml_container_type_3) ? $request->jml_container_type_3 : null;
                $sea_book->container_type_3 = !empty($request->container_type_3) ? $request->container_type_3 : null;
                $sea_book->jml_container_type_4 = !empty($request->jml_container_type_4) ? $request->jml_container_type_4 : null;
                $sea_book->container_type_4 = !empty($request->container_type_4) ? $request->container_type_4 : null;
                $sea_book->etd = !empty($request->etd) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->etd)))  : null;
                $sea_book->dest_eta = !empty($request->dest_eta) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->dest_eta)))  : null;
                $sea_book->cargo_class = !empty($request->cargo_class) ? $request->cargo_class : null;
                $sea_book->salesman_code = !empty($request->salesman_code) ? $request->salesman_code : null;
                $sea_book->salesman = !empty($request->salesman) ? $request->salesman : null;
                $sea_book->origin_code = !empty($request->origin_code) ? $request->origin_code : null;
                $sea_book->origin_name = !empty($request->origin_name) ? $request->origin_name : null;
                $sea_book->dest_code = !empty($request->dest_code) ? $request->dest_code : null;
                $sea_book->dest_name = !empty($request->dest_name) ? $request->dest_name : null;
                $sea_book->country_code = !empty($request->country_code) ? $request->country_code : null;
                $sea_book->country_name = !empty($request->country_name) ? $request->country_name : null;
                $sea_book->country_origin = !empty($request->country_origin) ? $request->country_origin : null;
                $sea_book->dg_cargo = $request->dg_cargo == "yes" ? true : false;
                $sea_book->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $sea_book->delivery_type = !empty($request->delivery_type) ? $request->delivery_type : null;
                $sea_book->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $sea_book->commodity = !empty($request->commodity) ? $request->commodity : null;
                $sea_book->total_pcs = !empty($request->total_pcs) ?  $request->total_pcs : null;
                $sea_book->uom_code = !empty($request->uom_code) ? $request->uom_code : null;
                $sea_book->uom = !empty($request->uom) ? $request->uom : null;
                $sea_book->total_gross = !empty($request->total_gross) ? str_replace(",", "", $request->total_gross) : null;
                $sea_book->total_volume = !empty($request->total_volume) ? str_replace(",", "", $request->total_volume) : null;
                $sea_book->footer_1 = !empty($request->footer_1) ? $request->footer_1 : null;
                $sea_book->footer_2 = !empty($request->footer_2) ? $request->footer_2 : null;
                $sea_book->footer_3 = !empty($request->footer_3) ? $request->footer_3 : null;
                $sea_book->footer_4 = !empty($request->footer_4) ? $request->footer_4 : null;
                $sea_book->footer_5 = !empty($request->footer_5) ? $request->footer_5 : null;
                $sea_book->footer_6 = !empty($request->footer_6) ? $request->footer_6 : null;
                $sea_book->update();

                $sea_d1 = SeaBookingD1::where('sea_booking_id', $id)->first();
                $sea_d1->sea_booking_id = $sea_book->id;
                $sea_d1->agent_code = !empty($request->agent_code) ? $request->agent_code : null;
                $sea_d1->agent_name = !empty($request->agent_name) ? $request->agent_name : null;
                $sea_d1->agent_address_1 = !empty($request->agent_address_1) ? $request->agent_address_1 : null;
                $sea_d1->agent_address_2 = !empty($request->agent_address_2) ? $request->agent_address_2 : null;
                $sea_d1->agent_address_3 = !empty($request->agent_address_3) ? $request->agent_address_3 : null;
                $sea_d1->agent_address_4 = !empty($request->agent_address_4) ? $request->agent_address_4 : null;
                $sea_d1->shipper_code = !empty($request->shipper_code) ? $request->shipper_code : null;
                $sea_d1->shipper_name = !empty($request->shipper_name) ? $request->shipper_name : null;
                $sea_d1->shipper_address_1 = !empty($request->shipper_address_1) ? $request->shipper_address_1 : null;
                $sea_d1->shipper_address_2 = !empty($request->shipper_address_2) ? $request->shipper_address_2 : null;
                $sea_d1->shipper_address_3 = !empty($request->shipper_address_3) ? $request->shipper_address_3 : null;
                $sea_d1->shipper_address_4 = !empty($request->shipper_address_4) ? $request->shipper_address_4 : null;
                $sea_d1->consignee_code = !empty($request->consignee_code) ? $request->consignee_code : null;
                $sea_d1->consignee_name = !empty($request->consignee_name) ? $request->consignee_name : null;
                $sea_d1->consignee_address_1 = !empty($request->consignee_address_1) ? $request->consignee_address_1 : null;
                $sea_d1->consignee_address_2 = !empty($request->consignee_address_2) ? $request->consignee_address_2 : null;
                $sea_d1->consignee_address_3 = !empty($request->consignee_address_3) ? $request->consignee_address_3 : null;
                $sea_d1->consignee_address_4 = !empty($request->consignee_address_4) ? $request->consignee_address_4 : null;
                $sea_d1->update();

                $sea_d2 =  SeaBookingD2::where('sea_booking_id', $id)->first();
                $sea_d2->sea_booking_id = $sea_book->id;
                $sea_d2->shipment_type = !empty($request->shipment_type) ? $request->shipment_type : null;
                $sea_d2->master_job_no = !empty($request->master_job_no) ? $request->master_job_no : null;
                $sea_d2->eta_sub = !empty($request->eta_sub) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_sub))) : null;
                $sea_d2->etd_date = !empty($request->etd_date) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->etd_date))) : null;
                $sea_d2->first_via_ata = !empty($request->first_via_ata) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_ata))) : null;
                $sea_d2->first_via_eta = !empty($request->first_via_eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_eta))) : null;
                $sea_d2->first_via_etd = !empty($request->first_via_etd) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_etd))) : null;
                $sea_d2->eta = !empty($request->eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->eta))) : null;
                $sea_d2->dest_eta_date = !empty($request->dest_eta_date) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->dest_eta_date))) : null;
                $sea_d2->close_date_time = !empty($request->close_date_time) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->close_date_time))) : null;
                $sea_d2->place_of_receipt = !empty($request->place_of_receipt) ? $request->place_of_receipt : null;
                $sea_d2->port_loading_code = !empty($request->port_loading_code) ? $request->port_loading_code : null;
                $sea_d2->port_loading_name = !empty($request->port_loading_name) ? $request->port_loading_name : null;
                $sea_d2->port_discharge_code = !empty($request->port_discharge_code) ? $request->port_discharge_code : null;
                $sea_d2->port_discharge_name = !empty($request->port_discharge_name) ? $request->port_discharge_name : null;
                $sea_d2->via_port_code = !empty($request->via_port_code) ? $request->via_port_code : null;
                $sea_d2->via_port_name = !empty($request->via_port_name) ? $request->via_port_name : null;
                $sea_d2->terminal = !empty($request->terminal) ? $request->terminal : null;
                $sea_d2->place_of_delivery = !empty($request->place_of_delivery) ? $request->place_of_delivery : null;
                $sea_d2->vessel_code = !empty($request->vessel_code) ? $request->vessel_code : null;
                $sea_d2->vessel_name = !empty($request->vessel_name) ? $request->vessel_name : null;
                $sea_d2->voyage_no = !empty($request->voyage_no) ? $request->voyage_no : null;
                $sea_d2->mother_vessel_name = !empty($request->mother_vessel_name) ? $request->mother_vessel_name : null;
                $sea_d2->mother_voyage = !empty($request->mother_voyage) ? $request->mother_voyage : null;
                $sea_d2->shippline_code = !empty($request->shippline_code) ? $request->shippline_code : null;
                $sea_d2->shippline_name = !empty($request->shippline_name) ? $request->shippline_name : null;
                $sea_d2->shippline_ref_no = !empty($request->shippline_ref_no) ? $request->shippline_ref_no : null;
                $sea_d2->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $sea_d2->coloader_name = !empty($request->coloader_name) ? $request->coloader_name : null;
                $sea_d2->coloader_ref_no = !empty($request->coloader_ref_no) ? $request->coloader_ref_no : null;
                $sea_d2->stuff_warehouse_code = !empty($request->stuff_warehouse_code) ? $request->stuff_warehouse_code : null;
                $sea_d2->stuff_warehouse_name = !empty($request->stuff_warehouse_name) ? $request->stuff_warehouse_name : null;
                $sea_d2->forward_agent_code = !empty($request->forward_agent_code) ? $request->forward_agent_code : null;
                $sea_d2->forward_agent_name = !empty($request->forward_agent_name) ? $request->forward_agent_name : null;
                $sea_d2->letter_of_credit = !empty($request->letter_of_credit) ? $request->letter_of_credit : null;
                $sea_d2->freight = !empty($request->freight) ? $request->freight : null;
                $sea_d2->other_charges = !empty($request->other_charges) ? $request->other_charges : null;
                $sea_d2->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $sea_d2->service_level = !empty($request->service_level) ? $request->service_level : null;
                $sea_d2->update();

                $sea_d3 = SeaBookingD3::where('sea_booking_id', $id)->first();
                $sea_d3->sea_booking_id = $sea_book->id;
                $sea_d3->principle_agent_code = !empty($request->principle_agent_code) ? $request->principle_agent_code : null;
                $sea_d3->shippagent_code = !empty($request->shippagent_code) ? $request->shippagent_code : null;
                $sea_d3->scn_code = !empty($request->scn_code) ? $request->scn_code : null;
                $sea_d3->stuff_agent_code = !empty($request->stuff_agent_code) ? $request->stuff_agent_code : null;
                $sea_d3->stuff_agent_name = !empty($request->stuff_agent_name) ? $request->stuff_agent_name : null;
                $sea_d3->stuff_agent_address_1 = !empty($request->stuff_agent_address_1) ? $request->stuff_agent_address_1 : null;
                $sea_d3->stuff_agent_address_2 = !empty($request->stuff_agent_address_2) ? $request->stuff_agent_address_2 : null;
                $sea_d3->stuff_agent_address_3 = !empty($request->stuff_agent_address_3) ? $request->stuff_agent_address_3 : null;
                $sea_d3->stuff_agent_address_4 = !empty($request->stuff_agent_address_4) ? $request->stuff_agent_address_4 : null;
                $sea_d3->stuff_agent_contact_name = !empty($request->stuff_agent_contact_name) ? $request->stuff_agent_contact_name : null;
                $sea_d3->stuff = !empty($request->stuff) ? $request->stuff : null;
                $sea_d3->smk_code = !empty($request->smk_code) ? $request->smk_code : null;
                $sea_d3->cargo_receipt = !empty($request->cargo_receipt) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->cargo_receipt))) : null;
                $sea_d3->yard_code = !empty($request->yard_code) ? $request->yard_code : null;
                $sea_d3->yard_name = !empty($request->yard_name) ? $request->yard_name : null;
                $sea_d3->yard_address_1 = !empty($request->yard_address_1) ? $request->yard_address_1 : null;
                $sea_d3->yard_address_2 = !empty($request->yard_address_2) ? $request->yard_address_2 : null;
                $sea_d3->yard_address_3 = !empty($request->yard_address_3) ? $request->yard_address_3 : null;
                $sea_d3->yard_address_4 = !empty($request->yard_address_4) ? $request->yard_address_4 : null;
                $sea_d3->depot_code = !empty($request->depot_code) ? $request->depot_code : null;
                $sea_d3->depot_name = !empty($request->depot_name) ? $request->depot_name : null;
                $sea_d3->depot_address_1 = !empty($request->depot_address_1) ? $request->depot_address_1 : null;
                $sea_d3->depot_address_2 = !empty($request->depot_address_2) ? $request->depot_address_2 : null;
                $sea_d3->depot_address_3 = !empty($request->depot_address_3) ? $request->depot_address_3 : null;
                $sea_d3->depot_address_4 = !empty($request->depot_address_4) ? $request->depot_address_4 : null;
                $sea_d3->depot_instruction_1 = !empty($request->depot_instruction_1) ? $request->depot_instruction_1 : null;
                $sea_d3->depot_instruction_2 = !empty($request->depot_instruction_2) ? $request->depot_instruction_2 : null;
                $sea_d3->depot_instruction_3 = !empty($request->depot_instruction_3) ? $request->depot_instruction_3 : null;
                $sea_d3->depot_instruction_4 = !empty($request->depot_instruction_4) ? $request->depot_instruction_4 : null;
                $sea_d3->instruction_1 = !empty($request->instruction_1) ? $request->instruction_1 : null;
                $sea_d3->instruction_2 = !empty($request->instruction_2) ? $request->instruction_2 : null;
                $sea_d3->instruction_3 = !empty($request->instruction_3) ? $request->instruction_3 : null;
                $sea_d3->instruction_4 = !empty($request->instruction_4) ? $request->instruction_4 : null;
                $sea_d3->update();

                $sea_d4 = SeaBookingD4::where('sea_booking_id', $id)->first();
                $sea_d4->sea_booking_id = $sea_book->id;
                $sea_d4->trans_company_code = !empty($request->trans_company_code) ? $request->trans_company_code : null;
                $sea_d4->trans_company_name = !empty($request->trans_company_name) ? $request->trans_company_name : null;
                $sea_d4->trans_company_address_1 = !empty($request->trans_company_address_1) ? $request->trans_company_address_1 : null;
                $sea_d4->trans_company_address_2 = !empty($request->trans_company_address_2) ? $request->trans_company_address_2 : null;
                $sea_d4->trans_company_address_3 = !empty($request->trans_company_address_3) ? $request->trans_company_address_3 : null;
                $sea_d4->trans_company_address_4 = !empty($request->trans_company_address_4) ? $request->trans_company_address_4 : null;
                $sea_d4->trans_company_contact_name = !empty($request->trans_company_contact_name) ? $request->trans_company_contact_name : null;
                $sea_d4->req_trans_no = !empty($request->req_trans_no) ? $request->req_trans_no : null;
                $sea_d4->vehicle_no = !empty($request->vehicle_no) ? $request->vehicle_no : null;
                $sea_d4->delivery_date_time = !empty($request->delivery_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->delivery_date_time))) : null;
                $sea_d4->pickup_date_time = !empty($request->pickup_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->pickup_date_time))) : null;
                $sea_d4->pickup_date_time_remark = !empty($request->pickup_date_time_remark) ? $request->pickup_date_time_remark : null;
                $sea_d4->collection_from_code = !empty($request->collection_from_code) ? $request->collection_from_code : null;
                $sea_d4->collection_from_name = !empty($request->collection_from_name) ? $request->collection_from_name : null;
                $sea_d4->collection_address_1 = !empty($request->collection_address_1) ? $request->collection_address_1 : null;
                $sea_d4->collection_address_2 = !empty($request->collection_address_2) ? $request->collection_address_2 : null;
                $sea_d4->collection_address_3 = !empty($request->collection_address_3) ? $request->collection_address_3 : null;
                $sea_d4->collection_address_4 = !empty($request->collection_address_4) ? $request->collection_address_4 : null;
                $sea_d4->delivery_to_code = !empty($request->delivery_to_code) ? $request->delivery_to_code : null;
                $sea_d4->delivery_to_name = !empty($request->delivery_to_name) ? $request->delivery_to_name : null;
                $sea_d4->delivery_address_1 = !empty($request->delivery_address_1) ? $request->delivery_address_1 : null;
                $sea_d4->delivery_address_2 = !empty($request->delivery_address_2) ? $request->delivery_address_2 : null;
                $sea_d4->delivery_address_3 = !empty($request->delivery_address_3) ? $request->delivery_address_3 : null;
                $sea_d4->delivery_address_4 = !empty($request->delivery_address_4) ? $request->delivery_address_4 : null;
                $sea_d4->delivery_instruction_1 = !empty($request->delivery_instruction_1) ? $request->delivery_instruction_1 : null;
                $sea_d4->delivery_instruction_2 = !empty($request->delivery_instruction_2) ? $request->delivery_instruction_2 : null;
                $sea_d4->delivery_instruction_3 = !empty($request->delivery_instruction_3) ? $request->delivery_instruction_3 : null;
                $sea_d4->delivery_instruction_4 = !empty($request->delivery_instruction_4) ? $request->delivery_instruction_4 : null;
                $sea_d4->delivery_instruction_5 = !empty($request->delivery_instruction_5) ? $request->delivery_instruction_5 : null;
                $sea_d4->delivery_instruction_6 = !empty($request->delivery_instruction_6) ? $request->delivery_instruction_6 : null;
                $sea_d4->delivery_instruction_7 = !empty($request->delivery_instruction_7) ? $request->delivery_instruction_7 : null;
                $sea_d4->delivery_instruction_8 = !empty($request->delivery_instruction_8) ? $request->delivery_instruction_8 : null;
                $sea_d4->stuffing = $request->stuffing == "yes" ? true : false;
                $sea_d4->stuffing_remark = !empty($request->stuffing_remark) ? $request->stuffing_remark : null;
                $sea_d4->fumigation = $request->fumigation == "yes" ? true : false;
                $sea_d4->fumigation_remark = !empty($request->fumigation_remark) ? $request->fumigation_remark : null;
                $sea_d4->permit = $request->permit == "yes" ? true : false;
                $sea_d4->permit_remark = !empty($request->permit_remark) ? $request->permit_remark : null;
                $sea_d4->insurance = $request->insurance == "yes" ? true : false;
                $sea_d4->insurance_remark = !empty($request->insurance_remark) ? $request->insurance_remark : null;
                $sea_d4->railing = $request->railing == "yes" ? true : false;
                $sea_d4->railing_remark = !empty($request->railing_remark) ? $request->railing_remark : null;
                $sea_d4->update();

                $sea_d5 = SeaBookingD5::where('sea_booking_id', $id)->first();
                $sea_d5->sea_booking_id = $sea_book->id;
                $sea_d5->fumigation_code = !empty($request->fumigation_code) ? $request->fumigation_code : null;
                $sea_d5->fumigation_name = !empty($request->fumigation_name) ? $request->fumigation_name : null;
                $sea_d5->fumigation_address_1 = !empty($request->fumigation_address_1) ? $request->fumigation_address_1 : null;
                $sea_d5->fumigation_address_2 = !empty($request->fumigation_address_2) ? $request->fumigation_address_2 : null;
                $sea_d5->fumigation_address_3 = !empty($request->fumigation_address_3) ? $request->fumigation_address_3 : null;
                $sea_d5->fumigation_address_4 = !empty($request->fumigation_address_4) ? $request->fumigation_address_4 : null;
                $sea_d5->fumigation_contact_name = !empty($request->fumigation_contact_name) ? $request->fumigation_contact_name : null;
                $sea_d5->stumping_date_time = !empty($request->stumping_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->stumping_date_time))) : null;
                $sea_d5->fumigation_date_time = !empty($request->fumigation_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->fumigation_date_time))) : null;
                $sea_d5->ventilation_date_time = !empty($request->ventilation_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ventilation_date_time))) : null;
                $sea_d5->ava_date_time = !empty($request->ava_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ava_date_time))) : null;
                $sea_d5->fumigation_instruction_1 = !empty($request->fumigation_instruction_1) ? $request->fumigation_instruction_1 : null;
                $sea_d5->fumigation_instruction_2 = !empty($request->fumigation_instruction_2) ? $request->fumigation_instruction_2 : null;
                $sea_d5->fumigation_instruction_3 = !empty($request->fumigation_instruction_3) ? $request->fumigation_instruction_3 : null;
                $sea_d5->fumigation_instruction_4 = !empty($request->fumigation_instruction_4) ? $request->fumigation_instruction_4 : null;
                $sea_d5->fumigation_instruction_5 = !empty($request->fumigation_instruction_5) ? $request->fumigation_instruction_5 : null;
                $sea_d5->fumigation_instruction_6 = !empty($request->fumigation_instruction_6) ? $request->fumigation_instruction_6 : null;
                $sea_d5->fumigation_instruction_7 = !empty($request->fumigation_instruction_7) ? $request->fumigation_instruction_7 : null;
                $sea_d5->fumigation_instruction_8 = !empty($request->fumigation_instruction_8) ? $request->fumigation_instruction_8 : null;
                $sea_d5->update();

                $result_d6 = [];
                $sea_book->sea_book_d6()->forceDelete();
                if ($request->cargo_commodity_code[0] != null) {
                    foreach ($request->cargo_commodity_code as $key => $val) {
                        $result_d6[] = [
                            'sea_booking_id'    => $sea_book->id,
                            'container_no'      => !empty($request->container_no[$key]) ? $request->container_no[$key] : null,
                            'pcs'      => !empty($request->pcs[$key]) ? $request->pcs[$key] : null,
                            'gross_weight'      => !empty($request->gross_weight[$key]) ? str_replace(",", "", $request->gross_weight[$key]) : null,
                            'cargo_commodity_code'      => $val,
                            'cargo_commodity'      => !empty($request->cargo_commodity[$key]) ? $request->cargo_commodity[$key] : null,
                            'seal_no'      => !empty($request->seal_no[$key]) ? $request->seal_no[$key] : null,
                            'cargo_container_code'      => !empty($request->cargo_container_code[$key]) ? $request->cargo_container_code[$key] : null,
                            'cargo_container'      => !empty($request->cargo_container[$key]) ? $request->cargo_container[$key] : null,
                            'cargo_uom_code'      => !empty($request->cargo_uom_code[$key]) ? $request->cargo_uom_code[$key] : null,
                            'cargo_uom'      => !empty($request->cargo_uom[$key]) ? $request->cargo_uom[$key] : null,
                            'cargo_volume'      => !empty($request->cargo_volume[$key]) ? str_replace(",", "", $request->cargo_volume[$key]) : null,
                            'marks_1'      => !empty($request->marks_1[$key]) ? $request->marks_1[$key] : null,
                            'marks_2'      => !empty($request->marks_2[$key]) ? $request->marks_2[$key] : null,
                            'marks_3'      => !empty($request->marks_3[$key]) ? $request->marks_3[$key] : null,
                            'marks_4'      => !empty($request->marks_4[$key]) ? $request->marks_4[$key] : null,
                            'marks_5'      => !empty($request->marks_5[$key]) ? $request->marks_5[$key] : null,
                            'marks_6'      => !empty($request->marks_6[$key]) ? $request->marks_6[$key] : null,
                            'marks_7'      => !empty($request->marks_7[$key]) ? $request->marks_7[$key] : null,
                            'marks_8'      => !empty($request->marks_8[$key]) ? $request->marks_8[$key] : null,
                            'marks_9'      => !empty($request->marks_9[$key]) ? $request->marks_9[$key] : null,
                            'marks_10'      => !empty($request->marks_10[$key]) ? $request->marks_10[$key] : null,
                            'good_desc_1'      => !empty($request->good_desc_1[$key]) ? $request->good_desc_1[$key] : null,
                            'good_desc_2'      => !empty($request->good_desc_2[$key]) ? $request->good_desc_2[$key] : null,
                            'good_desc_3'      => !empty($request->good_desc_3[$key]) ? $request->good_desc_3[$key] : null,
                            'good_desc_4'      => !empty($request->good_desc_4[$key]) ? $request->good_desc_4[$key] : null,
                            'good_desc_5'      => !empty($request->good_desc_5[$key]) ? $request->good_desc_5[$key] : null,
                            'good_desc_6'      => !empty($request->good_desc_6[$key]) ? $request->good_desc_6[$key] : null,
                            'good_desc_7'      => !empty($request->good_desc_7[$key]) ? $request->good_desc_7[$key] : null,
                            'good_desc_8'      => !empty($request->good_desc_8[$key]) ? $request->good_desc_8[$key] : null,
                            'good_desc_9'      => !empty($request->good_desc_9[$key]) ? $request->good_desc_9[$key] : null,
                            'good_desc_10'      => !empty($request->good_desc_10[$key]) ? $request->good_desc_10[$key] : null,
                        ];
                    }
                    SeaBookingD6::insert($result_d6);
                }

                DB::commit();
                return to_route('sea_book.index')->with('success', 'Sea Export Booking has been updated!');
            } catch (QueryException $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            } catch (\Throwable $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            }
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeaBooking $sea_book)
    {
        if (Auth::user()->hasPermission('delete-sea_book')) {
            DB::beginTransaction();
            try {
                $sea_book->delete();

                DB::commit();
                return to_route('sea_book.index')->with('success', 'Sea Export Booking has been deleted!');
            } catch (QueryException $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            } catch (\Throwable $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            }
        } else {
            abort(403);
        }
    }
}
