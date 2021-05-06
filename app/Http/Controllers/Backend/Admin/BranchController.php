<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\BranchLink;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = auth()->user()->company->branches;
        $year = date('Y');
        return view('backend.admin.branch.index', compact('branches','year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = auth()->user()->company->branches;
        return view('backend.admin.branch.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->company->purchasePackage->package->branch <= auth()->user()->company->branches->count()){
            return back()->withErrors('You need to upgrade your package for add more branch');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'sender_search_length' => 'required|numeric|min:0',
            'receiver_search_length' => 'required|numeric|min:0',
            'global_search_length' => 'required|numeric|min:0',
            'custom_inv_counter_max_value' => 'required|numeric|min:0',
            'custom_inv_counter_min_value' => 'required|numeric|min:0',
            'status' => 'required|boolean',
            'head_office' => 'required|boolean',
            'linked_branches' => 'required',
        ]);

        $branch = new Branch();
        $branch->company_id = auth()->user()->company->id;
        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->sender_search_length = $request->sender_search_length;
        $branch->receiver_search_length = $request->receiver_search_length;
        $branch->global_search_length = $request->global_search_length;
        $branch->custom_inv_counter_max_value = $request->custom_inv_counter_max_value;
        $branch->custom_inv_counter_min_value = $request->custom_inv_counter_min_value;
        $branch->is_active = $request->status;
        $branch->is_head_office = $request->head_office;
        try {
            $branch->save();
            if (BranchLink::where('from_branch_id', $branch->id)->count() > 0){
                BranchLink::where('from_branch_id', $branch->id)->delete();
            }
            foreach ($request->linked_branches as $linked_branch){
                if (auth()->user()->company->id != Branch::find($linked_branch)->company->id){
                    return back()->withErrors('You have not access');
                }
                $branch_link = new BranchLink();
                $branch_link->from_branch_id    =   $branch->id;
                $branch_link->to_branch_id  =   $linked_branch;
                $branch_link->save();
            }
            return redirect()->route('admin.branch.index')->withSuccess('Branch successfully added');
        } catch (\Exception $exception) {
            return back()->withErrors( $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        if ($branch->company->id != auth()->user()->company->id){
            return back()->withErrors('You have not access');
        }

        $branches = auth()->user()->company->branches;
        return view('backend.admin.branch.edit', compact('branch', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        if ($branch->company->id != auth()->user()->company->id){
            return back()->withErrors('You have not access');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'sender_search_length' => 'required|numeric|min:0',
            'receiver_search_length' => 'required|numeric|min:0',
            'global_search_length' => 'required|numeric|min:0',
            'custom_inv_counter_max_value' => 'required|numeric|min:0',
            'custom_inv_counter_min_value' => 'required|numeric|min:0',
            'status' => 'required|boolean',
            'head_office' => 'required|boolean',
            'linked_branches' => 'required',
        ]);

        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->sender_search_length = $request->sender_search_length;
        $branch->receiver_search_length = $request->receiver_search_length;
        $branch->global_search_length = $request->global_search_length;
        $branch->custom_inv_counter_max_value = $request->custom_inv_counter_max_value;
        $branch->custom_inv_counter_min_value = $request->custom_inv_counter_min_value;
        $branch->is_active = $request->status;
        $branch->is_head_office = $request->head_office;
        try {
            $branch->save();

            if (BranchLink::where('from_branch_id', $branch->id)->count() > 0){
                BranchLink::where('from_branch_id', $branch->id)->delete();
            }
            //dd($request->linked_branches);
            foreach ($request->linked_branches as $linked_branch){
                if (auth()->user()->company->id != Branch::find($linked_branch)->company->id){
                    return back()->withErrors('You have not access');
                }
                $branch_link = new BranchLink();
                $branch_link->from_branch_id    =   $branch->id;
                $branch_link->to_branch_id  =   $linked_branch;
                $branch_link->save();
            }
            return redirect()->route('admin.branch.index')->withSuccess('Branch successfully updated');
        } catch (\Exception $exception) {
            return back()->withErrors( $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
