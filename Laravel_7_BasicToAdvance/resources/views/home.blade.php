@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Hi...{{Auth::user()->name}}<span class="badge badge-success">Active Now</span>
                <b style="float:right;">Total Users <span class="badge badge-danger">{{count($users)}}</span></b>
                </div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created AT</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($users as $user)
                            <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffforHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
