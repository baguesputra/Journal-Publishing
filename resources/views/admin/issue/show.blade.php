@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'issue'
])
@section('content')
<style>
 body{
            background-image: url('img/bg.jpg');
        }

</style>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div>Detail Data Issue</div>
                </div>

                <div class="card-body">

                

                    <form method="POST" action="{{ route('current-issue.update', $data->id) }}" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf

                        <div class="form-group row">
                            <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" 
                                name="judul" value="{{ old('judul', $data->judul) }}" required autocomplete="judul" autofocus disabled>

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="penulis" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                            <div class="col-md-6">
                                <input id="penulis" type="text" class="form-control @error('penulis') is-invalid @enderror" 
                                name="penulis" value="{{ old('penulis', $data->penulis) }}" required autocomplete="penulis" disabled>

                                @error('penulis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgl_masuk" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="tgl_masuk" type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" 
                                name="tgl_masuk" value="{{ old('tgl_masuk', $data->tgl_masuk) }}" required autocomplete="tgl_masuk" disabled>

                                @error('tgl_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hal" class="col-md-4 col-form-label text-md-right">{{ __('Page') }}</label>

                            <div class="col-md-6">
                                <input id="hal" type="text" class="form-control @error('hal') is-invalid @enderror" 
                                name="hal" value="{{ old('hal', $data->hal) }}" required autocomplete="hal" disabled>

                                @error('hal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="tahun" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                            <div class="col-md-6">
                                <input id="tahun" type="text" class="form-control @error('tahun') is-invalid @enderror" 
                                name="tahun" value="{{ old('tahun', $data->tahun) }}" required autocomplete="tahun" disabled>

                                @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="vol" class="col-md-4 col-form-label text-md-right">{{ __('Volume') }}</label>

                            <div class="col-md-6">
                                <input id="vol" type="text" class="form-control @error('vol') is-invalid @enderror" 
                                name="vol" value="{{ old('vol', $data->vol) }}" required autocomplete="vol" disabled>

                                @error('vol')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="document" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>

                            <div class="col-md-6">
                                <input id="document" type="text" class="form-control @error('document') is-invalid @enderror" 
                                name="document" value="{{ old('document', $data->document) }}" required autocomplete="email" disabled>

                                @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <iframe src="{{URL('issue/'.$data->document)}}"  width="100%" height="600"></iframe>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <a href="{{ route('current-issue.index') }}" class="btn btn-md btn-danger">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-reverse-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 3a2 2 0 0 1 2-2h7.08a2 2 0 0 1 1.519.698l4.843 5.651a1 1 0 0 1 0 1.302L10.6 14.3a2 2 0 0 1-1.52.7H2a2 2 0 0 1-2-2V3zm9.854 2.854a.5.5 0 0 0-.708-.708L7 7.293 4.854 5.146a.5.5 0 1 0-.708.708L6.293 8l-2.147 2.146a.5.5 0 0 0 .708.708L7 8.707l2.146 2.147a.5.5 0 0 0 .708-.708L7.707 8l2.147-2.146z"/>
                                </svg>
                                Back</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
