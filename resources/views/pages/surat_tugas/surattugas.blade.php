@extends('template');

@section('pageTitle')
Surat Tugas
@endsection

@section('mainContent')
<div class="col-xl">
    <!-- Column Search -->
    <div class="card">
        <h5 class="card-header">Column Search</h5>
        <div class="card-datatable table-responsive pt-0">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Mahasiswa</th>
                        <th>NPM</th>
                        <th>Prodi</th>
                        <th>Dosen Pembimbing</th>
                        <th>Judul Skripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_mhs }}</td>
                        <td>{{ $d->npm }}</td>
                        <td>{{ $d->prodi }}</td>
                        <td>{{ $d->nama_dospem }}</td>
                        <td>{{ $d->judul_skripsi }}</td>
                        <td>
                            <button>button</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Column Search -->
</div>


@endsection
