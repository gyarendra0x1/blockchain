<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'manufacture_date' => 'required|date',
            'expiry_date' => 'required|date|after:manufacture_date',
            'brand'=>"required",
            'size'=>"required",
            'description'=>"required",
            "amount"=>"required"
        ])->validate();

        $product = Product::create($validatedData);

        $product->setHashAttribute();
        $product->save();

        $qrCode = QrCode::size(300)->generate(route('products.show', $product));

        return view('products.show', compact('product', 'qrCode'))->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        return view('products.show', compact('product'));
    }
    public function validateProduct(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'manufacture_date' => 'required|date',
            'expiry_date' => 'required|date|after:manufacture_date',
            'hash' => 'required'
        ])->validate();

        $product = Product::where('name', $validatedData['name'])
            ->where('manufacture_date', $validatedData['manufacture_date'])
            ->where('expiry_date', $validatedData['expiry_date'])
            ->first();

        if (!$product) {
        }
    }

            /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        // Return the edit view with the product data
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'nullable|string',
            'size' => 'nullable|string|max:50',
            'amount' => 'required|numeric|min:0',
            'manufacture_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after_or_equal:manufacture_date',
        ]);
        $product = Product::findOrFail($id);

        $product->name = $validatedData['name'];
        $product->brand = $validatedData['brand'];
        $product->description = $validatedData['description'];
        $product->size = $validatedData['size'];
        $product->amount = $validatedData['amount'];
        $product->manufacture_date = $validatedData['manufacture_date'];
        $product->expiry_date = $validatedData['expiry_date'];

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $imageName);
            $product->product_image = $imageName;
        }

        $product->save();
        return redirect()->route('products.show', $product->id)->with('success', 'Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        // Delete the product from the database
        $product->delete();

        // Redirect the user to the products index page
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

}
