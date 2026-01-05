<x-app-layout>
    <style>
        body {
            background: #f6f8fc;
        }

        .page-title {
            font-weight: 700;
            letter-spacing: .3px;
        }

        .purchase-tabs {
            background: #ffffff;
            border-radius: 16px;
            padding: 6px;
            display: inline-flex;
            gap: 6px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
        }

        .purchase-tabs .nav-link {
            border-radius: 12px;
            padding: 10px 22px;
            font-weight: 600;
            color: #6c757d;
            transition: all .25s ease;
        }

        .purchase-tabs .nav-link:hover {
            background: #f1f3f9;
            color: #0d6efd;
        }

        .purchase-tabs .nav-link.active {
            background: linear-gradient(135deg, #0d6efd, #4f8cff);
            color: #ffffff;
            box-shadow: 0 6px 16px rgba(13, 110, 253, .35);
        }

        .order-card {
            border-radius: 24px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, .06);
            background: #ffffff;
        }

        .order-table thead th {
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #9ca3af;
            border-bottom: 1px solid #eef0f4;
        }

        .order-table tbody tr:hover {
            background: #f9fafb;
        }

        .badge-completed {
            background: rgba(16, 185, 129, .12);
            color: #10b981;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 999px;
        }

        .btn-view {
            border-radius: 999px;
            padding: 6px 18px;
            font-weight: 600;
        }
    </style>

    <div class="container py-2 mt-2" style="height: 100vh;">

        <div class="mb-4">
            <h2 class="page-title mb-1">My Purchases</h2>
            <p class="text-muted mb-0">Your order history</p>
        </div>

        <!-- Tabs -->
        <ul class="nav purchase-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('purchase/processing') ? 'active' : '' }}" href="{{ route('purchase.processing') }}">
                    <i class="fas fa-check-circle me-1"></i> processing
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('purchase/completed') ? 'active' : '' }}" href="{{ route('purchase.completed') }}">
                    <i class="fas fa-clock me-1"></i> completed
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('purchase/pending') ? 'active' : '' }}" href="{{ route('purchase.pending') }}">
                    <i class="fas fa-spinner me-1"></i> pending
                </a>
            </li>
        </ul>

        <!-- Orders Card -->
        <div class="order-card p-4 p-md-5">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <span class="badge-completed">{{ $orders->count() }} Orders</span>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless align-middle order-table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>name</th>
                            <th>quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td class="fw-semibold">#{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>{{ $order->product_name }} items</td>
                            <td class="fw-semibold text-success">{{ $order->quantity }}</td>
                            <td class="fw-semibold text-success">{{ $order->total_amount }}</td>
                            <td><span class="badge-completed">{{ $order->status }}</span></td>
                            <td class="text-end">
                                <a href="{{ route('order.show', $order) }}" class="btn btn-outline-primary btn-sm btn-view">
                                    View
                                </a>
                                @if ($order->status == 'pending')
                                   <a href="{{ route('purchase.continuePurchase', $order) }}" class="btn btn-outline-primary btn-sm btn-view">
                                    Continue Payment
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    <div>
     {{ $orders->links('pagination::bootstrap-5') }}
    </div>
    </div>
</x-app-layout>
