@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <a href="{{ route('contact.add') }}" class='btn btn-primary text-dark'>Add Contact</a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">All Contacts</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone No</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        <th>{{ $contacts->firstItem()+$loop->index }}</th>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            <a href="{{ url('admin/contact/edit/'.$contact->id) }}" class="btn btn-warning mb-1">Edit</a>
                                            <a href="{{ url('admin/contact/delete/'.$contact->id) }}" class="btn btn-danger" onclick="return confirm('Confirm your delete')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                      
                        </div>
                    </div>                               
                </div>         
            </div>              
        </div>
    </div>
</div>

@endsection