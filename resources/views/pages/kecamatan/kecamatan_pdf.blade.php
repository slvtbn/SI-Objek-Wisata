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
            <h3>Laporan Data Kecamatan</h3>
            <br>
            <div class="container">
                <table border="2" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Id</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $no = 1;
                    @endphp 
                    @foreach($kecamatan as $k)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$k->id_kecamatan}}</td>
                        <td>{{$k->nama}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </center>    
</body>
</html>