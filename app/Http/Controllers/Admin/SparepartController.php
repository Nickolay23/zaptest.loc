<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carmodel;
use App\Models\Sparepart;
use App\Http\Requests\StoreSparepartRequest;
use App\Http\Requests\UpdateSparepartRequest;
use Illuminate\Support\Facades\Storage;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spareparts = Sparepart::get();
        return view('admin.spareparts.index', compact('spareparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carmodels = Carmodel::get();
        return view('admin.spareparts.create', compact('carmodels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSparepartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSparepartRequest $request)
    {
        $params = $request->all();

        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('spareparts');
        }

        unset($params['carmodel_id']);

        $sparepart = Sparepart::create($params);
        $sparepart->carmodels()->sync($request->carmodel_id);

        return redirect()->route('admin.spareparts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function show(Sparepart $sparepart)
    {
        return view('admin.spareparts.show', compact('sparepart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function edit(Sparepart $sparepart)
    {
        $carmodels = Carmodel::get();
        return view('admin.spareparts.edit', compact('sparepart', 'carmodels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSparepartRequest  $request
     * @param  \App\Models\Sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSparepartRequest $request, Sparepart $sparepart)
    {
        $params = $request->all();

        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($sparepart->image);
            $params['image'] = $request->file('image')->store('spareparts');
        }

        unset($params['carmodel_id']);

        $sparepart->update($params);
        $sparepart->carmodels()->sync($request->carmodel_id);

        return redirect()->route('admin.spareparts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sparepart $sparepart)
    {
        $sparepart->delete();
        Storage::delete($sparepart->image);
        return redirect()->route('admin.spareparts.index');
    }
}
