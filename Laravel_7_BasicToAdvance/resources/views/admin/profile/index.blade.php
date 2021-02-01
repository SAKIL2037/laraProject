@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Update Profile
                </div>

                <div class="card-body">
                    @if(session('success'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif

                 <form action="{{ route('update.user') }}" method="post" enctype="multipart/form-data">
                     @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Brand Name" >

                        @error('name')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid  @enderror" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Brand Email" >

                        @error('email')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                        
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
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
