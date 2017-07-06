<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 退出登录
    public function quit()
    {
//        清空session
        \session(['user'=>null]);
        return redirect('/admin/login');
    }
}
