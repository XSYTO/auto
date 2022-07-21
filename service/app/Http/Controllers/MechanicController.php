<?php

namespace App\Http\Controllers;

use App\Models\Autoservice;
use App\Models\Mechanic;
use Illuminate\Http\Request;
use Faker\Factory as Faker;


class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanics = Mechanic::all();

        return view('/workers/index' , ['mechanics' => $mechanics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $faker = Faker::create('lt_LT');
        $autoservices = Autoservice::all();

        $name = $faker->firstNameMale;
        $surname = $faker->lastnameMale;
        $images = 'https://joeschmoe.io/api/v1/male/random';

        
        return view('workers.create', ['autoservices' => $autoservices])->with('name', $name)->with('surname' , $surname)->with('images' , $images);
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
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
        ]);
        

        $mechanic = new Mechanic;
        $mechanic->name = $request->get('name');
        $mechanic->surname = $request->get('surname');
        $mechanic->images = $request->get('images');
        $mechanic->autoservice_id = $request->get('autoservice_id');

        $mechanic->save();
        return redirect()->route('mechanic_index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic)
    {
        //
    }

    // public function userview(Request $request) 
    // {
    //     return view('/autoservices/userview');
    // }
}
