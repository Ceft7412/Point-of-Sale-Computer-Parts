@extends('layouts.admin')

@section('title', 'Product')
@section('css')
    <link rel="stylesheet" href="../dest/css/style.css">
@endsection
@section('content')
    
    <div class="topbar-wrapper">
        <div class="topbar-flex-wrapper">
            <div class="topbar-left">
                <div class="topbar-logo">
                    <a href="dashboard.html" class="bigtext-wrapper">
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
                    <a href="{{ url('admin/overview') }}" class="tb-mn-ln-item-a">
                        <i class="bi bi-columns-gap"></i>
                        <span class="">Overview</span>
                    </a>

                    <a href="{{ url('admin/category') }}" class="tb-mn-ln-item-a">
                        <i class="bi bi-card-checklist"></i>
                        <span class="">Category</span>
                    </a>
                    <a class="tb-mn-ln-item-a  active">

                        <i class="bi bi-clipboard-check"></i>
                        <span class="">Product</span>
                    </a>
                    <a href="{{ url('admin/transaction') }}" class="tb-mn-ln-item-a">
                        <i class="bi bi-receipt"></i>

                        <span class="">Transaction</span>
                    </a>
                    <a href="{{ url('admin/employee') }}"class="tb-mn-ln-item-a">
                        <i class="bi bi-people"></i>
                        <span class="">Employee</span>
                    </a>
                    <a href="{{ url('admin/admin') }}" class="tb-mn-ln-item-a">
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
            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ url('/admin/overview') }}" class="sidebar-menu-item">
                        <div class="flex-item">
                            <i class="bi bi-columns-gap"></i>
                            <span class="">Overview</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ route('category') }}" class="sidebar-menu-item">
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
                <a href="{{route('archive-category') }}" class="archive-show" id="archive-expand-category">
                    <span class="">Archive</span>

                </a>
            </div>

            <div class="menu-item active">
                <div class="r-item active">
                    <a href="{{ route('product') }}"" class="sidebar-menu-item">
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
                    <a href="{{route('employee')}}"class="sidebar-menu-item">
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
                <a href="{{ route('archive-employee') }}"class="archive-show" id="archive-expand-employee">
                    <span class="">Archive</span>

                </a>
            </div>
            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ url('admin/admin') }}"class="sidebar-menu-item">
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


    @include('action.add-product')
    {{-- TODO --}}
    <div class="c-wrapper">
        <div class="c-heading-wrapper category">    
            <div class="ct-title">
                <span class="title">Product</span>
                <span class="description">Track and manage your product</span>
            </div>
            <div class="ct-add" id="add-button-modal">
                <div class="ct-add-flex">
                    <span class="material-symbols-outlined">
                        add
                    </span>
                    <span class="product">Product</span>
                </div>
            </div>
        </div>
        <div class="ct-body">
            <div class="ct-body-flex">
                <div class="ct-body-heading">
                    <span class="ct-heading-l">Active Products</span>
                    <div class="ct-heading-r">
                        <form class="ct-heading-search">
                            
                            <input type="text" class="ct-heading-search-input" placeholder="Product ID">
                            <button type="submit" class="search-id"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="ct-body-content">
                    <div class="table-wrapper">
                        <div class="table">
                            <div class="product-header">
                                <div class="table-row">
                                    <div class="table-cell">
                                        <input type="checkbox">
                                    </div>
                                    <div class="table-cell">Product ID</div>
                                    <div class="table-cell category-cell">
                                        <span>Name</span>
                                    </div>
                                    <div class="table-cell">Category</div>
                                    <div class="table-cell">Price</div>
                                    <div class="table-cell">Quantity</div>
                                    <div class="table-cell">Purchase</div>
                                    <div class="table-cell">Inserted Date</div>
                                    <div class="table-cell">Modified Date</div>
                                    <div class="table-cell">Action</div>
                                </div>
                            </div>
                            <div class="product-body">
                                <div class="table-row" id="">

                                    <div class="table-cell">
                                        <input type="checkbox">
                                    </div>
                                    <div class="table-cell">Product ID</div>
                                    <div class="table-cell">
                                        <img src="" alt="" class="picture">
                                        <span class="item"></span>
                                    </div>
                                    <div class="table-cell">

                                    </div>

                                    <div class="table-cell"></div>
                                    <div class="table-cell">
                                        <span></span>

                                    </div>
                                    <div class="table-cell" style="display: flex;">
                                        <span></span>

                                    </div>
                                    <div class="table-cell date">
                                        <span>2022-03-01</span>
                                        <span>10:30:00</span>
                                    </div>
                                    <div class="table-cell date" style="display: flex;">
                                        <span>2022-03-05</span>
                                        <span>15:45:00</span>
                                    </div>
                                    <div class="table-cell action">
                                        <div class="action-p edit-w" id="">
                                            <span class="material-symbols-outlined">
                                                edit_square
                                            </span>
                                            <span class="">Update</span>
                                        </div>
                                        <div class="action-p archive-w">
                                            <span class="material-symbols-outlined">
                                                archive
                                            </span>
                                            <span class="">Archive</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
@endsection
