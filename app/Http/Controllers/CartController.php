<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertising;
use App\Models\AdvertisingCart;
use App\Models\AdvertisingPhoto;
use App\Models\Car;
use App\Models\Property;
use PDO;
use PDOException;

class CartController extends Controller
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

    public function showAdvertising($id)
    {
        $carts = AdvertisingCart::where('user_id', $id)->get();
        $photos = AdvertisingPhoto::all();

        return view('customer.cart.adv', compact('carts', 'photos'));
    }

    private function isDuplicateKeyError(\Exception $e)
    {
        return $e->getCode() == 23000 || // MySQL: Duplicate entry
            $e->getCode() == 1062;    // MySQL: Duplicate entry for key 'PRIMARY'
    }

    public function addAdvertising(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'adv_product_id' => 'required|numeric'
        ]);

        try {
            AdvertisingCart::create([
                'user_id' => $request->user_id,
                'adv_product_id' => $request->adv_product_id,
            ]);

            return response()->json([
                'status' => 'Success',
                'message' => 'Produk berhasil ditambahkan',
            ], 201);
        } catch (PDOException $e) {
            if ($this->isDuplicateKeyError($e)) {
                return response()->json([
                    'status' => 'Failed',
                    'message' => 'Produk sudah ada di keranjangmu',
                ], 500); // atau kode status lainnya yang sesuai dengan situasi
            }

            // Jika bukan kesalahan kunci utama, tangkap pengecualian dan kembalikan respons kesalahan yang sesuai
            return response()->json([
                'status' => 'Failed',
                'message' => $e->getMessage(),
            ], 500);
        }


        // $adv = Advertising::find($id);
        // try {
        // AdvertisingCart::create([
        //     'user_id' => $request->user_id,
        //     'adv_product_id' => $request->adv_product_id,
        // ]);
        // return response()->json(array(
        //     'status' => 'Success',
        // ), 201);
        // } catch (PDOException $e) {
        //     return response()->json(array(
        //         'status' => 'Failed',
        //         'serverStatus' => $e,
        //     ), 500);
        // }

        // return redirect()->route('customer.car.brand.index')->with('status', 'Produk berhasil ditambahkan');
    }
}
