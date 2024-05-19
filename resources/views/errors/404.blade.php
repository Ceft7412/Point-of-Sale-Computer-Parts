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

    <div class="error-wrapper">


        <div class="error-content">
            <div class="error-content-wrapper">
                <div class="error-content-left">
                    <div class="error-content-left-wrapper">
                        <div class="error-content-left-title">
                            <h1>404</h1>
                            <h2>Page Not Found</h2>
                        </div>
                        <div class="error-content-left-text">
                            <p>Sorry, the page you are looking for could not be found.</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
