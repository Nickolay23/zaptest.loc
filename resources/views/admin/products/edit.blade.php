@extends('layouts.admin')

@section('content')
    <h3>{{__('Edit product')}} {{$product->name}}</h3>
    <div class="mb-4 d-flex justify-content-end">
        <a href="{{route('admin.products.index')}}" class="btn btn-dark" role="button">{{__('Product list')}}</a>
    </div>
    <form action="{{route('admin.products.update', $product)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">{{__('Name')}}</label>
            <div class="col-sm-10">
                @error('name')
                <div class="alert alert-danger pt-1 pb-1">{{$message}}</div>
                @enderror
                <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="sku" class="col-sm-2 col-form-label">{{__('SKU')}}</label>
            <div class="col-sm-10">
                @error('sku')
                <div class="alert alert-danger pt-1 pb-1">{{$message}}</div>
                @enderror
                <input type="text" name="sku" class="form-control" id="code" value="{{$product->sku}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="category_id" class="col-sm-2 col-form-label">{{__('Category')}}</label>
            <div class="col-sm-10">
                @error('category_id')
                <div class="alert alert-danger pt-1 pb-1">{{$message}}</div>
                @enderror
                <select class="form-select" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if($product->category_id == $category->id) selected
                                @endif
                        >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="sparepart_id" class="col-sm-2 col-form-label">{{__('Spare part')}}</label>
            <div class="col-sm-10">
                @error('sparepart_id')
                <div class="alert alert-danger pt-1 pb-1">{{$message}}</div>
                @enderror
                <select class="form-select" id="sparepart_id" name="sparepart_id">
                    @foreach($spareparts as $sparepart)
                        <option value="{{$sparepart->id}}"
                                @if($product->sparepart_id == $sparepart->id) selected
                            @endif
                        >{{$sparepart->code}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="part_manufacturer_id" class="col-sm-2 col-form-label">{{__('Manufacturer')}}</label>
            <div class="col-sm-10">
                @error('part_manufacturer_id')
                <div class="alert alert-danger pt-1 pb-1">{{$message}}</div>
                @enderror
                <select class="form-select" id="part_manufacturer_id" name="part_manufacturer_id">
                    @foreach($partManufacturers as $partManufacturer)
                        <option value="{{$partManufacturer->id}}"
                                @if($product->part_manufacturer_id == $partManufacturer->id) selected
                            @endif
                        >{{$partManufacturer->part_manufacturer}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="amount" class="col-sm-2 col-form-label">{{__('Amount')}}</label>
            <div class="col-sm-10">
                @error('amount')
                <div class="alert alert-danger pt-1 pb-1">{{$message}}</div>
                @enderror
                <input type="number" min="0" name="amount" class="form-control" id="amount" value="{{$product->amount}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">{{__('Price')}}</label>
            <div class="col-sm-10">
                @error('price')
                <div class="alert alert-danger pt-1 pb-1">{{$message}}</div>
                @enderror
                <input type="text" name="price" class="form-control" id="price" value="{{$product->price}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">{{__('Description')}}</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" id="description"> {{$product->description}}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="image">{{__('Image')}}</label>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control" id="image">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
    </form>
@endsection
