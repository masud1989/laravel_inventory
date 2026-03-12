<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function AllSupplier(){
        $supplier = Supplier::latest()->get();
        return view('admin.supplier.all_supplier',compact('supplier'));
    }
    //End Method 

    public function AddSupplier(){ 
        return view('admin.supplier.add_supplier');
    }


    public function StoreSupplier(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:warehouses,email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Supplier::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
        ]);

        $notification = array(
            'message' => 'Supplier Added Successfully',
            'alert-type' => 'success'
         );

         return redirect()->route('all.supplier')->with($notification);

    }

    public function EditSupplier($id){
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit_supplier',compact('supplier'));
    }


    public function UpdateSupplier(Request $request){
        $supplier_id = $request->id;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
        ]);

        Warehouse::find($ware_id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'city' => $validated['city'],
        ]);

        $notification = array(
            'message' => 'Warehouse Updated Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.warehouse')->with($notification);

    }

    public function DeleteWarehouse($id){

        Warehouse::find($id)->delete();

        $notification = array(
            'message' => 'Warehouse Deleted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->back()->with($notification); 
    }
}
