<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudent;
use Illuminate\Support\Facades\Form;

class StudentsController extends Controller
{

    public function view(int $id){
        $student = Student::firstOrNew(array('user_id' => $id));
        $user = User::find(\Auth::user()->id);

        return view('students/profile',['student'=>$student,'user'=>$user]);

    }/**/

    public function store(StoreStudent $request,Student $student,int $id)
    {
        $data = $request->all()['Student'];
       $student = Student::firstOrNew(array('user_id' => $id));

       foreach($data as $col =>$val){
           $student->{$col} = $val;
       }

           $student->save();
        $request->session()->flash('success', 'Profile updated!');
        return redirect(route('profile',['id'=>$id]));
    }
    //
}/* end of Controller */
