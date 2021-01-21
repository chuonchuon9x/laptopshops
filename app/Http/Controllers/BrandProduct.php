<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Requests\Brandvalidation;
session_start();

class BrandProduct extends Controller
{
    //Admin
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashbroad');
        } else {
            return Redirect::to('admin')->send();
        }
        
    }
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }

    public function list_brand_product(){
        $this->AuthLogin();
        $list_brand_product = DB::table('tbl_brand')->get();
        $manager = view('admin.list_brand_product')->with('list_brand_product',$list_brand_product);
        return view('admin_layout')->with('admin.list_brand_product',$manager);
    }

    public function save_brand_product(Brandvalidation $request){
        $this->AuthLogin();
       
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;

        DB::table('tbl_brand')->insert($data);
        $request->session()->put('message', 'Thêm Thương Hiệu thành công');
        return redirect('add-brand-product');
    }

    public function active_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status'=>2]);
        $request->session()->put('message', 'Hiển Thị Thương Hiệu');
        return redirect('list-brand-product');
    }

    public function unactive_brand_product(Request $request, $brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status'=>1]);
        $request->session()->put('message', 'Không Hiển Thị Thương Hiệu');
        return redirect('list-brand-product');
    }
    
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id', $brand_product_id)->get();
        $manager = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$manager);
    }

    public function update_brand_product(Brandvalidation $request,$brand_product_id){
        $this->AuthLogin();
        $this->validate(request(),[
            'brand_product_name' => 'required',
            'brand_product_desc' => 'required|min:3',
            'brand_product_status' => 'required'
        ]);
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;

        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update($data);
        $request->session()->put('message', 'Cập Nhật Thương Hiệu thành công');
        return redirect('list-brand-product');
    }

    public function delete_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->delete();
        $request->session()->put('message', 'Xoá Thương Hiệu thành công');
        return redirect('list-brand-product');
    }

    //Home Trang Chu
    public function show_brand_home($brand_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','2')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','2')->orderBy('brand_id','desc')->get();
        $list_brand_product = DB::table('tbl_product')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('tbl_product.brand_id',$brand_id)->get();
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('list_brand_product',$list_brand_product)->with('brand_name',$brand_name);
    }
}
