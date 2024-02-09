@extends('website.master')
@section('title')
    {{trans('website_trans.product')}}
@endsection

@section('content')
  <input type="hidden" value="{{$prodects->quantity}}" id="qty">


<div class="row py-1 bg-warning" >
  <nav aria-label="breadcrumb" class="mx-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('getCategories')}}">{{trans('website_trans.categories')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('getProdects')}}">{{trans('website_trans.prodects')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$prodects->category->slug}}</li>
        <li class="breadcrumb-item active" aria-current="page">{{$prodects->slug}}</li>
      </ol>
    </nav>


  </div>

<div class="py-5">
    <div class="container">    
          <div class="py-5">
            <div class="container">
                <div class="card mb-6" >
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{Storage::url($prodects->image)}}" class="img-fluid rounded-start"  alt="...">
                      </div>
                      
                      <div class="col-md-8">
                        <div class="card-body">
                          <div class="card-header">
                            
                            <h5 class="card-title">{{$prodects->category->name}}</h5>
                            
                          </div>
                          <h5 class="card-title">{{$prodects->name}} </h5> <p>{{trans('website_trans.price')}} : {{$prodects->selling_price}}</p>
                          <p class="card-text">{{$prodects->description}}</p>
                          <div>


                                                      
                            <div class="container">
                              <div class="row mb-8 justify-content-center ">
                            <div class="col-md-6 col-12">
                              <div class="mb-4 border-bottom pb-2">
                                @if ($prodects->quantity > 0) 
                                <p><span class=" float-end badge bg-success">{{trans('website_trans.available')}}</span></p>
                              @else
                              <p>
                                <span class=" float-end badge bg-danger">{{trans('website_trans.no_available')}}</span>
                              </p>
                              @endif

                              <div class="container">
                                <div class="row mb-8 justify-content-center ">
                              <div class="col-md-6 col-12">
                                <div class="mb-4 border-bottom pb-2">
                                  @if ($prodects->trend == 1) 
                                  <p><span class=" float-end badge bg-success">{{trans('website_trans.trending')}}</span></p>
                                @else
                                <p>
                                  <span class=" float-end badge bg-danger">{{trans('website_trans.no_trending')}}</span>
                                </p>
                                @endif
                                </div>
  
                                
                              </div>

                              


                              

                              <div class="row">
                                <div class="col-6">
                                    @if($prodects->quantity > 0)
                                        <h4 class="py-4">{{trans('website_trans.quantity')}}</h4>
                                        <div class="input-group mb-3">
                                            <button class="input-group-text btn btn-outline-warning"
                                                    onclick="increaseQTY()">+
                                            </button>
                                            <input type="text" class="form-control text-center" id="qty_vlaue" readonly
                                                   value="1">
                                            <button class="input-group-text btn btn-outline-warning"
                                                    onclick="decreaseQTY()">-
                                            </button>
                                        </div>
                                    @endif
                                </div>

                          <div class="col-9">
                            <div class="row">
                                <div class="col">
                                    <h4 class="py-4">{{trans('website_trans.add_to_cart')}}</h4>
                                    <div class="input-group mb-3">
                                        <button class="btn btn-primary" onclick="addToCart()">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                        </button>
                                        <input type="hidden" id="prodect_id" name="prodect_id" value="{{$prodects->id}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <h4 class="py-4">{{trans('website_trans.add_to_wishlist')}}</h4>
                                    <div class="input-group mb-3">
                                        <button class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                          
                        </div>
                      </div>

                      
                    </div>
                </div>
            </div>
          </div>               
    </div>
</div>





@endsection




@section('js')
<script>

var qty = $('#qty').val();

function increaseQTY() {
    var value = parseInt($('#qty_vlaue').val());

    value = isNaN(value) ? 0 : value;

    if (value < qty) {

        value++

        $('#qty_vlaue').val(value)
    }

}

function decreaseQTY() {
    var value = parseInt($('#qty_vlaue').val());

    value = isNaN(value) ? 0 : value;

    if (value > 1) {
        value --;
        $('#qty_vlaue').val(value)
    }

}

    function addToCart(){
            var prodect_id = $('#prodect_id').val()
            var qty = $('#qty_vlaue').val()

            console.log('prodect id is:' + prodect_id + ' quantity is:'+ qty)

            $.ajax({
                method : 'POST',
                url : "{{route('prodect.AddToCart')}}",
                data : {
                  'prodect_id': prodect_id,
                    'qty': qty
                },
                success:function (res){
                    Swal.fire(res.msg)
                }
            })
        }
</script>

 

@endsection