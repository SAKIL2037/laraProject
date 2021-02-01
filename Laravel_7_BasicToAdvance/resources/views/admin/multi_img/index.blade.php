@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           @if(session('success'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
            <div class="card-deck">
              @foreach($images as $multi_img)
               <div class="col-md-4 mt-4">
              <div class="card">
                <img class="card-img-top" src="{{ asset($multi_img->image) }}" alt="Card image cap">
                <div class="card-body">
                 
                </div>
                <div class="card-footer">
                 <a href="{{ url('multiImage/Delete/'.$multi_img->id) }}" title="" class="btn btn-danger">Delete</a>
                </div>
              </div>
 </div>
              @endforeach
              
            </div>
            
          </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
               Add Brand
                </div>

                <div class="card-body">
                   
                 
                 <form action="{{ route('store.image') }}" method="post" enctype="multipart/form-data">
                     @csrf
                      
                       <div class="form-group">
                        <label for="exampleInputEmail1">Multiple Image</label>
                        <input type="file" class="form-control @error('image') is-invalid  @enderror" name="image[]" id="image[]" aria-describedby="emailHelp" multiple>

                        @error('image')

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
