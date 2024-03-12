@extends('template');

@section('pageTitle')
Home
@endsection

@section('mainContent')
<div class="col-lg mb-4">
    <div class="container-xxl">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Home /</span> Pembuatan Surat</h4>
        <!-- Examples -->
        <div class="row mb-5">
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/template/assets/img/backgrounds/surat-izin-penelitian.png') }}" alt="Surat Izin Penelitian" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Izin Penelitian</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque tenetur delectus architecto eos placeat voluptas voluptate!
                        </p>
                        <a href="{{ route('suratizinpenelitian.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/template/assets/img/backgrounds/surat-keterangan-aktif-kuliah.png') }}" alt="Surat Keterangan Aktif Kuliah" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Keterangan Aktif Kuliah</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque tenetur delectus architecto eos placeat voluptas voluptate!
                        </p>
                        <a href="{{ route('suratketeranganaktif.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/template/assets/img/backgrounds/surat-keterangan-aktif-kuliah-ortu-pns.png') }}" alt="Surat Keterangan Aktif Kuliah (Orang Tua PNS)" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Keterangan Aktif Kuliah (Orang Tua PNS)</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque tenetur delectus.
                        </p>
                        <a href="{{ route('suratketeranganaktifortupns.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/template/assets/img/backgrounds/surat-bebas-pustaka.png') }}" alt="Surat Bebas Pustaka" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Bebas Pustaka</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque tenetur delectus architecto.
                        </p>
                        <a href="{{ route('suratbebaspustaka.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/template/assets/img/backgrounds/surat-pengajuan-cuti.png') }}" alt="Surat Keterangan Cuti" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Pengajuan Cuti</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque tenetur delectus architecto.
                        </p>
                        <a href="{{ route('suratpengajuancuti.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
