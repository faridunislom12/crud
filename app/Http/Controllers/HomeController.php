<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index() {
        $lastProducts = Product::where('is_active', true)->orderBy('id', 'desc')->limit(4)->get();
        $saleProducts = Product::where('sale', '<>', '0')->orderBy('id', 'desc')->limit(4)->get();
        $patrtners = Partner::where('is_active', true)->get();
        $sliders = Slider::where('is_active', true)->orderBy('id', 'desc')->limit(3)->get();
        return Inertia::render('Home/Index', [
            'lastProducts'=> $lastProducts,
            'saleProducts'=> $saleProducts,
            'patrtners'=> $patrtners,
            'sliders'=> $sliders,
        ]);
    }

    public function repairs() {
        return Inertia::render('Home/Repairs');
    }

    public function repairsBid(Request $request) {
        $this->validate($request, [
            'name'=> 'required',
            'type'=> 'required',
            'phone'=> 'required',
            'image'=> 'required',
        ]);

        if ($request->file('image')){
            $file = $request->file('image')->store('posts', ['disk' => 'public']);
        }

        Bid::create([
            'name'=> $request->name,
            'type'=> $request->type,
            'phone'=> $request->phone,
            'image'=> $file,
        ]);

        return response()->json([
            'message'=> 'Ваша заявка принята'
        ]);
    }

    public function partnerBid(Request $request) {
        $this->validate($request, [
            'name'=> 'required',
            'phone'=> 'required',
            'city'=> 'required',
        ]);


        Bid::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'city'=> $request->city,
            'type'=> 2,
        ]);

        return response()->json([
            'message'=> 'Ваша заявка принята'
        ]);
    }

    public function about() {
        $category = Category::where('resource', 'about')->first();
        return Inertia::render('Home/About', [
            'about'=> Post::whereHas('categories',function ($q) use ($category){
                $q->where('category_id', $category->id);
             })->where('is_active', true)->latest()->first()
        ]);
    }

    public function massMedia() {
        $category = Category::where('resource', 'mass')->first();
        return Inertia::render('Home/MassMedia', [
            'news'=> Post::whereHas('categories',function ($q) use ($category){
                $q->where('category_id', $category->id);
             })->where('is_active', true)->latest()->get()
        ]);
    }
}
