<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi... <b>{{ Auth::user()->name }}</b> <!-- Auth::user()->name --- name of current user  -->
            <b style="float:right;">Total users 
                <span class="badge bg-danger">{{ count($users) }}</span>
            </b>
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created</th>
    </tr>
  </thead>
  <tbody>
        @php ($i = 1)
      @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ carbon\carbon::parse($user->created_at)->diffForHumans() }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>
