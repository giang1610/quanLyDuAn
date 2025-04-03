@extends('layouts.main') 
@section('content')
@if (isset($_SESSION['errors']) && isset($_GET['msg']))
<ul>
    @foreach ($_SESSION['errors'] as $error)
    <li style="...">{{$error}}</li>
    @endforeach
</ul>
@endif

@if (isset($_SESSION['success']) && isset($_GET['msg']))
<span style="...">{{$_SESSION['success']}}</span>
@endif

<a href="{{route('add-category/')}}" class="btn btn-success">Thêm</a>
<br><br>
<table class="table table-striped table-hover table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($categories as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name_cate}}</td>
            <td>
                <a href="{{route('detail-category/' . $cat->id)}}" class="btn btn-warning">Sửa</a>
                <a href="{{route('destroy-category/' . $cat->id)}}" onclick="return confirm('Bạn chắc chứ ?')" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
    @endforeach
</table>
@endsection