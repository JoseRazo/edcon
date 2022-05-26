<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return redirect()->route('admin.login');
    }

    public function index()
    {
        return view('back.dashboard');
    }
}
