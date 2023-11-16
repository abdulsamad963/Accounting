<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{


    public function index2()
    {

        $category=Category::latest()->paginate(1000);


        return view('product_bay.index',compact('category'));
    }

    public function index()
    {
        $category=Category::latest()->paginate(1000);

        return view('category.index',compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
             'name'=>'required',
              'description'=>'required'
 
            
               ] );
                $category=Category::create($request->all()); 
              
              return redirect()->route('category.index')->with('success','تمت أضافة فئة  جديدة بنجاح');

              $category = Category::find($customerId);

    }




    public function show($id)
    {

        $categoryID = $id;

        $products = DB::table('products')->where('category_id', $categoryID)->get();
       
        return view('category.show',['products'=>$products],compact('id'));




    }

    public function edit(Customer $customer)
    {
        return view('category.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $category = Category::find($id);
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->save();
    
        return redirect()->route('category.index')
            ->with('success', 'تم تحديث الفئة بنجاح.');
    }
    
        public function destroy(Category $category)
    {
        $category->delete(); 
        return redirect()->route('category.index')->with('success','تم حذف بيانات الفئة بنجاح');
    }

    public function showProducts($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $products = $category->products;
        
        return view('product_bay.showproduct', compact('products'));
    }
}
