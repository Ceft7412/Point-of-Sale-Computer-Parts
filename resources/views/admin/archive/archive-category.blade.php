@extends('layouts.admin')

@section('title', 'Archive Category')
@section('css')
    <link rel="stylesheet" href="/../dest/css/style.css">
@endsection
@section('content')
    {{-- * TOP BAR IS FINISHED --}}
    {{-- ! AN ERROR?! --}}
    {{-- TODO: MAKE A SANDWICH! --}}
    {{-- ? HUH????? --}}



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

                    <a class="tb-mn-ln-item-a active">
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
                    <a href="{{ url('admin/employee') }}" class="tb-mn-ln-item-a">
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
            <div class="menu-item active">
                <div class="r-item active">
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
                <a class="archive-show active" id="archive-expand-category">
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
                <a href="{{ route('archive-employee') }}" class="archive-show" id="archive-expand-employee">
                    <span class="">Archive</span>

                </a>
            </div>
            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ route('admin') }}"class="sidebar-menu-item">
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
                <a href="{{ route('archive-admin') }}"class="archive-show" id="archive-expand-admin">
                    <span class="">Archive</span>

                </a>
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
                <span class="title">Archived Category</span>

            </div>
        </div>
        <div class="ct-body">
            <div class="ct-body-flex">
                <div class="ct-body-heading">
                    <div class="pr-dt">
                        <a href="{{ route('category') }}" class="go-back">
                            <i class="bi bi-arrow-bar-left"></i>
                            <span class="back">GO BACK</span>

                        </a>
                    </div>
                    <div class="ct-heading-l">
                        <div class="itm-ct hd-active-itm active">
                            <span class="">Categories</span>
                        </div>

                        <a href="{{ route('archive-subcategory') }}" class="itm-ct hd-pending-itm">
                            <span class="">Brands</span>
                        </a>
                    </div>
                    <div class="ct-heading-r">
                        <form class="fl-per-pg" method="POST" id="archiveGroup"
                            action="{{ route('unarchiveCategoryGroup') }}">
                            @csrf
                            <button type="submit" class="archive_select_group" id="archive_select_group">Set to active</button>
                        </form>
                        <form method="GET" action="{{ route('archive-category') }}"class="ct-heading-search">

                            <input type="text" name="search" class="ct-heading-search-input" placeholder="Search for categories..."
                                value="{{ request()->query('search') }}">
                            <button type="submit" class="search-id"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="ct-body-content">
                    <div class="table-wrapper">
                        <div class="table">
                            <div class="category-header">
                                <div class="table-row">
                                    <div class="table-cell">
                                        @if ($archivedCategories->count() > 0)
                                            <input type="checkbox" id="selectAllCheckbox">
                                        @endif
                                    </div>
                                    <div class="table-cell">
                                        Category ID
                                    </div>
                                    <div class="table-cell">
                                        Name
                                    </div>
                                    <div class="table-cell">Description</div>
                                    <div class="table-cell">Brands</div>
                                    <div class="table-cell">Inserted Date</div>
                                    <div class="table-cell">Modified Date</div>
                                    <div class="table-cell">Action</div>
                                </div>
                            </div>
                            <div class="category-body">
                                @if ($archivedCategories->count() > 0)

                                    @foreach ($archivedCategories as $archivedCategory)
                                        <div class="table-group"
                                            id="category-group-{{ $archivedCategory->category_id }}">

                                            <div class="table-row row-category">

                                                <div class="table-cell">
                                                    <input type="checkbox" class="userCheckbox" name="archiveIds[]"
                                                        value="{{ $archivedCategory->id }}">
                                                </div>
                                                <div class="table-cell">
                                                    C{{ $archivedCategory->category_id }}
                                                </div>
                                                <div class="table-cell category-cell">

                                                    <img src="{{ Storage::url('public/category_images/' . $archivedCategory->category_image) }}"
                                                        alt="{{ $archivedCategory->cateogry_name }}" class="picture">
                                                    <span>{{ $archivedCategory->category_name }}</span>
                                                </div>
                                                <div class="table-cell">
                                                    {{ $archivedCategory->category_description }}
                                                </div>
                                                <div class="table-cell">{{ $archivedCategory->subcategories->count() }}
                                                </div>
                                                <div class="table-cell date">
                                                    <span>{{ $archivedCategory->created_at->toDateString() }}</span>
                                                    <span>{{ $archivedCategory->created_at->toTimeString() }}</span>
                                                </div>
                                                <div class="table-cell date" style="display: flex;">
                                                    <span>{{ $archivedCategory->updated_at->toDateString() }}</span>
                                                    <span>{{ $archivedCategory->updated_at->toTimeString() }}</span>
                                                </div>
                                                <div class="table-cell action">
                                                    <div class="flex-col">
                                                        <div class="action-p archive-w">
                                                            <button type="button" class="unarchiveParentButton"
                                                                data-id="{{ $archivedCategory->id }}"
                                                                >
                                                                <i class="bi bi-box-arrow-up"></i>
                                                                <span class="">Active</span>
                                                            </button>
                                                        </div>
                                                        <div class="archive-modal-wrapper"
                                                            id="unarchive_{{ $archivedCategory->id }}">
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
                                                                        Unarchiving this row will remove the category from
                                                                        the inactive list and will remain active. Are you
                                                                        sure
                                                                        you
                                                                        want to
                                                                        proceed?
                                                                    </div>
                                                                </div>
                                                                <div class="footer">
                                                                    <form method="POST"
                                                                        action="/admin/category/unarchive/{{ $archivedCategory->id }}">
                                                                        @csrf
                                                                        <button type="button" class="cancel-archive">No,
                                                                            keep this inactive</button>
                                                                        <button type="submit"
                                                                            class="confirm-archive">Yes, make this
                                                                            active</button>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="no-data">
                                        <span>No data available</span>
                                    </div>
                                @endif

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
    <script src="/../js/script.js"></script>
@endsection
