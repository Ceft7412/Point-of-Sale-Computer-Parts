<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use App\Models\Member;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $employee = $user && $user->type == 2 ? $user : null;


            $search = request()->query('search');

            $categories = Category::where('is_active', 1)->get();
            $subcategories = Subcategory::where('is_active', 1)->get();
            $productsQuery = Product::where('is_active', 1);

            if ($search) {
                $productsQuery->where(function ($query) use ($search) {
                    $query->where('product_id', 'like', '%' . $search . '%')
                        ->orWhere('product_name', 'like', '%' . $search . '%');
                });
            } else {
                $productsQuery->where('product_quantity', '!=', 0);
            }

            $products = $productsQuery->get();

            return view('employee.order', [
                'products' => $products,
                'categories' => $categories,
                'subcategories' => $subcategories,
                'employee' => $employee
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }

    }

    public function storeOrder(Request $request)
    {
        


        $customer = new Customer();
        $customer->customer_id = $this->generateCustomerID();
        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->customer_phone = $request->customer_contact;
        $customer->save();

        $orderItems = $request->input('order');
        $amount_rendered = $request->input('amount_rendered');

        $order_total = $request->order_total;

        //* if the order total has a comma, remove it   
        $order_total = preg_replace('/[^0-9.]/', '', $order_total);
        // * this will convert to an integer
        $order_total = intval($order_total);

        $order = new Order();
        $order->order_id = $this->generateOrderID();
        $order->customer_id = $customer->id;

        $order->user_id = Auth::id();

        if ($request->membership_card_number) {
            $member = Member::where('is_active', 1)->where('membership_card_number', $request->membership_card_number)->first();
            if ($member) {
                $discount = $member->membership_discount / 100;
                $order_total = $order_total - ($order_total * $discount);
                $customer->membership_id = $member->id;
                $customer->save();
            }
        }

        $order->order_total = $order_total;
        $order->amount_rendered = $request->amount_rendered;
        $order->order_change = $amount_rendered - $order_total;
        $order->save();

        foreach ($orderItems as $item) {
            $orderItem = new Item();
            $orderItem->order_id = $order->id;
            $orderItem->order_item_id = $this->generateOrderItemID();
            $orderItem->product_id = $item['id'];
            $orderItem->product_name = $item['product_name'];
            $orderItem->price = $item['product_price'];
            $orderItem->quantity = $item['item_quantity'];
            $orderItem->subtotal = $item['product_price'] * $item['item_quantity'];
            $orderItem->save();

            // *we can use the currently iterated item id 
            // *since we have foreign key in our order item to target the product and update the quantity
            $product = Product::find($item['id']);
            if ($product) {
                $product->product_quantity -= $item['item_quantity'];
                $product->save();
            }
        }

        return redirect()->route('receipt', ['order_id' => $order->id])->with('success', 'Order completed.');

    }
    public function checkMembershipCardNumber(Request $request)
    {
        $member = Member::where('membership_card_number', $request->membership_card_number)->first();
        if ($member) {
            return response()->json(['status' => 'success', 'message' => 'Membership card number found.', 'member_name' => $member->membership_name]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Membership card number not found.']);
        }
    }
    public function receipt($order_id)
    {
        $order = Order::findOrFail($order_id);
        $employee = Auth::user();
        return view('employee.receipt', compact('order', 'employee'));
    }
    public function getItem($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function generateCustomerID()
    {
        $customer_id = rand(100000, 999999);
        if (Customer::where('customer_id', $customer_id)->exists()) {
            $this->generateCustomerID();
        } else {
            return $customer_id;
        }
    }

    public function generateOrderID()
    {
        $order_id = rand(100000, 999999);
        if (Order::where('order_id', $order_id)->exists()) {
            $this->generateOrderID();
        } else {
            return $order_id;
        }
    }
    public function generateOrderItemID()
    {
        $order_item_id = rand(100000, 999999);
        if (Item::where('order_item_id', $order_item_id)->exists()) {
            $this->generateOrderItemID();
        } else {
            return $order_item_id;
        }
    }

}