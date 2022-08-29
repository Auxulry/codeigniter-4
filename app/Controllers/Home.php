<?php
namespace App\Controllers;

use App\Models\Products;

class Home extends BaseController
{
    public function index()
    {
        $query = new Products($this->request);
        $data = $query->orderBy('created_at', 'desc')->findAll(4);
        return view('landing', $data);
    }
}
