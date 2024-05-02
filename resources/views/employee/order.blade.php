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

                <div class="item text-name">
                    <span class="">
                        Cedrick Caceres
                    </span>
                </div>

                <div class="item text-time">
                    <span class="">
                        Thursday, 2 May 2024 12:00 PM
                    </span>
                </div>
                <div class="item text-logout">

                    <span class="">Logout</span>
                </div>
            </div>

        </div>
    </div>


    <div class="o-rightbar">

        <div class="o-flex-rightbar">

            <div class="rightbar-header">

                <span class="">Quantity</span>
                <span class="">Product Name</span>
                <span class="">Price</span>
                <span class="">&nbsp</span>

            </div>

            <div class="rightbar-body">
                <div class="rightbar-body-item">
                    <div class="quantity-product">

                        <i class="bi bi-chevron-up"></i>
                        <input type="number" min="0" class="num-product-input">
                        <i class="bi bi-chevron-down"></i>

                    </div>
                    <div class="product-name">

                        <span class="">Intel Core I5-12400F</span>

                    </div>
                    <div class="product-price">

                        <span class="product-price">₱1500</span>

                    </div>

                    <div class="icon-remove">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                </div>


            </div>


            <div class="rightbar-footer">
                <div class="rightbar-flex-footer">

                    <div class="total-text">
                        <span class="label-total">Total:</span>
                        <span class="value-total">₱250</span>
                    </div>

                    <div class="flex-btn">
                        <button type="button" class="hold-button" id="hold-order">Hold</button>
                        <button type="submit" class="proceed-button">Proceed</button>
                    </div>

                </div>

            </div>

        </div>


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

                <div class="o-flex-body">

                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>
                    <div class="product-item">
                        <div class="header-product">
                            <span class="price-product">₱1500</span>
                        </div>
                        <div class="body-product">
                            <img src="../assets/images/category_uploads/1713831406.jpg" alt="CPU" class="">

                        </div>


                        <div class="footer-product">

                            <span class="">Intel Core I5-12400F</span>

                        </div>



                    </div>



                </div>

            </div>




        </div>
        <div class="o-modal-wrapper">
            <div class="o-modal">

                <div class="o-flex-modal">
                    <div class="heading">

                        <span>Payment</span>

                    </div>

                    <div class="body">

                        <div class="membership">
                            <span class="">Membership Card</span>
                        </div>

                        <div class="labels">

                            <div class="item">
                                <span class="">Total</span>
                                <span class="">Change</span>
                            </div>
                            <div class="item">
                                <span class="">₱1500</span>
                                <span class="">₱10</span>
                            </div>
                        </div>


                    </div>

                    <div class="footer">


                    </div>



                </div>

            </div>



        </div>
    </div>
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/orders.js"></script>
@endsection

@endsection
