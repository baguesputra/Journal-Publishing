<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tabel Example</h1>
    <a href="{{ route('example.create') }}">Tambah data</a> <!--tombol untuk pindah halaman input data dengan route--> 
    <table>
        <tr>
            <td>Id</td>
            <td>Nama</td>
            <td>Jurusan</td>
            <td>Kelas</td>
            <td>No hp</td>
            <td>Aksi</td>
        </tr>
        @foreach ($data as $example) <!--perulang untuk menampilkan data tabel-->
        <tr>
            <td> {{ $example->id}} </td> <!--menampilkan data-->
            <td> {{ $example->nama}} </td>
            <td> {{ $example->jurusan}} </td>
            <td> {{ $example->kelas}} </td>
            <td> {{ $example->no}} </td>
            <td>
            <a href="{{ route('example.edit', $example->id) }}">Edit</a>  <!--tombol untuk pindah halaman edit data--> 
                                                                          <!--route digunakan dari controller yaitu function edit-->
                                                                          <!--($example ->id) digunakan untuk memasukkan value id 
                                                                                ke dalam dan dikirim ke halaman yang dituju-->

            <form action="{{ route('example.destroy', $example->id) }}" method="post"> <!--tombol untuk pindah halaman edit data--> 
                <button type="submit">Hapus</button>                                   <!--route digunakan dari controller yaitu function destroy-->
                                                                                       <!--($example ->id) digunakan untuk memasukkan value id 
                                                                                            ke dalam dan digunakan untuk hapus data sesuai id 
                                                                                            yang dipilih-->     
            </form>
        @endforeach
            </td>
        </tr>


    </table>
</body>
</html>