<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Crude;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Products/Index', [
            'products' => Product::with('category')->with('crudes')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Products/Create', [
            'categories' => Category::all(),
            'crudes' => Crude::select(Crude::raw("*, '20' as crude_qty"))->with('unit')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $product = Product::create($request->validated());

            $crudes = $request->get('crudes');

            foreach ($crudes as $crude) {
                $product->crudes()->attach($crude['id'], [
                    'crude_qty' => $crude['crude_qty'],
                    'crude_price' => $crude['price'],
                ]);
            }

            return response()->json([
                'message' => 'Запись сохранена!'
            ]);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return \Inertia\Inertia::render('Products/Show', [
            'product' => $product->where('id', $product->id)->with('category', 'crudes')->first()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Inertia\Response
     */
    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => $product->where('id', $product->id)->with('crudes')->first(),
            'categories' => Category::all(),
            'crudes' => Crude::select(Crude::raw("*, '20' as crude_qty"))->with('unit')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {

        try {
            //DETACH CRUDES (CLEAR ALL EXISTED ATTACHMENTS)
            $product_crudes=$product->where('id', $product->id)->with('crudes')->first();
            foreach ($product_crudes->crudes as $crude) {
                $product->crudes()->detach($crude['id']);
            }


            //EDIT PRODUCT
            $product->update($request->validated());

            //ATTACH CRUDES
            $crudes = $request->get('crudes');

            foreach ($crudes as $crude) {
                $product->crudes()->attach($crude['id'], [
                    'crude_qty' => $crude['pivot']['crude_qty'],
                    'crude_price' => $crude['price'],
                ]);
            }

            return response()->json([
                'message' => 'Запись изменена!'
            ]);
        } catch (\Exception $e) {
            return response()->json($e);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        try {
            $product->delete();
            return response()->json(['message' => 'Запись удалена!']);
        } catch (\Exception $e) {
            return response()->json($e);
        }

    }
}
