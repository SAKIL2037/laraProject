@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
               Edit Brand
                </div>

                <div class="card-body">
                   
                 
                 <form action="{{ url('Update/Brand/'.$brand->id) }}" method="post" enctype="multipart/form-data">
                     @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input type="text" class="form-control @error('brand_name') is-invalid  @enderror" name="brand_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name" value="{{ $brand->brand_name }}">

                        @error('brand_name')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Brand Image</label>
                        <input type="file" class="form-control @error('brand_image') is-invalid  @enderror" name="brand_image" id="brand_image" aria-describedby="emailHelp" ><br>

                         <img src="{{ asset($brand->brand_image) }}" alt="" style="height: 100px; width:150px; ">
                         <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">

                        @error('brand_image')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                        
                      </div>
                     
                      <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
