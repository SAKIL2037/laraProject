<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class CourseController extends Controller
{
    public function view_cse()
    {

        $students = Student::all()->where('department','cse');
    	return view('admin.cse',compact( 'students'));
    }
    public function deleteCse($id)
    {
        $student = Student::find($id);
        unlink( $student->image);
        Student::find($id)->delete();
        return redirect()->back();
    }

    public function view_swe()
    {
    	$students = Student::all()->where('department','swe');
        return view('admin.swe',compact( 'students'));
    }
     public function deleteSwe($id)
    {
        $student = Student::find($id);
        unlink( $student->image);
        Student::find($id)->delete();
        return redirect()->back();
    }

    public function view_bba()
    {
    	$students = Student::all()->where('department','bba');
        return view('admin.bba',compact( 'students'));
    }
      public function deleteBba($id)
    {
        $student = Student::find($id);
        unlink( $student->image);
        Student::find($id)->delete();
        return redirect()->back();
    }

    public function view_ece()
    {
    	$students = Student::all()->where('department','ece');
        return view('admin.ece',compact( 'students'));
    }
     public function deleteEce($id)
    {
        $student = Student::find($id);
        unlink( $student->image);
        Student::find($id)->delete();
        return redirect()->back();
    }

    public function view_eee()
    {
    	$students = Student::all()->where('department','eee');
        return view('admin.eee',compact( 'students'));
    }
     public function deleteEee($id)
    {
        $student = Student::find($id);
        unlink( $student->image);
        Student::find($id)->delete();
        return redirect()->back();
    }

    public function view_mba()
    {
    	$students = Student::all()->where('department','mba');
        return view('admin.mba',compact( 'students'));
    }
     public function deleteMba($id)
    {
        $student = Student::find($id);
        unlink( $student->image);
        Student::find($id)->delete();
        return redirect()->back();
    }

}
