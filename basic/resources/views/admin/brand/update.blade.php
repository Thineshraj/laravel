<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Brand
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Update Brand
                            </div>
                            <div class="card-body">
                                <form action="{{ url('brand/update/'.$brands->id) }}" method='POST' enctype='multipart/form-data'>
                                    @csrf
                                    <input type="hidden" name='old_img' value='{{ $brands->brand_img }}'>
                                <div class="mb-3">
                                    <label for="brandName" class="form-label">Update Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" value="{{ $brands->brand_name }}">
                                    @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="brandImg" class="form-label">Update Brand Image</label>
                                    <input type="file" name="brand_img" class="form-control" value="{{ $brands->brand_img }}">
                                    @error('brand_img')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class='mb-3'>
                                    <img src="{{asset($brands->brand_img)}}" alt="brand-image" style="height: 100px">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Update Category</button>
                                </form>
                            </div>
                        </div>
                    </div>                   
                </div>              
            </div>
        </div>
    </div>
</x-app-layout>