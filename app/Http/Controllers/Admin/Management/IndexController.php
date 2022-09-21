<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;


class IndexController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
