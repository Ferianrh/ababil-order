<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, td, th {
            border: 1px solid black;
        }
    </style>

    <center>
        <h3>Laporan Transaksi Penjualan</h3>
    </center>
    
    <table>
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Nama Paket</th>
                <th>Tanggal Pesanan</th>
                <th>Tanggal Selesai</th>
                <th>Total Pembelian</th>
            </tr>
        </thead>
        <tbody>
        @foreach($order as $row)
            <tr>
                <td>{{$row->pengiriman->nama_penerima}}</td>
                <td>{{$row->katalog->nama_paket}}</td>
                <td>{{$row->tanggal_pesanan}}</td>
                <td>{{$row->updated_at}}</td>
                <td>{{format_rupiah($row->pembayaran->total_pembayaran)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>

</html>
