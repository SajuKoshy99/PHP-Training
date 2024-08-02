@extends('layouts.master')
@section('title','New User')
@section('content')
<div class="container">
    <form action="{{ route('update.user') }}" method="POST">
       @csrf
       <input type="hidden" name="user_id" value="{{ encrypt($user->user_id) }}">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" value="{{ $user->name}}" class="form-control"  placeholder="Enter name">
          <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" value="{{ $user->email}}" class="form-control"  placeholder="Enter email">
        </div>
        <div class="form-group">
          <label>Date Of Birth</label>
          <input type="text" name="date_of_birth" value="{{ $user->date_of_birth_formated}}" class="form-control" placeholder="Enter Date Of Birth">
        </div>
        <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="status">
            <option value="1" @if ($user->status ==1) selected="selected" @endif>Active</option>
            <option value="0" @if ($user->status ==0) selected="selected" @endif>Inactive</option>
          </select>
          <p></p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection

<!--<div class="form-check">
  <input type="checkbox" class="form-check-input" id="exampleCheck1">
  <label class="form-check-label" for="exampleCheck1">Check me out</label>
</div>-->