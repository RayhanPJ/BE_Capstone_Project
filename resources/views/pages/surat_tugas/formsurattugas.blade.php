@extends('template');

@section('pageTitle')
Surat Tugas
@endsection

@section('mainContent')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Surat Tugas</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('surattugas.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Nama Mahasiswa</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                        <input type="text" class="form-control alphabet-input" name="nama_mhs" id="basic-icon-default-fullname" placeholder="" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">NPM</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-circle-5"></i></span>
                        <input type="text" id="basic-icon-default-company" name="npm" class="form-control numeric-input npm" placeholder="" aria-label="20106311xxxxx" aria-describedby="basic-icon-default-company2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Prodi</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <select class="form-select" name="prodi" aria-label="Default select example">
                            <option value="Informatika">Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Nama Dosen Pembimbing</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                        <select class="form-select" name="nama_dospem" aria-label="Default select example">
                            <option value="Adhi Rizal, MT.">Adhi Rizal, MT.</option>
                            <option value="Agung Susilo Yuda Irawan, M.Kom.">Agung Susilo Yuda Irawan, M.Kom.</option>
                            <option value="Aji Primajaya, S.Si., M.Kom.">Aji Primajaya, S.Si., M.Kom.</option>
                            <option value="Apriade Voutama, M.Kom.">Apriade Voutama, M.Kom.</option>
                            <option value="Aries Suharso, S.Si., M.Kom.">Aries Suharso, S.Si., M.Kom.</option>
                            <option value="Arip Solehudin, M.Kom.">Arip Solehudin, M.Kom.</option>
                            <option value="Asep Jamaludin, S.Si., M.Kom. ">Asep Jamaludin, S.Si., M.Kom. </option>
                            <option value="Azhari Ali Ridha, S.Kom., MMSI.">Azhari Ali Ridha, S.Kom., MMSI.</option>
                            <option value="Bambang Suteja, S.H., M.Si.">Bambang Suteja, S.H., M.Si.</option>
                            <option value="Betha Nurina Sari, M.Kom.">Betha Nurina Sari, M.Kom.</option>
                            <option value="Budi Arif Dermawan, M.Kom.">Budi Arif Dermawan, M.Kom.</option>
                            <option value="Carudin, M.Kom.">Carudin, M.Kom.</option>
                            <option value="Chaerur Rozikin, M.Kom">Chaerur Rozikin, M.Kom</option>
                            <option value="Dadang Yusup, M.Kom.">Dadang Yusup, M.Kom.</option>
                            <option value="Didi Juardi, S.T., M.Kom.">Didi Juardi, S.T., M.Kom.</option>
                            <option value="Garno, M.Kom.">Garno, M.Kom.</option>
                            <option value="H. Bagja Nugraha, ST., M.Kom.">H. Bagja Nugraha, ST., M.Kom.</option>
                            <option value="Hannie, S.Kom., MMSI">Hannie, S.Kom., MMSI</option>
                            <option value="Hilmansyah Saefullah, S.Pd., M.Pd.">Hilmansyah Saefullah, S.Pd., M.Pd.</option>
                            <option value="Intan Purnamasari, M.kom.">Intan Purnamasari, M.kom.</option>
                            <option value="Iqbal Maulana, S.Si., M.Sc.">Iqbal Maulana, S.Si., M.Sc.</option>
                            <option value="Iqbal Maulana, S.Si., M.Sc.">Iqbal Maulana, S.Si., M.Sc.</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Judul Skripsi</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-message2" class="input-group-text"><i class="ti ti-book"></i></span>
                        <textarea id="basic-icon-default-message" name="judul_skripsi" class="form-control" placeholder=""></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>


@endsection
