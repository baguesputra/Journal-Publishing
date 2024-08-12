@extends('layouts.appold')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" 
        aria-expanded="false" aria-controls="collapseExample" style="width:100% ">
            Archive
          </button>
          <div class="collapse" id="collapseExample">
           
       
                <div class="table-responsive">
                <table class="table">   
                <thead>
                    <tr align="center">
                       
                        <th>Title</th>
                        <th>Author</th>
                        <th >Date</th>
                        <th>File</th>
            
                    </tr> 
                </thead>
                    <?php $no = 1; ?>
                    @foreach($data as $archive)
                    
                    <tr>
                       
                        <td>{{ $archive->judul}}</td>
                        <td>{{ $archive->author->nama}}</td>
                        <td>{{ $archive->tgl_masuk}}</td>
                        
                        <td  align="center">
                            <a href="{{ route('download-archive', $archive->id)}}" title="Download" class="fa fa-download" aria-hidden="true">Download</a> 
                        </td>
                       
                    </tr>
                    @endforeach

                </table>


    
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
           
    </div>
</div>
@endsection
