<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductCategories;

class ProductsController extends BaseController
{
    public function index()
    {
        $query = new ProductCategories($this->request);
        $categories = $query->orderBy('created_at', 'desc')->findAll();
        // var_dump($categories);
        // die();
        return view('admin/products/index', ['categories' => $categories]);
    }
}
