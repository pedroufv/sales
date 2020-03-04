<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomerStoreRequest $request)
    {
        try {

            $customer = Customer::create($request->validated());

            return redirect()
                ->route('customers.show', ['customer' => $customer->id])
                ->with(['type' => 'success', 'message' => 'Stored!']);

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(['type' => 'danger', 'message' => 'Error!'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerUpdateRequest  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        try {

            $customer->update($request->validated());

            return redirect()
                ->route('customers.show', ['customer' => $customer->id])
                ->with(['type' => 'success', 'message' => 'Updated!']);

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(['type' => 'danger', 'message' => 'Error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer)
    {
        try {

            $customer->delete();

            return redirect()
                ->route('customers.index', ['customer' => $customer->id])
                ->with(['type' => 'success', 'message' => 'Destroyed!']);

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(['type' => 'danger', 'message' => 'Error!'])
                ->withInput();
        }
    }
}
