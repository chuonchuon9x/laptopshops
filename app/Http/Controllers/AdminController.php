<?php

namespace App\Http\Controllers;

use App\Http\Requests\Adminvalidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashbroad');
        } else {
            return Redirect::to('admin')->send();
        }
        
    }
    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->AuthLogin();
        $list_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderBy('tbl_product.product_id','desc')->get();
        $manager = view('admin.list_product')->with('list_product',$list_product);
        return view('admin_layout')->with('admin.list_product',$manager);
    }
    public function dashboard(Adminvalidation $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            $request->session()->put('admin_name', $result->admin_name);
            $request->session()->put('admin_id', $result->admin_id);
            return redirect('/dashboard');
        }else{
            $request->session()->put('message', 'Tài Khoản hoặc Mật Khẩu bị sai');
            return redirect('/admin');
        }
    }

    public function logout(Request $request){
        $this->AuthLogin();
        $request->session()->put('admin_name', null);
        $request->session()->put('admin_id', null);
        return redirect('/admin');
    }
    public function view_order($order_id){
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.customer_name','tbl_customers.customer_phone','tbl_shipping.shipping_address','tbl_order_details.product_name')->get();
        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
    }

    public function manager_order(){
        $list_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderBy('tbl_order.order_id','desc')->get();
        $manager = view('admin.manager_order')->with('list_order',$list_order);
        return view('admin_layout')->with('admin.manager_order',$manager);
    }
}
