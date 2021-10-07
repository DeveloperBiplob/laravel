@extends('layouts.app')
@section('title', 'User Password Reset')
@section('app-content')
    <div class="login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card">
              <div class="card-body login-card-body">
                <h3 class="login-box-msg">User Reset Password</h3>
          
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  @error('email')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
          
                <p class="mb-1 ml-3">
                  <a href="{{ route('login') }}">Back To Login Page</a>
                </p>
              </div>
              <!-- /.login-card-body -->
            </div>
          </div>
          <!-- /.login-box -->
    </div>
@endsection