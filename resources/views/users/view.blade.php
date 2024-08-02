@extends('layouts.master')
@section('title','New User')
@section('content')
<div class="container">
        <ul>
          <li>Name : {{ $user->name }}</li>
          <li>Email : {{ $user->email}}</li>
          <li>Status : {{ $user->status_text}}</li>
        </ul>
        <hr>
        <ul>
          <li>Address Line 1 : {{ $user->address->address_line_1 }}</li>
          <li>City : {{ $user->address->city }}</li>
          <li>Phone : </li>
        </ul>
</div>
@endsection

<!--<div class="form-check">
  <input type="checkbox" class="form-check-input" id="exampleCheck1">
  <label class="form-check-label" for="exampleCheck1">Check me out</label>
</div>-->