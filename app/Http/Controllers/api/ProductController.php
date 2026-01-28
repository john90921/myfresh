<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
    */


    public function index()
    {
        try{
        $products = Product::with('packages')->latest()->paginate(9);
        return response()->json([
            'success' => true,
            'data' => $products
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while retrieving products: ' . $e->getMessage()
        ], 500);
    }
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

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully.',
            'data' => $product
        ], 201);
    }
    catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while saving the product: ' . $e->getMessage()
        ], 500);
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(int $productID)
    {
// Retrieve related packages
 try{
    $product = Product::with('packages')->findOrFail($productID);
    return response()->json([
        'success' => true,
        'data' => $product
    ], 200);

        $packages = $product->packages()->get();
        return response()->json([
            'success' => true,
            'data' => [
                'product' => $product,
                'packages' => $packages
            ]
        ], 200);
 } catch (\Exception $e) {
    return response()->json([
        'success' => false,
        'message' => 'An error occurred while retrieving the product details: ' . $e
            ->getMessage()
    ], 500);
    }
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
    public function destroy(int $productID)
    {
       try{
        $product = Product::findOrFail($productID);
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.'
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while deleting the product: ' . $e->getMessage()
        ], 500);
    }
    }
}
