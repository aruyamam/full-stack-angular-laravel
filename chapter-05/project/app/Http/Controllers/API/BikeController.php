<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bike;
use Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *  @SWG\Get(
     *      path="/api/bikes",
     *      tags={"Bikes"},
     *      summary="List Bikes",
     *      @SWG\Response(
     *          response=200,
     *          description="Success: List all Bikes",
     *          @SWG\Schema(ref="#/definitions/Bike")
     *      ),
     *      @SWG\Response(
     *          response="404",
     *          description="Not Found",
     *      )
     * ),
     */
    public function index()
    {
        $listBikes = Bike::all();
        return $listBikes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     *  @SWG\Post(
     *      path="/api/bikes",
     *      tags={"Bikes"},
     *      summary="Create Bike",
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          required=true,
     *          @SWG\Schema(ref="#/definitions/Bike"),
     *          description="Json format",
     *      ),
     *      @SWG\Response(
     *          response=201,
     *          description="Success: A Newly Created Bike",
     *          @SWG\Schema(ref="#/definitions/Item")
     *      ),
     *      @SWG\Response(
     *          response="422",
     *          description="Missing mandatory field",
     *      ),
     *      @SWG\Response(
     *          response="404",
     *          description="Not Found",
     *      ),
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'mods' => 'required',
            'builder_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $createBike = Bike::create($request->all());
        return $createBike;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     *  @SWG\Get(
     *      path="/api/bikes/{id}",
     *      tags={"Bikes"},
     *      summary="Get Bike by Id",
     *      @SWG\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer",
     *          description="Display thhe specified Bike by id.",
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Success: Return the Bike",
     *          @SWG\Schema(ref="#/definitions/Bike")
     *      ),
     *      @SWG\Response(
     *          response="404",
     *          description="Not Found",
     *      ),
     * )
     */
    public function show($id)
    {
        $showBikeById = Bike::with(['items', 'builder', 'garages'])->findOrFail($id);
        return $showBikeById;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     *  @SWG\Put(
     *      path="/api/bikes/{id}",
     *      tags={"Bikes"},
     *      summary="Update Bike",
     *      @SWG\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer",
     *          description="Update the specified Bike by id.",
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          required=true,
     *          @SWG\Schema(ref="#/definitions/Bike"),
     *          description="Json format",
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Success: Return the Bike updated",
     *          @SWG\Schema(ref="#/definitions/Bike")
     *      ),
     *      @SWG\Response(
     *          response="422",
     *          description="Missing mandatory field",
     *      ),
     *      @SWG\Response(
     *          response="404",
     *          description="Not Found",
     *      ),
     * )
     */
    public function update(Request $request, $id)
    {
        $updateBikeById = Bike::findOrFail($id);
        $updateBikeById->update($request->all());
        return $updateBikeById;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     *  @SWG\Delete(
     *      path="/api/bikes/{id}",
     *      tags={"Bikes"},
     *      summary="Delete Bike",
     *      description="Delete the specified Bike by id",
     *      @SWG\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer",
     *          description="Bike id to delete",
     *          format="int64"
     *      ),
     *      @SWG\Response(
     *          response="404",
     *          description="Not Found",
     *      ),
     *      @SWG\Response(
     *          response="204",
     *          description="Success: successful deleted",
     *      ),
     *  )
     */
    public function destroy($id)
    {
        $deleteBikeById = Bike::find($id)->delete();
        return reponse()->json([], 204);
    }
}
