<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccessLog;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu='Dashboard';
        $submenu='';
        $visitors = AccessLog::all()->count();
        $products = Product::all()->count();

        return view('pages.admin.dashboard', compact('menu', 'submenu', 'visitors', 'products'));
    }
    
}
