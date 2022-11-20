@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                   <div class="d-flex flex-row flex-wrap bd-highlight">
                        @foreach ($images as $image)
                        <div class="mb-3 mr-3">
                            <img src='{{ asset($image->images) }}' style="width: 300px"/>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Images
                        </div>
                        <div class="card-body">
                            <form action="{{ route('images.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Multi Images</label>
                                <input type="file" name="images[]" class="form-control" multiple=''>
                                
                                @error('images')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-outline-primary">Add Images</button>
                            </form>
                        </div>
                    </div>
                </div>                   
            </div>              
        </div>
    </div>
</div>

@endsection