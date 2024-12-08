<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Lowongan</title>
    <style>
        .table-data {
            border-collapse: collapse;
            width: 100%;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 20px;
            text-align: center;
        }

        .table-data tr th {
            background-color: #2c3e50;
            color: white;
        }

        .table-data tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-data tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <h3>Data Categories</h3>
    <table class="table-data">
        <thead>
            <tr>
                <th>Nama Perusahaan</th>
                <th>Posisi</th>
                <th>Gaji</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lowongans as $lowongan)
            <tr>
                <td>{{ $lowongan->nama_perusahaan }}</td>
                <td>{{ $lowongan->posisi }}</td>
                <td>{{ $lowongan->gaji_minimal }} - {{ $lowongan->gaji_maksimal }}</td>
                <td>{{ $lowongan->lokasi }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" align="center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
</body>

</html>