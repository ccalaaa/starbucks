<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Menu::latest()->get();
        return view('admin.menu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'image' => ['required', 'file', 'image'],
            'type' => ['required'],
            'description' => ['required'],
        ]);

        $validatedData['image'] = $request->file('image')->store('/menu');

        Menu::create($validatedData);

        return to_route('admin.menu.index')->with('success', 'Berhasil menambah menu baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'name' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
        ];

        if ($request->has('image')) $rules['image'] = ['required', 'file', 'image'];

        $validatedData = $request->validate($rules);

        if ($request->has('image')) {
            $validatedData['image'] = $request->file('image')->store('/menu');
            Storage::delete($menu->image);
        }

        $menu->update($validatedData);

        return to_route('admin.menu.index')->with('success', 'Berhasil mengedit menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
