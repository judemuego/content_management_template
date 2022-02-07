<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->get();
        return view('backend.pages.inventory.maintenance.customers', compact('customers'));
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Customer::get())
            ->addIndexColumn()
            ->make(true);
        }
    }
    
    public function store(Request $request)
    {
        $customer = $request->validate([
            'customer_id' => ['required'],
            'customer_name' => ['required'],
            'address1_description' => ['required'],
            'address1_line1' => ['required'],
            'address1_line2' => ['required'],
            'contact_person' => ['required'],
            'position' => ['required'],
            'contact_no' => ['required'],
            'email_address' => ['required'],
            'tin_no' => ['required'],
            'company_business_style' => ['required']
        ]);

        Customer::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }


    public function edit($id)
    {
        $customers = Customer::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('customers'));
    }


    public function update(Request $request, $id)
    {
        Customer::find($id)->update($request->all());
        return "Record Saved";
    }

    public function destroy($id)
    {
        $customer_destroy = Customer::find($id);
        $customer_destroy->delete();
        return "Successfully Deleted!";
    }
}
