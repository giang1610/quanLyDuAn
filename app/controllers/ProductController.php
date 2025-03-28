<?php

namespace App\Controllers;

use App\Models\Product; // dùng để kết nối sang file Product.php của model
use App\Models\Category;

class ProductController extends BaseController
{
    public $product;
    public $category;

    public function __construct()
    {
        $this->product = new Product(); // khởi tạo đối tượng product
        $this->category = new Category(); // khởi tạo đối tượng category

    }

    public function index()
    {
        $products = $this->product->getConnectProductWithCategory();
        return $this->render('admin.product.index', compact('products'));
    }

    public function addProduct()
    {
        $categories = $this->category->getCategories(); // Lấy danh mục đúng
        return $this->render('product.add', compact('categories'));
    }


    public function store()
    {
        if (isset($_POST['add'])) {
            $errors = [];

            if (empty($_POST['name'])) {
                $errors[] = "Tên sản phẩm không được bỏ trống";
            }
            if (empty($_POST['price'])) {
                $errors[] = "Giá sản phẩm không được bỏ trống";
            }
            if (empty($_POST['img_thumbnail'])) {
                $errors[] = "ảnh sản phẩm không được bỏ trống";
            }
            if (empty($_POST['category_id'])) {
                $errors[] = "Vui lòng chọn danh mục";
            }
            if (count($errors) > 0) {
                flash('errors', $errors, 'add-product');
            } else {
                $targetDir = __DIR__ . "/../../storage/uploads/";
                $fileName = time() . '_' . basename($_FILES['img_thumbnail']['name']);
                $targetFilePath = $targetDir . $fileName;
                move_uploaded_file($_FILES['img_thumbnail']['tmp_name'], $targetFilePath);
                $imagePath = "storage/uploads/" . $fileName;


                $result = $this->product->addProduct(NULL, $_POST['name'], $_POST['price'], $imagePath, $_POST['category_id'], );
                if ($result) {
                    flash('success', 'Thêm thành công', 'list-product');
                }
            }
        }
    }

    public function detail($id)
    {
        $product = $this->product->getDetailProduct($id);
        $categories = $this->category->getCategories();
        return $this->render("product.edit", compact('product', 'categories'));
    }

    public function editProduct($id)
    {
        if (isset($_POST['edit'])) {
            $errors = [];

            if (empty($_POST['name'])) {
                $errors[] = "Tên sản phẩm không được bỏ trống";
            }
            if (empty($_POST['price'])) {
                $errors[] = "Giá sản phẩm không được bỏ trống";
            }
            if (empty($_POST['img_thumbnail'])) {
                $errors[] = "ảnh sản phẩm không được bỏ trống";
            }
            if (empty($_POST['category_id'])) {
                $errors[] = "Vui lòng chọn danh mục";
            }

            if (count($errors) > 0) {
                flash('errors', $errors, 'detail-product/' . $id);
            } else {
                // Lấy sản phẩm cũ
                $Product = $this->product->getDetailProduct($id);
                $imagePath = $Product->img_thumbnail;

                if (!empty($_FILES['img_thumbnail']['name'])) {
                    $targetDir = __DIR__ . "/../../storage/uploads/";
                    $fileName = time() . '_' . basename($_FILES['img_thumbnail']['name']);
                    $targetFilePath = $targetDir . $fileName;

                    if (move_uploaded_file($_FILES['img_thumbnail']['tmp_name'], $targetFilePath)) {
                        $imagePath = "storage/uploads/" . $fileName;

                        if (!empty($Product->img_thumbnail) && file_exists(__DIR__ . "/../../" . $Product->img_thumbnail)) {
                            unlink(__DIR__ . "/../../" . $Product->img_thumbnail);
                        }
                    }
                }

                // Cập nhật sản phẩm
                $result = $this->product->updateProduct($id, $_POST['name'], $_POST['price'], $imagePath, $_POST['category_id']);
                if ($result) {
                    flash('success', 'Sửa thành công', 'list-product');
                }
            }
        }
    }



    public function destroy($id)
    {
        $result = $this->product->deleteProduct($id);
        if ($result) {
            flash('success', 'Xóa thành công', 'list-product');
        }
    }
}
