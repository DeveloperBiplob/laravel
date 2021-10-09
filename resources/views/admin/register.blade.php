@extends('layouts.app')
@section('title', 'Admin Register')
@section('app-content')
    <div class="register-page">
        <div class="register-box">
            <div class="card">
              <div class="card-body register-card-body">
                <h3 class="login-box-msg">Admin Register</h3>
          
                <form action="{{ route('admin.register') }}" method="post">
                    @csrf
                  <div class="input-group mb-3">
                    <input type="text" class="form-control @error('name', 'post') is-invalid @enderror" placeholder="Full name" name="name">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email', 'post') is-invalid @enderror" placeholder="Email" name="email">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password', 'post') is-invalid @enderror" placeholder="Password" name="password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  @error('password')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror
                  <div class="input-group mb-3">
                    <input type="password" class="form-control @error('con_password', 'post') is-invalid @enderror" placeholder="Retype password" name="con_password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  @error('con_password')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <div class="row">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                         I agree to the <a href="#">terms</a>
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
          
                <div class="social-auth-links text-center">
                  <p>- OR -</p>
                  <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                  </a>
                  <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                  </a>
                </div>
          
                <a href="{{ route('admin.login') }}" class="text-center">I already have a membership</a>
              </div>
              <!-- /.form-box -->
            </div><!-- /.card -->
          </div>
          <!-- /.register-box -->
    </div>
@endsection