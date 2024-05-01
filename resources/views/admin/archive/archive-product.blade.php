@extends('layouts.admin')

@section('title', 'Archived Product')
@section('css')
    <link rel="stylesheet" href="/../dest/css/style.css">
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
                <a href="{{ route('archive-category') }}" class="archive-show" id="archive-expand-category">
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
                <a class="archive-show active" id="archive-expand-product">
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
                    <a href="{{ route('employee') }}"class="sidebar-menu-item">
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


    {{-- *ERROR --}}
    @if ($errors->any())

        <div class="error-wrapper">
            <div class="error-modal">
                <div class="body">
                    <span class="text">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </span>
                    <i class="bi bi-x-lg cancel"></i>
                </div>
            </div>
        </div>

    @endif
    {{-- *SUCCESS --}}
    @if (session('success'))
        <div class="success-modal">
            <div class="success-modal">
                <div class="body">

                    <i class="bi bi-check-circle-fill"></i>
                    <i class="bi bi-check"></i>


                    <div class="text">
                        <span class="big">Success</span>
                        <span class="small">{{ session('success') }}</span>
                    </div>
                </div>
                <div class="footer">
                    <button type="button" class="ok">OK</button>
                </div>
            </div>
        </div>
    @endif


    
    <div class="c-wrapper">
        <div class="c-heading-wrapper category">
            <div class="ct-title">
                <span class="title">Archived Products</span>
            </div>
        </div>
        <div class="ct-body">
            <div class="ct-body-flex">
                <div class="ct-body-heading">
                    <a href="{{ route('product') }}" class="go-back">
                        <i class="bi bi-arrow-bar-left"></i>
                        <span class="back">GO BACK</span>
                    </a>
                    <div class="ct-heading-r">
                        <form method="GET" action="{{ route('archive-product') }}"class="ct-heading-search">

                            <input type="text" name="search" class="ct-heading-search-input"
                                placeholder="Product ID" value="{{ request()->query('search') }}">
                            <button type="submit" class="search-id"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
                <form action="{{ route('unarchiveProductGroup') }}" class="" method="POST">
                    @csrf
                    <button type="submit" id="archiveButton" style="display: none;">Set to active</button>
                    <div class="ct-body-content">
                        <div class="table-wrapper">
                            <div class="table">
                                <div class="product-header">
                                    <div class="table-row">
                                        <div class="table-cell">
                                            @if (count($products) > 0)
                                                <input type="checkbox" id="selectAllCheckbox">
                                            @endif
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
                                    @forelse($products as $product)
                                        <div class="table-row" id="">

                                            <div class="table-cell">
                                                <input type="checkbox" class="userCheckbox" name="productIds[]"
                                                    value="{{ $product->id }}">
                                            </div>
                                            <div class="table-cell">P{{ $product->product_id }}</div>
                                            <div class="table-cell">
                                                <img src="/../assets/images/product_uploads/{{ $product->product_image }}"
                                                    alt="{{ $product->product_name }}" class="picture">
                                                <span class="item">{{ $product->product_name }}</span>
                                            </div>
                                            <div class="table-cell">
                                                {{ $product->subcategory->subcategory_name }}
                                            </div>

                                            <div class="table-cell">{{ $product->product_price }}</div>
                                            <div class="table-cell">
                                                <span>{{ $product->product_quantity }}</span>

                                            </div>
                                            <div class="table-cell" style="display: flex;">
                                                <span>3</span>

                                            </div>
                                            <div class="table-cell date">
                                                <span>{{ $product->created_at->toDateString() }}</span>
                                                <span>{{ $product->created_at->toTimeString() }}</span>
                                            </div>
                                            <div class="table-cell date" style="display: flex;">
                                                <span>{{ $product->updated_at->toDateString() }}</span>
                                                <span>{{ $product->updated_at->toTimeString() }}</span>
                                            </div>
                                            <div class="table-cell action">
                                                <div class="flex-col">
                                                    <div class="action-p archive-w">
                                                        <button type="button" class="unarchiveProductButton"
                                                            data-id="{{ $product->id }}">
                                                            <i class="bi bi-archive"></i>
                                                            <span class="">Active</span>
                                                        </button>
                                                    </div>
                                                </div>
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
                    </div>
                </form>
                <div class="archive-modal-wrapper">
                    <div class="modal-card-wrapper" id="modal-card">
                        <div class="heading">

                            <span class="text-left">
                                Set to Active
                            </span>
                            <span class="cancel-archive">
                                <i class="bi bi-x-lg"></i>
                            </span>
                        </div>

                        <div class="body">
                            <div class="text">
                                Unarchiving this row will remove the product from the inactive list and will remain active.
                                Are you sure
                                you
                                want to
                                proceed?
                            </div>
                        </div>
                        <div class="footer">
                            <form method="POST" action="" id="unarchiveProductForm">
                                @csrf
                                <button type="button" class="cancel-archive">No, keep this inactive</button>
                                <button type="submit" class="confirm-archive">Yes, make this active</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>



@endsection


@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/../js/script.js"></script>
@endsection
