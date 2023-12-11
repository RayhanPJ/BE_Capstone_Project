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

        <table border="0" align="center">
            <tr>
                <td>
                    <center>
                        <font size="4"><strong>SURAT TUGAS</strong></font> <br>
                        <font size="3">Nomor : 2479/UN64.7/KP/2023</font> <br>
                    </center>
                </td>
            </tr>
        </table>

        <br>

        <table border="0" width="600">
            <tr>
                <td>
                    <font size="3">Dekan Fakultas Ilmu Komputer Universitas Singaperbangsa Karawang, dengan ini</font>
                    <br>
                    <font size="3">menugaskan nama berikut:</font>
                </td>
            </tr>
        </table>

        <br>
        <table border="0" align="center">
            <tr>
                <td>
                    <font size="3"><strong>{{ $data['nama_dospem'] }}</strong></font>
                </td>
            </tr>
        </table>

        <br>

        <table border="0" width="600">
            <tr>
                <td>
                    <font size="3">Untuk melaksanakan tugas sebagai dosen pembimbing proposal skripsi mahasiswa/i:
                    </font>
                </td>
            </tr>
        </table>

        <br>

        <table border="0" width="500">
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
                <td width="100">
                    <font size="3">Program Studi</font>
                </td>
                <td>
                    <font size="3">: {{ $data['prodi'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Topik Utama</font>
                </td>
                <td>
                    <font size="3">: {{ $data['judul_skripsi'] }}</font>
                </td>
            </tr>
        </table>
        <br>
        <table border="0" width="500">
            <tr>
                <td align="justify">
                    <font size="3">Surat tugas ini mulai berlaku sejak tanggal ditetapkan dengan ketentuan dikemudian
                        hari terdapat kekeliruan didalamnya akan dilakukan perbaikan sebagaimana mestinya dan berakhir pada tanggal 21 Mei 2024.</font>
                </td>
            </tr>
        </table>
        <br>
        <table border="0" width="600">
            <tr>
                <td>
                    <font size="3">Surat tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab.
                    </font>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <table border="0" width="600">
            <tr>
                <td width="340"></td>
                <td align="left">
                    <font size="3">Karawang, {{ \Carbon\Carbon::parse($data['created_at'])->locale('id_ID')->isoFormat('D MMMM Y') }}</font> <br>
                    <font size="3">Dekan,</font>
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
                    <font size="3">Dr. Oman Komarudin, S.Si., M.Kom.</font>
                    <br>
                    <font size="3">NIP : 197704062021211004</font>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
