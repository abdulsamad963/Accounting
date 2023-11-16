<?php

namespace App\Http\Controllers;
use  App\Models\YourModel;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=Customer::latest()->paginate(4);

        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

   
 
    public function store(Request $request)
    {
        $request->validate([
             'num'=>'required',
              'name'=>'required',
            'address'=>'required',
            'comments'=>'required'
            
               ] );
                $customers=Customer::create($request->all()); 
              
              return redirect()->route('customers.index')->with('success','تمت أضافة زبون جديد بنجاح');

              $customer = Customer::find($customerId);

    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $customerID = $id;

        $purchases = DB::table('purchases')->where('customer_id', $customerID)->get();
       
            return view('customer.show',['purchasess'=>$purchases],compact('id'));




    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
          
            'name'=>'required',
            'num'=>'required',
            'address'=>'required',
            'comments'=>'required',
          ] );
                $customer->update($request->all()); 
                return redirect()->route('customers.index')->with('success','تم تعديل بيانات الزبون بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete(); 
        return redirect()->route('customers.index')->with('success','تم حذف بيانات الزبون بنجاح');
    }
}
