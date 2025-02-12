<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternative = Alternative::all();
        return view('admin.alternative',compact('alternative'));
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
            'car'           =>  'required',
        ]);

        $alternative = new Alternative();
        $save = $alternative->create([
            'car'           =>  $request->car,
            'description'   =>  $request->description
        ]);
        return $save ? redirect(route('alternative.index'))->withSuccess('Data has been added') : back()->withErrors('Data failed to add!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternative $alternative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternative $alternative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'car'   =>  'required'
        ]);
        $id = Alternative::findOrFail($id);
        $update = $id->update([
            'car'           =>  $request->car,
            'description'   =>  $request->description
        ]);
        return $update ? redirect(route('alternative.index'))->withSuccess('Data has been updated') : back()->withErrors('Data failed to update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Alternative::findOrFail($id);
        $delete = $id->delete();
        return $delete ? redirect(route('alternative.index'))->withSuccess('Data has been deleted') : back()->withErrors('Data failed to delete!');
    }
}
