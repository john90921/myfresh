@extends('layouts.admin.app')

@section('content')

    <div class="container-fluid px-4 py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0">Dashboard</h1>
                <p class="text-muted mb-0">Welcome back, Admin!</p>
            </div>
            <div>
                <button class="btn btn-primary">
                    <i class="bi bi-download"></i> Export Report
                </button>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Total Users</p>
                                <h3 class="mb-0">1,234</h3>
                                <small class="text-success"><i class="bi bi-arrow-up"></i> 12% from last month</small>
                            </div>
                            <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Total Products</p>
                                <h3 class="mb-0">567</h3>
                                <small class="text-success"><i class="bi bi-arrow-up"></i> 8% from last month</small>
                            </div>
                            <div class="stat-icon bg-success bg-opacity-10 text-success">
                                <i class="bi bi-box-seam"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Total Orders</p>
                                <h3 class="mb-0">890</h3>
                                <small class="text-danger"><i class="bi bi-arrow-down"></i> 3% from last month</small>
                            </div>
                            <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                                <i class="bi bi-cart-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Total Revenue</p>
                                <h3 class="mb-0">$45,678</h3>
                                <small class="text-success"><i class="bi bi-arrow-up"></i> 15% from last month</small>
                            </div>
                            <div class="stat-icon bg-info bg-opacity-10 text-info">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Tables -->
        <div class="row g-4">
            <!-- Recent Orders -->
            <div class="col-lg-8">
                <div class="chart-container">
                    <h5 class="mb-3">Recent Orders</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#12345</td>
                                    <td>John Doe</td>
                                    <td>Product A</td>
                                    <td>$299</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>2025-12-28</td>
                                </tr>
                                <tr>
                                    <td>#12346</td>
                                    <td>Jane Smith</td>
                                    <td>Product B</td>
                                    <td>$450</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>2025-12-27</td>
                                </tr>
                                <tr>
                                    <td>#12347</td>
                                    <td>Mike Johnson</td>
                                    <td>Product C</td>
                                    <td>$199</td>
                                    <td><span class="badge bg-info">Processing</span></td>
                                    <td>2025-12-27</td>
                                </tr>
                                <tr>
                                    <td>#12348</td>
                                    <td>Sarah Wilson</td>
                                    <td>Product D</td>
                                    <td>$350</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>2025-12-26</td>
                                </tr>
                                <tr>
                                    <td>#12349</td>
                                    <td>Tom Brown</td>
                                    <td>Product E</td>
                                    <td>$599</td>
                                    <td><span class="badge bg-danger">Cancelled</span></td>
                                    <td>2025-12-26</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Activity -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="chart-container mb-4">
                    <h5 class="mb-3">Quick Actions</h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary text-start">
                            <i class="bi bi-plus-circle me-2"></i> Add New Product
                        </button>
                        <button class="btn btn-outline-success text-start">
                            <i class="bi bi-person-plus me-2"></i> Add New User
                        </button>
                        <button class="btn btn-outline-info text-start">
                            <i class="bi bi-file-text me-2"></i> Generate Report
                        </button>
                        <button class="btn btn-outline-warning text-start">
                            <i class="bi bi-gear me-2"></i> System Settings
                        </button>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="chart-container">
                    <h5 class="mb-3">Recent Activity</h5>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2">
                                        <i class="bi bi-cart-plus"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 small">New order #12345</p>
                                    <small class="text-muted">2 minutes ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-2">
                                        <i class="bi bi-person-check"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 small">New user registered</p>
                                    <small class="text-muted">15 minutes ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-2">
                                        <i class="bi bi-box-seam"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 small">Product updated</p>
                                    <small class="text-muted">1 hour ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


