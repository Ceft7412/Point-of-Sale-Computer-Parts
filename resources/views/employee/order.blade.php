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
                    <form action="{{ route('logout') }}" class="" method="POST">
                        @csrf
                        <button type="submit" class="">Logout</button>

                    </form>

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



            </div>


            <div class="rightbar-footer">
                <div class="rightbar-flex-footer">

                    <div class="total-text">
                        <span class="label-total">Total:</span>
                        <span class="value-total"></span>
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
                        @forelse ($categories as $category)

                            <div class="item-category category-group" data-category-id="{{ $category->id }}">
                                <img src="{{ Storage::url($category->category_image) }}"
                                    alt="{{ $category->category_name }}">
                                <span class="label">{{ $category->category_name }}</span>
                            </div>


                            <div class="item-subcategory subcategory-group" id="subcategory-order-{{ $category->id }}"  >
                                <div class="back" id="back_category">
                                    <i class="bi bi-chevron-left"></i>
                                    <span class="text-back">Back</span>
                                </div>
                                @foreach ($subcategories as $subcategory)
                                    @if ($subcategory->category_id == $category->id)
                                        <div class="single-item"  id="subcategory-order-{{ $subcategory->category_id }}">
                                            <img src="{{ Storage::url($subcategory->subcategory_image) }}"
                                                alt="{{ $subcategory->subcategory_name }}">
                                            <span class="label">{{ $subcategory->subcategory_name }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                        @empty
                            {{-- !empty category --}}
                        @endforelse



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

                            <span class="prod">Intel Core I5-12400F</span>

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

                            <span class="name-product">Intel Core I5-12400F</span>

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
                        <div class="numbers">
                            <div class="input">
                                <input type="text" disabled id="input_numbers">
                                <div class="backspace">
                                    <i class="bi bi-x-square-fill"></i>
                                </div>
                            </div>

                            <div class="num">

                                <div class="item">
                                    <span class="number">7</span>
                                </div>
                                <div class="item">
                                    <span class="number">8</span>
                                </div>
                                <div class="item">
                                    <span class="number">9</span>
                                </div>


                            </div>
                            <div class="num">

                                <div class="item">
                                    <span class="number">4</span>
                                </div>
                                <div class="item">
                                    <span class="number">5</span>
                                </div>
                                <div class="item">
                                    <span class="number">6</span>
                                </div>


                            </div>

                            <div class="num">

                                <div class="item">
                                    <span class="number">1</span>
                                </div>
                                <div class="item">
                                    <span class="number">2</span>
                                </div>
                                <div class="item">
                                    <span class="number">3</span>
                                </div>


                            </div>

                            <div class="num">

                                <div class="item">
                                    <span class="number">.</span>
                                </div>
                                <div class="item">
                                    <span class="number">0</span>
                                </div>
                                <div class="item">
                                    <span class="number">00</span>
                                </div>


                            </div>


                        </div>


                    </div>

                    <div class="footer">

                        <div class="flex-btn">
                            <button type="button" class="cancel-button">CANCEL</button>
                            <button type="submit" class="pay-button">PAY</button>

                        </div>
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
