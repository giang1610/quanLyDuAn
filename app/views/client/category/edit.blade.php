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
<a href="{{route('list-category/')}}" class="btn btn-dark">Quay lại</a>
<form action="{{route('edit-category/'. $category->id )}}" method="POST">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="{{$category->name_cate}}"></td>
        </tr>
        <input type="submit" name="edit" class="btn btn-success" value="Sửa">
    </table>
</form>
@endsection