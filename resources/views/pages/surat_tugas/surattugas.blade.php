@extends('template');

@section('pageTitle')
Surat Tugas
@endsection

@section('mainContent')
<div class="col-xl">
    <!-- Column Search -->
    <div class="card">
        <h5 class="card-header">List Surat Tugas</h5>
        <div class="card-datatable text-nowrap">
            <table class="dt-column-search table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Nama Mahasiswa</th>
                        <th>NPM</th>
                        <th>Prodi</th>
                        <th>Judul Skripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>03 Desember 2023</td>
                        <td>Gilang Maulana</td>
                        <td>2010631170075</td>
                        <td>Informatika</td>
                        <td>Implementasi Framework Laravel</td>
                        <td>
                            <button>button</button>
                            <button>button</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Column Search -->
</div>

@endsection
