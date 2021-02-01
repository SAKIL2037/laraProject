<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Student;
use Image;

class StudentController extends Controller
{
    public function allStudent()
    {
    	
        $students = Student::paginate(5);

        return view('admin.all_student',compact('students'));
    }
     public function addStudent()
    {
    	return view('admin.add_student');
    }
    public function tuitionFee()
    {
    	return view('admin.tuition_fee');
    }
    public function Result()
    {
    	return view('admin.result');
    }


    public function addStudentInfo(Request $request)
    {
       

        $image = $request->file('image');

        $name_gen=hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(200,200)->save('admin/img/student/'.$name_gen);
        $last_img ='admin/img/student/'.$name_gen;


        Student::insert([

                'name' => $request->name,
                'roll' => $request->roll,
                'fatherName' => $request->fatherName,
                'motherName' => $request->motherName,
                'email' => $request->email,
                'phone' => $request->phone,
                'department' => $request->departmentName,
                'address' => $request->address,
                'admissionYear' => $request->admissionYear,
                'password' => $request->password,
                'image' => $last_img,
                'created_at' => Carbon::now()


        ]);

         return redirect()->back()->with('success','Student Successfuly Insert'); 

    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        unlink($student->image);
        Student::find($id)->delete();

        return redirect()->back(); 
    }



    public function viewStudentInfo($id)
    {
        $student = Student::find($id);

        return view('admin.view_student_info',compact('student'));
    }
}
