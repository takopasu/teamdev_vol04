<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentIndexController extends Controller
{
    public function student_index()
    {
        return view('/admin/login/student_index');
    }
}