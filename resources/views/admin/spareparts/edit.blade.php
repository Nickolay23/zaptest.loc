@extends('layouts.admin')

@section('content')
    <h3>{{__('Edit spare part')}} {{$sparepart->code}}</h3>
    <div class="mb-4 d-flex justify-content-end">
        <a href="{{route('admin.spareparts.index')}}" class="btn btn-dark" role="button">{{__('Spare parts list')}}</a>
    </div>
    <form action="{{route('admin.spareparts.update', $sparepart)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="carmodel_id" class="col-sm-2 col-form-label">{{__('Car model')}}</label>
            <div class="col-sm-10">
                @error('carmodel_id')
                <div class="alert alert-danger pt-1 pb-1">{{$message}}</div>
                @enderror
                <select class="form-select" id="carmodel_id" name="carmodel_id[]" multiple size="3">
                    @foreach($carmodels as $carmodel)
                        <option value="{{$carmodel->id}}"
                        @if($sparepart->carmodels->contains($carmodel->id))
                            selected
                            @endif
                        >{{$carmodel->name .' '. $carmodel->generation . ' (' . $carmodel->start_year . '-' . $carmodel->finish_year . ')'}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="code" class="col-sm-2 col-form-label">{{__('Code')}}</label>
            <div class="col-sm-10">
                @error('code')
                <div class="alert alert-danger pt-1 pb-1">{{$message}}</div>
                @enderror
                <input type="text" name="code" class="form-control" id="code" value="{{$sparepart->code}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">{{__('Description')}}</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" id="description">{{$sparepart->description}}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="image">{{__('Image')}}</label>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control" id="image">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
    </form>
@endsection
