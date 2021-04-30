@extends('layouts.front')
@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
            Admin
            <h3>Invite User</h3>
            <a href="{{route('admin.logout')}}">Logout</a>
            <form action="{{ route('invite-user') }}" method="POST">
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="email" placeholder="User email">
                    @error('email')
                        <i class="error">{{ $message }}</i>
                    @enderror
                    <button type="submit" class="btn btn-theme mt-3" id="login-submit">
                        @csrf
                        <div class="spinner-border text-light" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span>Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
