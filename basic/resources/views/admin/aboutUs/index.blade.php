@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <a href="{{ route('aboutUs.add') }}" class='btn btn-primary text-dark'>Add about</a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">All Abouts</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Short Desc</th>
                                    <th scope="col">Long Desc</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aboutUs as $about)
                                    <tr>
                                        <th>{{ $aboutUs->firstItem()+$loop->index }}</th>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->short_desc }}</td>
                                        <td>{{ $about->long_desc }}</td>
                                        <td>
                                            <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-warning mb-1">Edit</a>
                                            <a href="{{ url('about/delete/'.$about->id) }}" class="btn btn-danger" onclick="return confirm('Confirm your delete')">Delete</a>
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