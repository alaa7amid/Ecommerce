@extends('admin.master')
@section('title')
{{trans('admin_title_page_trans.Title_show_prodect')}}
@endsection


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">
            <div class="row">
                <label for="name_ar">{{trans('prodect_trans.category')}}</label>
                <input type="text" readonly class="form-control" value="{{$prodect->category->name}}">
            </div>
            <div class="row">
                <div class="col">
                    <label for="name_ar">{{trans('prodect_trans.name_ar')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" readonly name="name_ar" value="{{$prodect->getTranslation('name','ar')}}">
                    </div>
                </div>
                <div class="col">
                    <label for="name_en">{{trans('prodect_trans.name_en')}}</label>
                    <div class="input-group mb-3 col">
                        <input type="text" class="form-control" readonly name="name_en" value="{{$prodect->getTranslation('name','en')}}">
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="slug">{{trans('prodect_trans.slug')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="slug" readonly value="{{$prodect->slug}}">
                    </div>

                </div>
                <div class="col">
                    <label for="image">{{trans('prodect_trans.image')}}</label>
                    <div class="input-group mb-3 col">
                        <img src="{{Storage::url($prodect->image)}}" alt="" class="img-thumbnail" style="width: 50px; height: 50px;">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <label for="short_description_ar">{{trans('prodect_trans.short_description_ar')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description_ar" rows="3" cols="3" readonly
                                  class="form-control">{{$prodect->getTranslation('short_descriptioon','ar')}}</textarea>
                    </div>
                </div>
                <div class="col">
                    <label for="short_description_en">{{trans('prodect_trans.short_description_en')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description_en" rows="3" cols="3" readonly
                                  class="form-control">{{$prodect->getTranslation('short_descriptioon','en')}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="description_ar">{{trans('prodect_trans.description_ar')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_ar" rows="3" cols="3" readonly
                                  class="form-control">{{$prodect->getTranslation('description','ar')}}</textarea>
                    </div>
                </div>
                <div class="col">
                    <label for="description_en">{{trans('prodect_trans.description_en')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_en" rows="3" cols="3" readonly
                                  class="form-control">{{$prodect->getTranslation('description','en')}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="status">{{trans('prodect_trans.Status')}}</label>
                    <div class="input-group mb-3">
                        @if($prodect->status == 1)
                        <span class="badge badge-success">{{trans('prodect_trans.showing')}}</span>
                    @else 
                        <span class="badge badge-danger">{{trans('prodect_trans.hidden')}}</span>
                    @endif
                    </div>

                </div>
                <div class="col">
                    <label for="trend">{{trans('prodect_trans.Trend')}}</label>
                    <div class="input-group mb-3 col">
                        @if($prodect->trend == 1)
                        <span class="badge badge-success">{{trans('prodect_trans.Trend')}}</span>
                    @else
                        <span class="badge badge-danger">{{trans('prodect_trans.NO_Trend')}}</span>
                    @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="price">{{trans('prodect_trans.price')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="price"
                               class="form-control" readonly value="{{$prodect->price}}">
                    </div>

                </div>
                <div class="col">
                    <label for="selling_price">{{trans('prodect_trans.selling_price')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="selling_price"
                               class="form-control" readonly value="{{$prodect->selling_price}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="qty">{{trans('prodect_trans.quantity')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="quantity"
                               class="form-control" readonly value="{{$prodect->quantity}}">
                    </div>
                </div>
                <div class="col">
                    <label for="tax">{{trans('prodect_trans.tax')}}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="tax"
                               class="form-control" readonly value="{{$prodect->tax}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="meta_title">{{trans('prodect_trans.meta_title')}}</label>
                    <div class="input-group mb-3">
                    <input type="text" name="meta_title" class="form-control" readonly value="{{$prodect->meta_title}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="meta_description_ar">{{trans('prodect_trans.meta_description_ar')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="meta_description_ar" rows="3" cols="3" readonly
                              class="form-control">{{$prodect->getTranslation('meta_description','ar')}}</textarea>
                    </div>
                </div>
                <div class="col">
                    <label for="meta_description_en">{{trans('prodect_trans.meta_description_en')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="meta_description_en" rows="3" cols="3" readonly
                              class="form-control">{{$prodect->getTranslation('meta_description','en')}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="meta_keywords">{{trans('prodect_trans.meta_keyword')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="meta_keywords" rows="3" cols="3" readonly
                              class="form-control">{{$prodect->meta_keywords}}</textarea>
                    </div>
                </div>
            </div>


    </div>


@endsection


@section('css')
@endsection


@section('js')
@endsection

@section('title_page')
{{trans('admin_title_page_trans.Title_show_prodect')}}
@endsection
