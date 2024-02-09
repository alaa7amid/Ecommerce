@extends('website.master')
@section('title')
    2Zal
@endsection

@section('css')
<style>
    .card {
        box-shadow: 10px 10px 25px
        }
        .owl-carousel .card {overflow:hidden}
        .owl-carousel  .item img {transition: all .2s ease-in-out;}
        .owl-carousel  .item img:hover {transform: scale(1.1);}
</style>
@endsection
@section('content')

    
    @include('website.section.slider')
    @include('website.section.trend_prodects')
    @include('website.section.trend_category')



@endsection

@section('js')
    <script>
            $('.trend_category').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
    </script>
@endsection