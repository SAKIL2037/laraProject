@extends('layout')

@section('content')


 					 <table class="table">
                        <thead>
                            <tr>
                          <!--   <th scope="col">SL NO</th> -->
                            <th scope="col">Roll</th>
                            <th scope="col">Name</th>
                             <th scope="col">Phone</th>
                             <th scope="col">Image</th>
                           
                            <th scope="col">Address</th>
                            <th scope="col">Department Name</th>
                           <!--  <th scope="col">Admission Year</th>
                            
                            <th scope="col">Email</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Mother Name</th>
                             <th scope="col">Created At</th> -->
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                       @foreach($students as $student)
                            <tr>
                           <!--  <td>1</th> -->
                            <td>{{ $student->roll }}</td>
                            <td>{{ $student->name }}</td>
                             <td>{{ $student->phone }}</td>
                             <td>
                                <img src="{{ asset($student->image) }}" alt="" style="height: 60px; width:80px; ">
                            </td>
                             <td>{{ $student->address }}</td>
                            <td>{{ $student->department }}</td>
                           
                           
                          <!--   <td>{{ $student->admissionYear }}</td>
                           
                            
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->fatherName }}</td>
                            <td>{{ $student->motherName }}</td>
                            <td>{{ $student->created_at->diffforHumans() }}</td> -->
                            <td>
                                <a href="{{ url('view/student/info/'.$student->id) }}" class="btn btn-success">View</a>
                                <a href="#" class="btn btn-info">EDIT</a>
                                <a href="{{ url('delete/course/bba/'.$student->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to deleted')">DELETE</a>
                            </td>
                            </tr>
                       @endforeach
                        </tbody>
                    </table>
@endsection