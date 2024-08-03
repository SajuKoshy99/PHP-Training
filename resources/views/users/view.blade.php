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
        </ul>
        <hr>
        <h5>Orders</h5>
        <table class="table">
          <thead>
            <tr>
              <td>OrderID</td>
              <td>Price</td>
              <td>Status</td>
              <td>Placed At</td>
            </tr>
          </thead>
          <tbody>
            @foreach ($user->orders as $order)
            <tr>
              <td>{{ $order->order_id }}</td>
              <td>{{ number_format($order->price,2) }}</td>
              <td>{{ $order->status_text }}</td>
              <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
</div>
@endsection

<!--<div class="form-check">
  <input type="checkbox" class="form-check-input" id="exampleCheck1">
  <label class="form-check-label" for="exampleCheck1">Check me out</label>
</div>-->