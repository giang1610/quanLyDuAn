@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Thêm Sản phẩm</h1>
        <form action="{{ route('/admin/products/store') }}" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm" required>
            </div>
            <div class="mb-3">
                <label for="img_thumbnail" class="form-label">Hình ảnh:</label>
                <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Thêm Sản phẩm</button>
        </form>
    </div>
@endsection
