@extends('layouts.app')

@section('content')
    <div>
        <h3>{{__('Spare parts list')}}</h3>
        <div class="mb-4 d-flex justify-content-end">
            <a href="{{route('admin.spareparts.create')}}" class="btn btn-dark" role="button">{{__('Add spare parts')}}</a>
        </div>

        @if($spareparts->count() > 0)
            <table class="table">
                <thead class="table-secondary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('Code')}}</th>
                    <th scope="col">{{__('Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($spareparts as $sparepart)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$sparepart->code}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{route('admin.spareparts.show', $sparepart)}}" class="m-1 btn btn-sm btn-success">{{__('Open')}}</a>
                                <a href="{{route('admin.spareparts.edit', $sparepart)}}" class="m-1 btn btn-sm btn-warning">{{__('Edit')}}</a>
                                <form action="{{ route('admin.spareparts.destroy', $sparepart) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="m-1 btn btn-sm btn-danger" type="submit"
                                            onclick="return confirm('{{ __('Are you sure?') }}')"> {{__('Delete')}}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div>{{__('No spare parts')}}</div>
        @endif
    </div>
@endsection
