  @extends('loginTemplate')

  @section('pageTitle')
<<<<<<< HEAD
    Forgot Password
  @endsection

  @section('authPage')
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0" style="background-image: url('https://elshinta.com/asset/upload/article/2022/februari/2215_ELSHINTADOTCOM_20220208_12.jpg'); background-size: cover; height: 100vh; background-position: right top;">
          {{-- <div
            class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center"
          >
            <img
              src="{{ asset('/template/assets/img/illustrations/auth-forgot-password-illustration-light.png')}}"
              alt="auth-forgot-password-cover"
              class="img-fluid my-5 auth-illustration"
              data-app-light-img="illustrations/auth-forgot-password-illustration-light.png"
              data-app-dark-img="illustrations/auth-forgot-password-illustration-dark.png"
            />

            <img
              src="{{ asset('/template/assets/img/illustrations/bg-shape-image-light.png')}}"
              alt="auth-forgot-password-cover"
              class="platform-bg"
              data-app-light-img="illustrations/bg-shape-image-light.png"
              data-app-dark-img="illustrations/bg-shape-image-dark.png"
            />
          </div> --}}
        </div>
        <!-- /Left Text -->

        <!-- Forgot Password -->
        <div
          class="d-flex col-12 col-lg-5 col-xl-4 align-items-center p-sm-5 p-4"
        >
          <div class="w-px-400 mx-auto">
            <h3 class="mb-1 fw-bold">Forgot Password? 🔒</h3>
            <p class="mb-4">
              Enter your email and we'll send you instructions to reset your
              password
            </p>
            <form
              id="formAuthentication"
              class="mb-3"
              action="{{route('password.email')}}"
              method="POST"
            >
            @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  autofocus
                />
              </div>
              <button type="submit" class="btn btn-primary d-grid w-100">
                Send Reset Link
              </button>
            </form>
            <div class="text-center">
              <a
                href="{{route('login')}}"
                class="d-flex align-items-center justify-content-center"
              >
                <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                Back to login
              </a>
            </div>
          </div>
        </div>
        <!-- /Forgot Password -->
      </div>
    </div>
  @endsection
    
=======
  Forgot Password
  @endsection

  @section('authPage')
  <!-- Content -->

  <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row">
          <!-- /Left Text -->
          <div class="d-none d-lg-flex col-lg-7 p-0" style="background-image: url('https://elshinta.com/asset/upload/article/2022/februari/2215_ELSHINTADOTCOM_20220208_12.jpg'); background-size: cover; height: 100vh; background-position: right top;">
          </div>
          <!-- /Left Text -->

          <!-- Forgot Password -->
          <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center p-sm-5 p-4">
              <div class="w-px-400 mx-auto">
                  <h3 class="mb-1 fw-bold">Lupa Password? 🔒</h3>
                  <p class="mb-4">
                      Masukkan alamat email Anda dan kami akan mengirimkan instruksi untuk mereset kata sandi Anda.
                  </p>

                  {{-- jika email tidak terdaftar --}}
                  @if($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif

                  {{-- jika email berhasil terkirim --}}
                  @if(session()->get('status'))
                  <div class="alert alert-success">
                      {{ session()->get('status') }}
                  </div>
                  @endif

                  <form id="formAuthentication" class="mb-3" action="{{route('password.email')}}" method="POST">
                      @csrf
                      <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email" autofocus />
                      </div>
                      <button type="submit" class="btn btn-primary d-grid w-100">
                          Kirim Link Reset
                      </button>
                  </form>
                  <div class="text-center">
                      <a href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
                          <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                          Kembali login
                      </a>
                  </div>
              </div>
          </div>
          <!-- /Forgot Password -->
      </div>
  </div>
  @endsection
>>>>>>> surat-bebas-pustaka
