@extends('template');

@section('pageTitle')
User Profile
@endsection

@section('mainContent')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">User Profile /</span> Profile
</h4>

<!-- Header -->
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="user-profile-header-banner">
                <img src="{{ asset('/template/assets/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top" />
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <img src="{{ asset('/template/assets/img/avatars/user_profile.png') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4>{{ auth()->user()->name }}</h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                <li class="list-inline-item">
                                    <i class="ti ti-color-swatch"></i> Mahasiswa
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti ti-map-pin"></i> Universitas Singaperbangsa Karawang
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti ti-calendar"></i> Joined {{ $createdAt->format('F Y') }}
                                </li>
                            </ul>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-primary">
                            <i class="ti ti-user-check me-1"></i>Connected
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Header -->

<!-- Navbar pills -->
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-sm-row mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);">
                    <i class="ti-xs ti ti-user-check me-1"></i>Profile
                </a>
            </li>
            <li class="nav-item mx-3">
                @if (session('success'))
                <div class="alert alert-success">
                    <b>{{ session('success') }}</b>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </li>
        </ul>
    </div>
</div>
<!--/ Navbar pills -->

<!-- User Profile Content -->
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
        <!-- About User -->
        <div class="card mb-4">
            <div class="card-body">
                <small class="card-text text-uppercase">About</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-user"></i><span class="fw-bold mx-2">Nama Lengkap:</span>
                        <span>{{ $user->name }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-number"></i><span class="fw-bold mx-2">NPM:</span>
                        <span>{{ $user->npm }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-pencil"></i><span class="fw-bold mx-2">Semester:</span>
                        <span>{{ $user->mahasiswa->semester ?? '' }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-notebook"></i><span class="fw-bold mx-2">Prodi:</span>
                        <span>{{ $user->mahasiswa->prodi ?? '' }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-flag"></i><span class="fw-bold mx-2">Domisili:</span>
                        <span>{{ $user->mahasiswa->domisili ?? '' }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-crown"></i><span class="fw-bold mx-2">Role:</span>
                        <span>Mahasiswa</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-help"></i><span class="fw-bold mx-2">Status:</span>
                        <span>{{ $user->mahasiswa->status ?? '' }}</span>
                    </li>
                </ul>
                <small class="card-text text-uppercase">Contacts</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span>
                        <span>{{ $user->mahasiswa->no_hp ?? '' }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <!--/ About User -->
    </div>
    <div class="col-xl-8 col-lg-7 col-md-7">
        <!-- Activity Timeline -->
        <div class="card card-action mb-4">
            <div class="card-header align-items-center">
                <h5 class="card-action-title mb-0">Lengkapi Profile</h5>
            </div>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ asset('/template/assets/img/avatars/user_profile.png') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                            <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>

                        <div class="text-muted">
                            Allowed JPG, GIF or PNG. Max size of 800K
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body pb-0">
                <form method="post" action="{{ route('user.lengkapiprofile',  ['id' => auth()->id()]) }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Nama Mahasiswa</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                            <input type="text" class="form-control alphabet-input" name="nama_mhs" id="basic-icon-default-fullname" value="{{ auth()->user()->name }}" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">NPM</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"></span>
                            <input type="text" id="basic-icon-default-company" name="npm" class="form-control numeric-input npm" value="{{ auth()->user()->npm }}" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Semester</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"></span>
                            <input type="number" id="basic-icon-default-company" name="semester" class="form-control numeric-input" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Prodi</label>
                        <div class="input-group input-group-merge">
                            <select name="prodi" class="select2-icons form-select">
                                <option value="Informatika" data-icon="ti ti-notebook">Informatika</option>
                                <option value="Sistem Informasi" data-icon="ti ti-notebook">Sistem Informasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Domisili</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"></span>
                            <input type="text" id="basic-icon-default-company" name="domisili" class="form-control" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Status</label>
                        <div class="input-group input-group-merge">
                            <select name="status" class="select2-icons form-select">
                                <option value="Aktif">Aktif</option>
                                <option value="Lulus">Lulus</option>
                                <option value="Drop Out">Drop Out</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">No HP</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"></span>
                            <input type="number" id="basic-icon-default-phone" name="no_hp" class="form-control phone-mask numeric-input" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ User Profile Content -->

@endsection
