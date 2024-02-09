@extends('website.master')
@section('title')
    {{trans('website_title_trans.categories_title')}}
@endsection

@section('content')
 
<div class="py-5">
    <div class="contener">
        <h3 class="text-center">{{trans('website_trans.categories')}}</h3>
            
            <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-3">
                            <div class="card my-5" style="width: 18rem;">
                                <a href="{{ route('getcategoryBySlug', $category->slug) }}"><img class="card-img-top" src="{{Storage::url($category->image)}}" alt="Card image cap"></a>
                                <div class="card-body">
                                <h5 class="card-title">{{$category->meta_title}}</h5>
                                <p class="card-text">{{$category->meta_description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
                 
            
    </div>
</div>

<hr>



 

    
@endsection