@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                 All Brand
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

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Image</th>
                            <th scope="col">Created AT</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                       @foreach($brands as $brand)
                            <tr>
                            <th scope="row">{{ $brands->firstItem()+$loop->index  }}</th>
                            <td>{{ $brand->brand_name }}</td>
                            <td>
                                <img src="{{ asset($brand->brand_image) }}" alt="" style="height: 60px; width:80px; ">
                            </td>
                            <td>{{ $brand->created_at->diffforHumans() }}</td>
                            <td>
                                <a href="{{ url('Brand/Edit/'.$brand->id) }}" class="btn btn-info">EDIT</a>
                                <a href="{{ url('Delete/Brand/'.$brand->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to deleted')">DELETE</a>
                            </td>
                            </tr>
                       @endforeach
                        </tbody>
                    </table>
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
               Add Brand
                </div>

                <div class="card-body">
                   
                 
                 <form action="{{ route('store.brand') }}" method="post" enctype="multipart/form-data">
                     @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input type="text" class="form-control @error('brand_name') is-invalid  @enderror" name="brand_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name">

                        @error('brand_name')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Brand Image</label>
                        <input type="file" class="form-control @error('brand_image') is-invalid  @enderror" name="brand_image" id="brand_image" aria-describedby="emailHelp">

                        @error('brand_image')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                        
                      </div>
                     
                      <button type="submit" class="btn btn-primary">ADD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
