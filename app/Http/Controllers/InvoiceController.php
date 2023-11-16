<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice=Invoice::latest()->paginate(1000);

        return view('invoice.index',compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'price_total' => 'required'
        ]);
    
        $invoice = Invoice::create($request->all());
    
        if ($invoice) {
            return redirect()->back()->with('success', 'تمت إضافة الفاتورة بنجاح.');
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة الفاتورة. يرجى المحاولة مرة أخرى.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $invoice = Invoice::find($id);   
        return view('invoice.show', ['invoice' => $invoice]);



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $invoice = Invoice::find($id);

    if (!$invoice) {
        return redirect()->route('invoice.index')->with('error', 'الفاتورة غير موجودة');
    }

    $invoice->delete();

    return redirect()->route('invoice.index')->with('success', 'تم حذف بيانات الفاتورة بنجاح');
}







}