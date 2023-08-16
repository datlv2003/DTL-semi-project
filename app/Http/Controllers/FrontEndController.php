<?php

namespace App\Http\Controllers;
use App\Models\Models\Product;
use Illuminate\Http\Request;
use App\Models\Models\Category;
use App\Models\Models\Comment;
use Illuminate\Support\Str;
use Guzzle\Http\Message\Header\Link;


class FrontEndController extends Controller
{
    public function gethome()
    {
        $data['featured'] = Product::where('prod_featured', 1)->orderBy('prod_id', 'desc')->take(8)->get();
        $data['new'] = Product::orderBy('prod_id','desc')->take(8)->get();
        $data['catagories'] = Category::all();
        return view('frontend.home', $data); // Truyền biến $data vào view
    }
    
    public function getdetail($id)
    {   
        $data['item'] = Product::find($id);
        $data['comments'] = Comment::where('com_product',$id)->get();
        return view('frontend.details',$data);
    }


    public function getcategory($id)
    {
        $data['catename'] = Category::find($id);
        $data['items'] = Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(8);
        return view('frontend.category',$data);
    }
    public function postcomment(Request $request,$id)
    {
        
        $comment = new Comment;
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->content;
        $comment->com_product = $id;
        $comment->save();
        return back();
    }

    
    public function getsearch(Request $request)
    {
        $result = $request->result;
        $data['keyword'] = $result;
        $result = Str::replace(' ', '%',$result);
        $data['items'] = Product::where('prod_name','like','%'.$result.'%')->get();
        return view('frontend.search',$data);
    }
}

