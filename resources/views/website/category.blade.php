@extends('website.master')

@section('title')
    {{$category->slug}}
@endsection

@section('css')
    
@endsection

@section('content')

    <div class="row py-1 bg-warning" >
    <nav aria-label="breadcrumb" class="mx-5">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('getCategories')}}">{{trans('website_trans.categories')}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$category->slug}}</li>
        </ol>
      </nav>


    </div>

<div class="py-5">
    <div class="container">
        <div class="card mb-3" >
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{Storage::url($category->image)}}" class="img-fluid rounded-start"  alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$category->name}}</h5>
                  <p class="card-text">{{$category->description}}</p>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h3>{{trans('website_trans.prodects')}}</h3>

@foreach ($category->prodects as $prodect)
            <div class="row">
                <div class="col-4">
                    <div class="card my-5" style="width: 18rem;">
                        <a href="{{route('getProdectBySlug',[$prodect->category->slug,$prodect->slug])}}"><img class="card-img-top" src="{{Storage::url($prodect->image)}}" alt="Card image cap"></a>
                        <div class="card-body">
                        <h5 class="card-title">{{$prodect->meta_title}}</h5>
                        <p class="card-text">{{$prodect->meta_description}}</p>
                        <p class="card-text">{{$prodect->selling_price}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
                
</div>

@endsection

@section('js')
    
@endsection