@extends('layouts/app')

@section('title', 'Admin - List Book')
    
@section('content')

<div>
<p>{{$book->penulis}}</p>
<p>{{$book->penerbit}}</p>
<p>{{$book->tahun}}</p>
</div>

@endsection