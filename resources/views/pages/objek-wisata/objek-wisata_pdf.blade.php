<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Objek Wisata PDF</title>
    <style>
        table {
            width: 100%;
        }
        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <br><br>
        <center>
            <h2>Sistem Informasi Objek Wisata Di Biak Papua</h2>
            <h3>Laporan Data Objek Wisata {{$detail->nama}}</h3>
            <br>
            <div class="container">
                <table border="2" cellpadding="10" cellspacing="0">
                    <tbody>
                      <tr>
                        <th width="20%">Id</th>
                        <td>{{$detail->id_ow}}</td>
                      </tr>
                      <tr>
                        <th>Nama</th>
                        <td>{{$detail->nama}}</td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <td>{{$detail->alamat}}</td>
                      </tr>
                      <tr>
                        <th>Kecamatan</th>
                        <td>{{$detail->kecamatan->nama}}</td>
                      </tr>
                      <tr>
                        <th>Fasilitas</th>
                        <td>
                        @foreach($fasilitas as $f)
                        <ul>
                            <li> {{$f->keterangan}} <br></li>
                        </ul>
                        @endforeach
                        </td>
                      </tr>
                  </tbody>
                </table>
            </div>
            
        </center>
        

    
</body>
</html>