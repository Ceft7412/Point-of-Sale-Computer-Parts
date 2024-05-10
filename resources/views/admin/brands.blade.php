@extends('layouts.admin')

@section('title', 'Category')
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
                <a href="{{ route('archive-category') }}" class="archive-show" id="subcategory-expand-category">
                    <span class="">Subcategory</span>
                </a>
                <a href="{{ route('archive-category') }}" class="archive-show" id="archive-expand-category">
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
            <!-- SUBCATEGORY -->
            <div class="modal-flex subcategory-show">
                <div class="modal-header">
                    <div class="item-1">
                        <span class="new-title">New Brand</span>
                        <span class="material-symbols-outlined" id="close-modal">
                            close
                        </span>
                    </div>
                </div>
                <form action="{{ route('subcategory-store') }}" method="POST" enctype="multipart/form-data"
                    class="form-wrapper" id="subcategory_insert">
                    @csrf
                    <div class="modal-body">
                        <div class="input-wrapper">
                            <div class="flex-column">
                                <label for="">Category:</label>
                                <select name="category_id" id="" class="input">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="input-wrapper flex-row">
                            <div class="flex-column">
                                <label for="">Picture:</label>
                                <input required type="file" class="" accept=".jpg, .jpeg, .png"
                                    name="subcategory_image">
                            </div>
                            <span clas="picture-wrapper"></span>
                        </div>
                        <div class="input-wrapper">
                            <div class="flex-column">
                                <label for="">Brand Name:</label>
                                <input type="text" class="input" name="subcategory_name" required>
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
                <span class="title">Brands</span>
                <span class="description">Track and manage your brands</span>
            </div>
            <div class="ct-add" id="add-button-modal">
                <div class="ct-add-flex">
                    <span class="material-symbols-outlined">
                        add
                    </span>
                    <span class="Category">Brand </span>
                </div>
            </div>

        </div>
        <div class="ct-body">
            <div class="ct-body-flex">
                <div class="ct-body-heading">
                    <div class="ct-heading-l">
                        <a href="{{ route('category') }}" class="itm-ct hd-active-itm">
                            <span class="">Categories</span>
                        </a>

                        <div  class="itm-ct hd-pending-itm  active">
                            <span class="">Brands</span>
                        </div>
                    </div>
                    <div class="ct-heading-r">
                        <form class="fl-per-pg" method="POST" id="archiveGroup"
                            action="{{ route('archiveSubcategoryGroup') }}">
                            @csrf
                            <button type="submit" class="archive_select_group" id="archive_select_group">Set to inactive</button>
                        </form>
                        <form method="GET" action="{{ route('brands') }}" class="ct-heading-search">

                            <input type="text" name="search" class="ct-heading-search-input"
                                placeholder="Search for brands..." value="{{ request()->query('search') }}">
                            <button type="submit" class="search-id"><i class="bi bi-search"></i></button>
                        </form>
                    </div>  
                </div>

                <div class="ct-body-content">
                    <div class="table-wrapper">
                        <div class="tbl">
                            <div class="thdr">
                                <div class="tbl-cell">
                                    <input type="checkbox" id="selectAllCheckbox">
                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">Brand ID</span>
                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">Name</span>

                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">Description</span>
                                </div>
                                <div class="tbl-cell products">
                                    <span class="txt-cell">Products</span>
                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">Inserted Date</span>
                                </div>
                                <div class="tbl-cell">
                                    <span class="txt-cell">Modified Date</span>
                                </div>


                                <div class="tbl-cell">
                                    <span class="txt-cell">Action</span>
                                  </div>
                            </div>
                            <div class="tbdy">
                                @forelse($subcategories as $subcategory)
                                    <div class="tbdy-rw">
                                        <div class="tbl-cell">
                                            <input type="checkbox" class="userCheckbox" data-category-active="{{ $subcategory->category->is_active }}" name="archiveIds[]"
                                                value="{{ $subcategory->id }}">
                                        </div>
                                        <div class="tbl-cell">
                                            <span class="txt-cell">{{ $subcategory->subcategory_id }}</span>
                                        </div>
                                        <div class="tbl-cell w-img">
                                            <img src="{{ Storage::url('public/subcategory_images/' . $subcategory->subcategory_image) }}"
                                                alt="{{ $subcategory->subcategory_name }}" class="picture">
                                            <span class="txt-cell">{{ $subcategory->subcategory_name }}</span>

                                        </div>
                                        <div class="tbl-cell">
                                            <span class="txt-cell">{{ $subcategory->subcategory_description }}</span>
                                        </div>
                                        <div class="tbl-cell products">
                                            <span class="txt-cell">{{ $subcategory->products->count()}}</span>
                                        </div>
                                        <div class="tbl-cell">
                                            <span class="txt-cell">{{ $subcategory->created_at }}</span>
                                        </div>
                                        <div class="tbl-cell">
                                            <span class="txt-cell">{{ $subcategory->updated_at }}</span>
                                        </div>

                                        <div class="tbl-cell">

                                            <button type="button" data-id="{{ $subcategory->id }}"
                                                class="updateButton"><i class="bi bi-pencil-square"></i>Update</button>

                                            {{-- *update --}}
                                            <div class="update-modal-wrapper" id="update_{{ $subcategory->id }}">
                                                <div class="modal-card-wrapper" id="modal-card">
                                                    <div class="modal-flex-employee">
                                                        <div class="modal-header">
                                                            <div class="item-1">
                                                                <span class="new-title">Update
                                                                    Subcategory</span>
                                                                <span class="material-symbols-outlined"
                                                                    id="close-update-modal">
                                                                    close
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <form action="/admin/subcategory/update/{{ $subcategory->id }}"
                                                            class="form-wrapper" enctype="multipart/form-data"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="input-wrapper">
                                                                    <div class="flex-column">
                                                                        <label for="">Category:</label>
                                                                        <select name="category_id" id=""
                                                                            class="input">
                                                                            @foreach ($categories as $category)
                                                                                <option value="{{ $category->id }}">
                                                                                    {{ $category->category_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="input-wrapper flex-row space-between margin-bottom col-530">
                                                                    <div class="col-pic">
                                                                        <div class="flex-column">
                                                                            <label for="">Picture
                                                                                (Optional)
                                                                                :</label>
                                                                            <input type="file" name='subcategory_image'
                                                                                accept=".jpg, .jpeg, .png" class="">
                                                                        </div>
                                                                        <span class="divider">Or</span>
                                                                        <div class="pictures-group">
                                                                            <span class="t-ps">Choose
                                                                                existing images</span>
                                                                            <input type="hidden" id="selected_image"
                                                                                class="selected_image"
                                                                                name="selected_image">
                                                                        </div>
                                                                    </div>
                                                                    <div class="picture-wrapper">
                                                                        <img id="update_subcategory_image"
                                                                            src="{{ Storage::url('public/subcategory_images/' . $subcategory->subcategory_image) }}"
                                                                            class="image-place" alt="Subcategory Image">
                                                                    </div>

                                                                </div>
                                                                <div class="input-wrapper">
                                                                    <div class="flex-column">
                                                                        <label for="">Subcategory
                                                                            Name:</label>
                                                                        <input type="text"
                                                                            value="{{ $subcategory->subcategory_name }}"
                                                                            name='subcategory_name' class="input"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="input-wrapper">
                                                                    <div class="flex-column">
                                                                        <label for="">Description
                                                                            (Optional):</label>
                                                                        <input type="text"
                                                                            value="{{ $subcategory->subcategory_description }}"
                                                                            name='subcategory_description' class="input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-flex-footer">
                                                                    <button type="button"
                                                                        class="cancel-modal">Cancel</button>
                                                                    <button type="submit" class="save">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <div class="image-modal-wrapper">

                                                            <div class="image-modal">
                                                                <div class="header">
                                                                    <span class="b-title">Choose a
                                                                        picture...</span>
                                                                    <span class="s-title"><i
                                                                            class="bi bi-info-circle"></i>Selecting
                                                                        an image will instantly update the
                                                                        form.</span>
                                                                </div>

                                                                <div class="image-modal-flex">
                                                                    @foreach ($imageFiles as $imageFile)
                                                                        <div class="img-con" id="image-select">
                                                                            <img data-id="{{ $subcategory->id }}"
                                                                                src="{{ asset($imageFile) }}"
                                                                                alt="" id="image-preview">
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="footer">
                                                                    <span class="cancel-image-modal">Cancel</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="archiveButton"
                                                data-id="{{ $subcategory->id }}"><i
                                                    class="bi bi-archive"></i>Archive</button>

                                            <div class="archiveSubcategory-modal-wrapper" id="archive_{{$subcategory->id}}">
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
                                                            Archiving this row will remove the subcategory from the active
                                                            list and will remain inactive. Are you sure
                                                            you
                                                            want to
                                                            proceed?
                                                        </div>
                                                    </div>
                                                    <div class="footer">
                                                        <form method="POST" action="/category/brands/archive/{{$subcategory->id}}" id="archiveSubcategoryForm"
                                                            id="subcategory_archive" class="fl">
                                                            @csrf
                                                            <button type="button" class="cancel-archive">No, keep this
                                                                active</button>
                                                            <button type="submit" class="confirm-archive">Yes, make this
                                                                inactive</button>
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
        </div>

    @endsection

    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/js/script.js"></script>
    @endsection
