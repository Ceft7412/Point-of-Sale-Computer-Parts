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
    <!-- EMPLOYEE MODAL -->
    <div class="modal-wrapper" id="modal">
        <div class="modal-card-wrapper" id="modal-card">
            <div class="modal-flex-employee">
                <div class="modal-header">

                </div>
                <form action="{{ route('register-store') }}" class="form-wrapper" id="register-employee"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input-user-type input-wrapper">
                            <input type="hidden" name="type" value="2">
                        </div>
                        <div class="input-name input-wrapper">
                            <div class="flex-column">
                                <label for="">Name:</label>
                                <input type="text" name="name"class="input">

                            </div>
                            <div class="flex-column">
                                <label for="">Username:</label>
                                <input type="text" name="username" class="input" required>
                                @error('username')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="input-email input-wrapper">
                            <div class="flex-column">
                                <label for="">Email:</label>
                                <input type="email" name="email" class="input">
                                <div class="error"></div>
                            </div>
                            <div class="flex-column">
                                <label for="">Contact No: (Optional)</label>
                                <input type="tel" name="contact" class="input">
                            </div>
                        </div>
                        <div class="input-password input-wrapper">
                            <div class="flex-column">
                                <label for="">Password:</label>
                                <input id="password" type="password" name="password" class="input">

                            </div>
                        </div>
                        <div class="input-password input-wrapper">
                            <div class="flex-column">
                                <label for="">Confirm Password:</label>
                                <input id="confirm-password" type="password" class="input">

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
                    <a href="{{ route('category') }}" class="go-back">
                        <i class="bi bi-arrow-bar-left"></i>
                        <span class="back">GO BACK</span>
                    </a>
                    <div class="ct-heading-r">
                        <form class="ct-heading-search">

                            <input type="text" class="ct-heading-search-input" placeholder="ID">
                            <button type="submit" class="search-id"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
                <form method="POST" action="{{ route('unarchiveCategoryGroup') }}">
                    @csrf

                    <button type="submit" id="archiveButton" style="display: none;">Set to active</button>

                    <div class="cs-select">
                        <div class="wrap-select">
                            <span class="select category-select active" id="select-ctgry">
                                Category
                            </span>
                            <span class="select subcategory-select" id="select-sbctgry">
                                Subcategory
                            </span>
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
                                            ID
                                        </div>
                                        <div class="table-cell">
                                            Name
                                        </div>
                                        <div class="table-cell">Description</div>
                                        <div class="table-cell">Products</div>
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
                                                        <input type="checkbox" class="userCheckbox" name="categoryIds[]"
                                                            value="{{ $archivedCategory->id }}">
                                                    </div>
                                                    <div class="table-cell">
                                                        C{{ $archivedCategory->category_id }}
                                                    </div>
                                                    <div class="table-cell category-cell">

                                                        <img src="{{Storage::url($archivedCategory->category_image)}}"
                                                            alt="{{ $archivedCategory->cateogry_name }}" class="picture">
                                                        <span>{{ $archivedCategory->category_name }}</span>
                                                    </div>
                                                    <div class="table-cell">
                                                        {{ $archivedCategory->category_description }}
                                                    </div>
                                                    <div class="table-cell">{{ $archivedCategory->products }}</div>
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
                                                                <button type="button" class="unarchiveCategoryButton"
                                                                    data-id="{{ $archivedCategory->id }}">
                                                                    <i class="bi bi-box-arrow-up"></i>
                                                                    <span class="">Active</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="contain-chev-action">
                                                            <i class="bi bi-chevron-up chevron-up-category"
                                                                data-category-id="{{ $archivedCategory->category_id }}"></i>
                                                            <i class="bi bi-chevron-down chevron-down-category"
                                                                data-category-id="{{ $archivedCategory->category_id }}"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="table-subcategory-group"
                                                    id="subcategory-group-{{ $archivedCategory->category_id }}">
                                                    @php
                                                        $subcategoryExists = false;
                                                    @endphp

                                                    @foreach ($archivedSubcategories as $archivedSubcategory)
                                                        @if ($archivedCategory->id === $archivedSubcategory->category_id)
                                                            <div class="table-row row-subcategory" id="">
                                                                <div class="table-cell">
                                                                </div>
                                                                <div class="table-cell subcategory-cell">
                                                                    S{{ $archivedSubcategory->subcategory_id }}
                                                                </div>
                                                                <div class="table-cell">
                                                                    <img src="{{Storage::url($archivedSubcategory->subcategory_image)}}"
                                                                        alt="{{ $archivedSubcategory->subcategory_name }}"
                                                                        class="picture">
                                                                    <span>{{ $archivedSubcategory->subcategory_name }}</span>
                                                                </div>
                                                                <div class="table-cell">
                                                                    {{ $archivedSubcategory->subcategory_description }}
                                                                </div>
                                                                <div class="table-cell">11 products</div>
                                                                <div class="table-cell date">
                                                                    <span>{{ $archivedSubcategory->created_at->toDateString() }}</span>
                                                                    <span>{{ $archivedSubcategory->created_at->toTimeString() }}</span>
                                                                </div>
                                                                <div class="table-cell date" style="display: flex;">
                                                                    <span>{{ $archivedSubcategory->created_at->toDateString() }}</span>
                                                                    <span>{{ $archivedSubcategory->updated_at->toTimeString() }}</span>
                                                                </div>
                                                                <div class="table-cell action">

                                                                </div>


                                                            </div>
                                                            @php
                                                                $subcategoryExists = true;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if (!$subcategoryExists)
                                                        <div class="table-row row-subcategory" id="">
                                                            <div class="whole">
                                                                <span class="no-subcategory">No subcategory found.</span>
                                                            </div>
                                                        </div>
                                                    @endif


                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="no-data">
                                            <span>No data available</span>
                                        </div>
                                    @endif

                                </div>
                                <div class="subcategory-body">

                                    <div class="table-subcategory-group">
                                        @if ($archivedSubcategories->count() > 0)
                                            @foreach ($archivedSubcategories as $archivedSubcategory)
                                                <div class="table-row row-subcategory" id="">
                                                    <div class="table-cell">

                                                    </div>
                                                    <div class="table-cell subcategory-cell">
                                                        S{{ $archivedSubcategory->subcategory_id }}
                                                    </div>
                                                    <div class="table-cell">
                                                        <img src="{{Storage::url($archivedSubcategory->subcategory_image)}}"
                                                            alt="{{ $archivedSubcategory->subcategory_name }}"
                                                            class="picture">
                                                        <span>{{ $archivedSubcategory->subcategory_name }}</span>
                                                    </div>
                                                    <div class="table-cell">
                                                        {{ $archivedSubcategory->subcategory_description }}
                                                    </div>
                                                    <div class="table-cell">11 products</div>
                                                    <div class="table-cell date">
                                                        <span>{{ $archivedSubcategory->created_at->toDateString() }}</span>
                                                        <span>{{ $archivedSubcategory->created_at->toTimeString() }}</span>
                                                    </div>
                                                    <div class="table-cell date" style="display: flex;">
                                                        <span>{{ $archivedSubcategory->created_at->toDateString() }}</span>
                                                        <span>{{ $archivedSubcategory->updated_at->toTimeString() }}</span>
                                                    </div>
                                                    <div class="table-cell action">
                                                        <div class="flex-col">
                                                            <div class="action-p archive-sub">
                                                                <button type="button" class="unarchiveSubcategoryButton"
                                                                    data-id="{{ $archivedSubcategory->id }}">
                                                                    <i class="bi bi-box-arrow-up"></i>
                                                                    <span class="">Active</span>
                                                                </button>
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
                </form>
                @include('action.unarchive-category')
                @include('action.unarchive-subcategory')


            </div>

        </div>
    </div>
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/../js/script.js"></script>
@endsection
