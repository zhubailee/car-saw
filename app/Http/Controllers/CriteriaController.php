<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criteria = Criteria::all();
        return view('admin.criteria',compact('criteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'criteria_name' =>  'required',
            'type'          =>  'required',
            'weight'        =>  'required|numeric'
        ]);
        $criteria = new Criteria();
        $save = $criteria->create([
            'criteria_name' =>  $request->criteria_name,
            'type'          =>  $request->type,
            'weight'        =>  $request->weight
        ]);
        return $save ? redirect(route('criteria.index'))->withSuccess('Data has been added') : back()->withErrors('Data failed to add!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Criteria $criteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criteria $criteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'criteria_name' =>  'required',
            'type'          =>  'required',
            'weight'        =>  'required|numeric'
        ]);
        $criteria = Criteria::findOrFail($id);
        $update = $criteria->update([
            'criteria_name' =>  $request->criteria_name,
            'type'          =>  $request->type,
            'weight'        =>  $request->weight
        ]);

        return $update ? redirect(route('criteria.index'))->withSuccess('Data has been updated') : back()->withErrors('Data failed to update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $criteria = Criteria::findOrFail($id);
        $delete = $criteria->delete();
        return $delete ? redirect(route('criteria.index'))->withSuccess('Data has been deleted') : back()->withErrors('Data failed to delete!');
    }
}
