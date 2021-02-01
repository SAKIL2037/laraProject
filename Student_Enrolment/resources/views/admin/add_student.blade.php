@extends('layout')

@section('content')

	

 <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                     @if(session('success'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                      <div class="card-body">
                          <h2 class="card-title">ADD STUDENT</h2>
                          <form class="forms-sample" method="post" action="{{ url('addStudentInfo')}}" enctype="multipart/form-data">
                          	{{ csrf_field() }}
                          	<div class="form-group">
                                  <label for="exampleInputPassword1">Name</label>
                                  <input type="text" class="form-control p-input" name="name" id="name" placeholder="Enter Your Name" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Roll</label>
                                  <input type="text" class="form-control p-input" name="roll" id="roll" placeholder="Enter Your Roll" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Father Name</label>
                                  <input type="text" class="form-control p-input" name="fatherName" id="fatherName" placeholder="Enter Father Name" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Mother Name</label>
                                  <input type="text" class="form-control p-input" name="motherName" id="motherName" placeholder="Enter Your Mother Name" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Email address</label>
                                  <input type="email" class="form-control p-input" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Phone</label>
                                  <input type="text" class="form-control p-input" name="phone" id="phone" placeholder="Enter Phone Number" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Department Name</label>
                  									 <select name="departmentName" id="departmentName" class="form-control p-input" required>
                  										  <option value="cse">CSE</option>
                  										  <option value="swe">SWE</option>
                  										  <option value="bba">BBA</option>
                  										  <option value="eee">EEE</option>
                  										  <option value="ece">ECE</option>
                  										  <option value="mba">MBA</option>
                  										</select>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Address</label>
                                  <input type="text" class="form-control p-input" name="address" id="address" placeholder="Enter Address" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Admission Year</label>
                                  <input type="date" class="form-control p-input" name="admissionYear" id="admissionYear" placeholder="Enter Admission Year" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control p-input" id="password" name="password" placeholder="Password" required>
                              </div>
                            
                              <div class="form-group">
                                  <label>Upload Image</label>
                                  <div class="row">
                                    <div class="col-12">
                                     
                                     <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                                      <input type="file" class="form-control-file" name="image" id="exampleInputFile2" aria-describedby="fileHelp" required>
                                     
                                     
                                    </div>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-success">Submit</button>
                          </form>
                      </div>
                  </div>
              </div>


@endsection