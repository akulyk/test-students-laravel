<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student, Request $request)
    {
        $data = [];
        $query = $student->sortable(['rates'=>'desc']);

        if($q = $request->input('q')){
            $this->validate($request,[
              'q' =>'string|max:255'
            ]);

          $this->prepareSearchQuery($query,$q);

        }

        $students = $query->paginate(50);
        $data['students'] = & $students;
        return view('home',$data);
    }/**/


    protected function prepareSearchQuery(& $query,$q){
        $query->whereRaw("LOWER(`firstname`) LIKE LOWER('%$q%')");
        $query->orWhereRaw("LOWER(`lastname`) LIKE LOWER('%$q%')");
        $query->orWhereRaw("LOWER(`group_number`) LIKE LOWER('%$q%')");
        $query->orWhereRaw("LOWER(`rates`) ='$q'");


    }
}
