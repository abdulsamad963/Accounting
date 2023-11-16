<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchasess=Purchase::latest()->paginate(4);

        return view('purchases.index',compact('purchasess'));
//         $purchasess = Purchases::orderBy('created_at' , 'DESC')->get();
   

//         $result = DB::select("
//         SELECT lectures.*, courses.name_courses,name_techer 
//         FROM lectures
//         inner join courses ON lectures.course_id = courses.id");
// //  die(print_r($result));
 
//  return view('customer.index');
    }

    // public function postsTrashed()
    // {
    //     $lecturess = Lectures::onlyTrashed()->where('user_id', Auth::id())->get();
    //     return view('lectures.trashed')->with('lecturess',$lecturess);
    // }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
             'type'=>'required',
           'price'=>'required',
           'Notes'=>'required',
           'amount'=>'required',
           'customer_id'=>'required'
           
              ] );
               $purchasess=Purchase::create($request->all()); 
            //    <a href="{{ url('/back') }}">العودة للصفحة الرئيسية</a>
   return redirect()->back();    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchases)
    {
        return view('purchases.show',compact('purchases'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $purchases=Purchase::where('id',$id)->first();
        return view('Purchases.edit',['purchases'=>$purchases]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $purchases=Purchase::where('id',$id)->first();
        $request->validate([
          
            'name'=>'required',
            'type'=>'required',
            'price'=>'required',
            'Notes'=>'required',
            'amount'=>'required'
          ] );
                $purchases->update($request->all()); 
                echo '<script>
                window.history.go(-2);
                
              </script>';
    }  

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {

        $purchases=Purchase::where('id',$id)->first();
        if($purchases==null)
        {
            return redirect()->back();
        }
        $purchases->delete();
        return redirect()->back();
    }
}
