@extends('admin.template');

@section('pageTitle')
Surat Tugas
@endsection

@section('mainContentAdmin')

<div class="col-xl">
    <!-- Column Search -->
    <div class="card">
        <h5 class="card-header">Pengajuan Surat</h5>
        <div class="card-datatable table-responsive pt-0">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Mahasiswa</th>
                        <th>NPM</th>
                        <th>Prodi</th>
                        <th>Aktivitas</th>
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
                            <a href="#" class="btn btn-outline-primary btn-sm" onclick="openPdfPreview('{{ asset(route('surattugas-preview', ['file_path' => $d->file_path])) }}')">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <button type="button" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-circle-check"></i></button>
                            <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-circle-xmark"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Column Search -->
</div>

<!-- Modal untuk menampilkan PDF -->
<div class="modal fade" id="pdfPreviewModal" tabindex="-1" role="dialog" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfPreviewModalLabel">PDF Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="pdfPreviewFrame" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection