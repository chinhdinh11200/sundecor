<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Rules\PhoneNumber;
use App\Rules\Required;
use App\Rules\Unique;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy(DB::raw('ISNULL(created_at), created_at'), 'DESC')->paginate(8);
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [new Required(), new Unique],
            'address' => new Required(),
            'phone_number' => [new Required(), new Unique]
        ]);

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->phone_number = $request->input('phone_number');
        $customer->address = $request->input('address');
        $customer->product_id = null;
        $customer->save();

        return redirect()->route('admin.customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => new Required(),
            'address' => new Required(),
            'phone_number' => new PhoneNumber()
        ]);
        $customer_update = Customer::find($id);
        $customer_update->name = $request->input('name');
        $customer_update->phone_number = $request->input('phone_number');
        $customer_update->address = $request->input('address');
        $customer_update->product_id = null;
        $customer_update->update();
        return redirect()->route('admin.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('admin.customer.index');
    }

    public function search(Request $request){
        $search = $request->input('s');
        if($search == ''){
            return redirect()->route('admin.customer.index');
        }else {
            $customers = Customer::orderBy(DB::raw('ISNULL(created_at), created_at'), 'DESC')
            ->where('name', 'like', '%'.$search.'%')
            ->paginate(8);

            $customers->appends(['s' => $search]);
            return view('admin.customer.search', ['customers' => $customers]);
        }
    }
}
