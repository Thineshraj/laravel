@extends('admin.admin_master')
@section('admin')

<div class="card card-default">
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close text-danger" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.password.update') }}" method="POST" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="oldPassword"  placeholder="Current Password">

                @error('oldPassword')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" class="form-control" id="password" name="new_password"  placeholder="New Password">

                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  placeholder="Confirm Password">

                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@endsection