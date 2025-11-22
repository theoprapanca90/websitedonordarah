<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pendonor</title>
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
        <h2>LAPORAN DATA PENDONOR</h2>
        <p>Sistem Donor Darah</p>
        <p>Tanggal Cetak: {{ date('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Gol. Darah</th>
                <th>Telepon</th>
                <th>Total Donor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendonors as $index => $pendonor)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pendonor->name }}</td>
                <td>{{ $pendonor->email }}</td>
                <td>{{ $pendonor->golongan_darah }}</td>
                <td>{{ $pendonor->telepon }}</td>
                <td>{{ $pendonor->riwayat_donor_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Total Pendonor: {{ $pendonors->count() }}</p>
    </div>
</body>
</html>
