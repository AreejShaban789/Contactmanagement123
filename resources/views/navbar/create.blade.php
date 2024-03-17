@extends('layouts.master')
@section('content')
<br><br><br>
<div class="container">
    <form action="{{ $contacts->id !=null ? route('contact.update',['id'=>$contacts->id]): route('contact.store') }}" method="post" enctype="multipart/form-data">
   
        @csrf
        <label>Name:</label>
<input class="form-control" type="text" placeholder="Enter Name" value="{{  $contacts->name }}" name="name" required>

<label>Email:</label>
<input class="form-control" type="email" placeholder="Enter Email" value="{{  $contacts->email }}" name="email" required>

        <label>Phone No:</label>
<input class="form-control" type="number" placeholder="Enter Phone No" value="{{  $contacts->phone }}" name="phone" required>

        <label>Address:</label>
        <textarea class="form-control" placeholder="Enter Address" name="address" required>{{ $contacts->address }}</textarea>
        
<br>

<input class="btn btn-danger" type="submit" value="Save">
    </form>
</div>
<br>
@endsection