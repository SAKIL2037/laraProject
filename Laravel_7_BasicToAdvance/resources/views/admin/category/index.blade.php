@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
               All Category
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
                            <th scope="col">Category Name</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Created AT</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                       @foreach($categories as $category)
                            <tr>
                            <th scope="row">{{ $categories->firstItem()+$loop->index  }}</th>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->user_id }}</td>
                            <td>{{ $category->addeduser->name }}</td>
                            <td>{{ $category->created_at->diffforHumans() }}</td>
                            <td>
                                <a href="{{ url('Category/Edit/'.$category->id) }}" class="btn btn-info">EDIT</a>
                                <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">DELETE</a>
                            </td>
                            </tr>
                       @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
               Add Category
                </div>

                <div class="card-body">
                   
                 
                 <form action="{{ route('store.category') }}" method="post">
                     @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Add Category</label>
                        <input type="text" class="form-control @error('category_name') is-invalid  @enderror" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">

                        @error('category_name')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                        
                      </div>
                     
                      <button type="submit" class="btn btn-primary">ADD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
               Trash List
                </div>

                <div class="card-body">
                    <!-- @if(session('success'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif -->

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Created AT</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                       @foreach($trashCat as $category)
                            <tr>
                            <th scope="row">{{ $trashCat->firstItem()+$loop->index  }}</th>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->user_id }}</td>
                            <td>{{ $category->addeduser->name }}</td>
                            <td>{{ $category->created_at->diffforHumans() }}</td>
                            <td>
                                <a href="{{ url('Category/restore/'.$category->id) }}" class="btn btn-info">reStore</a>
                                <a href="{{ url('Category/pDelete/'.$category->id) }}" class="btn btn-danger">P-DELETE</a>
                            </td>
                            </tr>
                       @endforeach
                        </tbody>
                    </table>
                    {{ $trashCat->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
@endsection
