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
                <div>Select Date</div>
                </div>

                <div class="card-body">

                

                    <!-- <form method="POST" action="{{ route('archive.store') }}" enctype="multipart/form-data">
                        @csrf -->

                        <div class="form-group row">
                            <label for="tglawal" class="col-md-4 col-form-label text-md-right">{{ __('First Date') }}</label>

                            <div class="col-md-6">
                                <input id="tglawal" type="date" class="form-control @error('tglawal') is-invalid @enderror" 
                                name="tglawal" required autocomplete="tglawal" autofocus>

                                @error('tglawal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                   

                        <div class="form-group row">
                            <label for="tglakhir" class="col-md-4 col-form-label text-md-right">{{ __('Second Date') }}</label>

                            <div class="col-md-6">
                                <input id="tglakhir" type="date" class="form-control @error('tglakhir') is-invalid @enderror" 
                                name="tglakhir" required autocomplete="tglakhir">

                                @error('tglakhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="" class="btn btn-secondary" onclick="this.href='archive/cetak-filter/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value ">
                                <i class="fa fa-print"></i>Print</a>

                                <a href="{{ route('archive.index') }}" class="btn btn-md btn-danger">
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
