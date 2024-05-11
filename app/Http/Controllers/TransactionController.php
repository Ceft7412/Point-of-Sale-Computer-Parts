<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class TransactionController extends Controller
{
    public function redirectTransaction(){

        $transactions = Order::all();
        return view('admin.transaction')->with('transactions', $transactions);
    }
}
