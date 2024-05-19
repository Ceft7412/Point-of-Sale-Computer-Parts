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
        <div class="card-receipt-wrapper">
            <a class="g-back" href="{{ route('order') }}">
                <span>
                    <i class="bi bi-arrow-left"></i>
                    <span>Back</span>
                </span>
            </a>
            <div class="card-receipt">
                <div class="card-receipt-fl">
                    <div class="card-receipt-heading">
                        <span class="item">EasyTech Computer Parts</span>
                        <span class="item">University of Mindanao</span>
                        <span class="item">Matina, Davao City</span>


                    </div>
                    <div class="card-receipt-body">
                        <div class="item">
                            <div class="child-item">
                                <span class="gr-child-item">Order #:</span>
                                <span class="gr-child-item">{{ $order->order_id }}</span>
                            </div>
                            <div class="child-item">
                                <span class="gr-child-item">Sold To:</span>

                                @if ($order->customer->membership_id)
                                    <span class="gr-child-item">
                                        {{ $order->customer->membership->membership_name }}
                                    </span>
                                @else
                                    <span class="gr-child-item">
                                        {{ $order->customer->customer_name }}
                                    </span>
                                @endif
                            </div>
                            <div class="child-item">
                                <span class="gr-child-item">Order Date:</span>
                                <span class="gr-child-item">
                                    {{ $order->created_at->toDateString() }}

                                </span>
                            </div>
                            <div class="child-item">
                                <span class="gr-child-item">Order Time:</span>
                                <span class="gr-child-item">
                                    {{ $order->created_at->toTimeString() }}
                                </span>
                            </div>
                            <div class="child-item">
                                <span class="gr-child-item">Sales Person:</span>
                                <span class="gr-child-item">
                                    {{ $employee->name }}
                                </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="child-item">
                                <span class="gr-child-item">Name</span>
                                <span class="gr-child-item flex-col">Quantity</span>
                                <span class="gr-child-item flex-col">Subtotal</span>

                            </div>
                            @foreach ($order->items as $orderItem)
                                <div class="child-item">
                                    <span class="gr-child-item">{{ $orderItem->product_name }}</span>
                                    <span class="gr-child-item flex-col">x {{ $orderItem->quantity }}</span>
                                    <span class="gr-child-item flex-col">

                                        ₱ {{ $orderItem->subtotal }}
                                    </span>

                                </div>
                            @endforeach

                            <div class="child-item">

                            </div>
                        </div>
                        <div class="item">

                            <div class="child-item">
                                <span class="gr-child-item">Discount</span>
                                @if ($order->customer->membership_id)
                                    <span class="gr-child-item">10%</span>
                                @endif
                            </div>
                            <div class="child-item">
                                <span class="gr-child-item">Total</span>
                                <span class="gr-child-item">₱ {{ $order->order_total }}</span>
                            </div>
                            <div class="child-item">
                                <span class="gr-child-item">Cash Tendered</span>
                                <span class="gr-child-item">₱{{ $order->amount_rendered }}</span>
                            </div>
                            <div class="child-item">
                                <span class="gr-child-item">CHANGE DUE</span>
                                <span class="gr-child-item">₱{{ $order->order_change }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-receipt-footer">
                        <span class="item">Thank you for shopping with us!</span>
                        <span class="item">Please come again!</span>
                        <span class="item">For inquiries, please contact us at:</span>
                        <span class="item">+999999999</span>
                        <span class="item">Membership offers 10% off! Get it now!</span>
                    </div>

                </div>

            </div>
        </div>


    </div>
@section('js')
    <script src="/js/jquery-3.7.1.min.js"></script>
    <script src="/js/orders.js"></script>
@endsection

@endsection
