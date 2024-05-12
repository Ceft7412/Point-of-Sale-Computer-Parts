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

    <div class="modal-wrapper" id="modal">
        <div class="modal-card-wrapper" id="modal-card">
            <div class="modal-flex">
                <div class="modal-header">
                    <div class="item-1">
                        <span class="new-title">New Member</span>
                        <span class="material-symbols-outlined" id="close-modal">
                            close
                        </span>
                    </div>
                </div>
                <form action="{{ route('application-membership') }}" class="form-wrapper" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input-user-type input-wrapper">
                            <input type="hidden" name="type" value="2">
                        </div>
                        <div class="input-name input-wrapper">
                            <div class="flex-column">
                                <label for="">Name:</label>
                                <input type="text" name="membership_name" class="input" required>

                            </div>
                        </div>


                        <div class="input-email input-wrapper">
                            <div class="flex-column">
                                <label for="">Email:</label>
                                <input type="email" name="membership_email" class="input" required>
                                <div class="error"></div>
                            </div>

                        </div>
                        <div class="input-password input-wrapper">
                            <div class="flex-column">
                                <label for="">Contact No:</label>
                                <input type="num" name="membership_phone" class="input">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="modal-flex-footer">
                            <button type="button" class="cancel" id="cancel-modal">Cancel</button>
                            <button type="submit" class="save">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- *ERROR --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="error-wrapper">
                <div class="error-modal">
                    <div class="body">
                        <span class="text">

                            <span>{{ $error }}</span>

                        </span>
                        <i class="bi bi-x-lg cancel"></i>
                    </div>
                </div>
            </div>
        @endforeach
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


    {{-- *CONFIRMATION --}}

    <div class="confirm-wrapper">
        <div class="confirm-modal">

            <div class="header">
                <span class="confirm">
                    Confirmation
                </span>
                <i class="bi bi-x-lg cancel"></i>
            </div>
            <div class="body">
                <span class="small">Are you sure you want to proceed? You cannot delete the data after submitting.</span>
            </div>
            <div class="footer">
                <button type="button" class="cancel">No, I changed my mind.</button>
                <button type="button" class="confirm-submit">Yes, add this data to the list.</button>
            </div>
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

                <a href="{{ route('pending.request-membership') }}" class="itm-ct hd-pending-itm">
                    <span class="">Pending Request</span>
                </a>
            </div>
            <div class="hd-fl-ct">
                <form class="fl-per-pg" method="POST" id="archiveGroup" action="{{ route('archive-members') }}">
                    @csrf
                    <button type="button" class="archive_select_group" id="archive_select_group">Set to
                        inactive</button>
                    <div class="archive-modal-wrapper">
                        <div class="modal-card-wrapper" id="modal-card">
                            <div class="heading">

                                <span class="text-left">
                                    Set to Inactive
                                </span>
                                <span class="cancel-archive">
                                    <i class="bi bi-x-lg"></i>
                                </span>
                            </div>

                            <div class="body">
                                <div class="text">
                                    Archiving this group will remove the members from the active list and will remain
                                    unactive. Are you sure you
                                    want to
                                    proceed?
                                </div>
                            </div>
                            <div class="footer">

                                <button type="button" class="cancel-archive">No, keep this active</button>
                                <button type="submit" class="confirm-archive">Yes, set this to inactive</button>

                            </div>

                        </div>
                    </div>
                </form>
                <form method="GET" action="{{ route('membershipRedirect') }}" class="fl-sr">
                    <input type="text" name="search" value="{{ request()->query('search') }}"
                        placeholder="Member ID">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>

            </div>

            <div class="bd-ct">
                <div class="tbl">
                    <div class="thdr">
                        <div class="tbl-cell">
                            @if($activeMembers->count() > 0)
                            <input type="checkbox" id="selectAllCheckbox">
                            @endif
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
                            <span class="txt-cell">Action</span>
                        </div>
                    </div>
                    <div class="tbdy">
                        @forelse($activeMembers as $activeMember)
                            <div class="tbdy-rw">
                                <div class="tbl-cell">
                                    <input type="checkbox" class="userCheckbox" name="archiveIds[]"
                                        value="{{ $activeMember->id }}">
                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">{{ $activeMember->membership_id }}</span>
                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">{{ $activeMember->membership_name }}</span>

                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">{{ $activeMember->membership_email }}</span>
                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">{{ $activeMember->membership_phone }}</span>
                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">M{{ $activeMember->membership_card_number }}</span>
                                </div>

                                <div class="tbl-cell">

                                    <button type="button" data-member-id="{{ $activeMember->id }}"
                                        class="select_update_active_member"><i
                                            class="bi bi-pencil-square"></i>Update</button>

                                    <div class="update-modal-wrapper" id="update_modal_{{ $activeMember->id }}">
                                        <div class="modal-card-wrapper" id="modal-card">
                                            <div class="modal-flex-employee">
                                                <div class="modal-header">
                                                    <div class="item-1">
                                                        <span class="new-title">Update Member</span>
                                                        <span class="material-symbols-outlined" id="close-update-modal">
                                                            close
                                                        </span>
                                                    </div>
                                                </div>
                                                <form
                                                    action="/admin/member/update/{{ $activeMember->id }}"class="form-wrapper"
                                                    id="update_members_form" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">

                                                        <div class="input-user-type input-wrapper">
                                                            <input type="hidden" name="type">
                                                        </div>
                                                        <div class="input-name input-wrapper">
                                                            <div class="flex-column">
                                                                <label for="">Name:</label>
                                                                <input type="text"
                                                                    name="update_membership_name"class="input"
                                                                    value="{{ $activeMember->membership_name }}" required>
                                                            </div>
                                                        </div>


                                                        <div class="input-email input-wrapper">
                                                            <div class="flex-column">
                                                                <label for="">Email:</label>
                                                                <input type="email" name="update_membership_email"
                                                                    class="input"
                                                                    value="{{ $activeMember->membership_email }}"
                                                                    required>
                                                                <div class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="input-email input-wrapper">
                                                            <div class="flex-column">
                                                                <label for="">Contact No: (Optional)</label>
                                                                <input type="tel" name="update_membership_phone"
                                                                    value="{{ $activeMember->membership_phone }}"
                                                                    class="input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="modal-flex-footer">
                                                            <button type="button" class="cancel-modal">Cancel</button>
                                                            <button type="submit" class="save">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="select_archive_active_member"
                                        data-member-id="{{ $activeMember->id }}"><i
                                            class="bi bi-archive"></i>Archive</button>
                                    <div class="a-m-wrapper" id="archive_modal_{{ $activeMember->id }}">
                                        <div class="a-modal">
                                            <div class="a-modal-f">
                                                <div class="hdr">
                                                    <span class="">Set to inactive</span>
                                                </div>
                                                <div class="bdy">
                                                    <span class="">By confirming, the member will be set to inactive.
                                                        Are you sure you want
                                                        to proceed?</span>
                                                </div>
                                                <form action="/admin/member/archive/{{ $activeMember->id }}"
                                                    method="POST" id="archive_member"class="ftr">
                                                    @csrf
                                                    <button type="button" class="btn-no">No</button>
                                                    <button type="submit" class="btn-yes">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

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
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/script.js"></script>
@endsection
