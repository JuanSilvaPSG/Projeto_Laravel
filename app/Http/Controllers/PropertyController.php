<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index()
    {
        $property = Property::all();
        return view('property/index')->with('properties',$property);
    }

    public function create()
    {
        return view('property/create');
    }

    public function store(Request $request)
    {
        $propertySlug = $this->setName($request->title);

        $property = [
            'title' => $request->title,
            'description'=> $request->description,
            'rental_price'=> $request->rental_price,
            'sale_price'=> $request->sale_price,
            'name' => $propertySlug,
        ];
        Property::create($property);
        return redirect()->action('App\Http\Controllers\PropertyController@index');

    }

    public function show($name)
    {
        $property = Property::where('name', $name)->get();
        if(!empty($property)){
            return view('property/show')->with('property', $property);
        }
        else{
            return redirect()->action('App\Http\Controllers\PropertyController@index');
        }
    }


    public function edit($name)
    {
        $property = Property::where('name', $name)->get();
        if(!empty($property)){
            return view('property/edit')->with('property', $property);
        }
        else{
            return redirect()->action('App\Http\Controllers\PropertyController@index');
        }
    }

    public function update(Request $request, $id)
    {
        //
        $propertySlug = $this->setName($request->title);
        $property = Property::find($id);

        $property->title = $request->title;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;
        $property->name = $propertySlug;

        $property->save();

        return redirect()->action('App\Http\Controllers\PropertyController@index');
    }


    public function destroy($name)
    {
        $property = Property::where('name', $name)->get();
        if(!empty($property)){
            $property = Property::where('name', $name)->delete();
        }
        return redirect()->action('App\Http\Controllers\PropertyController@index');
    }

    private function setName($name){
        $propertySlug= Str::slug($name);

        $properties = Property::all();

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
