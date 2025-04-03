@if(isset($error))
    <p style="color: red;">{{ $error }}</p>
@endif
<form action="{{ route('/login') }}" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng nhập</button>
</form>
<a href="{{ route('/showRegister') }}">Chưa có tài khoản? Đăng ký</a>