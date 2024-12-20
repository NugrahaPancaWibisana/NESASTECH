@php
    $counter = 1;
    $total = 0; // Menyimpan akumulasi total
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NESASTECH</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Calibri:wght@400;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Calibri', Arial, sans-serif;
        }

        .container {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .main {
            background-color: #000000;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>LAPORAN KEUANGAN NESASTECH</h1>
        <p>TANGGAL: {{ $today }}</p>

        <table>
            <thead>
                <tr class="main">
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>KETERANGAN</th>
                    <th>PEMASUKAN</th>
                    <th>PENGELUARAN</th>
                    <th>JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    @php
                        // Jika baris pertama, jumlah hanya berdasarkan pemasukan - pengeluaran
                        if ($key === 0) {
                            $currentJumlah = $d->masuk - $d->keluar;
                        } else {
                            // Pada baris berikutnya, tambahkan dengan akumulasi sebelumnya
                            $currentJumlah = $total + ($d->masuk - $d->keluar);
                        }
                        $total = $currentJumlah; // Update akumulasi total
                    @endphp
                    <tr>
                        <td class="center">{{ $counter++ }}</td>
                        <td class="center">{{ $d->tanggal }}</td>
                        <td>{{ $d->keterangan }}</td>
                        <td class="right">
                            @if ($d->masuk == 0)
                                -
                            @else
                                Rp {{ number_format($d->masuk, 0, ',', '.') }}
                            @endif
                        </td>
                        <td class="right">
                            @if ($d->keluar == 0)
                                -
                            @else
                                Rp {{ number_format($d->keluar, 0, ',', '.') }}
                            @endif
                        </td>
                        <td class="right">
                            @if ($currentJumlah == 0)
                                -
                            @else
                                Rp {{ number_format($currentJumlah, 0, ',', '.') }}
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr class="main">
                    <th class="right" colspan="5">JUMLAH</th>
                    <td class="right">
                        @if ($total == 0)
                            -
                        @else
                            Rp {{ number_format($total, 0, ',', '.') }}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
