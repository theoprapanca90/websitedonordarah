<!DOCTYPE html>
<html>
<head>
    <title>Laporan Riwayat Donor</title>
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
        <h2>LAPORAN RIWAYAT DONOR</h2>
        <p>Sistem Donor Darah</p>
        <p>Tanggal Cetak: {{ date('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pendonor</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayat as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                <td>{{ $item->lokasi }}</td>
                <td>{{ ucfirst($item->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Total Riwayat: {{ $riwayat->count() }}</p>
    </div>
</body>
</html>
