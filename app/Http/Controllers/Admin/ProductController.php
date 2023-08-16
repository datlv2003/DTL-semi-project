<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Models\Product;
use App\Models\Models\Category;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller

{
    public function getproduct()
    {
        $data['productlist']= DB::table('vp_product')->join('vp_categories',
        'vp_product.prod_cate','=','vp_categories.cate_id')
        ->orderBy('prod_id','desc')->get();
        return view('backend/product',$data);
    }
    public function getaddproduct()
    {
        $data['catelist'] = Category::all();
        return view('backend/addproduct',$data);
    }
    

    public function postaddproduct(AddProductRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->prod_name = $request->name;
        $product->prod_slug = Str::slug($request->name);
        $product->prod_img = $filename;
        $product->prod_accessories = $request->accessories;
        $product->prod_price = $request->price;
        $product->prod_warranty = $request->warranty;
        $product->prod_promotion = $request->promotion;
        $product->prod_condition = $request->condition;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        $product->save();
        $request->img->storeAs('public/editor/storage/app/avatar', $filename);
        return back();
    }
    
    public function geteditproduct($id)
    {
        $data['product'] = Product::find($id);
        $data['listcate'] = Category::all();
        return view('backend/editproduct',$data);
    }
    


    public function posteditproduct(Request $request, $id)
{
    $product = Product::find($id);
    $arr['prod_name'] = $request->name;
    $arr['prod_slug'] = Str::slug($request->name);
    $arr['prod_price']=$request->price;
    $arr['prod_accessories'] = $request->accessories;
    $arr['prod_warranty'] = $request->warranty;
    $arr['prod_promotion'] = $request->promotion;
    $arr['prod_condition'] = $request->condition;
    $arr['prod_status'] = $request->status;
    $arr['prod_description'] = $request->description;
    $arr['prod_cate'] = $request->cate;
    $arr['prod_featured'] = $request->featured;
    if ($request->hasFile('img')) {
        $img = $request->file('img')->getClientOriginalName();
        $arr['prod_img'] = $img;
        $request->file('img')->storeAs('public/editor/storage/app/avatar', $img);
    } else {
        $arr['prod_img'] = $product->prod_img;
    }
    $product->update($arr);
    return redirect('admin/product');
}


    public function getdeleteproduct($id)
    {
        Product::destroy($id);
        return back();
    }
   
}
