<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    /**
     * Display all records
     */
    public function index()
    {
        $infos = Info::latest()->get();

        return view('info', compact('infos'));
    }

    /**
     * Store new record
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|max:255',
            'massage' => 'required',
        ]);

        Info::create([
            'full_name' => $request->full_name,
            'massage' => $request->massage,
        ]);

        return redirect()->back()->with('success', 'Data Added Successfully');
    }

    /**
     * Edit record
     */
    public function edit($id)
    {
        $editInfo = Info::findOrFail($id);

        $infos = Info::latest()->get();

        return view('info', compact('editInfo', 'infos'));
    }

    /**
     * Update record
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|max:255',
            'massage' => 'required',
        ]);

        $info = Info::findOrFail($id);

        $info->update([
            'full_name' => $request->full_name,
            'massage' => $request->massage,
        ]);

        return redirect()->route('infos.index')
                         ->with('success', 'Data Updated Successfully');
    }

    /**
     * Delete record
     */
    public function destroy($id)
    {
        $info = Info::findOrFail($id);

        $info->delete();

        return redirect()->back()
                         ->with('success', 'Data Deleted Successfully');
    }
}