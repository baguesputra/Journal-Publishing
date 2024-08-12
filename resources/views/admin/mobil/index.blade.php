<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Mobil</h1>
    <a href="{{ route('mobil.create')}}">Tambah Data</a>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>No Plat</th>
            <th>Tipe</th>
            <th>Jenis</th>
            <th>Foto</th>
            <th colspan="2">Action</th>
        </tr>
        <?php $no = 1; ?>
                        @foreach($data as $mobil)
                        
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $mobil->no_plat}}</td>
                            <td>{{ $mobil->tipe}}</td>
                            <td>{{ $mobil->jenis}}</td>
                            <td>{{ $mobil->foto}}</td>
                            <td  align="center">
                                <a href="{{ route('mobil.edit', $mobil->id) }}" >Edit</a> 
                            </td>   
                            <td  align="center">

                                 <form method="POST" id="delete" action="{{ route('mobil.destroy', $mobil->id) }}">

                                    {{ method_field('DELETE')}}
                                    @csrf

                                <button type="submit" >Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
    </table>

    <a href="#">Cetal</a>
</body>
</html>