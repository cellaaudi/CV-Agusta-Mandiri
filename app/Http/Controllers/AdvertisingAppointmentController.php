<?php

namespace App\Http\Controllers;

use App\Models\AdvertisingAppointment;
use Illuminate\Http\Request;

class AdvertisingAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('customer.appointment.adv');
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
        // $request->validate([
        //     'date' => 'required|date|after:today',
        //     'start' => 'required|date_format:H:i:s|before:end',
        //     'end' => 'required|date_format:H:i:s|after:start',
        //     'payment' => 'required',
        //     'user' => 'required|numeric',
        // ]);

        AdvertisingAppointment::create([
            'date' => $request->date,
            'start' => $request->start,
            'end' => $request->end,
            'payment' => $request->payment,
            'user_id' => $request->user,
        ]);

        return redirect()->route('customer.advertising');
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
