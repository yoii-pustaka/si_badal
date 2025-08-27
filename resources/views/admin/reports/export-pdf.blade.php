<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Orders</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2 style="text-align:center;">Laporan Orders</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Order</th>
                <th>User</th>
                <th>Paket</th>
                <th>Pelaksana</th>
                <th>Status</th>
                <th>Tanggal Pelaksanaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->order_code }}</td>
                <td>{{ $order->user->name ?? '-' }}</td>
                <td>{{ $order->package->name ?? '-' }}</td>
                <td>{{ $order->pelaksana->name ?? '-' }}</td>
                <td>{{ ucfirst(str_replace('_',' ',$order->status)) }}</td>
                <td>{{ $order->tanggal_pelaksanaan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</body>

</html>