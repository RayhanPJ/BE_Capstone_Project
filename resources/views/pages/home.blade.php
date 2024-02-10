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
                    <img class="card-img-top" src="{{ asset('/template/assets/img/elements/surat-tugas.png') }}" alt="Surat Tugas" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Tugas (Contoh)</h5>
                        <p class="card-text">
                            Ini hanyalah percontohan saja untuk mencoba fitur create form input surat dikarenakan belum adanya template yang rill.
                        </p>
                        <a href="{{ route('surattugas.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
