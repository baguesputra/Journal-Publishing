@extends('layouts_author.app', [
    'class' => '',
    'elementActive' => 'dashboard'
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
                <div>Edit Data Submission</div>
                </div>

                <div class="card-body">

                

                    <form method="POST" action="{{ route('author.submission.update', $data->id) }}" enctype="multipart/form-data">
                        {{method_field('PATCH')}}
                        @csrf

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User Id') }}</label>

                            <div class="col-md-6">
                                <select name="user_id" id="user_id" class="form-control" hidden>
                                    <option value="" hidden selected>--Pilih--</option>
                                        @foreach($select_user as $user)
                                        @if ($user->level == 4)
                                        <option value="{{ $user->id}}" {{$data->user_id == $user->id ? 'selected' : '' }}>{{ $user->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>

                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" 
                                name="judul" value="{{ old('judul', $data->judul) }}" required autocomplete="judul" autofocus>

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pengaju" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                            <div class="col-md-6">
                                <input id="pengaju" type="text" class="form-control @error('pengaju') is-invalid @enderror" 
                                name="pengaju" value="{{ old('pengaju', $data->pengaju) }}" required autocomplete="pengaju">

                                @error('pengaju')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgl_pengajuan" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="tgl_pengajuan" type="date" class="form-control @error('tgl_pengajuan') is-invalid @enderror" 
                                name="tgl_pengajuan" value="{{ old('tgl_pengajuan', $data->tgl_pengajuan) }}" required autocomplete="tgl_pengajuan">

                                @error('tgl_pengajuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="abstrak" class="col-md-4 col-form-label text-md-right">{{ __('Abstrak') }}</label>

                            <div class="col-md-6">
                                <input id="abstrak" type="text" class="form-control @error('abstrak') is-invalid @enderror" 
                                name="abstrak" value="{{ old('abstrak', $data->abstrak) }}" required autocomplete="abstrak">

                                @error('abstrak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="user_reviewer" class="col-md-4 col-form-label text-md-right">{{ __('User Reviewer') }}</label>

                            <div class="col-md-6">
                                <select name="user_reviewer" id="user_reviewer" class="form-control">
                                    <option value="" hidden selected>--Pilih--</option>
                                        @foreach($select_user as $user)
                                        @if ($user->level == 3)
                                        <option value="{{ $user->id}}" {{$data->user_reviewer == $user->id ? 'selected' : '' }}>{{ $user->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>

                                @error('user_reviewer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unsur" class="col-md-4 col-form-label text-md-right">{{ __('Element') }}</label>

                            <div class="col-md-6">
                                <input id="kelengkapan" type="text" class="form-control " 
                                name="unsur" value="{{ old('unsur', $data->unsur) }}" >

                                @error('unsur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ruan_lingkup" class="col-md-4 col-form-label text-md-right">{{ __('Scope') }}</label>

                            <div class="col-md-6">
                                <input id="ruan_lingkup" type="text" class="form-control " 
                                name="ruan_lingkup" value="{{ old('ruan_lingkup', $data->ruang_linkup) }}" >

                                @error('ruan_lingkup')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kecukupan" class="col-md-4 col-form-label text-md-right">{{ __('Adequacy') }}</label>

                            <div class="col-md-6">
                                <input id="kecukupan" type="text" class="form-control " 
                                name="kecukupan" value="{{ old('kecukupan', $data->kecukupan) }}" >

                                @error('kecukupan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kelengkapan" class="col-md-4 col-form-label text-md-right">{{ __('Completeness') }}</label>

                            <div class="col-md-6">
                                <input id="kelengkapan" type="text" class="form-control " 
                                name="kelengkapan" value="{{ old('kelengkapan', $data->kelengkapan) }}" >

                                @error('kelengkapan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('Total') }}</label>

                            <div class="col-md-6">
                                <input id="total" type="text" class="form-control " 
                                name="total" value="{{ old('total', $data->total) }}" >

                                @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nilai" class="col-md-4 col-form-label text-md-right">{{ __('Grade') }}</label>

                            <div class="col-md-6">
                                <input id="nilai" type="text" class="form-control " 
                                name="nilai" value="{{ old('nilai', $data->grade) }}" >

                                @error('nilai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="komentar" class="col-md-4 col-form-label text-md-right">{{ __('Commentar') }}</label>

                            <div class="col-md-6">
                                
                                <textarea name="komentar" id="komentar" cols="30" rows="10" class="form-control " 
                                name="komentar" value="{{ old('komentar', $data->komentar) }}" ></textarea>

                                @error('komentar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}


                        <div class="form-group row">
                            <label for="jurnal" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>

                            <div class="col-md-6">
                                <input id="jurnal" type="file" class="form-control @error('jurnal') is-invalid @enderror" 
                                name="jurnal" value="{{ old('jurnal', $data->jurnal) }}" required autocomplete="email">

                                @error('jurnal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control">
                                    < <option value="{{ $data->status}}" hidden selected>{{ $data->status}}</option>
                                    <option value="Process">Process</option>
                                    <option value="Review">Review</option>
                                    <option value="Editing">Editing</option>
                                    <option value="Finish">Finish</option>

                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <iframe src="{{URL('submission/'.$data->jurnal)}}"  width="100%" height="600"></iframe>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg>
                                    {{ __('Edit') }}
                                </button>

                                <a href="{{ route('author.submission') }}" class="btn btn-md btn-danger">
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
