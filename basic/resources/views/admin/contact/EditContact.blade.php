@extends('admin.admin_master')
@section('admin')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Update Contact</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/contact/update/'.$contact->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Address</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                    name="address" value="{{ $contact->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                    name="email" value="{{ $contact->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Phone no</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                    name="phone" value="{{ $contact->phone }}">
                                </div>
                                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>                      
                </div>         
            </div>              
        </div>
    </div>
</div>

@endsection