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
                <div class="col-2 col-xl-2">
                    <img src="{{Storage::url($product->image)}}" class="img-thumbnail" alt="{{$product->name}}" width="100px" height="100px" />
                </div>
                <div class="col-4 col-xl-4">
                    {{$product->name}}
                </div>
                <div class="col-1 col-xl-1">
                    {{$product->sku}}
                </div>
                <div class="col-1 col-xl-1">
                    {{$product->price}}
                </div>
            </div>
        @endforeach
    </div>
@endsection
