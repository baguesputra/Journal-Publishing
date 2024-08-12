@extends('layouts_author.app', [
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        @include('sweetalert::alert')
                    <div class="col-sm" >
                        <h3>Table of Submission</h3>
                    </div>

                    <div class="pull-right">
                    <div class="col-sm">
                        
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
                            <th>Author</th>
                            <th>Submission Date</th>
                            <th>Comment</th>
                            <th>File</th>
                            <th>LOA</th>
                            <th colspan="3">Action</th>
                        </tr> 
                    </thead>
                        <?php $no = 1; ?>
                        @foreach($data as $submission)
                        @if ($submission->user_id == Auth::user()->id)
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $submission->judul}}</td>
                            <td>{{ $submission->pengaju}}</td>
                            <td>{{ $submission->tgl_pengajuan}}</td>
                            <td>{{ $submission->komentar}}</td>
                            <td  align="center">
                                <a href="{{ route('author.download-submission', $submission->id)}}" title="Download" class="fa fa-download" aria-hidden="true"></a> 
                            </td>
                            @if ($submission->status == 'Finish')
                            <td  align="center">
                                <a href="{{ route('author.download.loa', $submission->id)}}" title="Download" class="fa fa-download" aria-hidden="true" style="color:red" disabled="disabled"></a> 
                            </td>
                            @else
                            <td  align="center">
                                <a href="#" title="Download" class="fa fa-download" aria-hidden="true" style="color:pink" disabled></a> 
                            </td>
                            @endif
                            
                            <td  align="center">
                                <a href="{{ route('author.submission.show', $submission->id)}}" class="btn btn-warning" title="Details">Detail</a> 
                            </td>
                            <td  align="center">
                                <a href="{{ route('author.submission.edit', $submission->id) }}" class="btn btn-primary" title="Edit">Edit</a> 
                            </td>   
                            <td  align="center">

                                 <form method="POST" id="delete" action="">

                                    {{ method_field('DELETE')}}
                                    @csrf

                                <button type="submit" class="btn btn-danger" title="Delete">Delete</button>
                                </form>
                            </td>
                        </tr>


                    </table>
                    <hr>
                    <p>Status: <b>{{ $submission->status}}</b></p>
                    @if ($submission->status == 'Process')
                    <p>Your submission has been process</p>
                    @endif

                    @if ($submission->status == 'Editing')
                    <p style="opacity: 0.5;">Your submission has been process</p>
                    <p>Your article has been editing</p>
                    @endif

                    @if ($submission->status == 'Review')
                    <p style="opacity: 0.5;">Your submission has been process</p>
                    <p style="opacity: 0.5;">Your article has been editing</p>
                    <p >Your article has been review</p>
                    <p>Please check the comment</p>
                    @endif

                    @if ($submission->status == 'Finish')
                    <p style="opacity: 0.5;">Your submission has been process</p>
                    <p style="opacity: 0.5;">Your article has been editing</p>
                    <p style="opacity: 0.5;">Your article has been review</p>
                    <p style="opacity: 0.5;">Please check the comment</p>
                    <p>Your article has been publsih</p>
                    <p>You can download your LOA on table</p>
                    @endif
                    

                        @endif
                        @endforeach
                    <div class="container">            
                        <div class="row">
                        <div class="col-sm">
                           
                        </div>

                        <div class="pull-right">
                            <div class="col-sm">
                                <!-- <a href="" class="btn btn-secondary">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                        <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                        <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        </svg>
                        Print</a> -->
                              </div>
                        </div>

                        <!-- <div style="border: 1px groove; height: 38px; width: 0px;"> </div> -->
                        
                        <div class="pull-right"> 
                            <div class="col-sm">
        
                             <a href="{{ route('author.submission.create') }}" class="btn btn-success"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg> Add</button></a>
        
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
