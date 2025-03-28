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
<form action="{{ route('store-category')}}" method="POST">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" id=""></td>
        </tr>
        <input type="submit" name="add" class="btn btn-success" value="Thêm">
    </table>
</form>
@endsection