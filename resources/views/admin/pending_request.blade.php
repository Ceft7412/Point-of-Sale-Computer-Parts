@extends('layouts.admin')

@section('title', 'Pending')
@section('css')
    <link rel="stylesheet" href="/dest/css/style.css">
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
                    <div class="chevrons-action">
                        <i class="more bi bi-chevron-down" id="expand-more-member"></i>
                        <i class="less bi bi-chevron-up" id="expand-less-member"></i>
                    </div>

                </div>
                <a href="{{ route('archive-member') }}" class="archive-show active" id="archive-expand-member">
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

            </div>
        </div>

        <div class="m-ct-wr">
            <div class="hd-ct">
                <a href="{{ route('membershipRedirect') }}" class="itm-ct hd-active-itm">
                    <span class="">Active Members</span>
                </a>

                <div class="itm-ct hd-pending-itm active">
                    <span class="">Pending Request</span>
                </div>
            </div>
            <div class="hd-fl-ct">
                <form class="fl-per-pg" method="POST" id="archiveGroup" action="{{ route('decline-members') }}">
                    @csrf
                    <button type="button" class="archive_select_group" id="archive_select_group">Decline</button>
                    <div class="archive-modal-wrapper">
                        <div class="modal-card-wrapper" id="modal-card">
                            <div class="heading">

                                <span class="text-left">
                                    Decline Membership
                                </span>
                                <span class="cancel-archive">
                                    <i class="bi bi-x-lg"></i>
                                </span>
                            </div>

                            <div class="body">
                                <div class="text">
                                    The selected rows will be declined. Are you sure you want to proceed?
                                </div>
                            </div>
                            <div class="footer">

                                <button type="button" class="cancel-archive">No, keep this</button>
                                <button type="submit" class="confirm-archive">Yes, decline the application</button>

                            </div>

                        </div>
                    </div>
                </form>
                <form method="GET" action="{{ route('pending.request-membership') }}" class="fl-sr">
                    <input type="text" name="search" value="{{ request()->query('search') }}"
                        placeholder="Search for applicant names...">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>

            </div>

            <div class="bd-ct">
                <div class="tbl">
                    <div class="thdr">
                        <div class="tbl-cell">
                            <input type="checkbox" id="selectAllCheckbox">
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
                            <span class="txt-cell">Action</span>
                        </div>
                    </div>
                    <div class="tbdy">
                        @forelse($pendingMembers as $pendingMember)
                            <div class="tbdy-rw">
                                <div class="tbl-cell">
                                    <input type="checkbox" class="userCheckbox" name="archiveIds[]"
                                        value="{{ $pendingMember->id }}">
                                </div>

                                <div class="tbl-cell">
                                    <span class="txt-cell">{{ $pendingMember->membership_name }}</span>

                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">{{ $pendingMember->membership_email }}</span>
                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">{{ $pendingMember->membership_phone }}</span>
                                </div>
                                <div class="tbl-cell">
                                    <form action="/pending-membership/accepted/{{ $pendingMember->id }}" method="POST">
                                        @csrf
                                        <button type="button" id="accept_membership"><i
                                                class="bi bi-check-circle"></i>Accept</button>

                                        <div class="a-m-wrapper" id="accept_membership_modal">
                                            <div class="a-modal">
                                                <div class="a-modal-f">
                                                    <div class="hdr">
                                                        <span class="">Are you sure?</span>
                                                    </div>
                                                    <div class="bdy">
                                                        <span class="">By confirming, the applicant for membership
                                                            will be move
                                                            to a member. Are you sure you want to proceed?</span>
                                                    </div>
                                                    <div class="ftr">

                                                        <button type="button" class="btn-no">No</button>
                                                        <button type="submit" class="btn-yes">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="/pending-membership/rejected/{{ $pendingMember->id }}" method="POST">
                                        @csrf
                                        <button type="button" id="decline_membership"><i
                                                class="bi bi-x-circle"></i>Reject</button>
                                        <div class="a-m-wrapper" id="decline_membership_modal">
                                            <div class="a-modal">
                                                <div class="a-modal-f">
                                                    <div class="hdr">
                                                        <span class="">Decline application for membership?</span>
                                                    </div>
                                                    <div class="bdy">
                                                        <span class="">By confirming, the applicant will be remove.
                                                            Are you sure
                                                            you
                                                            want to proceed?</span>
                                                    </div>
                                                    <div class="ftr">

                                                        <button type="button" class="btn-no">No</button>
                                                        <button type="button" class="btn-yes">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                </div>
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
    <script src="/js/jquery-3.7.1.min.js"></script>
    <script src="/js/script.js"></script>
@endsection
