<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $property = DB::select("SELECT * FROM properties");
        return view('property/index')->with('properties',$property);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('property/create');
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
        
        $propertySlug = $this->setName($request->title);
        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price
        ];
        DB::insert("INSERT INTO properties (title, name, description, rental_price, sale_price) VALUES
                    (?,?,?,?,?)",$property);
        return redirect()->action('App\Http\Controllers\PropertyController@index');
    }

    public function show($name)
    {
        //
        $property = DB::select("SELECT * FROM properties WHERE name = ?", [$name]);
        if(!empty($property)){
            return view('property/show')->with('property', $property);
        }
        else{
            return redirect()->action('App\Http\Controllers\PropertyController@index');
        }
    }


    public function edit($name)
    {
        //
        $property = DB::select("SELECT * FROM properties WHERE name = ?", [$name]);
        if(!empty($property)){
            return view('property/edit')->with('property', $property);
        }
        else{
            return redirect()->action('App\Http\Controllers\PropertyController@index');
        }
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
        $propertySlug = $this->setName($request->title);
        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $id
        ];
        DB::update("UPDATE properties SET title = ? , name = ?, description = ?, rental_price = ?, sale_price = ?
                    WHERE id = ?",$property);
        return redirect()->action('App\Http\Controllers\PropertyController@index');
    }


    public function destroy($name)
    {
        //
        $property = DB::select("SELECT * FROM properties WHERE name = ?", [$name]);
        if(!empty($property)){
            DB::delete("DELETE FROM properties WHERE name = ?", [$name]);
        }
        return redirect()->action('App\Http\Controllers\PropertyController@index');
    }

    private function setName($name){
        $propertySlug= Str::slug($name);
        
        $properties = DB::select("SELECT * FROM properties");
        
        $t = 0;
        
        foreach ($properties as $property) {
            if(Str::slug($property->title) === $propertySlug){
                $t++;
            }
        }

        if($t>0){
            $propertySlug= $propertySlug . "-" . $t;
        }
        
        return $propertySlug;
    }
}
