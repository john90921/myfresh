<x-app-layout>
    <style>
        body {
            background-color: #f5f6fa;
        }

        .layout-wrapper {
            min-height: 100vh;
        }

        .sidebar {
            background-color: #ffffff;
            border-right: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 1.25rem;
        }

        .sidebar h6 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #374151;
        }

        .sidebar .nav-link {
            color: #4b5563;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            margin-bottom: 0.25rem;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #eef2ff;
            color: #4338ca;
        }

        .content-card,
        .ad-card {
            background: #ffffff;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .ad-card {
            text-align: center;
            color: #6b7280;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .product-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .product-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-4px);
        }

        .product-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: #f9fafb;
        }

        .product-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: #10b981;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .product-badge.sale {
            background: #ef4444;
        }

        .product-info {
            padding: 1rem;
        }

        .product-category {
            color: #6b7280;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #111827;
            margin: 0.5rem 0;
        }

        .product-description {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            margin-bottom: 0.75rem;
        }

        .stars {
            color: #fbbf24;
        }

        .rating-count {
            color: #6b7280;
            font-size: 0.875rem;
            margin-left: 0.25rem;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 0.75rem;
            border-top: 1px solid #e5e7eb;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #10b981;
        }

        .product-price .old-price {
            font-size: 1rem;
            color: #9ca3af;
            text-decoration: line-through;
            margin-left: 0.5rem;
        }

        .btn-add-cart {
            background: #4338ca;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: background 0.2s;
        }

        .btn-add-cart:hover {
            background: #3730a3;
        }

        .search-filter-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 200px;
        }

        .search-box input {
            width: 100%;
            padding: 0.625rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
        }

        .filter-select select {
            padding: 0.625rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
        }


        @media (max-width: 768px) {
            .sidebar {
                height: auto;
                position: relative;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 1rem;
            }

        }
    </style>

    <div class="container-fluid layout-wrapper">+
        <div class="row">

            {{-- Sidebar --}}
            <aside class="col-lg-2 col-md-3 sidebar">
                <h6>Product Categories</h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Citrus Fruits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Berries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tropical Fruits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Stone Fruits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Melons</a>
                    </li>
                </ul>
            </aside>

            {{-- Main Content --}}
            <main class="col-lg-10 col-md-6 py-4">
                <div class="content-card">
                    <div class="row">
                        <h5 class="mb-3 col-md-10">Fresh Fruits Collection</h5>
                        <h5 class="mb-3 col-md-2">
                            <a href="{{ route('product.addNewProductForm') }}" class="btn btn-primary">
                                add new product
                            </a>

                        </h5>
                    </div>
                    <div class="container">


                    </div>


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">description</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>



                                       <div class="d-flex gap-2">

    {{-- View --}}
    <a href="{{ route('product.show', $product) }}"
       class="btn btn-outline-info btn-sm">
        👁 View
    </a>

    {{-- Edit --}}
    <a href="{{ route('product.editProductForm', $product) }}"
       class="btn btn-outline-warning btn-sm">
        ✏️ Edit
    </a>
    {{-- Delete --}}
    <form action="{{ route('product.destroy', $product) }}"
          method="POST"
          onsubmit="return confirm('Are you sure you want to delete this product?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger btn-sm">
            🗑 Delete
        </button>
    </form>

</div>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                </div>

                {{-- <a href="{{ route('product.delete', parameters: $product->id) }}" class="btn btn-danger">Delete</a> --}}

                </table>
                <div class="d-flex justify-content-center pull-right">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
        </div>

        </main>



    </div>
    </div>
</x-app-layout>
