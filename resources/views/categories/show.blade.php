@extends('layouts.app')

@section('title', $category->name)

@section('content')
    @include('partials.header')
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
                    {{$product->price . ' руб.'}}
                </div>
            </div>
        @endforeach
    </div>
@endsection
