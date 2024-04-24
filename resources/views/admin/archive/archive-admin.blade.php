@extends('layouts.admin')

@section('title', 'Archive Admin')
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
                    <a class="tb-mn-ln-item-a active">
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
                <a href="{{route('archive-category')}}" class="archive-show"  id="archive-expand-category">
                    <span class="">Archive</span>

                </a>
            </div>

            <div class="menu-item">
                <div class="r-item">
                    <a href="{{ route('product')}}" class="sidebar-menu-item">
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
                <a href="{{route('archive-product')}}" class="archive-show" id="archive-expand-product">
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
                    <a href="{{route('employee')}}"class="sidebar-menu-item">
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
                <a href="{{route('archive-employee')}}" class="archive-show" id="archive-expand-employee">
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
                <a class="archive-show active" id="archive-expand-admin">
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
                    <div class="item-1">
                        <span class="new-title">New Employee</span>
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

    <div class="c-wrapper">
        <div class="c-heading-wrapper category">
            <div class="ct-title">
                <span class="title">Archived Admin</span>
            
            </div>
        </div>
        <div class="ct-body">
            <div class="ct-body-flex">
                <div class="ct-body-heading">
                    <a href="{{route('admin')}}" class="go-back">
                        <i class="bi bi-arrow-bar-left"></i>
                        <span class="back">GO BACK</span>
                    </a>
                    <div class="ct-heading-r">
                        <form class="ct-heading-search">
                            
                            <input type="text" class="ct-heading-search-input" placeholder="Admin ID">
                            <button type="submit" class="search-id"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>

                <form method="POST" action="{{ url('unarchive') }}">
                    @csrf
                    <button type="submit" id="archiveButton" style="display: none;">Set to active</button>
                    <div class="ct-body-content">

                        <div class="table-wrapper">
                            <div class="table">
                                <div class="employee-header">
                                    <div class="table-row">
                                        <div class="table-cell">
                                            <input type="checkbox" id="selectAllCheckbox">
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
                                    @foreach ($users as $user)
                                        <div class="table-row">

                                            <div class="table-cell">
                                                <input type="checkbox" class="userCheckbox" name="userIds[]"
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
                                                <div class="action-p archive-w">

                                                    <button type="button" class="unarchiveButton"
                                                        data-id="{{ $user->id }}">
                                                        <i class="bi bi-box-arrow-up"></i>
                                                        <span class="">Active</span>
                                                    </button>


                                                </div>

                                            </div>


                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @include('action.update-user')
                @include('action.unarchive-user')

            </div>

        </div>
    </div>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/../js/script.js"></script>
@endsection