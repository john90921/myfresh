<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
    */

    public function deleteImage($productId){
        $product = Product::findOrFail($productId);
        $product->image = null;
        $product->save();
        return redirect()->back()->with("success", "Product image deleted successfully.");
    }
    public function index()
    {
        $products = Product::with('packages')->latest()->paginate(9);
        return view('product.productList', compact('products'));
    }

    public function productListAdmin()
    {
        $products = Product::with('packages')->latest()->paginate(8);
        return view('product.admin.productList', compact('products'));
    }

    public function checkOut(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'package_id' => 'required|exists:packages,id',
            'quantity' => 'required|integer|min:1',
        ]);
        $product = Product::find($request->product_id); // Retrieve product
        $package = $product->packages()->find($request->package_id); // Retrieve selected package
        $quantity = $request->quantity; // Retrieve quantity

    session(
            [
                'product' => $product,
                'package' => $package,
                'quantity' => $quantity,
            ]
        );
        return redirect()->route('order.orderDetailForm');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        try{
        $request->validated();

        if($request->hasFile('image')){
        $uploadFolder = 'products';
        $image = $request->file('image');
        $imagePath = $image->store($uploadFolder, 'public');
        }


      $product = Product::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
            ]
        );

           $product->packages()->createMany($request->package);

        return redirect()->route('product.productListAdmin')->with('success', 'Product created successfully.');
    }
    catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while saving the product: ' . $e->getMessage()); // Redirect back()->with(['error' => 'An error occurred while saving the product: ' . $e->getMessage()]);
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $packages = $product->packages()->get(); // Retrieve related packages
        return view('product.productDetail', compact('product','packages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, Product  $product)
    {
        $request->validated();
        try{
        if($request->hasFile('image')){
            $uploadFolder = 'products';
            $image = $request->file('image');
            $imagePath = $image->store($uploadFolder, 'public');
            $product->image = $imagePath;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        //update packages
        $product->packages()->delete(); // Delete existing packages
        $product->packages()->createMany($request->package); // Create new packages
        return redirect()->route('product.productListAdmin')->with('success', 'Product updated successfully.');


        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the product: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.productListAdmin')->with('success', 'Product deleted successfully.');
    }
}
