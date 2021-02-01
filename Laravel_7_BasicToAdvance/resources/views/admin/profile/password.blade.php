@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">
               Change Password
                </div>

                <div class="card-body">
                    @if(session('success'))
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif

                 <form action="{{ route('update.password') }}" method="post" enctype="multipart/form-data">
                     @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Old Password</label>
                        <input type="password" class="form-control @error('old_password') is-invalid  @enderror" name="old_password" id="old_password" aria-describedby="emailHelp" placeholder="Enter Old Password" >

                        @error('old_password')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid  @enderror" name="new_password" id="new_password" aria-describedby="emailHelp" placeholder="Enter New Password" >

                        @error('new_password')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <input type="password" class="form-control @error('confirm_password') is-invalid  @enderror" name="confirm_password" id="confirm_password" aria-describedby="emailHelp" placeholder="Enter Confirm Password" >

                        @error('confirm_password')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                        
                      </div>
                     
                      <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
                   
                   
                </div>
            </div>
        </div>
        <div class="col-md-4">
           <div class="card" style="width: 18rem;">
               <img src="{{ asset('img\Sakil Mia.jpg') }}" alt="" style="height: 200px; width:200px; ">
               
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">{{ Auth::user()->name }}</li>
                  <li class="list-group-item">{{ Auth::user()->email }}</li>
                  <li class="list-group-item">
                    <a href="{{ route('change.password') }}" title="">Change Password</a>
                  </li>
                 
                </ul>
               
              </div>
        </div>
    </div>
    
</div>
@endsection
