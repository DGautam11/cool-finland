<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(){
        $customers = Customer::latest()->paginate(5);
        return view('customer.index',[
            'customers'=>$customers,
        ]);

    
}
    public function create(){
        return view(('customer.create'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'email' => 'required',
            'phone'=>'required'
        ]);

        Customer::create([

            'customer_name'=>$request->name,
            'customer_address'=>$request->address,
            'customer_mail'=>$request->email,
            'customer_phone'=>$request->phone,


        ]);

        return redirect()->route('customers');


    }
 
}
