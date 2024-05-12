<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DashboardController extends Controller
{
    public function redirectOverview()
    {
        $currentDate = now()->format('l, M d, Y');
        $recentOrders = Order::latest()->take(5)->get();
        $products = Product::where('is_active', 1)->where('product_quantity', 0)->get();
        
        $totalOrders = $this->getTotalOrders();
        $totalCustomers = $this->getTotalCustomers();
        $totalProductsSold = $this->getTotalProductsSold();
        $popularProducts = $this->getPopularProducts();
        $totalSales = $this->getTotalSales();

        return view('admin.overview')
            ->with('currentDate', $currentDate)
            ->with('recentOrders', $recentOrders)
            ->with('products', $products)
            ->with('totalOrders', $totalOrders)
            ->with('totalCustomers', $totalCustomers)
            ->with('popularProducts', $popularProducts)
            ->with('totalProductsSold', $totalProductsSold)
            ->with('totalSales', $totalSales);
    }

    private function getTotalOrders()
    {
        return [
            'total' => Order::count(),
            'today' => Order::whereDate('created_at', '=', date('Y-m-d'))->count(),
            'thisWeek' => Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'thisMonth' => Order::whereMonth('created_at', '=', date('m'))->count(),
        ];
    }

    private function getTotalProductsSold()
    {
        return [
            'total' => DB::table('order_items')->sum('quantity'),
            'today' => DB::table('order_items')
                ->whereDate('created_at', '=', date('Y-m-d'))
                ->sum('quantity'),
            'thisWeek' => DB::table('order_items')
                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->sum('quantity'),
            'thisMonth' => DB::table('order_items')
                ->whereMonth('created_at', '=', date('m'))
                ->sum('quantity'),
        ];
    }
    private function getPopularProducts()
    {
        return DB::table('order_items')
            ->select('product_id', DB::raw('sum(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->take(5)
            ->get()
            ->map(function ($item) {
                $product = Product::find($item->product_id);
                $product->total_quantity = $item->total_quantity;
                return $product;
            });
    }

    private function getTotalSales()
    {
        return [
            'total' => DB::table('order_items')->sum('subtotal'),
            'today' => DB::table('order_items')
                ->whereDate('created_at', '=', date('Y-m-d'))
                ->sum('subtotal'),
            'thisWeek' => DB::table('order_items')
                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->sum('subtotal'),
            'thisMonth' => DB::table('order_items')
                ->whereMonth('created_at', '=', date('m'))
                ->sum('subtotal'),
        ];
    }

    private function getTotalCustomers()
    {
        return [
            'total' => Customer::count(),
            'today' => Customer::whereDate('created_at', '=', date('Y-m-d'))->count(),
            'thisWeek' => Customer::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'thisMonth' => Customer::whereMonth('created_at', '=', date('m'))->count(),
        ];
    }
}
