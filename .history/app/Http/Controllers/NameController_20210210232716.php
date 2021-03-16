<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\Utils;
use App\Models\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $name = Name::get(); // select * from names;
        
        laravel:log('here');

        return response()->json($name, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $name = new Name;

        $name->name = $request['name'];
        $name->origin = $request['origin'];
        $name->description = $request['description'];
        $name->gender = $request['gender'];
        $name->meaning = $request['meaning'];

        $name->save();

//        $name = Name::create($request->all());

        return response()->json($name, 201);
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
