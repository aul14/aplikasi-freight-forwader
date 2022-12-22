<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\JobType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-jobtype')) {
            if ($request->ajax()) {
                $jobtype = JobType::all()->sortByDesc("id");
                return DataTables::of($jobtype)
                    ->addColumn('action', function ($jobtype) {
                        return view('datatable-modal._action', [
                            'row_id' => $jobtype->id,
                            'edit_url' => route('job_type.edit', $jobtype->id),
                            'delete_url' => route('job_type.destroy', $jobtype->id),
                            'can_edit' => 'edit-jobtype',
                            'can_delete' => 'delete-jobtype'
                        ]);
                    })
                    ->editColumn('updated_at', function ($jobtype) {
                        return !empty($jobtype->updated_at) ? date("d-m-Y H:i", strtotime($jobtype->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Job Type',
                    'url_menu'  => route('job_type.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Job Type',
                    'url_menu'  => route('job_type.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.jobtype.index');
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
        if (Auth::user()->hasPermission('create-jobtype')) {
            return view('master.jobtype.create');
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
        if (Auth::user()->hasPermission('create-jobtype')) {
            $validateData = $request->validate(
                [
                    'type'         => 'required|max:10',
                    'description'  => 'required|max:50|unique:job_type,description',
                    'module_code'  => 'required|max:2',
                ],
            );

            JobType::create($validateData);

            return to_route('job_type.index')->with('success', 'New job type has been added!');
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
    public function edit(JobType $jobType)
    {
        if (Auth::user()->hasPermission('edit-jobtype')) {
            return view('master.jobtype.edit', compact('jobType'));
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
        if (Auth::user()->hasPermission('edit-jobtype')) {
            $validateData = $request->validate(
                [
                    'type'         => 'required|max:10',
                    'description'  => 'required|max:50|unique:job_type,description,' . $id,
                    'module_code'  => 'required|max:2',
                ],
            );

            JobType::where('id', $id)->update($validateData);

            return to_route('job_type.index')->with('success', 'Job type has been updated!');
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
    public function destroy(JobType $jobType)
    {
        if (Auth::user()->hasPermission('delete-jobtype')) {
            $jobType->delete();

            return to_route('job_type.index')->with('success', 'Job type has been deleted!');
        } else {
            abort(403);
        }
    }
}
