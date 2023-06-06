<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Motor;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vehicle::all();
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
        $validasi =  $request->validate([
            'year' => 'required|numeric',
            'color' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

            try {
                $response = Vehicle::create($validasi);
                if ($request->category == "car") {
                    Car::create([
                        'vehicle_id' => $response->id,
                        'engine' => $request->engine,
                        'seats' => $request->seats,
                        'type' => $request->type,
                    ]);
                }
                if ($request->category == "motor") {
                    Motor::create([
                        'vehicle_id' => $response->id,
                        'engine' => $request->engine,
                        'suspension' => $request->seats,
                        'transmition' => $request->type,
                    ]);
                }
                return response()->json([
                    'success' => true,
                    'message' =>  'success',
                ]);
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
        $data = Vehicle::find($id);
        return response()->json($data);
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
        $validasi =  $request->validate([
            'year' => 'required|numeric',
            'color' => 'required',
            'price' => 'required|numeric',
        ]);
        try {
            $response = Vehicle::find($id);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message' =>  'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' =>  'Err',
                'errors' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return response()->json([
            'success' => true,
            'message'=> 'Success'
        ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' =>  'Err',
                'errors' => $e->getMessage(),
            ]);
        }
        
    }
}
