<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manager_order(){
        $list_order = Order::orderby('create_at','DESC')->get();
        return view('admin.manager_order')->with(compact('list_order'));
    }
}
