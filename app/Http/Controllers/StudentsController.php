<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudent;
use Illuminate\Support\Facades\Form;

class StudentsController extends Controller
{

    public function view($id){

        return view('students/profile');

    }/**/

    public function store(StoreStudent $request,Student $student,int $id)
    {
        $data = $request->all()['Student'];
       $student = Student::firstOrNew(array('user_id' => $id));

       foreach($data as $col =>$val){
           $student->{$col} = $val;
       }

           $student->save();

      
    }
    //
}/* end of Controller */
