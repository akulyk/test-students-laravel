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
        $students = $student->sortable(['rates'=>'desc'])->paginate(50);
        $data['students'] = & $students;
        return view('home',$data);
    }
}
