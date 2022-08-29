<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProductCategoriesController extends BaseController
{
    public function index()
    {
        return view('admin/product-categories/index');
    }
}
