<x-app-layout>

    <style>
        .product-section {
            padding: 50px 0;
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            min-height: 100vh;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.18);
        }

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f8f9fa;
        }

        .product-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-image:hover {
            transform: scale(1.08);
        }

        .product-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: #5cb85c;
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 10px rgba(92, 184, 92, 0.4);
        }

        .product-content {
            padding: 40px;
        }

        .product-category {
            color: #5cb85c;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .product-title {
            font-size: 32px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .product-rating {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .stars {
            color: #ffc107;
            font-size: 16px;
            margin-right: 8px;
        }

        .rating-count {
            color: #6c757d;
            font-size: 14px;
        }

        .product-price {
            font-size: 36px;
            color: #5cb85c;
            font-weight: bold;
            margin: 25px 0;
        }

        .price-original {
            font-size: 20px;
            color: #999;
            text-decoration: line-through;
            margin-left: 10px;
        }

        .product-desc {
            color: #555;
            line-height: 1.8;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .product-features {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            padding: 8px 0;
            color: #495057;
            font-size: 14px;
        }

        .feature-icon {
            color: #5cb85c;
            margin-right: 10px;
            font-weight: bold;
        }

        .quantity-section {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .quantity-label {
            font-weight: 600;
            color: #2c3e50;
            margin-right: 15px;
        }

        .quantity-control {
            display: inline-flex;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            overflow: hidden;
        }

        .qty-btn {
            background: white;
            border: none;
            padding: 10px 18px;
            cursor: pointer;
            font-size: 20px;
            color: #5cb85c;
            font-weight: bold;
            transition: all 0.2s;
        }

        .qty-btn:hover {
            background: #5cb85c;
            color: white;
        }

        .qty-input {
            width: 60px;
            text-align: center;
            border: none;
            border-left: 2px solid #e9ecef;
            border-right: 2px solid #e9ecef;
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
        }

        .btn-cart {
            background: linear-gradient(135deg, #5cb85c, #4cae4c);
            color: white;
            border: none;
            padding: 16px 35px;
            font-size: 17px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(92, 184, 92, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-cart:hover {
            background: linear-gradient(135deg, #4cae4c, #449d44);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(92, 184, 92, 0.4);
        }

        .btn-cart:active {
            transform: translateY(0);
        }

        .product-detail-section {
            margin-top: 30px;
        }

        .product-detail {
            padding: 35px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        }

        .product-detail h3 {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid #5cb85c;
        }

        .product-detail p {
            color: #555;
            line-height: 1.8;
            font-size: 15px;
        }

        .detail-list {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .detail-list li {
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
            color: #495057;
            font-size: 15px;
        }

        .detail-list li:last-child {
            border-bottom: none;
        }

        .detail-list strong {
            color: #2c3e50;
            display: inline-block;
            min-width: 120px;
        }

        @media (max-width: 768px) {
            .product-image {
                height: 300px;
            }

            .product-content {
                padding: 25px;
            }

            .product-title {
                font-size: 24px;
            }

            .product-price {
                font-size: 28px;
            }

            .product-detail {
                padding: 25px;
            }
        }

        .package-select {
            border: 2px solid #e9ecef;
            border-radius: 8px;

            padding: 20px 30px;
            font-size: 16px;
            color: #2c3e50;

        }
        .image{
            max-width: 100%;
            height: auto;
        }
    </style>
    <div class="product-section" x-data="product" data-pakages ="{{ json_encode($packages) }}">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                     {{-- Form for redirect to Checkout --}}
                    <form action="{{ route('product.checkout') }}" method="Post">
                    @csrf
                    <div class="product-card">
                        <div class="row">
                            <div class="col-sm-6 d-flex align-items-center justify-content-center">
                                <div class="product-image-wrapper">
                                    <span class="product-badge">Fresh</span>
                                    <img class="image" src="{{ asset("storage/".$product->image) }}" alt="Fresh Fruits" class="product-image">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="product-content">

                                {{-- hidden input to pass product id to checkout --}}
                                <input type="text" name="product_id" id="product_id" value="{{ $product->id }}" hidden>

                                {{-- product name --}}
                                <h2 class="product-title">{{ $product->name }}</h2>
                                    {{-- Price package --}}
                                <div class="product-price" x-text="'RM ' + price "></div>

                                    {{-- package description --}}
                                    <p class="product-desc" x-text="description"></p>

                                    {{-- package selection --}}
                                    <div class="quantity-section">
                                        <span class="quantity-label">Package:</span>
                                        <div class="quantity-control">

                                            <select name="package_id" id="package_id" class="package-select" x-model="selectedPackage" @change="selectPackage">
                                                @foreach ($packages as $package )
                                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- stock for each package --}}
                                    <div class="quantity-section">
                                        <span class="quantity-label">Stock:</span>
                                        <div>
                                           <span x-text="quantity"></span> available
                                        </div>
                                    </div>
                                    {{-- Quantity of user input --}}
                                    <div class="quantity-section">
                                        <span class="quantity-label">Quantity:</span>
                                        <div class="quantity-control">
                                            <a class="qty-btn" @click="decreaseQty()">−</a>
                                            <input name="quantity" type="number" class="qty-input" id="qty"
                                                min="1" :max="quantity" @change ="validate()" x-model="inputQuantity" :value="inputQuantity">
                                            <a class="qty-btn" @click="increaseQty()">+</a>
                                        </div>
                                    </div>
                                    <div x-show="submitDisabled" class="text-danger">
                                        the product is out of stock, please select another package.
                                    </div>
                                    <button class="btn-cart" :disabled="submitDisabled" >order now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="product-detail-section">
                        <div class="product-detail">
                            <h3>Product Details</h3>
                            <p>
                                Our premium selection of fresh fruits is handpicked daily to ensure you receive
                                the highest quality produce. Each fruit is carefully inspected for ripeness,
                                flavor, and nutritional value.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        document.addEventListener('alpine:init', () => {
            Alpine.data('product', () => ({
                price: 0, //price for each package
                description:'', //description for each package
                quantity: 0, //stock for each package
                selectedPackage: 0, // selected package id after user select
                packages: [], //all packages data
                submitDisabled:false,
                inputQuantity:1,
                submitabled:true,

                validateAvailableStock:false,
                warning:{},

                init() { //initialize the package data
                    const el = this.$el;

                    this.packages = JSON.parse(el.dataset.pakages);
                    this.price = this.packages[0].price;
                    this.description = this.packages[0].description;
                    this.quantity = this.packages[0].quantity;
                    if(this.packages[0].quantity == 0 ){
                        this.submitDisabled = true;
                    }
                    this.selectedPackage = this.packages[0].id;
                },
                decreaseQty(){
                    if(this.inputQuantity > 1){
                        this.inputQuantity--;
                    }
                },
                increaseQty(){
                      if(this.inputQuantity < this.quantity){
                        this.inputQuantity++;
                    }
                },
                validate(){
                    if(this.inputQuantity < 1 && this.quantity > 0){
                        this.inputQuantity = 1;
                    }
                    if(this.inputQuantity > this.quantity){
                        this.inputQuantity = this.quantity;
                    }
                },
                selectPackage(){

                    const selected = this.packages.find(pkg => pkg.id == this.selectedPackage);
                    if(selected){
                        this.submitDisabled =  selected.quantity == 0;
                        this.price = selected.price;
                        this.description = selected.description;
                        this.quantity = selected.quantity;
                    }

                }

            }))
        })
    </script>
</x-app-layout>
