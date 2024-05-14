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


    {{--  ADD MODAL --}}

    <div class="modal-wrapper" id="modal">
        <div class="modal-card-wrapper" id="modal-card">
            <div class="modal-flex">
                <div class="modal-header">
                    <div class="item-1">
                        <span class="new-title">New Product</span>
                        <i class="bi bi-x-lg" id="close-modal"></i>
                    </div>
                </div>
                <form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data"
                    class="form-wrapper" id="product_insert">
                    @csrf
                    <div class="modal-body">
                        <div class="input-wrapper">
                            <div class="flex-column">
                                <label for="">Brands:</label>
                                <select name="subcategory_id" id="" class="input" required>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">
                                            {{ $subcategory->subcategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-wrapper flex-row">
                            <div class="flex-column">
                                <label for="">Picture:</label>
                                <input type="file" name="product_image" class="" required>
                            </div>
                            <span clas="picture-wrapper"></span>
                        </div>
                        <div class="input-wrapper">
                            <div class="flex-column">
                                <label for="">Product Name:</label>
                                <input type="text" name="product_name" class="input" required>
                            </div>
                        </div>
                        <div class="input-wrapper">
                            <div class="flex-column">
                                <label for="">Price:</label>
                                <input type="number" min="1" name="product_price" class="input" required>
                            </div>
                        </div>
                        <div class="input-wrapper">
                            <div class="flex-column">
                                <label for="">Quantity:</label>
                                <input type="number" min="0" name="product_quantity" class="input"
                                    value='0'>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-flex-footer">
                            <button type="button" class="cancel" id="cancel-modal">Cancel</button>
                            <button type="submit" name="insert" class="save">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
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

    {{-- TODO --}}
    <div class="c-wrapper">
        <div class="c-heading-wrapper category">
            <div class="ct-title">
                <span class="title">Product</span>
                <span class="description">Track and manage your product</span>
            </div>
            <div class="ct-add" id="add-button-modal">
                <div class="ct-add-flex">
                    <i class="bi bi-plus-lg"></i>
                    <span class="product">Product</span>
                </div>
            </div>
        </div>
        <div class="ct-body">
            <div class="ct-body-flex">
                <div class="ct-body-heading">

                    <div class="ct-heading-r">
                        <form action="{{ route('archiveProductGroup') }}" class="fl-per-pg" id="archiveGroup"
                            method="POST">
                            @csrf
                            <button type="submit" class="archive_select_group" id="archive_select_group">Set to inactive</button>
                        </form>
                        <form method="GET" action="{{ route('product') }}"class="ct-heading-search">

                            <input type="text" name="search" class="ct-heading-search-input"
                                placeholder="Search for products..." value="{{ request()->query('search') }}">
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
                                        @if (count($products) > 0)
                                            <input type="checkbox" id="selectAllCheckbox">
                                        @endif
                                    </div>
                                    <div class="table-cell">Product ID</div>
                                    <div class="table-cell category-cell">
                                        <span>Name</span>
                                    </div>
                                    <div class="table-cell">Brands</div>
                                    <div class="table-cell">Price</div>
                                    <div class="table-cell">Quantity</div>
                                    <div class="table-cell">Purchase</div>
                                    <div class="table-cell">Inserted Date</div>
                                    <div class="table-cell">Modified Date</div>
                                    <div class="table-cell">Action</div>
                                </div>
                            </div>
                            <div class="product-body">


                                @forelse ($products as $product)
                                    <div class="table-row" id="">

                                        <div class="table-cell">
                                            <input type="checkbox" class="userCheckbox" name="archiveIds[]"
                                                value="{{ $product->id }}">
                                        </div>
                                        <div class="table-cell">P{{ $product->product_id }}</div>
                                        <div class="table-cell">
                                            <img src="{{ Storage::url('public/product_images/' . $product->product_image) }}"
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
                                                <div class="action-p edit-w">
                                                    <button type="button" class="updateButton"
                                                        data-id="{{ $product->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                        <span class="">Update</span>
                                                    </button>
                                                </div>

                                                <div class="update-modal-wrapper" id="update_{{ $product->id }}">
                                                    <div class="modal-card-wrapper" id="modal-card">
                                                        <div class="modal-flex-employee">
                                                            <div class="modal-header">
                                                                <div class="item-1">
                                                                    <span class="new-title">Update Product</span>
                                                                    <span class="material-symbols-outlined"
                                                                        id="close-update-modal">
                                                                        close
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <form action="/admin/product/update/{{ $product->id }}"
                                                                class="form-wrapper" id="updateProductForm"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="input-type input-wrapper">
                                                                        <input type="hidden" name="type">
                                                                    </div>
                                                                    <div class="input-wrapper">
                                                                        <div class="flex-column">
                                                                            <label for="subcategory_id">Brands:</label>
                                                                            <select name="subcategory_id"
                                                                                id="subcategory_id" class="input">
                                                                                @foreach ($subcategories as $subcategory)
                                                                                    @if ($subcategory->id == $product->subcategory_id)
                                                                                        <option
                                                                                            value="{{ $subcategory->id }}"
                                                                                            selected>
                                                                                            {{ $subcategory->subcategory_name }}
                                                                                        </option>
                                                                                    @else
                                                                                        <option
                                                                                            value="{{ $subcategory->id }}">
                                                                                            {{ $subcategory->subcategory_name }}
                                                                                        </option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-wrapper flex-row space-between">
                                                                        <div class="col-pic">
                                                                            <div class="flex-column">
                                                                                <label for="product_image">Picture
                                                                                    (Optional):</label>
                                                                                <input type="file" name="product_image"
                                                                                    accept=".jpg, .jpeg, .png"
                                                                                    class="">
                                                                            </div>
                                                                            <span class="divider">Or</span>
                                                                            <div class="pictures-group">
                                                                                <span class="t-ps">Choose existing
                                                                                    images</span>
                                                                                <input type="hidden"
                                                                                    class="selected_product_image"
                                                                                    id="selected_image"
                                                                                    name="selected_image">
                                                                            </div>
                                                                        </div>
                                                                        <div class="picture-wrapper">
                                                                            <img id="product_image"
                                                                                src="{{ Storage::url('public/product_images/' . $product->product_image) }}"
                                                                                class="image-place" alt="Product Image">
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-wrapper">
                                                                        <div class="flex-column">
                                                                            <label for="product_name">Name:</label>
                                                                            <input type="text"
                                                                                value="{{ $product->product_name }}"
                                                                                name="product_name" id="product_name"
                                                                                class="input">
                                                                        </div>
                                                                        <div class="flex-column">
                                                                            <label for="product_price">Price:</label>
                                                                            <input type="text"
                                                                                value="{{ $product->product_price }}"
                                                                                name="product_price" id="product_price"
                                                                                class="input" required>
                                                                            @error('username')
                                                                                <div class="error">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-wrapper">
                                                                        <div class="flex-column">
                                                                            <label for="product_quantity">Quantity:</label>
                                                                            <input type="number"
                                                                                value="{{ $product->product_quantity }}"
                                                                                name="product_quantity"
                                                                                id="product_quantity" class="input">
                                                                            <div class="error"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="modal-flex-footer">
                                                                        <button type="button"
                                                                            class="cancel-modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="save">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <div class="image-modal-wrapper">

                                                                <div class="image-modal">
                                                                    <div class="header">
                                                                        <span class="b-title">Choose a picture...</span>
                                                                        <span class="s-title"><i class="bi bi-info-circle"></i>Selecting an image will instantly
                                                                            update the form.</span>
                                                                    </div>
                                            
                                                                    <div class="image-modal-flex">
                                                                        @foreach ($imageFiles as $imageFile)
                                                                            <div class="img-pro-con" id="image-select">
                                                                                <img src="{{ asset($imageFile) }}" alt="" id="image-preview">
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

                                                <div class="action-p archive-w">

                                                    <button type="button" class="archiveButton"
                                                        data-id="{{ $product->id }}">
                                                        <i class="bi bi-archive"></i>
                                                        <span class="">Inactive</span>
                                                    </button>
                                                </div>

                                                <div class="archive-modal-wrapper" id="archive_{{$product->id}}">
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
                                                                Archiving this row will remove the product from the active list and will remain unactive.
                                                                Are you sure you
                                                                want to
                                                                proceed?
                                                            </div>
                                                        </div>
                                                        <div class="footer">
                                                            <form method="POST" action="/admin/product/archive/{{$product->id}}" id="archiveProductForm" id="product_archive">
                                                                @csrf
                                                                <button type="button" class="cancel-archive">No, keep this active</button>
                                                                <button type="submit" class="confirm-archive">Yes, set this to inactive</button>
                                                            </form>
                                                        </div>
                                
                                                    </div>
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

                
                

                @endsection


                @section('js')
                    <script src="../js/jquery-3.7.1.min.js"></script>
                    <script src="../js/script.js"></script>
                @endsection
