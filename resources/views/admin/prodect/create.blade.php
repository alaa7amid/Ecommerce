@extends('admin.master')
@section('title')
{{trans('admin_title_page_trans.Title_create_prodect')}}
@endsection


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">

        <form action="{{route('prodects.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label for="name_ar">{{trans('prodect_trans.category')}}</label>
                <select name="category_id" id="" class="form-control">
                    <option value="">{{trans('prodect_trans.please_select')}}</option>
                    @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <label for="name_ar">{{trans('prodect_trans.name_ar')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{old('name_ar')}}">
                    </div>
                    @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="name_en">{{trans('prodect_trans.name_en')}}</label>
                    <div class="input-group mb-3 col">
                        <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{old('name_en')}}">

                    </div>
                    @error('name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="slug">{{trans('prodect_trans.slug')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug" value="{{old('slug')}}">
                    </div>
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="image">{{trans('prodect_trans.image')}}</label>
                    <div class="input-group mb-3 col">
                        <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" value="{{old('image')}}" >
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <label for="short_description_ar">{{trans('prodect_trans.short_description_ar')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description_ar" rows="3" cols="3"
                                  class="form-control @error('short_description_ar') is-invalid @enderror">{{old('short_description_ar')}}</textarea>
                    </div>
                    @error('short_description_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="short_description_en">{{trans('prodect_trans.short_description_en')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description_en" rows="3" cols="3"
                                  class="form-control @error('short_description_en') is-invalid @enderror">{{old('short_description_en')}}</textarea>
                    </div>
                    @error('short_description_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="description_ar">{{trans('prodect_trans.description_ar')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_ar" rows="3" cols="3"
                                  class="form-control @error('description_ar') is-invalid @enderror">{{old('description_ar')}}</textarea>
                    </div>
                    @error('description_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="description_en">{{trans('prodect_trans.description_en')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_en" rows="3" cols="3"
                                  class="form-control @error('description_en') is-invalid @enderror">{{old('description_en')}}</textarea>
                    </div>
                    @error('description_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="status">{{trans('prodect_trans.Status')}}</label>
                    <div class="input-group mb-3">
                        <input type="checkbox" class="" id="status" name="status">
                    </div>

                </div>
                <div class="col">
                    <label for="trend">{{trans('prodect_trans.Trend')}}</label>
                    <div class="input-group mb-3 col">
                        <input type="checkbox" class="" id="trend" name="trend">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="price">{{trans('prodect_trans.price')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="price"
                               class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="selling_price">{{trans('prodect_trans.selling_price')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="selling_price"
                               class="form-control @error('selling_price') is-invalid @enderror" value="{{old('selling_price')}}">
                    </div>
                    @error('selling_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="qty">{{trans('prodect_trans.quantity')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="quantity"
                               class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity')}}">
                    </div>
                    @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="tax">{{trans('prodect_trans.tax')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="tax"
                               class="form-control @error('tax') is-invalid @enderror" value="{{old('tax')}}">
                    </div>
                    @error('tax')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="meta_title">{{trans('prodect_trans.meta_title')}}</label>
                    <div class="input-group mb-3">
                    <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{old('meta_title')}}">
                    </div>
                    @error('meta_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="meta_description_ar">{{trans('prodect_trans.meta_description_ar')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="meta_description_ar" rows="3" cols="3"
                              class="form-control @error('meta_description_ar') is-invalid @enderror">{{old('meta_description_ar')}}</textarea>
                    </div>
                    @error('meta_description_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="meta_description_en">{{trans('prodect_trans.meta_description_en')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="meta_description_en" rows="3" cols="3"
                              class="form-control @error('meta_description_en') is-invalid @enderror">{{old('meta_description_en')}}</textarea>
                    </div>
                    @error('meta_description_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="meta_keywords">{{trans('prodect_trans.meta_keyword')}}</label><span
                        class="text-danger">**{{trans('prodect_trans.meta_keyword_note')}}</span>
                    <div class="input-group mb-3">
                    <textarea name="meta_keywords" rows="3" cols="3"
                              class="form-control @error('meta_keywords') is-invalid @enderror">{{old('meta_keywords')}}</textarea>
                    </div>
                    @error('meta_keywords')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary">{{trans('button_trans.Save')}}</button>
        </form>
    </div>


@endsection


@section('css')
@endsection


@section('js')
@endsection

@section('title_page')
{{trans('admin_title_page_trans.Title_create_prodect')}}
@endsection
