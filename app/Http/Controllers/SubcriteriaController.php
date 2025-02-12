<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Subcriteria;
use Illuminate\Http\Request;

class SubcriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcriteria = Subcriteria::orderBy('idCriteria')->get();
        $criteria = Criteria::all();
        return view('admin.subcriteria',compact('subcriteria','criteria'));
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
            'idCriteria'        =>  'required',
            'subcriteria_name'  =>  'required',
            'info'              =>  'required',
            'value'             =>  'required|numeric'
        ]);
        $subcriteria = new Subcriteria();
        $save = $subcriteria->create([
            'idCriteria'        =>  $request->idCriteria,
            'subcriteria_name'  =>  $request->subcriteria_name,
            'info'              =>  $request->info,
            'value'             =>  $request->value
        ]);
        return $save ? redirect(route('subcriteria.index'))->withSuccess('Data has been added') : back()->withErrors('Data failed to add!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcriteria $subcriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcriteria $subcriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'idCriteria'        =>  'required',
            'subcriteria_name'  =>  'required',
            'info'              =>  'required',
            'value'             =>  'required|numeric'
        ]);
        $subcriteria = Subcriteria::findOrFail($id);
        $update = $subcriteria->update([
            'idCriteria'        =>  $request->idCriteria,
            'subcriteria_name'  =>  $request->subcriteria_name,
            'info'              =>  $request->info,
            'value'             =>  $request->value
        ]);
        return $update ? redirect(route('subcriteria.index'))->withSuccess('Data has been updated') : back()->withErrors('Data failed to update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subcriteria = Subcriteria::findOrFail($id);
        $delete = $subcriteria->delete();
        return $delete ? redirect(route('subcriteria.index'))->withSuccess('Data has been deleted') : back()->withErrors('Data failed to delete!');
    }
}
