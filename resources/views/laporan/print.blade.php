<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi {{$transaksi->kode_transaksi}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .transaksi-container {
            max-width: 100%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .transaksi-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .transaksi-details label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .transaksi-details span {
            display: block;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-row {
            font-weight: bold;
        }

        .toko-name {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .garis {
            border-top: 1px dashed #000;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .transaksi-container {
                box-shadow: none;
                border: none;
            }

            .transaksi-details label {
                display: inline-block;
                width: 120px;
            }
        }
    </style>

</head>

<body>
    <div class="transaksi-container">
        <div class="transaksi-header">
            <h2>Transaksi Pembayaran</h2>
            <div class="toko-name">Toko Roger</div>
        </div>
        <div class="transaksi-details">
            <label>Kode Transaksi:</label> <span>{{$transaksi->kode_transaksi}}</span><br>
            <label>Kode Kasir:</label> <span>{{$transaksi->kode_kasir}}</span><br>
            <label>Waktu:</label> <span>{{$transaksi->tanggal}}</span><br>
            <div class="garis"></div>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Diskon</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi_detail as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->barang}}</td>
                        <td>{{$item->formatRupiah('harga')}}</td>
                        <td>{{$item->jumlah}}</td>
                        <td>{{$item->diskon}}%</td>
                        <td>{{$item->formatRupiah('total')}}</td>
                    </tr>
                    @endforeach
                    <tr class="total-row">
                        <td colspan="5">Total</td>
                        <td>{{$transaksi->formatRupiah('total')}}</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="5">Bayar</td>
                        <td>{{$transaksi->formatRupiah('bayar')}}</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="5">Kembali</td>
                        <td>{{$transaksi->formatRupiah('kembali')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="garis"></div>
        <div class="toko-name">Terima Kasih</div>
    </div>
</body>

</html>
