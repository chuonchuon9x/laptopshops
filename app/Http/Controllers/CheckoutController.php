<?php

namespace App\Http\Controllers;

use App\Http\Requests\Loginvalidation;
use App\Http\Requests\Paymentvalidation;
use App\Http\Requests\Registrationvalidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $customer_id = session()->get('customer_id');
        if ($customer_id) {
            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/show-cart')->send();
        }
        
    }

    public function AuthLogin1(){
        $customer_id = session()->get('customer_id');
        if ($customer_id) {
            return Redirect::to('/payment');
        } else {
            return Redirect::to('/show-cart')->send();
        }
        
    }

    public function login_checkout(Request $request)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','2')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','2')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function registration_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','2')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','2')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.registration_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function add_customer(Registrationvalidation $request){
        $this->AuthLogin();        
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        $request->session()->put('customer_id', $customer_id);
        $request->session()->put('customer_name', $request->customer_name);
        return Redirect('/checkout');
    }

    public function checkout(){
        // $this->AuthLogin(); 
        $cate_product = DB::table('tbl_category_product')->where('category_status','2')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','2')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        $request->session()->put('shipping_id', $shipping_id);
        return Redirect('/payment');
    }

    public function order_place(Paymentvalidation $request){
        //insert payment method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = '1';

        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = $request->session()->get('customer_id');
        $order_data['shipping_id'] = $request->session()->get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = '1';

        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order dt
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;

            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if($data['payment_method']==1){
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','2')->orderBy('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','2')->orderBy('brand_id','desc')->get();
            return view('pages.checkout.payatm')->with('category',$cate_product)->with('brand',$brand_product);
        }else{
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','2')->orderBy('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','2')->orderBy('brand_id','desc')->get();
            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
        }

        //return Redirect('/payment');
    }

    public function payment(){
        $this->AuthLogin1();
        $cate_product = DB::table('tbl_category_product')->where('category_status','2')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','2')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function logout_checkout(Request $request){
        $request->session()->flush();
        return Redirect ('/login-checkout');
    }

    public function login_customer(Loginvalidation $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        
        if($result){
            $request->session()->put('customer_id', $result->customer_id);
            return Redirect('/checkout');
        }else{
            return Redirect('/login-checkout');
        }
    }
}
