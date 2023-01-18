<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Promo::latest()->get();
        return view('admin.promo.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promo.create');
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
            'event' => ['required'],
            'image' => ['required', 'file', 'image'],
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $validatedData['image'] = $request->file('image')->store('/promo');

        Promo::create($validatedData);

        return to_route('admin.promos.index')->with('success', 'Berhasil menambah promo baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('admin.promo.edit', compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $rules = [
            'event' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ];
        if ($request->has('image')) $rules['image'] = ['required', 'file', 'image'];
        $validatedData = $request->validate($rules);
        if ($request->has('image')) {
            $validatedData['image'] = $request->file('image')->store('/promo');
            Storage::delete($promo->image);
        }
        $promo->update($validatedData);

        return to_route('admin.promos.index')->with('success', 'Berhasil mengedit promo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();
        return to_route('admin.promos.index')->with('success', 'Berhasil menghapus promo');
    }
}
