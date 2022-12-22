<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\PartyType;
use App\Models\BisnisParty;
use App\Models\BisnisPartyD1;
use App\Models\BisnisPartyD2;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BisnisPartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-bisnis_party')) {
            if ($request->ajax()) {
                $bisnis_party = BisnisParty::all()->sortByDesc("bisnis_party.id");
                return DataTables::of($bisnis_party)
                    ->addColumn('action', function ($bisnis_party) {
                        return view('datatable-modal._action', [
                            'row_id' => $bisnis_party->id,
                            'edit_url' => route('bisnis_party.edit', $bisnis_party->id),
                            'delete_url' => route('bisnis_party.destroy', $bisnis_party->id),
                            'can_edit' => 'edit-bisnis_party',
                            'can_delete' => 'delete-bisnis_party'
                        ]);
                    })
                    ->editColumn('updated_at', function ($bisnis_party) {
                        return !empty($bisnis_party->updated_at) ? date("d-m-Y H:i", strtotime($bisnis_party->updated_at)) : "-";
                    })
                    ->editColumn('customer_code', function ($bisnis_party) {
                        return !empty($bisnis_party->customer_code) ? $bisnis_party->customer_code : "-";
                    })
                    ->editColumn('vendor_code', function ($bisnis_party) {
                        return !empty($bisnis_party->vendor_code) ? $bisnis_party->vendor_code : "-";
                    })
                    ->editColumn('is_customer', function ($bisnis_party) {
                        return $bisnis_party->is_customer == true ? 'yes' : 'no';
                    })
                    ->editColumn('is_vendor', function ($bisnis_party) {
                        return $bisnis_party->is_vendor == true ? 'yes' : 'no';
                    })
                    ->rawColumns(['updated_at', 'action', 'is_customer', 'is_vendor', 'customer_code', 'vendor_code'])
                    ->addIndexColumn()
                    ->make(true);
            }

            // INSERT TABLE HISTORY
            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Business Party',
                    'url_menu'  => route('bisnis_party.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Business Party',
                    'url_menu'  => route('bisnis_party.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.bisnis_party.index');
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
        if (Auth::user()->hasPermission('create-bisnis_party')) {
            $p_type = PartyType::all();
            return view('master.bisnis_party.create', compact('p_type'));
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
        if (Auth::user()->hasPermission('create-bisnis_party')) {
            $request->validate(
                [
                    'code'    => 'required|max:10|unique:bisnis_party,code',
                    'name'  => 'required|max:80',
                    'credit_limit'     => 'max:17',
                ],
                [
                    'credit_limit.max' => 'Max 11,2 digits',
                ]
            );

            DB::beginTransaction();
            try {
                $count_name_arr = count(explode(" ", $request->name));
                if ($count_name_arr == 3 || $count_name_arr >= 3) {
                    $exp_arr_1 = explode(" ", $request->name)[0];
                    $exp_arr_2 = explode(" ", $request->name)[1];
                    $exp_arr_3 = explode(" ", $request->name)[2];
                    $name_arr_1 = substr($exp_arr_1, 0, 3);
                    $name_arr_2 = substr($exp_arr_2, 0, 2);
                    $name_arr_3 = substr($exp_arr_3, 0, 2);
                } else if ($count_name_arr == 2) {
                    $exp_arr_1 = explode(" ", $request->name)[0];
                    $exp_arr_2 = explode(" ", $request->name)[1];
                    $exp_arr_3 = '';
                    $name_arr_1 = substr($exp_arr_1, 0, 3);
                    $name_arr_2 = substr($exp_arr_2, 0, 2);
                    $name_arr_3 = '';
                } else if ($count_name_arr == 1) {
                    $exp_arr_1 = explode(" ", $request->name)[0];
                    $exp_arr_2 = '';
                    $exp_arr_3 = '';
                    $name_arr_1 = substr($exp_arr_1, 0, 3);
                    $name_arr_2 = '';
                    $name_arr_3 = '';
                }

                $bp = new BisnisParty();
                $bp->code = $request->code == 'NEW' ? "$name_arr_1$name_arr_2$name_arr_3" : $request->code;
                $bp->name = $request->name;
                $bp->is_customer = $request->is_customer == '1' ? true : false;
                $bp->customer_code = $request->is_customer == '1' ? $this->custom_code_customer(strtoupper(substr($request->name, 0, 1))) : '';
                $bp->customer_type_id = $request->customer_type_id;
                $bp->customer_acc_code = $request->customer_acc_code;
                $bp->credit_limit = $request->credit_limit != null ? str_replace(",", "", $request->credit_limit) : 0;
                $bp->is_vendor = $request->is_vendor == '1' ? true : false;
                $bp->vendor_code = $request->is_vendor == '1' ? $this->custom_code_vendor(strtoupper(substr($request->name, 0, 1))) : '';
                $bp->vendor_type_id = $request->vendor_type_id;
                $bp->vendor_acc_code = $request->vendor_acc_code;
                $bp->vat_code_id = $request->vat_code_id;
                $bp->currency_id = $request->currency_id;
                $bp->exp_date = $request->exp_date;
                $bp->payment_term_id = $request->payment_term_id;
                $bp->local_name = $request->local_name;
                $bp->address_1 = $request->address_1;
                $bp->address_2 = $request->address_2;
                $bp->address_3 = $request->address_3;
                $bp->address_4 = $request->address_4;
                $bp->postal_code = $request->postal_code;
                $bp->city_id = $request->city_id;
                $bp->country_id = $request->country_id;
                $bp->port_id = $request->port_id;
                $bp->awb_prefix = $request->awb_prefix;
                $bp->province = $request->province;
                $bp->place = $request->place;
                $bp->marking = $request->marking;
                $bp->telp = $request->telp;
                $bp->fax = $request->fax;
                $bp->email = $request->email;
                $bp->web_site = $request->web_site;
                $bp->telex = $request->telex;
                $bp->note = $request->note;
                $bp->salesman_id = $request->salesman_id;
                $bp->cr_roc_rob = $request->cr_roc_rob;
                $bp->tax_id = $request->tax_id;
                $bp->nomination = $request->nomination == "yes" ? true : false;
                $bp->sales_lead = $request->sales_lead == "yes" ? true : false;
                $bp->cold_call = $request->cold_call == "yes" ? true : false;
                $bp->notify_contact_name = $request->notify_contact_name;
                $bp->notify_email = $request->notify_email;
                $bp->save();

                $result_d1 = [];
                if ($request->name_detail != null) {
                    foreach ($request->name_detail as $key => $val) {
                        $result_d1[] = [
                            'bisnis_party_id'    => $bp->id,
                            'title'       => $request->title[$key],
                            'name'       => $val,
                            'telp'       => $request->telp_detail[$key],
                            'fax'       => $request->fax_detail[$key],
                            'handphone'       => $request->handphone[$key],
                            'email'       => $request->email_detail[$key],
                            'birthday'       => $request->birthday[$key],
                            'facebook'       => $request->facebook[$key],
                            'twiter'       => $request->twiter[$key],
                            'like'       => $request->like[$key],
                            'dislike'       => $request->dislike[$key],
                            'msn'       => $request->msn[$key],
                            'qq'       => $request->qq[$key],
                            'skype'       => $request->skype[$key],
                            'other'       => $request->other[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    BisnisPartyD1::insert($result_d1);
                }

                $result_d2 = [];
                if ($request->party_type_id != null) {
                    foreach ($request->party_type_id as $key => $val) {
                        $result_d2[] = [
                            'bisnis_party_id'    => $bp->id,
                            'party_type_id' => $val,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    BisnisPartyD2::insert($result_d2);
                }

                DB::commit();
                return to_route('bisnis_party.index')->with('success', 'New Business Party has been added!');
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
    public function edit(BisnisParty $bisnis_party)
    {
        if (Auth::user()->hasPermission('edit-bisnis_party')) {
            $p_type = PartyType::all();
            $credit_limit = number_format($bisnis_party->credit_limit, 2, ".", ",");
            $detail_1 = BisnisPartyD1::where('bisnis_party_id', $bisnis_party->id)->get();
            $detail_2 = BisnisPartyD2::select('party_type_id')->where('bisnis_party_id', $bisnis_party->id)->get();
            $party_type_id = [];
            foreach ($detail_2 as $u) {
                $party_type_id[] = $u->party_type_id;
            }
            return view('master.bisnis_party.edit', compact('p_type', 'bisnis_party', 'credit_limit', 'detail_1', 'party_type_id'));
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
        if (Auth::user()->hasPermission('edit-bisnis_party')) {
            $request->validate(
                [
                    'name'  => 'required|max:80',
                    'credit_limit'     => 'max:17',
                ],
                [
                    'credit_limit.max' => 'Max 11,2 digits',
                ]
            );

            DB::beginTransaction();
            try {
                $bp = BisnisParty::find($id);
                $bp->name = $request->name;
                $bp->is_customer = ($bp->is_customer == false && $request->is_customer == '1') ? true : $bp->is_customer;
                $bp->customer_code = ($bp->customer_code == "" && $request->is_customer == '1') ? $this->custom_code_customer(strtoupper(substr($request->name, 0, 1))) : $bp->customer_code;
                $bp->customer_type_id = $request->customer_type_id;
                $bp->customer_acc_code = $request->customer_acc_code;
                $bp->credit_limit = $request->credit_limit != null ? str_replace(",", "", $request->credit_limit) : 0;
                $bp->is_vendor = ($bp->is_vendor == false && $request->is_vendor == '1') ? true : $bp->is_vendor;
                $bp->vendor_code = ($bp->vendor_code == "" && $request->is_vendor == '1') ? $this->custom_code_vendor(strtoupper(substr($request->name, 0, 1))) : $bp->vendor_code;
                $bp->vendor_type_id = $request->vendor_type_id;
                $bp->vendor_acc_code = $request->vendor_acc_code;
                $bp->vat_code_id = $request->vat_code_id;
                $bp->currency_id = $request->currency_id;
                $bp->exp_date = $request->exp_date;
                $bp->payment_term_id = $request->payment_term_id;
                $bp->local_name = $request->local_name;
                $bp->address_1 = $request->address_1;
                $bp->address_2 = $request->address_2;
                $bp->address_3 = $request->address_3;
                $bp->address_4 = $request->address_4;
                $bp->postal_code = $request->postal_code;
                $bp->city_id = $request->city_id;
                $bp->country_id = $request->country_id;
                $bp->port_id = $request->port_id;
                $bp->awb_prefix = $request->awb_prefix;
                $bp->province = $request->province;
                $bp->place = $request->place;
                $bp->marking = $request->marking;
                $bp->telp = $request->telp;
                $bp->fax = $request->fax;
                $bp->email = $request->email;
                $bp->web_site = $request->web_site;
                $bp->telex = $request->telex;
                $bp->note = $request->note;
                $bp->salesman_id = $request->salesman_id;
                $bp->cr_roc_rob = $request->cr_roc_rob;
                $bp->tax_id = $request->tax_id;
                $bp->nomination = $request->nomination == "yes" ? true : false;
                $bp->sales_lead = $request->sales_lead == "yes" ? true : false;
                $bp->cold_call = $request->cold_call == "yes" ? true : false;
                $bp->notify_contact_name = $request->notify_contact_name;
                $bp->notify_email = $request->notify_email;
                $bp->update();

                $bp->bisnis_party_detail_satu()->delete();
                $result_d1 = [];
                if ($request->name_detail != null) {
                    foreach ($request->name_detail as $key => $val) {
                        $result_d1[] = [
                            'bisnis_party_id'    => $bp->id,
                            'title'       => $request->title[$key],
                            'name'       => $val,
                            'telp'       => $request->telp_detail[$key],
                            'fax'       => $request->fax_detail[$key],
                            'handphone'       => $request->handphone[$key],
                            'email'       => $request->email_detail[$key],
                            'birthday'       => $request->birthday[$key],
                            'facebook'       => $request->facebook[$key],
                            'twiter'       => $request->twiter[$key],
                            'like'       => $request->like[$key],
                            'dislike'       => $request->dislike[$key],
                            'msn'       => $request->msn[$key],
                            'qq'       => $request->qq[$key],
                            'skype'       => $request->skype[$key],
                            'other'       => $request->other[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    BisnisPartyD1::insert($result_d1);
                }

                $bp->bisnis_party_detail_dua()->delete();
                $result_d2 = [];
                if ($request->party_type_id != null) {
                    foreach ($request->party_type_id as $key => $val) {
                        $result_d2[] = [
                            'bisnis_party_id'    => $bp->id,
                            'party_type_id' => $val,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    BisnisPartyD2::insert($result_d2);
                }

                DB::commit();
                return to_route('bisnis_party.index')->with('success', 'Business Party has been updated!');
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
    public function destroy(BisnisParty $bisnis_party)
    {
        if (Auth::user()->hasPermission('delete-bisnis_party')) {
            $bisnis_party->delete();

            return to_route('bisnis_party.index')->with('success', 'Business Party has been deleted!');
        } else {
            abort(403);
        }
    }

    public function custom_code_customer($search)
    {
        $format = $search;
        $data_customer = BisnisParty::select('customer_code')->where('customer_code', 'like', "%$format%")->count() + 1;

        if (strlen($data_customer) <= 1) {
            $format .= "00{$data_customer}";
        } else if (strlen($data_customer) <= 2) {
            $format .= "0{$data_customer}";
        } else {
            $format .= (string)$data_customer;
        }

        $form = $format;

        return $form;
    }

    public function custom_code_vendor($search)
    {
        $format = $search;
        $data_vendor = BisnisParty::select('vendor_code')->where('vendor_code', 'like', "%$format%")->count() + 1;

        if (strlen($data_vendor) <= 1) {
            $format .= "000{$data_vendor}";
        } else if (strlen($data_vendor) <= 2) {
            $format .= "00{$data_vendor}";
        } else if (strlen($data_vendor) <= 3) {
            $format .= "0{$data_vendor}";
        } else {
            $format .= (string)$data_vendor;
        }

        $form = $format;

        return $form;
    }
}
