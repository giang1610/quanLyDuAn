@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Danh sách Sản phẩm</h1>
        <a href="{{ route('admin/products/create') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['category_name'] }}</td>
                        <td>
                            <img src="{{ file_url($product['img_thumbnail']) }}" width="50">
                        </td>
                        <td>{{ $product['description'] }}</td>
                        <td>
                            <a href="{{ route('admin/products/' . $product['id'] . '/show') }}"
                                class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('admin/products/' . $product['id'] . '/edit') }}"
                                class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('admin/products/' . $product['id'] . '/delete') }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Xóa sản phẩm ?')">
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
   
@endsection

@section('css')
    
@endsection