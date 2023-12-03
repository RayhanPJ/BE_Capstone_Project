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
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-number"></i></span>
                        <input type="text" id="basic-icon-default-company" name="npm" class="form-control numeric-input npm" placeholder="" aria-label="20106311xxxxx" aria-describedby="basic-icon-default-company2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Prodi</label>
                    <div class="input-group input-group-merge">

                        {{-- <select class="form-select" name="prodi" aria-label="Default select example"> --}}
                        <select id="select2IconsProdi" name="prodi" class="select2-icons form-select">
                            <option value="Informatika" data-icon="ti ti-notebook">Informatika</option>
                            <option value="Sistem Informasi" data-icon="ti ti-notebook">Sistem Informasi</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Nama Dosen Pembimbing</label>
                    <div class="input-group input-group-merge">
                        <select id="select2IconsDospem" name="nama_dospem" class="select2-icons form-select">
                            <option value="Adhi Rizal, MT." data-icon="ti ti-user">Adhi Rizal, MT.</option>
                            <option value="Agung Susilo Yuda Irawan, M.Kom." data-icon="ti ti-user">Agung Susilo Yuda Irawan, M.Kom.</option>
                            <option value="Aji Primajaya, S.Si., M.Kom." data-icon="ti ti-user">Aji Primajaya, S.Si., M.Kom.</option>
                            <option value="Apriade Voutama, M.Kom." data-icon="ti ti-user">Apriade Voutama, M.Kom.</option>
                            <option value="Aries Suharso, S.Si., M.Kom." data-icon="ti ti-user">Aries Suharso, S.Si., M.Kom.</option>
                            <option value="Arip Solehudin, M.Kom." data-icon="ti ti-user">Arip Solehudin, M.Kom.</option>
                            <option value="Asep Jamaludin, S.Si., M.Kom. ">Asep Jamaludin, S.Si., M.Kom. </option>
                            <option value="Azhari Ali Ridha, S.Kom., MMSI." data-icon="ti ti-user">Azhari Ali Ridha, S.Kom., MMSI.</option>
                            <option value="Bambang Suteja, S.H., M.Si." data-icon="ti ti-user">Bambang Suteja, S.H., M.Si.</option>
                            <option value="Betha Nurina Sari, M.Kom." data-icon="ti ti-user">Betha Nurina Sari, M.Kom.</option>
                            <option value="Budi Arif Dermawan, M.Kom." data-icon="ti ti-user">Budi Arif Dermawan, M.Kom.</option>
                            <option value="Carudin, M.Kom." data-icon="ti ti-user">Carudin, M.Kom.</option>
                            <option value="Chaerur Rozikin, M.Kom" data-icon="ti ti-user">Chaerur Rozikin, M.Kom</option>
                            <option value="Dadang Yusup, M.Kom." data-icon="ti ti-user">Dadang Yusup, M.Kom.</option>
                            <option value="Didi Juardi, S.T., M.Kom." data-icon="ti ti-user">Didi Juardi, S.T., M.Kom.</option>
                            <option value="Garno, M.Kom." data-icon="ti ti-user">Garno, M.Kom.</option>
                            <option value="H. Bagja Nugraha, ST., M.Kom." data-icon="ti ti-user">H. Bagja Nugraha, ST., M.Kom.</option>
                            <option value="Hannie, S.Kom., MMSI" data-icon="ti ti-user">Hannie, S.Kom., MMSI</option>
                            <option value="Hilmansyah Saefullah, S.Pd., M.Pd." data-icon="ti ti-user">Hilmansyah Saefullah, S.Pd., M.Pd.</option>
                            <option value="Intan Purnamasari, M.kom." data-icon="ti ti-user">Intan Purnamasari, M.kom.</option>
                            <option value="Iqbal Maulana, S.Si., M.Sc." data-icon="ti ti-user">Iqbal Maulana, S.Si., M.Sc.</option>
                            <option value="Jajam Haerul Jaman, S.E., M.Kom." data-icon="ti ti-user">Jajam Haerul Jaman, S.E., M.Kom.</option>
                            <option value="Kamal Prihandani, M.Kom." data-icon="ti ti-user">Kamal Prihandani, M.Kom.</option>
                            <option value="M. Jajuli, M.Si." data-icon="ti ti-user">M. Jajuli, M.Si.</option>
                            <option value="Maharani Nurdin, S.H., M.H." data-icon="ti ti-user">Maharani Nurdin, S.H., M.H.</option>
                            <option value="Nina Sulistiyowati, S.T., M.Kom. " data-icon="ti ti-user">Nina Sulistiyowati, S.T., M.Kom. </option>
                            <option value="Nono Heryana, M.Kom." data-icon="ti ti-user">Nono Heryana, M.Kom.</option>
                            <option value="Oman Komarudin, S.Si., M.Kom. " data-icon="ti ti-user">Oman Komarudin, S.Si., M.Kom. </option>
                            <option value="Purwantoro, M.Kom. " data-icon="ti ti-user">Purwantoro, M.Kom. </option>
                            <option value="Ratna Mufidah, M.Kom." data-icon="ti ti-user">Ratna Mufidah, M.Kom. </option>
                            <option value="Rini Mayasari, M.Kom. " data-icon="ti ti-user">Rini Mayasari, M.Kom. </option>
                            <option value="Riza Ibnu Adam, M.Si." data-icon="ti ti-user">Riza Ibnu Adam, M.Si. </option>
                            <option value="Siska, M.kom." data-icon="ti ti-user">Siska, M.kom. </option>
                            <option value="Slamet Abadi, M.Si" data-icon="ti ti-user">Slamet Abadi, M.Si </option>
                            <option value="Susilawati, M.Si." data-icon="ti ti-user">Susilawati, M.Si. </option>
                            <option value="Tesa Nur Padilah, S.Si., M.Sc." data-icon="ti ti-user">Tesa Nur Padilah, S.Si., M.Sc. </option>
                            <option value="Totoh Tauhidin Abas, S.Pd., M.Pd." data-icon="ti ti-user">Totoh Tauhidin Abas, S.Pd., M.Pd. </option>
                            <option value="Ultach Enri, M.Kom." data-icon="ti ti-user">Ultach Enri, M.Kom. </option>
                            <option value="Wahyudin Fitriyana, M.Pd" data-icon="ti ti-user">Wahyudin Fitriyana, M.Pd </option>
                            <option value="Yuyun Umaidah, M.Kom." data-icon="ti ti-user">Yuyun Umaidah, M.Kom. </option>
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

                <div class="mb-3">
                    <label for="select2Icons" class="form-label">Icons</label>
                    <select id="select2Icons" class="select2-icons form-select">
                        <optgroup label="Services">
                            <option value="bootstrap5" data-icon="ti ti-brand-bootstrap" selected>Bootstrap 5</option>
                            <option value="codepen" data-icon="ti ti-brand-codepen">Codepen</option>
                            <option value="php" data-icon="ti ti-brand-php">PHP</option>
                            <option value="pinterest2" data-icon="ti ti-brand-css3">CSS3</option>
                            <option value="html5" data-icon="ti ti-brand-html5">HTML5</option>
                        </optgroup>
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>


@endsection
