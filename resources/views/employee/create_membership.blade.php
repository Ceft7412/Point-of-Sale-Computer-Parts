@extends('layouts.employee-layout')

@section('title', 'Request Membership')
@section('css')
    <link rel="stylesheet" href="../dest/css/style.css">
@endsection

@section('o-content')
    <div class="order-wrapper">
        <div class="o-topbar">
            <div class="o-flex-topbar">
                {{-- Logo left-side corner --}}
                <div class="logo-wrapper">

                    <span class="big-color-orange">E<span class="small-color-orange">ASY</span><span
                            class="bg-black-color-white">TECH</span>
                    </span>

                </div>

                {{-- Employee name to be displayed right-side corner --}}
                <div class="item-wrapper">

                    <div class="item text-name">
                        <span class="">
                            {{ $employee->name }}
                        </span>
                    </div>

                    <div class="item text-time">
                        <span id="realtimeClock" class="">

                        </span>
                    </div>
                    <div class="item text-logout">
                        <form action="{{ route('logout') }}" class="" method="POST">
                            @csrf
                            <button type="submit" class="">Logout</button>

                        </form>

                    </div>
                    <div class="item icon-menu">
                        <i class="bi bi-list"></i>
                    </div>
                </div>

            </div>
        </div>
        @if ($errors->has('employee_password_err'))
            <div class="err-modal-wrapper" id="errorModal">
                <div class="error-modal">
                    <div class="error-modal-body">
                        <div class="content-text">
                            <i class="bi bi-exclamation-square-fill"></i>
                            <span class="error-modal-text" id="error-message">Error notification:
                                {{ $errors->first('employee_password_err') }}</span>
                        </div>
                        <div class="cancel">
                            <i class="bi bi-x-lg"></i>
                        </div>

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

        <div class="membership-content">
            <a href="{{ route('order') }}"class="re-back">
                <span class="">Go back</span>
            </a>
            <div class="card">
                <form action="{{ route('storeMembership') }}" class="card-flex" method="POST">
                    @csrf
                    <div class="header">
                        <span class="">Requesting Membership</span>
                    </div>

                    <div class="body">
                        <div class="input-group">
                            <label for="" class="">Name:</label>
                            <input type="text" name="membership_name" id="applicant_name" class="input" required>
                            <span class="err-empty">This field is required.</span>
                        </div>
                        <div class="input-group">
                            <label for="" class="">Email:</label>
                            <input type="email" name="membership_email" id="applicant_email" class="input" required>
                            <span class="err-empty">This field is required.</span>
                        </div>
                        <div class="input-group">
                            <label for="" class="">Phone:</label>
                            <input type="text" name="membership_phone" id="applicant_phone" class="input" required>
                            <span class="err-empty">This field is required.</span>
                        </div>
                    </div>
                    <div class="footer">
                        <button type="button" class="submit-button-application">Request</button>
                    </div>
                    <div class="confirm-pass-wrapper">
                        <div class="confirm-pass-modal">
                            <div class="confirm-pass-modal-flex">
                                <div class="header-confirm">
                                    <span class="text">
                                        Confirm Password
                                    </span>

                                </div>

                                <div class="body-confirm">
                                    <label for="" class="">For security, please confirm your password to
                                        continue.</label>
                                    <input type="password" name="employee_password" id="password" class="input" required>
                                </div>

                                <div class="footer-confirm">
                                    <button type="button" class="submit-button-cancel">CANCEL</button>
                                    <button type="submit" class="submit-button-confirm">CONFIRM</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


@section('js')
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/membership.js"></script>
@endsection

@endsection
