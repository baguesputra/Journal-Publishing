@extends('layouts_reviewer.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])
@section('content')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    .pull-right input#cari{
        border: none;
        border-radius: 12px;
        margin-top: 6px;
        padding-left: 28px;
    }

    .pull-right input#cari:hover, .pull-right input#cari:focus, .pull-right input#cari:active{
        outline:none;
    } 

    .pull-right .icon{
        position:absolute;
        z-index: 1;
        color: #4f5b66;
        margin-top: 6px;
        margin-left: 8px;
    }

    /* .card-body a:hover, .card-body button:hover{
        border-radius: 25px; 
    } */
/* 
    .card-body form {
        margin-left: 87px;
        position: fixed;
    } */

</style>

<div class="content">
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        
                    <div class="col-sm" >
                        <h3>Table of Submission</h3>
                    </div>

                    <div class="pull-right">
                    <div class="col-sm">
                        <form action="" action="GET">
                            <span class="icon"><i class="fa fa-search"></i></span>
                            <input type="text" name="cari" placeholder="Search" value="{{ request()->query('cari') }}"
                            style="width:400px;" id="cari">
                        </form>
                    </div>
                    </div>
                    
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">   
                    <thead>
                        <tr align="center">
                            <th>Id</th>
                            <th>Title</th>
                           
                            <th>Submission Date</th>
                            <th>File</th>
                            <th colspan="2">Action</th>
                        </tr> 
                    </thead>
                        <?php $no = 1; ?>
                        @foreach($data as $submission)
                        @if ($submission->user_reviewer == Auth::user()->id)
                        <tr align="center">
                            <td>{{ $no++}}</td>
                            <td>{{ $submission->judul}}</td>
                        
                            <td>{{ $submission->tgl_pengajuan}}</td>
                            <td  align="center">
                                <a href="{{ route('reviewer.download-submission', $submission->id)}}" title="Download" class="fa fa-download" aria-hidden="true"></a> 
                            </td>
                            <td  align="center">
                                <a href="{{ route('reviewer.submission.show', $submission->id)}}" class="btn btn-warning" title="Details">Detail</a> 
                            </td>
                            <td  align="center">
                                <a href="{{ route('reviewer.submission.edit', $submission->id) }}" class="btn btn-primary" title="Review">Review</a> 
                            </td>   
                            {{-- <td  align="center">

                                 <form method="POST" id="delete" action="{{ route('reviewer.submission.destroy', $submission->id) }}">

                                    {{ method_field('DELETE')}}
                                    @csrf

                                <button type="submit" class="btn btn-danger" title="Delete">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                        @endif
                        @endforeach

                    </table>


                    <div class="container">            
                        <div class="row">
                        <div class="col-sm">
                           
                        </div>

                        <div class="pull-right">
                            {{-- <div class="col-sm">
                                <a href="" class="btn btn-secondary">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                        <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                        <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        </svg>
                        Print</a>
                              </div>
                        </div>

                        <div style="border: 1px groove; height: 38px; width: 0px;"> </div>
                        
                        <div class="pull-right"> 
                            <div class="col-sm">
        
                             <a href="{{ route('reviewer.submission.create') }}" class="btn btn-success"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg> Add</button></a>
        
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
