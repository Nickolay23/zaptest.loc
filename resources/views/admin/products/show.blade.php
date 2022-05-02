@extends('layouts.admin')

@section('content')
    <h3>{{$product->name}}</h3>
    <div class="mb-4 d-flex justify-content-end">
        <a href="{{route('admin.products.index')}}" class="btn btn-dark" role="button">{{__('Product list')}}</a>
    </div>
    <table class="table">
        <thead class="table-secondary">
        <tr>
            <th scope="col">{{__('Attribute')}}</th>
            <th scope="col">{{__('Feature')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{__('Id')}}</td>
            <td>{{$product->id}}</td>
        </tr>
        <tr>
            <td>{{__('Name')}}</td>
            <td>{{$product->name}}</td>
        </tr>
        <tr>
            <td>{{__('SKU')}}</td>
            <td>{{$product->sku}}</td>
        </tr>
        <tr>
            <td>{{__('Category')}}</td>
            <td>{{$product->category->name}}</td>
        </tr>
        <tr>
            <td>{{__('Spare part')}}</td>
            <td>{{$product->sparepart->code}}</td>
        </tr>
        <tr>
            <td>{{__('Manufacturer')}}</td>
            <td>{{$product->part_manufacturer->part_manufacturer}}</td>
        </tr>
        <tr>
            <td>{{__('Amount')}}</td>
            <td>{{$product->amount}}</td>
        </tr>
        <tr>
            <td>{{__('Price')}}</td>
            <td>{{$product->price}}</td>
        </tr>
        <tr>
            <td>{{__('Description')}}</td>
            <td>{{$product->description}}</td>
        </tr>
        <tr>
            <td>{{__('Image')}}</td>
            <td><img src="{{ Storage::url($product->image) }}"
                     height="240px"></td>
        </tr>
        </tbody>
    </table>
@endsection
