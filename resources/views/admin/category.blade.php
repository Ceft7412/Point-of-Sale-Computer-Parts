@extends('layouts.admin')

@section('title', 'Category')
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

                <a href="{{ url('admin/category') }}" class="tb-mn-ln-item-a active">
                    <i class="bi bi-card-checklist"></i>
                    <span class="">Category</span>
                </a>
                <a class="tb-mn-ln-item-a">

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
        <div class="menu-item active">
            <div class="r-item active">
                <a class="sidebar-menu-item">
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
            <a href="{{ route('archive-category') }}" class="archive-show"
                id="archive-expand-category">
                <span class="">Archive</span>

            </a>
        </div>

        <div class="menu-item ">
            <div class="r-item ">
                <a href="{{ route('product') }}"" class=" sidebar-menu-item">
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
                <a href="{{ route('employee') }}" class="sidebar-menu-item">
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
            <a href="{{ route('archive-employee') }}" class="archive-show"
                id="archive-expand-employee">
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
{{-- ADD CATEGORY MODAL --}}
<div class="modal-wrapper" id="modal">
    <div class="modal-card-wrapper" id="modal-card">
        <!-- CATEGORY -->
        <div class="modal-flex category-show">
            <div class="modal-header category-header">
                <div class="item-1">
                    <span class="new-title">New Category</span>
                    <span class="material-symbols-outlined" id="close-modal">
                        close
                    </span>
                </div>
                <div class="item-2">
                    <span class="category-menu active">Category</span>
                    <span class="subcategory-menu">Subcategory</span>
                </div>
            </div>
            <form novalidate method="POST" action="{{ route('category-store') }}"
                enctype="multipart/form-data" class="form-wrapper">
                @csrf
                <div class="modal-body">

                    <div class="input-wrapper flex-row">

                        <div class="flex-column">
                            <label for="">Picture (Optional):</label>
                            <input type="file" name='category_image' accept=".jpg, .jpeg, .png" class="">
                        </div>
                        <span clas="picture-wrapper"></span>
                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Category Name:</label>
                            <input type="text" name='category_name' class="input">
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Description (Optional):</label>
                            <input type="text" name='category_description' class="input">
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
        <!-- SUBCATEGORY -->
        <div class="modal-flex subcategory-show">
            <div class="modal-header">
                <div class="item-1">
                    <span class="new-title">New Subcategory</span>
                    <span class="material-symbols-outlined" id="close-modal">
                        close
                    </span>
                </div>
                <div class="item-2">
                    <span class="category-menu">Category</span>
                    <span class="subcategory-menu active">Subcategory</span>
                </div>
            </div>
            <form novalidate action="{{ route('subcategory-store') }}" method="POST"
                enctype="multipart/form-data" class="form-wrapper">
                @csrf
                <div class="modal-body">
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Category:</label>
                            <select name="category_id" id="" class="input">
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}">
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="input-wrapper flex-row">
                        <div class="flex-column">
                            <label for="">Picture (Optional):</label>
                            <input type="file" class="" accept=".jpg, .jpeg, .png" name="subcategory_image">
                        </div>
                        <span clas="picture-wrapper"></span>
                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Subcategory Name:</label>
                            <input type="text" class="input" name="subcategory_name">
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Description (Optional):</label>
                            <input type="text" class="input" name="subcategory_description">
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


<div class="c-wrapper">
    <div class="c-heading-wrapper category">
        <div class="ct-title">
            <span class="title">Category</span>
            <span class="description">Track and manage your category</span>
        </div>
        <div class="ct-add" id="add-button-modal">
            <div class="ct-add-flex">
                <span class="material-symbols-outlined">
                    add
                </span>
                <span class="Category">Category</span>
            </div>
        </div>

    </div>
    <div class="ct-body">
        <div class="ct-body-flex">
            <div class="ct-body-heading">
                <span class="ct-heading-l">Active Categories</span>
                <div class="ct-heading-r">
                    <form class="ct-heading-search">

                        <input type="text" class="ct-heading-search-input" placeholder="Category ID">
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
                                    <input type="checkbox">
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

                            <div class="table-group" id="">
                                @foreach($categories as $category)
                                    <div class="table-row row-category">

                                        <div class="table-cell">
                                            <input type="checkbox">
                                        </div>
                                        <div class="table-cell">
                                            C{{ $category->category_id }}
                                        </div>
                                        <div class="table-cell category-cell">

                                            <img src="{{ $category->category_image }}"
                                                alt="{{ $category->cateogry_name }}" class="picture">
                                            <span>{{ $category->category_name }}</span>
                                        </div>
                                        <div class="table-cell">
                                            {{ $category->category_description }}
                                        </div>
                                        <div class="table-cell">{{ $category->products }}</div>
                                        <div class="table-cell date">
                                            <span>{{ $category->created_at->toDateString() }}</span>
                                            <span>{{ $category->created_at->toTimeString() }}</span>
                                        </div>
                                        <div class="table-cell date" style="display: flex;">
                                            <span>{{ $category->updated_at->toDateString() }}</span>
                                            <span>{{ $category->updated_at->toTimeString() }}</span>
                                        </div>
                                        <div class="table-cell action">
                                            <div class="flex-col">
                                                <div class="action-p edit-w">
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
                                            <div class="contain-chev-action">
                                                <i class="bi bi-chevron-up chevron-up-category"
                                                id="chevron-up-category"></i>
                                                <i class="bi bi-chevron-down chevron-down-category"
                                                id="chevron-down-category"></i>
                                            </div>

                                        </div>
                                    </div>
                            @endforeach
                        </div>


                        <div class="table-subcategory-group">

                            @foreach($subcategories as $subcategory)
                            <div class="table-row row-subcategory" id="">

                                <div class="table-cell">
                                    {{$subcategory->subcategory_id}}
                                </div>
                                <div class="table-cell subcategory-cell">
                                    <img src="{{$subcategory->subcategory_image}}" alt="{{$subcategory->subcategory_name}}" class="picture">
                                    <span></span>
                                </div>
                                <div class="table-cell">?>
                                </div>
                                <div class="table-cell">11 products</div>
                                <div class="table-cell date">
                                    <span>2022-03-01</span>
                                    <span>10:30:00</span>
                                </div>
                                <div class="table-cell date" style="display: flex;">
                                    <span>2022-03-05</span>
                                    <span>15:45:00</span>
                                </div>
                                <div class="table-cell action">
                                    <div class="action-p edit-w">
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
                            @endforeach


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
