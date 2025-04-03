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
<a href="{{route('list-product/')}}" class="btn btn-dark">Quay lại</a>

<form action="{{ route('store-product')}}" method="POST"  enctype="multipart/form-data" >
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" ></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" ></td>
        </tr>
        <tr>
            <td>ảnh</td>
            <td><input type="file" name="img_thumbnail" ></td>
        </tr>
        <tr>
            <td>Category</td>
            <td>
                <select name="category_id" >
                    <option value="">-- Chọn danh mục --</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name_cate}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="add" class="btn btn-success" value="Thêm">
            </td>
        </tr>
    </table>
</form>

@endsection