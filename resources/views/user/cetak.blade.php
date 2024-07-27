<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK MOORA | Cetak Data Siswa</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table.center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <center>
        <h2>DATA NAMA SISWA PENERIMA BANTUAN</h2>
        <h4>PAUD ASSABIQUNAL AWWALUN</h4>
    </center>

    <table border="1" class="center" width="100%" cellspacing="0">
        <thead align="center">
            <tr>
                <th>Nama Siswa</th>
                <th>Nilai Optimasi</th>
                <th>Rangking</th>
            </tr>
        </thead>
        <tbody align="center">
            @foreach ($optimasi as $key => $value)
                <tr>
                    <td>{{ $alternatif[$key][1] }}</td>
                    <td>{{ $optimasi[$key] }}</td>
                    <td> Rangking Ke {{ $rank++ }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>
