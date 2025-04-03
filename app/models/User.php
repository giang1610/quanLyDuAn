<?php

namespace App\Models;

class User extends BaseModel
{
    protected $table = 'taikhoan';
    public function create($data)
    {
        $sql = "INSERT INTO `taikhoan` (`HoTen`, `Email`, `SoDienThoai`, `MatKhau`)  VALUES (?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$data['HoTen'], $data['Email'], $data['SoDienThoai'], password_hash($data['MatKhau'], PASSWORD_BCRYPT)]);
    }
    public function findByEmail($email)
    {
        $this->setQuery("SELECT * FROM taikhoan WHERE email = ?");
        return $this->loadRow([$email]);
    }
}
