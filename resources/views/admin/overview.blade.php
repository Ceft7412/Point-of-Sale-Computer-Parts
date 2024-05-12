@extends('layouts.admin')

@section('title', 'Overview')
@section('css')
    <link rel="stylesheet" href="../dest/css/style.css">
@endsection
@section('content')
    {{-- TOPBAR --}}
    <div class="topbar-wrapper">
        <div class="topbar-flex-wrapper">
            <div class="topbar-left">
                <div class="topbar-logo">
                    <a href="dashboard.php" class="bigtext-wrapper">
                        <span class="bigtext-easy">EASY</span>
                        <span class="bigtext-tech">TECH</span>
                    </a>
                    <span class="smalltext-wrapper">COMPUTER PARTS</span>
                </div>
            </div>
            <div class="topbar-right" id="topbar_menu">
                <div class="topbar-right-flex">
                    <i class="bi bi-list"></i>
                    <span class="t-menu">Menu</span>
                </div>
            </div>
            <div class="tb-mn-ln">
                <div class="tb-mn-ln-flex">
                    <a class="tb-mn-ln-item-a active">
                        <i class="bi bi-columns-gap"></i>
                        <span class="">Overview</span>
                    </a>
                    <a href="category.php" class="tb-mn-ln-item-a">
                        <i class="bi bi-card-checklist"></i>
                        <span class="">Category</span>
                    </a>
                    <a href="product.html" class="tb-mn-ln-item-a">
                        <i class="bi bi-clipboard-check"></i>
                        <span class="">Product</span>
                    </a>
                    <a href="transaction.php" class="tb-mn-ln-item-a">

                        <i class="bi bi-receipt"></i>
                        <span class="">Transaction</span>

                    </a>
                    <a href="{{ route('employee') }}" class="tb-mn-ln-item-a">
                        <i class="bi bi-people"></i>
                        <span class="">Employee</span>
                    </a>
                    <a href="{{ route('admin') }}" class="tb-mn-ln-item-a">
                        <i class="bi bi-person-gear"></i>
                        <span class="">Admin</span>
                    </a>
                    <div class="out-wrapper">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="out-flex-wrapper" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="bi bi-box-arrow-left"></i>
                                <span class="text-logout">Logout</span>


                            </div>


                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- SIDEBAR --}}
    <div class="sidebar-wrapper">


        <div class="sidebar-menu">
            <div class="menu-item active">
                <div class="r-item active">
                    <a class="sidebar-menu-item">
                        <div class="flex-item">
                            <i class="bi bi-columns-gap"></i>
                            <span class="">Overview</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ url('/admin/category') }}" class="sidebar-menu-item">
                        <div class="flex-item">

                            <i class="bi bi-card-checklist"></i>
                            <span class="">Category</span>

                        </div>
                    </a>
                    <div class="chevrons-action">
                        <i class="more bi bi-chevron-down" id="expand-more-category"></i>
                        <i class="less bi bi-chevron-up" id="expand-less-category"></i>
                    </div>
                </div>
                <a href="{{ route('archive-category') }}" class="archive-show" id="archive-expand-category">
                    <span class="">Archive</span>

                </a>
            </div>

            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ url('/admin/product') }}" class="sidebar-menu-item">
                        <div class="flex-item">
                            <i class="bi bi-clipboard-check"></i>
                            <span class="">Product</span>

                        </div>
                    </a>
                    <div class="chevrons-action">
                        <i class="more bi bi-chevron-down" id="expand-more-product"></i>
                        <i class="less bi bi-chevron-up" id="expand-less-product"></i>
                    </div>
                </div>
                <div class="archive-show" id="archive-expand-product">
                    <span class="">Archive</span>

                </div>
            </div>

            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ url('/admin/transaction') }}" class="sidebar-menu-item">
                        <div class="flex-item">
                            <i class="bi bi-receipt"></i>
                            <span class="">Transaction</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ url('/admin/employee') }}" class="sidebar-menu-item">
                        <div class="flex-item">
                            <i class="bi bi-people"></i>
                            <span class="">Employee
                            </span>

                        </div>
                    </a>
                    <div class="chevrons-action">
                        <i class="more bi bi-chevron-down" id="expand-more-employee"></i>
                        <i class="less bi bi-chevron-up" id="expand-less-employee"></i>
                    </div>
                </div>
                <div class="archive-show" id="archive-expand-employee">
                    <span class="">Archive</span>

                </div>
            </div>
            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ url('admin/admin') }}" class="sidebar-menu-item">
                        <div class="flex-item">
                            <i class="bi bi-person-gear"></i>
                            <span class="">Admin
                            </span>

                        </div>
                    </a>
                    <div class="chevrons-action">
                        <i class="more bi bi-chevron-down" id="expand-more-admin"></i>
                        <i class="less bi bi-chevron-up" id="expand-less-admin"></i>
                    </div>
                </div>
                <div class="archive-show" id="archive-expand-admin">
                    <span class="">Archive</span>

                </div>
            </div>
            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ url('admin/membership') }}"class="sidebar-menu-item">
                        <div class="flex-item">
                            <i class="bi bi-people"></i>
                            <span class="">Membership
                            </span>

                        </div>
                    </a>
                    <div class="chevrons-action">
                        <i class="more bi bi-chevron-down" id=""></i>
                        <i class="less bi bi-chevron-up" id=""></i>
                    </div>
                </div>
                <a href="{{ route('archive-employee') }}" class="archive-show" id="archive-expand-employee">
                    <span class="">Archive</span>

                </a>
            </div>
        </div>

        <div class="out-wrapper">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="out-flex-wrapper" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="text-logout">Logout</span>


                </div>


            </form>

        </div>




    </div>

    <!-- CONTENT -->

    <div class="c-wrapper">
        <div class="c-heading-wrapper">
            <span class="dashboard">Overview</span>
            <span class="h-date-now">{{ $currentDate }}</span>
        </div>
        <div class="c-flex-wrapper">
            <!-- ITEM 1 - LEFT -->
            <div class="c-left-content">
                <div class="cards-wrapper">
                    <div class="t-card">
                        <div class="card orange">
                            <div class="card-heading">
                                <span class="text-heading">Total Sales</span>
                                <i class="bi bi-three-dots show-slct " id="show-slct-sales"></i>
                                <div class="date-sales" id="date-sales">
                                    <div class="sales-fl">
                                        <span class="t-slct" id="sales-t">Today</span>
                                        <span class="w-slct" id="sales-w">This Week</span>
                                        <span class="m-slct" id="sales-m">This Month</span>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <span class="default-sales" id="default-sales">₱ {{ number_format($totalSales['total'], 2) }}</span>
                                <span class="ch first-item" id="today-sales">₱ {{ number_format($totalSales['today'], 2) }}</span>
                                <span class="ch second-item" id="week-sales">₱ {{ number_format( $totalSales['thisWeek'], 2) }}</span>
                                <span class="ch third-item" id="month-sales">₱ {{ number_format($totalSales['thisMonth'], 2) }}</span>
                            </div>

                        </div>
                        <div class="card orange">
                            <div class="card-heading">
                                <span class="text-heading">Total Orders</span>
                                <i class="bi bi-three-dots show-slct" id="show-slct-orders"></i>
                                <div class="date-sales" id="date-orders">
                                    <div class="sales-fl">
                                        <span class="t-slct" id="orders-t">Today</span>
                                        <span class="w-slct" id="orders-w">This Week</span>
                                        <span class="m-slct" id="orders-m">This Month</span>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <span class="default-sales" id="default-orders">{{$totalOrders['total']}}</span>
                                <span class="ch first-item" id="today-orders">{{$totalOrders['today']}}</span>
                                <span class="ch second-item" id="week-orders">{{$totalOrders['thisWeek']}}</span>
                                <span class="ch third-item" id="month-orders">{{$totalOrders['thisMonth']}}</span>
                            </div>

                        </div>
                    </div>
                    <div class="t-card">
                        <div class="card orange">
                            <div class="card-heading">
                                <span class="text-heading">Product Sold</span>
                                <i class="bi bi-three-dots show-slct" id="show-slct-products"></i>
                                <div class="date-sales" id="date-products">
                                    <div class="sales-fl">
                                        <span class="t-slct" id="products-t">Today</span>
                                        <span class="w-slct" id="products-w">This Week</span>
                                        <span class="m-slct" id="products-m">This Month</span>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <span class="default-sales" id="default-products">{{$totalProductsSold['total']}}</span>
                                <span class="ch first-item" id="today-products">{{$totalProductsSold['today']}}</span>
                                <span class="ch second-item" id="week-products">{{$totalProductsSold['thisWeek']}}</span>
                                <span class="ch third-item" id="month-products">{{$totalProductsSold['thisMonth']}}</span>
                            </div>

                        </div>
                        <div class="card orange">
                            <div class="card-heading">
                                <span class="text-heading">Customer</span>
                                <i class="bi bi-three-dots show-slct" id="show-slct-customers"></i>
                                <div class="date-sales" id="date-customers">
                                    <div class="sales-fl">
                                        <span class="t-slct" id="customers-t">Today</span>
                                        <span class="w-slct" id="customers-w">This Week</span>
                                        <span class="m-slct" id="customers-m">This Month</span>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <span class="default-sales" id="default-customers">{{$totalCustomers['total']}}</span>
                                <span class="ch first-item" id="today-customers">{{$totalCustomers['today']}}</span>
                                <span class="ch second-item" id="week-customers">{{$totalCustomers['thisWeek']}}</span>
                                <span class="ch third-item" id="month-customers">{{$totalCustomers['thisMonth']}}</span>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                </div>


                <div class="r-orders">
                    <div class="r-orders-flex">
                        <div class="r-heading">
                            <span class="r-title">Recent Orders</span>
                            <span class="r-more"><a href="{{ route('transaction') }}">View all</a></span>
                        </div>
                        <div class="r-body">
                            <div class="r-body-h">
                                <span class="cell id">Order ID</span>
                                <span class="cell name mrgn">Product</span>
                                <span class="cell name qty">Quantity</span>
                                <span class="cell employee">Employee</span>
                                <span class="cell date">Date</span>

                            </div>
                            <div class="r-body-c">
                                @forelse ($recentOrders as $recentOrder)
                                    <div class="r-body-c-row">
                                        <span class="cell id">{{ $recentOrder->order_id }}</span>
                                        <span class="cell name mrgn">
                                            @foreach ($recentOrder->items as $product)
                                                <span>- {{ $product->product_name }}</span>
                                            @endforeach
                                        </span>
                                        <span class="cell name qty">
                                            @foreach ($recentOrder->items as $product)
                                                <span>{{ $product->quantity }}</span>
                                            @endforeach
                                        </span>
                                        <span class="cell employee">{{ $recentOrder->user->name }}</span>
                                        <span class="cell date">{{ $recentOrder->created_at }}</span>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="r-footer"></div>
                    </div>
                </div>


            </div>
            <!-- ITEM 2 - RIGHT -->
            <div class="c-right-content">
                <div class="card-product">
                    <div class="card-heading">
                        <div class="text-heading">
                            <span>Popular Products</span>
                            <a class="small" href="{{ route('product') }}">View all</a>
                        </div>
                        <div class="r-n-heading">
                            <span class="rank-heading">Rank</span>
                            <span class="name-heading">Name</span>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($popularProducts as $product)
                            <div class="b-row">

                                <span class="product-rank">{{ $loop->iteration }}</span>
                                <span>{{ $product->product_name }}</span>


                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="card-no-stock">
                    <div class="card-heading">
                        <span class="text-heading">Out of Stock</span>
                        <a href="{{ route('product') }}">View all</a>
                    </div>
                    <div class="card-body">
                        @forelse($products as $product)
                            <div class="b-row">
                                <span class="">{{ $product->product_name }}</span>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('js')
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/script.js"></script>
@endsection
