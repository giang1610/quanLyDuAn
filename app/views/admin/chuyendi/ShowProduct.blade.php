@extends('admin.layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Chi tiết Sản phẩm</h1>
        <div class="card">
            <div class="card-body">
                <h3>{{ $product['name'] }}</h3>
                <p><strong>Danh mục:</strong> {{ $product['category_name'] }}</p>
                <img src="{{ file_url($product['img_thumbnail']) }}" width="200">
                <p><strong>Mô tả:</strong> {{ $product['description'] }}</p>
                <a href="{{ route('admin/products') }}" class="btn btn-primary">Quay lại</a>
            </div>
        </div>
    </div>
@endsection