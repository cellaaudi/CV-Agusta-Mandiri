<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyPhoto;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $props = Property::all();

        return view('admin.prop.prop', compact('props'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prop.propcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required|numeric',
            'land_area' => 'required|numeric',
            'building_area' => 'numeric',
            'bedroom' => 'numeric',
            'bathroom' => 'numeric',
            'story' => 'numeric',
            'electricity' => 'numeric',
            'certificate' => 'required',
            'desc' => 'required',
            'photos' => 'required',
            'category' =>'required'
        ]);

        if ($request->hasFile('photos')) {
            $allowed = ['jpeg', 'jpg', 'png', 'svg', 'gif'];
            $files = $request->file('photos');
            
            $product = Property::create([
                'category' => $request->category,
                'title' => $request->title,
                'price' => $request->price,
                'land_area' => $request->land_area,
                'building_area' => $request->building_area,
                'bedroom' => $request->bedroom,
                'bathroom' => $request->bathroom,
                'story' => $request->story,
                'electricity' => $request->electricity,
                'certification' => $request->certificate,
                'description' => $request->desc,
            ]);

            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $valid = in_array($extension, $allowed);

                if ($valid) {
                    $filename = $file->store('photos');
                    PropertyPhoto::create([
                        'prop_product_id' => $product->id,
                        'url' => $filename
                    ]);
                }
            }
        }

        return redirect()->route('admin.property.index')->with('status', 'Produk berhasil ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
