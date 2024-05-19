@extends('layouts.admin')

@section('title', 'Transaction')
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
            <div class="menu-item ">
                <div class="r-item ">
                    <a href="{{ route('overview') }}" class="sidebar-menu-item">
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
                <a href="{{ route('archive-product') }}" class="archive-show" id="archive-expand-product">
                    <span class="">Archive</span>
                </a>
            </div>

            <div class="menu-item active">
                <div class="r-item active">
                    <a class="sidebar-menu-item">
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
                <a href="{{ route('archive-employee') }}" class="archive-show" id="archive-expand-employee">
                    <span class="">Archive</span>

                </a>
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
                <a href="{{ route('archive-admin') }}" class="archive-show" id="archive-expand-admin">
                    <span class="">Archive</span>

                </a>
            </div>
            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ url('admin/membership') }}" class="sidebar-menu-item">
                        <div class="flex-item">
                            <i class="bi bi-person-vcard"></i>
                            <span class="">Membership
                            </span>

                        </div>
                    </a>
                    <div class="chevrons-action">
                        <i class="more bi bi-chevron-down" id="expand-more-member"></i>
                        <i class="less bi bi-chevron-up" id="expand-less-member"></i>
                    </div>

                </div>
                <a href="{{ route('archive-member') }}" class="archive-show" id="archive-expand-member">
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


    <div class="c-wrapper">
        <div class="c-heading-wrapper category">
            <div class="ct-title">
                <span class="title">Transaction Records</span>
                <span class="description">Track your POS transactions</span>
            </div>

        </div>
        <div class="ct-body">
            <div class="ct-body-flex">
                <div class="ct-body-heading">
                    <div class="ct-heading-r">
                        <form method="GET" action="{{ route('transaction') }}"class="ct-heading-search">

                            <input type="text" name="search" class="ct-heading-search-input"
                                placeholder="Search for transactions..." value="{{ request()->query('search') }}">
                            <button type="submit" class="search-id"><i class="bi bi-search"></i></button>
                        </form>
                        <form action="/admin/transaction/export" class="exprt-csv">
                            <button type="submit" class="submit-export-csv">
                                Export CSV
                            </button>
                        </form>

                    </div>
                </div>
                <div class="ct-body-content">
                    <div class="table-wrapper">
                        <div class="table">
                            <div class="transaction-header">
                                <div class="table-row">
                                    <div class="table-cell">
                                        Transaction No.
                                    </div>
                                    <div class="table-cell category-cell">
                                        <span>Date</span>
                                    </div>
                                    <div class="table-cell">Item/s</div>
                                    <div class="table-cell">Employee</div>
                                    <div class="table-cell">Quantity</div>
                                    <div class="table-cell">Price</div>
                                    <div class="table-cell">Sub-total</div>
                                    <div class="table-cell">Total</div>

                                </div>
                            </div>
                            <div class="transaction-body">
                                @forelse ($transactions as $transaction)
                                    <div class="table-row">

                                        <div class="table-cell">
                                            {{ $transaction->order_id }}
                                        </div>
                                        <div class="table-cell date">
                                            <span>{{ $transaction->created_at->toDateString() }}</span>
                                            <span>{{ $transaction->created_at->toTimeString() }}</span>
                                        </div>

                                        <div class="table-cell">
                                            @foreach ($transaction->items as $productName)
                                                <span>- {{ $productName->product_name }}</span>
                                            @endforeach

                                        </div>
                                        <div class="table-cell">{{ $transaction->user->name }}</div>
                                        <div class="table-cell flx-col-i">
                                            @foreach ($transaction->items as $quantity)
                                                <span>{{ $quantity->quantity }}</span>
                                            @endforeach

                                        </div>
                                        <div class="table-cell flx-col-i">
                                            @foreach ($transaction->items as $price)
                                                <span>₱{{ $price->price }}</span>
                                            @endforeach

                                        </div>
                                        <div class="table-cell flx-col-i">
                                            @foreach ($transaction->items as $subTotal)
                                                <span>₱{{ $subTotal->subtotal }}</span>
                                            @endforeach
                                        </div>
                                        <div class="table-cell date" style="display: flex;">
                                            <span class="">₱{{ $transaction->order_total }}</span>
                                        </div>

                                    </div>
                                @empty
                                    @if (request()->query('search'))
                                        <div class="no-data">
                                            <span>No result found for query
                                                <strong>{{ request()->query('search') }}</strong></span>
                                        </div>
                                    @else
                                        <div class="no-data">
                                            <span>No data available</span>
                                        </div>
                                    @endif
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div>{{ $transactions->appends(['search' => request()->query('search')])->links() }}</div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/script.js"></script>
@endsection
