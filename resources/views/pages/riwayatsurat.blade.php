@extends('template');

@section('pageTitle')
Riwayat Surat
@endsection

@section('mainContent')

<div class="col-xl">
    <div class="card">
        <h5 class="card-header">Riwayat Surat</h5>
        <div class="card-datatable table-responsive pt-0">
            <table class="table table-striped" ref="dataTable" id="riwayat-surat">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Masuk</th>
                        <th>Jenis Surat</th>
                        <th>Nama Mahasiswa</th>
                        <th>NPM</th>
                        <th>Prodi</th>
                        <th>Keterangan Ditolak</th>
                        <th>Tanggal Approve</th>
                        <th>Selisih Hari</th>
                        <th>Aktivitas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($d->created_at)->locale('id_ID')->isoFormat('D MMMM Y') }}</td>
                        <td>{{ $d->jenis_surat }}</td>
                        <td>{{ $d->nama_mhs }}</td>
                        <td>{{ $d->npm }}</td>
                        <td>{{ $d->prodi }}</td>
                        <td>
                            @if($d->keterangan == null)
                            <p class="text-center">-</p>
                            @else
                            {{ $d->keterangan }}
                            @endif
                        </td>
                        <td>
                            @if($d->status === 'disetujui')
                            {{ \Carbon\Carbon::parse($d->updated_at)->locale('id_ID')->isoFormat('D MMMM Y') }}
                            @else
                            <p class="text-center">-</p>
                            @endif
                        </td>
                        <td>
                            @php
                            $tanggalMasuk = $d->created_at;
                            $tanggalSelesai = $d->updated_at;

                            $selisihHari = $tanggalMasuk->diffInDays($tanggalSelesai);
                            @endphp

                            @if($selisihHari > 7)
                            <span style="color: red;">{{ $selisihHari }} Hari</span>
                            @else
                            {{ $selisihHari }} Hari
                            @endif
                        </td>
                        <td>
                            @if($d->status == 'disetujui')
                            <a href="{{ route('download-surat', ['file_path' => $d->file_path]) }}" class="badge bg-info rounded-pill me-2">
                                Download
                            </a>
                            @elseif($d->status == '')
                            <span class="badge rounded-pill bg-warning">Pending</span>
                            @elseif($d->status == 'ditolak')
                            <span class="badge rounded-pill bg-danger">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
