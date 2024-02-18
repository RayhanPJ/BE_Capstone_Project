@extends('admin.template');

@section('pageTitle')
Surat Tugas
@endsection

@section('mainContentAdmin')

<div class="col-xl">

    <div class="row">
        <div class="col-md-5">
            <div class="alert alert-info position-relative" role="alert">
                <h4 class="alert-heading">Informasi!</h4>
                <p>Jangan lupa ketika klik tombol preview (icon mata warna biru), matikan idm agar dapat preview surat.</p>
                <button type="button" class="btn-close position-absolute top-0 end-0" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <!-- Column Search -->
    <div class="card">
        <h5 class="card-header">Pengajuan Surat</h5>
        <div class="card-datatable table-responsive pt-0">
            <table id="listdata" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Mahasiswa</th>
                        <th>NPM</th>
                        <th>Prodi</th>
                        <th width="140">Aktivitas</th>
                        <th>Tanggal Approve</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($d->created_at)->locale('id_ID')->isoFormat('D MMMM Y') }}</td>
                        <td>{{ $d->nama_mhs }}</td>
                        <td>{{ $d->npm }}</td>
                        <td>{{ $d->prodi }}</td>
                        <td>
                            @php
                            if ($d->jenis_surat == 'Surat Tugas') {
                            $folder = 'surat-tugas';
                            } elseif ($d->jenis_surat == 'Surat Izin Penelitian') {
                            $folder = 'surat-izin-penelitian';
                            } else {
                            $folder = '';
                            }
                            @endphp
                            <a href="#" class="btn btn-outline-info btn-sm" onclick="openPdfPreview('{{ route('surat-preview', ['folders' => $folder, 'file_path' => $d->file_path]) }}')">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            @if(!$d->status == 'disetujui' || !$d->status == 'ditolak')
                            {{-- button surat disetujui --}}
                            <form action="/setujui-surat/{{$d->id}}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" style="display: none;" class="btn btn-outline-success btn-sm">
                                    <i class="fa-solid fa-circle-check"></i>
                                </button>
                            </form>

                            {{-- button surat ditolak --}}
                            <button type="submit" style="display: none;" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModal-{{$d->id}}">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </button>

                            @else
                            {{-- button cancel --}}
                            <form action="/cancelsurattugas/{{ $d->id }}" method="POST" class="d-inline ms-2 align-top">
                                @csrf
                                @method('DELETE')
                                <button onclick="cancelSuratTugas()" class="btn btn-sm">
                                    <span class="badge rounded-pill bg-warning">Cancel</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td>
                            @if($d->status === 'disetujui')
                            {{ \Carbon\Carbon::parse($d->updated_at)->locale('id_ID')->isoFormat('D MMMM Y') }}
                            @endif
                        </td>
                        <td>
                            @if($d->status == 'disetujui')
                            <span class="badge badge-sm rounded-pill bg-label-success">Disetujui</span>

                            @elseif($d->status == 'ditolak')
                            <span class="badge badge-sm rounded-pill bg-label-danger">Ditolak</span>

                            @else
                            @endif
                        </td>
                    </tr>

                    <!-- Modal Reject -->
                    <div class="modal fade" id="myModal-{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Keterangan Reject</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form inside the modal -->
                                    <form action="/tidaksetuju-surat/{{$d->id}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="text-input" class="form-label">Masukkan
                                                Keterangan:</label>
                                            <input type="text" class="form-control" id="text-input" name="text_input" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal untuk menampilkan PDF -->
                    <div class="modal fade" id="pdfPreviewModal" tabindex="-1" role="dialog" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="pdfPreviewModalLabel">PDF Preview</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe id="pdfPreviewFrame" width="100%" height="500px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Column Search -->
</div>


@endsection
