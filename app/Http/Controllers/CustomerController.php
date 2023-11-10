<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertising;
use App\Models\Car;
use App\Models\Property;
use App\Models\AdvertisingPhoto;
use App\Models\CarPhoto;
use App\Models\PropertyPhoto;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function advs()
    {
        $advs = Advertising::all();
        $photos = AdvertisingPhoto::all();

        return view('customer.adv.adv', compact('advs', 'photos'));
    }
    
    public function adv_detail($id)
    {
        $adv = Advertising::find($id);
        $photos = AdvertisingPhoto::where('adv_product_id', $id)->get();

        return view('customer.adv.advdetail', compact('adv', 'photos'));
    }

    public function cars()
    {
        $cars = Car::all();
        $photos = CarPhoto::all();

        return view('customer.car.car', compact('cars', 'photos'));
    }

    public function car_Detail($id)
    {
        $car = Car::find($id);
        $photos = CarPhoto::where('car_product_id', $id)->get();

        return view('customer.car.cardetail', compact('car', 'photos'));
    }

    public function props()
    {
        $props = Property::all();
        $photos = PropertyPhoto::all();

        return view('customer.prop.prop', compact('props', 'photos'));
    }

    public function prop_detail($id)
    {
        $prop = Property::find($id);
        $photos = PropertyPhoto::where('prop_product_id', $id)->get();

        return view('customer.prop.propdetail', compact('prop', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
