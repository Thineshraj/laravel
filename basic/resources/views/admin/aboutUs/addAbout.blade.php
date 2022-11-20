@extends('admin.admin_master')
@section('admin')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Create About</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.about') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Title</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                    name="title" placeholder="About Title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Short Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                    name="short_desc" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea2">Long Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea2" 
                                    name="long_desc" rows="3"></textarea>
                                </div>
                                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
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