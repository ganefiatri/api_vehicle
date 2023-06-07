<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sale::all();
        return response()->json($data);
    }

    // total stock
    public function stock()
    {
        $data = Sale::with('vehicle','car','motor')->select('total_sale','total_buy','car_id','motor_id','vehicle_id')->get();
        return response()->json($data);
    }

    //sale report
    public function reportSale(){
        $data = Sale::with('vehicle','car','motor')->select('total_sale','total_buy','car_id','motor_id','vehicle_id')->get();
        return response()->json($data);
    }
    //sale report per item
    public function reportSalePerId($id){
        $data = Sale::with('vehicle','car','motor')->select('total_sale','total_buy','car_id','motor_id','vehicle_id')->where('_id', $id)->get();
        return response()->json($data);
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
            try {
                if ($request->category == "car") {
                    $vehicle_id = Vehicle::find($request->vehicle_id);
                    $response = Sale::create([
                        'vehicle_id' => $request->vehicle_id,
                        'car_id' => $request->car_id,
                        'stock_left' => $vehicle_id->stock - $request->stock_left,
                        'total_buy' => $request->total_buy,
                        'total_sale' => $vehicle_id->price
                    ]);
                    return response()->json([
                        'success' => true,
                        'message' =>  'success',
                        'data' => $vehicle_id
                    ]);
                }
                if ($request->category == "motor") {
                    $vehicle_id = Vehicle::find($request->vehicle_id);
                    $response = Sale::create([
                        'vehicle_id' => $request->vehicle_id,
                        'motor_id' => $request->motor_id,
                        'stock_left' => $vehicle_id->stock - $request->stock_left,
                        'total_buy' => $request->total_buy,
                        'total_sale' => $vehicle_id->price
                    ]);
                    return response()->json([
                        'success' => true,
                        'message' => 'success',
                        'data' => $vehicle_id
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'message' =>  'Err',
                    'errors' => $e->getMessage(),
                ]);
            }
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
