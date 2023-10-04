<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Product;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('categorie')->get();
        return view('dashborde.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::where('is_active', true)->get();

        return view('dashborde.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator($request->all(), [
            'title' => 'required|min:3|max:30|string|unique:products,title',
            'description' => 'required|min:10|max:300',
            'prise' => 'required|integer',
            'quantity' => 'required|integer',
            'categories_id' => 'required|string|exists:categories,id'

        ]);
        if (!$validator->fails()) {
            $product = new Product();
            $product->title = $request->get('title');
            $product->description = $request->get('description');
            $product->prise = $request->get('prise');
            $product->quantity = $request->get('quantity');
            $product->categories_id = $request->get('categories_id');
            $isSaved = $product->save();
            if ($isSaved) {
                return response()->json([
                    ['message' => 'Product saved succesfully'],
                ], 200);
            } else {
                return response()->json([
                    ['message' => 'Product saved Failed'],
                ], 500);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Categorie::all();
        return view('dashborde.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator($request->all(), [
            'title' => 'required|min:3|max:30|string|unique:products,title,$product->id',
            'description' => 'required|min:10|max:300',
            'prise' => 'required|integer',
            'quantity' => 'required|integer',
            'categories_id' => 'required|string|exists:categories,id'

        ]);
        if (!$validator->fails()) {
            $product->title = $request->get('title');
            $product->description = $request->get('description');
            $product->prise = $request->get('prise');
            $product->quantity = $request->get('quantity');
            $product->categories_id = $request->get('categories_id');
            $isSaved = $product->save();
            if ($isSaved) {
                return response()->json([
                    ['message' => 'Product saved succesfully'],
                ], 200);
            } else {
                return response()->json([
                    ['message' => 'Product saved Failed'],
                ], 500);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $is_Deleted = $product->delete();
        
        if ($is_Deleted) {
            return response()->json([
                ['message' => 'Product saved succesfully'],
            ], 200);
        } else {
            return response()->json([
                ['message' => 'Product saved Failed'],
            ], 400);
        }
    }
}