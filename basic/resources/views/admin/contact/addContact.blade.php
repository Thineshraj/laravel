@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Create Contact</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.contact') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Address</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                    name="address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">Email</label>
                                    <input type="text" class="form-control"
                                    name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">Phone no</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                    name="phone" placeholder="Phone number">
                                </div>
                                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                    <button type="submit" class="btn btn-primary btn-default">Add Contact</button>
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