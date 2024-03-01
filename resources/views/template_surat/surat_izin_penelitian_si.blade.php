<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>template surat</title>
    <style>
        table tr td {
            font-size: 13px;
        }

        body {
            margin-left: 5px;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        .img-stempel {
            position: absolute;
            left: 847px;
            bottom: -72px;
        }

        .left {
            width: 1px;
            position: relative;
            right: 100px;
            top: -50px;
            float: left;
        }

    </style>
</head>

<body>
    <center>
        <table border="0">
            <tr>
                <td><img src="{{ public_path('/template/assets/img/surat/logo_unsika.png') }}" width="120" height="120" alt=""></td>
                <td>
                    <center>
                        <font size="5">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN</font> <br>
                        <font size="5">RISET, DAN TEKNOLOGI</font> <br>
                        <font size="4">UNIVERSITAS SINGAPERBANGSA KARAWANG</font> <br>
                        <font size="4"><strong>FAKULTAS ILMU KOMPUTER</strong></font> <br>
                        <font size="3">Jalan HS. Ronggowaluyo Telukjambe Timur Karawang 41361</font> <br>
                        <font size="3">Laman : unsika.ac.id, email : fasilkom@unsika.ac.id</font> <br>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr width="500">
                </td>
            </tr>
        </table>

        <br>

        <table border="0" width="500">
            <tr>
                <td align="right">
                    <font size="3">Karawang, {{ \Carbon\Carbon::parse($data['created_at'])->locale('id_ID')->isoFormat('D MMMM Y') }}</font>
                </td>
            </tr>
        </table>

        <br>

        <table border="0" width="580">
            <tr>
                <td>
                    <font size="3">Nomor</font>
                </td>

                <td width="572">: <font size="3">{{ $data->nomor_surat}}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Lampiran</font>
                </td>
                <td width="572">: -</td>
            </tr>
            <tr>
                <td>
                    <font size="3">Perihal</font>
                </td>
                <td width="572">: <font size="3">Permohonan Izin Penelitian</font>
                </td>
            </tr>
        </table>


        <br>
        <table border="0" width="580">
            <tr>
                <td>
                    <font size="3">Yth. <br> {{ $data['tujuan_instansi'] }} <br> di <br> {{ $data['domisili_instansi'] }}
                    </font>
                </td>
            </tr>
        </table>
        <br>

        <table border="0" width="580">
            <tr>
                <td>
                    <font size="3">Dipermaklumkan dengan hormat, sehubungan dengan Penelitian Skripsi yang harus
                        dilaksanakan <br> di luar kampus Fakultas Ilmu Komputer Universitas Singaperbangsa
                        Karawang, <br> kami mohon bagi mahasiswa di bawah ini :</font>
                </td>
            </tr>
        </table>

        <br>

        <table border="0" width="400">
            <tr>
                <td>
                    <font size="3">Nama</font>
                </td>
                <td>
                    <font size="3">: {{ $data['nama_mhs'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">NPM</font>
                </td>
                <td>
                    <font size="3">: {{ $data['npm'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Program Studi</font>
                </td>
                <td>
                    <font size="3">: S1 - {{ $data['prodi'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Jenjang Pendidikan</font>
                </td>
                <td>
                    <font size="3">: Sarjana (S1)</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Judul Penelitian</font>
                </td>
                <td>
                    <font size="3">: {{ $data['judul_penelitian'] }}</font>
                </td>
            </tr>
        </table>


        <br>
        <table border="0" width="580">
            <tr>
                <td>
                    <font size="3">Mahasiswa tersebut bermaksud melakukan penelitian dan Permohonan Data yang
                        berkaitan dengan kegiatan/ <br> pembelajaran di Instansi/Perusahaan yang Bapak/Ibu Pimpin selama
                        6
                        (Enam) bulan terhitung dari tanggal <br> pembuatan surat ini.
                    </font>
                </td>
            </tr>
        </table>

        <br>
        <table border="0" width="580">
            <tr>
                <td>
                    <font size="3">Demikian disampaikan, atas perhatian dan perkenannya kami ucapkan terima kasih.
                    </font>
                </td>
            </tr>
        </table>


        <br>
        <br>
        <table border="0" width="580">
            <tr>
                <td width="340"></td>
                <td align="left">
                    <font size="3">A.n Dekan,</font>
                    <br>
                    <font size="3">Koor. Program Studi</font>
                    <br><br>
                    <div class="container">
                        <div class="left">
                            <img src="{{ public_path('/template/assets/img/surat/stempel.png') }}" width="180" alt="">
                        </div>
                        <div>
                            <img src="{{ public_path('/template/assets/img/surat/ttd.png') }}" width="160" alt="">
                        </div>
                    </div>
                    <br>
                    <font size="3">Azhari Ali Ridha, S.Kom., M.M.S.I</font>
                    <br>
                    <font size="3">NIDN : 003048503</font>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
