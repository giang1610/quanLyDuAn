<?php

namespace App\Controllers;
use App\Models\User;

class AuthController extends BaseController
{
    protected $taikhoan;
    public function __construct()
    {
        $this->taikhoan = new User();
    }

    public function showRegister()
    {
        $this->render('client.auth.register');
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra email đã tồn tại chưa
            if ($this->taikhoan->findByEmail($email)) {
                return $this->render('client.auth.register', ['error' => 'Email đã tồn tại!']);
            }

            // Thêm người dùng mới
            $this->taikhoan->create(['HoTen' => $name, 'Email' => $email, 'SoDienThoai' => $phone, 'MatKhau' => $password]);

            // Điều hướng sang trang đăng nhập
            redirect('showLogin');
        }
    }
    public function showLogin()
    {
        return $this->render('client.auth.login');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->taikhoan->findByEmail($email);

            if ($user && password_verify($password, $user->MatKhau)) {
                $_SESSION['user'] = $user;
                if ($user->LoaiTaiKhoan == "admin") {
                    redirect('admin');
                } else {
                    redirect('');
                }
            } else {
                return $this->render('client.auth.login', ['error' => 'Email hoặc mật khẩu không đúng!']);
            }
        }
    }
    public function logout()
    {
        session_destroy();
        redirect('showLogin');
    }
}