<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Models\Product;
use Cart;
use Mail;

class CartController extends Controller
{
    public function getaddcart($id){
        $product = Product::find($id);
        // dd($product->prod_img);

        Cart::add(array(
            'id' => $id,
            'name' => $product->prod_name,
            'quantity' => 1,
            'price' => $product->prod_price,
            'attributes' => ['img' => $product->prod_img]    
        ));
        return redirect('cart/show');
    }

    public function getshowcart()
    {
        $data['total'] = Cart::getTotal();
        $data['items'] = Cart::getContent();
        
        return view('frontend.cart', $data);
    }

    public function getdeletecart($id)
    {
        if($id=='all')
        {
           Cart::clear();
        }
        else
        {
            Cart::remove($id);
        }
        return back();
    }
    
    public function updateQuantity(Request $request)    {
        $rowId = $request->input('rowId');
        $quantity = $request->input('quantity');
        Cart::update($rowId, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ));
        $newTotal = Cart::getTotal();
        return response()->json(['success' => true, 'newTotal' => $newTotal]);
    }
        public function postcomplete(Request $request)
        {
            $data['info'] = $request->all();
            $email = $request->email;
            Mail::send('frontend.email',$data, function ($message) use ($email)
            {
                $message->from('www.dtl.tech.vn@gmail.com','DTLpro');
                $message->to($email, $email);
                $message->cc('lmhtss2k3@gmail.com','Đạt Lê');
                $message->subject('Xác nhận đơn mua hàng dtlshop');
            });
        }
}


