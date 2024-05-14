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

    <div class="error-modal-wrapper">
        <div class="error-modal">
            <div class="error-modal-body">
                <div class="content-text">
                    <i class="bi bi-exclamation-square-fill"></i>
                    <span class="error-modal-text" id="error-message"></span>
                </div>
                <div class="cancel">
                    <i class="bi bi-x-lg"></i>
                </div>

            </div>
        </div>
    </div>


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



    <div class="o-rightbar">

        <div class="o-flex-rightbar">

            <div class="rightbar-header">

                <span class="">Quantity</span>
                <span class="">Product Name</span>
                <span class="">Price</span>
                <span class="">&nbsp</span>

            </div>

            <form action="{{ route('storeOrder') }}" method="POST" class="rightbar-body">
                @csrf
                <input type="hidden" class="" name="user_id" value="{{ $employee->user_id }}">




                {{-- <div class="rightbar-body-item" data-product-id="${productId}">
                    <div class="quantity-product">
                        <i class="bi bi-chevron-up increase-quantity"></i>
                        <input type="number" min="1" value="1" class="num-product-input">
                        <i class="bi bi-chevron-down decrease-quantity"></i>
                    </div>
                    <div class="product-name">
                        <input type="text" readonly value="CasdddddddddddddddddddddddddddddddddddPU">
                    </div>
                    <div class="product-price">
                        <input type="text" name="product_price" value="1" readonly>
                    </div>
                    <div class="icon-remove remove-item">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                </div> --}}




                <div class="o-modal-wrapper">
                    <div class="o-modal">

                        <div class="o-flex-modal">
                            <div class="heading">

                                <span>Payment</span>

                            </div>

                            <div class="body">



                                <div class="labels">

                                    <div class="item">
                                        <span class="">Total</span>
                                        <span class="">Change</span>
                                    </div>
                                    <div class="item">
                                        <input readonly type="text" name="order_total" class="value-total">
                                        <input readonly type="text" class="change-value">
                                        
                                        <input type="hidden" name="order_change" id="change_value">
                                    </div>
                                </div>
                                <div class="numbers">
                                    <div class="input">
                                        <input type="text" name="amount_rendered" readonly id="input_numbers">
                                        <div class="backspace confirm-money">
                                            <span class="">OK</span>
                                        </div>
                                    </div>
                                    <span class="er-val-red">Please enter a value.</span>

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
                                        <div class="del">
                                            <span class="delete-number">Delete</span>
                                        </div>


                                    </div>


                                </div>
                                
                                <div class="membership">
                                    <span class="c-mc" id="av-mem-card">Membership Card</span>
                                    <div class="membership-modal-wrapper">

                                        <div class="membership-modal">
                                                <div class="membership-modal-flex">
                                                 
                                                    <div class="heading">
                                                        <span class="txt-h">Apply Membership Card</span>
                                                    </div>
                                                    <div class="body">
                                                        <label for="#">Enter membership card number:</label>
                                                        <div class="fl-row-mem-card">
                                                            <input type="number" name="membership_card_number" id="membership_card_number" class="input-id">
                                                            <button type="button" id="check_membership_card_number">Check</button>
                                                        </div>
                                                        <span class="membership_card_number_success" id="membership_card_number_success"></span>
                                                        <span class="membership_card_number_error" id="membership_card_number_error"></span>
                                                    </div>
                                                    <div class="footer">
                                                        <button type="button" class="cancel-button-membership">Cancel</button>
                                                        <button type="button" class="apply-button" id="apply_membership_card_number">Apply</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                


                            </div>

                            <div class="footer">

                                <div class="flex-btn">
                                    <button type="button" class="cancel-button">CANCEL</button>
                                    <button type="button" class="pay-button">PAY</button>
                                    <div class="customer-modal-wrapper">
                                        <div class="customer-modal">
                                            <div class="customer-modal-flex">
                                                <div class="customer-modal-header">
                                                    <span class="">Customer</span>
                                                </div>
                                                <div class="customer-modal-body">
                                                    <div class="item">
                                                        <label for="customer_name">Name:</label>
                                                        <input type="text" name="customer_name" id="customer_name" class="input-customer">
                                                    </div>
                                                    <div class="item">
                                                        <label for="customer_name">Email:</label>
                                                        <input type="text" name="customer_email" id="customer_email" class="input-customer">
                                                    </div>
                                                    <div class="item">
                                                        <label for="customer_contact">Contact:</label>
                                                        <input type="text" name="customer_contact" id="customer_phone" class="input-customer">
                                                    </div>

                                                </div>
                                                <div class="customer-modal-footer">
                                                    <div class="item">
                                                        <button type="button" class="cancel-button-customer">Cancel</button>
                                                        <button type="submit" class="apply-button-customer">Pay Now</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>

                    </div>



                </div>
            </form>


            <div class="rightbar-footer">
                <div class="rightbar-flex-footer">
                    <div class="total-text">
                        <span class="label-subtotal">Subtotal:</span>

                        <input disabled type="text" name="order_subtotal" class="value-subtotal">
                    </div>
                    <div class="total-text">
                        <span class="label-total">Total:</span>

                        <input disabled type="text" name="order_total" class="value-total">
                    </div>


                    <div class="flex-btn">
                        <button type="button" class="proceed-button" id="proceed-show-modal">Proceed</button>
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

                        <a href="{{route('membership')}}" class="big-text">Request Membership</a>

                    </div>

                    <div class="align-search">
                        <form method="GET" action="{{ route('order') }}"class="search-wrapper">

                            <input class="input" type="text" name="search" placeholder="Search Products"
                                value="{{ request()->query('search') }}">
                            <button type="submit" class="search-id"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>


                <div class="item category">


                    <div class="categories-flex-row">
                        <div class="item-all">
                            <span class="label">All Products</span>
                        </div>
                        @forelse ($categories as $category)

                            <div class="item-category category-group" data-category-id="{{ $category->id }}">
                                <img src="{{ Storage::url('public/category_images/'.$category->category_image) }}"
                                    alt="{{ $category->category_name }}">
                                <span class="label">{{ $category->category_name }}</span>
                            </div>


                            <div class="item-subcategory subcategory-group"  id="subcategory-order-{{ $category->id }}">
                                <div class="back" id="back_category">
                                    <i class="bi bi-chevron-left"></i>
                                    <span class="text-back">Back</span>
                                </div>
                                @foreach ($subcategories as $subcategory)
                                    @if ($subcategory->category_id == $category->id)
                                        <div class="single-item" id="subcategory-order-{{ $subcategory->category_id }}"
                                            data-subcategory-id="{{ $subcategory->id }}">
                                            <img src="{{ Storage::url('public/subcategory_images/'.$subcategory->subcategory_image) }}"
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
                    @foreach ($products as $product)
                        <form action="/product/item/{{ $product->id }}" method="POST" data-subcategory-id="{{ $product->subcategory_id }}" data-category-id="{{$product->category_id}}"  class="product-item"
                            data-product-id="{{ $product->id }}">
                            @csrf
                            <div class="header-product">
                                <span class="price-product" id="price_product">₱{{ $product->product_price }}</span>
                            </div>
                            <div class="body-product">
                                <img src="{{ Storage::url('public/product_images/'.$product->product_image) }}"
                                    alt="{{ $product->product_name }}" class="">

                            </div>
                            <input type="hidden" class="">
                            <div class="footer-product">

                                <span class="prod" id="product_name">{{ $product->product_name }}</span>

                            </div>

                        </form>
                    @endforeach

                    {{--                     
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



                    </div> --}}



                </div>

            </div>




        </div>

    </div>
    @section('js')
        <script src="../js/jquery-3.7.1.min.js"></script>
        <script src="../js/orders.js"></script>
    @endsection

@endsection
