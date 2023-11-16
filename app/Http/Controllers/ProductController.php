<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;





class ProductController extends Controller
{


    public function invoice(){
  
            return view('product_bay.invoice');
        
    }
    
    public function show($id){


        $product = Product::find($id);   
        return view('product_bay.showbay', ['product' => $product]);




        // $product = Product::find($id);
    
        // if ($product) {
        //     return view('product_bay.showbay', compact('product'));
        // } else {
        // }
    }
    

    // public function index()
    // {

    //     $category=Category::latest()->paginate(100);


    //     return view('product_bay.index',compact('category'));
    // }


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
             'description'=>'required',
           'price'=>'required',
           'price2'=>'required',

           'quantity'=>'required',  
           'category_id'=>'required'
                      
              ] );
               $product= Product::create($request->all()); 
            //    <a href="{{ url('/back') }}">العودة للصفحة الرئيسية</a>
   return redirect()->back();    }


   public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'description'=>'required',
          'price'=>'required',
          'price2'=>'required',
          'quantity'=>'required'
        ]);
    
        $product = Product::find($id);
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->price2 = $validatedData['price2'];

        $product->quantity = $validatedData['quantity'];

        $product->save();
        return redirect()->back(); 

}




public function updateProductQuantity(Request $request, $id)
{
    $product = Product::find($id);

    $product->quantity = $request->input('quantity');
    $product->save();
// ****************
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'price2' => 'required',
        'quantity2' => 'required',
        'price_total' => 'required'
    ]);

    $invoice = Invoice::create($request->all());

    // ************

    // قد ترغب في إعادة توجيه المستخدم بعد التحديث
    return redirect()->route('categories.index2')->with('success','تم بيع المنتج بنجاح');
}



public function destroy(Product $product)
{
    $product->delete(); 
    return redirect()->back(); }


}