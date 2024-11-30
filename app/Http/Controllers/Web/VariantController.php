<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variants = Variant::query()->get();

        return response()->json($variants);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ['required', 'string'],
        ]);

        $variant = new Variant($validate);

        $variant->save();

        return response()->json($variant);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $variant = Variant::query()->findOrFail($id);

        return response()->json($variant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $variant = Variant::query()->findOrFail($id);

        $validate = $request->validate([
            "name" => ['required', 'string'],
        ]);

        $variant->update($validate);

        return response()->json($variant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = Variant::query()->findOrFail($id);

        $variant->delete();

        return response()->json($variant);
    }
}
