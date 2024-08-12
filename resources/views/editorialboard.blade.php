@extends('layouts.appold')

@section('content')
<div class="container">
<div class="row justify-content-center">
         
            <div class="">
                <div class="card">
                    <div class="card-body" align="center">
                       <img src="{{ asset('img/3.jpg')}}" width="190" height="190">    
                        </div>
                    </div>
                    <div class="card-footer" align="center">
                      
                      <h3>Editor in Chief</h3>
                    </div>
                </div>
            </div>
          
               
        </div>
<br>

        <div class="row justify-content-center">
            <div class="" style="margin-right: 50px;">
                <div class="card ">
                    <div class="card-body ">
                    <img src="{{ asset('img/4.jfif')}}" width="190" height="190">
                    </div>
                    <div class="card-footer" align="center">
                        <h3>Associate Editor</h3>
                    </div>
                </div>
            </div>
            <div class="" style="margin-right: 50px;">
                <div class="card">
                    <div class="card-body ">
                    <img src="{{ asset('img/5.jfif')}}" width="190" height="190">
                    </div>
                    <div class="card-footer" align="center">
                        <h3>Managing Editor</h3>
                    </div>
                </div>
            </div>
          
            <div class="">
                <div class="card ">
                    <div class="card-body" align="center">
                    <img src="{{ asset('img/2.jfif')}}" width="190" height="190">
                    </div>
                    <div class="card-footer" align="center">
                        <h3>Members</h3>
                    </div>
                </div>
            </div>
        </div>
      

</div>
@endsection
