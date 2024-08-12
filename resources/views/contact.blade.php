@extends('layouts.appold')

@section('content')
<div class="container">
@include('sweetalert::alert')
    <div class="row justify-content-center">
        <h1>Contact</h1>

        <div class="card-body">
        <form method="POST" action="{{ route('contact.store')}}">
            @csrf

            <div class="form-group row">
                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" 
                    name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

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
                    name="email" value="{{ old('email') }}" required autocomplete="email">

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
                    name="subjek" value="{{ old('subjek') }}" required autocomplete="subjek">

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
                    <textarea name="pesan" id="pesan" cols="57" rows="10" value="{{ old('pesan') }}"></textarea>

                    @error('pesan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        Send
                    </button>

                
                </div>
            </div>

            </form>
        </div>

    </div>
</div>
@endsection
