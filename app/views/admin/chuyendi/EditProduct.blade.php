@extends('admin.layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Chỉnh sửa sản phẩm</h1>
        <form action="{{ route('admin/products/' . $product['id'] . '/update') }}" method="POST"
            enctype="multipart/form-data">
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" {{ $category['id'] == $product['category_id'] ? 'selected' : '' }}>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product['name'] }}" required>
            </div>
            <div class="mb-3">
                <label for="img_thumbnail" class="form-label">Hình ảnh hiện tại:</label>
                <br>
                @if (!empty($product['img_thumbnail']))
                    <img src="{{ file_url($product['img_thumbnail']) }}" width="150">
                @else
                    <p>Không có ảnh</p>
                @endif
                <br>
                <label for="img_thumbnail" class="form-label">Chọn ảnh mới (nếu muốn thay đổi):</label>
                <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="description" name="description"
                    rows="4">{{ $product['description'] }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection