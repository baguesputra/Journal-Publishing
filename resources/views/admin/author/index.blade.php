@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'author'
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
                        <h3>Table of Author</h3>
                    </div>

                    <div class="pull-right">
                    <div class="col-sm">
                        <form action="{{ route('search.author')}}" action="GET">
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
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Agency</th>
                            <th>Email</th>
                            <th colspan="4">Action</th>
                        </tr> 
                    </thead>
                        <?php $no = 1; ?>
                        @foreach($data as $author)
                        
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $author->nama}}</td>
                            <td>{{ $author->instansi}}</td>
                            <td>{{ $author->email}}</td>
                            <td  align="center">
                                <a href="{{ route('author.report.perdata', $author->id)}}"  class="fa fa-print" title="Report" style="color:grey"></a> 
                            </td>
                            <td  align="center">
                                <a href="{{ route('author.show', $author->id)}}" class="fa fa-info" title="Details" aria-hidden="true" style="color:yellow"></a> 
                            </td>
                            <td  align="center">
                                <a href="{{ route('author.edit', $author->id) }}" class="fa fa-edit" title="Edit" aria-hidden="true"></a> 
                            </td>   
                            <td  align="center">

                                 <form method="POST" id="delete" action="{{ route('author.destroy', $author->id) }}">

                                    {{ method_field('DELETE')}}
                                    @csrf

                                <button type="submit" class="fa fa-trash" title="Delete" aria-hidden="true" style="background-color:transparent; border:none;color:red"></button>
                                </form>
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
                                <a href="{{ route('author.report')}}" class="btn btn-secondary">
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
        
                             <a href="{{ route('author.create') }}" class="btn btn-success"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
