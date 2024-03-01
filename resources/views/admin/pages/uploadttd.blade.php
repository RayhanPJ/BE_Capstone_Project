@extends('admin.template');

@section('pageTitle')
Admin Profile
@endsection

@section('mainContentAdmin')


<!-- Admin Profile Content -->
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
        <div class="col-xl-8 col-lg-7 col-md-7">
            <div class="card mb-4">
                <h5 class="card-header">Upload TTD</h5>
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{ route('change.ttd') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="penanda_tangan">Penanda Tangan</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="penanda_tangan" class="form-control" name="penanda_tangan" placeholder="Masukkan penanda tangan" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="ttd_image">TTD Image</label>
                                <div class="input-group input-group-merge">
                                    <input type="file" name="ttd_image" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                    <label for="upload" class="form-control">Pilih file</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="nama_pimpinan">Nama Pimpinan</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="nama_pimpinan" class="form-control" name="nama_pimpinan" placeholder="Masukkan nama pimpinan" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update TTD</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

<!--/ Admin Profile Content -->

@endsection
