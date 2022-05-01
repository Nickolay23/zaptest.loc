<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartManufacturer;
use App\Http\Requests\StorePartManufacturerRequest;
use App\Http\Requests\UpdatePartManufacturerRequest;
use Illuminate\Support\Facades\Storage;

class PartManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partManufacturers = PartManufacturer::get();
        return view('admin.part_manufacturers.index', compact('partManufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.part_manufacturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePartManufacturerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartManufacturerRequest $request)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('part_manufacturers');
        }
        PartManufacturer::create($params);
        return redirect()->route('admin.part_manufacturers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartManufacturer  $partManufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(PartManufacturer $partManufacturer)
    {
        return view('admin.part_manufacturers.show', compact('partManufacturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PartManufacturer  $partManufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(PartManufacturer $partManufacturer)
    {
        return view('admin.part_manufacturers.edit', compact('partManufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePartManufacturerRequest  $request
     * @param  \App\Models\PartManufacturer  $partManufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartManufacturerRequest $request, PartManufacturer $partManufacturer)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($partManufacturer->image);
            $params['image'] = $request->file('image')->store('part_manufacturers');
        }
        $partManufacturer->update($params);
        return redirect()->route('admin.part_manufacturers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartManufacturer  $partManufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartManufacturer $partManufacturer)
    {
        $partManufacturer->delete();
        Storage::delete($partManufacturer->image);
        return redirect()->route('admin.part_manufacturers.index');
    }
}
