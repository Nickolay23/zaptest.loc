@extends('layouts.admin')

@section('content')
    <div>
        <h3>{{__('Product list')}}</h3>
        <div class="mb-4 d-flex justify-content-end">
            @can('create', \App\Models\Product::class)
                <a href="{{route('admin.products.create')}}" class="btn btn-dark" role="button">{{__('Add product')}}</a>
            @endcan
        </div>
        @if($products->count() > 0)
            <table class="table align-middle">
                <thead class="table-secondary">
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">{{__('Name')}}</th>
                    <th scope="col">{{__('Code')}}</th>
                    <th scope="col">{{__('Image')}}</th>
                    <th scope="col">{{__('Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>

                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->sku}}</td>
                        <td class="text-center">
                            <img src="{{$product->getFirstMediaUrl('images', 'thumb')}}" alt="{{$product->name}}" class="rounded">
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{route('admin.products.show', $product)}}" class="m-1 btn btn-sm btn-success">{{__('Open')}}</a>
                                @can('update', $product)
                                    <a href="{{route('admin.products.edit', $product)}}" class="m-1 btn btn-sm btn-warning">{{__('Edit')}}</a>
                                @endcan
                                @can('delete', $product)
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="m-1 btn btn-sm btn-danger" type="submit"
                                                onclick="return confirm('{{ __('Are you sure?') }}')"> {{__('Delete')}}</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div>{{__('No goods')}}</div>
        @endif
    </div>
@endsection
