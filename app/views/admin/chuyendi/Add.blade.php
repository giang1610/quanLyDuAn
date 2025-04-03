@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        <h1 class="mt-4">Thêm chuyến đi</h1>
        <form action="{{ route('/admin/products/store') }}" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Tên chuyến đi</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên chuyến đi" required>
            </div>
            <div class="mb-3">
                <label for="dateStart" class="form-label">Ngày khởi hành</label>
                <input type="date" class="form-control" id="dateStart" name="dateStart" required>
            </div>
            <div class="mb-3">
                <label for="dateEnd" class="form-label">Ngày kết thúc</label>
                <input type="date" class="form-control" id="dateEnd" name="dateEnd" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" rows="4"
                    placeholder="Nhập mô tả chuyến đi"></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="khong_mo_ban">Không mở bán</option>
                    <option value="mo_ban" selected>Mở bán</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Thêm chuyến đi</button>
        </form>
    </div>
@endsection