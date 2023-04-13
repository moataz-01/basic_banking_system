<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function transfer($id)
    {
        $customers = Customer::where('id', '!=', $id)->get();
        $sender_customer = Customer::find($id);
        return view('customers.transfer', compact('sender_customer', 'customers'));
    }

    public function confirm(Request $request, $id)
    {
        $sender_customer = Customer::find($id);
        $receiver_customer = Customer::find($request->customer);
        $request->validate([
            'customer' => 'required',
            'amount' => "required|numeric|max:$sender_customer->current_balance",
        ]);
        $receiver_customer->update(['current_balance' => ($receiver_customer->current_balance + $request->amount)]);
        $sender_customer->update(['current_balance' => ($sender_customer->current_balance - $request->amount)]);
        DB::table('transfers')->insert([
            'sender_id' => $sender_customer->id,
            'sender_name' => $sender_customer->name,
            'receiver_id' => $receiver_customer->id,
            'receiver_name' => $receiver_customer->name,
            'amount' => $request->amount,
        ]);
        return redirect()->route('customer.index')->with('success_message', 'the transfer was sent successfully');
    }

    public function history()
    {
        $transfers = DB::table('transfers')->paginate(10);
        return view('customers.history', compact('transfers'));
    }
}
