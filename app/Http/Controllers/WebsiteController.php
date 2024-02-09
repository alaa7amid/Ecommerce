<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\prodect;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::where('is_popular',1)->select('id','meta_title','meta_description','image','slug')->get();
        $prodects = prodect::where('trend',1)->select('id','meta_title','meta_description','selling_price','image','tax','slug','category_id')->get();
        return view('website.index',compact('categories','prodects'));
        
    }

    public function getCategories()
    {
        $categories = category::where('is_showing',1)->get();
        return view('website.categories',compact('categories'));
    }


    public function getcategoryBySlug($slug)
    {
        $category = category::with('prodects')->where('slug', $slug)->where('is_showing', 1)->first();
    
        if ($category) {
            return view('website.category', compact('category'));
        } else {
            return redirect('/')->with('error', 'the slug not found');
        }
    }
    




    public function getProdectBySlug($cataegory_slug ,$prodect_slug)
{
    if (category::where('slug',$cataegory_slug))
    {
        if (prodect::where('slug',$prodect_slug)) {
            $prodects = prodect::with('category')->where('slug',$prodect_slug)->first();
            return view('website.product',compact('prodects'));
        } else {
            return redirect('/')->with('error', 'the slug not found');
        }
        
    } 
    else
    {
        return redirect('/')->with('error', 'the slug not found');
    }
}

public function getProdects()
    {
        $prodects = prodect::where('status',1)->get();
        return view('website.prodects',compact('prodects'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
