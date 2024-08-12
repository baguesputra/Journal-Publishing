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
    <form action="{{ route('mobil.store')}}" method="post" enctype="multipart/form-data">
    @csrf
                <div class="form-group row">
                            <label for="no_plat" class="col-md-4 col-form-label text-md-right">{{ __('No Plat') }}</label>

                            <div class="col-md-6">
                                <input id="no_plat" type="text" class="form-control @error('no_plat') is-invalid @enderror" 
                                name="no_plat" value="{{ old('no_plat', $data->no_plat) }}" required autocomplete="judul" autofocus>

                           
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipe" class="col-md-4 col-form-label text-md-right">{{ __('Tipe') }}</label>

                            <div class="col-md-6">
                                <input id="tipe" type="text" class="form-control @error('tipe') is-invalid @enderror" 
                                name="tipe" value="{{ old('tipe', $data->tipe) }}" required autocomplete="judul" autofocus>

                           
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis') }}</label>

                            <div class="col-md-6">
                                <input id="jenis" type="text" class="form-control @error('jenis') is-invalid @enderror" 
                                name="jenis" value="{{ old('jenis', $data->jenis) }}" required autocomplete="judul" autofocus>

                           
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" 
                                name="foto" value="{{ old('foto', $data->foto) }}" required autocomplete="judul" autofocus>

                           
                            </div>
                        </div>

                        <img src="{{ asset('mobil/', $data->foto)}}" width="50" height="50">

                        <button type="submit">Tambah</button>
                        <a href="{{ route('mobil.index')}}" class="btn">Kembali</a>

</form>
</body>
</html>