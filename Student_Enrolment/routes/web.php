<?php



Route::get('/', function () {
    return view('student_login');
});


Route::get('/backend', function () {
    return view('admin.admin_login');
});

//admin
Route::post('/adminlogin','AdminController@login_dashboard')->name('adminlogin');
Route::get('/admin_dashboard','AdminController@adminDashboard');
Route::get('/logout','AdminController@logout');
Route::get('/viewProfile','AdminController@view_profile');
Route::get('/setting','AdminController@setting');

//student
Route::get('/allstudent','StudentController@allStudent');
Route::get('/addstudent','StudentController@addStudent');
Route::get('/tuitionfee','StudentController@tuitionFee');
Route::get('/result','StudentController@Result');
Route::post('/addStudentInfo','StudentController@addStudentInfo');

//delete student
Route::get('delete/student/{id}','StudentController@deleteStudent');
Route::get('view/student/info/{id}','StudentController@viewStudentInfo');




//course

Route::get('/cse','CourseController@view_cse');
Route::get('delete/course/cse/{id}','CourseController@deleteCse');

Route::get('/swe','CourseController@view_swe');
Route::get('delete/course/swe/{id}','CourseController@deleteSwe');

Route::get('/bba','CourseController@view_bba');
Route::get('delete/course/bba/{id}','CourseController@deleteBba');

Route::get('/ece','CourseController@view_ece');
Route::get('delete/course/ece/{id}','CourseController@deleteEce');

Route::get('/eee','CourseController@view_eee');
Route::get('delete/course/eee/{id}','CourseController@deleteEee');

Route::get('/mba','CourseController@view_mba');
Route::get('delete/course/mba/{id}','CourseController@deleteMba');



