<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kecamatan PDF</title>
    <style>
        table {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <br><br>
        <center>
            <h2>Sistem Informasi Objek Wisata Di Biak Papua</h2>
            <h3>Laporan Data Pemasukan</h3>
            <br>
            <div class="container">
                <table border="2" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Id</th>
                        <th>Objek Wisata</th>
                        <th>Tanggal</th>
                        <th>Jumlah Pemasukan</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $no = 1;
                    @endphp 
                    @foreach($pemasukan as $p)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$p->id_pemasukan}}</td>
                        <td>{{$p->objek}}</td>
                        <td>{{\Carbon\Carbon::parse($p->tanggal)->isoFormat('D MMMM Y')}}</td>
                        <td>{{$p->jlh_pemasukan}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </center>    
</body>
</html>