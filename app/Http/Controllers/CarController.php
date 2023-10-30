<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\CarBrand;
use App\Models\CarCategory;
use App\Models\CarPhoto;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::where('status', 'Sell')->get();

        return view('admin.car.carsell', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = CarBrand::orderBy('brand', 'asc')->get();
        $categories = CarCategory::orderBy('category', 'asc')->get();

        return view('admin.car.carsellcreate', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required|numeric',
            'brand' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'km' => 'required|numeric',
            'transmission' => 'required',
            'capacity' => 'required|numeric',
            'fuel' => 'required',
            'desc' => 'required',
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,jpg,png,svg,gif'
        ]);

        if ($request->hasFile('photos')) {
            $files = $request->file('photos');

            $product = Car::create([
                'title' => $request->title,
                'year' => $request->year,
                'price' => $request->price,
                'kilometre' => $request->km,
                'transmission' => $request->transmission,
                'capacity' => $request->capacity,
                'fuel' => $request->fuel,
                'description' => $request->desc,
                'status' => 'Sell',
                'sell_status' => 'Available',
                'car_brand_id' => $request->brand,
                'car_category_id' => $request->category
            ]);

            foreach($files as $file) {
                $filename = $file->store('photos');

                CarPhoto::create([
                    'car_product_id' => $product->id,
                    'url' => $filename
                ]);
            }
        }

        return redirect()->route('admin.car.index')->with('status', 'Produk berhasil ditambahkan');
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
