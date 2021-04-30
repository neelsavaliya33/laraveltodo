@extends('layouts.front')
@section('content')
    <div class="container-fluid register-background">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-lg-6 offset-0 offset-sm-1 offset-lg-3">
                    <form class="login-form" id="login-form" method="POST" action="{{ route('save-user',$employ->id) }}">
                        @csrf
                        <div class="title">
                            Password
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" disabled value="{{ $employ->email }}" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="********">
                                @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                                placeholder="********">
                            @error('password_confirmation')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-theme mt-3" id="login-submit">
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
    </div>
@endsection
