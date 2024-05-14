@extends('layouts.employee-layout')

@section('title', 'Receipt')
@section('css')
    <link rel="stylesheet" href="/dest/css/style.css">
@endsection

@section('o-content')
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
            </div>

        </div>
    </div>
    <div class="o-content">

        

    </div>
    @section('js')
        <script src="/js/jquery-3.7.1.min.js"></script>
        <script src="/js/orders.js"></script>
    @endsection

@endsection