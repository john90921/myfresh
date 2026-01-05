<x-app-layout>

    <style>
        .checkout-section {
            padding: 50px 0;
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            min-height: 100vh;
        }

        .checkout-title {
            font-size: 32px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 30px;
            text-align: center;
        }

        .checkout-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        .order-summary {
            background: #f8f9fa;
            padding: 30px;
            border-bottom: 3px solid #5cb85c;
        }

        .order-summary h3 {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .order-summary h3:before {
            content: "🛒";
            margin-right: 10px;
            font-size: 24px;
        }

        .order-table {
            width: 100%;
            margin-bottom: 25px;
        }

        .order-table thead {
            background: #2c3e50;
            color: white;
        }

        .order-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .order-table tbody tr {
            border-bottom: 1px solid #dee2e6;
        }

        .order-table tbody tr:hover {
            background: #f8f9fa;
        }

        .order-table td {
            padding: 18px 15px;
            color: #495057;
            font-size: 15px;
        }

        .order-total {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            border: 2px dashed #5cb85c;
        }

        .order-total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }

        .order-total-amount {
            font-size: 28px;
            color: #5cb85c;
        }

        .checkout-form {
            padding: 35px;
        }

        .form-section-title {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
            display: flex;
            align-items: center;
        }

        .form-section-title:before {
            content: "📋";
            margin-right: 10px;
            font-size: 22px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            color: #495057;
        }
        .form-control-select{
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            color: #495057;
        }

        .form-control:focus {
            outline: none;
            border-color: #5cb85c;
            box-shadow: 0 0 0 3px rgba(92, 184, 92, 0.1);
        }

        .form-control::placeholder {
            color: #adb5bd;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .btn-checkout {
            background: linear-gradient(135deg, #5cb85c, #4cae4c);
            color: white;
            border: none;
            padding: 18px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(92, 184, 92, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 20px;
        }

        .btn-checkout:hover {
            background: linear-gradient(135deg, #4cae4c, #449d44);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(92, 184, 92, 0.4);
        }

        .btn-checkout:active {
            transform: translateY(0);
        }

        .secure-badge {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .secure-badge:before {
            content: "🔒";
            margin-right: 8px;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .checkout-title {
                font-size: 24px;
            }

            .order-summary,
            .checkout-form {
                padding: 20px;
            }

            .order-table th,
            .order-table td {
     pr           padding: 12px 8px;
                font-size: 13px;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .btn-checkout {
                padding: 16px 30px;
                font-size: 16px;
            }
        }
    </style>

    <div class="checkout-section">

        <div class="container">

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                        <div class="checkout-container">
                            <!-- Order Summary -->
                            <div class="order-summary">
                                <h3>Order Summary</h3>
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Package</th>
                                            <th>Quantity</th>
                                            <th style="text-align: right;">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>{{ $order->product_name }}</strong></td>
                                            <td>{{ $order->package_name }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td style="text-align: right;"><strong>RM {{ number_format($order->package_price * $order->quantity, 2) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="order-total">
                                    <div class="order-total-row">
                                        <span>Total Amount:</span>
                                        <span class="order-total-amount">RM {{ number_format($order->total_amount, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout Form -->
                            <div class="checkout-form">
                                <h3 class="form-section-title">Billing Information</h3>

                                <div class="form-group">
                                    <label for="name">Full Name </label>
                                    <div>{{ $order->name }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <div>{{ $order->phone }}</div>
                                </div>
                                  <div class="form-group">
                                    <label for="country">Country </label>
                                    <div>{{ $order->country }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Delivery Address </label>
                                    <div>{{ $order->address }}</div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="city">City </label>
                                        <div>{{ $order->city }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="postcode">Post Code</label>
                                        <div>{{ $order->postcode }}</div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="notes">Order Notes (Optional)</label>
                                    <div>{{ $order->notes }}</div>
                                </div>



                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
