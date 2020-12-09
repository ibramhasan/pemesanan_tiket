<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Gallery;
Use App\TravelPackages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items= Gallery::all();
        return view('pages.admin.Gallery.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel_relasi= TravelPackages::all();
        return view('pages.admin.Gallery.create', compact('travel_relasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data= $request->all();
        $data['image'] = $request->file('image')->store('assets/gallery','public');

        Gallery::create($data);
        return redirect()->route('Gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= Gallery::findOrFail($id);
        $travel_relasi= TravelPackages::all();
        return view('pages.admin.Gallery.edit', [
          'item'=> $item,
          'travel_relasi' => $travel_relasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $data= $request->all();
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');
        $item= Gallery::findOrFail($id);
        $item->update($data);
        return redirect()->route('Gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item= Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('Gallery.index');
    }
}
