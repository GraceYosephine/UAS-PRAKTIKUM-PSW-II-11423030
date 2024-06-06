<html>

<head>
    <title>Nota Badminton</title>
    <style>
        @page {
            margin: 3mm;
        }
    </style>
    <style>
        hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;padding-top:50px'>
    <table style='width:750; font-size:16pt; font-family:calibri; border-collapse: collapspe;' border='0'>
        <tr>
            <td align="center">
                <center>
                    <font size="6"><b>Badminton</b></font><br>
                    <font size="3"><b>Institut Teknologi Del
                            <br>
                            Jl. Sisingamangaraja, Sitoluama
                            <br>
                            Sumatera Utara, Indonesia 22381
                        </b>
                    </font><br>
                </center>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <hr style="border-top: 1px solid black;width:660">
    <br>
    <center>
        <table style='width:660; font-size:12pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <tbody>
                <tr>
                    <td><strong>No. Booking</strong></td>
                    <td>{{ $databooking->notransaksi }}</td>
                </tr>
                <tr>
                    <td>Total Booking</td>
                    <td>{{ rupiah($databooking->totalbooking) }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $databooking->nama }}</td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>{{ $databooking->nohp }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>{{ tanggal(date('Y-m-d', strtotime($databooking->tanggalbooking))) }}</td>
                </tr>
                <tr>
                    <td>Jam Booking</td>
                    <td>{{ $databooking->jambooking }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $databooking->statusbooking }}</td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <table cellspacing='0' cellpadding='0'
            style='width:660; font-size:12pt; font-family:calibri; border-collapse: collapse;' border='1'>
            <thead class="bg-danger text-white">
                <tr>
                    <th>No</th>
                    <th>Nama Lapangan</th>
                    <th>Harga</th>
                    <th>Jam</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                @foreach ($datalapangan as $dp)
                    <tr align="center">
                        <td><?php echo $nomor; ?></td>
                        <td>{{ $dp->nama }}</td>
                        <td>Rp. {{ number_format($dp->harga) }}</td>
                        <td>{{ $dp->jumlah }} Jam</td>
                        <td>Rp. {{ number_format($dp->subharga) }}</td>
                    </tr>
                    <?php $nomor++; ?>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <table cellspacing='0' cellpadding='0'
            style='width:770px; font-size:11pt; font-family:calibri; border-collapse: collapse;'>
            <tr>
                <td align="center" style="padding-left:480px">Hormat Kami,
                    <br><br><br><br><br>(Badminton)
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
<script>
    window.print();
</script>
