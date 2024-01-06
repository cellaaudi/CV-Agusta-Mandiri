<?php

namespace App\Http\Controllers;

use App\Models\AdvertisingAppointment;
use App\Models\AdvertisingCart;
use Exception;
use Illuminate\Http\Request;
use PDOException;

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
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'start' => 'required|date_format:H:i:s|before:end',
            'end' => 'required|date_format:H:i:s|after:start',
            'payment' => 'required',
            'user' => 'required|numeric',
            'ids' => 'required',
        ]);

        // dd($request);
        try {
            $product_id = implode(";", $request->ids);
            AdvertisingAppointment::create([
                'date' => $request->date,
                'start' => $request->start,
                'end' => $request->end,
                'payment' => $request->payment,
                'user_id' => $request->user,
                'product_id' => $product_id,
            ]);
            AdvertisingCart::whereIn('user_id', [$request->user])->delete();
            return redirect()->route('customer.advertising');
        } catch (PDOException $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function getAppointmentsByDate(Request $request)
    {
        $date = $request->get('date');

        $appointments = AdvertisingAppointment::whereDate('date', $date)->get();

        return response()->json($appointments);
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
