<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::paginate(8);

        return view('products', compact('products'));
    }
    public function sos(Request $request){



    if ($request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        'name' => 'required',
        'price' => 'required',
    ])){

        $id=$request->id;
        $name=$request->name;
        $price=$request->price;

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $file='images/'.$imageName;
        $pro =Product::find($id);
        $pro->name=$name;
        $pro->price=$price;
        $pro->photo=$file;
        $pro->save();




        return response()->json(["success" => true,'msg' => $name]);


    }
    else{

        return response()->json(["success" => false,'msg' =>null]);

    }




}
    public function show()
    {
        $products = Product::all();

        return view('sss', compact('products'));
    }
    public function create(Request $request){
        if ($request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'name' => 'required',
            'price' => 'required',
        ])){

            $name=$request->name;
            $price=$request->price;

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $file='images/'.$imageName;
            $pro = new product;
            $pro->name=$name;
            $pro->price=$price;
            $pro->photo=$file;
            $pro->save();




            return response()->json(["success" => true,'msg' => $name]);


        }
       else{

           return response()->json(["success" => false,'msg' =>null]);

       }




    }
    public function delete(Request $request){
        $id=$request->id;

        product::find($id)->delete();
        return response()->json(["success" => true,'msg' => ' delete sucess']);




    }
    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];

            session()->put('cart', $cart);


            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);

        $htmlCart = view('_header_cart')->render();

        return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

        //return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function upd($id){


        $product = Product::find($id);

        return view('update', compact('product'));


    }


    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

            $total = $this->getCartTotal();

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'بروز رسانی شد', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'کالای مورد نظر حذف شد', 'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'Product removed successfully');
        }
    }


    /**
     * getCartTotal
     *
     *
     * @return float|int
     */
    private function getCartTotal()
    {
        $total = 0;

        $cart = session()->get('cart');

        foreach($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return number_format($total, 2);
    }
}
