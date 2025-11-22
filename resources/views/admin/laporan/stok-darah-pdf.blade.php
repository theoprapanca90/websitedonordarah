<!DOCTYPE html>
<html>
<head>
    <title>Laporan Stok Darah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #dc3545;
            color: white;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN STOK DARAH</h2>
        <p>Sistem Donor Darah</p>
        <p>Tanggal Cetak: {{ date('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Golongan Darah</th>
                <th>Jumlah Kantong</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stokDarah as $index => $stok)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $stok->golongan_darah }}</td>
                <td>{{ $stok->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p><strong>Total Stok: {{ $totalStok }} Kantong</strong></p>
    </div>
</body>
</html>
