<div class="py-5">
    <div class="container">
        <h3 class="text-center">{{trans('website_trans.trend prodects')}}</h3>
        <div class="owl-carousel trend_prodect owl-theme">
            @foreach ($prodects as $prodect)
                <div class="item m-3">
                    <div class="card my-5" style="width: 18rem;">
                        <a href="{{route('getProdectBySlug',[$prodect->category->slug,$prodect->slug])}}"><img class="card-img-top" src="{{Storage::url($prodect->image)}}" alt="Card image cap"></a>

                        <div class="card-body">
                            <h5 class="card-title">{{$prodect->meta_title}}</h5>
                            @if (strlen($prodect->meta_description) > 200)
                                <div class="short-text">
                                    <p class="card-text">{!! substr($prodect->meta_description, 0, 200) !!}</p>
                                </div>
                                <div class="full-text" style="display: none;">
                                    <p class="card-text">{!! $prodect->meta_description !!}</p>
                                </div>
                                <p class="read-more-link">{{trans('website_trans.more')}}</p>
                                <p class="read-less-link" style="display: none;">{{trans('website_trans.less')}}</p>
                            @else
                                <p class="card-text">{{$prodect->meta_description}}</p>
                            @endif
                            <p>{{trans('website_trans.selling_price')}}</p>
                            <p class="card-text">{{$prodect->selling_price}}</p>
                            <p>{{trans('website_trans.tax')}}</p>
                            <p class="card-text">{{$prodect->tax}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>  
    </div>
</div>

<script>
    document.querySelectorAll('.read-more-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const cardBody = this.closest('.card-body');
            cardBody.querySelector('.short-text').style.display = 'none';
            cardBody.querySelector('.full-text').style.display = 'block';
            cardBody.querySelector('.read-more-link').style.display = 'none';
            cardBody.querySelector('.read-less-link').style.display = 'block';
        });
    });

    document.querySelectorAll('.read-less-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const cardBody = this.closest('.card-body');
            cardBody.querySelector('.short-text').style.display = 'block';
            cardBody.querySelector('.full-text').style.display = 'none';
            cardBody.querySelector('.read-more-link').style.display = 'block';
            cardBody.querySelector('.read-less-link').style.display = 'none';
        });
    });
</script>
