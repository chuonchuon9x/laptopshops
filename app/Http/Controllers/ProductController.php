<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Requests\Productvalidation;
session_start();


class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashbroad');
        } else {
            return Redirect::to('admin')->send();
        }
        
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();

        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }

    public function list_product(){
        $this->AuthLogin();
        $list_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderBy('tbl_product.product_id','desc')->get();
        $manager = view('admin.list_product')->with('list_product',$list_product);
        return view('admin_layout')->with('admin.list_product',$manager);
    }

    public function save_product(Productvalidation $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;

        $get_image = $request -> file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            $request->session()->put('message', 'Thêm Sản Phẩm thành công');
            return redirect('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        $request->session()->put('message', 'Thêm Sản Phẩm thành công');
        return redirect('add-product');
    }

    public function active_product(Request $request,$product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>2]);
        $request->session()->put('message', 'Hiển Thị Sản Phẩm');
        return redirect('list-product');
    }

    public function unactive_product(Request $request, $product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>1]);
        $request->session()->put('message', 'Không Hiển Thị Sản Phẩm');
        return redirect('list-product');
    }
    
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager = view('admin.edit_product')->with('edit_product',$edit_product)
        ->with('cate_product', $cate_product)
        ->with('brand_product', $brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager);
    }

    public function update_product(Productvalidation $request,$product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;

        $get_image = $request -> file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            $request->session()->put('message', 'Cập Nhật Sản Phẩm thành công');
            return redirect('list-product');
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        $request->session()->put('message', 'Cập Nhật Sản Phẩm thành công');
        return redirect('list-product');
    }

    public function delete_product(Request $request,$product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        $request->session()->put('message', 'Xoá Sản Phẩm thành công');
        return redirect('list-product');
    }

    //endAdmin

    public function details_product($product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','2')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','2')->orderBy('brand_id','desc')->get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $details){
            $category_id = $details->category_id;
        }

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->limit(4)->get();
        return view('pages.product.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product)->with('relate',$related_product);
    }
}
