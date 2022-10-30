<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brands
            
        </h2>
    </x-slot>

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
                            <div class="card-header">All Brands</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Line no</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Brand Image</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                        <tr>
                                            <th>{{ $brands->firstItem()+$loop->index }}</th>
                                            <td>{{ $brand->brand_name }}</td>
                                            <td><img src="{{ asset($brand->brand_img) }}" style="height:40px; width:auto"></td>
                                            <td>{{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $brands->links() }}
                            </div>
                        </div>                               
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Add Brand
                            </div>
                            <div class="card-body">
                                <form action="{{ route('brand.add') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" name="brand_name" class="form-control">
                                    
                                    @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                    <input type="file" name="brand_img" class="form-control">
                                    
                                    @error('brand_img')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-outline-primary">Add Brand</button>
                                </form>
                            </div>
                        </div>
                    </div>                   
                </div>              
            </div>
        </div>
    </div>
</x-app-layout>