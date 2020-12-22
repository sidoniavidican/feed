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
    <form action="{{route('feeds.store')}}" method="POST" class="row">
        @csrf
        <div class="form-group">
            <input name="title" class="form-control" required> 
        </div>
        <div class="form-group">
            <input name="content" class="form-control"  required> 
        </div>
        <div>
            <button type="submit" class="btn btn-success">Add feed</button>
        </div>
    </form>
</div>
@endsection
