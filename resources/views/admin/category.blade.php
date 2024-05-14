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
                    <div class="bigtext-wrapper">
                        <span class="bigtext-easy">EASY</span>
                        <span class="bigtext-tech">TECH</span>
                    </div>
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
    {{-- ADD CATEGORY MODAL --}}
    <div class="modal-wrapper" id="modal">
        <div class="modal-card-wrapper" id="modal-card">
            <!-- CATEGORY -->
            <div class="modal-flex category-show">
                <div class="modal-header category-header">
                    <div class="item-1">
                        <span class="new-title">New Category</span>
                        <i class="bi bi-x-lg" id="close-modal"></i>
                    </div>
                </div>
                <form method="POST" action="{{ route('category-store') }}" enctype="multipart/form-data"
                    class="form-wrapper" id="category_insert">
                    @csrf
                    <div class="modal-body">

                        <div class="input-wrapper flex-row">

                            <div class="flex-column">
                                <label for="">Picture:</label>
                                <input type="file" name='category_image' required accept=".jpg, .jpeg, .png"
                                    class="">
                            </div>
                            <span clas="picture-wrapper"></span>
                        </div>
                        <div class="input-wrapper">
                            <div class="flex-column">
                                <label for="">Category Name:</label>
                                <input type="text" name='category_name' class="input category_name" required>
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
                <span class="title">Category</span>
                <span class="description">Track and manage your category</span>
            </div>
            <div class="ct-add" id="add-button-modal">
                <div class="ct-add-flex">
                    <i class="bi bi-plus-lg"></i>
                    <span class="Category">Category</span>
                </div>
            </div>

        </div>
        <div class="ct-body">
            <div class="ct-body-flex">
                <div class="ct-body-heading">
                    <div class="ct-heading-l">
                        <div class="itm-ct hd-active-itm active">
                            <span class="">Categories</span>
                        </div>
        
                        <a href="{{ route('brands') }}" class="itm-ct hd-pending-itm">
                            <span class="">Brands</span>
                        </a>
                    </div>
                    <div class="ct-heading-r">
                        <form class="fl-per-pg" method="POST" id="archiveGroup" action="{{ route('archiveCategoryGroup') }}">
                            @csrf
                            <button type="submit" class="archive_select_group" id="archive_select_group">Set to inactive</button>
                        </form>
                        <form method="GET" action="{{ route('category') }}"class="ct-heading-search">

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
                                        @if ($categories->count() > 0)
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
                                    <div class="table-cell">Brands</div>
                                    <div class="table-cell">Inserted Date</div>
                                    <div class="table-cell">Modified Date</div>
                                    <div class="table-cell">Action</div>
                                </div>
                            </div>
                            <div class="category-body">

                                @forelse ($categories as $category)
                                    <div class="table-group" id="category-group-{{ $category->category_id }}">

                                        <div class="table-row row-category">

                                            <div class="table-cell">
                                                <input type="checkbox" class="userCheckbox" name="archiveIds[]"
                                                    value="{{ $category->id }}">
                                            </div>
                                            <div class="table-cell">
                                                C{{ $category->category_id }}
                                            </div>
                                            <div class="table-cell category-cell">
                                                <img src="{{ Storage::url('public/category_images/' .$category->category_image) }}"
                                                    alt="{{ $category->category_name }}" class="picture">
                                                <span>{{ $category->category_name }}</span>
                                            </div>
                                            <div class="table-cell">
                                                {{ $category->category_description }}
                                            </div>
                                            <div class="table-cell">{{ $category->subcategories->count() }}

                                            </div>
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
                                                        <button type="button" class="updateButton"
                                                            data-id="{{ $category->id }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                            <span class="">Update</span>
                                                        </button>
                                                    </div>
                                                    <div class="update-modal-wrapper" id="update_{{$category->id}}">
                                                        <div class="modal-card-wrapper" id="modal-card">
                                                            <div class="modal-flex-employee">
                                                                <div class="modal-header">
                                                                    <div class="item-1">
                                                                        <span class="new-title">Update Category</span>
                                                                        <span class="material-symbols-outlined" id="close-update-modal">
                                                                            close
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <form action="/admin/category/update/{{$category->id}}" class="form-wrapper" enctype="multipart/form-data" id="updateForm" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class="input-wrapper flex-row space-between margin-bottom col-530">
                                                                            <div class="col-pic">
                                                                                <div class="flex-column">
                                                                                    <label for="">Picture:</label>
                                                                                    <input type="file" name='category_image' accept=".jpg, .jpeg, .png"
                                                                                        class="">
                                                                                </div>
                                                                                <span class="divider">Or</span>
                                                                                <div class="pictures-group">
                                                                                    <span class="t-ps">Choose existing images</span>
                                                                                    <input type="hidden" class="selected_image" id="selected_image" name="selected_image">
                                                                                </div>
                                                                            </div>
                                                                            <div class="picture-wrapper">
                                                                                <img id="update_category_image" src="{{Storage::url('public/category_images/' .$category->category_image)}}" class="image-place" alt="{{$category->category_image}}">
                                                                            </div>
                                                    
                                                                        </div>
                                                                        <div class="input-wrapper">
                                                                            <div class="flex-column">
                                                                                <label for="">Category Name:</label>
                                                                                <input type="text" value="{{$category->category_name}}" required name='category_name' class="input">
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-wrapper">
                                                                            <div class="flex-column">
                                                                                <label for="">Description (Optional):</label>
                                                                                <input type="text" value="{{$category->category_description}}" name='category_description' class="input">
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
                                                                
                                                                <div class="image-modal-wrapper">
                                                    
                                                                    <div class="image-modal">
                                                                        <div class="header">
                                                                            <span class="b-title">Choose a picture...</span>
                                                                            <span class="s-title"><i class="bi bi-info-circle"></i>Selecting an image will instantly update the form.</span>
                                                                        </div>
                                                                        
                                                                        <div class="image-modal-flex">
                                                                            @foreach ($imageFiles as $imageFile)
                                                                                <div class="img-con" id="image-select">
                                                                                    <img data-id="{{$category->id}}" src="{{ asset($imageFile) }}" alt=""
                                                                                        id="image-preview">
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
                                                            data-id="{{ $category->id }}">
                                                            <i class="bi bi-archive"></i>
                                                            <span class="">Inactive</span>
                                                        </button>
                                                    </div>
                                                    <div class="archive-modal-wrapper" id="archive_{{$category->id}}">
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
                                                                    Archiving this row will remove the category from the active list and will remain unactive. Are you sure you
                                                                    want to
                                                                    proceed?
                                                                </div>
                                                            </div>
                                                            <div class="footer">
                                                                <form method="POST" action="/admin/category/archive/{{$category->id}}" id="archiveCategoryForm">
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
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/script.js"></script>
@endsection
