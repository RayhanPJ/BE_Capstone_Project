<<<<<<< HEAD
@extends('loginTemplate');

@section('pageTitle')
    Reset Password
@endsection

@section('authPage')
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
          <div
            class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center"
          >
            <img
              src="../../assets/img/illustrations/auth-reset-password-illustration-light.png"
              alt="auth-reset-password-cover"
              class="img-fluid my-5 auth-illustration"
              data-app-light-img="illustrations/auth-reset-password-illustration-light.png"
              data-app-dark-img="illustrations/auth-reset-password-illustration-dark.png"
            />

            <img
              src="../../assets/img/illustrations/bg-shape-image-light.png"
              alt="auth-reset-password-cover"
              class="platform-bg"
              data-app-light-img="illustrations/bg-shape-image-light.png"
              data-app-dark-img="illustrations/bg-shape-image-dark.png"
            />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Reset Password -->
        <div
          class="d-flex col-12 col-lg-5 col-xl-4 align-items-center p-4 p-sm-5"
        >
          <div class="w-px-400 mx-auto">
            <h3 class="mb-1 fw-bold">Reset Password 🔒</h3>
            <p class="mb-4">
              for <span class="fw-bold">john.doe@email.com</span>
            </p>
            <form
              id="formAuthentication"
              class="mb-3"
              action="{{route('password.update')}}"
              method="POST"
            >
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">New Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control toggle-password-input"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                  />
                  <span
                    class="input-group-text cursor-pointer toggle-password"
                    data-target="password"
                  >
                    <i class="ti ti-eye-off"></i>
                  </span>
                </div>
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="confirm-password"
                  >Confirm Password</label
                >
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="confirm-password"
                    class="form-control toggle-password-input"
                    name="confirm-password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                  />
                  <span
                    class="input-group-text cursor-pointer toggle-password"
                    data-target="confirm-password"
                  >
                    <i class="ti ti-eye-off"></i>
                  </span>
                </div>
              </div>
              <button type="submit" class="btn btn-primary d-grid w-100 mb-3">
                Set new password
              </button>
              <div class="text-center">
                <a href="auth-login-cover.html">
                  <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                  Back to login
                </a>
              </div>
            </form>
          </div>
        </div>
        <!-- /Reset Password -->
      </div>
    </div>
@endsection
    
=======
  @extends('loginTemplate')

  @section('pageTitle')
  Reset Password
  @endsection

  @section('authPage')
  <!-- Content -->

  <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row">
          <!-- /Left Text -->
          <div class="d-none d-lg-flex col-lg-7 p-0" style="background-image: url('https://elshinta.com/asset/upload/article/2022/februari/2215_ELSHINTADOTCOM_20220208_12.jpg'); background-size: cover; height: 100vh; background-position: right top;">
          </div>
          <!-- /Left Text -->

          <!-- Reset Password -->
          <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center p-4 p-sm-5">
              <div class="w-px-400 mx-auto">
                  <h3 class="mb-1 fw-bold">Reset Password 🔒</h3>
                  <p class="mb-4">
                      untuk <span class="fw-bold">{{ $email }}</span>
                  </p>

                  @if($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif

                  <form class="mb-3" action="{{ route('password.update') }}" method="post">
                      @csrf
                      <input type="hidden" name="token" value="{{ request()->token }}">
                      <input type="hidden" name="email" value="{{ request()->email }}">
                      <div class="mb-3 form-password-toggle">
                          <label class="form-label" for="password">Password Baru</label>
                          <div class="input-group input-group-merge">
                              <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                              <span class="input-group-text cursor-pointer" id="togglePassword">
                                  <i class="ti ti-eye-off"></i>
                              </span>
                          </div>
                      </div>
                      <div class="mb-3 form-password-toggle">
                          <label class="form-label" for="password_confirmation">Konfirmasi Password Baru</label>
                          <div class="input-group input-group-merge">
                              <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                              <span class="input-group-text2 cursor-pointer" id="toggleNewPassword">
                                  <i class="ti ti-eye-off"></i>
                              </span>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary d-grid w-100 mb-3">
                          Set Password Baru
                      </button>
                      <div class="text-center">
                          <a href="auth-login-cover.html">
                              <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                              Kembali login
                          </a>
                      </div>
                  </form>
              </div>
          </div>
          <!-- /Reset Password -->

      </div>
  </div>
  @endsection
>>>>>>> surat-bebas-pustaka
