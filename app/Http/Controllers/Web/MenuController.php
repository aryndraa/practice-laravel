<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::query()->get();

        return response()->json($menus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'min:10', 'integer'],
            'additional' => ['array'],
            'additional.*' => ['exists:additionals,id'],
        ]);

        $menu = new Menu($validate);

        $menu->save();

        if (isset($validate['additional'])) {
            $menu->additional()->sync($validate['additional']);
        }

        return response()->json($menu);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::query()->findOrFail($id);

        $menu->load(['additional:id,name,description', 'additional.variant']);

        return response()->json($menu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::query()->findOrFail($id);
        $menu->load(['additional', 'additional.variant']);

        return view('menu.edit', compact('menu'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validate = $request->validate([
            'name' => ['string'],
            'price' => ['integer', 'min:10'],
            'additional' => ['array'],
            'additional.*' => ['exists:additionals,id'],
        ]);

        $menu = Menu::query()->findOrFail($id);

        $menu->update([
            'name' => $validate['name'] ?? $menu->name,
            'price' => $validate['price'] ?? $menu->price,
        ]);

        if (isset($validate['additional'])) {
            $currentAdditional = $menu->additional()->pluck('additionals.id')->toArray();

            $newAdditional = $validate['additional'];

            $removedAdditional = array_diff($currentAdditional, $newAdditional);

            if (!empty($removedAdditional)) {
                $menu->additional()->detach($removedAdditional);
            }

            $menu->additional()->sync($newAdditional);
        }

        return response()->json($menu);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::query()->findOrFail($id);

        $menu->delete();

        $menu->additional()->detach();

        return response()->json($menu);
    }
}
