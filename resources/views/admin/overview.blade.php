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
                    <a href="{{ route('admin') }}"  class="tb-mn-ln-item-a">
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
                    <a  href="{{ url('/admin/category') }}"  class="sidebar-menu-item">
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
                <div class="archive-show" id="archive-expand-category">
                    <span class="">Archive</span>

                </div>
            </div>

            <div class="menu-item">
                <div class="r-item">
                    <a  href="{{ url('/admin/product') }}"  class="sidebar-menu-item">
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
                    <a  href="{{ url('/admin/employee') }}"  class="sidebar-menu-item">
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
            <span class="h-date-now">Wednesday, Feb 15, 2024</span>
        </div>
        <div class="c-flex-wrapper">
            <!-- ITEM 1 - LEFT -->
            <div class="c-left-content">
                <div class="cards-wrapper">
                    <div class="t-card">
                        <div class="card orange">
                            <div class="card-heading">
                                <span class="text-heading">Total Sales</span>
                            </div>
                            <div class="card-body"></div>
                            <div class="card-footer"></div>
                        </div>
                        <div class="card orange">
                            <div class="card-heading">
                                <span class="text-heading">Total Orders</span>
                            </div>
                            <div class="card-body"></div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    <div class="t-card">
                        <div class="card orange">
                            <div class="card-heading">
                                <span class="text-heading">Product Sold</span>
                            </div>
                            <div class="card-body"></div>
                            <div class="card-footer"></div>
                        </div>
                        <div class="card orange">
                            <div class="card-heading">
                                <span class="text-heading">Customer</span>
                            </div>
                            <div class="card-body"></div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                </div>


                <div class="r-orders">
                    <div class="r-orders-flex">
                        <div class="r-heading">
                            <span class="r-title">Recent Orders</span>
                            <span class="r-more"><a href="#">View all</a></span>
                        </div>
                        <div class="r-body">
                            <div class="r-body-h">
                                <span class="id">ID</span>
                                <span class="name">Product</span>
                                <span class="qty">Quantity</span>
                                <span class="employee">Employee</span>
                                <span class="date">Date</span>

                            </div>
                            <div class="r-body-c"></div>
                        </div>
                        <div class="r-footer"></div>
                    </div>
                </div>


            </div>
            <!-- ITEM 2 - RIGHT -->
            <div class="c-right-content">
                <div class="card-product">
                    <div class="card-heading">
                        <span class="text-heading">Popular Products</span>
                        <div class="r-n-heading">
                            <span class="rank-heading">Rank</span>
                            <span class="name-heading">Name</span>
                        </div>
                    </div>
                    <div class="card-body"></div>
                    <div class="card-footer"></div>
                </div>

                <div class="card-no-stock">
                    <div class="card-heading">
                        <span class="text-heading">Out of Stock</span>
                    </div>
                    <div class="card-body"></div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/script.js"></script>
@endsection
