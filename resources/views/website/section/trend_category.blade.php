<style>
    .card-title,
    .card-text a {
        color: black; /* لون النص الأسود */
    }

    .read-more-link,
    .read-less-link {
        color: blue; /* لون النص الأزرق */
        cursor: pointer; /* تغيير المؤشر ليبدو كمؤشر على النص */
    }

    .full-text {
        display: none; /* إخفاء النص الكامل بشكل افتراضي */
    }
</style>

<div class="py-5">
    <div class="contener">
        <h3 class="text-center">{{ trans('website_trans.trend category') }}</h3>
        <div class="owl-carousel trend_category owl-theme">
            @foreach ($categories as $category)
                <div class="item m-3">
                    
                        <div class="card my-5" style="width: 18rem;">
                            <a href="{{ route('getcategoryBySlug', $category->slug) }}"><img class="card-img-top" src="{{ Storage::url($category->image) }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->meta_title }}</h5>
                                @if (strlen($category->meta_description) > 200)
                                    <p class="card-text">
                                        <span class="short-text">{!! substr($category->meta_description, 0, 200) !!}</span>
                                        <span class="full-text">{!! $category->meta_description !!}</span>
                                        <p class="read-more-link" >{{trans('website_trans.more')}}</p>
                                        <p class="read-less-link" style="display: none;">{{trans('website_trans.less')}}</p>
                                    </p>
                                @else
                                    <p class="card-text">{{ $category->meta_description }}</p>
                                @endif
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
            cardBody.querySelector('.full-text').style.display = 'inline';
            cardBody.querySelector('.read-more-link').style.display = 'none';
            cardBody.querySelector('.read-less-link').style.display = 'inline';
        });
    });

    document.querySelectorAll('.read-less-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const cardBody = this.closest('.card-body');
            cardBody.querySelector('.short-text').style.display = 'inline';
            cardBody.querySelector('.full-text').style.display = 'none';
            cardBody.querySelector('.read-more-link').style.display = 'inline';
            cardBody.querySelector('.read-less-link').style.display = 'none';
        });
    });
</script>
