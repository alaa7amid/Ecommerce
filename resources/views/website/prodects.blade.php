@extends('website.master')
@section('title')
    {{trans('website_title_trans.prodects_title')}}
@endsection

@section('content')
 
<div class="py-5">
    <div class="contener">
        <h3 class="text-center">{{trans('website_trans.prodects')}}</h3>
            
            <div class="row">
                    @foreach ($prodects as $prodect)
                        <div class="col-md-3">
                            <div class="card my-5" style="width: 18rem;">
                                <img class="card-img-top" src="{{Storage::url($prodect->image)}}" alt="Card image cap">
                                <div class="card-body">
                                <h5 class="card-title">{{$prodect->meta_title}}</h5>
                                <p class="card-text">{{$prodect->meta_description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
                
            
    </div>
</div>

<hr>



 

    
@endsection