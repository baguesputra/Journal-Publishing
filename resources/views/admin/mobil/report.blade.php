<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Laporan Mobil</h1>
    <table>
    <tr>
            <th>Id</th>
            <th>No Plat</th>
            <th>Tipe</th>
            <th>Jenis</th>
            <th>Foto</th>
          
        </tr>
        <?php $no = 1; ?>
                        @foreach($data as $mobil)
                        
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $mobil->no_plat}}</td>
                            <td>{{ $mobil->tipe}}</td>
                            <td>{{ $mobil->jenis}}</td>
                            <td>{{ $mobil->foto}}</td>
                         
                        </tr>
                        @endforeach
    </table>
</body>
</html>
<script>
    window.print();
</script>