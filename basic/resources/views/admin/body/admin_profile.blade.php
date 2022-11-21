@extends('admin.admin_master')
@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Update Profile</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.profile.update') }}" method="POST" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">User Name</label>
                <input type="text" class="form-control" name="name"  value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">User Email</label>
                <input type="email" class="form-control" name="email"  value="{{ $user->email }}">
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@endsection