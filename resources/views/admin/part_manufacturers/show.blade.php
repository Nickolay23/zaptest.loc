@extends('layouts.admin')

@section('content')
    <h3>{{$partManufacturer->part_manufacturer}}</h3>
    <div class="mb-4 d-flex justify-content-end">
        <a href="{{route('admin.part_manufacturers.index')}}" class="btn btn-dark" role="button">{{__('Manufacturers list')}}</a>
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
            <td>{{$partManufacturer->id}}</td>
        </tr>
        <tr>
            <td>{{__('Name')}}</td>
            <td>{{$partManufacturer->part_manufacturer}}</td>
        </tr>
        <tr>
            <td>{{__('Description')}}</td>
            <td>{{$partManufacturer->description}}</td>
        </tr>
        <tr>
            <td>{{__('Image')}}</td>
            <td><img src="{{ Storage::url($partManufacturer->image) }}"
                     height="120px"></td>
        </tr>
        </tbody>
    </table>
@endsection
