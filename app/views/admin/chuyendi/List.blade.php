@extends('admin.layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Danh sách chuyến đi</h1>
        <a href="{{ route('admin/products/create') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên chuyến đi</th>
                    <th>Ngày khởi hành</th>
                    <th>Ngày kết thúc</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $product)
                    <tr>
                        <td>{{ $product['MaCD'] }}</td>
                        <td>{{ $product['TenChuyenDi'] }}</td>
                        <td>{{ $product['NgayKhoiHanh'] }}</td>
                        <td>{{ $product['NgayKetThuc'] }}</td>
                        <td>{{ $product['Gia'] }}</td>
                        <td>{{ $product['MoTa'] }}</td>
                        <td>{{ $product['TrangThai'] }}</td>
                        <td>
                            <!-- <a href="{{ route('admin/products/' . $product['id'] . '/show') }}"
                                                                class="btn btn-info btn-sm">Xem</a>
                                                            <a href="{{ route('admin/products/' . $product['id'] . '/edit') }}"
                                                                class="btn btn-warning btn-sm">Sửa</a>
                                                            <form action="{{ route('admin/products/' . $product['id'] . '/delete') }}" method="POST"
                                                                class="d-inline" onsubmit="return confirm('Xóa sản phẩm ?')">
                                                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                            </form> -->
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