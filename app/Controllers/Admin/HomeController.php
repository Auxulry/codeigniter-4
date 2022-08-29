<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        //
    }

    public function authentication()
    {
        if ($this->request->getVar('skip')) {
            return view('admin/home');
        }
        return view('admin/login');
    }
}
