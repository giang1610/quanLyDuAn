<?php

namespace App\Controllers;
use App\Models\ChuyenDi;

class ChuyenDiController extends BaseController
{
    protected $chuyendi;
    public function __construct()
    {
        $this->chuyendi = new ChuyenDi();
    }
    public function index()
    {
        $list = $this->chuyendi->getData("SELECT * FROM chuyendi");
        return $this->render('admin.chuyendi.List', compact('list'));
    }
    public function add()
    {
        return $this->render('admin.chuyendi.Add');
    }
    public function addSubmit()
    {
        redirect('admin/list-trip');

    }
}