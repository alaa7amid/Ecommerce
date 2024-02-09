<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\updateProdectRequest;
use App\Models\category;
use App\Models\prodect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class prodectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $category = category::all();

        $prodects = prodect::all();

        return view('admin.prodect.index', compact('prodects','category'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = category::select('id','name')->get();
        return view('admin.prodect.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validate = $request->validate([
            'category_id'=>'required',
            'name_ar'=>'required',
            'name_en'=>'required',
            'slug'=>'required',
            'image'=>'required|image',
            'short_description_ar' =>'required',
            'short_description_en' =>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
            'price'=>'required',
            'selling_price'=>'required',
            'quantity'=>'required',
            'tax'=>'required',
            'meta_description_ar'=>'required',
            'meta_description_en'=>'required',
            'meta_keywords'=>'required'

        ]);

        $prodects = new prodect();
        $prodects->category_id = $request->category_id;
        $prodects->name = ['ar'=>$request->name_ar,'en'=>$request->name_en];
        $prodects->slug = $request->slug;
        $prodects->image = $request->file('image')->store('public/assets/uploads/prodect');
        $prodects->short_descriptioon = ['ar'=>$request->short_description_ar , 'en'=>$request->short_description_en];
        $prodects->description = ['ar'=>$request->description_ar ,'en'=>$request->description_en];
        $prodects->status = $request->status ?'1':'0';
        $prodects->trend = $request->trend ? '1' :'0';
        $prodects->price = $request->price;
        $prodects->selling_price = $request->selling_price;
        $prodects->quantity = $request->quantity;
        $prodects->tax = $request->tax;
        $prodects->meta_title = $request->meta_title;
        $prodects->meta_description = ['ar'=>$request->meta_description_ar ,'en'=>$request->meta_description_en];
        $prodects->meta_keywords = $request->meta_keywords;
        $prodects->save();

        toastr()->success(trans("message_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('prodects.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prodect = prodect::find($id);
        $categorys = category::select('id','name')->get();

        return view('admin.prodect.show',compact('prodect','categorys'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodect = prodect::find($id);
        $categorys = category::select('id','name')->get();
        return view('admin.prodect.edit', compact('prodect','categorys'));
    }

    /**updateProdectRequest
     * Update the specified resource in storage.
     */
    public function update(updateProdectRequest $request, string $id )
    {

        $prodect = prodect::find($id);

        $validate = $request->validated();

        $image = $prodect->image;

            if($request->hasFile('iamge')){
                Storage::delete($prodect->iamge);
                $image = $request->file('iamge')->store('public/assets/uploads/Product');
            }

            $prodect->update([
                'category_id'=>$request->category_id,
                'name'=>['ar' => $request->name_ar, 'en' => $request->name_en],
                'slug'=>$request->slug,
                'short_description'=>['ar' => $request->short_description_ar, 'en' => $request->short_description_en],
                'description'=>['ar' => $request->description_ar, 'en' => $request->description_en],
                'status'=>$request->status ? '1' : '0',
                'trend'=>$request->trend ? '1' : '0',
                'price'=>$request->price,
                'selling_price'=>$request->selling_price,
                'quantity'=>$request->quantity,
                'tax'=>$request->tax,
                'meta_title'=>$request->meta_title,
                'meta_description_ar'=>['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en],
                'meta_keywords'=>$request->meta_keywords,
                'image'=>$image,
        ]);

            return redirect()->route('prodects.index')->with('success', trans('message_trans.success_update'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodect = prodect::find($id);
        $prodect->delete();
        return redirect()->back();

    }
}
