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
        $records = DB::table('students')->paginate(6);
        return view('dashboard', ['students' => $records]);
    }

    function editData($id)
    {
        $student = studentModel::find($id);
        return view('dashboard', ['students' => studentModel::get(), 'editStudent' => $student]);
    }

    function deleteData($id)
    {
        // Fetch the student's record
        $student = studentModel::findOrFail($id);

        // Get the student's name
        $studentName = $student->name;

        // Delete the student's record
        studentModel::destroy($id);

        // Redirect with the success message including the student's name
        return redirect('/')->with('deleteSuccess', "$studentName record deleted successfully!");
    }
}
