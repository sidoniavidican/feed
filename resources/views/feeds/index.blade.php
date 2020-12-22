@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        @foreach($feeds as $feed)
        <div class="col-sm-6 col-md-4 gallery mt-3">
                <div class="inner-content-text">
                    <h4>{{$feed->title}}</h4>
                    <h5>{{$feed->content}}</h5>
                    <h6><a href="{{ route('feeds.show', $feed->id)}}" class="btn btn-info">View</a>  </h6>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
