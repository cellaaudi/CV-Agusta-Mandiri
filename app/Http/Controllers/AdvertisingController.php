<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use App\Models\AdvertisingPhoto;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advs = Advertising::all();

        return view('admin.adv.adv', compact('advs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adv.advcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'photos' => 'required'
        ]);

        $name = $request->get('name');
        $category = $request->category;

        if ($request->hasFile('photos')) {
            $allowed = ['jpeg', 'jpg', 'png', 'svg', 'gif'];
            $files = $request->file('photos');

            $product = Advertising::create([
                'name' => $name,
                'category' => $category
            ]);

            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $valid = in_array($extension, $allowed);

                if ($valid) {
                    $filename = $file->store('photos');
                    AdvertisingPhoto::create([
                        'adv_product_id' => $product->id,
                        'url' => $filename
                    ]);
                }
            }
        }

        return redirect()->route('admin.advertising.index')->with('status', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adv = Advertising::find($id);
        $photos = AdvertisingPhoto::where('adv_product_id', $id)->get();

        return view('admin.adv.advshow', compact('adv', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adv = Advertising::find($id);
        $photos = AdvertisingPhoto::where('adv_product_id', $id)->get();

        return view('admin.adv.advedit', compact('adv', 'photos'));
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
