@extends('layouts.app')

@section('content')
    <h3>{{$sparepart->code}}</h3>
    <div class="mb-4 d-flex justify-content-end">
        <a href="{{route('admin.spareparts.index')}}" class="btn btn-dark" role="button">{{__('Spare parts list')}}</a>
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
            <td>{{$sparepart->id}}</td>
        </tr>
        <tr>
            <td>{{__('Code')}}</td>
            <td>{{$sparepart->code}}</td>
        </tr>
        <tr>
            <td>{{__('Car models')}}</td>
            <td>
                @foreach($sparepart->carmodels as $carmodel)
                    <p class="mb-0">{{$carmodel->name .' '. $carmodel->generation . ' (' . $carmodel->start_year . '-' . $carmodel->finish_year . ')'}}</p>
                @endforeach
            </td>
        </tr>
        <tr>
            <td>{{__('Description')}}</td>
            <td>{{$sparepart->description}}</td>
        </tr>
        <tr>
            <td>{{__('Image')}}</td>
            <td><img src="{{ Storage::url($sparepart->image) }}"
                     height="240px"></td>
        </tr>
        </tbody>
    </table>
@endsection
