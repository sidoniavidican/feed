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

<form action="{{route('feeds.update', $feed->id)}}" method="POST">
    @csrf
    @method('PUT')  
    <textarea name="content" id="editor">
        {{$feed->content}}
    </textarea>
    <div class="form-group">
            <button type="submit" class="btn btn-success"> Edit page </button> 
    </div>
</form>
@endsection
