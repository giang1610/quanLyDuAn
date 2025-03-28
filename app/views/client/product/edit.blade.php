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
<form action="{{route('edit-product/'. $product->id )}}" method="POST" enctype="multipart/form-data">

    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="{{$product->name}}"></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" value="{{$product->price}}"></td>
        </tr>
        <tr>
            <td>ảnh</td>
            <td>
               
                <img src="http://localhost/PHP2/base_mvc%20(1)/{{$product->img_thumbnail}}" alt="Ảnh sản phẩm" width="100"> <br>
                <input type="file" name="img_thumbnail">
            </td>
        </tr>
        <tr>
            <td>Category</td>
            <td>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" 
                            @if($category->id == $product->category_id) selected @endif>
                            {{$category->name_cate}}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>
        
    </table>
    <input type="submit" name="edit" class="btn btn-success" value="Sửa">
</form>
@endsection