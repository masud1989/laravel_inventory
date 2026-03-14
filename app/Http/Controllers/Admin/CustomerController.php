<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function AllCustomer(){
        $customer = Customer::latest()->get();
        return view('admin.customer.all_customer',compact('customer'));
    }
    //End Method 

    public function AddCustomer(){ 
        return view('admin.customer.add_customer');
    }


    public function StoreCustomer(Request $request){
        $validated = $request->validate([
            'account_no' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:warehouses,email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:255',
        ]);

        Customer::create([
            'account_no' => $validated['account_no'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'comment' => $validated['comment'],
        ]);

        $notification = array(
            'message' => 'Customer Added Successfully',
            'alert-type' => 'success'
         );

         return redirect()->route('all.customer')->with($notification);

    }

    public function EditCustomer($id){
        $customer = Customer::find($id);
        return view('admin.customer.edit_customer',compact('customer'));
    }


    public function UpdateCustomer(Request $request){
        $customer_id = $request->id;

        $validated = $request->validate([
            'account_no' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:255',
        ]);

        Customer::find($customer_id)->update([
            'account_no' => $validated['account_no'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'comment' => $validated['comment'],
        ]);

        $notification = array(
            'message' => 'Customer Updated Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.customer')->with($notification);

    }

    public function DeleteCustomer($id){

        Customer::find($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->back()->with($notification); 
    }
}

