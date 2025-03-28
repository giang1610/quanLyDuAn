@extends('layouts.AdminLayout')

@section('main')
    <h1>{{$title}}</h1>
    @foreach ($listCategory as $item)
        {{$item}}
    @endforeach
@endsection

@section('js')
    <script>
        // alert('Xin chào')
    </script>
@endsection

