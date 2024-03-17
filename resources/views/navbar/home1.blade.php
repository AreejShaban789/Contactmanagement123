@extends('layouts.master')
@section('content')
<br><br>
<div class="container"> 
    <br>
    <h1 class="" style="color: #2487c0">Contact Management System</h1>
    <br>
    <div class="text-end mb-4">
        <div>
            <a class="btn btn-success" href="{{ route('contact.create') }}">Add Contact</a>
        </div>
    </div> 
    <table id="contacts-table" class="table table-stripped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Contacts will be dynamically inserted here -->
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Function to fetch contacts from the backend
    function fetchContacts() {
        $.ajax({
            url: '/contacts', // Change to the appropriate endpoint
            type: 'GET',
            success: function(response) {
                // Clear existing contacts
                $('#contacts-table tbody').empty();
                
                // Iterate over each contact in the response and append to the table
                $.each(response, function(index, contact) {
                    $('#contacts-table tbody').append(`
                        <tr>
                            <td>${contact.id}</td>
                            <td>${contact.name}</td>
                            <td>${contact.email}</td>
                            <td>${contact.phone}</td>
                            <td>${contact.address}</td>
                            <td>
                                <a class="btn btn-primary" href="/contacts/edit/${contact.id}"><i class="fa fa-edit"></i>Edit</a>
                                <button class="btn btn-danger delete-contact" data-id="${contact.id}"><i class="fa fa-trash"></i>Delete</button>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Call the fetchContacts function when the page is ready
    fetchContacts();

    // Delete contact click handler
    $(document).on('click', '.delete-contact', function() {
        var contactId = $(this).data('id');
        if (confirm('Are you sure you want to delete this contact?')) {
            $.ajax({
                url: '/contacts/delete/' + contactId, // Change to the appropriate endpoint
                type: 'DELETE',
                success: function(response) {
                    alert(response.message);
                    fetchContacts(); // Reload contacts after deletion
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error deleting contact. Please try again.');
                }
            });
        }
    });
});
</script>

@endsection
@extends('layouts.master')
@section('content')
<br><br>
<div class="container"> 
    <br>
    <h1 class="" style="color: #2487c0">Contact Management System</h1>
    <br>
    <div class="text-end mb-4">
        <div>
            <a class="btn btn-success" href="{{ route('contact.create') }}">Add Contact</a>
        </div>
    </div> 
    <table id="contacts-table" class="table table-stripped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Contacts will be dynamically inserted here -->
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Function to fetch contacts from the backend
    function fetchContacts() {
        $.ajax({
            url: '/contacts', // Change to the appropriate endpoint
            type: 'GET',
            success: function(response) {
                // Clear existing contacts
                $('#contacts-table tbody').empty();
                
                // Iterate over each contact in the response and append to the table
                $.each(response, function(index, contact) {
                    $('#contacts-table tbody').append(`
                        <tr>
                            <td>${contact.id}</td>
                            <td>${contact.name}</td>
                            <td>${contact.email}</td>
                            <td>${contact.phone}</td>
                            <td>${contact.address}</td>
                            <td>
                                <a class="btn btn-primary" href="/contacts/edit/${contact.id}"><i class="fa fa-edit"></i>Edit</a>
                                <button class="btn btn-danger delete-contact" data-id="${contact.id}"><i class="fa fa-trash"></i>Delete</button>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Call the fetchContacts function when the page is ready
    fetchContacts();

    // Delete contact click handler
    $(document).on('click', '.delete-contact', function() {
        var contactId = $(this).data('id');
        if (confirm('Are you sure you want to delete this contact?')) {
            $.ajax({
                url: '/contacts/delete/' + contactId, // Change to the appropriate endpoint
                type: 'DELETE',
                success: function(response) {
                    alert(response.message);
                    fetchContacts(); // Reload contacts after deletion
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error deleting contact. Please try again.');
                }
            });
        }
    });
});
</script>

@endsection
