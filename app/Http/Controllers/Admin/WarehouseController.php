<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function AllWarehouse(){
        $warehouse = Warehouse ::latest()->get();
        return view('admin.warehouse.all_warehouse',compact('warehouse'));
    }


    public function AddWarehouse(){ 
        return view('admin.warehouse.add_warehouse');
    }


    public function StoreWarehouse(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:warehouses,email|max:255',
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
        ]);

        Warehouse::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'city' => $validated['city'],
        ]);

        $notification = array(
            'message' => 'WareHouse Added Successfully',
            'alert-type' => 'success'
         );

         return redirect()->route('all.warehouse')->with($notification);

    }


     public function EditWarehouse($id){
        $warehouse = Warehouse::find($id);
        return view('admin.warehouse.edit_warehouse',compact('warehouse'));
    }


    public function UpdateWarehouse(Request $request){
        $ware_id = $request->id;

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
