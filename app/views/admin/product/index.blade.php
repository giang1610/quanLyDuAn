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
<a href="{{route('add-product/')}}" class="btn btn-success">Thêm</a>
<br><br>
<table class="table table-striped table-hover table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>ảnh</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    @foreach($products as $pr)
        <tr>
            <td>{{$pr->id}}</td>
            <td>{{$pr->name}}</td>
            <td>{{$pr->price}}</td>
            <td>
                <img src="http://localhost/PHP2/base_mvc%20(1)/{{$pr->img_thumbnail}}" alt="Ảnh sản phẩm" width="100">
                
            </td>

            <td>{{$pr->category_name}}</td>
            <td>
                <a href="{{route('detail-product/' . $pr->id)}}" class="btn btn-warning">Sửa</a>
                <a href="{{route('detail-product/' . $pr->id)}}" class="btn btn-warning">show</a>
                <a href="{{route('destroy/' . $pr->id)}}" onclick="return confirm('Bạn chắc chứ ?')" class="btn btn-danger" >Xóa</a>
            </td>
        </tr>
    @endforeach
</table>
@endsection