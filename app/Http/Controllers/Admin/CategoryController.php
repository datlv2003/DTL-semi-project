<?php

namespace App\Http\Controllers\Admin;
use App\Models\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function getcate()
    {   
        $data['catelist'] = Category::all();
        return view('backend/category',$data);
    }
    public function postcate(AddCateRequest $request)
    {
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return back();
    }
    public function geteditcate($id)
    {
        $cate = Category::find($id);
        $data['cate'] = Category::find($id);
        return view('backend/editcategory', compact('cate'));
    }

    public function posteditcate(EditCateRequest $request,$id)
    {
        $category = Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return redirect()->intended('admin/category');
    }
    public function getdeletecate($id)
    {
        Category::destroy($id);
        return back();
    }
}
