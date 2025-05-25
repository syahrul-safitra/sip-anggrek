<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            /* height: 100vh; */
        }

        .container {
            width: 700px;
            margin: 0 auto;
        }

        .kopsurat {
            padding: 20px 20px 5px 20px;
            display: flex;
            justify-content: center;
        }

        .kopsurat img {
            width: 65px;
        }

        .table-1 {
            padding: 3px;
            /* width: 100%; */
            /* border-bottom: 5px solid black; */
        }

        .tengah {
            text-align: center;
            padding: 0 20px;
        }

        .garis {
            width: 100%;
            height: 3px;
            background-color: black;
            margin-bottom: 5px;
        }

        .main {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .main th,
        .main td {
            padding: 5px;
        }

        .main .no {
            text-align: center;
            /* background-color: aqua; */
        }
    </style>
</head>

<body>

    <div class="container">
        {{-- <div class="kopsurat">
            <table class="table-1">
                <tr>
                    <td>
                        <img src="{{ asset('img/logo_uin.png') }}" alt="" />
                    </td>

                    <td class="tengah">
                        <h4>KEMENTRIAN AGAMA RI</h4>
                        <h4>UIN SULTHAN THAHA SAIFUDDIN</h4>
                        <h4>JAMBI</h4>

                    </td>
                </tr>
            </table>
        </div>

        <div class="garis">
        </div> --}}

        <div class="kopsurat" style="width: 700px">
            <table class="table-1">
                <tr>
                    <td>
                        <img src="{{ asset('user/assets/img/logo_posyandu.png') }}" alt="" />
                    </td>

                    <td class="tengah">
                        <h4>Posyandu Anggrek</h4>
                        <P>Jalan Abdul Muis Kelurahan Lingkar Selatan,
                            14
                            Kecamatan. Pal Merah, Kota Jambi. </P>
                    </td>
                </tr>
            </table>
        </div>

        {{-- <div class="garis">
        </div> --}}

        <!-- table content -->
        <div class="content" style="width: 700px">

            <h3>Laporan Data Imunisasi</h3><br>
            <h4>Periode {{ date('d-m-Y', strtotime($tanggal_awal)) }} - {{ date('d-m-Y', strtotime($tanggal_akhir)) }}
            </h4>
            <br>

            <table class="main" border="1" bordercollapse="collapse">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jenis Imunisasi</th>
                    <th>Catatan</th>
                </tr>
                @foreach ($dataImunisasis as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->kode_anak }}</td>
                        <td>{{ $data->anak->nama }}</td>
                        <td>{{ date('d-m-Y', strtotime($data->tanggal)) }}</td>
                        <td>{{ $data->jenis_imunisasi }}</td>
                        <td>{!! $data->catatan !!}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>

</html>
