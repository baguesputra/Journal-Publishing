@extends('layouts_editorial.app', [
    'class' => '',
    'elementActive' => 'issue'
])
@section('content')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
      .dropbtn {
  color: white;
  
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
/* .dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
} */

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}



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
                        <h3>Table of Issue</h3>
                    </div>

                    <div class="pull-right">
                    <div class="col-sm">
                        <form action="{{ route('editorial.search.issue') }}" action="GET">
                            <span class="icon"><i class="fa fa-search"></i></span>
                            <input type="text" name="cari" placeholder="Search" value="{{ request()->query('cari') }}"
                            style="width:400px;" id="cari">
                        </form>
                    </div>
                    </div>
                    
                    </div>
                </div>

                <div class="card-body">
                    <div class="">
                    <table class="table">   
                    <thead>
                        <tr align="center">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>File</th>
                            <th colspan="2">Action</th>
                        </tr> 
                    </thead>
                        <?php $no = 1; ?>
                        @foreach($data as $issue)
                        
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $issue->judul}}</td>
                            <td>{{ $issue->penulis}}</td>
                            <td>{{ $issue->tgl_masuk}}</td>
                            <td  align="center">
                                <a href="" title="Download" class="fa fa-download" aria-hidden="true"></a> 
                            </td>
                            <td  align="center">
                                <a href="{{ route('editorial.issue.report.perdata', $issue->id)}}" class="fa fa-print" title="Report" style="color:grey"></a> 
                            </td>
                            <td  align="center">
                                <a href="{{ route('editorial.issue.show', $issue->id)}}" class="fa fa-info" title="Details" aria-hidden="true" style="color:yellow"></a> 
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
                            <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn btn btn-secondary"><i class="fa fa-print"></i> Print</button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="{{ route('editorial.issue.report') }}">All</a>
                                <a href="{{ route('editorial.issue.cetak-form')}}">Per Date</a>
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
    </div>
</div>
<script>
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 

</script>
@endsection
