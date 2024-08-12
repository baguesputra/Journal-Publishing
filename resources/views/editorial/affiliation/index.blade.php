@extends('layouts_editorial.app', [
    'class' => '',
    'elementActive' => 'affiliation'
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
                        
                    <div class="col-sm" >
                        <h3>Table of Affiliation</h3>
                    </div>

                    <div class="pull-right">
                    <div class="col-sm">
                        <form action="{{ route('editorial.search.affiliation') }}" action="GET">
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
                            <th>Agency</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>
                        </tr> 
                    </thead>
                        <?php $no = 1; ?>
                        @foreach($data as $affiliation)
                        
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $affiliation->nama}}</td>
                            <td>{{ $affiliation->website}}</td>
                            <td>{{ $affiliation->email}}</td>
                            <td  align="center">
                                <a href="{{ route('editorial.affiliation.report.perdata', $affiliation->id)}}" class="fa fa-print" title="Report" style="color:grey"></a> 
                            </td>
                            <td  align="center">
                                <a href="{{ route('editorial.affiliation.show', $affiliation->id)}}" class="fa fa-info" title="Details" aria-hidden="true" style="color:yellow"></a> 
                            </td>
                            
                        </tr>
                        @endforeach

                    </table>


                    <div class="container">            
                        <div class="row">
                        <div class="col-sm">
                           
                        </div>

                        <div class="pull-right">
                            <div class="col-sm">
                                <a href="{{ route('editorial.affiliation.report')}}" class="btn btn-secondary">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                        <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                        <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        </svg>
                        Print</a>
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
