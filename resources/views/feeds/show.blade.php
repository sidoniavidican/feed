@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <table class="table"> 
        <thead>
            <td>Title</td>
            <td>Description</td>
            <td>Published</td>
            <td>Link</td>
        </thead>
        <tbody>

            <tr> 
                </td>
                <td> 
                        {{$feed->content}} 
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
