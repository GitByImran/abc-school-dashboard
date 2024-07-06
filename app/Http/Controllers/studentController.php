<?php

namespace App\Http\Controllers;

use App\Models\studentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    function saveOrUpdateData(Request $req)
    {
        if ($req->id) {
            $student = studentModel::find($req->id);
            $student->update($req->all());
            return redirect('/')->with('updateSuccess', 'Information updated successfully!');
        } else {
            studentModel::create($req->all());
            return redirect('/')->with('saveSuccess', 'Information saved successfully!');
        }
    }

    function getData()
    {
        $records = studentModel::paginate(8);
        return view('dashboard', ['students' => $records]);
    }

    function editData($id)
    {
        $student = studentModel::find($id);
        $records = studentModel::paginate(8);
        return view('dashboard', ['students' => $records, 'editStudent' => $student]);
    }

    function deleteData($id)
    {
        $student = studentModel::findOrFail($id);
        $studentName = $student->name;
        studentModel::destroy($id);
        return redirect('/')->with('deleteSuccess', "Student record deleted successfully! Name: $studentName");
    }
}
