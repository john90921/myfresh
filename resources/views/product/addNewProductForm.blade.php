<x-app-layout>
    <style>
        .product-form-container {
            background: linear-gradient(135deg, #fdfdff 0%, #f8f8f8 100%);
            min-height: 100vh;
            padding: 60px 20px;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h2 {
            color: #667eea;
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #6c757d;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
            display: block;
            font-size: 0.95rem;
            text-transform: capitalize;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            outline: none;
        }

        .package-section {
            background: #f7fafc;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            border: 2px solid #e2e8f0;
        }

        .package-section-title {
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 20px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }

        .package-section-title i {
            margin-right: 10px;
            color: #fcfdfe;
        }

        .package-item {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            border: 2px solid #e2e8f0;
            position: relative;
            transition: all 0.3s ease;
        }

        .package-item:hover {
            border-color: #ffffff;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.1);
        }

        .package-number {
            position: absolute;
            top: -12px;
            left: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: rgb(255, 255, 255);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .input-group-custom {
            margin-bottom: 15px;
        }

        .input-group-custom:last-child {
            margin-bottom: 0;
        }

        .input-icon {
            color: #667eea;
            margin-right: 8px;
        }

        .btn-delete {
            background: linear-gradient(135deg, #f56565 0%, #c53030 100%);
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(245, 101, 101, 0.4);
        }

        .btn-add-package {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 15px;
        }

        .btn-add-package:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.4);
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 15px 40px;
            font-weight: 700;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 30px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            cursor: pointer;
        }

        .row-package {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
        }

        @media (max-width: 768px) {
            .form-card {
                padding: 25px;
            }

            .row-package {
                grid-template-columns: 1fr;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>

    <div class="product-form-container">
        <div class="form-card">
            <div class="form-header">
                <h2>✨ Add New Product</h2>
                <p>Fill in the details below to create a new product</p>
            </div>

            <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="form-group">
                    <label for="name">📦 Product Name</label>
                    <input value="sad" type="text" class="form-control" id="name" placeholder="Enter product name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="description">📝 Description</label>
                    <textarea value="sad" class="form-control" id="description" placeholder="Enter product description" name="description" rows="4" required></textarea>
                </div>

                <div x-data="{ packages: [{name:'', price:0, quantity:0,description:''}] }" class="package-section">
                    <div class="package-section-title">
                        📦 Product Packages
                    </div>

                    <template x-for="(package, index) in packages" :key="index">
                        <div class="package-item">
                            <div class="package-number" x-text="`Package ${index + 1}`"></div>

                            <div class="input-group-custom">
                                <label :for="`package-name-${index}`" class="form-label">Package Name</label>
                                <input
                                    type="text"
                                    :name="`package[${index}][name]`"
                                    :id="`package-name-${index}`"
                                    :value="package.name"
                                    class="form-control"
                                    placeholder="e.g., Basic, Premium, Enterprise"
                                    x-model="package.name"
                                    required>
                            </div>

                            <div class="row-package">
                                <div class="input-group-custom">
                                    <label :for="`package-price-${index}`" class="form-label">💰 Price (RM)</label>
                                    <input
                                        type="number"
                                        :name="`package[${index}][price]`"
                                        :id="`package-price-${index}`"
                                        :value="package.price"
                                        class="form-control"
                                        placeholder="0.00"
                                        x-model="package.price"
                                        step="0.01"
                                        min="0"
                                        required>
                                </div>

                                <div class="input-group-custom">
                                    <label :for="`package-quantity-${index}`" class="form-label">📊 Quantity</label>
                                    <input
                                        type="number"
                                        :name="`package[${index}][quantity]`"
                                        :id="`package-quantity-${index}`"
                                        :value="package.quantity"
                                        class="form-control"
                                        placeholder="0"
                                        x-model="package.quantity"
                                        min="0"
                                        required>
                                </div>
                                   <div class="input-group-custom">
                                    <label :for="`package-description-${index}`" class="form-label">Description</label>
                                    <input
                                        type="text"
                                        :name="`package[${index}][description]`"
                                        :id="`package-description-${index}`"
                                        :value="package.description"
                                        class="form-control"
                                        placeholder="Description"
                                        x-model="package.description"
                                        required>
                                </div>

                                <div class="input-group-custom" x-show="packages.length > 1">
                                    <label class="form-label" style="opacity: 0;">Action</label>
                                    <button
                                        type="button"
                                        class="btn-delete"
                                        @click="packages.splice(index, 1)"
                                        x-show="index > 0">
                                        🗑️ Delete
                                    </button>
                                </div>
                            </div>
                    </div>
                    </template>

                    <button
                        type="button"
                        class="btn-add-package"
                        @click="packages.push({name:'', price:0, quantity:0}); console.log(packages)">
                        ➕ Add Another Package
                    </button>
                </div>

                <div class="form-group">
                    <label for="image">🖼️ Product Image</label>
                    <div class="file-input-wrapper">
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    🚀 Create Product
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
