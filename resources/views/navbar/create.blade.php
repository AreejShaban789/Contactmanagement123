{{-- @extends('layouts.master')

@section('content')
<br><br><br>
<div class="container">
    <form id="add-contact-form" action="{{ $contacts->id ? route('contact.update', ['id' => $contacts->id]) : route('contact.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($contacts->id)
            @method('PUT')
        @endif

        <label>Name:</label>
        <input class="form-control" type="text" placeholder="Enter Name" value="{{  $contacts->name ?? '' }}" name="name" required>

        <label>Email:</label>
        <input class="form-control" type="email" placeholder="Enter Email" value="{{  $contacts->email ?? '' }}" name="email" required>

        <label>Phone No:</label>
        <input class="form-control" type="number" placeholder="Enter Phone No" value="{{  $contacts->phone ?? '' }}" name="phone" required>

        <label>Address:</label>
        <textarea class="form-control" placeholder="Enter Address" name="address" required>{{ $contacts->address ?? '' }}</textarea>

        <br>
        <input class="btn btn-danger" type="submit" value="Save">
    </form>
</div>
<br>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Submit form data using AJAX
        $('#contact-form').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData,
                success: function(response) {
                    // Handle success response
                    alert(response.message);
                    window.location.href = '{{ route("contact.index") }}'; // Redirect to contacts index page
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    alert('An error occurred while saving the contact.');
                }
            });
        });
    });
</script>
@endsection --}}
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
