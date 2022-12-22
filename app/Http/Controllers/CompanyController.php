<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\History;
use Illuminate\Http\Request;
use App\Models\CompanyDetailSatu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasPermission('manage-company')) {

            $comp_detail = CompanyDetailSatu::where('company_id', 1)->orderby('id', 'asc')->get();

            $company = Company::where('id', 1)->orderby('id', 'asc')->first();

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Company Profile',
                    'url_menu'  => route('company'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Company Profile',
                    'url_menu'  => route('company'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('company.index', compact('comp_detail', 'company'));
        } else {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->hasPermission('edit-company')) {
            $id = $request->id;
            $type = $request->type;

            if ($request->file('image_company')) {
                $request->validate([
                    'image_company'     => 'image|max:1024|mimes:png,jpg,jpeg',
                ]);
            }

            DB::beginTransaction();
            try {
                $company = Company::find($id);
                $company->name = $request->name;
                $company->branch_name = $request->branch_name;
                $company->web_site = $request->web_site;
                $company->regis_no = $request->regis_no;
                $company->vat_regis_no = $request->vat_regis_no;
                $company->iata_agent_code = $request->iata_agent_code;
                $company->currency_id = $request->currency_id;
                if ($request->file('image_company')) {
                    if ($request->oldImage) {
                        Storage::delete($request->oldImage);
                    }
                    $company->image_company = $request->file('image_company')->store('company-images');
                }
                $company->update();

                $comp_detail = CompanyDetailSatu::where('company_id', $id)->where('type', $type)->first();
                $comp_detail->type = $type;
                $comp_detail->address = $request->address;
                $comp_detail->postal_code = $request->postal_code;
                $comp_detail->city_id = $request->city_id;
                $comp_detail->country_id = $request->country_id;
                $comp_detail->telp = $request->telp;
                $comp_detail->fax = $request->fax;
                $comp_detail->contact = $request->contact;
                $comp_detail->email = $request->email;
                $comp_detail->update();

                DB::commit();
                return to_route('company')->with('success', 'Company profile has been updated!');
            } catch (\Throwable $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            }
        } else {
            abort(403);
        }
    }
}
