<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use League\Csv\Writer;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function redirectTransaction()
    {
        $search = request()->query('search');

        if ($search) {
            $transactions = Order::where('order_id', 'like', '%' . $search . '%')->paginate(5);
        } else {
            $transactions = Order::paginate(5);
        }
        return view("admin.transaction")->with('transactions', $transactions);
    }

    public function receipt($id)
    {
        $transaction = Order::findOrfail($id);
        Log::info($transaction);
        return view("admin.receipt")->with('transaction', $transaction);

    }
    public function exportTransaction()
    {
        $transactions = Order::all();

        // composer require league/csv  - this requires the installation of the league/csv package
        $csv = Writer::createFromString('');
        $csv->insertOne([
            'Transaction No.',
            'Date',
            'Item/s',
            'Employee',
            'Quantity',
            'Price',
            'Sub-total',
            'Total',
        ]);

        foreach ($transactions as $transaction) {
            $csv->insertOne([
                $transaction->order_id,
                $transaction->created_at->toDateTimeString(),
                $transaction->items->pluck('product_name')->implode(', '),
                $transaction->user->name,
                $transaction->items->pluck('quantity')->implode(', '),
                $transaction->items->pluck('price')->implode(', '),
                $transaction->items->pluck('subtotal')->implode(', '),
                $transaction->order_total,
            ]);
        }

        return response($csv->getContent(), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="transactions.csv"',
        ]);
    }
}
