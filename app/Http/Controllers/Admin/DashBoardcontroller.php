<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardcontroller extends Controller
{

    /**
     *  Метод отвечающий за показ дашборда
     *
     *  [GET] /admin/dashboard/
     *  @return inertia/response
     */
    public function index()
    {
        return inertia('Admin/Dashboard/Index');
    }
}
