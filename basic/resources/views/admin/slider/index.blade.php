@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close text-success" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">All Sliders</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Line no</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <th>{{ $sliders->firstItem()+$loop->index }}</th>
                                        <td>{{ $slider->title }}</td>
                                        <td><img src="{{ asset($slider->img) }}" style="height:40px; width:auto"></td>
                                        <td>{{ $slider->description }}</td>
                                        <td>
                                            <a href="" class="btn btn-warning mb-1">Edit</a>
                                            <a href="" class="btn btn-danger" onclick="return confirm('Confirm your delete')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $sliders->links() }}
                        </div>
                    </div>                               
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Slider
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control">
                                
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
                                
                                @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Slider Image</label>
                                <input type="file" name="img" class="form-control">
                                
                                @error('brand_img')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-outline-primary">Add Slider</button>
                            </form>
                        </div>
                    </div>
                </div>                   
            </div>              
        </div>
    </div>
</div>
@endsection