@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'feedback'
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
                <div>Detail Message</div>
                </div>

                <div class="card-body">

                

                    <form method="POST" action="">
                        {{method_field('PUT')}}
                        @csrf

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" 
                                name="nama" value="{{ old('nama', $data->nama) }}" required autocomplete="nama" autofocus disabled>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email', $data->email) }}" required autocomplete="instansi" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subjek" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                            <div class="col-md-6">
                                <input id="subjek" type="text" class="form-control @error('subjek') is-invalid @enderror" 
                                name="subjek" value="{{ old('subjek', $data->subjek) }}" required autocomplete="instansi" disabled>

                                @error('subjek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pesan" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <input id="pesan" type="negara" class="form-control @error('pesan') is-invalid @enderror" 
                                name="pesan" value="{{ old('pesan', $data->pesan) }}" required autocomplete="instansi" disabled>

                                @error('pesan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <a href="{{ route('contact.index') }}" class="btn btn-md btn-danger">
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
