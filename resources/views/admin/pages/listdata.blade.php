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
                            <button type="submit" class="btn btn-outline-primary btn-sm"><i
                                    class="fa-solid fa-eye"></i></button>

                            {{-- button disetujui --}}
                            <form action="/setujui-surat/{{$d->id}}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-success btn-sm"><i
                                        class="fa-solid fa-circle-check"></i></button>
                            </form>
                            
                            <button type="submit" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModal-{{$d->id}}">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </button>

                            <!-- Modal -->
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
                                                    <label for="text-input" class="form-label">Masukkan Keterangan:</label>
                                                    <input type="text" class="form-control" id="text-input" name="text_input" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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