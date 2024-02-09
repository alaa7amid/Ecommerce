<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class categoryController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = category::all();
        return view('admin.category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorCategoryRequest $request)
    {
        try{

            $validate = $request->validated();

            $category = new category();
            $category->name = ['ar'=>$request->name_ar , 'en'=>$request->name_en];
            $category->slug = $request->slug;
            $category->description = ['ar'=>$request->description_ar , 'en'=>$request->description_en];
            $category->is_showing = $request->is_showing ? '1' : '0';
            $category->is_popular = $request->is_popular ? '1' : '0';
            $category->meta_description = ['ar'=>$request->meta_description_ar , 'en'=>$request->meta_description_en];
            $category->meta_title = ['ar'=>$request->meta_title_ar ,'en'=>$request->meta_title_en];
            $category->meta_keywords = $request->meta_keywords;
            $category->image = $request->file('image')->store('public/assets/uploads/Category');
            $category->save();

            toastr()->success(trans("message_trans.success_save"), 'Congrats', ['timeOut' => 5000]);

            return redirect()->route('categories.index');

        }catch(\Exception $e){
            return redirect()->back()->withErrors('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = category::find($id);
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category= Category::find($id);
        return view('admin.category.edit',compact('category'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request,  category $category)
    {
        try{

            $validate = $request->validated();
            $image = $category->image;
            if ($request->hasFile('image')){
                Storage::delete($image);
                $image = $request->file('image')->store('public/assets/uploads/Category');

            }


            $category->update([
                'name' => ['ar'=>$request->name_ar , 'en'=>$request->name_en],
                'slug' => $request->slug,
                'description' => ['ar'=>$request->description_ar , 'en'=>$request->description_en],
                'is_showing' => $request->is_showing ? '1' : '0',
                'is_popular' => $request->is_popular ? '1' : '0',
                'meta_description' => ['ar'=>$request->meta_description_ar , 'en'=>$request->meta_description_en],
                'meta_title' => ['ar'=>$request->meta_title_ar ,'en'=>$request->meta_title_en],
                'meta_keywords' => $request->meta_keywords,
                'image' => $image,

            ]);


            toastr()->success(trans("message_trans.success_update"), 'Congrats', ['timeOut' => 5000]);

            return redirect()->route('categories.index');

        }catch(\Exception $e){
            return redirect()->back()->withErrors('error',$e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
