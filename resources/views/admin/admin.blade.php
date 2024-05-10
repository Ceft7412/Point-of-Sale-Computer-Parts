@extends('layouts.admin')

@section('title', 'Admin')
@section('css')
    <link rel="stylesheet" href="../dest/css/style.css">
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
                    <a href="{{ url('admin/employee') }}"class="sidebar-menu-item">
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
            <div class="menu-item active">
                <div class="r-item active">
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
    <!-- EMPLOYEE MODAL -->
    <div class="modal-wrapper" id="modal">
        <div class="modal-card-wrapper" id="modal-card">
            <div class="modal-flex  ">
                <div class="modal-header">
                    <div class="item-1">
                        <span class="new-title">New Admin</span>
                        <span class="material-symbols-outlined" id="close-modal">
                            close
                        </span>
                    </div>
                </div>
                <form action="{{ route('register-store') }}" class="form-wrapper" id="register-employee"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input-user-type input-wrapper">
                            <input type="hidden" name="type" value="1">
                        </div>
                        <div class="input-name input-wrapper">
                            <div class="flex-column">
                                <label for="">Name:</label>
                                <input type="text" name="name"class="input" required>

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
                                <input type="email" name="email" class="input" required>
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
                                <input id="password" type="password" name="password" class="input" required>

                            </div>
                        </div>
                        <div class="input-password input-wrapper">
                            <div class="flex-column">
                                <label for="">Confirm Password:</label>
                                <input id="confirm-password" type="password" class="input" required>

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
                        <span class="small">{{session('success')}}</span>
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
    <!-- CONTENT -->

    <div class="c-wrapper">
        <div class="c-heading-wrapper category">
            <div class="ct-title">
                <span class="title">Admin</span>
                <span class="description">Track and manage administrators</span>
            </div>
            <div class="ct-add" id="add-button-modal">
                <div class="ct-add-flex">
                    <span class="material-symbols-outlined">
                        add
                    </span>
                    <span class="employee">Admin</span>
                </div>
            </div>
        </div>
        <div class="ct-body">
            <div class="ct-body-flex">
                <div class="ct-body-heading">
                    <span class="ct-heading-l">Active Admin</span>
                    <div class="ct-heading-r">
                        <form class="fl-per-pg" method="POST" id="archiveGroup" action="{{ route('archiveGroup') }}">
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
                                                Archiving this grou p will remove the users from the active list and will remain
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
                        <form method="GET" action="{{ route('admin') }}"class="ct-heading-search">

                            <input type="text" name="search" class="ct-heading-search-input" placeholder="Admin ID"
                                value="{{ request()->query('search') }}">
                            <button type="submit" class="search-id"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
                
                    <div class="ct-body-content">
                        <div class="table-wrapper">
                            <div class="table">
                                <div class="employee-header">
                                    <div class="table-row">
                                        <div class="table-cell">
                                            @if ($users->count() > 0)
                                                <input type="checkbox" id="selectAllCheckbox">
                                            @endif
                                        </div>
                                        <div class="table-cell category-cell">
                                            <span>Admin ID</span>
                                        </div>
                                        <div class="table-cell">Name</div>
                                        <div class="table-cell">Username</div>
                                        <div class="table-cell">Email</div>
                                        <div class="table-cell">Contact No.</div>
                                        <div class="table-cell">Inserted Date</div>
                                        <div class="table-cell">Modified Date</div>
                                        <div class="table-cell">Action</div>
                                    </div>
                                </div>
                                <div class="employee-body">
                                    @forelse ($users as $user)
                                        <div class="table-row">

                                            <div class="table-cell">
                                                <input type="checkbox" class="userCheckbox" name="archiveIds[]"
                                                    value="{{ $user->id }}">
                                            </div>
                                            <div class="table-cell category-cell">
                                                <span>{{ $user->user_id }}</span>
                                            </div>
                                            <div class="table-cell">
                                                {{ $user->name }}
                                            </div>
                                            <div class="table-cell">{{ $user->username }}</div>
                                            <div class="table-cell">
                                                <span>{{ $user->email }}</span>

                                            </div>
                                            <div class="table-cell" style="display: flex;">
                                                <span>{{ $user->contact }}</span>

                                            </div>
                                            <div class="table-cell date">
                                                <span>{{ $user->created_at->toDateString() }}</span>
                                                <span>{{ $user->created_at->toTimeString() }}</span>
                                            </div>
                                            <div class="table-cell date" style="display: flex;">
                                                <span>{{ $user->updated_at->toDateString() }}</span>
                                                <span>{{ $user->updated_at->toTimeString() }}</span>
                                            </div>
                                            <div class="table-cell action">
                                                <div class="action-p edit-w" >
                                                    <button type="button" class="updateButton" data-id="{{ $user->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                        <span class="">Update</span>
                                                    </button>
                                                </div>
                                                <div class="update-modal-wrapper" id="update_{{ $user->id }}">
                                                    <div class="modal-card-wrapper" id="modal-card">
                                                        <div class="modal-flex-employee">
                                                            <div class="modal-header">
                                                                <div class="item-1">
                                                                    <span class="new-title">Update Employee</span>
                                                                    <span class="material-symbols-outlined" id="close-update-modal">
                                                                        close
                                                                    </span>
                                                                </div>  
                                                            </div>
                                                            <form action="/admin/user/update/{{$user->id}}" class="form-wrapper" id="updateForm" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                  
                                                                    <div class="input-user-type input-wrapper">
                                                                        <input type="hidden" name="type" value="1">
                                                                    </div>
                                                                    <div class="input-name input-wrapper">
                                                                        <div class="flex-column">
                                                                            <label for="">Name:</label>
                                                                            <input type="text" value="{{ $user->name }}" name="update-name"class="input" required>
                                                
                                                                        </div>
                                                                        <div class="flex-column">
                                                                            <label for="">Username:</label>
                                                                            <input type="text" value="{{ $user->username }}" name="update-username" class="input" required>
                                                                            @error('username')
                                                                                <div class="error">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                
                                                
                                                                    <div class="input-email input-wrapper">
                                                                        <div class="flex-column">
                                                                            <label for="">Email:</label>
                                                                            <input type="email" value="{{ $user->email }}"name="update-email" class="input" required>
                                                                            <div class="error"></div>
                                                                        </div>
                                                                        <div class="flex-column">
                                                                            <label for="">Contact No: (Optional)</label>
                                                                            <input type="tel"value="{{ $user->contact }}" name="update-contact" class="input">
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
                                                <div class="action-p archive-w">
                                                    <button type="button" class="archiveButton"
                                                        data-id="{{ $user->id }}">
                                                        <i class="bi bi-archive"></i>
                                                        <span class="">Inactive</span>
                                                    </button>
                                                </div>
                                                <div class="archive-modal-wrapper" id="archive_{{ $user->id }}">
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
                                                                Archiving this row will remove the user from the active list and will remain unactive. Are you sure you
                                                                want to
                                                                proceed?
                                                            </div>
                                                        </div>
                                                        <div class="footer">
                                                            <form method="POST" action="/admin/user/archive/{{$user->id}}" id="archiveForm">
                                                                @csrf
                                                                <button type="button" class="cancel-archive">No, keep this active</button>
                                                                <button type="submit" class="confirm-archive">Yes, set this to inactive</button>
                                                            </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
@endsection
