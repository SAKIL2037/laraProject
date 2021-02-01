
@extends('layout')

@section('content')

<div class="content-wrapper">
        
          <div class="row user-profile">
            <div class="col-lg-6 side-left">
              <div class="card mb-6">
                <div class="card-body avatar">
                 
                  <img src="{{ asset($student->image)}}" alt="">
                  <p class="name">{{ $student->name }}</p>
                  <p class="designation"> Student</p>
                  <a class="email" href="#">Roll: {{ $student->roll }}</a>
                  <a class="email" href="#">{{ $student->email }}</a>
                  <a class="number" href="#">{{ $student->phone }}</a>
                </div>
              </div>
              <div class="card mb-6">
                <div class="card-body overview">
                 
                  <div class="wrapper about-user">
                    <h2 class="card-title mt-4 mb-3">About</h2>
                    <p></b>outside</p>
                  </div>
                  <div class="info-links">
                    
                      <i class="icon-globe icon">Father Name : {{ $student->fatherName }}</i></br>
                      <i class="icon-globe icon">Mother Name : {{ $student->motherName }}</i></br>
                      <i class="icon-globe icon">Address : {{ $student->address }}</i></br>
                      
                  </div>
                </div>
              </div>
            </div>
           
          </div>
	
</div>

@endsection



  