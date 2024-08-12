<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Data</h1>
    <form action="{{ route('example.update', $data->id) }}" method="post"><!-- form menggunakan action dari function update untuk menupdate data-->
        {{method_field('PUT')}} <!-- method untuk menaruh data -->
        @csrf <!-- Berfungsi untuk proteksi input data -->
        <div class="form-group">
            <label for="">Nama</label>                                                                <!-- fungsi required untuk validasi inputan harus diisi-->
            <input type="text" name="nama" id="nama" value="{{ old('nama', $data->nama) }}" required ><!-- inputan dengan value sesuai field tabel-->
                                                                                                        <!-- ($data->nama) menampilkan data nama-->   
        </div>

        <button type="submit">Simpan</button> <!-- button yang digunakan button submit untuk simpan data-->

    </form>
</body>
</html>