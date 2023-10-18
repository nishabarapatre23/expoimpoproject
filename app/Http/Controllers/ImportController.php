<?php

namespace App\Http\Controllers;

use App\Imports\UnitImport;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use  function Laravel\Prompts\table;

use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    //
    public function import()
    {
        return view('import');
    }
    public function import_exel(Request $request)
    {
        $data = new Unit();
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        $data = $request->file('file');
        // dd($data);
        Excel::import(new UnitImport, $data);
        return redirect('/file-import')->with('msg', 'Excel Data Stored');
    }

    public function table()
    {
        return view('table',);
    }
    public function fetch()
    {
        $data = Unit::all();
        return response()->json($data);
    }

//edit
    public function edit(Request $request)
    {
        $id = $request->route('id');
        if ($id == 'edit') {
            $edit_id = $request->input('edit_id');
            $data = Unit::find($edit_id);
            if ($data) {
                return response()->json($data);
            } else {
                return response()->json('No record found');
            }
        } else{
            return response()->json('Failed');
        }
    }

    //update
    public function update(Request $request)
{
    $edit_id=$request->input('edit_id');
    $data = Unit::find($edit_id);
    $data-> section = $request->input('section');
    $data->deficiency_title = $request->input('deficiency_title');
    $data->deficiency_criteria = $request->input('deficiency_criteria');

    $data->criteria_detail = $request->input('criteria_detail');
    $data->note = $request->input('note');
    $data-> health_and_safety = $request->input('health_and_safety');
    $data->correction_time_frame = $request->input('correction_time_frame');
    // dd($data);
    $data->save();
    return response()->json(['message' => 'Item updated successfully']);
    if (!$data) {
        return response()->json(['message' => 'Item not found'], 404);
    }
}

//delete

public function delete(Request $request, $id)
    {
        if ($id === 'delete') {
            $delete_id = $request->input('delete_id');
            $data = Unit::find($delete_id);
            // dd($data);
            if(!$data){
                return response()->json(['error' => 'No Record Found'], 404);
            }
            $data->delete();
            return response()->json(['message' => 'Data deleted successfully']);
        }
    }
    public function export_data()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }
}
