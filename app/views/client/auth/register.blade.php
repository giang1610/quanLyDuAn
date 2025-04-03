@if(isset($error))
    <p style="color: red;">{{ $error }}</p>
@endif
<form action="{{ route('/register') }}" method="POST">
    <input type="text" name="name" placeholder="Họ tên" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="number" name="phone" placeholder="Số điện thoại" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng ký</button>
</form>
<a href="{{ route('/showLogin') }}">Đã có tài khoản? Đăng nhập</a>