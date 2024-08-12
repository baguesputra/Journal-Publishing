@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'submission'
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
                        @include('sweetalert::alert')
                    <div class="col-sm" >
                        <h3>Schedule Publish</h3>
                    </div>

                    <div class="pull-right">
                    <div class="col-sm">
                        <form action="{{ route('search.submission')}}" action="GET">
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
                            <th>Submission Date</th>
                            <th>Schedule</th>
                            <th>Status</th>
                            <th>File</th>
                            <th colspan="5">Action</th>
                        </tr> 
                    </thead>
                        <?php $no = 1; ?>
                        @foreach($data as $submission)
                        @if($submission->status == 'Finish')
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $submission->judul}}</td>
                            <td>{{ $submission->pengaju}}</td>
                            <td>{{ $submission->tgl_pengajuan}}</td>
                            <td>{{ $submission->jadwal}}</td>
                            <td ><span class="badge badge-pill badge-success">{{ $submission->status}}</span></td>
                            <td  align="center">
                                <a href="{{ route('download-submission', $submission->id)}}" title="Download" class="fa fa-download" aria-hidden="true"></a> 
                            </td>
                            @if($submission->jadwal == true)
                            <td  align="center">
                                <a href="{{ route('submission.publish', $submission->id)}}"  class="fa fa-paper-plane" title="Publish" style="color:green"></a>  
                            </td>
                            @else
                            <td  align="center">
                                <a href="#"  class="fa fa-paper-plane" style="color:green; opacity:0.2;"  onclick="alert('Wait Editorial for make publish schedule!'); return false;"></a>  
                            </td>
                            @endif
                            <td  align="center">
                                <a href="{{ route('submission.report.perdata', $submission->id)}}"  class="fa fa-print" title="Report" style="color:grey"></a> 
                            </td>
                            <td  align="center">
                                <a href="{{ route('submission.show', $submission->id)}}" class="fa fa-info" title="Details" aria-hidden="true" style="color:yellow"></a> 
                            </td>
                            <td  align="center">
                                <a href="{{ route('submission.edit', $submission->id) }}" class="fa fa-edit" title="Schedule" aria-hidden="true"></a> 
                            </td>   
                          
                        </tr>
                        @endif
                        @endforeach

                    </table>


                    <div class="container">            
                        <div class="row">
                        <div class="col-sm">
                       
                        </div>
                        
                        <div class="pull-right">
                            <div class="col-sm">
                           
                        </div>
                              </div>
                        </div>

                      
                       
                        <div class="pull-right"> 
                            <div class="col-sm">
        
                           <a href="{{ route('submission.index')}}" class="btn btn-danger">Back</a>
        
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
