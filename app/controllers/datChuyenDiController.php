<?php

namespace App\Controllers;
use App\Models\DatChuyenDi;

class DatChuyenDiController extends BaseController
{
    protected $datchuyendi;
    public function __construct()
    {
        $this->datchuyendi = new DatChuyenDi();
    }
    public function index()
    {
        $list = $this->datchuyendi->getData("SELECT * FROM datchuyendi");
        return $this->render('admin.datchuyendi.List', compact('list'));
    }
    public function add()
    {
        return $this->render('admin.datchuyendi.Add');
    }
    public function addSubmit()
    {
        redirect('admin/list-trip');

    }
}