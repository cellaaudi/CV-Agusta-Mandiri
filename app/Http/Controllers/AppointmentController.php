<?php

namespace App\Http\Controllers;

use App\Models\AdvertisingCart;
use App\Models\Appointment;
use App\Models\CarCart;
use App\Models\PropertyCart;
use Illuminate\Http\Request;
use PDOException;

class AppointmentController extends Controller
{
    public function getAppointmentsByDate(Request $request)
    {
        $date = $request->get('date');

        $appointments = Appointment::whereDate('date', $date)->get();

        return response()->json($appointments);
    }

    public function makeAppointment(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'start' => 'required|date_format:H:i:s|before:end',
            'end' => 'required|date_format:H:i:s|after:start',
            'type' => 'required',
            'ids' => 'required',
            'user' => 'required|numeric',
        ]);

        try {
            $product_type = $request->type;
            $product_id = implode(";", $request->ids);

            Appointment::create([
                'date' => $request->date,
                'start' => $request->start,
                'end' => $request->end,
                'product_type' => $request->type,
                'product_id' => $product_id,
                'user_id' => $request->user,
            ]);

            if ($product_type == "Adv") {
                AdvertisingCart::whereIn('user_id', [$request->user])->delete();
            } elseif ($product_type == "Car") {
                CarCart::whereIn('user_id', [$request->user])->delete();
            } elseif ($product_type == "Prop") {
                PropertyCart::whereIn('user_id', [$request->user])->delete();
            }

            return redirect()->route('customer.advertising');
        } catch (PDOException $e) {
            return redirect()->back()->with('Failed', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function showAllMine($id)
    {
        $apps = Appointment::where('user_id', $id)->orderByDesc('date')->get();

        return view('customer.appointment', compact('apps'));
    }
}
