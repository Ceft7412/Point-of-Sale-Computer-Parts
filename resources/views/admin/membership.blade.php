@extends('layouts.admin')

@section('title', 'Membership')
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
                <a href="{{ url('admin/product') }}" class="tb-mn-ln-item-a">

                    <i class="bi bi-clipboard-check"></i>
                    <span class="">Product</span>
                </a>
                <a href="{{ url('admin/transaction') }}" class="tb-mn-ln-item-a">
                    <i class="bi bi-receipt"></i>
                    <span class="">Transaction</span>
                </a>
                <a class="tb-mn-ln-item-a">
                    <i class="bi bi-people"></i>
                    <span class="">Employee</span>
                </a>
                <a class="tb-mn-ln-item-a active">
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
<!-- SIDEBAR -->
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
                <a href="{{ route('product') }}" class="sidebar-menu-item">
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
                <a href="{{ url('admin/employee') }}" class="sidebar-menu-item">
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
                <a class="sidebar-menu-item">
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
        <div class="menu-item active">
            <div class="r-item active">
                <a href="{{ url('admin/membership') }}" class="sidebar-menu-item">
                    <div class="flex-item">
                        <i class="bi bi-person-vcard"></i>
                        <span class="">Membership
                        </span>

                    </div>
                </a>

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
<div class="c-wrapper">
    <div class="c-heading-wrapper category">
        <div class="ct-title">
            <span class="title">Membership</span>
            <span class="description">Track and manage members</span>
        </div>
        <div class="ct-add" id="add-button-modal">
            <div class="ct-add-flex">
                <span class="material-symbols-outlined">
                    add
                </span>
                <span class="employee">Member</span>
            </div>
        </div>
    </div>

    <div class="m-ct-wr">
        <div class="hd-ct">
            <div class="itm-ct hd-active-itm active">
                <span class="">Active Members</span>
            </div>

            <div class="itm-ct hd-pending-itm">
                <span class="">Pending Request</span>
            </div>
        </div>
        <div class="hd-fl-ct">
            <div class="fl-per-pg">

            </div>
            <div class="fl-sr">
                <label for=""><i class="bi bi-search"></i></label>
                <input type="text" placeholder="Member ID">
            </div>

        </div>

        <div class="bd-ct">
            <div class="tbl">
                <div class="thdr">
                    <div class="tbl-cell">
                        <input type="checkbox">
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Membership ID</span>
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Name</span>

                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Email</span>
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Phone</span>
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Card Number</span>
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Status</span>
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Action</span>
                    </div>
                </div>
                <div class="tbdy">
                    <div class="tbl-cell">
                        <input type="checkbox">
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">123456890</span>
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Name</span>

                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Email</span>
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Phone</span>
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Card Number</span>
                    </div>
                    <div class="tbl-cell">
                        <span class="txt-cell">Status</span>
                    </div>
                    <div class="tbl-cell">
                        <button><i class="bi bi-pencil-square"></i>Update</button>
                        <button><i class="bi bi-archive"></i>Archive</button>
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
