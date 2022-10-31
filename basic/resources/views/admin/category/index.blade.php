<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories
            
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
                            <div class="card-header">All Categories</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Line no</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <th>{{ $categories->firstItem()+$loop->index }}</th>
                                            <td>{{ $category->user->name }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                @if($category->created_at == NULL)
                                                <span class='text-danger'> No Date Set</span>
                                                @else    
                                                {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ url('softDelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->links() }}
                            </div>
                        </div>                               
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Add Category
                            </div>
                            <div class="card-body">
                                <form action="{{ route('add.category') }}" method="POST">
                                    @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control">
                                    
                                    @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Add Category</button>
                                </form>
                            </div>
                        </div>
                    </div>                   
                </div>              
            </div>

            <!-- Trash List -->
            <div class="container pt-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Trash 🗑️</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Line no</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($delCategories as $category)
                                        <tr>
                                            <th>{{ $categories->firstItem()+$loop->index }}</th>
                                            <td>{{ $category->user->name }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-warning">Restore</a>
                                                <a href="{{ url('category/forceDel/'.$category->id) }}" class="btn btn-danger">Force Del</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $delCategories->links() }}
                            </div>
                        </div>                               
                    </div>
                    <div class="col-md-4">
                        
                    </div>                   
                </div>              
            </div>
        </div>
    </div>
</x-app-layout>