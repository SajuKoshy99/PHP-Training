@extends('layouts.master')
@section('title','Home')
@section('content')
    <h2>Users</h2>
    @if(session()->has('message'))
      <p>{{ session()->get('message') }}</p>
    @endif
    <h4>Welcome {{ auth()->user()->name }}</h4>
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    <!--<h2>{{ session()->get('date') }}</h2>-->
    <a href="{{ route('create.user') }}" class="btn btn-sm btn-primary" style="float: right">New</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $users->firstItem() + $loop->index}}</th>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>@if ($user->trashed()) Trashed @else Active @endif</td>
                <td>
                  @if ($user->trashed()) <a href="{{ route('activate.user',encrypt($user->user_id))}}" class="btn btn-success">Activate</a> @endif
                    <a href="{{ route('view.user',encrypt($user->user_id))}}" class="btn btn-info">View</a>
                    <a href="{{ route('edit.user',encrypt($user->user_id))}}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('delete.user',encrypt($user->user_id))}}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('force.delete.user',encrypt($user->user_id))}}" class="btn btn-warning">Force Delete</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
      <div>
        {{ $users->links() }}
      </div>
@endsection
    
