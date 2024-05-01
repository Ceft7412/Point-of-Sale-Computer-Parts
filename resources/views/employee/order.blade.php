@extends('layouts.employee-layout')

@section('title', 'Order')
@section('css')
    <link rel="stylesheet" href="../dest/css/style.css">
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
                <span class="text-name">

                    Cedrick Caceres

                </span>
            </div>

        </div>
    </div>


    <div class="o-rightbar">




    </div>


    <div class="o-content">

        <div class="o-flex-content">

            <div class="o-heading">

                <div class="item components">
                    <div class="products-text">

                        <span class="big-text">Products</span>

                    </div>

                    <div class="align-search">
                        <form method="GET" action="#"class="search-wrapper">

                            <input class="input" type="text" name="search" placeholder="Search Products"
                                value="">
                            <button type="submit" class="search-id"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>


                <div class="item category">


                    <div class="categories-flex-row">
                        <div class="item-category">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="Monitor">
                            <span class="label">CPU</span>
                        </div>
                        <div class="item-subcategory">
                            <div class="back" id="back_category">
                                <i class="bi bi-chevron-left"></i>
                                <span class="text-back">Back</span>
                            </div>


                            <div class="single-item">
                                <img src="../assets/images/category_uploads/1713831406.jpg" alt="Monitor">
                                <span class="label">CPU</span>
                            </div>

                        </div>


                    </div>

                </div>

            </div>

            <div class="o-body">

            </div>




        </div>
    </div>
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/orders.js"></script>
@endsection

@endsection
