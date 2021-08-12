<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Email;
use App\Models\Phone;
use Cassandra\Custom;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::with('phones')
            ->with('companies')
            ->paginate();

        return view('customers.index', [
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::create($request->all());

        foreach($request->phone as $phone) {
            if ($phone) {
                Phone::create([
                    'number' => $phone,
                    'customer_id' => $customer->id
                ]);
            }
        }

        foreach($request->email as $email) {
            if ($email) {
                Email::create([
                    'email' => $email,
                    'customer_id' => $customer->id
                ]);
            }
        }

        foreach($request->company as $company) {
            if ($company) {
                Company::create([
                    'company' => $company,
                    'customer_id' => $customer->id
                ]);
            }
        }


        return redirect('/customers')->with('message', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', [
            'customer' => $customer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        Phone::where('customer_id', $customer->id)->delete();
        foreach($request->phone as $phone) {
            if ($phone) {
                Phone::create([
                    'number' => $phone,
                    'customer_id' => $customer->id
                ]);
            }
        }

        Email::where('customer_id', $customer->id)->delete();
        foreach($request->email as $email) {
            if ($email) {
                Email::create([
                    'email' => $email,
                    'customer_id' => $customer->id
                ]);
            }
        }

        Company::where('customer_id', $customer->id)->delete();
        foreach($request->company as $company) {
            if ($company) {
                Company::create([
                    'company' => $company,
                    'customer_id' => $customer->id
                ]);
            }
        }

        return back()->with('message', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back()->with('message', 'Success');
    }
}
