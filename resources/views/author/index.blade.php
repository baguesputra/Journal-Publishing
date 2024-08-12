@extends('layouts_author.app', [
    'class' => '',
    'elementActive' => 'null'
])

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-globe text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Submission</p>
                                <p class="card-title">
                                    @foreach($data as $submission)
                                    @if ($submission->user_id == Auth::user()->id)
                                    {{ $submission->status}}
                                    @endif
                                    @endforeach
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-eye"></i> <a href="{{route('author.submission')}}">View</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush