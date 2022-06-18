@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div>
        {{$category->name}}
    </div>
    <div class="container">
        @foreach($products as $product)
            <div class="row">
                <div class="col-1 col-xl-1 text-center">
                    <img src="{{$product->getFirstMediaUrl('images', 'thumb')}}" class="rounded" alt="{{$product->name}}" height="50px" />
                </div>
                <div class="col-4 col-xl-4">
                    {{$product->name}}
                </div>
                <div class="col-1 col-xl-1">
                    {{$product->sku}}
                </div>
                <div class="col-1 col-xl-1">
                    {{$product->price}} &#8381;
                </div>
                <div class="col-2 col-xl-2">
                    <form method="POST" action="{{route('cart-add', $product)}}" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" id="add_cart" class="btn btn-outline-success ">
                            {{ __('Add to cart') }}
                        </button>
                    </form>
{{--// for ajax--}}
{{--                    <form id="add_cart" data-id="{{$product->id}}">--}}
{{--                        <button type="submit" class="btn btn-outline-success ">--}}
{{--                            {{ __('Add to cart') }}--}}
{{--                        </button>--}}
{{--                    </form>--}}
                </div>
            </div>
        @endforeach
    </div>
{{--    // пока реализую корзину через php--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.js"></script>--}}
{{--    <script>--}}
{{--        let url = window.location.origin--}}
{{--        $('body').on('submit','#add_cart',function(e){--}}
{{--            e.preventDefault();--}}
{{--            let id = $(this).data('id')--}}

{{--            let data = {--}}
{{--                id : id,--}}
{{--            }--}}
{{--            let path = url + '/cart/add' + '/'  + id--}}
{{--            axios.post(path,data)--}}
{{--                .then(function(response){--}}
{{--                    console.log(response.headers)--}}
{{--                })--}}

{{--        });--}}
{{--    </script>--}}
@endsection
