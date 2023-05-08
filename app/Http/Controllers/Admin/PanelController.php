<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $products = Product::all()->count();
        $orders = Order::all()->count();
        $comments = Comment::all()->count();
        return view('admin.index', compact('users', 'products', 'orders', 'comments'));
    }
}
