@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="/dest/css/style.css">
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
        </div>
    </div>

    <div class="error-wrapper-no">


        <div class="error-content">
            <div class="error-content-wrapper">
                <div class="error-content-left">
                    <div class="error-content-left-wrapper">
                        <div class="error-content-left-title">
                            <h1>403</h1>
                            <h2>Forbidden</h2>
                        </div>
                        <div class="error-content-left-text">
                            <p>Sorry, you don't have permission to access this page.</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
